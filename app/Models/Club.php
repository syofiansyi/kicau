<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'club';

    // Club.php
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_club', 'club_id', 'group_id');
    }
}
