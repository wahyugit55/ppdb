<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class DetailAngsuran extends Model
{
    use HasFactory;

    protected $table = 'detail_angsuran';
    
    protected $fillable = [
        'data_angsuran_id',
        'uraian',
        'jumlah_pembayaran',
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
