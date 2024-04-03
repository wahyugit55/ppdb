<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class HasilSeleksi extends Model
{
    use HasFactory;

    protected $table = 'hasil_seleksi';

    protected $fillable = [
        'siswa_id',
        'nilai_tpa',
        'nilai_wawancara',
        'nilai_agama',
        'nilai_buta_warna',
        'status'
    ];

    protected $casts = [
        'id' => 'string'
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
}
