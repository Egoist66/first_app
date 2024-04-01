<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostsController;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {return view('welcome');});
Route::get('/employees', [EmployeesController::class, 'index']);
Route::get('/employees/{employee}', static function (Employee $employee) {

    return $employee;
});


Route::resource('posts', PostsController::class);
Route::resource('photos', PhotoController::class);

Route::view('/about', 'about')->name('about.index');
Route::view('/contact', 'contact')->name('contact.index');
Route::fallback(static fn() => "<h2>Not found</h2>");




