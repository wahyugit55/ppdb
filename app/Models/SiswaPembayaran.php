<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class SiswaPembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'kode_transaksi', 'biaya_id', 'siswa_id', 'tgl_pembayaran', 'bukti_pembayaran', 'status'
    ];
    protected $casts = [
        'tgl_pembayaran' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

    // Relasi ke Biaya
    public function biaya()
    {
        return $this->belongsTo(Biaya::class, 'biaya_id');
    }

    // Relasi ke SiswaAkun
    public function siswa()
    {
        return $this->belongsTo(SiswaAkun::class, 'siswa_id');
    }
}
