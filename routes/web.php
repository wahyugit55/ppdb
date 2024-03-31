<?php

use App\Http\Controllers\SiswaAkunController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['guest:siswa']], function () {
    Route::get('/register', [SiswaAkunController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [SiswaAkunController::class, 'register']);
    Route::get('/login', [SiswaAkunController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [SiswaAkunController::class, 'login']);
});

Route::group(['middleware' => ['auth:siswa']], function () {
    // Rute yang memerlukan autentikasi
    Route::get('/dashboard', function () {
        // Hanya bisa diakses oleh siswa yang sudah login
    });
});
