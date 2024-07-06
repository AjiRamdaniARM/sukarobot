<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pesan;
use App\Models\Galeri;
use App\Models\Pelatihan;
use App\Models\Instruktur;
use App\Models\Sertifikat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userId = Auth::id();
        $pelatihanUser = Transaksi::where('id_user', $userId)->count();
        $sertifikatUser= Sertifikat::where('id_user', $userId)->count();
        $user = User::count();
        $pelatihan = Pelatihan::count();
        $instruktur = Instruktur::count();
        $galeri = Galeri::count();
        $pesan = Pesan::all();
        return view('admin.index', compact('user','pelatihan','instruktur','galeri','pesan','pelatihanUser','sertifikatUser'));
    }
}
