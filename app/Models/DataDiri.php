<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DataDiri extends Model
{
    use HasFactory;

    protected $table = 'data_diri';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'siswa_id', 'ukuran_baju', 'nik', 'tempat_lahir', 'tgl_lahir', 'jenis_kelamin', 'agama', 'status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    public function siswa()
    {
        return $this->belongsTo(SiswaAkun::class, 'siswa_id');
    }
}
