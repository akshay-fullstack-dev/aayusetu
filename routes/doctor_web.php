<?php

use App\Http\Controllers\Doctor\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'doctor'], function () {
    Route::get('doctor', [DashboardController::class, 'index']);
});
