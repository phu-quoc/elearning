<?php

namespace App\Http\Controllers;

use App\Models\AssignmentFileAttack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignmentFileAttackController extends Controller
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
    public function store(Request $request, $assignment_id)
    {   
        $file = $request->file;
        $name= $file->getClientOriginalName();
        $file_attack_path= FileController::saveFile($file);
        AssignmentFileAttack::create([
            'assignment_id'=>  $assignment_id,
            'name'=> $name,
            'file_attack_path'=> $file_attack_path,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(AssignmentFileAttack $assignmentFileAttack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssignmentFileAttack $assignmentFileAttack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssignmentFileAttack $assignmentFileAttack)
    {
        //
    }
}
