<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        try {
            DB::beginTransaction();
            $files = $request->file('files');
            $resource= Resource::create([
                'topic_id'=> $request->topicID,
                'title'=>$request->title,
                'description'=>$request->description,
                'resource_type'=> 4,
            ]);
            $assignment = Assignment::create([
                'id'=> $resource->id,
                'start_date'=> Carbon::now(),
                'deadline'=> json_decode($request->deadline),
            ]);
            $fileAttack = new AssignmentFileAttackController();
            foreach($files as $file){
                $fileAttack->store($file, $assignment->id);
            }
            DB::commit();
            // return compact(['assignment', 'file' ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $resource = Resource::find($id);
        $assignment = $resource->assignment;
        if($assignment){
            $assignment->assignmentFileAttacks; 
        }
        return $resource;
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
