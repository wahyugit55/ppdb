<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SiswaPilihJurusan extends Model
{
    use HasFactory;

    protected $table = 'pilih_jurusan';

    protected $fillable = [
        'siswa_id', 'pilihan_1', 'pilihan_2', 'status'
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

    // Definisi relasi jika diperlukan
    public function siswa()
    {
        return $this->belongsTo(SiswaAkun::class, 'siswa_id');
    }

    public function jurusanPilihan1()
    {
        return $this->belongsTo(Jurusan::class, 'pilihan_1');
    }

    public function jurusanPilihan2()
    {
        return $this->belongsTo(Jurusan::class, 'pilihan_2');
    }
}
