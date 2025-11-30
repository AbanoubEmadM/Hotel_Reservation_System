<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;

Auth::routes();

Route::view('/', 'pages.hotelmaster')->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('/rooms', RoomController::class);
});

Route::middleware(['auth', 'role:admin|manager'])->group(function () {
    Route::resource('/admin/users', UserController::class)->names('admin.users');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
