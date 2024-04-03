<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CbtAccount extends Model
{
    use HasFactory;

    protected $table = 'siswa_cbt_account';
    
    protected $fillable = [
        'siswa_id',
        'url',
        'username',
        'password_cbt',
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
