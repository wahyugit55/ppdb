<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JadwalSeleksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('jadwal_seleksi')->insert([
            [
                'id' => Str::uuid(),
                'tgl_seleksi' => now(),
                'lokasi_seleksi' => 'Gedung Serbaguna',
                'link_seleksi' => 'http://example.com/link1',
                'status' => true
            ],
            [
                'id' => Str::uuid(),
                'tgl_seleksi' => now()->addDay(1),
                'lokasi_seleksi' => 'Aula Timur',
                'link_seleksi' => 'http://example.com/link2',
                'status' => true
            ],
            [
                'id' => Str::uuid(),
                'tgl_seleksi' => now()->addDays(2),
                'lokasi_seleksi' => 'Lapangan Olahraga',
                'link_seleksi' => 'http://example.com/link3',
                'status' => false
            ],
        ]);
    }
}
