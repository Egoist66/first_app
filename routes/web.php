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
Route::get('/posts', [PostsController::class, 'index'])->name('post.index');
Route::get('/employees', [EmployeesController::class, 'index']);
Route::get('/posts/create', [PostsController::class, 'create']);

Route::get('/posts/first_or_create', [PostsController::class, 'firstOrCreate']);
Route::get('/posts/update_or_create', [PostsController::class, 'updateOrCreate']);
Route::get('/posts/update', [PostsController::class, 'update']);
Route::get('/posts/delete', [PostsController::class, 'delete']);

Route::get('/posts/{id}', [PostsController::class, 'get']);
Route::get('/posts/delete/{id}', [PostsController::class, 'deletePostById']);
Route::get('/posts/restore/{id}', [PostsController::class, 'restorePostById']);
Route::get('/employees/{employee}', function(\App\Models\Employee $employee){

    return $employee;
});

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
