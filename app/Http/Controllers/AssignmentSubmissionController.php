<?php

namespace App\Http\Controllers;

use App\Models\AssignmentSubmission;
use Illuminate\Http\Request;

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
        $submission_data=[
            'assignment_id'=> $request->input('assignment_id'),
            'student_id'=> $request->input('student_id'),
            'status'=> '0',
        ];
        $assignment_submission=  AssignmentSubmission::create($submission_data);
        $submission_attack_controller= new AssignmentSubmissionFileAttackController(); 
        $submisson_attack= $submission_attack_controller->store($request, $assignment_submission->id);
        return response()->json([
            'assignment_submission' => $assignment_submission,
            'submission_attack' => $submisson_attack,
        ]);
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
