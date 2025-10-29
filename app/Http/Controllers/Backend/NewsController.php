<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function index(){
        $news = News::latest()->get();
        return view('backend.views.news.index',compact('news'));
    }

    public function StoreNews(Request $request)
    {
        try {
            $image = $request->file('photo');
            $destinationPath = 'Upload/news/';
            $name_gen = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name_gen);
            $save_url = $name_gen;

            News::insert([
                'title' => ucfirst($request->title),
                'slug' => strtolower(str_replace(' ', '-', $request->title)),
                'tanggal' => Carbon::now(),
                'category' => $request->category,
                'description' => $request->description,
                'photo' => $save_url,
                'created_at' => Carbon::now(),
            ]);

            $notification = array([
                'message' => 'Insert News Successfully',
                'alert-type' => 'success'
            ]);

            return redirect()->route('news')->with($notification);
        } catch (\Throwable $e) {
            $notification = array([
                'message' => 'Insert News Gagal',
                'alert-type' => 'error'
            ]);

            return redirect()->route('news')->with($notification);
        }
    }

    public function EditNews($id){

        $event = News::findorfail($id);

        return view('backend.views.news.edit',compact('event'));
    }


    public function UpdateNews(Request $request)
    {
        $event_id = $request->id;
        $old_img = $request->old_image;

        $event = News::findOrFail($event_id);

        $data = [
            'title'       => ucfirst($request->title),
            'slug'        => strtolower(str_replace(' ', '-', $request->title)),
            'category'      => $request->category,
            'description' => $request->description,
            'updated_at'  => Carbon::now(),
        ];

        // Jika ada upload file baru
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = 'Upload/news/';
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
                ? 'Berita updated with new image successfully'
                : 'Berita updated without changing image',
            'alert-type' => 'success'
        ];

        return redirect()->route('news')->with($notification);
    }


    public function DeleteNews($id)
    {
        $event = News::findOrFail($id);

        // Path lengkap ke file gambar
        $filePath = public_path('Upload/news/' . $event->photo);

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


    public function NewsInActive($id){

        News::findorfail($id)->update([
            'status'=> 0
        ]);
        $notification = array(
            'message' => 'News InActive',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function NewsActive($id){

        News::findorfail($id)->update([
            'status'=> 1
        ]);
        $notification = array(
            'message' => 'News Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
