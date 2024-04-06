<?php

use App\Http\Controllers\SiswaAkunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminBiayaController;
use App\Http\Controllers\SiswaPembayaranController;
use App\Http\Controllers\SiswaGelombangController;
use App\Http\Controllers\SiswaJalurSeleksiController;
use App\Http\Controllers\SiswaJurusanController;
use App\Http\Controllers\SiswaPilihProgramController;
use App\Http\Controllers\SiswaAlamatController;
use App\Http\Controllers\SiswaCetakFormulirController;
use App\Http\Controllers\SiswaCetakPengumumanController;
use App\Http\Controllers\SiswaJadwalSeleksiController;
use App\Http\Controllers\SiswaOrangtuaController;
use App\Http\Controllers\SiswaPengumumankelulusanController;

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

    //Program Pilihan
    Route::get('/program-tambahan', [SiswaPilihProgramController::class, 'index'])->name('siswa.programtambahan');
    Route::post('/program-tambahan/store', [SiswaPilihProgramController::class, 'store'])->name('siswa.programtambahan.store');

    //Biodata
    Route::get('/biodata', [App\Http\Controllers\SiswaBiodataController::class, 'index'])->name('siswa.biodata');
    Route::post('/biodata', [App\Http\Controllers\SiswaBiodataController::class, 'store'])->name('siswa.biodata.store');

    //Alamat
    // Mendefinisikan route dengan menggunakan ::class syntax
    Route::get('/get-provinces', [SiswaAlamatController::class, 'getProvinces'])->name('get-provinces');
    Route::get('/get-regencies/{provinceId}', [SiswaAlamatController::class, 'getRegencies'])->name('get-regencies');
    Route::get('/get-districts/{regencyId}', [SiswaAlamatController::class, 'getDistricts'])->name('get-districts');
    Route::get('/get-villages/{districtId}', [SiswaAlamatController::class, 'getVillages'])->name('get-villages');

    Route::post('/alamat/store', [SiswaAlamatController::class, 'store'])->name('alamat.store');
    Route::get('/alamat', [App\Http\Controllers\SiswaAlamatController::class, 'getAlamat'])->name('siswa.getalamat');

    //Orang Tua
    Route::post('/biodata/orang-tua', [App\Http\Controllers\SiswaOrangtuaController::class, 'store'])->name('orangtua.store');

    //Jadwal Seleksi Siswa
    Route::get('/jadwal-seleksi', [SiswaJadwalSeleksiController::class, 'index'])->name('siswa.jadwal_seleksi');

    //Pengumuman Kelulusan Siswa
    Route::get('/pengumuman-kelulusan', [SiswaPengumumankelulusanController::class, 'index'])->name('siswa.pengumuman_kelulusan');
    Route::get('/cetak-pengumuman', [SiswaPengumumankelulusanController::class, 'cetak'])->name('siswa.cetak_pengumuman');

    //Verifikasi Formulir
    Route::post('/verifikasi-formulir', [App\Http\Controllers\VerifikasiFormulirController::class, 'store'])->name('verifikasiformulir.store');

    //Siswa Cetak Formulir
    Route::get('/cetak-formulir', [SiswaCetakFormulirController::class, 'index'])->name('siswa.cetak_formulir');


});


//Admin

Route::get('/admin/biaya', [AdminBiayaController::class, 'index'])->name('admin.biaya');
Route::post('/admin/biaya/store', [AdminBiayaController::class, 'store'])->name('admin.biaya.store');
