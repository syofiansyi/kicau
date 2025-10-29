<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
class UserController extends Controller
{
    public function index(){
        $users = User::latest()->get();
        return view('backend.views.user.index',compact('users'));
    }

    public function AddUser(){
        return view('backend.user.add_user');
    }

    public function UserStore( Request $request){

        $image = $request->file('photo');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(270,270)->save('Upload/user/'.$name_gen);
        $save_url = 'Upload/user/'.$name_gen;

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        // $user->role =$request->role;
        $user->address =$request->address;
        $user->photo = $save_url;
        $user->password = Hash::make($request->password);
        $user->status = 0;
        $user->save();

        // if ($request->roles) {
        //     $user->assignRole($request->roles);
        // }

         $notification = array(
            'message' => 'New Admin User Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function EditUser($id){

        $user = User::findorfail($id);
        // $user = Hash::check()

        return view('Backend.user.edit_user',compact('user'));
    }

    public function UpdateUser(Request $request){
        $user_id = $request->id;
        $old_img = $request->old_image;

    if ($request->file('photo')) {

        $image = $request->file('photo');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(270,270)->save('Upload/user/'.$name_gen);
        $save_url = 'Upload/user/'.$name_gen;

        if (file_exists($old_img)) {
            unlink($old_img);
        }else{

        }

        User::findOrFail($user_id)->update([
            'name' => $request->name,
            'role' => $request->role,
            'phone' => $request->phone,
            'address' => $request->address,
            // 'password' => Hash::make($request->password),
            'photo' => $save_url,
            'status' => 0,
            'created_at'=> Carbon::now(),
        ]);

        $notification = array(
            'message' => 'User Updated with image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.user')->with($notification);
    } else {

        User::findOrFail($user_id)->update([
            'name' => $request->name,
            'role' => $request->role,
            'phone' => $request->phone,
            'address' => $request->address,
            // 'password' => Hash::make($request->password),
            'status' => 0,
            'created_at'=> Carbon::now(),
        ]);

        $notification = array(
            'message' => 'User Updated without image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.user')->with($notification);
    } // end else
    }

    public function DeleteUser($id){

        $User = User::findOrFail($id);
        $img = $User->photo;
        unlink($img);
        User::findOrFail($id)->delete();

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function UserInActive($id){
        User::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'User Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function UserActive($id){
        User::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'InActive Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
