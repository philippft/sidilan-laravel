<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\UserDashboard;
use App\Http\Controllers\UserDashboardController;
use App\Models\Person;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('sidebar');
});

Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

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
        Route::get('/admin/edit-data/{id}', 'edit')->name('admin.edit');
        Route::put('/admin/edit-data/{id}', 'update')->name('admin.edit.post');
        Route::delete('/admin/hapus-data/{id}', 'destroy')->name('admin.delete');
    });
});

Route::get('/test', function () {
    return view('test-page');
});

    