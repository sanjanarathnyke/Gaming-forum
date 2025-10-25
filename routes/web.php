<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

// Public Routes (No Authentication Required)
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/forum', function () {
    return view('forum');
})->name('forum');

// Threads - Public viewing
Route::get('/threads', [ThreadController::class, 'index'])->name('threads.index');
Route::get('/threads/{id}', [PostController::class, 'show'])->name('threads.show');

// Guest Only Routes (Only accessible when NOT logged in)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Protected Routes (Authentication Required)
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Profile Management
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    
    // Thread Management (from Profile)
    Route::get('/threads/{id}/edit', [ProfileController::class, 'editThread'])->name('threads.edit');
    Route::put('/threads/{id}/update', [ProfileController::class, 'updateThread'])->name('threads.update');
    Route::delete('/profile/thread/{id}', [ProfileController::class, 'deleteThread'])->name('profile.thread.delete');
    
    // Comment Management (from Profile)
    Route::get('/profile/comment/{id}/edit', [ProfileController::class, 'editComment'])->name('profile.comment.edit');
    Route::put('/profile/comment/{id}/update', [ProfileController::class, 'updateComment'])->name('profile.comment.update');
    Route::delete('/profile/comment/{id}', [ProfileController::class, 'deleteComment'])->name('profile.comment.delete');
    
    // Categories Management
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::put('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    
    // Thread Creation
    Route::post('/threads/store', [ThreadController::class, 'store'])->name('threads.store');
    
    // Comments
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
});
