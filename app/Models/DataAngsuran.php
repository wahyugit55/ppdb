<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class DataAngsuran extends Model
{
    use HasFactory;

    protected $table = 'data_angsuran';
    
    protected $fillable = [
        'template_angsuran_id',
        'jenis_pembayaran',
        'waktu_pembayaran',
        'status'
    ];
    
    protected $casts = [
        'id' => 'string',
        'waktu_pembayaran' => 'date'
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

    public function detailAngsuran()
    {
        return $this->hasMany(DetailAngsuran::class);
    }
}
