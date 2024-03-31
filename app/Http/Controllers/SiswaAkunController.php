<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiswaAkun;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SiswaAkunController extends Controller
{
    public function register(Request $request)
    {
        // Validasi request, kecuali 'no_pendaftaran' karena akan di-generate otomatis
        $request->validate([
            'nisn' => 'required|string|max:10|unique:akun_siswa,nisn',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_sekolah' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:15',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Generate no_pendaftaran
        $tahun = now()->year; // Mendapatkan tahun saat ini
        $prefix = "PPDB{$tahun}";
        $lastSiswa = SiswaAkun::where('no_pendaftaran', 'like', "{$prefix}%")
                            ->orderBy('no_pendaftaran', 'desc')
                            ->first();

        $lastNumber = $lastSiswa ? intval(substr($lastSiswa->no_pendaftaran, -3)) : 0;
        $nextNumber = $lastNumber + 1;
        $noPendaftaran = $prefix . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        // Simpan data siswa
        $siswa = SiswaAkun::create([
            'nisn' => $request->nisn,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_sekolah' => $request->jenis_sekolah,
            'asal_sekolah' => $request->asal_sekolah,
            'nomor_hp' => $request->nomor_hp,
            'password' => Hash::make($request->password),
            'no_pendaftaran' => $noPendaftaran,
            // 'status' secara default true sesuai dengan definisi di migration
        ]);

        // Redirect ke halaman login atau dashboard dengan pesan sukses
        // return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');

        // Setelah menyimpan data pengguna
        session()->flash('registration_success', 'Pendaftaran Berhasil, anda akan diarahkan ke halaman login.');
        // Redirect ke halaman yang sama atau lain dengan session message
        return redirect()->back();
    }

    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'no_pendaftaran' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Coba autentikasi pengguna
        if (Auth::guard('siswa')->attempt($credentials, $request->filled('remember'))) {
            // Jika berhasil, redirect ke dashboard atau halaman lain
            $request->session()->regenerate();
            return redirect()->intended(route('siswa.dashboard'));
        }

        // Setelah menyimpan data pengguna
        session()->flash('registration_failed', 'Login Gagal, periksa no pendaftaran dan password anda !');

        // Jika gagal, kembali ke form login dengan pesan error
        return back()->withErrors([
            'no_pendaftaran' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('siswa.register');
    }

    public function showLoginForm()
    {
        return view('siswa.login');
    }

}
