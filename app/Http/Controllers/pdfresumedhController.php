<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\c_information;
use App\Models\c_category;
use Auth;

use FPDF;

class pdfresumedhController extends Controller
{
    public function generatePDF()
    {
        $yr_created = 24;
        $type_user = 'DHA-0';

        // Create an instance of FPDF
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 10);
        //
        // LOGO

        $pdf->Image(public_path('assets/logo.png'), 5, 5, -900);
        // LINE
        //
        $pdf->Image(public_path('assets/vertical_line.png'), 37, 7, -500);
        // Output the PDF as a download

        // TEXT COMPANY NAME
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetXY(40, 16);
        $pdf->Write(6, 'Ephesians Overseas Manpower Supply Inc.');

        // TEXT SLOGAN
        $pdf->SetFont('Arial', '', 7);
        $pdf->SetXY(40, 20);
        $pdf->Write(6, 'PREMIER LANDBASED MANPOWER RECRUITMENT AGENCY');

        // DATE CREATED 1
        $pdf->SetFont('Arial', '', 8);
        $pdf->SetXY(140, 32);
        $pdf->Write(6, 'Date Created:_____________________');

        // DATE CREATED 2
        $pdf->SetFont('Arial', '', 8);
        $pdf->SetXY(146, 233);
        $pdf->Write(6, 'Date Created:_____________________');

        // SIGNATURE
        $pdf->SetFont('Arial', '', 8);
        $pdf->SetXY(146, 225);
        $pdf->Write(6, 'SIGNATURE:_____________________');

        // FOOTER
        $pdf->Image(public_path('assets/footer.JPG'), 1, 255, 208, 40);

        // The barcode
        // $code='EOMS21E0000'.$value;
        $code =
            'EOMS' .
            $yr_created .
            $type_user .
            str_pad(1, 5, '0', STR_PAD_LEFT);

        $pdf->Image(
            "http://localhost/v2/resume_builder/dh_form/qr_generator.php?code=$code",
            170,
            2,
            30,
            30,
            'png'
        );

        header('Content-Type: application/pdf');
        // header('Content-Disposition: attachment; filename="example.pdf"');
        echo $pdf->Output();
        exit();
    }
}