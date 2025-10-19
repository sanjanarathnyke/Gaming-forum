<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome') ;
Route::get('/forum',function(){
    return view('forum');
})->name('forum');
Route::get('/register',function(){
    return view('register');
})->name('register');
Route::get('/login',function(){
    return view('login');
})->name('login');
Route::get('/profile',function(){
    return view('profile');
})->name('profile');
Route::get('/category',function(){
    return view('categories');
})->name('category');
Route::get('/posts',function(){
    return view('post');
})->name('posts');