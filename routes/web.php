<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing-page');
});

Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
Route::get('/tenaga-pendidik', [UserDashboardController::class, 'tenagaPendidik'])->name('user.tenaga-pendidik');
Route::get('/tenaga-pendidik/{id}', [UserDashboardController::class, 'tenagaPendidikDetail'])->name('user.tenaga-pendidik.detailed-info');
Route::get('/plp-teknisi', [UserDashboardController::class, 'plpTeknisiLab'])->name('user.plp-teknisi');
Route::get('/plp-teknisi/{id}', [UserDashboardController::class, 'plpTeknisiDetail'])->name('user.plp-teknisi.detailed-info');

Route::get('/admin/login', function() { 
    return view('admin.login');
});
Route::post('/admin/login', [AuthController::class, 'authenticate'])->name('login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::middleware('is-admin')->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class , 'index'])->name('admin.dashboard');
    Route::get('/admin/management-data', [AdminDashboardController::class , 'managementData'])->name('admin.management-data');
    
    Route::controller(PersonController::class)->group(function () {
        Route::get('/admin/tambah-data', 'index')->name('admin.tambah');
        Route::post('/admin/tambah-data', 'store')->name('admin.tambah.post');
        Route::get('/admin/edit-data/{id}', 'edit')->name('admin.edit');
        Route::put('/admin/edit-data/{id}', 'update')->name('admin.edit.post');
        Route::delete('/admin/hapus-data/{id}', 'destroy')->name('admin.delete');
    });
});

// buat bikin tampilan aja
// Route::get('/admin/manajemen-data', function () {

//     return view('admin.managementData');
// });
// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

Route::get('/tamanmain', function () {
    return view('tamanmain');
});

Route::get('/page-pop-up-confirm', function () {
    return view('page-pop-up-confirm');
});

Route::get('/page-pop-up-success', function () {
    return view('page-pop-up-success');
});