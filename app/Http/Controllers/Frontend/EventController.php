<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Art;
use App\Models\Event;
use App\Models\Happening;
use App\Models\Slider;
use Illuminate\Http\Request;

class EventController extends Controller
{
  public function index(Request $request)
{
    try {
        $search = trim((string) $request->input('search'));
        $isSearching = $request->has('search') && filled($search);

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

        // Jika user membuka page di luar jangkauan, redirect ke halaman terakhir
        if ($events->isEmpty() && $events->currentPage() > 1 && $events->lastPage() >= 1) {
            return redirect()
                ->to($request->url() . '?' . http_build_query(array_merge($request->query(), [
                    'page' => $events->lastPage(),
                ])));
        }

        // Jika memang sedang mencari dan total hasil = 0, arahkan ke "semua event"
        if ($isSearching && $events->total() === 0) {
            return redirect()->route('event-all')
                ->with('error', 'Tidak ada data event ditemukan.');
        }

        return view('frontend.views.event.index', compact('events', 'search'));

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data event: ' . $e->getMessage());
    }
}

    public function getDetailEvent($id)
    {

        $event = Event::Findorfail($id);
        return view('frontend.views.event.detail_event', compact('event'));
    }
}
