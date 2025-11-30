<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::view('/hotelmaster', 'pages.hotelmaster')->name('hotelmaster');
