<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::view('/', 'pages.hotelmaster')->name('home');
