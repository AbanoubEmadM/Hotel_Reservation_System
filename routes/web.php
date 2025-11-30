<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;

Auth::routes();

Route::view('/', 'pages.hotelmaster')->name('home');
Route::middleware('auth')->group(function () {
    Route::resource('/rooms', RoomController::class);
});
