<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Art;
use App\Models\Berita;
use App\Models\Happening;
use App\Models\News;
use App\Models\Slider;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {

        $news = News::where('status', 0)->where('category', 0)->latest()->paginate(20);     // News biasa
        $Hotnews = News::where('status', 0)->where('category', 1)->latest()->get();  // Hot News
        // echo ($arts) ;
        // exit;

        return view('frontend.views.artikel_berita.index', compact( 'news','Hotnews'));
    }

    public function DetailBerita($id,$slug){

        $berita = News::findorfail($id);

        return view('frontend.views.artikel_berita.detail_berita',compact('berita'));

    }
}
