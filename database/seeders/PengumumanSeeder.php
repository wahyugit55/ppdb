<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengumuman_kelulusan')->insert([
            'id' => Str::uuid(),
            'siswa_id' => '3207ae76-acdb-4dd1-8b09-5817544c9944',
            'no_surat' => "008/SMK-TEL/2024",
            'bulan_surat' => '02',
            'tahun_surat' => 2024,
            'status_kelulusan' => 'LULUS',
            'tgl_seleksi_id' => '991007a1-b1fe-4dca-9680-be78a6782be6',
            'tgl_surat' => '2024-01-01',
            'angsuran_id' => '4a51d9a5-0989-42de-aedb-85622a56b938',
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
