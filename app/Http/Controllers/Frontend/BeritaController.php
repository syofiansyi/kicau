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
        $search = trim((string) $request->input('search'));
        $isSearching = $request->has('search') && filled($search);

        $newsQuery = News::where('status', 0)->where('category', 0);

        if ($isSearching) {
            $newsQuery->where(function ($q) use ($search) {
                // Jika 'tanggal' bertipe STRING/VARCHAR, pakai ILIKE langsung:
                $q->where('title', 'ILIKE', "%{$search}%")
                  ->orWhere('tanggal', 'ILIKE', "%{$search}%");

                // Jika 'tanggal' bertipe DATE, ganti baris orWhere di atas
                // dengan salah satu dari dua baris di bawah ini (pilih salah satu):
                // $q->orWhereRaw("to_char(tanggal, 'YYYY-MM-DD') ILIKE ?", ["%{$search}%"]);
                // $q->orWhereRaw("CAST(tanggal AS TEXT) ILIKE ?", ["%{$search}%"]);
            });
        }

        $news = $newsQuery
            ->latest()                 // kalau mau urut berdasarkan tanggal berita: ->orderByDesc('tanggal')
            ->paginate(20)
            ->withQueryString();       // pertahankan ?search= saat pindah halaman

        // Tangani kasus page di luar jangkauan (mis. ?page=999)
        if ($news->isEmpty() && $news->currentPage() > 1 && $news->lastPage() >= 1) {
            return redirect()->to($request->url() . '?' . http_build_query(array_merge(
                $request->query(), ['page' => $news->lastPage()]
            )));
        }

        // Hot news (tetap tampil normal)
        $Hotnews = News::where('status', 0)
            ->where('category', 1)
            ->latest()
            ->get();

        // Jika sedang searching dan total hasil 0 → redirect ke halaman list semua artikel
        if ($isSearching && $news->total() === 0) {
            // kalau punya nama route: return redirect()->route('artikel_berita')->with('error', 'Tidak ada data berita ditemukan.');
            return redirect()->to(url('/artikel_berita'))->with('error', 'Data yang dicari tidak ditemukan.');
        }

        return view('frontend.views.artikel_berita.index', compact('news', 'Hotnews', 'search'));

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat berita: ' . $e->getMessage());
    }
}


    public function DetailBerita($id,$slug){

        $berita = News::findorfail($id);

        return view('frontend.views.artikel_berita.detail_berita',compact('berita'));

    }
}
