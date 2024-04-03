<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SiswaJadwalSeleksi extends Model
{
    use HasFactory;

    protected $table = 'siswa_jadwal_seleksi';
    protected $fillable = ['siswa_id', 'jadwal_seleksi_id', 'status'];

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

    public function siswa()
    {
        return $this->belongsTo(SiswaAkun::class, 'siswa_id', 'id');
    }

    public function jadwalSeleksi()
    {
        return $this->belongsTo(JadwalSeleksi::class, 'jadwal_seleksi_id', 'id');
    }
}
