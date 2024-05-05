<?php

use App\Http\Router\Router;
use Illuminate\Support\Facades\Auth;
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


$router = new Router();
$router->route();


Auth::routes();

//Route::get('/', static function () {
//    if (Auth::check()) {
//        return redirect('/posts');
//    }
//
//    return redirect('/login');
//});






// class F1 {

//     public function __call($name, $args) {
//         $this->say($args[0]);
//     }

//     public function say(string $name): void {

//         echo "Say $name";
//     }
// }

//call_user_func([new F1(), '2'], 'Farid');


//Route::resource('posts', PostsController::class)->names([
//    'create' => 'post.create',
//    'store' => 'post.store',
//    'edit' => 'post.edit',
//    'update' => 'post.update',
//    'destroy' => 'post.destroy',
//    'show' => 'post.show',
//    'index' => 'post.index'
//]);

// Route::resource('photos', PhotoController::class);

//Route::get('/', function () {return view('welcome');});


//Route::group(['namespace' => 'Admin'], static function () {
//
//    Route::get('/admin', [AdminIndexController::class, '__invoke'])
//        ->name('admin.index');
//
//    Route::get('/admin/posts/{post}', [AdminShowController::class, '__invoke'])
//    ->name('admin.post.show');
//
//
//});
