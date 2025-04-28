<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\TicketsController;

// API Routes
Route::prefix('v1')->group(function () {
    Route::post('/tickets', [TicketsController::class, 'store']);
});
