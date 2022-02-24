<?php

use App\Http\Controllers\Api\CoursesController;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

//Route::middleware('auth:sanctum')->group( function () {
//    Route::resource('courses', CoursesController::class);
//});

//Route::get('courses/search/{title}', [CoursesController::class, 'search'])->middleware('auth:sanctum');

// Public Routes
Route::get('courses', [CoursesController::class, 'index']);
Route::get('courses/{slug}', [CoursesController::class, 'show']);
Route::get('courses/search/{title}', [CoursesController::class, 'search']);
Route::get('courses/categories/{category}', function (CourseCategory $courseCategory) {
});