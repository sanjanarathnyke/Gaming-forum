<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ThreadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/forum', function () {
    return view('forum');
})->name('forum');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

// Route::get('/category',function(){
//     return view('categories');
// })->name('category');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::put('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');

// Route::get('/posts', function () {
//     return view('post');
// })->name('posts');
Route::get('/threads/{id}', [PostController::class, 'show'])->name('threads.show');


Route::get('/threads', [ThreadController::class, 'index'])->name('threads.index');
Route::post('/threads/store', [ThreadController::class, 'store'])->name('threads.store');

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
