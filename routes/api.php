<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TwilioController;
use App\Http\Controllers\PostApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('twilio/get',[TwilioController::class,'get_otp']);
// Route::post('twilio/verify',[TwilioController::class,'verify_otp']);

Route::get('post/queue',[PostApiController::class,'queue']);
Route::get('post/waiting',[PostApiController::class,'waiting']);