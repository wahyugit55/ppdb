<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DataAngsuranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_angsuran')->insert([
            'id' => Str::uuid(),
            'template_angsuran_id' => '4a51d9a5-0989-42de-aedb-85622a56b938',
            'jenis_pembayaran' => 'Angsuran Ke 1',
            'tgl_awal_pembayaran' => '2023-12-21',
            'tgl_akhir_pembayaran' => '2024-12-21',
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
