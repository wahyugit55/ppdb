<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TahunPelajaran extends Model
{
    protected $table = 'tahun_pelajaran';
    protected $fillable = ['nama_tahun_pelajaran', 'semester', 'status'];
    
    public $incrementing = false;
    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }
}
