<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Tip;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;



class TipsController extends Controller
{
    public function index(Request $request)
    {
        $tips = Tip::latest()->get();
        return view('backend.views.tips.index', compact('tips'));
    }

    public function create()
    {
        return view('backend.tips.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tanggal'     => 'required|date',
            'description' => 'required',
        ]);

        $photoName = null;

        if ($request->hasFile('photo')) {
            $photoName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('upload/tips'), $photoName);
        }

        Tip::create([
            'title'       => $request->title,
            'photo'       => $photoName,
            'tanggal'     => $request->tanggal,
            'description' => $request->description,
            'slug'        => Str::slug($request->title),
        ]);

        return redirect()->route('backend.tips.index')
            ->with('success', 'Tips berhasil ditambahkan');
    }

    public function edit($id)
    {

        $tip = Tip::findorfail($id);

        return view('backend.views.tips.edit', compact('tip'));
    }
    public function update(Request $request)
    {
        $tip_id = $request->id;
        $old_img = $request->old_image;

        $tip = Tip::findOrFail($tip_id);

        $data = [
            'title' => ucfirst($request->title),
            'slug' => strtolower(str_replace(' ', '-', $request->title)),
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ];

        // Jika ada upload file baru
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = 'Upload/tips/';
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

        $tip->update($data);

        $notification = [
            'message' => $request->hasFile('photo')
                ? 'Tips updated with new image successfully'
                : 'Tips updated without changing image',
            'alert-type' => 'success'
        ];

        return redirect()->route('backend.tips.index')->with($notification);
    }

    public function destroy($id, Request $request)
    {
        $tip = Tip::find($id);

        if (!$tip) {
            return back()->with('error', 'Tips tidak ditemukan');
        }

        // Hapus file photo jika ada
        if ($tip->photo && file_exists(public_path('upload/tips/' . $tip->photo))) {
            unlink(public_path('upload/tips/' . $tip->photo));
        }

        $tip->delete();
        $notification = [
            'message' => $request->hasFile('photo')
                ? 'Tips deleted with new image successfully'
                : 'Tips deleted without changing image',
            'alert-type' => 'success'
        ];


        return redirect()->route('backend.tips.index')->with($notification);
    }
}
