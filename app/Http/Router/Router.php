<?php

namespace App\Http\Router;

use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\Post\AdminCreateController;
use App\Http\Controllers\Admin\Post\AdminDestroyController;
use App\Http\Controllers\Admin\Post\AdminEditController;
use App\Http\Controllers\Admin\Post\AdminSearchController;
use App\Http\Controllers\Admin\Post\AdminShowController;
use App\Http\Controllers\Admin\Post\AdminUpdateController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Router
{


    final public function route(): void
    {

        $this->post();
        $this->admin();
        $this->random();

    }

    private function post(): void
    {

        Route::group(['namespace' => 'Post'], static function () {

            Route::get('/posts', [IndexController::class, '__invoke'])
                ->name('post.index');
            Route::post('/posts', [StoreController::class, '__invoke'])
                ->name('post.store');
            Route::get('/posts/{post}', [ShowController::class, '__invoke'])
                ->name('post.show');

        });


    }

    private function admin(): void
    {

        Route::middleware(['admin'])->group(function () {

            Route::get('/admin', [AdminIndexController::class, '__invoke'])
                ->name('admin.index');

            Route::prefix('admin')
                ->namespace('Admin')->group(static function () {
                Route::get('/posts/{post}', [AdminShowController::class, '__invoke'])
                    ->name('admin.post.show');

                Route::get('/posts/{post}/edit', [AdminEditController::class, '__invoke'])
                    ->name('admin.post.edit');

                Route::get('/post/create', [AdminCreateController::class, '__invoke'])
                    ->name('admin.post.create');

                Route::delete('/posts/{post}', [AdminDestroyController::class, '__invoke'])
                    ->name('admin.post.destroy');

                Route::put('/posts/{post}', [AdminUpdateController::class, '__invoke'])
                    ->name('admin.post.update');

                Route::post('/search', [AdminSearchController::class, '__invoke'])
                    ->name('admin.search');


            });

        });
    }


    private function random(): void
    {
        Route::get('/employees', [EmployeesController::class, 'index']);
        Route::get('/', [HomeController::class, 'index'])->name('home');

        Route::get('/employees/{employee}', static function (Employee $employee) {

            return $employee;
        });


        Route::view('/about', 'about')->name('about.index');
        Route::view('/contact', 'contact')->name('contact.index');
        Route::fallback(static fn() => "<h2>Not found</h2>");
    }

}
