<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->search);

        $produk = Produk::when($search, function ($query) use ($search) {
            $query->where('title', 'ILIKE', "%{$search}%");
        })
            ->latest()
            ->paginate(6);

        if ($search && $produk->total() === 0) {
            return redirect()->route('produk')
                ->with('error', 'Data yang dicari tidak ditemukan.');
        }

        return view('frontend.produk.index', compact('produk'));
    }

    public function show($id)
    {
        $produk = Produk::where('id', $id)->firstOrFail();

        return view('frontend.views.produk.detail_produk', compact('produk'));
    }
}
