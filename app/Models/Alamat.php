<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Alamat extends Model
{
    use HasFactory;

    protected $table = 'alamat';

    protected $fillable = ['siswa_id', 'alamat','rt','rw', 'provinces_id', 'regencies_id', 'districts_id', 'villages_id', 'status'];


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

    public function province()
    {
        return $this->belongsTo(Province::class, 'provinces_id');
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regencies_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'districts_id');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'villages_id');
    }

    // Relasi ke Siswa
    public function siswa()
    {
        return $this->belongsTo(SiswaAkun::class, 'siswa_id');
    }
}
