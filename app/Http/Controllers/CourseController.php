<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courses = Course::all();
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
        $user = $request->user();
        if ($user->user_type == 1) { //student can't create new course
            return response(['message' => 'Forbidden'], 403);
        }
        $categoryID = $request->categoryID;
        $courseName = $request->courseName;
        $course = Course::create([
            'name' => $courseName,
            'category_id' => $categoryID,
            'lecturer_id' => $user->id,
        ]);
        return response()->json($course, 200);
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
        // $materials = array();
        foreach ($topics as $topic) {
            $resource = $topic->resources;
            foreach ($resource as $resource) {
                if ($resource->resource_type == '1') { //resouce is document
                    $resource->files;
                }
                $resource->url;
            }
            // array_push($materials, $topic->resources);
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

    public function getCourseOfUser(Request $request)
    {
        $user = $request->user();
        $userID = $user->id;
        $userType = $user->user_type;
        if ($userType == 2) {
            $courses = Course::where('lecturer_id', $userID)->get();
            return response()->json($courses, 200);
        } else {
            $student = $user->student;
            $courses = array();
            try {
                $enrollments = $student->enrollments;
                foreach ($enrollments as $enrollment) {
                    array_push($courses, $enrollment->course);
                }
            } catch (\Throwable $th) {
                return response()->json($courses, 200);
            }
            return response()->json($courses, 200);
        }
    }
}
