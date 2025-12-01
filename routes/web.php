<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReceptionistController;
Auth::routes();

Route::view('/', 'pages.hotelmaster')->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('/rooms', RoomController::class);
});

Route::middleware(['auth', 'role:admin|manager'])->group(function () {
    Route::resource('/admin/users', UserController::class)->names('admin.users');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin/receptionists', ReceptionistController::class)->names('admin.receptionists');
    Route::put('/admin/receptionists/{id}/activate', [ReceptionistController::class, 'activate'])->name('admin.receptionists.activate');
    Route::put('/admin/receptionists/{id}/deactivate', [ReceptionistController::class, 'deactivate'])->name('admin.receptionists.deactivate');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
