<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Biaya;
use App\Models\DataDiri;
use App\Models\OrangTua;
use App\Models\Province;
use App\Models\SiswaAkun;
use App\Models\VerifikasiFormulir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminPendaftarController extends Controller
{
    public function index()
    {
        $siswas = SiswaAkun::with(['dataDiri', 'pilihJurusan.jurusanPilihan1', 'pilihJurusan.jurusanPilihan2', 'alamat', 'orangTua', 'pembayaran.biaya','verifikasiFormulir'])
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

            // Menambahkan logika untuk mengecek status verifikasi formulir
            if ($siswa->verifikasiFormulir) {
                $siswa->setAttribute('statusVerifikasi', $siswa->verifikasiFormulir->status_verifikasi);
            } else {
                // Menandakan bahwa verifikasi formulir belum ada / belum dilakukan
                $siswa->setAttribute('statusVerifikasi', null);
            }
        }

        return view('admin.pendaftar', compact('siswas'));
    }

    public function show($id)
    {
        $siswa = SiswaAkun::with(['dataDiri', 'pilihJurusan.jurusanPilihan1', 'pilihJurusan.jurusanPilihan2', 'alamat', 'orangTua', 'pembayaran.biaya','verifikasiFormulir'])
                        ->where('id', $id)
                        ->where('status', true)
                        ->firstOrFail();
        
        $provinces = Province::all(); // Semua provinsi
        // Ubah Auth::id() menjadi $id untuk mengambil alamat berdasarkan ID siswa yang ditampilkan
        $alamat = Alamat::where('siswa_id', $id)->first(); 
        $selectedProvinceId = $alamat ? $alamat->provinces_id : null; // ID provinsi yang tersimpan di tabel alamat
        // Di dalam method controller Anda
        $selectedRegencyId = $alamat ? $alamat->regencies_id : null;
        $selectedDistrictId = $alamat ? $alamat->districts_id : null;
        $selectedVillageId = $alamat ? $alamat->villages_id : null;
                        
        // Menampilkan view detail pendaftar dengan data siswa
        return view('admin.detail_pendaftar', compact('siswa','alamat', 'provinces', 'selectedProvinceId', 'selectedRegencyId', 'selectedDistrictId', 'selectedVillageId'));
    }

    public function store(Request $request, $siswaId)
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
        $siswa = SiswaAkun::find($siswaId);
        $siswa->update($request->only(['nisn', 'nama_lengkap', 'jenis_sekolah', 'asal_sekolah', 'nomor_hp']));
        // Log::info('Mengupdate biodata siswa dengan ID: ' . $siswaId);
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
        // Log::info('Biodata siswa dengan ID: ' . $siswaId . ' berhasil diperbarui.');
        return redirect()->back()->with('success', 'Biodata berhasil diperbarui.');
    }

    public function alamatstore(Request $request, $siswaId)
    {
        $request->validate([
            'province_id' => 'required|exists:provinces,id',
            'regency_id' => 'required|exists:regencies,id',
            'district_id' => 'required|exists:districts,id',
            'village_id' => 'required|exists:villages,id',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
        ]);

        Log::info('ID: ' . $siswaId . ' ini.');

        $alamat = Alamat::updateOrCreate(
            ['siswa_id' => $siswaId],
            [
                'provinces_id' => $request->province_id, // Sesuaikan nama variabel ini
                'regencies_id' => $request->regency_id,
                'districts_id' => $request->district_id,
                'villages_id' => $request->village_id,
                'alamat' => $request->alamat,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'status' => true
            ]
        );

        return response()->json(['success' => 'Alamat berhasil disimpan.']);
    }

    public function orangtuastore(Request $request, $siswaId)
    {
        $request->validate([
            'nama_ayah' => 'required',
            'no_hp_ayah' => 'required',
            'nama_ibu' => 'required',
            'no_hp_ibu' => 'required',
            'pekerjaan_ayah' => 'required',
            'penghasilan_ayah' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_ibu' => 'required'
        ]);

        $orangtua = OrangTua::updateOrCreate(
            ['siswa_id' => $siswaId],
            [
                'nama_ayah' => $request->nama_ayah, // Sesuaikan nama variabel ini
                'no_hp_ayah' => $request->no_hp_ayah,
                'nama_ibu' => $request->nama_ibu,
                'no_hp_ibu' => $request->no_hp_ibu,
                'pekerjaan_ayah' => $request->pekerjaan_ayah,
                'penghasilan_ayah' => $request->penghasilan_ayah,
                'pekerjaan_ibu' => $request->pekerjaan_ibu,
                'penghasilan_ibu' => $request->penghasilan_ibu,
                'status' => true
            ]
        );

        // return redirect()->back()->with('success', 'Data orang tua berhasil disimpan.');
        return response()->json(['success' => 'Data orang tua berhasil disimpan.']);
    }
    
    // public function verifikasiFormulir(Request $request, $siswaId)
    // {
    //     $request->validate([
    //     'status_verifikasi' => 'required'
    //     ]);

    //     $statusVerifikasi = 1;
    //     if ($request->status_verifikasi === 'unverified') {
    //     $statusVerifikasi = 0;
    //     }

    //     $verifikasi_formulir = VerifikasiFormulir::updateOrCreate(
    //     ['siswa_id' => $siswaId],
    //     [
    //         'status_verifikasi' => $statusVerifikasi,
    //         'alasan_ditolak' => $request->alasan_ditolak,
    //         'status' => true
    //     ]
    //     );

    //     return response()->json(['success' => 'Formulir berhasil diverifikasi.']);
    // }
}
