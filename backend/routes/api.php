<?php

use App\Http\Controllers\Api\StatsController;
use App\Http\Controllers\Api\TransactionStatusController;
use App\Http\Controllers\Api\TransactiontypeController;
use App\Http\Controllers\Api\UserRoleController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {
    Route::prefix('stats')->group(function() {
        Route::get('/registrations', [StatsController::class, 'registrations']);
        Route::get('/deposits', [StatsController::class, 'deposits']);
    });

    Route::prefix('transaction_status')->group(function() {
        Route::post('/', [TransactionStatusController::class, 'store']);
    });

    Route::prefix('user_status')->group(function() {
        Route::post('/', [TransactionStatusController::class, 'store']);
    });

    Route::prefix('transaction_types')->group(function() {
        Route::post('/', [TransactiontypeController::class, 'store']);
    });

    Route::prefix('user_roles')->group(function() {
        Route::post('/', [UserRoleController::class, 'store']);
    });
});
