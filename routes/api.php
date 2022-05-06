<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/assignment', Controllers\AssignmentController::class);
Route::resource('/resource', Controllers\ResourceController::class);
Route::resource('/assignment-submission', Controllers\AssignmentSubmissionController::class);
Route::post('/login', [Controllers\AuthController::class, 'login']);

