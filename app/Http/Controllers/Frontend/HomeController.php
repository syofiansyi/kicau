<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Hasil_pertandingan;
use App\Models\Juara;
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

        // redirect jika user melakukan pencarian
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
                case 'jadwals':
                    return redirect()->to(
                        url('/jadwal_pertandingan') . '?search=' . rawurlencode($search)
                    );
                default:
                    // tetap di home jika filter kosong / tak dikenal
                    break;
            }
        }

        // data default home
        $sliders = Slider::where('status', 0)->latest()->get();
        $events = Event::where('status', 0)->latest()->take(10)->get();
        $hot = News::where('status', 0)->latest()->take(1)->get();
        $news = News::where('status', 0)->latest()->take(10)->get();
        $klasement = Klasement::where('status', 0)->orderBy('posisi', 'desc')->get();
        $pertandingan = Hasil_pertandingan::where('status', 0)->latest()->get();
        $juara = Juara::where('status', 0)->latest()->take(10)->get();

        $jadwals = Jadwal::where('status', 0)
            ->latest()
            ->paginate(20, ['*'], 'jadwals_page')
            ->withQueryString();

        return view('frontend.views.home.index', compact(
            'sliders','events','hot','news','klasement','pertandingan','juara','jadwals','search','filter'
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
