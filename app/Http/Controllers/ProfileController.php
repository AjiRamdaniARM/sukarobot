<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index($id){
        $user = User::find($id);
        return view('admin.component.profile', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user -> name = $request -> name;
        $user -> pekerjaan = $request -> pekerjaan;
        $user -> country = $request -> country;
        $user -> address = $request -> address;
        $user -> phone = $request -> phone;
        $user -> email = $request -> email;
        $image = $request -> foto;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request -> foto -> move('profile', $imagename);
        $user -> foto=$imagename;
        $user -> save();
        return redirect('/dashboard')->with('success','Profile Berhasil di Update!');
    }
}
