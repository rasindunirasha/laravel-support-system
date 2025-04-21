<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;


Route::get('/', function () {
    return view('welcome');
});



Route::resource('tickets', TicketController::class);

Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');

Route::middleware('web')->group(function () {
    Route::resource('tickets', TicketController::class);
});

// Route::get('/test-flash', function () {
//     return redirect('/')->with('success', 'This is a test success message.');
// });
