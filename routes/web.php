<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonController;
use App\Models\Person;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('hello');
});

Route::get('/admin/login', function() {
    return view('admin.login');
});
Route::post('/admin/login', [AuthController::class, 'authenticate'])->name('login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::middleware('is-admin')->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class , 'index'])->name('admin.dashboard');
    
    Route::controller(PersonController::class)->group(function () {
        Route::get('/admin/tambah-data', 'index')->name('admin.tambah');
        Route::post('/admin/tambah-data', 'store')->name('admin.tambah.post');
    });
});

    