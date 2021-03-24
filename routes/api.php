<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
//Route::get('login', [UserController::class, 'login']);

Route::middleware('auth:api')->apiResource('post', PostController::class);
Route::middleware('auth:api')->get('userData', [UserController::class, 'userData']);

Route::middleware('auth:api')->get('view', [CourseController::class, 'view']);
Route::post('add', [CourseController::class, 'add']);
Route::middleware('auth:api')->delete('destroy/{id}', [CourseController::class, 'destroy']);


Route::middleware('auth:api')->get('viewStudent', [StudentController::class, 'viewStudent']);
Route::middleware('auth:api')->get('showCourse', [StudentController::class, 'showCourse']);
Route::post('addStudent', [StudentController::class, 'addStudent']);
Route::post('updateStudent/{id}', [StudentController::class, 'updateStudent']);