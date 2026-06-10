<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;


Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'dashboard'])
        ->name('dashboard');


    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'getprofile']);
        Route::post('/', [ProfileController::class, 'store']);
        Route::put('/', [ProfileController::class, 'update']);
    });

    Route::prefix('transaction')->group(function () {
        Route::get('/', [TransactionController::class, 'index']);
        Route::get('/create', [TransactionController::class, 'create']);
        Route::post('/', [TransactionController::class, 'store']);
        Route::put('/', [TransactionController::class, 'update']);
    });

    Route::resource('products', ProductController::class);

    Route::post('/logout', [AuthController::class, 'logout']);


    Route::middleware('admin')->group(function () {

        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index']);
            Route::get('/create', [CategoryController::class, 'create']);
            Route::post('/', [CategoryController::class, 'store']);
            Route::get('/{id}', [CategoryController::class, 'show']);
            Route::get('/{id}/edit', [CategoryController::class, 'edit']);
            Route::put('/{id}', [CategoryController::class, 'update']);
            Route::delete('/{id}', [CategoryController::class, 'destroy']);
        });
    });
});


Route::middleware('guest')->group(function () {

    Route::prefix('register')->group(function () {
        Route::get('/', [AuthController::class, 'formregister']);
        Route::post('/', [AuthController::class, 'register']);
    });

    Route::prefix('login')->group(function () {
        Route::get('/', [AuthController::class, 'formlogin'])
            ->name('login');
        Route::post('/', [AuthController::class, 'login']);
    });
});
