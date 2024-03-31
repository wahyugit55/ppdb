<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gelombang;
use App\Models\SiswaGelombang;
use Illuminate\Support\Facades\Validator;

class SiswaGelombangController extends Controller
{
    public function index()
    {
        $gelombang = Gelombang::orderBy('nama_gelombang', 'asc')->get();
        $siswaId = auth()->user()->id;

        // Cek apakah siswa sudah terdaftar di gelombang apa pun dan dapatkan ID gelombang tersebut
        $sudahMemilihGelombang = SiswaGelombang::where('siswa_id', $siswaId)->exists();
        $gelombangDipilih = SiswaGelombang::where('siswa_id', $siswaId)->first();
        $gelombangDipilihId = $gelombangDipilih ? $gelombangDipilih->gelombang_id : null;

        return view('siswa.gelombang', compact('gelombang', 'sudahMemilihGelombang', 'gelombangDipilihId'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'siswa_id' => 'required|exists:akun_siswa,id',
            'gelombang_id' => 'required|exists:gelombang,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        SiswaGelombang::create($request->all());

        return response()->json(['success' => 'Data gelombang siswa berhasil disimpan.']);

        return redirect()->back();
    }

}
