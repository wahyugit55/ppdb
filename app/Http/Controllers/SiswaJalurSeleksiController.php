<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JalurSeleksi;
use App\Models\SiswaJalurSeleksi;
use Illuminate\Support\Facades\Validator;

class SiswaJalurSeleksiController extends Controller
{
    
    public function index()
    {
        // Mengambil semua data jalur seleksi yang aktif
        $jalurSeleksi = JalurSeleksi::where('status', true)->get();

        $siswaId = auth()->user()->id; // asumsikan ini mendapatkan ID siswa yang login

        // Cek apakah siswa sudah memilih jalur
        $jalurDipilih = SiswaJalurSeleksi::where('siswa_id', $siswaId)->first();

        // Mengirimkan data ke view
        return view('siswa.jalurseleksi', compact('jalurSeleksi', 'jalurDipilih'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'siswa_id' => 'required|exists:akun_siswa,id',
            'jalur_id' => 'required|exists:jalur_seleksi,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Cek apakah siswa sudah memilih jalur sebelumnya
        $entry = SiswaJalurSeleksi::where('siswa_id', $request->siswa_id)->first();
        
        if($entry) {
            // Jika sudah memilih, update data
            $entry->update(['jalur_id' => $request->jalur_id]);
        } else {
            // Jika belum memilih, buat data baru
            SiswaJalurSeleksi::create($request->all());
        }

        return response()->json(['success' => 'Jalur seleksi berhasil diperbaharui.']);
    }

}
