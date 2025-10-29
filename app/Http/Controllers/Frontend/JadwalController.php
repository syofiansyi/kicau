<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Jadwal;
use App\Models\MatchGame;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {

        $jadwals = Jadwal::where('status',0)->latest()->paginate(20, ['*'], 'jadwals_page');
        // echo ($arts) ;
        // exit;


        return view('frontend.views.jadwal.index', compact( 'jadwals',));
    }
    public function group($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        // Ganti get() menjadi paginate()
        $groups = Group::where('jadwal_id', $id)->paginate(20); // misalnya 8 per halaman

        return view('frontend.views.jadwal.group', compact('jadwal', 'groups'));
    }


    public function match($jadwalId, $groupId)
    {
        $jadwal = Jadwal::with(['groups.clubs'])->findOrFail($jadwalId);
        $groupSelected = Group::with('clubs')->findOrFail($groupId);

        $matches = MatchGame::with(['clubHome', 'clubAway'])
            ->where('group_id', $groupId)
            ->get();


        return view('frontend.views.jadwal.match', compact('jadwal', 'groupSelected', 'matches'));
    }



}
