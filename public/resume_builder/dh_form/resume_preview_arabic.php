<?php
session_start();
include 'connect.php';


$bcode = $_GET['bcode'];

$c_information1 = $db->query("SELECT * FROM `c_information` WHERE bcode='$bcode'");
$rows_c_info = $c_information1->fetch_assoc();   



$fullname = $rows_c_info['fullname'];
$pnumber = $rows_c_info['pnumber'];
$gender = $rows_c_info['gender'];
$birthday = $rows_c_info['birthday'];
$nationality = "FILIPINO";
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
$c_contactinfo = $db->query("SELECT * FROM `c_contactinfo` WHERE u_num='$bcode'");
$rows_c_contactinfo = $c_contactinfo->fetch_assoc(); 


$u_num = $rows_c_contactinfo['u_num'];
// $cno1 = $rows_c_contactinfo['cno1'];
$cno1 = "**********";
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
$arrposition = array();
$arrccompany = array();
$arrcdate = array();
$arrccountry = array();


$c_experience = $db->query("SELECT * FROM `c_experience` WHERE u_num='$bcode'");
$rowCount =   mysqli_num_rows ($c_experience);

if($rowCount == 1){

    $rowzz = $c_experience->fetch_assoc();

    $cposition = $rowzz['cposition'];
    $ccompany = $rowzz['ccompany'];
    $cdate = $rowzz['cdate'];
    $ccountry = $rowzz['ccountry'];

    array_push($arrposition, $cposition);
    array_push($arrccompany, $ccompany);
    array_push($arrcdate, $cdate);
    array_push($arrccountry, $ccountry);

    array_push($arrposition, "-");
    array_push($arrccompany, "-");
    array_push($arrcdate, "-");
    array_push($arrccountry, "-");

    array_push($arrposition, "-");
    array_push($arrccompany, "-");
    array_push($arrcdate, "-");
    array_push($arrccountry, "-");

  

}


if($rowCount == 2){

    while($rowzz = $c_experience->fetch_assoc()){

        $cposition = $rowzz['cposition'];
        $ccompany = $rowzz['ccompany'];
        $cdate = $rowzz['cdate'];
        $ccountry = $rowzz['ccountry'];
    
        array_push($arrposition, $cposition);
        array_push($arrccompany, $ccompany);
        array_push($arrcdate, $cdate);
        array_push($arrccountry, $ccountry);



    }

        array_push($arrposition, "-");
        array_push($arrccompany, "-");
        array_push($arrcdate, "-");
        array_push($arrccountry,"-");
   

}

if($rowCount == 3){

    while($rowzz = $c_experience->fetch_assoc()){

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


function ageis($ager){


    $c= date('Y');
    $y= date('Y',strtotime($ager));
    return $c-$y." years old";


}






require 'tcpdf.php';

$pdf = new TCPDF('P' , 'mm', 'A4' , true, 'UTF-8', false);
$pdf->SetMargins(1, 1, 1, true);

$pdf-> setPrintHeader(false);
$pdf-> setPrintFooter(false);
$pdf->SetAutoPageBreak(FALSE, 0);



// Add Page
$pdf->AddPage();



$pdf->SetFont('freeserif', '', 16);




// LOGO
$pdf->SetXY(5, 5);
$pdf->Image('logo.jpg', '', '', 30, 30, '', '', 'T', false, 300, '', false, false, 0, false, false, false);


// LINE
$pdf->SetXY(37, 7);
$pdf->Image('vertical_line.jpg', '', '', .5, 24, '', '', 'T', false, 300, '', false, false, 0, false, false, false);

// TEXT COMPANY NAME
$pdf->SetFont('freeserif', '', 12);
$pdf->SetXY(40,16);
$pdf->Write(6,'Ephesians Overseas Manpower Supply Inc.');

// TEXT SLOGAN
$pdf->SetFont('freeserif', '', 7);
$pdf->SetXY(40,20);
$pdf->Write(6,'PREMIER LANDBASED MANPOWER RECRUITMENT AGENCY');


// FOOTER
$pdf->Image('footer.JPG', 1, 255, 208, 40, 'JPG', 'http://eomsinc.com', '', true, 150, '', false, false, 0, false, false, false);


// MAIN PICTURE 
// $pdf->Image('../upload/'.$idpic,125,80,-500);
$pdf->Image('../upload/'.$idpic,125,80,75,100);


    // CHECK 
    // SKILLS

    

        if($washing > 0){
            // WASHING CHECK
            $pdf->SetXY(12, 146);
            $pdf->Image('check.png', '', '', 5, 5, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
        }
    
        if($cleaning > 0){
            // CLEANING CHECK
            $pdf->SetXY(51,146);
            $pdf->Image('check.png', '', '', 5, 5, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
        }
    
        if($ironing > 0){
            // IRONING CHECK
            $pdf->SetXY(89,146);
            $pdf->Image('check.png', '', '', 5, 5, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
        }

        if($sewing > 0){
            // SEWING CHECK
            $pdf->SetXY(12,151);
            $pdf->Image('check.png', '', '', 5, 5, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
        }

        if($cooking  > 0){
            // COOKING CHECK
            $pdf->SetXY(51,151);
            $pdf->Image('check.png', '', '', 5, 5, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
        }

        if($baby_care > 0){
            // BABY CARE
            $pdf->SetXY(90,151);
            $pdf->Image('check.png', '', '', 5, 5, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
        }


        // LANGUAGE YOU CAN SPEAK OR WRITE:
        
        if($english == 1){
            // ENGLISH FLUENT CHECK
            $pdf->SetXY(52,200);
            $pdf->Image('check.png', '', '', 5, 5, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
        }else if($english == 2){
            // ENGLISH FAIR CHECK
            $pdf->SetXY(83,200);
            $pdf->Image('check.png', '', '', 5, 5, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
        }else if($english == 3){
            // ENGLISH POOR CHECK
            $pdf->SetXY(112,200);
            $pdf->Image('check.png', '', '', 5, 5, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
        }



        if($arabic == 1){
            // ARABIC FLUENT CHECK
            $pdf->SetXY(52,206);
            $pdf->Image('check.png', '', '', 5, 5, '', '', 'T', false, 300, '', false, false, 0, false, false, false);

        }else if($arabic == 2){
            // ARABIC FAIR CHECK
            $pdf->SetXY(83,206);
            $pdf->Image('check.png', '', '', 5, 5, '', '', 'T', false, 300, '', false, false, 0, false, false, false);

        }else if($arabic == 3){
            // ARABIC POOR CHECK
            $pdf->SetXY(112,206);
            $pdf->Image('check.png', '', '', 5, 5, '', '', 'T', false, 300, '', false, false, 0, false, false, false);

        }


        if($mandarin == 1){
            // MANDARIN FLUENT CHECK
            $pdf->SetXY(52,212);
             $pdf->Image('check.png', '', '', 5, 5, '', '', 'T', false, 300, '', false, false, 0, false, false, false);

        }else if($mandarin == 2){
            // MANDARIN FAIR CHECK
            $pdf->SetXY(83,212);
             $pdf->Image('check.png', '', '', 5, 5, '', '', 'T', false, 300, '', false, false, 0, false, false, false);

        }else if($mandarin == 3){
            // MANDARIN POOR CHECK
            $pdf->SetXY(112,212);
             $pdf->Image('check.png', '', '', 5, 5, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
        }
                    



// The barcode
$pdf->SetFont('helvetica', '', 10);

// define barcode style
$style = array(
    'position' => 'R',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => false,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 7,
    'stretchtext' => 4
);

$style2 = array(
    'position' => 'C',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => false,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 7,
    'stretchtext' => 4
);


// CODE 128B AUTO
$code = $bcode;
$pdf->SetXY(145,5);
$pdf->write1DBarcode($code, 'C128B', '', '', '', 15, 0.4, $style, 'N');


// CODE 128B AUTO 2
$code = $bcode;
$pdf->SetXY(145,280);
$pdf->write1DBarcode($code, 'C128B', '', '', '', 15, 0.4, $style2, 'N');







$pdf->SetFont('freeserif','B',9);
$pdf->SetXY(10,40);
$pdf->Cell(115,10,'التفاصيل الشخصية',1,0,'C'); // PERSONAL DETAILS TITLE
$pdf->Cell(35,10,'DOMESTIC HELPER',1,0,'C');
$pdf->Cell(40,10,'الموقف المطبق:',1,1,'L'); // POSITION APPLIED:



$pdf->SetFont('freeserif','',9);
$pdf->SetXY(10,50);
$pdf->Cell(80,6,$fullname,1,0,'R');
$pdf->Cell(35,6,'الاسم الكامل:',1,0,'L'); // FULLNAME

$pdf->Cell(35,6,$pcountry,1,0,'C');
$pdf->Cell(40,6,'البلد المفضل',1,1,'L'); // Preffered Country




$pdf->SetFont('freeserif','',10);
$pdf->SetXY(10,56);
$pdf->Cell(80,6,$nationality,1,0,'R');
$pdf->Cell(35,6,'الجنسية:',1,0,'L'); // NATIONALITY


$pdf->Cell(35,6,'$400',1,0,'C');
// Monthly Salary:
$pdf->Cell(40,6,'راتب شهري:',1,1,'l');




$pdf->SetFont('freeserif','',10);
$pdf->SetXY(10,62);
$pdf->Cell(80,6,$religion,1,0,'R');
$pdf->Cell(35,6,'الديانة :',1,0,'L'); //RELIGION
$pdf->Cell(35,6,'المؤقت الاول:',1,1,'L');


    if($first_or_ex > 0){
        // FIRST TIMER CHECKER
        $pdf->SetXY(180,61.5);
        $pdf->Image('check.png', '', '', 5, 5, '', '', 'T', false, 300, '', false, false, 0, false, false, false);

    }else{
        // EX ABROAD CHECKER
        $pdf->SetXY(145,61.5);
        $pdf->Image('check.png', '', '', 5, 5, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
    }



$pdf->SetFont('freeserif','',9);
$pdf->SetXY(10,68);
$pdf->Cell(80,6,$birthday,1,0,'R');
$pdf->Cell(35,6,'تاريخ الولادة:',1,0,'L');
$pdf->Cell(35,6,'',1,1,'L');

$pdf->SetFont('freeserif','',10);
$pdf->SetXY(10,74);
$pdf->Cell(80,6,ageis($birthday),1,0,'R');
$pdf->Cell(35,6,'سن:',1,0,'L'); // AGE

$pdf->Cell(35,6,'',1,1,'L');

$pdf->SetFont('freeserif','',9);
$pdf->SetXY(10,80);
$pdf->Cell(80,6,$place_of_birth,1,0,'R');
$pdf->Cell(35,6,'مكان الولادة:',1,1,'L');


$pdf->SetFont('freeserif','',9);
$pdf->SetXY(10,86);
$pdf->Cell(80,6,$address,1,0,'R');
$pdf->Cell(35,6,'عنوان المنزل:',1,1,'L');


$pdf->SetFont('freeserif','',9);
$pdf->SetXY(10,92);
$pdf->Cell(80,6,$marital_status,1,0,'R');
$pdf->Cell(35,6,'الحالة الاجتماعية:',1,1,'L');


$pdf->SetFont('freeserif','',9);
$pdf->SetXY(10,98);
$pdf->Cell(80,6,$no_of_children,1,0,'R');
$pdf->Cell(35,6,'عدد. للأطفال:',1,1,'L');


$pdf->SetFont('freeserif','',8);
$pdf->SetXY(10,104);
$pdf->Cell(80,6,$education_degree.' - '.$education_school,1,0,'R');
$pdf->Cell(35,6,'خلفية تعليمية:',1,1,'L');


$pdf->SetFont('freeserif','',9);
$pdf->SetXY(10,110);
$pdf->Cell(80,6,$cno1,1,0,'R');
$pdf->Cell(35,6,'رقم الاتصال:',1,1,'L');


$pdf->SetFont('freeserif','B',9);
$pdf->SetXY(10,116);
$pdf->Cell(115,6,'العمل السابق (بالخارج)',1,1,'C');


$pdf->SetFont('freeserif','',9);
$pdf->SetXY(10,122);
// Country
$pdf->Cell(25,6,'Country:',1,0,'L');
$pdf->Cell(30,6,$arrccountry[0],1,0,'R');
$pdf->Cell(30,6,$arrccountry[1],1,0,'R');
$pdf->Cell(30,6,$arrccountry[2],1,1,'C');

$pdf->SetFont('freeserif','',9);
$pdf->SetXY(10,128);
// Position
$pdf->Cell(25,6,'Position:',1,0,'L');
$pdf->Cell(30,6,$arrposition[0],1,0,'R');
$pdf->Cell(30,6,$arrposition[1],1,0,'R');
$pdf->Cell(30,6,$arrposition[2],1,1,'C');

$pdf->SetFont('freeserif','',9);
$pdf->SetXY(10,134);
// Period
$pdf->Cell(25,6,'Period:',1,0,'L');
$pdf->Cell(30,6,$arrcdate[0],1,0,'R');
$pdf->Cell(30,6,$arrcdate[1],1,0,'R');
$pdf->Cell(30,6,$arrcdate[2],1,1,'C');

$pdf->SetFont('freeserif','B',9);
$pdf->SetXY(10,140);
$pdf->Cell(115,6,'خبرة (خبرات) العمل المنزلي',1,1,'C');

$pdf->SetFont('freeserif','',9);
$pdf->SetXY(10,146);
$pdf->Cell(39,6,'.    .Washing',1,0,'L');
$pdf->Cell(38,6,'.    .Cleaning',1,0,'L');
$pdf->Cell(38,6,'.    .Ironing',1,1,'L');

$pdf->SetFont('freeserif','',9);
$pdf->SetXY(10,152);
$pdf->Cell(39,6,'.    .Sewing',1,0,'L');
$pdf->Cell(38,6,'.    .Cooking',1,0,'L');
$pdf->Cell(38,6,'.    .Baby care',1,1,'L');

$pdf->SetFont('freeserif','B',9);
$pdf->SetXY(10,158);
$pdf->Cell(115,6,'الشخص الذي يمكن الاتصال به:',1,1,'C');

// Name
$pdf->SetFont('freeserif','',12);
$pdf->SetXY(10,164);
$pdf->Cell(115,6,$name.': اسم',1,1,'R');


// Contact Number
$pdf->SetFont('freeserif','',12);
$pdf->SetXY(10,170);
$pdf->Cell(115,6,' رقم الاتصال: '.$cno,1,1,'R');


// Relationship
$pdf->SetFont('freeserif','',12);
$pdf->SetXY(10,176);
$pdf->Cell(115,6,$crelationship.': صلة ',1,1,'R');

// Address
$pdf->SetFont('freeserif','',12);
$pdf->SetXY(10,182);
$pdf->Cell(115,6,$caddress.' : عنوان ',1,1,'R');

$pdf->SetFont('freeserif','B',9);
$pdf->SetXY(10,188);
// LANGUAGE YOU CAN SPEAK OR WRITE:
$pdf->Cell(115,6,'اللغة التي يمكنك التحدث بها أو الكتابة:',1,1,'C');


$pdf->SetFont('freeserif','',9);
$pdf->SetXY(10,194);
// Language
$pdf->Cell(30,6,'لغة',1,0,'L');
// Fluent
$pdf->Cell(30,6,'بطلاقة',1,0,'L');
// Fair
$pdf->Cell(30,6,'تماما',1,0,'L');
// Poor
$pdf->Cell(30,6,'ضعيف',1,0,'L');
$pdf->Cell(30,6,$weight.' lbs',1,0,'R');
// Weight
$pdf->Cell(40,6,'وزن',1,1,'L');

$pdf->SetFont('freeserif','',9);
$pdf->SetXY(10,200);
// English
$pdf->Cell(30,6,'English',1,0,'L');
$pdf->Cell(30,6,'',1,0,'L');
$pdf->Cell(30,6,'',1,0,'L');
$pdf->Cell(30,6,'',1,0,'L');
$pdf->Cell(30,6,$height.' cm',1,0,'R');
$pdf->Cell(40,6,'ارتفاع',1,1,'L');

$pdf->SetFont('freeserif','',9);
$pdf->SetXY(10,206);
// Arabic
$pdf->Cell(30,6,'Arabic',1,0,'L');
$pdf->Cell(30,6,'',1,0,'L');
$pdf->Cell(30,6,'',1,0,'L');
$pdf->Cell(30,6,'',1,0,'L');
$pdf->Cell(30,6,$pnumber,1,0,'R');
$pdf->Cell(40,6,'رقم جواز السفر.',1,1,'L');

$pdf->SetFont('freeserif','',9);
$pdf->SetXY(10,212);
// Mandarin
$pdf->Cell(30,6,'Mandarin',1,0,'L');
$pdf->Cell(30,6,'',1,0,'L');
$pdf->Cell(30,6,'',1,0,'L');
$pdf->Cell(30,6,'',1,0,'L');
$pdf->Cell(30,6,$blood_type,1,0,'R');
$pdf->Cell(40,6,'فصيلة الدم',1,1,'L');

$pdf->SetFont('freeserif','',9);
$pdf->SetXY(10,218);
$pdf->Cell(190,35,'',1,1,'');

$pdf->SetXY(10,220);
$pdf->SetFont('freeserif','',12);
// REMARKS
$pdf->Write(6,'ملاحظات');



$pdf->SetXY(13,230);
$pdf->SetFont('freeserif','',8);
$pdf->Write(6,$scomment);

$pdf->SetFont('freeserif','',9);
$pdf->SetXY(160,62);
$pdf->Cell(40,18,'',1,0,'');


$pdf->SetXY(160,62);
$pdf->SetFont('freeserif','',8);
$pdf->Write(6,'في الخارج سابقا');


//  PHOTO 3R
$pdf->SetFont('freeserif','',9);
$pdf->SetXY(125,80);
$pdf->Cell(75,114,'',1,0,'');

$pdf->SetXY(160,66);
$pdf->SetFont('freeserif','',8);
$pdf->Write(6,'اسم الوكالة السابق:');

$pdf->SetXY(160,70);
$pdf->SetFont('freeserif','',8);
    $pdf->Write(6,$ex_agency);


// CHECKBOX FIRST TIMER
$pdf->SetFont('freeserif','B',9);
$pdf->SetXY(145,63);
$pdf->Cell(4,3,'',1,1,'L');

// CHECKBOX EX-ABROAD
$pdf->SetFont('freeserif','B',9);
$pdf->SetXY(180,63);
$pdf->Cell(4,3,'',1,1,'L');

//CHECKBOX WASHING
$pdf->SetFont('freeserif','B',9);
$pdf->SetXY(12,148);
$pdf->Cell(3,3,'',1,1,'L');

//CHECKBOX CLEANING
$pdf->SetFont('freeserif','B',9);
$pdf->SetXY(51,148);
$pdf->Cell(3,3,'',1,1,'L');

//CHECKBOX IRONING
$pdf->SetFont('freeserif','B',9);
$pdf->SetXY(89,148);
$pdf->Cell(3,3,'',1,1,'L');


//CHECKBOX SEWING
$pdf->SetFont('freeserif','B',9);
$pdf->SetXY(12,153);
$pdf->Cell(3,3,'',1,1,'L');

//CHECKBOX COOKING
$pdf->SetFont('freeserif','B',9);
$pdf->SetXY(51,153);
$pdf->Cell(3,3,'',1,1,'L');

//CHECKBOX BABYCARE
$pdf->SetFont('freeserif','B',9);
$pdf->SetXY(89,153);
$pdf->Cell(3,3,'',1,1,'L');




// Output

ob_end_clean(); 

$pdf->Output();


?>