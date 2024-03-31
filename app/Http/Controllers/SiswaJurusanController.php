<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\SiswaPilihJurusan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Response;

class SiswaJurusanController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::where('status', true)->get();
        $pilihanSiswa = SiswaPilihJurusan::where('siswa_id', Auth::user()->id)->first();
        
        return view('siswa.pilihjurusan', compact('jurusan', 'pilihanSiswa'));
    }

    public function store(Request $request)
    {
        $rules = [
            'pilihan_1' => 'required|exists:jurusan,id',
            'pilihan_2' => 'required|exists:jurusan,id',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $exists = SiswaPilihJurusan::where('siswa_id', Auth::user()->id)->exists();

        if ($exists) {
            return response()->json(['warning' => 'Anda sudah memilih jurusan. Apakah Anda ingin merubahnya?']);
        }

        SiswaPilihJurusan::create([
            'siswa_id' => Auth::user()->id,
            'pilihan_1' => $request->pilihan_1,
            'pilihan_2' => $request->pilihan_2,
        ]);

        return response()->json(['success' => 'Pilihan jurusan berhasil disimpan.']);
    }
}
