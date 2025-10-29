<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchGame extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'match';
    protected $fillable = [
        'group_id',
        'club_home_id',
        'club_away_id',
        'tanggal_pertandingan',
        'skor_home',
        'skor_away',
    ];

    // app/Models/MatchGame.php

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function clubHome()
    {
        return $this->belongsTo(Club::class, 'club_home_id');
    }

    public function clubAway()
    {
        return $this->belongsTo(Club::class, 'club_away_id');
    }

    public function jadwal()
    {
        return $this->hasOneThrough(
            Jadwal::class,  // Model tujuan akhir
            Group::class,   // Model perantara
            'id',           // Primary key di Group yang dihubungkan ke Match
            'id',           // Primary key di Jadwal yang dihubungkan ke Group
            'group_id',     // Foreign key di Match mengarah ke Group
            'jadwal_id'     // Foreign key di Group mengarah ke Jadwal
        );
    }



}
