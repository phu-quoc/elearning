<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Assignment::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $assignment_data=[
            'topic_id'=> $request->input('topic_id'),
            'title'=> $request->input('title'),
            'description'=> $request->input('description'),
            'start_date'=> $request->input('start_date'),
            'deadline'=> $request->input('deadline'),
        ];
        $assignment =Assignment::create($assignment_data);
        $fileAttack = new AssignmentFileAttackController();
        $fileAttack->store($request, $assignment->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $assignment = Assignment::find($id);
        return $assignment;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assignment $assignment)
    {
        //
    }
}
