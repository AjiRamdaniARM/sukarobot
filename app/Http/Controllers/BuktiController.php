<?php

namespace App\Http\Controllers;

use App\Models\Bukti;
use App\Models\Mentahan;
use App\Models\Pelatihan;
use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use setasign\Fpdi\Fpdi;

class BuktiController extends Controller
{
    public function index($judul){
        $pelatihan = Pelatihan::where('judul', $judul)->firstOrFail();

        $join = Mentahan::join('pelatihans', 'mentahans.id_pelatihan', '=', 'pelatihans.id')
        ->where('pelatihans.judul', $judul)
        ->select('mentahans.*', 'pelatihans.*')
        ->first();


        return view('admin.component.bukti', compact('pelatihan', 'join'));
    }
    public function indexAdm(){
        $bukti = Bukti::all();
        return view('admin.component.bukti-view', compact('bukti'));
    }

    public function post(Request $request, $judul){
        $userId = Auth::id();

        $pelatihan = Pelatihan::where('judul', $judul)->value('id');
        $pelatihan2 = Pelatihan::where('judul', $judul)->value('id');
        $existingBukti = Bukti::where('id_user', $userId)
                          ->where('id_pelatihan', $pelatihan)
                          ->first();

        if ($existingBukti) {
            return redirect('/dashboard/user/pelatihan')->with('error','Anda sudah mengupload bukti untuk pelatihan ini.');
        }

        $bukti = new Bukti();
        $bukti -> q1 = $request -> q1;
        $bukti -> q2 = $request -> q2;
        $bukti -> id_user = $userId;
        $bukti -> id_pelatihan = $pelatihan;
        $image = $request -> foto;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request -> foto -> move('Bukti', $imagename);
        $bukti -> foto=$imagename;
        $bukti -> save();

        return redirect('dashboard/user/pelatihan')
        ->with('success', 'Bukti Berhasil di Upload!', )
        ->with('download', 'Dapatkan Sertifikat Anda!!')
        ->with('pelatihan2', $pelatihan2);
    }


    // fungsi downloadf pdf

    public function downloadPdf($pelatihan2) {
        $pelatihan = Bukti::where('id_pelatihan', $pelatihan2)->first();
        $getdata = Pelatihan::where('id',$pelatihan2)->first();
        $get = $getdata->judul;

        $nama = Auth::user()->name;
        $tempOutputfile = public_path('assets/temp_' . $nama . '_' . $pelatihan->id_pelatihan . '.pdf'); // File sementara
        $outputfile = public_path('assets/certificate/' . $nama . '_' . $pelatihan->id_pelatihan . '.pdf');
        $templatePath = public_path('assets/certificate/mentahan/'. $pelatihan->id_pelatihan .'.pdf');


        if ($pelatihan) {
            $this->fillPDF($templatePath, $nama,$get, $tempOutputfile);
            if (file_exists($tempOutputfile)) {
                if (!file_exists(public_path('assets/certificate'))) {
                    mkdir(public_path('assets/certificate'), 0775, true);
                }
                rename($tempOutputfile, $outputfile);
                $save = new Sertifikat();
                $save->file = 'assets/certificate/' .  $nama . '_' . $pelatihan->id_pelatihan . '.pdf'; // Simpan path relatif ke dalam database
                $save->id_user = Auth::id();
                $save->id_pelatihan = $pelatihan->id_pelatihan;
                $save->save();
                return response()->download($outputfile)->deleteFileAfterSend(false);
            } else {
                return back()->with('error', 'File PDF gagal dibuat.');
            }
        } else {
            return back()->with('error', 'Bukti tidak ditemukan untuk pengguna ini.');
        }
    }

    // fitur pdf certificate

    private function fillPDF($file, $nama, $get, $outputfile)
    {
        $fpdi = new FPDI();
        $fpdi->setSourceFile($file);
        $template = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($template);

        $fpdi->AddPage($size['orientation'], [$size['width'], $size['height']]);
        $fpdi->useTemplate($template);

        $top = ($size['height'] / 2) - 24;
        $maxWidth = 200;
        $maxFontSize = 15;
        $minFontSize = 10;
        $fontSize = $maxFontSize;

        // Set the font to bold
        $fpdi->SetFont("Helvetica", "B", $fontSize);

        // Measure the width of the name text
        while ($fontSize >= $minFontSize) {
            $fpdi->SetFont("Helvetica", "B", $fontSize);
            $width = $fpdi->GetStringWidth($nama);

            if ($width <= $maxWidth) {
                break;
            }

            $fontSize -= 1;
        }

         // prubahan
         $centerX = (($size['width'] - $width) / 1 ) - 120 ;

        // cetak nama
        $fpdi->SetXY($centerX, $top);
        $fpdi->Cell(0, 10, $nama, 0, 1, 'L');


        $descriptionTop = $top + 34;
        $descriptionFontSize = 14;
        $fpdi->SetFont("Helvetica", "", $descriptionFontSize);


        $descriptionWidth = $fpdi->GetStringWidth($get);
        $descriptionCenterX = ($size['width'] - $descriptionWidth) / 2;

        $maxDescriptionWidth = 140;


        $fpdi->SetXY(($size['width'] - $maxDescriptionWidth) / 1 - 65, $descriptionTop);
        $fpdi->MultiCell($maxDescriptionWidth, 8, $get, 0, 'C');

        return $fpdi->Output('F', $outputfile);
    }




    // $fpdi = new FPDI();
    //     $fpdi->setSourceFile($file);
    //     $template = $fpdi->importPage(1);
    //     $size = $fpdi->getTemplateSize($template);

    //     $fpdi->AddPage($size['orientation'], [$size['width'], $size['height']]);
    //     $fpdi->useTemplate($template);

    //     // Coordinates for the name
    //     $top = $size['height'] / 2;// Y-coordinate (middle of the page)
    //     $maxWidth = 200; // Maximum width for the name to fit
    //     $maxFontSize = 30; // Starting font size
    //     $minFontSize = 10; // Minimum font size
    //     $fontSize = $maxFontSize;

    //     // Set the font to bold
    //     $fpdi->SetFont("Helvetica", "B", $fontSize);

    //     // Measure the width of the name text
    //     while ($fontSize >= $minFontSize) {
    //         $fpdi->SetFont("Helvetica", "B", $fontSize);
    //         $width = $fpdi->GetStringWidth($nama);

    //         if ($width <= $maxWidth) {
    //             break;
    //         }

    //         $fontSize -= 1;
    //     }

    //     // Center the name horizontally
    //     $centerX = ($size['width'] - $width) / 2;

    //     // Print the name
    //     $fpdi->SetXY($centerX, $top);
    //     $fpdi->Cell(0, 10, $nama, 0, 1, 'L');

    //     $descriptionTop = $top + 20;
    //     $descriptionFontSize = 15;
    //     $fpdi->SetFont("Helvetica", "", $descriptionFontSize);


    //     $descriptionWidth = $fpdi->GetStringWidth($get);
    //     $descriptionCenterX = ($size['width'] - $descriptionWidth) / 2;

    //     $fpdi->SetXY($descriptionCenterX, $descriptionTop);
    //     $fpdi->Cell(0, 10, $get, 0, 1, 'L');

    //     $fpdi->Output('F', $outputfile);




}
