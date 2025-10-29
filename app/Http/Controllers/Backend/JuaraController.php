<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Juara;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class JuaraController extends Controller
{
    public function index(Request $request)
    {

        $juara = Juara::paginate(10);

        return view('backend.views.juara.index',compact('juara'));
    }

    public function JuaraStore(Request $request)
    {

        $image = $request->file('photo');
        $destinationPath = 'Upload/juara/';
        $name_gen = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $name_gen);
        $save_url = $name_gen;

        Juara::insert([
            'title'=> ucfirst($request->title),
            'slug'=> strtolower(str_replace(' ', '-', $request->title)),
            'description'=>$request->description,
            'photo'=>$save_url,
            'created_at'=>Carbon::now(),
        ]);

        $notification = array(
            'message' => 'New Juara Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.juara')->with($notification);
    }

    public function EditJuara($id){

        $juara = Juara::findorfail($id);

        return view('backend.views.juara.edit',compact('juara'));
    }
    public function UpdateJuara(Request $request)
    {
        $event_id = $request->id;
        $old_img = $request->old_image;

        $event = Juara::findOrFail($event_id);

        $data = [
            'title' => ucfirst($request->title),
            'slug' => strtolower(str_replace(' ', '-', $request->title)),
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ];

        // Jika ada upload file baru
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = 'Upload/juara/';
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

        $event->update($data);

        $notification = [
            'message' => $request->hasFile('photo')
                ? 'Juara updated with new image successfully'
                : 'Juara updated without changing image',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.juara')->with($notification);
    }


    public function DeleteJuara($id)
    {
        $event = Juara::findOrFail($id);

        // Path lengkap ke file gambar
        $filePath = public_path('Upload/juara/' . $event->photo);

        // Hapus file jika ada
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        // Hapus data event dari database
        $event->delete();

        $notification = array(
            'message' => 'Deleted Juara and Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function JuaraInActive($id)
    {

        Juara::findorfail($id)->update([
            'status' => 0
        ]);
        $notification = array(
            'message' => 'Juara InActive',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function JuaraActive($id)
    {

        Juara::findorfail($id)->update([
            'status' => 1
        ]);
        $notification = array(
            'message' => 'Juara Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
