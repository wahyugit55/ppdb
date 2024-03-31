<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JurusanTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('jurusan')->insert([
            [
                'id' => Str::uuid(),
                'kode_jurusan' => 'KJ001',
                'nama_jurusan' => 'Teknik Informatika',
                'kuota' => 100,
                'status' => true,
            ],
            [
                'id' => Str::uuid(),
                'kode_jurusan' => 'KJ002',
                'nama_jurusan' => 'Sistem Informasi',
                'kuota' => 100,
                'status' => true,
            ],
            [
                'id' => Str::uuid(),
                'kode_jurusan' => 'KJ003',
                'nama_jurusan' => 'Teknik Elektro',
                'kuota' => 100,
                'status' => true,
            ],
        ]);
    }
}
