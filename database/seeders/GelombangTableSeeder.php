<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GelombangTableSeeder extends Seeder
{
    public function run()
    {
        // Pastikan Anda sudah memiliki ID dari tahun_pelajaran yang ingin dihubungkan
        $tahun_pelajaran_id = '9b28bfba-ddf1-4692-9e70-8049869c21c6'; // Sesuaikan ini

        DB::table('gelombang')->insert([
            [
                'id' => Str::uuid(),
                'nama_gelombang' => 'Gelombang 1',
                'tahun_pelajaran_id' => $tahun_pelajaran_id,
                'tgl_dibuka' => '2022-01-01',
                'tgl_ditutup' => '2022-06-30',
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'nama_gelombang' => 'Gelombang 2',
                'tahun_pelajaran_id' => $tahun_pelajaran_id,
                'tgl_dibuka' => '2022-07-01',
                'tgl_ditutup' => '2022-12-31',
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'nama_gelombang' => 'Gelombang 3',
                'tahun_pelajaran_id' => $tahun_pelajaran_id,
                'tgl_dibuka' => '2023-01-01',
                'tgl_ditutup' => '2023-06-30',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
