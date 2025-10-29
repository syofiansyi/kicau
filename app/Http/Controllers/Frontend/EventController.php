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
    public function index()
    {
        $events = Event::where('status', 0)->latest()->paginate(30);


        return view('frontend.views.event.index', compact('events'));
    }

    public function getDetailEvent($id)
    {

        $event = Event::Findorfail($id);
        return view('frontend.views.event.detail_event', compact('event'));
    }
}
