<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Art;
class Admincontroller extends Controller
{
    public function index(){

        return view('admin.index');
    }

    public function AdminProfile(){
        return view('admin.admin_profile');
    }

    public function AdminDestroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    } // End Mehtod
}
