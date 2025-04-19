<?php

use App\Http\Controllers\AdminAdd;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuktiController;
use App\Http\Controllers\cekpdf;
use App\Http\Controllers\GaleriController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KwitansiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\TransaksiController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





// Route::get('/', function () {
//     return view('user.index');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'web'], function () {
    Route::get('/logout', [HomeController::class, 'logout']);
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/home/about', [HomeController::class, 'about']);
    Route::get('/home/pelatihan', [HomeController::class, 'pelatihan']);
    Route::get('/home/instruktur', [HomeController::class, 'instruktur']);
    Route::get('/home/galeri', [HomeController::class, 'galeri']);
    Route::get('/home/galeri-detail/{id}', [HomeController::class, 'galeriDetail']);
    Route::get('/home/contact', [HomeController::class, 'contact']);
    Route::get('/home/event', [HomeController::class, 'event'])->name('event.page');
    //Pesan
    Route::post('/contact/send', [PesanController::class, 'post'])->middleware('auth');
    Route::get('/home/pelatihan-detail/{judul}', [PelatihanController::class, 'detail'])->middleware('auth');
    // freePayment
    Route::post('/home/pelatihan-detail/free/{judul}', [TransaksiController::class, 'freeCheckout'])->middleware('auth');
    //payment
    Route::get('/home/payment/{judul}', [TransaksiController::class, 'index'])->middleware('auth');
    Route::post('/home/pelatihan-detail/{judul}', [TransaksiController::class, 'checkout'])->middleware('auth');
    Route::post('/home/payment/konfirm/{judul}', [TransaksiController::class, 'payment'])->middleware('auth');
    Route::post('/dashboard/user/transaksi/konfirm/{id_transaksi}', [TransaksiController::class, 'pay_off'])->middleware('auth');
    //profile
    Route::get('/dashboard/profile/{id}', [ProfileController::class, 'index'])->middleware('auth');
    Route::post('/dashboard/profile/update/{id}', [ProfileController::class, 'update'])->middleware('auth');
    //transaksi
    Route::get('/dashboard/transaksi/approve/{id}', [TransaksiController::class, 'approve']);
    Route::post('/dashboard/transaksi/approveAll', [TransaksiController::class, 'approveAll']);
    Route::get('/dashboard/transaksi/reject/{id}', [TransaksiController::class, 'reject']);
    Route::get('/dashboard/user/transaksi', [TransaksiController::class, 'view'])->middleware('auth');
    //pelatihan
    Route::get('/dashboard/user/pelatihan', [PelatihanController::class, 'userIndex'])->middleware('auth');
    Route::get('/dashboard/user/pelatihan/{judul}', [BuktiController::class, 'index'])->middleware('auth')->name('dashboard.user.pelatihan.judul');
    Route::post('/dashboard/user/pelatihan/post/{judul}', [BuktiController::class, 'post'])->name('dashboard.user.pelatihan')->middleware('auth');
    //sertifikat
    Route::get('/dashboard/user/sertifikat', [SertifikatController::class, 'userIndex'])->middleware('auth');
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/dashboard/user/pelatihan/pdf/{pelatihan2}', [BuktiController::class, 'downloadPdf']);
    Route::get('/dashboard/cekPdf', [cekpdf::class, 'viewPdf']);
    Route::post('/cekPdf', [cekpdf::class, 'cuba']);
});


Route::group(['middleware' => ['superadmin']], function () {
    // fitur tambahan

    Route::get('/dashboard/admin', [AdminController::class, 'index']);


    // service sukarobot
    Route::get('/dashboard/service', [serviceController::class, 'index']);
    Route::post('/service/send', [serviceController::class, 'send']);
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard/user', [HomeController::class, 'user']);
    Route::get('/dashboard/admin', [HomeController::class, 'admin']);
    Route::post('/dashboard/post',[AdminAdd::class, 'post']);
    Route::get('/dashboard/delete/{id}', [AdminAdd::class, 'delete']);

    //kategori
    Route::get('dashboard/kategori', [KategoriController::class, 'index']);
    Route::post('/kategori/post', [KategoriController::class, 'post']);
    Route::get('/kategori/delete/{id}', [KategoriController::class, 'delete']);
    //Instruktur
    Route::get('/dashboard/instruktur', [InstrukturController::class, 'index']);
    Route::post('/instruktur/post', [InstrukturController::class, 'post']);
    Route::get('/instruktur/delete/{id}', [InstrukturController::class, 'delete']);
    Route::get('/instruktur/edit/{id}', [InstrukturController::class, 'edit']);
    Route::post('/instruktur/edit-post/{id}', [InstrukturController::class, 'editPost']);
    //Pelatihan
    Route::get('/dashboard/pelatihan', [PelatihanController::class, 'index']);
    Route::post('/pelatihan/post', [PelatihanController::class, 'post']);
    Route::get('/pelatihan/delete/{id}', [PelatihanController::class, 'delete']);
    Route::get('/pelatihan/edit/{id}', [PelatihanController::class, 'edit']);
    Route::post('/pelatihan/edit-post/{id}', [PelatihanController::class, 'editPost']);
    //Galeri
    Route::get('/dashboard/galeri', [GaleriController::class, 'index']);
    Route::post('/galeri/post', [GaleriController::class, 'post']);
    Route::get('/galeri/delete/{id}', [GaleriController::class, 'delete']);
    Route::get('/galeri/edit/{id}', [GaleriController::class, 'edit']);
    Route::post('/galeri/edit-post/{id}', [GaleriController::class, 'editPost']);
    //Sertifikat
    Route::get('/dashboard/sertifikat', [SertifikatController::class, 'index']);
    Route::post('/sertifikat/post', [SertifikatController::class, 'post']);
    Route::get('/sertifikat/delete/{id}', [SertifikatController::class, 'delete']);
    Route::get('/sertifikat/delete/mentahan/{id}', [SertifikatController::class, 'deleteM']);
    Route::get('/sertifikat/edit/mentahan/{id}', [SertifikatController::class, 'editM']);
    Route::post('/sertifikat/edit/mentahan/{id}', [SertifikatController::class, 'postEdit']);
    Route::get('/sertifikat/print/{id}', [SertifikatController::class, 'print']);
    Route::get('/sertifikat/print-all', [SertifikatController::class, 'printAll']);
    Route::get('/sertifikat/edit/{id}', [SertifikatController::class, 'edit']);
    Route::post('/sertifikat/edit-post/{id}', [SertifikatController::class, 'editPost']);
    //Pesan
    Route::get('/contact/detail/{id}', [PesanController::class, 'detail']);
    Route::get('/contact/delete/{id}', [PesanController::class, 'delete']);
    //Laporan
    Route::get('/dashboard/laporan-bulan', [LaporanController::class, 'bulan']);
    Route::get('/dashboard/laporan-tahun', [LaporanController::class, 'tahun']);
    Route::post('/laporan/bulan-get', [LaporanController::class, 'bulanGet']);
    Route::post('/laporan/tahun-get', [LaporanController::class, 'tahunGet']);
    //bukti
    Route::get('/dashboard/bukti', [BuktiController::class, 'indexAdm'])->middleware('auth');


});
