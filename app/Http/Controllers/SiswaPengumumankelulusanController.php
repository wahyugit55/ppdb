<?php

namespace App\Http\Controllers;

use App\Models\PengumumanKelulusan;
use App\Models\SiswaAkun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SiswaPengumumankelulusanController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id; // atau cara lain untuk mendapatkan ID pengguna yang aktif

        $pengumumanKelulusans = PengumumanKelulusan::with([
            'siswa' => function($query) use ($userId) {
                $query->where('id', $userId); // Filter hanya siswa yang sedang login
            },
            'hasilSeleksi',
            'templateAngsuran.dataAngsuran.detailAngsuran',
            'siswaJadwalSeleksi.jadwalSeleksi'
        ])->whereHas('siswa', function($query) use ($userId) {
            $query->where('id', $userId); // Pastikan hanya memuat pengumuman untuk siswa yang login
        })->get();

        $akunSiswa = SiswaAkun::with('dataDiri')->where('id', $userId)->first();

        return view('siswa.pengumuman_kelulusan', compact('pengumumanKelulusans','akunSiswa'));
    }

}
