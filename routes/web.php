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

Route::get('/admin/dashboard', [AdminDashboardController::class , 'index'])->name('admin.dashboard');
Route::get('/admin/tambah-data', [PersonController::class, 'index'])->name('admin.tambah');

