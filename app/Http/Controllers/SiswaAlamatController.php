<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Illuminate\Support\Facades\Log;

class SiswaAlamatController extends Controller
{
    public function getAlamat()
    {
        $siswaId = Auth::user()->id;
        $alamat = Alamat::where('siswa_id', $siswaId)->firstOrFail(); // Gunakan firstOrFail() untuk memastikan data ada

        // Lakukan query untuk mendapatkan nama berdasarkan ID yang disimpan di tabel alamat
        $selectedProvince = Province::where('id', $alamat->provinces_id ?? null)->first();
        $selectedRegency = Regency::where('id', $alamat->regencies_id ?? null)->first();
        $selectedDistrict = District::where('id', $alamat->districts_id ?? null)->first();
        $selectedVillage = Village::where('id', $alamat->villages_id ?? null)->first();

        return view('siswa.biodata', compact('alamat','selectedProvince', 'selectedRegency', 'selectedDistrict', 'selectedVillage')); // Kirim data alamat ke view
    }


    public function getProvinces()
    {
        $provinces = Province::all();
        return response()->json($provinces);
    }

    public function getRegencies($provinceId)
    {
        $regencies = Regency::where('province_id', $provinceId)->get();
        return response()->json($regencies);
    }

    public function getDistricts($regencyId)
    {
        $districts = District::where('regency_id', $regencyId)->get();
        return response()->json($districts);
    }

    public function getVillages($districtId)
    {
        $villages = Village::where('district_id', $districtId)->get();
        return response()->json($villages);
    }

    public function store(Request $request)
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

        $alamat = Alamat::updateOrCreate(
            ['siswa_id' => Auth::user()->id],
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


}
