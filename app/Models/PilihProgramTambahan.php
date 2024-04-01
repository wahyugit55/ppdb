<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PilihProgramTambahan extends Model
{
    use HasFactory;

    protected $table = 'pilih_program_tambahan';

    protected $fillable = ['siswa_id', 'program_tambahan_id', 'status'];

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

    // Relasi ke ProgramTambahan
    public function programTambahan()
    {
        return $this->belongsTo(ProgramTambahan::class, 'program_tambahan_id');
    }
}
