<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Hasil_pertandingan;
use App\Models\Klasement;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class KlasementPertandinganController extends Controller
{
    public function index(){
        $klasement = Klasement::latest()->get();
        $pertandingan= Hasil_pertandingan::latest()->get();

        return view('backend.views.klasement.index',compact('klasement','pertandingan'));
    }

    public function StoreKlasement(Request $request){
        // Validasi input awal (jika diperlukan)
        $validator = Validator::make($request->all(), [
            'nama_burung' => 'required|string|max:255',
            'nama_pemilik' => 'required|string|max:255',
            'alamat' => 'required',
            'posisi' => 'required|integer',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cek apakah posisi sudah ada
        $existingPosisi = Klasement::where('posisi', $request->posisi)->where('status','0')->first();
        if ($existingPosisi) {
            return redirect()->back()->with([
                'message' => 'Posisi tersebut sudah digunakan, silakan pilih posisi lain.',
                'alert-type' => 'error'
            ])->withInput();
        }

        // Upload image
        $image = $request->file('photo');
        $destinationPath = 'Upload/klasement/';
        $name_gen = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $name_gen);
        $save_url = $name_gen;

        // Simpan data
        Klasement::insert([
            'nama_burung' => ucfirst($request->nama_burung),
            'slug' => strtolower(str_replace(' ', '-', $request->nama_burung)),
            'nama_pemilik' => $request->nama_pemilik,
            'posisi' => $request->posisi,
            'alamat' => $request->alamat,
            'photo' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Insert Klasemen Berhasil',
            'alert-type' => 'success'
        ];

        return redirect()->route('klasement_pertandingan')->with($notification);
    }
    public function StorePertandingan(Request $request)
    {
        // Upload photo1
        $image1 = $request->file('photo1');
        $destinationPath = 'Upload/hasil_pertandingan/';
        $name_gen1 = 'team1_' . date('YmdHis') . "." . $image1->getClientOriginalExtension();
        $image1->move($destinationPath, $name_gen1);

        // Upload photo2
        $image2 = $request->file('photo2');
        $name_gen2 = 'team2_' . date('YmdHis') . "." . $image2->getClientOriginalExtension();
        $image2->move($destinationPath, $name_gen2);

        // Insert to database
        Hasil_pertandingan::insert([
            'namateam1'=> ucfirst($request->namateam1),
            'photo1'   => $name_gen1,
            'skor1'    => ucfirst($request->skor1),

            'namateam2'=> ucfirst($request->namateam2),
            'photo2'   => $name_gen2,
            'skor2'    => ucfirst($request->skor2),
            'tanggal'=> $request->tanggal,
            'slug'     => strtolower(str_replace(' ', '-', $request->namateam1 . $request->namateam2)),
            'created_at'=> Carbon::now(),
        ]);

        $notification = [
            'message'    => 'Insert Event Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('klasement_pertandingan')->with($notification);
    }


    public function EditKlasement($id){

        $event = Klasement::findorfail($id);

        return view('backend.views.klasement.edit_klasement',compact('event'));
    }
    public function EditPertandingan($id){

        $pertandingan = Hasil_pertandingan::findorfail($id);

        return view('backend.views.klasement.edit_pertandingan',compact('pertandingan'));
    }


    public function UpdateKlasement(Request $request)
    {
        $event_id = $request->id;
        $old_img = $request->old_image;

        // Cek posisi duplikat kecuali untuk item yang sedang di-update
        $existingPosisi = Klasement::where('posisi', $request->posisi)
            ->where('status', '0')
            ->where('id', '!=', $event_id)
            ->first();

        if ($existingPosisi) {
            return redirect()->back()->with([
                'message' => 'Posisi tersebut sudah digunakan, silakan pilih posisi lain.',
                'alert-type' => 'error'
            ])->withInput();
        }

        $event = Klasement::findOrFail($event_id);

        $data = [
            'nama_burung' => ucfirst($request->nama_burung),
            'slug' => strtolower(str_replace(' ', '-', $request->nama_burung)),
            'nama_pemilik' => $request->nama_pemilik,
            'alamat' => $request->alamat,
            'posisi' => $request->posisi,
            'updated_at'  => Carbon::now(),
        ];

        // Update foto jika ada file baru
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = 'Upload/news/';
            $name_gen = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name_gen);
            $save_url = $name_gen;

            if (!empty($old_img) && File::exists(public_path($old_img))) {
                File::delete(public_path($old_img));
            }

            $data['photo'] = $save_url;
        }

        $event->update($data);

        $notification = [
            'message'    => $request->hasFile('photo')
                ? 'Klasement updated with new image successfully'
                : 'Klasement updated without changing image',
            'alert-type' => 'success'
        ];

        return redirect()->route('klasement_pertandingan')->with($notification);
    }
    public function UpdatePertandingan(Request $request)
    {
        $event_id = $request->id;
        $old_image1 = $request->old_image1;
        $old_image2 = $request->old_image2;

        $event = Hasil_pertandingan::findOrFail($event_id);

        // Inisialisasi nama file baru jika tidak diupload
        $name_gen1 = $event->photo1;
        $name_gen2 = $event->photo2;

        // Handle upload photo1
        if ($request->hasFile('photo1')) {
            $image1 = $request->file('photo1');
            $name_gen1 = date('YmdHis') . '_1.' . $image1->getClientOriginalExtension();
            $image1->move(public_path('Upload/news/'), $name_gen1);

            if (!empty($old_image1) && File::exists(public_path($old_image1))) {
                File::delete(public_path($old_image1));
            }
        }

        // Handle upload photo2
        if ($request->hasFile('photo2')) {
            $image2 = $request->file('photo2');
            $name_gen2 = date('YmdHis') . '_2.' . $image2->getClientOriginalExtension();
            $image2->move(public_path('Upload/news/'), $name_gen2);

            if (!empty($old_image2) && File::exists(public_path($old_image2))) {
                File::delete(public_path($old_image2));
            }
        }

        // Update data
        $data = [
            'namateam1'   => ucfirst($request->namateam1),
            'photo1'      => $name_gen1,
            'skor1'       => ucfirst($request->skor1),
            'namateam2'   => ucfirst($request->namateam2),
            'photo2'      => $name_gen2,
            'skor2'       => ucfirst($request->skor2),
            'tanggal'     => $request->tanggal,
            'slug'        => strtolower(str_replace(' ', '-', $request->namateam1 . $request->namateam2)),
            'updated_at'  => Carbon::now(),
        ];

        $event->update($data);

        $notification = [
            'message'    => $request->hasFile('photo')
                ? 'Pertandingan updated with new image successfully'
                : 'Pertandingan updated without changing image',
            'alert-type' => 'success'
        ];

        return redirect()->route('klasement_pertandingan')->with($notification);
    }


    public function DeleteKlasement($id)
    {
        $event = Klasement::findOrFail($id);

        // Path lengkap ke file gambar
        $filePath = public_path('Upload/klasement/' . $event->photo);

        // Hapus file jika ada
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        // Hapus data event dari database
        $event->delete();

        $notification = array(
            'message' => 'Deleted Klasement and Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function DeletePertandingan($id)
    {
        $event = Hasil_pertandingan::findOrFail($id);

        // Path lengkap ke file gambar
        $filePath = public_path('Upload/event/' . $event->photo);

        // Hapus file jika ada
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        // Hapus data event dari database
        $event->delete();

        $notification = array(
            'message' => 'Deleted Event and Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function KlasementInActive($id){

        Klasement::findorfail($id)->update([
            'status'=> 0
        ]);
        $notification = array(
            'message' => 'klasement InActive',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function PertandinganInActive($id){

        Hasil_pertandingan::findorfail($id)->update([
            'status'=> 0
        ]);
        $notification = array(
            'message' => 'Hasil_pertandingan InActive',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function KlasementActive($id){

        Klasement::findorfail($id)->update([
            'status'=> 1
        ]);
        $notification = array(
            'message' => 'klasement Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function PertandinganActive($id){

        Hasil_pertandingan::findorfail($id)->update([
            'status'=> 1
        ]);
        $notification = array(
            'message' => 'Hasil_pertandingan Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
