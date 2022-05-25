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
        //
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

            $submission_data = [
                'assignment_id' => $request->input('assignmentID'),
                'student_id' => $user->id,
                'status' => '0',
            ];
            $assignment_submission =  AssignmentSubmission::create($submission_data);
            $submission_attack_controller = new AssignmentSubmissionFileAttackController();
            foreach($files as $file){
                $submisson_attack = $submission_attack_controller->store($file, $assignment_submission->id);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }

        // $submission_data = [
        //     'assignment_id' => $request->input('assignment_id'),
        //     'student_id' => $request->input('student_id'),
        //     'status' => '0',
        // ];
        // $assignment_submission =  AssignmentSubmission::create($submission_data);
        // $submission_attack_controller = new AssignmentSubmissionFileAttackController();
        // $submisson_attack = $submission_attack_controller->store($files, $assignment_submission->id);
        // return response()->json([
        //     'assignment_submission' => $assignment_submission,
        //     'submission_attack' => $submisson_attack,
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(AssignmentSubmission $assignmentSubmission)
    {
        //
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
