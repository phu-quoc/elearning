<?php

use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('/course', CourseController::class)->only(['index', 'show']);;
Route::resource('/assignment', Controllers\AssignmentController::class)->only(['index', 'show']);;
Route::resource('/resource', Controllers\ResourceController::class)->only(['index', 'show']);
Route::resource('/assignment-submission', Controllers\AssignmentSubmissionController::class)->only(['index']);
Route::post('/login', [Controllers\AuthController::class, 'login']);
Route::resource('/class', Controllers\ActivityClassController::class)->only(['index', 'show']);
Route::resource("/department", Controllers\DepartmentController::class)->only(['index', 'show']);
Route::resource("/degree", Controllers\DegreeController::class)->only(['index', 'show']);
Route::resource("/category", Controllers\CategoryController::class)->only(['index', 'show']);
Route::resource("/topic", Controllers\TopicController::class)->only(['index', 'show']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/logout', [Controllers\AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::get('/get-topics-by-course', [Controllers\TopicController::class, 'getTopicsByCourse']);
    Route::resource('/class', Controllers\ActivityClassController::class)->except(['index', 'show']);
    Route::resource("/department", Controllers\DepartmentController::class)->except(['index', 'show']);
    Route::resource("/user", Controllers\UserController::class)->only(['store', 'update', 'destroy']);
    Route::resource("/course", Controllers\CourseController::class)->only(['store', 'update', 'destroy']);
    Route::resource("/topic", Controllers\TopicController::class)->only(['store', 'update', 'destroy']);
    Route::resource('/assignment', Controllers\AssignmentController::class)->only(['store', 'update', 'destroy']);
    Route::resource('/resource', Controllers\ResourceController::class)->only(['store', 'update', 'destroy']);
    Route::resource('/assignment-submission', Controllers\AssignmentSubmissionController::class)->only(['show', 'store', 'update', 'destroy']);
    Route::get('/get-course-of-user', [Controllers\CourseController::class, 'getCourseOfUser']);
    Route::get('/get-un-submit-assignments-of-user', [Controllers\UserController::class, 'getUnSubmitAssignmentsOfUser']);
    Route::post('/send-notification', [NotificationController::class, 'sendNotification']);
});
