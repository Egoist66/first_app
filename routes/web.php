<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\PostsController;
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

Route::view('/', 'welcome')->name('home.index');
//Route::get('/', function () {return view('welcome');});
Route::get('/employees', [EmployeesController::class, 'index']);
Route::get('/employees/{employee}', function(\App\Models\Employee $employee){

    return $employee;
});



//Route::get('/posts/{id}', [PostsController::class, 'show'])->where('id', '[0-9]+')->name('post.show');
Route::get('/posts/create', [PostsController::class, 'create'])->name('post.create');
Route::get('/posts', [PostsController::class, 'index'])->name('post.index');
Route::get('/posts/{post}', [PostsController::class, 'show'])->name('post.show');

Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])->name('post.edit');
Route::patch('/posts/{post}', [PostsController::class, 'update'])->name('post.update');
Route::post('/posts', [PostsController::class, 'store'])->name('post.store');
Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('post.delete');



Route::view('/about', 'about')->name('about.index');
Route::view('/contact', 'contact')->name('contact.index');
Route::fallback(function (){
   return "<h2>Not found</h2>";
});


//function myFunction($param1, $param2, $param3) {
//    // код функции
//}
//
//$reflection = new ReflectionFunction('myFunction');
//$parameters = $reflection->getParameters();
//
//foreach ($parameters as $parameter) {
//    $parameterName = $parameter->getName();
//    echo "Parameter name: $parameterName\n";
//}
