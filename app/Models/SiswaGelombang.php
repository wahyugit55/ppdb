<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SiswaGelombang extends Model
{
    use HasFactory;

    protected $table = 'siswa_gelombang';

    protected $fillable = [
        'siswa_id', 'gelombang_id', 'status'
    ];

    /**
     * Relasi ke model AkunSiswa.
     */
    public function akunSiswa()
    {
        return $this->belongsTo(SiswaAkun::class, 'siswa_id');
    }

    /**
     * Relasi ke model Gelombang.
     */
    public function gelombang()
    {
        return $this->belongsTo(Gelombang::class, 'gelombang_id');
    }

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }
}
