<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/clients', [DashboardController::class, 'clients']);
    Route::get('/doctors', [DashboardController::class, 'doctors']);
    Route::get('/admins', [DashboardController::class, 'admins']);
});
