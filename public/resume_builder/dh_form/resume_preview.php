<?php

session_start();
include 'connect.php';

$codeuser = substr($_GET['bcode'], 6, -5);

$type_user = $codeuser;
$bcode = $_GET['bcode'];

if (isset($type_user)) {
} else {
    //  header('Location: /v2/');
    //  exit;
}

$c_information1 = $db->query(
    "SELECT * FROM `c_information` WHERE bcode='$bcode'"
);
$rows_c_info = $c_information1->fetch_assoc();

$fullname = $rows_c_info['fullname'];
$pnumber = $rows_c_info['pnumber'];
$gender = $rows_c_info['gender'];
$birthday = $rows_c_info['birthday'];
$nationality = 'FILIPINO';
$scomment = $rows_c_info['scomment'];
$height = $rows_c_info['height'];
$resume_name = $rows_c_info['resume'];
$idpic = $rows_c_info['idpic'];
$religion = $rows_c_info['religion'];
$place_of_birth = $rows_c_info['place_of_birth'];
$weight = $rows_c_info['weight'];
$blood_type = $rows_c_info['blood_type'];
$pcountry = $rows_c_info['pcountry'];
$first_or_ex = $rows_c_info['first_or_ex'];
$ex_agency = $rows_c_info['ex_agency'];

// CONTACT
$c_contactinfo = $db->query(
    "SELECT * FROM `c_contactinfo` WHERE u_num='$bcode'"
);
$rows_c_contactinfo = $c_contactinfo->fetch_assoc();

$u_num = $rows_c_contactinfo['u_num'];
// $cno1 = $rows_c_contactinfo['cno1'];
$cno1 = '**********';
$cno2 = $rows_c_contactinfo['cno2'];
$email1 = $rows_c_contactinfo['email1'];
$email2 = $rows_c_contactinfo['email2'];
$skype = $rows_c_contactinfo['skype'];
$address = $rows_c_contactinfo['address'];

$name = $rows_c_contactinfo['name'];
$cno = $rows_c_contactinfo['cno'];

$marital_status = $rows_c_contactinfo['marital_status'];
$no_of_children = $rows_c_contactinfo['no_of_children'];
$crelationship = $rows_c_contactinfo['crelationship'];
$caddress = $rows_c_contactinfo['caddress'];

// EXPERIENCE
$arrposition = [];
$arrccompany = [];
$arrcdate = [];
$arrccountry = [];

$c_experience = $db->query("SELECT * FROM `c_experience` WHERE u_num='$bcode'");
$rowCount = mysqli_num_rows($c_experience);

if ($rowCount == 1) {
    $rowzz = $c_experience->fetch_assoc();

    $cposition = $rowzz['cposition'];
    $ccompany = $rowzz['ccompany'];
    $cdate = $rowzz['cdate'];
    $ccountry = $rowzz['ccountry'];

    array_push($arrposition, $cposition);
    array_push($arrccompany, $ccompany);
    array_push($arrcdate, $cdate);
    array_push($arrccountry, $ccountry);

    array_push($arrposition, '-');
    array_push($arrccompany, '-');
    array_push($arrcdate, '-');
    array_push($arrccountry, '-');

    array_push($arrposition, '-');
    array_push($arrccompany, '-');
    array_push($arrcdate, '-');
    array_push($arrccountry, '-');
}

if ($rowCount == 2) {
    while ($rowzz = $c_experience->fetch_assoc()) {
        $cposition = $rowzz['cposition'];
        $ccompany = $rowzz['ccompany'];
        $cdate = $rowzz['cdate'];
        $ccountry = $rowzz['ccountry'];

        array_push($arrposition, $cposition);
        array_push($arrccompany, $ccompany);
        array_push($arrcdate, $cdate);
        array_push($arrccountry, $ccountry);
    }

    array_push($arrposition, '-');
    array_push($arrccompany, '-');
    array_push($arrcdate, '-');
    array_push($arrccountry, '-');
}

if ($rowCount == 3) {
    while ($rowzz = $c_experience->fetch_assoc()) {
        $cposition = $rowzz['cposition'];
        $ccompany = $rowzz['ccompany'];
        $cdate = $rowzz['cdate'];
        $ccountry = $rowzz['ccountry'];

        array_push($arrposition, $cposition);
        array_push($arrccompany, $ccompany);
        array_push($arrcdate, $cdate);
        array_push($arrccountry, $ccountry);
    }
}

// SKILLS
$c_skills = $db->query("SELECT * FROM `c_skills` WHERE u_num='$bcode'");
$row_c_skills = $c_skills->fetch_assoc();

// CAN DO
$washing = $row_c_skills['washing'];
$cleaning = $row_c_skills['cleaning'];
$ironing = $row_c_skills['ironing'];
$sewing = $row_c_skills['sewing'];
$cooking = $row_c_skills['cooking'];
$baby_care = $row_c_skills['baby_care'];

// LANGUAGE
$english = $row_c_skills['english'];
$arabic = $row_c_skills['arabic'];
$mandarin = $row_c_skills['mandarin'];

// EDUCATION
$c_educ = $db->query("SELECT * FROM `c_educ` WHERE u_num='$bcode'");
$row_c_educ = $c_educ->fetch_assoc();

$education_degree = $row_c_educ['degree'];
$education_school = $row_c_educ['school'];

function ageis($ager)
{
    $c = date('Y');
    $y = date('Y', strtotime($ager));
    return $c - $y . ' years old';
}

// // This is barcode
require 'code128.php';

$pdf = new PDF_Code128();
// $pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

$pdf->AddPage();

// LOGO
$pdf->Image('logo.png', 5, 5, -900);

// SIGNATURE
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

// $image_url = "https://eomsinc.com/v2/upload/".$bcode.".png"; // Found
// $ch = curl_init($image_url);
// curl_setopt($ch, CURLOPT_NOBODY, true);
// curl_exec($ch);
// $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
// curl_close($ch);

// if($httpCode != 404 ){
//     $pdf->Image('https://eomsinc.com/v2/upload/'.$bcode.'.png',130,215,-150);
// }

// LINE
$pdf->Image('vertical_line.png', 37, 7, -500);

// TEXT COMPANY NAME
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(40, 16);
$pdf->Write(6, 'Ephesians Overseas Manpower Supply Inc.');

// TEXT SLOGAN
$pdf->SetFont('Arial', '', 7);
$pdf->SetXY(40, 20);
$pdf->Write(6, 'PREMIER LANDBASED MANPOWER RECRUITMENT AGENCY');

$dateCreated = $rows_c_info['date_created'];
$dateCreated = date_create($dateCreated);
$date_formatit = date_format($dateCreated, 'm/d/Y');

// DATE CREATED 1
$pdf->SetFont('Arial', '', 8);
$pdf->SetXY(140, 32);
$pdf->Write(6, 'Date Created:_____________________');

$pdf->SetFont('Arial', '', 8);
$pdf->SetXY(165, 31);
$pdf->Write(6, $date_formatit);

// DATE CREATED 2
$pdf->SetFont('Arial', '', 8);
$pdf->SetXY(146, 233);
$pdf->Write(6, 'Date Created:_____________________');

// SIGNATURE
$pdf->SetFont('Arial', '', 8);
$pdf->SetXY(146, 225);
$pdf->Write(6, 'SIGNATURE:_____________________');

$pdf->SetFont('Arial', '', 8);
$pdf->SetXY(173, 233);
$pdf->Write(6, $date_formatit);

// FOOTER
$pdf->Image('footer.JPG', 1, 255, 208, 40);

// MAIN PICTURE
// $pdf->Image('../upload/'.$idpic,125,80,-500);
$pdf->Image('../upload/' . $idpic, 125, 80, 75, 100);

// CHECK
// SKILLS

if ($washing > 0) {
    // WASHING CHECK
    $pdf->Image('check.png', 12, 146, -1600);
}

if ($cleaning > 0) {
    // CLEANING CHECK
    $pdf->Image('check.png', 51, 146, -1600);
}

if ($ironing > 0) {
    // IRONING CHECK
    $pdf->Image('check.png', 89, 146, -1600);
}
if ($sewing > 0) {
    // SEWING CHECK
    $pdf->Image('check.png', 12, 151, -1600);
}
if ($cooking > 0) {
    // COOKING CHECK
    $pdf->Image('check.png', 51, 151, -1600);
    // BABY_CARE CHECK
}
if ($baby_care > 0) {
    // CLEANING CHECK
    $pdf->Image('check.png', 89, 151, -1600);
}

// LANGUAGE YOU CAN SPEAK OR WRITE:
if ($english == 1) {
    // ENGLISH FLUENT CHECK
    $pdf->Image('check.png', 52, 200, -1600);
} elseif ($english == 2) {
    // ENGLISH FAIR CHECK
    $pdf->Image('check.png', 83, 200, -1600);
} elseif ($english == 3) {
    // ENGLISH POOR CHECK
    $pdf->Image('check.png', 112, 200, -1600);
}

if ($arabic == 1) {
    // ARABIC FLUENT CHECK
    $pdf->Image('check.png', 52, 206, -1600);
} elseif ($arabic == 2) {
    // ARABIC FAIR CHECK
    $pdf->Image('check.png', 83, 206, -1600);
} elseif ($arabic == 3) {
    // ARABIC POOR CHECK
    $pdf->Image('check.png', 112, 206, -1600);
}

if ($mandarin == 1) {
    // MANDARIN FLUENT CHECK
    $pdf->Image('check.png', 52, 212, -1600);
} elseif ($mandarin == 2) {
    // MANDARIN FAIR CHECK
    $pdf->Image('check.png', 83, 212, -1600);
} elseif ($mandarin == 3) {
    // MANDARIN POOR CHECK
    $pdf->Image('check.png', 112, 212, -1600);
}

// The barcode
// $code='EOMS21E0000'.$value;
$code = $bcode;
// $pdf->Code128(150,5,$code,50,10);

// The text barcode
// $pdf->SetXY(163,14);
// $pdf->SetFont('Arial','',8);
// $pdf->Write(6,$code);

$pdf->Image(
    "http://localhost/v2/resume_builder/dh_form/qr_generator.php?code=$code",
    170,
    2,
    29,
    29,
    'png'
);

// The barcode 2
$code = $bcode;
$pdf->Code128(147, 239, $code, 50, 10);
// The text barcode2
$pdf->SetXY(160, 248);
$pdf->SetFont('Arial', '', 8);
$pdf->Write(6, $code);

$pdf->SetFont('Arial', 'B', 9);
$pdf->SetXY(10, 40);
$pdf->Cell(115, 10, 'PERSONAL DETAILS', 1, 0, 'C');
$pdf->Cell(35, 10, 'POSITION APPLIED:', 1, 0, 'C');
$pdf->Cell(40, 10, 'DOMESTIC HELPER', 1, 1, 'C');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 50);
$pdf->Cell(35, 6, 'FULL NAME:', 1, 0, 'R');
$pdf->Cell(80, 6, $fullname, 1, 0, 'C');
$pdf->Cell(35, 6, 'Preferred Country:', 1, 0, 'L');
$pdf->Cell(40, 6, $pcountry, 1, 1, 'C');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 56);
$pdf->Cell(35, 6, 'NATIONALITY:', 1, 0, 'R');
$pdf->Cell(80, 6, $nationality, 1, 0, 'C');
$pdf->Cell(35, 6, 'Monthly Salary:', 1, 0, 'l');
$pdf->Cell(40, 6, '$400', 1, 1, 'C');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 62);
$pdf->Cell(35, 6, 'RELIGION:', 1, 0, 'R');
$pdf->Cell(80, 6, $religion, 1, 0, 'C');
$pdf->Cell(35, 6, '___First Timer:', 1, 1, 'L');

if ($first_or_ex > 0) {
    // FIRST TIMER CHECKER
    $pdf->Image('check.png', 162, 61.5, -1600);
} else {
    // EX ABROAD CHECKER
    $pdf->Image('check.png', 127, 61.5, -1600);
}

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 68);
$pdf->Cell(35, 6, 'DATE OF BIRTH:', 1, 0, 'R');
$pdf->Cell(80, 6, $birthday, 1, 0, 'C');
$pdf->Cell(35, 6, '', 1, 1, 'L');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 74);
$pdf->Cell(35, 6, 'AGE:', 1, 0, 'R');
$pdf->Cell(80, 6, ageis($birthday), 1, 0, 'C');
$pdf->Cell(35, 6, '', 1, 1, 'L');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 80);
$pdf->Cell(35, 6, 'PLACE OF BIRTH:', 1, 0, 'R');
$pdf->Cell(80, 6, $place_of_birth, 1, 1, 'C');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 86);
$pdf->Cell(35, 6, 'HOME ADDRESS:', 1, 0, 'R');
$pdf->Cell(80, 6, $address, 1, 1, 'C');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 92);
$pdf->Cell(35, 6, 'MARITAL STATUS:', 1, 0, 'R');
$pdf->Cell(80, 6, $marital_status, 1, 1, 'C');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 98);
$pdf->Cell(35, 6, 'NO. OF CHILDREN:', 1, 0, 'R');
$pdf->Cell(80, 6, $no_of_children, 1, 1, 'C');

$pdf->SetFont('Arial', '', 8);
$pdf->SetXY(10, 104);
$pdf->Cell(35, 6, 'EDUC. BACKGROUND:', 1, 0, 'R');
$pdf->Cell(80, 6, $education_degree . ' - ' . $education_school, 1, 1, 'C');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 110);
$pdf->Cell(35, 6, 'CONTACT NUMBER:', 1, 0, 'R');
$pdf->Cell(80, 6, $cno1, 1, 1, 'C');

$pdf->SetFont('Arial', 'B', 9);
$pdf->SetXY(10, 116);
$pdf->Cell(115, 6, 'PREVIOUS EMPLOYMENT (ABROAD)', 1, 1, 'C');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 122);
$pdf->Cell(25, 6, 'Country:', 1, 0, 'L');

$pdf->Cell(30, 6, $arrccountry[0], 1, 0, 'L');
$pdf->Cell(30, 6, $arrccountry[1], 1, 0, 'L');
$pdf->Cell(30, 6, $arrccountry[2], 1, 1, 'L');
/////////////////////////////////////////////////////////////////////////////////////////////////
$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 128);
$pdf->Cell(25, 6, 'Position:', 1, 0, 'L');
$pdf->Cell(30, 6, $arrposition[0], 1, 0, 'L');
$pdf->Cell(30, 6, $arrposition[1], 1, 0, 'L');
$pdf->Cell(30, 6, $arrposition[2], 1, 1, 'L');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 134);
$pdf->Cell(25, 6, 'Period:', 1, 0, 'L');
$pdf->Cell(30, 6, $arrcdate[0], 1, 0, 'L');
$pdf->Cell(30, 6, $arrcdate[1], 1, 0, 'L');
$pdf->Cell(30, 6, $arrcdate[2], 1, 1, 'L');

$pdf->SetFont('Arial', 'B', 9);
$pdf->SetXY(10, 140);
$pdf->Cell(115, 6, 'HOUSEHOLD WORK EXPERIENCE(S)', 1, 1, 'C');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 146);
$pdf->Cell(39, 6, '.    .Washing', 1, 0, 'L');
$pdf->Cell(38, 6, '.    .Cleaning', 1, 0, 'L');
$pdf->Cell(38, 6, '.    .Ironing', 1, 1, 'L');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 152);
$pdf->Cell(39, 6, '.    .Sewing', 1, 0, 'L');
$pdf->Cell(38, 6, '.    .Cooking', 1, 0, 'L');
$pdf->Cell(38, 6, '.    .Baby care', 1, 1, 'L');

$pdf->SetFont('Arial', 'B', 9);
$pdf->SetXY(10, 158);
$pdf->Cell(115, 6, 'CONTACT PERSON:', 1, 1, 'C');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 164);
$pdf->Cell(115, 6, 'Name: ' . $name, 1, 1, 'L');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 170);
$pdf->Cell(115, 6, 'Contact Number: ' . $cno, 1, 1, 'L');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 176);
$pdf->Cell(115, 6, 'Relationship: ' . $crelationship, 1, 1, 'L');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 182);
$pdf->Cell(115, 6, 'Address: ' . $caddress, 1, 1, 'L');

$pdf->SetFont('Arial', 'B', 9);
$pdf->SetXY(10, 188);
$pdf->Cell(115, 6, 'LANGUAGE YOU CAN SPEAK OR WRITE:', 1, 1, 'C');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 194);
$pdf->Cell(30, 6, 'Language', 1, 0, 'L');
$pdf->Cell(30, 6, 'Fluent', 1, 0, 'L');
$pdf->Cell(30, 6, 'Fair', 1, 0, 'L');
$pdf->Cell(30, 6, 'Poor', 1, 0, 'L');
$pdf->Cell(30, 6, 'Weight:', 1, 0, 'R');
$pdf->Cell(40, 6, $weight . ' lbs', 1, 1, 'L');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 200);
$pdf->Cell(30, 6, 'English', 1, 0, 'L');
$pdf->Cell(30, 6, '', 1, 0, 'L');
$pdf->Cell(30, 6, '', 1, 0, 'L');
$pdf->Cell(30, 6, '', 1, 0, 'L');
$pdf->Cell(30, 6, 'Height:', 1, 0, 'R');
$pdf->Cell(40, 6, $height . ' cm', 1, 1, 'L');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 206);
$pdf->Cell(30, 6, 'Arabic', 1, 0, 'L');
$pdf->Cell(30, 6, '', 1, 0, 'L');
$pdf->Cell(30, 6, '', 1, 0, 'L');
$pdf->Cell(30, 6, '', 1, 0, 'L');
$pdf->Cell(30, 6, 'Passport No:', 1, 0, 'R');
$pdf->Cell(40, 6, $pnumber, 1, 1, 'L');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 212);
$pdf->Cell(30, 6, 'Mandarin', 1, 0, 'L');
$pdf->Cell(30, 6, '', 1, 0, 'L');
$pdf->Cell(30, 6, '', 1, 0, 'L');
$pdf->Cell(30, 6, '', 1, 0, 'L');
$pdf->Cell(30, 6, 'Blood type:', 1, 0, 'R');
$pdf->Cell(40, 6, $blood_type, 1, 1, 'L');

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(10, 218);
$pdf->Cell(190, 35, '', 1, 1, '');

// $pdf->SetFont('Arial','',9);
// $pdf->SetXY(10,218);
// $pdf->Cell(135,20,'',1,1,'');

$pdf->SetXY(10, 220);
$pdf->SetFont('Arial', '', 8);
$pdf->Write(6, 'REMARKS');

// PRIVACY POLICY

// $pdf->SetXY(10,238);
// $pdf->SetFont('Arial','',8);
// $pdf->MultiCell( 135, 5, 'In compliance with republic Act 10173 or Data Privacy Act of 2012, I read and understood the above hereby consent to, agree on, accept and acknowledge that the information I provided are true and can be used and can be used and accessed by the management for the purpose of my application.', 1);

$pdf->SetXY(13, 230);
$pdf->SetFont('Arial', '', 8);
$pdf->Write(6, $scomment);

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(160, 62);
$pdf->Cell(40, 18, '', 1, 0, '');

$pdf->SetXY(160, 62);
$pdf->SetFont('Arial', '', 8);
$pdf->Write(6, '___Ex-Abroad');

//  PHOTO 3R
$pdf->SetFont('Arial', '', 9);
$pdf->SetXY(125, 80);
$pdf->Cell(75, 114, '', 1, 0, '');

$pdf->SetXY(160, 66);
$pdf->SetFont('Arial', '', 8);
$pdf->Write(6, 'Previous Agency Name:');

$pdf->SetXY(160, 70);
$pdf->SetFont('Arial', '', 8);
$pdf->Write(6, $ex_agency);

// CHECKBOX FIRST TIMER
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetXY(127, 63.5);
$pdf->Cell(3, 3, '', 1, 1, 'L');

// CHECKBOX EX-ABROAD
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetXY(162, 63.5);
$pdf->Cell(3, 3, '', 1, 1, 'L');

//CHECKBOX WASHING
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetXY(12, 148);
$pdf->Cell(3, 3, '', 1, 1, 'L');

//CHECKBOX CLEANING
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetXY(51, 148);
$pdf->Cell(3, 3, '', 1, 1, 'L');

//CHECKBOX IRONING
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetXY(89, 148);
$pdf->Cell(3, 3, '', 1, 1, 'L');

//CHECKBOX SEWING
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetXY(12, 153);
$pdf->Cell(3, 3, '', 1, 1, 'L');

//CHECKBOX COOKING
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetXY(51, 153);
$pdf->Cell(3, 3, '', 1, 1, 'L');

//CHECKBOX BABYCARE
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetXY(89, 153);
$pdf->Cell(3, 3, '', 1, 1, 'L');

$pdf->Output('I', $resume_name . '.pdf', true);

$pdf->Output();

?>