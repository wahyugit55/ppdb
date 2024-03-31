<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SiswaJalurSeleksi extends Model
{
    use HasFactory;

    protected $table = 'siswa_jalur_seleksi';
    protected $fillable = ['siswa_id', 'jalur_id', 'status'];

    protected $casts = [
        'id' => 'string',
        'siswa_id' => 'string',
        'jalur_id' => 'string',
        'status' => 'boolean',
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

    public function siswa()
    {
        return $this->belongsTo(SiswaAkun::class, 'siswa_id');
    }

    public function jalurSeleksi()
    {
        return $this->belongsTo(JalurSeleksi::class, 'jalur_id');
    }


}
