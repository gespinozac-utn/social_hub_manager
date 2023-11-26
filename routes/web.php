<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

// Home

Route::get('/',[PostController::class,'index'])->name('home');

// Session

Route::post('logout',[SessionsController::class,'destroy'])->middleware('auth');

Route::get('login',[SessionsController::class,'create'])->middleware('guest')->name('login');
Route::post('sessions',[SessionsController::class,'store'])->middleware('guest');

// Register
Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');
