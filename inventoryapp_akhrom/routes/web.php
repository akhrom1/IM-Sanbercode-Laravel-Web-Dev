<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [DashboardController::class, 'dashboard']);
Route::get('/daftar', [FormController::class, 'daftar']);
Route::post('/welcome', [FormController::class, 'welcome']);
