<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});



// Route::resource('tickets', TicketController::class);

// Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');

// Route::middleware('web')->group(function () {
//     Route::resource('tickets', TicketController::class);
// });

// Route::get('/test-flash', function () {
//     return redirect('/')->with('success', 'This is a test success message.');
// });
Route::get('/tickets/search', 'App\Http\Controllers\TicketController@search')->name('tickets.search');
Route::resource('/tickets', 'App\Http\Controllers\TicketController');

