<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Galeri;
use App\Models\Pelatihan;
use App\Models\Instruktur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $instruktur = Instruktur::all();
        $pelatihan = Pelatihan::orderBy('created_at', 'desc')->get();
        $galeri = Galeri::all();
        $countPel = Pelatihan::count();
        $countIns = Instruktur::count();
        $countGal = Galeri::count();
        $user = User::count();
        return view('user.index', compact('instruktur','galeri','pelatihan','countPel','countIns', 'countGal', 'user'));
        $this->middleware(['auth','verified']);

    }

    public function galeri()
    {
        $data = Galeri::all();
        return view('user.component.galeri', compact('data'));
    }
    public function galeriDetail($id)
    {
        $galeri = Galeri::find($id);
        $data = Galeri::all();
        return view('user.component.detail-galeri', compact('galeri','data'));
    }
    public function instruktur()
    {
        $data = Instruktur::all();
        return view('user.component.instruktur', compact('data'));
    }
    public function pelatihan()
    {
        $data = Pelatihan::orderBy('created_at', 'desc')->get();
        return view('user.component.pelatihan', compact('data'));
    }
    public function about()
    {
        $countPel = Pelatihan::count();
        $countIns = Instruktur::count();
        $countGal = Galeri::count();
        return view('user.component.about', compact('countPel','countIns', 'countGal'));
    }
    public function contact()
    {
        return view('user.component.contact');
    }
    public function logout(){
        Auth::logout();
        return redirect('');
    }

    public function user(){
        $user = User::where('role', 'user')->get();
        return view('admin.component.user', compact('user'));
    }

    public function admin() {
        $admin = User::where('role','admin')->get();
        return view ('admin.component.admin', compact('admin'));
    }
}
