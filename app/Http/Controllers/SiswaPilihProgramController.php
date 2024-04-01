<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Models\ProgramTambahan;
use App\Models\PilihProgramTambahan;
use App\Models\SiswaPilihJurusan;
use Illuminate\Support\Facades\Auth;

class SiswaPilihProgramController extends Controller
{
    public function index()
    {
        $programTambahan = ProgramTambahan::where('status', true)
                    ->where('program_wajib', false)
                    ->get();
        $pilihanSiswa = SiswaPilihJurusan::where('siswa_id', auth()->user()->id)->first();
        $pilihanProgramTambahan = PilihProgramTambahan::where('siswa_id', auth()->user()->id)->pluck('program_tambahan_id')->first();

        // Tentukan ID Program Tambahan Wajib berdasarkan pilihan jurusan siswa
        $programTambahanWajib = null;
        if ($pilihanSiswa) {
            $jurusanDipilih = Jurusan::find($pilihanSiswa->pilihan_1);
            // Cek apakah jurusan memiliki program tambahan wajib terkait
            if ($jurusanDipilih && $jurusanDipilih->program_tambahan_id) {
                $programTambahanWajib = ProgramTambahan::find($jurusanDipilih->program_tambahan_id);
            }
        }

        return view('siswa.programtambahan', compact('programTambahan','pilihanProgramTambahan','programTambahanWajib'));
    }

    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'program_tambahan_id' => 'required|exists:program_tambahan,id',
        ]);

        // Cek apakah sudah memilih program tambahan sebelumnya
        $sudahMemilih = PilihProgramTambahan::where('siswa_id', Auth::id())->first();
        if ($sudahMemilih) {
            // Update pilihan jika sudah ada
            $sudahMemilih->update([
                'program_tambahan_id' => $request->program_tambahan_id,
            ]);
        } else {
            // Buat pilihan baru jika belum ada
            PilihProgramTambahan::create([
                'siswa_id' => Auth::id(),
                'program_tambahan_id' => $request->program_tambahan_id,
            ]);
        }

        return response()->json(['success' => 'Program tambahan berhasil dipilih.']);
    }
}
