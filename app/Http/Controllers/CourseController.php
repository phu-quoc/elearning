<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        $topics_array = array();
        foreach ($courses as $course) {
            array_push($topics_array, $course->topics);
        }
        $materials = array();
        // dd($topics);
        foreach ($topics_array as $topics) {
            foreach ($topics as $topic) {
                array_push($materials, $topic->assignments);
                array_push($materials, $topic->resources);
            }
        }
        return response()->json($courses, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        $topics = $course->topics;
        $materials = array();
        dd($topics);
        foreach ($topics as $topic) {
            dd($topic);
            array_push($materials, $topic->assignments);
            array_push($materials, $topic->resources);
        }
        return response()->json($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
