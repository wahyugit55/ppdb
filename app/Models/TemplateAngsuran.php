<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TemplateAngsuran extends Model
{
    use HasFactory;

    protected $table = 'template_angsuran';
    
    protected $fillable = [
        'nama_template',
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

    public function dataAngsuran()
    {
        return $this->hasMany(DataAngsuran::class);
    }
}
