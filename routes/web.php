<?php

use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController; 
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
    return view('system.dashboard');
})->middleware('auth');

Route::resource('courses',  CoursesController::class );
Route::resource('course-category', CourseCategoryController::class);


require __DIR__.'/auth.php';
