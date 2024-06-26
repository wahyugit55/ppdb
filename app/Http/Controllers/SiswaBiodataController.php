<?php

namespace App\Http\Controllers;

use App\Models\SiswaAkun;
use Illuminate\Http\Request;
use App\Models\DataDiri;
use Illuminate\Support\Facades\Auth;
use App\Models\SiswaPilihJurusan;
use App\Models\Province;
use App\Models\Alamat;
use App\Models\OrangTua;

class SiswaBiodataController extends Controller
{
    public function index()
    {
        // Mendapatkan ID siswa yang sedang login
        $siswaId = Auth::user()->id;

        // Mengambil data siswa dari tabel akun_siswa berdasarkan siswa yang login
        $siswa = SiswaAkun::where('id', $siswaId)->where('status', true)->first();

        // Mengambil data diri siswa dari tabel data_diri berdasarkan siswa yang login
        $dataDiri = DataDiri::where('siswa_id', $siswaId)->first();

        // Mengambil data pilihan jurusan siswa
        $pilihanJurusan = SiswaPilihJurusan::with(['jurusanPilihan1', 'jurusanPilihan2'])
            ->where('siswa_id', $siswaId)
            ->first();

        $provinces = Province::all(); // Semua provinsi
        $alamat = Alamat::where('siswa_id', Auth::id())->first(); // Misalkan mengambil alamat berdasarkan siswa_id
        $selectedProvinceId = $alamat ? $alamat->provinces_id : null; // ID provinsi yang tersimpan di tabel alamat
        // Di dalam method controller Anda
        $selectedRegencyId = $alamat ? $alamat->regencies_id : null;
        $selectedDistrictId = $alamat ? $alamat->districts_id : null;
        $selectedVillageId = $alamat ? $alamat->villages_id : null;

        $orangTua = OrangTua::where('siswa_id', $siswaId)->first();

        // Mengirim data ke view
        return view('siswa.biodata', compact('siswa', 'dataDiri', 'pilihanJurusan', 'alamat', 'provinces', 'selectedProvinceId', 'selectedRegencyId', 'selectedDistrictId', 'selectedVillageId', 'orangTua'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nisn' => 'required',
            'nama_lengkap' => 'required',
            'jenis_sekolah' => 'required',
            'asal_sekolah' => 'required',
            'nomor_hp' => 'required',
            'ukuran_baju' => 'required',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
        ]);

        // Update data akun_siswa
        $siswa = SiswaAkun::find(Auth::user()->id);
        $siswa->update($request->only(['nisn', 'nama_lengkap', 'jenis_sekolah', 'asal_sekolah', 'nomor_hp']));

        // Cek apakah sudah ada data diri
        $dataDiri = DataDiri::where('siswa_id', $siswa->id)->first();
        if ($dataDiri) {
            $dataDiri->update($request->only(['ukuran_baju', 'nik', 'tempat_lahir', 'tgl_lahir', 'jenis_kelamin', 'agama']));
        } else {
            DataDiri::create([
                'siswa_id' => $siswa->id,
                'ukuran_baju' => $request->ukuran_baju,
                'nik' => $request->nik,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
            ]);
        }

        return redirect()->back()->with('success', 'Biodata berhasil diperbarui.');
    }

}