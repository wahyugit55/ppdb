<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SiswaJadwalSeleksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('siswa_jadwal_seleksi')->insert([
            'id' => Str::uuid(),
            'siswa_id' => '3207ae76-acdb-4dd1-8b09-5817544c9944',
            'jadwal_seleksi_id' => '4fde37ef-166e-4bf9-96b5-eb14d935ef2e',
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
