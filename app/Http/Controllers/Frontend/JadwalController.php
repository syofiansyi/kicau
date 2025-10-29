<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Jadwal;
use App\Models\MatchGame;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
     public function index(Request $request)
{
    try {
        $search = $request->input('search');

        $jadwals = Jadwal::where('status', 0)
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                      ->orWhere('tanggal_mulai', 'LIKE', "%{$search}%")
                      ->orWhere('tanggal_selesai', 'LIKE', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(20, ['*'], 'jadwals_page');

        if ($jadwals->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data pertandingan ditemukan.');
        }

        return view('frontend.views.jadwal.index', compact('jadwals', 'search'));
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data pertandingan: ' . $e->getMessage());
    }
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
