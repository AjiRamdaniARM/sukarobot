<?php

namespace App\Http\Controllers;

use App\Models\Mentahan;
use App\Models\Pelatihan;
use App\Models\User;
use setasign\Fpdi\Fpdi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cekpdf extends Controller
{
    public function viewPdf () {
        $UserID = Auth::id();
        $nama = User::where('id',$UserID)->first();
        $mentahan = Mentahan::all();
        $join = Pelatihan::join('mentahans', 'pelatihans.id', '=', 'mentahans.id_pelatihan')
        ->select('pelatihans.*', 'mentahans.*')
        ->get();
        $pelatihan = Pelatihan::all();
        return view('admin.component.cek-pdf', compact('mentahan','nama','pelatihan', 'join'));
    }

    public function cuba (Request $request) {
        $nama = $request->nama;
        $deks = $request->deks;
        $file = $request->file;
        $keluaran = public_path().$file.'.pdf';
        $this->fillPDF(public_path().'/assets/certificate/mentahan/'.$file.'.pdf',$keluaran,$nama,$deks);

        return response()->file($keluaran);
    }
    public function fillPDF($file,$keluaran,$nama,$deks) {
        $fpdi = new FPDI();
        $fpdi->setSourceFile($file);
        $template = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($template);

        $fpdi->AddPage($size['orientation'], [$size['width'], $size['height']]);
        $fpdi->useTemplate($template);

        // Coordinates for the name
        $top = ($size['height'] / 2) - 24;
        $maxWidth = 150;
        $maxFontSize = 19;
        $minFontSize = 10;
        $fontSize = $maxFontSize;

        // Set the font to bold
        // $fpdi->AddFont('bold', 'B', 'bold.php');
        $fpdi->SetFont("Helvetica", 'B', $fontSize); // Menggunakan font 'bold' yang telah ditambahkan

        // Measure the width of the name text
        while ($fontSize >= $minFontSize) {
        $fpdi->SetFont("Helvetica", "B", $fontSize); // Menggunakan font 'bold'
        $width = $fpdi->GetStringWidth($nama);

        if ($width <= $maxWidth) {
            break;
        }

        $fontSize -= 1;
    }


        // prubahan
        $centerX = (($size['width'] - $width) / 2 ) + 10;

        // cetak nama
        $fpdi->SetXY($centerX, $top);
        $fpdi->Cell(0, 10, $nama, 0, 1, 'L');


        // deskripsi
        $descriptionTop = $top + 39;
        $descriptionFontSize = 17;
        // $fpdi->AddFont('roman', '', 'romann.php');
        $fpdi->SetFont("Helvetica", "B", $descriptionFontSize);


        $descriptionWidth = $fpdi->GetStringWidth($deks);
        $descriptionCenterX = ($size['width'] - $descriptionWidth) / 2;

        $maxDescriptionWidth = 140;


        $fpdi->SetXY(($size['width'] - $maxDescriptionWidth) / 1 - 65, $descriptionTop);
        $fpdi->MultiCell($maxDescriptionWidth, 8, $deks, 0, 'C');

        return $fpdi->Output('F', $keluaran);



    }


}
