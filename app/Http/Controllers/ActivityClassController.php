<?php

namespace App\Http\Controllers;

use App\Models\ActivityClass;
use Illuminate\Http\Request;

class ActivityClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ActivityClass::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ActivityClass $class)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ActivityClass $class)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivityClass $class)
    {
        //
    }
}
