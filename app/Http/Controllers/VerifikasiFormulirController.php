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

        // Ambil data dari database
        $dataDiri = DataDiri::where('siswa_id', $userId)->first();
        $orangTua = OrangTua::where('siswa_id', $userId)->first();
        $alamat = Alamat::where('siswa_id', $userId)->first();

        // Definisikan kolom yang perlu dicek untuk setiap tabel
        $kolomDataDiri = ['siswa_id', 'ukuran_baju', 'nik', 'tempat_lahir', 'tgl_lahir', 'jenis_kelamin', 'agama', 'status'];
        $kolomOrangTua = ['siswa_id', 'nama_ayah', 'no_hp_ayah', 'nama_ibu', 'no_hp_ibu', 'status'];
        $kolomAlamat = ['siswa_id', 'provinces_id', 'regencies_id', 'districts_id','villages_id','status','alamat','rt','rw'];

        // Fungsi untuk mengecek kelengkapan data berdasarkan array kolom yang diberikan
        function cekKelengkapanData($data, $kolomWajib) {
            foreach ($kolomWajib as $kolom) {
                if (empty($data->$kolom)) {
                    return false;
                }
            }
            return true;
        }

        // Cek kelengkapan data untuk DataDiri, OrangTua, dan Alamat
        $isDataDiriComplete = $dataDiri && cekKelengkapanData($dataDiri, $kolomDataDiri);
        $isOrangTuaComplete = $orangTua && cekKelengkapanData($orangTua, $kolomOrangTua);
        $isAlamatComplete = $alamat && cekKelengkapanData($alamat, $kolomAlamat);

        // Cek apakah semua data sudah ada dan lengkap
        if (!$isDataDiriComplete || !$isOrangTuaComplete || !$isAlamatComplete) {
            // return response()->json(['error' => 'Siswa belum melengkapi formulir'], 400);
            return redirect()->back()->with('error', 'Siswa belum melengkapi formulir');
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

        // return response()->json(['success' => 'Verifikasi formulir dan akun CBT berhasil disimpan.']);
        return redirect()->back()->with('success', 'Verifikasi formulir berhasil disimpan');
    }
}
