<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Models\SiswaAkun;
use Illuminate\Http\Request;

class AdminPendaftarController extends Controller
{
    public function index()
    {
        $siswas = SiswaAkun::with(['dataDiri', 'pilihJurusan.jurusanPilihan1', 'pilihJurusan.jurusanPilihan2', 'alamat', 'orangTua', 'pembayaran.biaya'])
                     ->where('status', true)
                     ->get();

        // Ambil semua biaya dengan status_wajib true
        $biayaWajibIds = Biaya::where('status_wajib', true)->pluck('id')->toArray();

        foreach ($siswas as $siswa) {
            // Inisialisasi flag
            $sudahBayarPendaftaran = true;
            
            // Cek apakah siswa memiliki pembayaran untuk setiap biaya wajib
            foreach ($biayaWajibIds as $biayaId) {
                if (!$siswa->pembayaran->contains('biaya_id', $biayaId)) {
                    $sudahBayarPendaftaran = false;
                    break; // Jika ada satu saja biaya wajib yang belum dibayar, hentikan pemeriksaan
                }
            }
            
            // Menambahkan atribut custom untuk menyimpan status pembayaran pendaftaran
            $siswa->setAttribute('sudahBayarPendaftaran', $sudahBayarPendaftaran);
        }

        return view('admin.pendaftar', compact('siswas'));
    }
}
