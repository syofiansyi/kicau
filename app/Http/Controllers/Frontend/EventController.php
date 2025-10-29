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
        $search = $request->input('search');

       $events = Event::where('status', 0)
    ->when($search, function ($query, $search) {
        $query->where(function ($q) use ($search) {
            $q->where('title', 'LIKE', "%{$search}%")
              ->orWhere('tanggal', 'LIKE', "%{$search}%")
              ->orWhere('lokasi', 'LIKE', "%{$search}%");
        });
    })
    ->latest()
    ->paginate(30);


        if ($events->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data event ditemukan.');
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
