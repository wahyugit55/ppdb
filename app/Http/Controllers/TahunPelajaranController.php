<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunPelajaran;
use Illuminate\Support\Facades\Validator;

class TahunPelajaranController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_tahun_pelajaran' => 'required|string|max:255',
            'semester' => 'required|string|max:255',
            // 'status' is boolean and default to false, so no need to validate it here
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $tahunPelajaran = TahunPelajaran::create($validator->validated());
        return response()->json(['message' => 'Tahun Pelajaran successfully created', 'data' => $tahunPelajaran], 201);
    }

    public function edit($id)
    {
        $tahunPelajaran = TahunPelajaran::find($id);

        if (!$tahunPelajaran) {
            return response()->json(['message' => 'Tahun Pelajaran not found'], 404);
        }

        return response()->json($tahunPelajaran);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_tahun_pelajaran' => 'required|string|max:255',
            'semester' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $tahunPelajaran = TahunPelajaran::find($id);

        if (!$tahunPelajaran) {
            return response()->json(['message' => 'Tahun Pelajaran not found'], 404);
        }

        $tahunPelajaran->update($validator->validated());
        return response()->json(['message' => 'Tahun Pelajaran successfully updated', 'data' => $tahunPelajaran]);
    }

    public function destroy($id)
    {
        $tahunPelajaran = TahunPelajaran::find($id);

        if (!$tahunPelajaran) {
            return response()->json(['message' => 'Tahun Pelajaran not found'], 404);
        }

        $tahunPelajaran->delete();
        return response()->json(['message' => 'Tahun Pelajaran successfully deleted']);
    }
}