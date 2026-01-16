<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Anggota;
use App\Models\Produk;
use App\Models\Hasil_pertandingan;
use App\Models\Juara;
use App\Models\Tip;
use App\Models\Klasement;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Happening;
use App\Models\Art;
use App\Models\Jadwal;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        try {
            $search = $request->input('search');
            $filter = $request->input('filter');
            $isSearching = $request->has('search') && $filter == 'all';
            if ($request->has('search') && filled($search)) {
                switch ($filter) {
                    case 'news':
                        // arahkan ke /artikel_berita?search=...
                        return redirect()->to(
                            url('/artikel_berita') . '?search=' . rawurlencode($search)
                        );

                    case 'events':
                        return redirect()->to(
                            url('/event') . '?search=' . rawurlencode($search)
                        );
                    case 'produk':
                        return redirect()->to(
                            url('/produk') . '?search=' . rawurlencode($search)
                        );
                    case 'tips':
                        return redirect()->to(
                            url('/tips') . '?search=' . rawurlencode($search)
                        );
                    default:
                        // tetap di home jika filter kosong / tak dikenal
                        break;
                }
            }

            $sliders = Slider::where('status', 0)
                ->where('kategori', 'slider')   // atau kategori_id kalau pakai FK
                ->latest()
                ->get();

            $events = Event::where('status', 0)
                ->when($isSearching, function ($query) use ($search) {
                    $query->where(function ($q) use ($search) {
                        $q->where('title', 'ILIKE', "%{$search}%")
                            ->orWhere('tanggal', 'ILIKE', "%{$search}%")
                            ->orWhere('lokasi', 'ILIKE', "%{$search}%");
                    });
                })
                ->latest() // ganti ke ->orderByDesc('tanggal') kalau mau urut berdasar tanggal event
                ->paginate(30)
                ->withQueryString();


            $hot = News::where('status', 0)->latest()->take(1)->get();
            $news = News::where('status', 0)
                ->when($isSearching, function ($query) use ($search) {
                    $query->where('title', 'ILIKE', "%{$search}%");
                })
                ->latest()
                ->take(10)
                ->get();

            $tips = Tip::when($isSearching, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'ILIKE', "%{$search}%");
                });
            })->latest()->take(10)->get();

            $klasement = Klasement::where('status', 0)->orderBy('posisi', 'desc')->get();
$anggota = Anggota::orderBy('id', 'asc')
    ->limit(10)
    ->get();

            $pertandingan = Hasil_pertandingan::where('status', 0)->latest()->get();
            $juara = Juara::where('status', 0)->when($isSearching, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'ILIKE', "%{$search}%");
                });
            })->latest()->take(10)->get();
            $jadwals = Jadwal::where('status', 0)->when($isSearching, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'ILIKE', "%{$search}%");
                });
            })->latest()->paginate(20, ['*'], 'jadwals_page')->withQueryString();
            $produk = Produk::when($isSearching, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'ILIKE', "%{$search}%");
                });
            })->latest()->take(10)->get();

            if ($isSearching) {


                // // Jika semua kosong
                if (
                    $events->isEmpty() ||
                    $news->isEmpty() ||
                    $produk->isEmpty() ||
                    $tips->isEmpty()
                ) {
                    session()->flash('error', 'Data yang dicari tidak ditemukan di beberopa kategori.');
                }
            }





            return view('frontend.views.home.index', compact(
                'sliders',
                'events',
                'hot',
                'news',
                'klasement',
                'pertandingan',
                'juara',
                'jadwals',
                'search',
                'filter',
                'tips',
                'produk',
                'anggota'

            ));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data: ' . $e->getMessage());
        }
    }


    public function DetailJuara($id)
    {
        $juara = Juara::findorfail($id);

        return view('frontend.views.home.detail_juara', compact('juara'));
    }
}
