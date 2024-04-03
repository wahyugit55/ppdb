<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\VerifikasiFormulir;
use App\Models\CbtAccount;
use App\Models\SiswaAkun; // Ganti dengan model yang sesuai untuk akun siswa
use App\Models\DataDiri;
use App\Models\OrangTua;
use App\Models\Alamat;

class VerifikasiFormulirController extends Controller
{
    public function store(Request $request)
    {
        $userId = Auth::user()->id;

        // Cek apakah data diri, orang tua, dan alamat sudah terisi lengkap
        $dataDiri = DataDiri::where('siswa_id', $userId)->first();
        $orangTua = OrangTua::where('siswa_id', $userId)->first();
        $alamat = Alamat::where('siswa_id', $userId)->first();

        // Cek apakah semua data sudah ada dan lengkap
        if (!$dataDiri || !$orangTua || !$alamat) {
            return response()->json(['error' => 'Siswa belum melengkapi formulir'], 400);
        }

        // Pengecekan dan update atau insert data verifikasi formulir
        VerifikasiFormulir::updateOrCreate(
            ['siswa_id' => $userId], // Kunci pencarian
            ['status_verifikasi' => $request->status_verifikasi] // Data yang akan diupdate atau diinsert
        );

        // Proses selanjutnya untuk akun CBT...
        $akunSiswa = SiswaAkun::findOrFail($userId);
        $noPendaftaran = substr($akunSiswa->no_pendaftaran, -7); // Mengambil 7 digit terakhir dari no pendaftaran

        // Cek apakah siswa sudah memiliki akun CBT
        $cbtAccount = CbtAccount::firstOrNew(['siswa_id' => $userId]);
        $cbtAccount->url = 'https://cbt.smktelkom-lpg.sch.id';
        $cbtAccount->username = $noPendaftaran;
        $cbtAccount->password_cbt = $noPendaftaran;
        $cbtAccount->status = true;
        $cbtAccount->save();

        return response()->json(['success' => 'Verifikasi formulir dan akun CBT berhasil disimpan.']);
    }
}
