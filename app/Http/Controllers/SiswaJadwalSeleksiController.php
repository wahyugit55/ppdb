<?php

namespace App\Http\Controllers;

use App\Models\SiswaAkun;
use Illuminate\Http\Request;
use App\Models\SiswaJadwalSeleksi;
use Illuminate\Support\Facades\Auth;

class SiswaJadwalSeleksiController extends Controller
{
    public function index()
    {
        // Misalnya siswa yang login memiliki ID tertentu
        $siswaId = Auth::user()->id; // Atau cara lain untuk mendapatkan ID siswa

        // Mengambil data siswa
        $siswa = SiswaAkun::find($siswaId);

        // Jika siswa tidak ditemukan, bisa redirect atau memberi pesan error
        if (!$siswa) {
            return redirect()->back()->with('error', 'Siswa tidak ditemukan.');
        }

        // Mengambil jadwal seleksi siswa yang berstatus true
        $jadwalSeleksi = $siswa->jadwalSeleksi;

        // Menampilkan view dengan data jadwal seleksi
        return view('siswa.jadwal_seleksi', compact('jadwalSeleksi'));
    }
}
