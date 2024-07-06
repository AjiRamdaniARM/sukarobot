<?php

namespace App\Http\Controllers;

use App\Models\Bukti;
use App\Models\Kategori;
use App\Models\Pelatihan;
use App\Models\Instruktur;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class PelatihanController extends Controller
{
    public function index(){
        $pelatihan = Pelatihan::all();
        $kategori = Kategori::all();
        $instruktur = Instruktur::all();
        return view('admin.component.pelatihan', compact('pelatihan','kategori','instruktur'));
    }

    public function post(Request $request){
        $data = new Pelatihan();
        $data -> judul = $request -> judul;
        $data -> harga = $request -> harga;
        $data -> date = $request -> date;
        $data -> time = $request -> time;
        $data -> link = $request -> link;
        $data -> deskripsi = $request -> deskripsi;
        $data -> id_kategori = $request -> id_kategori;
        $data -> id_instruktur = $request -> id_instruktur;
        $image = $request -> foto;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request -> foto -> move('Pelatihan', $imagename);
        $data -> foto=$imagename;
        $data -> save();
        return redirect('/dashboard/pelatihan')->with('success','Pelatihan Berhasil di Upload!');
    }

    public function delete($id){
        $data = Pelatihan::find($id);
        $data -> delete();
        return redirect('/dashboard/pelatihan')->with('delete','Pelatihan Berhasil di Hapus!');
    }

    public function edit($id){
        $data = Pelatihan::find($id);
        $kategori = Kategori::all();
        $instruktur = Instruktur::all();
        return view('admin.component.edit-pelatihan', compact('data','kategori','instruktur'));
    }
    public function editPost(Request $request,$id){
        $data = Pelatihan::find($id);
        $data -> judul = $request -> judul;
        $data -> harga = $request -> harga;
        $data -> date = $request -> date;
        $data -> time = $request -> time;
        $data -> link = $request -> link;
        $data -> deskripsi = $request -> deskripsi;
        $data -> id_kategori = $request -> id_kategori;
        $data -> id_instruktur = $request -> id_instruktur;
        $image = $request -> foto;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request -> foto -> move('Pelatihan', $imagename);
        $data -> foto=$imagename;
        $data -> save();
        return redirect('/dashboard/pelatihan')->with('edit','Pelatihan Berhasil di Edit!');
    }

    public function detail($judul){
        $user = Auth::id();
        $pelatihan = Pelatihan::where('judul', $judul)->firstOrFail();
        $idPelatihan = Pelatihan::where('judul', $judul)->value('id');
        $payment = Transaksi::where('id_user', $user)->first();
        return view('user.component.detail-pelatihan', compact('pelatihan','payment'));
    }

    public function userIndex(){
        $userId = Auth::id();
        $bukti = Bukti::all();
        $pelatihan = Pelatihan::join('transaksis', 'pelatihans.id', '=', 'transaksis.id_pelatihan')
        ->where('transaksis.id_user', $userId)
        ->where('transaksis.status', 'Berhasil')
        ->select('pelatihans.*')
        ->get();
        return view('admin.component.user-pelatihan', compact('pelatihan', 'bukti'));
    }
}
