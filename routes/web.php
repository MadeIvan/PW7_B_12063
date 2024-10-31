<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
    });
    Route::resource('/book', BookController::class);
    Route::resource('/bookings', BookingsController::class);
