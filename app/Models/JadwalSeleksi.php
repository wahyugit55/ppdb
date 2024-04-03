<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class JadwalSeleksi extends Model
{
    use HasFactory;

    protected $table = 'jadwal_seleksi';

    protected $fillable = [
        'id',
        'tgl_seleksi',
        'lokasi_seleksi',
        'link_seleksi',
        'status',
    ];

    protected $casts = [
        'id' => 'string',
        'tgl_seleksi' => 'date',
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

    // Relasi ke Siswa
    public function siswa()
    {
        return $this->belongsTo(SiswaAkun::class, 'siswa_id');
    }
}
