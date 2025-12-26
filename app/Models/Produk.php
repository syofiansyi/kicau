<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Produk extends Model
{
    protected $table = 'produk';

    protected $fillable = [
        'title',
        'photo',
        'harga',
        'description',
        'slug',
    ];

    protected static function booted()
    {
        static::creating(function ($produk) {
            $produk->slug = Str::slug($produk->title);
        });

        static::updating(function ($produk) {
            $produk->slug = Str::slug($produk->title);
        });
    }
}
