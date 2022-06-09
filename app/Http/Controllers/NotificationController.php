<?php

namespace App\Http\Controllers;

use App\Jobs\PushNotificationJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function sendNotification(Request $request)
    {
        $deviceToken = DB::table('users')->where('device_token', '<>', null)->pluck('device_token')->toArray();
        // array_push($deviceToken, 'dSJgAeQQRgSP02C39nemm1:APA91bFBRWpFNyUFmuraeBNuWnJo5DFh2Mi0TtA2L4DBLkrPHL98dJK4XwYkFqXqhbNHx1IUWNXxiA4DGRj6CrQzW0ban-Ymj7uVqpOIrdfRPN2XtMj5grNVnabpmRAzbQHy4gBZM8p2');
        PushNotificationJob::dispatch('sendBatchNotification', [
            $deviceToken,
            [
                'topicName' => 'new_assignment',
                'title' => 'Bạn có một bài tập mới',
                'body' => 'Chúc bạn sinh nhật vui vẻ',
                'image' => 'https://picsum.photos/536/354',
            ],
        ]);
        return response()->json([
            'message' => 'Successfully'
        ], 200);
    }
}
