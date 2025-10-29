<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
class SliderController extends Controller
{
    public function index(){

        $sliders = Slider::latest()->get();

        return view('backend.views.slider.index',compact('sliders'));
    }

   public function StoreSlider(Request $request)
    {
        $image = $request->file('photo');
        try {
            $destinationPath = 'Upload/slider/';
            $name_gen = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name_gen);
            $save_url = $name_gen;

            Slider::insert([
                'title' => $request->title,
                'description' => $request->description,
                'photo' => $save_url,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Slider Inserted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } catch (\Throwable $e) {
            $notification = array(
                'message' => 'Slider Inserted Gagal',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function EditSlider($id){

        $slider = Slider::findorfail($id);

        return view('Backend.Slider.edit_slider',compact('slider'));
    }

    public function UpdateSlider(Request $request){
        $slider_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('photo')) {

            $image = $request->file('photo');
            $destinationPath = 'Upload/slider/';
            $name_gen = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name_gen);
            $save_url = $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'photo' => $save_url,
                'created_at'=> Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Slider Updated with image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('slider')->with($notification);
        } else {

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'created_at'=> Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Slider Updated without image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('slider')->with($notification);
        } // end else
    }

    public function DeleteSLider($id){

        $slider = Slider::findOrFail($id);
        $img = 'Upload/slider/'.$slider->photo;
        unlink($img);

        Slider::findorfail($id)->delete();

        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function SliderInActive($id){

        Slider::findorfail($id)->update([
            'status'=> 0
        ]);
        $notification = array(
            'message' => 'Slider InActive',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SliderActive($id){

        Slider::findorfail($id)->update([
            'status'=> 1
        ]);
        $notification = array(
            'message' => 'Slider Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
