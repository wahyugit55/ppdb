<?php

use App\Http\Controllers\SiswaAkunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminBiayaController;
use App\Http\Controllers\SiswaPembayaranController;


Route::group(['middleware' => ['guest:siswa']], function () {
    Route::get('/register', [SiswaAkunController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [SiswaAkunController::class, 'register']);
    Route::get('/login', [SiswaAkunController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [SiswaAkunController::class, 'login']);
});

Route::group(['middleware' => ['auth:siswa']], function () {
    // Rute yang memerlukan autentikasi
    Route::get('/dashboard', [App\Http\Controllers\SiswaHomeController::class, 'index'])->name('siswa.dashboard');
    Route::resource('/pembayaran', SiswaPembayaranController::class);
});


//Admin

Route::get('/admin/biaya', [AdminBiayaController::class, 'index'])->name('admin.biaya');
Route::post('/admin/biaya/store', [AdminBiayaController::class, 'store'])->name('admin.biaya.store');
