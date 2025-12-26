<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Anggota extends Model
{
    protected $table = 'anggota';

    protected $fillable = [
        'title',
        'photo',
        'tanggal',
        'nama_burung',
        'nama_pemilik',
        'alamat',
        'slug',
    ];

    protected static function booted()
    {
        static::creating(function ($anggota) {
            $anggota->slug = Str::slug($anggota->title);
        });

        static::updating(function ($anggota) {
            $anggota->slug = Str::slug($anggota->title);
        });
    }
}
