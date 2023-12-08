<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\Auth\TwoFactorController;

// Home

Route::get('/',[PostController::class,'index'])->name('home')->middleware('2fa');

// Session
Route::post('logout',[SessionsController::class,'destroy'])->middleware('auth')->name('logout');

Route::get('login',[SessionsController::class,'create'])->middleware('guest')->name('login');
Route::post('sessions',[SessionsController::class,'store'])->middleware('guest');

// Register
Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');

// 2FA
Route::get('2fa',[TwoFactorController::class,'show'])->name('2fa')->middleware('auth');
Route::post('2fa',[TwoFactorController::class,'store'])->name('2fa.post')->middleware('auth');
// Route::get('2fa/verify',[TwoFactorController::class,'verify'])->name('2fa.verify');

// Post
Route::get('posts',[PostController::class,'show'])->name('posts')->middleware('2fa');
Route::get('post/create',[PostController::class,'create'])->name('posts.create')->middleware('2fa');
Route::post('post',[PostController::class,'store'])->name('post.store')->middleware('2fa');