<?php

use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;
use App\Http\Controllers\AuthController;

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

Route::resource('/course', CourseController::class);
Route::resource('/assignment', Controllers\AssignmentController::class);
Route::resource('/resource', Controllers\ResourceController::class);
Route::resource('/assignment-submission', Controllers\AssignmentSubmissionController::class);
Route::post('/login', [Controllers\AuthController::class, 'login']);
Route::resource('/class', Controllers\ActivityClassController::class)->only(['index', 'show']);
Route::resource("/department", Controllers\DepartmentController::class)->only(['index', 'show']);
Route::resource("/degree", Controllers\DegreeController::class)->only(['index', 'show']);
Route::resource("/topic", Controllers\TopicController::class)->only(['index', 'show']);

// Route

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/logout', [Controllers\AuthController::class, 'logout']);
    Route::get('/user',[AuthController::class, 'user']);
    Route::resource('/class', Controllers\ActivityClassController::class)->except(['index', 'show']);
    Route::resource("/department", Controllers\DepartmentController::class)->except(['index', 'show']);
    Route::resource("/user", Controllers\UserController::class)->only(['store', 'update', 'destroy']);
});
