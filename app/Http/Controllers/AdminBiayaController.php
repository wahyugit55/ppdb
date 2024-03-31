<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biaya;

class AdminBiayaController extends Controller
{
    public function index()
    {
        $biaya = Biaya::all();
        return view('admin.biaya', compact('biaya'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_biaya' => 'required|string|max:255',
            'jumlah_biaya' => 'required|numeric',
            // Anda tidak perlu memvalidasi status dan status_wajib karena sudah memiliki nilai default
        ]);

        Biaya::create($request->all());

        return redirect()->back()->with('success', 'Biaya berhasil ditambahkan.');
    }
}
