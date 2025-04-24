<?php
use App\Http\Controllers\CommentController;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'App\Http\Controllers'], function() { // GROUP 1
    Route::get('/login', 'LoginController@login')->name('login');
    Route::post('/login', 'LoginController@authenticate')->name('authenticate');

    Route::get('/signup', 'RegisterController@showRegistrationForm')->name('signup');
    Route::post('/signup', 'RegisterController@register')->name('register');

    Route::get('/tickets/search', 'TicketController@search')->name('tickets.search');
    Route::get('/tickets/create', 'TicketController@create')->name('tickets.create');
    Route::post('/tickets', 'TicketController@store')->name('tickets.store');
    Route::get('/tickets/{ticket}', 'TicketController@show')->name('tickets.show');

    Route::resource('/comments', 'CommentController')->only('store', 'update', 'destroy');

    Route::middleware(['auth'])->group(function() { // GROUP 2
        Route::get('/tickets', 'TicketController@index')->name('tickets.index');
        Route::get('/logout', 'LoginController@logout')->name('logout');
    });
});



Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');


