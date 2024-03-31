<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TahunPelajaran;

class TahunPelajaranTableSeeder extends Seeder
{
    public function run()
    {
        TahunPelajaran::create([
            'nama_tahun_pelajaran' => '2021/2022',
            'semester' => 'Ganjil',
            'status' => false,
        ]);

        TahunPelajaran::create([
            'nama_tahun_pelajaran' => '2021/2022',
            'semester' => 'Genap',
            'status' => false,
        ]);
    }
}

