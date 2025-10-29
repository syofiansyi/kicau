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
    public function index()
    {
        $sliders = Slider::where('status', 0)->latest()->get();
        $events = Event::where('status', 0)->latest()->take(10)->get();
        $hot = News::where('status', 0)->latest()->take(1)->get();
        $news = News::where('status', 0)->latest()->take(10)->get();
        $klasement = Klasement::where('status', 0)->orderBy('posisi', 'desc')->get();
        $pertandingan = Hasil_pertandingan::where('status', 0)->latest()->get();
        $juara = Juara::where('status', 0)->latest()->take(10)->get();
        $jadwals = Jadwal::where('status', 0)->latest()->paginate(20, ['*'], 'jadwals_page');

        return view('frontend.views.home.index', compact('sliders', 'events', 'hot', 'news', 'klasement', 'pertandingan', 'juara', 'jadwals'));
    }

    public function DetailJuara($id)
    {
        $juara = Juara::findorfail($id);

        return view('frontend.views.home.detail_juara', compact('juara'));
    }
}
