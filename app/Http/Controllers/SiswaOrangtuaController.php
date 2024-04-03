<?php

namespace App\Http\Controllers;

use App\Models\OrangTua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaOrangtuaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_ayah' => 'required',
            'no_hp_ayah' => 'required',
            'nama_ibu' => 'required',
            'no_hp_ibu' => 'required',
        ]);

        $orangtua = OrangTua::updateOrCreate(
            ['siswa_id' => Auth::user()->id],
            [
                'nama_ayah' => $request->nama_ayah, // Sesuaikan nama variabel ini
                'no_hp_ayah' => $request->no_hp_ayah,
                'nama_ibu' => $request->nama_ibu,
                'no_hp_ibu' => $request->no_hp_ibu,
                'status' => true
            ]
        );

        // return redirect()->back()->with('success', 'Data orang tua berhasil disimpan.');
        return response()->json(['success' => 'Data orang tua berhasil disimpan.']);
    }
}
