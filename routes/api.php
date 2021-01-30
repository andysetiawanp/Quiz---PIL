<?php

use App\Http\Controllers\Api\CoursesController;
use App\Http\Controllers\Api\PresentController;
use App\Http\Controllers\Api\StudentController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

route::get('', [StudentController::class, "index"]);
route::get('', [PresentController::class, "index"]);
route::get('', [CoursesController::class, "index"]);

Route::resources([
    'students' => StudentController::class,
    'presents' => PresentController::class,
    'courses' => CoursesController::class,

]);
