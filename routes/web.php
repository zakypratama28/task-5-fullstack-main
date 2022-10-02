<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\DashboardPostController;

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
    return view('auth.login', [
        "title" => "Post"
    ]);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/posts/{post}', [PostController::Class, 'show']);
    Route::get('/categories', [CategoryController::Class, 'index']);
    Route::get('/category/{category}', [CategoryController::Class, 'show']);
    Route::get('/author', [AuthorController::Class, 'index']);
    Route::get('/author/{user}', [AuthorController::Class, 'show']);
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    });
    Route::resource('/dashboard/posts', DashboardPostController::class);
});
