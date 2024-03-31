<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Biaya;
use Illuminate\Support\Str;

class BiayaTableSeeder extends Seeder
{
    public function run()
    {
        Biaya::create([
            'id' => Str::uuid(),
            'nama_biaya' => 'Pendaftaran Baru',
            'jumlah_biaya' => 500000.00, // Misal, 500000 dalam bentuk desimal
            'status' => true,
            'status_wajib' => true
        ]);
    }
}
