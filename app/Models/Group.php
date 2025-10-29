<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'group';

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    // Group.php
    public function clubs()
    {
        return $this->belongsToMany(Club::class, 'group_club', 'group_id', 'club_id');
    }

    public function matches()
    {
        return $this->hasMany(MatchGame::class);
    }
}
