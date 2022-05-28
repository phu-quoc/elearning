<?php

namespace App\Http\Controllers;

use App\Models\AssignmentSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignmentSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'index';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $files = $request->file('files');
            $user = $request->user();
            if ($user->user_type == 2) {
                return response(['message' => 'Forbidden'], 403);
            }
            $assignmentID = $request->input('assignment_id');
            $submission_data = [
                'assignment_id' =>  $assignmentID,
                'student_id' => $user->id,
                'status' => '1',
            ];
            $assignment_submission =  AssignmentSubmission::create($submission_data);
            $submission_attack_controller = new AssignmentSubmissionFileAttackController();
            foreach ($files as $file) {
                $submisson_attack = $submission_attack_controller->store($file, $assignment_submission->id);
            }
            DB::commit();
            return response()->json([
                'message' => 'Đã nộp bài tập'
            ], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $assignmentID = $request->input('assignment_id');
        $user = $request->user();
        $submission = AssignmentSubmission::where(['student_id' => $user->id, 'assignment_id' => $assignmentID])->first();
        if ($submission) {
            $submission->assignmentSubmissionFileAttacks;
        }
        return $submission;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssignmentSubmission $assignmentSubmission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssignmentSubmission $assignmentSubmission)
    {
        //
    }
}
