<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAdd extends Controller
{
    public function post(Request $request){
        $data = new User();
        $data->name = $request->nama;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->role = 'admin';
        $data -> save();
        return redirect('/dashboard/admin')->with('success', 'data admin sudah ditambahkan');
    }

    public function delete($id) {
        $data = User::find($id);
        $data -> delete();
        return redirect('/dashboard/admin')->with('success', 'data admin berhasil dihapus');
    }
}
