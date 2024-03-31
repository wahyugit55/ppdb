<?php

use App\Http\Controllers\SiswaAkunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminBiayaController;
use App\Http\Controllers\SiswaPembayaranController;
use App\Http\Controllers\SiswaGelombangController;
use App\Http\Controllers\SiswaJalurSeleksiController;
use App\Http\Controllers\SiswaJurusanController;

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
    Route::get('/pembayaran/print/{id}', [SiswaPembayaranController::class, 'printBuktiBayar'])->name('pembayaran.print');

    //Gelombang
    Route::get('/gelombang', [SiswaGelombangController::class, 'index'])->name('gelombang.index');
    Route::post('/pilih-gelombang', [SiswaGelombangController::class, 'store'])->name('gelombang.pilih');

    //Jalur Seleksi
    Route::get('/jalur-seleksi', [SiswaJalurSeleksiController::class, 'index'])->name('jalur-seleksi.index');
    Route::post('/pilih-jalur', [SiswaJalurSeleksiController::class, 'store'])->name('jalur-seleksi.index');

    //Jurusan
    Route::get('/pilih-jurusan', [SiswaJurusanController::class, 'index'])->name('siswa.pilihjurusan');
    Route::post('/pilih-jurusan', [SiswaJurusanController::class, 'store'])->name('siswa.pilihjurusan.store');

});


//Admin

Route::get('/admin/biaya', [AdminBiayaController::class, 'index'])->name('admin.biaya');
Route::post('/admin/biaya/store', [AdminBiayaController::class, 'store'])->name('admin.biaya.store');
