<?php

use App\Http\Controllers\Api\StatsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {
    Route::prefix('stats')->group(function() {
        Route::get('/registrations', [StatsController::class, 'registrations']);
    });
});
