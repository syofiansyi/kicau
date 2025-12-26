<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->search);

        $anggota = Anggota::when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_pemilik', 'ILIKE', "%{$search}%")
                    ->orWhere('nama_burung', 'ILIKE', "%{$search}%");
            });
        })
            ->latest()
            ->paginate(6);


        if ($search && $anggota->total() === 0) {
            return redirect()->route('anggota')
                ->with('error', 'Data yang dicari tidak ditemukan.');
        }

        return view('frontend.anggota.index', compact('anggota'));
    }

    public function show($id)
    {
        $anggota = Anggota::where('id', $id)->firstOrFail();

        return view('frontend.views.anggota.detail_anggota', compact('anggota'));
    }
}
