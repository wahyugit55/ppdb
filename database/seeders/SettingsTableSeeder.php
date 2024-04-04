<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('settings')->insert([
        'id' => Str::uuid(),
        'nama_sekolah' => 'SMK Telkom Malang',
        'npsn' => '123456789',
        'alamat' => 'Jl. Danau Ranau, Sawojajar',
        'kota' => 'Malang',
        'provinsi' => 'Jawa Timur',
        'file_logo' => 'logo_smktelkom.png',
        'nama_cs' => 'Customer Service SMK Telkom',
        'no_cs' => '0341-712500',
        'info_bayar' => 'Informasi pembayaran dapat dilakukan melalui ...',
        'nama_kepsek' => 'Dr. H. Eko Budi Santoso, M.Kom., M.T.',
        'nip_kepsek' => '197509251998031002',
        'ppdb_open' => '2024-01-01 00:00:00',
        'ppdb_close' => '2024-06-30 23:59:59',
        'no_rek' => '1234567890',
        'atas_nama_rek' => 'Yayasan Pendidikan Telkom',
        'nama_bank' => 'Bank BNI',
        'file_kop_surat' => 'kop_surat_smktelkom.png',
        'file_ttd' => 'ttd_kepsek.png',
        'file_stempel' => 'stempel_smktelkom.png',
        'width_ttd' => 200,
        'width_stempel' => 200,
        'status' => false,
    ]);
}

}
