<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class SiswaAkun extends Authenticatable
{
    use Notifiable;

    protected $table = 'akun_siswa';
    protected $fillable = [
        'nisn', 'nama_lengkap', 'jenis_sekolah', 'asal_sekolah', 'nomor_hp', 'password', 'no_pendaftaran', 'status'
    ];
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function jadwalSeleksi()
    {
        return $this->belongsToMany(JadwalSeleksi::class, 'siswa_jadwal_seleksi', 'siswa_id', 'jadwal_seleksi_id')
                    ->withPivot('status')
                    ->wherePivot('status', true);
    }

    public function dataDiri()
    {
        return $this->hasOne(DataDiri::class, 'siswa_id');
    }
    
}
