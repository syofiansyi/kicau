<?php

namespace App\Http\Controllers\Frontend;

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
            $search = trim((string) $request->input('search'));
            $isSearching = $request->has('search') && filled($search);

            $jadwals = Jadwal::where('status', 0)
                ->when($isSearching, function ($query) use ($search) {
                    $query->where(function ($q) use ($search) {
                        $q->where('title', 'ILIKE', "%{$search}%")
                            ->orWhere('tanggal_mulai', 'ILIKE', "%{$search}%")
                            ->orWhere('tanggal_selesai', 'ILIKE', "%{$search}%");

                        // Jika kolom tanggal_* adalah DATE (bukan string), gunakan salah satu di bawah (ganti ILIKE di atas):
                        // $q->orWhereRaw("to_char(tanggal_mulai, 'YYYY-MM-DD') ILIKE ?", ["%{$search}%"])
                        //   ->orWhereRaw("to_char(tanggal_selesai, 'YYYY-MM-DD') ILIKE ?", ["%{$search}%"]);
                    });
                })
                ->latest() // ganti ke ->orderByDesc('tanggal_mulai') jika mau urut berdasarkan tanggal event
                ->paginate(20, ['*'], 'jadwals_page')
                ->withQueryString();

            // Jika page di luar jangkauan (mis. ?jadwals_page=999), redirect ke halaman terakhir
            if ($jadwals->isEmpty() && $jadwals->currentPage() > 1 && $jadwals->lastPage() >= 1) {
                return redirect()->to($request->url() . '?' . http_build_query(array_merge(
                    $request->query(),
                    ['jadwals_page' => $jadwals->lastPage()]
                )));
            }

            // Jika memang sedang mencari dan total hasil 0 → redirect ke halaman "pertandingan"
            if ($isSearching && $jadwals->total() === 0) {
                return redirect()->route('pertandingan')->with('error', 'Data yang dicari tidak ditemukan.');
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
