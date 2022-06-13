<?php

namespace App\Http\Controllers;

use App\Jobs\PushNotificationJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function sendNotification(Request $request)
    {
        try {
            $title = '';
            switch ($request->resource_type) {
                case 1:
                    $title = 'Tài liệu mới: "' . $request->title . '"';
                    break;
                case 2:
                    $title = 'Liên kết mới: "' . $request->title . '"';
                    break;
                case 4:
                    $title = 'Bài tập mới: "' . $request->title . '"';
                    break;
                default:
                    break;
            }
            $student_ids = DB::table('enrollments')->where('course_id', $request->course_id)->pluck('student_id')->toArray();
            $deviceTokens = array();
            foreach($student_ids as $student_id)
            {
                $deviceToken = DB::table('users')->where('id', $student_id)->first();
                if($deviceToken->device_token)
                {
                    array_push($deviceTokens, $deviceToken->device_token);
                }
            }
            
            if($deviceTokens !== null)
            {
                PushNotificationJob::dispatch('sendBatchNotification', [
                    $deviceTokens,
                    [
                        'topicName' => 'new_resource',
                        'title' => $title,
                        'body' => 'Xin chào, bạn có một ' . $title . ' ở lớp học phần ' . $request->course_name,
                    ],
                ]);
            }
            return response()->json([
                'message' => 'Successfully',
                'tokens' => $deviceTokens,
                // 'student_ids' => $student_ids,
                // 'request' => $request
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error: ' + $th
            ], 400);
        }
    }
}
