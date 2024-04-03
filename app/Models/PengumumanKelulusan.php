<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PengumumanKelulusan extends Model
{
    use HasFactory;

    protected $table = 'pengumuman_kelulusan';

    protected $fillable = [
        'siswa_id',
        'no_surat',
        'bulan_surat',
        'tahun_surat',
        'status_kelulusan',
        'tgl_seleksi_id',
        'tgl_surat',
        'angsuran_id',
        'status'
    ];

    protected $casts = [
        'id' => 'string',
        'tgl_surat' => 'date'
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

    public function hasilSeleksi()
    {
        return $this->hasOne(HasilSeleksi::class, 'siswa_id', 'siswa_id');
    }

    public function templateAngsuran()
    {
        return $this->belongsTo(TemplateAngsuran::class, 'angsuran_id');
    }

    public function siswaJadwalSeleksi()
    {
        return $this->belongsTo(SiswaJadwalSeleksi::class, 'tgl_seleksi_id');
    }

}
