<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\Bukti;
use App\Models\Mentahan;
use App\Models\Pelatihan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SertifikatController extends Controller
{
    function index(){
        $user = User::where('role', 'user')->get();
        $sertifikat = Sertifikat::all();
        $mentahans = Mentahan::all();
        $join = Pelatihan::join('mentahans', 'pelatihans.id', '=', 'mentahans.id_pelatihan')
        ->select('pelatihans.*', 'mentahans.*')
        ->get();
        $pelatihan = Pelatihan::all();
        $kompetensi = Kategori::all();
        return view('admin.component.sertifikat', compact('kompetensi','sertifikat', 'user', 'pelatihan', 'join'));
    }

    function post(Request $request){
        if ($request->hasFile('mentahan')) {
            $file = $request->file('mentahan');
            $imagename = $request->id_pelatihan . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/certificate/mentahan'), $imagename);
            $data = new Mentahan();
            $data->mentahan = $imagename;
            $data->id_pelatihan = $request->id_pelatihan;
            $data->save();

            return back()->with('success', 'File berhasil diunggah!');
        }

        return back()->with('error', 'Tidak ada file yang diunggah.');
    }


    function delete($id){
        $data = Sertifikat::find($id);
        $data->delete();
        return redirect('/dashboard/sertifikat')->with('delete','Sertifikat Berhasil di Hapus!');
    }

    function deleteM($id){
        $mentahan = Mentahan::find($id);
        $file_path = public_path('assets/certificate/mentahan/' . $mentahan->mentahan);
        if (file_exists($file_path)) {
        unlink($file_path);
        }
        $mentahan -> delete();
        return redirect('/dashboard/sertifikat')->with('delete','Mentahan Berhasil di Hapus!');
    }

    function editM($id){
        $mentahan = Mentahan::find($id);
        $data = Pelatihan::all();

        if (!$mentahan) {
            return back()->with('error', 'Mentahan not found');
        }
        $join = Pelatihan::join('mentahans', 'pelatihans.id', '=', 'mentahans.id_pelatihan')
            ->where('mentahans.id', $id)
            ->select('pelatihans.*', 'mentahans.*')
            ->first();

            return view('admin.component.edit-mentahan', compact('join','data'));
    }
    public function postEdit(Request $request, $id)
    {
    $data = Mentahan::find($id);

    if (!$data) {
        return back()->with('error', 'Mentahan not found.');
    }


    if ($request->hasFile('mentahan')) {
        $file = $request->file('mentahan');
        $imagename = $data->id_pelatihan . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/certificate/mentahan'), $imagename);
        $data->mentahan = $imagename;
    }
    $data->save();

    return back()->with('success', 'Mentahan berhasil diupdate!');
}


    public function userIndex(){
        $userId = Auth::id();
        $sertifikat = Sertifikat::where('id_user', $userId)->get();
        $judul =
        $bukti = Bukti::where('id_user', $userId)->get();
        return view('admin.component.user-sertifikat', compact('sertifikat', 'bukti'));
    }

}
