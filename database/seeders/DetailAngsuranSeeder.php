<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DetailAngsuranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detail_angsuran')->insert([
            'id' => Str::uuid(),
            'data_angsuran_id' => '3d7a941e-bbf9-42c2-9a0a-0eeea603817f',
            'uraian' => 'Biaya DSP',
            'jumlah_pembayaran' => 500000,
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
