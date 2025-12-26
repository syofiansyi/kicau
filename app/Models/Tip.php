<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tip extends Model
{
    protected $table = 'tips';

    protected $fillable = [
        'title',
        'photo',
        'tanggal',
        'description',
        'slug',
    ];

    protected static function booted()
    {
        static::creating(function ($tip) {
            $tip->slug = Str::slug($tip->title);
        });

        static::updating(function ($tip) {
            $tip->slug = Str::slug($tip->title);
        });
    }
}
