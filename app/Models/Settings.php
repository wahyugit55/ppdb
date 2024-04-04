<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Settings extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'nama_sekolah',
        'npsn',
        'alamat',
        'kota',
        'provinsi',
        'file_logo',
        'nama_cs',
        'no_cs',
        'info_bayar',
        'nama_kepsek',
        'nip_kepsek',
        'ppdb_open',
        'ppdb_close',
        'no_rek',
        'atas_nama_rek',
        'nama_bank',
        'file_kop_surat',
        'file_ttd',
        'file_stempel',
        'width_ttd',
        'width_stempel',
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
