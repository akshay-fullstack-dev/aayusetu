<?php

use App\Http\Controllers\Client\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'client']], function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
});
