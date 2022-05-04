<?php

namespace App\Http\Controllers;

use App\Models\AssignmentSubmissionFileAttack;
use Illuminate\Http\Request;

class AssignmentSubmissionFileAttackController extends Controller
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
    public function store(Request $request, $submission_id)
    {
        $file = $request->file;
        $file_attack_path= FileController::saveFile($file);
        $submission_attack= AssignmentSubmissionFileAttack::create([
            'assignment_submission_id'=> $submission_id,
            'name'=> $file->getClientOriginalName(),
            'file_attack_path'=> $file_attack_path,
        ]);
        return $submission_attack;
    }

    /**
     * Display the specified resource.
     */
    public function show(AssignmentSubmissionFileAttack $assignmentSubmissionFileAttack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssignmentSubmissionFileAttack $assignmentSubmissionFileAttack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssignmentSubmissionFileAttack $assignmentSubmissionFileAttack)
    {
        //
    }
}
