<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JalurSeleksiSeeder extends Seeder
{
    public function run()
    {
        // Kosongkan tabel jalur_seleksi terlebih dahulu
        DB::table('jalur_seleksi')->delete();

        // Masukkan beberapa data contoh
        DB::table('jalur_seleksi')->insert([
            [
                'id' => (string) Str::uuid(),
                'nama_jalur' => 'Jalur Prestasi',
                'persyaratan' => 'Memiliki prestasi di bidang akademik/non-akademik.',
                'status' => true
            ],
            [
                'id' => (string) Str::uuid(),
                'nama_jalur' => 'Jalur Reguler',
                'persyaratan' => 'Melalui proses seleksi administrasi dan wawancara.',
                'status' => true
            ],
            [
                'id' => (string) Str::uuid(),
                'nama_jalur' => 'Jalur Beasiswa',
                'persyaratan' => 'Berprestasi dengan kriteria tertentu dan memenuhi syarat beasiswa.',
                'status' => true
            ]
        ]);
    }
}