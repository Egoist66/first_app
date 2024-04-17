<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\DestroyController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\UpdateController;
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

Route::group(['namespace' => 'Post'], static function () {

    Route::get('/posts', [IndexController::class, '__invoke'])
        ->name('post.index');
    Route::get('/posts/create', [CreateController::class, '__invoke'])
        ->name('post.create');
    Route::post('/posts', [StoreController::class, '__invoke'])
        ->name('post.store');
    Route::get('/posts/{post}/edit', [EditController::class, '__invoke'])
        ->name('post.edit');
    Route::put('/posts/{post}', [UpdateController::class, '__invoke'])
        ->name('post.update');
    Route::delete('/posts/{post}', [DestroyController::class, '__invoke'])
        ->name('post.destroy');
    Route::get('/posts/{post}', [ShowController::class, '__invoke'])
        ->name('post.show');

});

//Route::resource('posts', PostsController::class)->names([
//    'create' => 'post.create',
//    'store' => 'post.store',
//    'edit' => 'post.edit',
//    'update' => 'post.update',
//    'destroy' => 'post.destroy',
//    'show' => 'post.show',
//    'index' => 'post.index'
//]);
Route::resource('photos', PhotoController::class);

Route::view('/about', 'about')->name('about.index');
Route::view('/', 'welcome')->name('home.index');
Route::view('/contact', 'contact')->name('contact.index');
Route::fallback(static fn() => "<h2>Not found</h2>");



class F1 {

    public function __call($name, $args) {
        $this->say($args[0]);
    }

    public function say(string $name): void {

        echo "Say $name";
    }
}

call_user_func([new F1(), '2'], 'Farid');