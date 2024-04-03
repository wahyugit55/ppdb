<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class OrangTua extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id', 'nama_ayah', 'pekerjaan_ayah', 'penghasilan_ayah', 'no_hp_ayah',
        'nama_ibu', 'pekerjaan_ibu', 'penghasilan_ibu', 'no_hp_ibu', 'status'
    ];

    protected $table = 'orang_tua';

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
