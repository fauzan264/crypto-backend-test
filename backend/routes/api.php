<?php

use App\Http\Controllers\Api\StatsController;
use App\Http\Controllers\Api\TransactionStatusController;

use Illuminate\Http\Request;
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
});
