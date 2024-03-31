<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use Illuminate\Http\Request;

class GelombangController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_gelombang' => 'required|string|max:255',
            'tahun_pelajaran_id' => 'required|exists:tahun_pelajaran,id',
            'tgl_dibuka' => 'required|date',
            'tgl_ditutup' => 'required|date',
            // 'status' is not required because it defaults to false
        ]);

        $gelombang = Gelombang::create($validated);

        return response()->json(['message' => 'Gelombang created successfully', 'data' => $gelombang]);
    }

    // Add methods for edit, update, destroy, etc.
    
}
