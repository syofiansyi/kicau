<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'jadwal';

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
