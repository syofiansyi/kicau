<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;



class AnggotaController extends Controller
{
    public function index(Request $request)
    {
       $anggota = Anggota::latest()->get();
        return view('backend.views.anggota.index',compact('anggota'));
    }

    public function create()
    {
        return view('backend.anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nama_burung' => 'required|string|max:255',
            'nama_pemilik'=> 'required|string|max:255',
            'alamat'      => 'required|string|max:500',
        ]);

        $photoName = null;

        if ($request->hasFile('photo')) {
            $photoName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('Upload/anggota'), $photoName);
        }

        Anggota::create([
            'photo'       => $photoName,
            'nama_burung' => $request->nama_burung,
            'nama_pemilik'=> $request->nama_pemilik,
            'alamat'      => $request->alamat,
        ]);

        return redirect()->route('backend.anggota.index')
            ->with('success', 'Anggota berhasil ditambahkan');
    }

    public function edit($id){

        $anggota = Anggota::findorfail($id);

        return view('backend.views.anggota.edit',compact('anggota'));
    }
    public function update(Request $request)
    {
        $anggota_id = $request->id;
        $old_img = $request->old_image;

        $anggota = Anggota::findOrFail($anggota_id);

        $data = [
            'nama_burung' => $request->nama_burung,
            'nama_pemilik' => $request->nama_pemilik,
            'alamat' => $request->alamat,
            'updated_at' => Carbon::now(),
        ];

        // Jika ada upload file baru
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = 'Upload/anggota/';
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

        $anggota->update($data);

        $notification = [
            'message' => $request->hasFile('photo')
                ? 'Anggota updated with new image successfully'
                : 'Anggota updated without changing image',
            'alert-type' => 'success'
        ];

        return redirect()->route('backend.anggota.index')->with($notification);
    }

  public function destroy($id, Request $request)
{
    $anggota = Anggota::find($id);

    if (!$anggota) {
        return back()->with('error', 'Anggota tidak ditemukan');
    }

    // Hapus file photo jika ada
    if ($anggota->photo && file_exists(public_path('upload/anggota/' . $anggota->photo))) {
        unlink(public_path('upload/anggota/' . $anggota->photo));
    }

    $anggota->delete();
     $notification = [
            'message' => $request->hasFile('photo')
                ? 'Anggota deleted with new image successfully'
                : 'Anggota deleted without changing image',
            'alert-type' => 'success'
        ];


 return redirect()->route('backend.anggota.index')->with($notification);}

}
