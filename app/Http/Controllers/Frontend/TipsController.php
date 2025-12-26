<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Tip;
use Illuminate\Http\Request;

class TipsController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->search);

        $tips = Tip::when($search, function ($query) use ($search) {
            $query->where('title', 'ILIKE', "%{$search}%");
        })
            ->latest()
            ->paginate(6);

        if ($search && $tips->total() === 0) {
            return redirect()->route('tips')
                ->with('error', 'Data yang dicari tidak ditemukan.');
        }

        return view('frontend.views.tips.index', compact('tips'));
    }

    public function show($id)
    {
        $tips = Tip::where('id', $id)->firstOrFail();

        return view('frontend.views.tips.detail_tips', compact('tips'));
    }
}
