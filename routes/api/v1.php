<?php

use App\Exceptions\RecordNotFoundException;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// user end api registered here
Route::group(['prefix' => 'user'], function () {

    Route::post('register', [UserController::class, 'register']);
    Route::post('login', [UserController::class, 'login']);

    // auth routes registered here
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', [UserController::class, 'logout']);
        Route::post('change-password', [UserController::class, 'changePassword']);
    });
});


// this route is fallback if api is used in as fallback
Route::fallback(function () {
    throw new RecordNotFoundException('invalid request');
});
