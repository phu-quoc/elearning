<?php
use App\Http\Controllers;
use App\Http\Controllers\FileController;
use App\Models\Test;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('test-save-file', function(Request $request) {
    $file = $request->file;
    $path= FileController::saveFile($file);
    return $path;
});
Route::get('/test', function(){
    $user=User::find(5);
    $lecturer=$user->lecturer;
    if($lecturer){
        $lecturer->department;
        $lecturer->degree;
    }
    return $user;
});
