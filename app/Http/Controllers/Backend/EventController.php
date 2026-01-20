<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    public function index(){
        $events = Event::latest()->get();

        return view('backend.views.event.index',compact('events'));
    }

    public function StoreEvent(Request $request){
        $image = $request->file('photo');
        $destinationPath = 'Upload/event/';
        $name_gen = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $name_gen);
        $save_url = $name_gen;

        Event::insert([
            'title'=> ucfirst($request->title),
            'slug'=> strtolower(str_replace(' ', '-', $request->title)),
            'lokasi'=>$request->lokasi,
            'link'=>$request->link,
            'tanggal'=>$request->tanggal,
            'harga'=>$request->harga,
            'description'=>$request->description,
            'photo'=>$save_url,
            'created_at'=>Carbon::now(),
        ]);

        $notification = array([
            'message' => 'Insert Event Successfully',
            'alert-type' => 'success'
        ]);

        return redirect()->route('event')->with($notification);
    }

    public function EditEvent($id){

        $event = Event::findorfail($id);

        return view('backend.views.event.edit_event',compact('event'));
    }

    public function UpdateEvent(Request $request)
    {
        $event_id = $request->id;
        $old_img = $request->old_image;

        $event = Event::findOrFail($event_id);

        $data = [
            'title'       => ucfirst($request->title),
            'slug'        => strtolower(str_replace(' ', '-', $request->title)),
            'lokasi'      => $request->lokasi,
            'tanggal'     => $request->tanggal,
            'harga'       => $request->harga,
            'description' => $request->description,
            'link'=>$request->link,
            'created_at'  => Carbon::now(),
        ];

        // Jika ada upload file baru
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = 'Upload/event/';
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
            'message'    => $request->hasFile('photo')
                ? 'Event updated with new image successfully'
                : 'Event updated without changing image',
            'alert-type' => 'success'
        ];

        return redirect()->route('event')->with($notification);
    }

    public function DeleteEvent($id){
        $event = Event::findOrFail($id);

        // Path lengkap ke file gambar
        $filePath = public_path('Upload/event/' . $event->photo);

        // Hapus file jika ada
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        // Hapus data event dari database
        $event->delete();

        $notification = array(
            'message' => 'Deleted News and Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function EventInActive($id){

        Event::findorfail($id)->update([
            'status'=> 0
        ]);
        $notification = array(
            'message' => 'Event InActive',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function EventActive($id){

        Event::findorfail($id)->update([
            'status'=> 1
        ]);
        $notification = array(
            'message' => 'Event Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
