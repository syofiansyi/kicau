<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;



class ProdukController extends Controller
{
    public function index(Request $request)
    {
       $produk = Produk::latest()->get();
        return view('backend.views.produk.index',compact('produk'));
    }

    public function create()
    {
        return view('backend.produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required|string|max:255',
            'description'=> 'required|string|max:255',
            'harga'      => 'required|numeric',
        ]);

        $photoName = null;

        if ($request->hasFile('photo')) {
            $photoName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('upload/produk'), $photoName);
        }

        Produk::create([
            'photo'       => $photoName,
            'title' => $request->title,
            'description'=> $request->description,
            'harga'      => $request->harga,
        ]);

        return redirect()->route('backend.produk.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id){

        $produk = Produk::findorfail($id);

        return view('backend.views.produk.edit',compact('produk'));
    }
    public function update(Request $request)
    {
        $produk_id = $request->id;
        $old_img = $request->old_image;

        $produk = Produk::findOrFail($produk_id);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'harga' => $request->harga,
            'updated_at' => Carbon::now(),
        ];

        // Jika ada upload file baru
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = 'Upload/produk/';
            $name_gen = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name_gen);
            $save_url = $name_gen;

            // Hapus gambar lama jika ada dan file-nya eksis
            if (!empty($old_img) && File::exists(public_path($old_img))) {
                File::delete(public_path($old_img));
            }

            // Simpan path gambar baru
            $data['photo'] = $save_url;
        }

        $produk->update($data);

        $notification = [
            'message' => $request->hasFile('photo')
                ? 'Produk updated with new image successfully'
                : 'Produk updated without changing image',
            'alert-type' => 'success'
        ];

        return redirect()->route('backend.produk.index')->with($notification);
    }

  public function destroy($id, Request $request)
{
    $produk = Produk::find($id);

    if (!$produk) {
        return back()->with('error', 'Produk tidak ditemukan');
    }

    // Hapus file photo jika ada
    if ($produk->photo && file_exists(public_path('upload/produk/' . $produk->photo))) {
        unlink(public_path('upload/produk/' . $produk->photo));
    }

    $produk->delete();
     $notification = [
            'message' => $request->hasFile('photo')
                ? 'Produk deleted with new image successfully'
                : 'Produk deleted without changing image',
            'alert-type' => 'success'
        ];


 return redirect()->route('backend.produk.index')->with($notification);}

}
