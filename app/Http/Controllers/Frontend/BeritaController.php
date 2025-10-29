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
    public function index(Request $request)
{
    try {
        $search = $request->input('search');

        $news = News::where('status', 0)
            ->where('category', 0)
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                      ->orWhere('tanggal', 'LIKE', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(20);

        $Hotnews = News::where('status', 0)
            ->where('category', 1)
            ->latest()
            ->get();

        // kalau tidak ada data sama sekali
        if ($news->isEmpty() && $Hotnews->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data berita ditemukan.');
        }

        return view('frontend.views.artikel_berita.index', compact('news', 'Hotnews', 'search'));
    } catch (\Exception $e) {
        // kalau query error, atau ada error lainnya
        return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat berita: ' . $e->getMessage());
    }
}

    public function DetailBerita($id,$slug){

        $berita = News::findorfail($id);

        return view('frontend.views.artikel_berita.detail_berita',compact('berita'));

    }
}
