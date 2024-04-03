<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class HasilSeleksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hasil_seleksi')->insert([
            'id' => Str::uuid(),
            'siswa_id' => '3207ae76-acdb-4dd1-8b09-5817544c9944',
            'nilai_tpa' => 75,
            'nilai_wawancara' => 'Sangat Baik',
            'nilai_agama' => 'Baik',
            'nilai_buta_warna' => 'Sangat Baik',
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
