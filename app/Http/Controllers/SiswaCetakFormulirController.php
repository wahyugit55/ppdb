<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Models\SiswaAkun;
use App\Models\SiswaPembayaran;
use App\Models\SiswaPilihJurusan;
use PDF;
use Illuminate\Support\Facades\Auth;
use NumberToWords\NumberToWords;

class SiswaCetakFormulirController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id; // Asumsi menggunakan Auth untuk mendapatkan ID siswa yang sedang aktif

        // Mengambil data siswa bersama dengan data terkait lainnya
        $siswa = SiswaAkun::with([
            'dataDiri',
            'alamat',
            'orangTua',
            'cbtAccount',
            'pilihJurusan.jurusanPilihan1', // Memuat jurusan pilihan 1
            'pilihJurusan.jurusanPilihan2', // Memuat jurusan pilihan 2
            'siswaGelombang',
            'siswaJalurSeleksi',
            'tahunPelajaran',
            'pembayaran',
            'pilihProgramTambahan'
        ])->where('id', $userId)->firstOrFail();

        $settings = Settings::where('status', true)->first();

        $pembayarans = SiswaPembayaran::with(['biaya'])
                 ->where('siswa_id', $userId)
                 ->get();
        
        // Hitung total pembayaran
        $totalPembayaran = $pembayarans->sum(function($pembayaran) {
            return $pembayaran->biaya->jumlah_biaya; // Pastikan jumlah_biaya adalah nama kolom di tabel biaya
        });

        // Konversi total pembayaran ke terbilang
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('id');
        $terbilang = $numberTransformer->toWords($totalPembayaran);

        // Menampilkan view dengan data siswa
        // return view('siswa.cetak_formulir', compact('siswa','settings','pembayarans','totalPembayaran', 'terbilang'));

        // Menyiapkan data untuk dikirim ke view
        $pdf = PDF::loadView('siswa.cetak_formulir', compact('siswa','settings','pembayarans','totalPembayaran', 'terbilang'));

        // Set the paper size to A4, orientation to portrait
        $pdf->setPaper('A4', 'portrait');

        // Kembalikan PDF untuk di-download
        $namaFile = 'formulir-pendaftaran-' . str_replace(' ', '_', $siswa->nama_lengkap) . '.pdf';
        return $pdf->download($namaFile);
    }
}
