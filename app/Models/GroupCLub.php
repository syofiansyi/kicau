<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupCLub extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'group_club';
    protected $fillable = [
        'group_id',
        'club_id',
    ];
}
