<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\TicketsController;
use App\Http\Controllers\API\V1\SupportAgentController;

// API Routes
Route::prefix('v1')->group(function () {
    Route::post('/tickets', [TicketsController::class, 'store']);
});

Route::get('/v1/tickets', [TicketsController::class, 'index']);

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::get('/agent/tickets', [SupportAgentController::class, 'index']);
});