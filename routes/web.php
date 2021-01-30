<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PresentController;
use App\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\Route;

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
Route::get('/beranda', function () {
    return view('beranda');
});
route::get('', [StudentController::class, "index"]);
route::get('', [PresentController::class, "index"]);
route::get('', [CoursesController::class, "index"]);
//route::get('/customers', [cobacontroller::class, "index"]);
//route::get('/customers/create', [cobacontroller::class, "create"]);
//route::post('/customers', [cobacontroller::class, "store"]);
//route::get('/customers/{id}', [cobacontroller::class, "show"]);
//route::get('/customers/{id}/edit', [cobacontroller::class, "edit"]);
//route::put('/customers/{id}', [cobacontroller::class, "update"]);
//Route::delete('/customers/{id}', [CobaController::class, 'destroy']);
route::resource('students', StudentController::class);
route::resource('presents', PresentController::class);
route::resource('courses', CoursesController::class);