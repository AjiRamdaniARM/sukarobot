<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;

class TransaksiController extends Controller
{


    public function index($judul) {
    $pelatihan = Pelatihan::where('judul', $judul)->firstOrFail();
    $Transaksi = Transaksi::where('id_pelatihan', $pelatihan->id)->first();
    if ($Transaksi) {
        $snapToken = $Transaksi->snap_token;
    } else {
        // Handle the case where the invoice is not found
        $snapToken = null;
    }

    if (!$Transaksi) {
        abort(404, 'Invoice not found');
    }

    return view('user.component.payment', compact('pelatihan','snapToken', 'Transaksi'));
    }


    // free pelatihan
    public function freeCheckout ($judul) {
        $idUser = Auth::id();
        $PricePelatihan = Pelatihan::where('judul', $judul)->value('harga');
        $idPelatihan = Pelatihan::where('judul', $judul)->value('id');
        $initials = implode('', array_map('strtoupper', array_map('substr', explode(' ', $judul), array_fill_keys(range(0, count(explode(' ', $judul))), -1))));
        // Membuat ID transaksi acak berdasarkan inisial judul pelatihan, tanggal, bulan, tahun, dan ID user
        $idTransaksi ="SRA" . $initials . date('Ymd') . $idUser . mt_rand(1000, 9999);
        $payment = new Transaksi();
        $payment->id_transaksi = $idTransaksi;
        $payment->id_user = $idUser;
        $payment->id_pelatihan = $idPelatihan;
        $payment -> save();

        return redirect('/home/payment/'.$judul)->with('payment','checkout free pelatihan berhasil');
    }



    // pembayaran pelatihan

    public function checkout($judul){
        $idUser = Auth::id();
        $PricePelatihan = Pelatihan::where('judul', $judul)->value('harga');
        $idPelatihan = Pelatihan::where('judul', $judul)->value('id');
        $initials = implode('', array_map('strtoupper', array_map('substr', explode(' ', $judul), array_fill_keys(range(0, count(explode(' ', $judul))), -1))));
        // Membuat ID transaksi acak berdasarkan inisial judul pelatihan, tanggal, bulan, tahun, dan ID user
        $idTransaksi ="SRA" . $initials . date('Ymd') . $idUser . mt_rand(1000, 9999);
        $payment = new Transaksi();
        $payment->id_transaksi = $idTransaksi;
        $payment->id_user = $idUser;
        $payment->id_pelatihan = $idPelatihan;
         // Set konfigurasi Midtrans
         Config::$serverKey = config('midtrans.serverKey');
         Config::$isProduction = config('midtrans.isProduction');
         Config::$isSanitized = config('midtrans.isSanitized');
         Config::$is3ds = config('midtrans.is3ds');


        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $PricePelatihan,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email
            )
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $payment -> snap_token = $snapToken;
        $payment -> save();

        return redirect('/home/payment/'.$judul)->with('payment','transaksi berhasil');


        // $pelatihan = Pelatihan::where('judul', $judul)->firstOrFail();
        // return view('user.component.payment', compact('pelatihan'));
    }
    public function thanks(){
        return view('user.component.thanks');
    }
    public function payment(Request $request, $judul){
        $idUser = Auth::id();
        $idPelatihan = Pelatihan::where('judul', $judul)->value('id');
        $payment = Transaksi::where('id_pelatihan', $idPelatihan)->first();
        $payment->status = 'Berhasil';
        // $image = $request -> foto;
        // $imagename=time().'.'.$image->getClientOriginalExtension();
        // $request -> foto -> move('transaksi', $imagename);
        // $payment -> foto=$imagename;

        $payment -> save();
        return redirect()->back()->with('success', 'Transaksi Anda telah proses. Terima kasih atas pembayarannya!');
    }

    public function view() {
        $userId = Auth::id();
        if (Auth::user()->role == 'admin') {
            $payment = Transaksi::orderByRaw("FIELD(status, 'Diproses', 'Belum Berhasil', 'Berhasil', 'Gagal') ASC")->get();
        } else {
            $payment = Transaksi::where('id_user', $userId)
            ->join('pelatihans', 'transaksis.id_pelatihan', '=', 'pelatihans.id')
            ->orderByRaw("FIELD(transaksis.status, 'Diproses', 'Belum Berhasil', 'Berhasil', 'Gagal') ASC")
            ->get(['transaksis.*', 'pelatihans.judul as nama_pelatihan','pelatihans.harga as harga_pelatihan' ]);

        }

        return view('admin.component.transaksi', compact('payment'));
    }
    public function approve($id){
        $payment = Transaksi::find($id);
        $payment->status = 'Berhasil';
        $payment->save();
        return redirect('/dashboard/user/transaksi')->with('success', 'Transaksi berhasil disetujui.');
    }

    public function approveAll()
{
    $payments = Transaksi::where('status', 'Diproses')->get();
    foreach ($payments as $payment) {
        $payment->status = 'Berhasil';
        $payment->save();
    }

    return redirect('/dashboard/user/transaksi')->with('success', 'Semua transaksi yang diproses berhasil disetujui.');
}
    public function reject($id){
        $payment = Transaksi::find($id);
        $payment->status = 'Gagal';
        $payment->save();
        return redirect('/dashboard/user/transaksi')->with('error', 'Transaksi berhasil ditolak.');
    }

    public function pay_off ($id_transaksi) {
        $pay_off = Transaksi::where('id_transaksi', $id_transaksi)->first();
        $pay_off -> status = 'Berhasil';
        $pay_off -> save();

        return redirect()->back()->with('pay_off', 'Pembayaran pelatihan Berhasil');

    }


}
