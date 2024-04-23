<?php
include 'connect.php';

$type_user = $_GET['type'];

$start_page = $_GET['start_page'];
$end_page = $_GET['end_page'];
$yr_created = $_GET['yr_created'];
$myarray = array();

for($i=$start_page; $i<=$end_page ;$i++){
    array_push($myarray,$i );
}



// // This is barcode
require('code128.php');


$pdf=new PDF_Code128();
// $pdf->AddPage();
$pdf->SetFont('Arial','',10);


foreach($myarray as $value){
    $pdf->AddPage();
    

    // LOGO
    $pdf->Image('logo.png',5,5,-900);
    // LINE
    $pdf->Image('vertical_line.png',37,7,-500);

    // TEXT COMPANY NAME
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(40,16);
    $pdf->Write(6,'Ephesians Overseas Manpower Supply Inc.');

     // TEXT SLOGAN
     $pdf->SetFont('Arial','',7);
     $pdf->SetXY(40,20);
     $pdf->Write(6,'PREMIER LANDBASED MANPOWER RECRUITMENT AGENCY');
	 
	 
	 
	   // DATE CREATED 1
        $pdf->SetFont('Arial','',8);
        $pdf->SetXY(140,32);
        $pdf->Write(6,'Date Created:_____________________');

    

        // DATE CREATED 2
        $pdf->SetFont('Arial','',8);
        $pdf->SetXY(146,233);
        $pdf->Write(6,'Date Created:_____________________');

     
	 
	 
	 
	 
	 
  
    // FOOTER
    $pdf->Image('footer.JPG',1,255,208,40);



  

    // The barcode
    // $code='EOMS21E0000'.$value;
    $code='EOMS'.$yr_created.$type_user.str_pad($value, 5,'0', STR_PAD_LEFT);
    $pdf->Code128(150,5,$code,50,10);

        // SAVING TO DATABASE EACH BARCODE

        $db->query("INSERT INTO fdh (barcode)

        VALUES ('$code')");





    // The text barcode
    $pdf->SetXY(163,14);
    $pdf->SetFont('Arial','',8);
    $pdf->Write(6,$code);







    
    $pdf->SetFont('Arial','B',9);
    $pdf->SetXY(10,40);
    $pdf->Cell(115,10,'PERSONAL DETAILS',1,0,'C');
    $pdf->Cell(35,10,'POSITION APPLIED:',1,0,'C');
    $pdf->Cell(40,10,'',1,1,'C');
 
   
    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,50);
    $pdf->Cell(35,6,'FULL NAME:',1,0,'R');
    $pdf->Cell(80,6,'',1,0,'C');
    $pdf->Cell(35,6,'Preferred Country:',1,0,'L');
    $pdf->Cell(40,6,'',1,1,'C');


    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,56);
    $pdf->Cell(35,6,'NATIONALITY:',1,0,'R');
    $pdf->Cell(80,6,'',1,0,'C');
    $pdf->Cell(35,6,'Monthly Salary:',1,0,'l');
    $pdf->Cell(40,6,'',1,1,'C');


    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,62);
    $pdf->Cell(35,6,'RELIGION:',1,0,'R');
    $pdf->Cell(80,6,'',1,0,'C');
    $pdf->Cell(35,6,'___First Timer:',1,1,'L');
   

    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,68);
    $pdf->Cell(35,6,'DATE OF BIRTH:',1,0,'R');
    $pdf->Cell(80,6,'',1,0,'C');
    $pdf->Cell(35,6,'',1,1,'L');

    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,74);
    $pdf->Cell(35,6,'AGE:',1,0,'R');
    $pdf->Cell(80,6,'',1,0,'C');
    $pdf->Cell(35,6,'',1,1,'L');

    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,80);
    $pdf->Cell(35,6,'PLACE OF BIRTH:',1,0,'R');
    $pdf->Cell(80,6,'',1,1,'C');

    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,86);
    $pdf->Cell(35,6,'HOME ADDRESS:',1,0,'R');
    $pdf->Cell(80,6,'',1,1,'C');

    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,92);
    $pdf->Cell(35,6,'MARITAL STATUS:',1,0,'R');
    $pdf->Cell(80,6,'',1,1,'C');
  
    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,98);
    $pdf->Cell(35,6,'NO. OF CHILDREN:',1,0,'R');
    $pdf->Cell(80,6,'',1,1,'C');

    $pdf->SetFont('Arial','',8);
    $pdf->SetXY(10,104);
    $pdf->Cell(35,6,'EDUC. BACKGROUND:',1,0,'R');
    $pdf->Cell(80,6,'',1,1,'C');

    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,110);
    $pdf->Cell(35,6,'CONTACT NUMBER:',1,0,'R');
    $pdf->Cell(80,6,'',1,1,'C');

    $pdf->SetFont('Arial','B',9);
    $pdf->SetXY(10,116);
    $pdf->Cell(115,6,'PREVIOUS EMPLOYMENT (ABROAD)',1,1,'C');
   

    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,122);
    $pdf->Cell(25,6,'Country:',1,0,'L');
    $pdf->Cell(30,6,'',1,0,'R');
    $pdf->Cell(30,6,'',1,0,'R');
    $pdf->Cell(30,6,'',1,1,'C');

    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,128);
    $pdf->Cell(25,6,'Position:',1,0,'L');
    $pdf->Cell(30,6,'',1,0,'R');
    $pdf->Cell(30,6,'',1,0,'R');
    $pdf->Cell(30,6,'',1,1,'C');

    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,134);
    $pdf->Cell(25,6,'Period:',1,0,'L');
    $pdf->Cell(30,6,'',1,0,'R');
    $pdf->Cell(30,6,'',1,0,'R');
    $pdf->Cell(30,6,'',1,1,'C');

    $pdf->SetFont('Arial','B',9);
    $pdf->SetXY(10,140);
    $pdf->Cell(115,6,'HOUSEHOLD WORK EXPERIENCE(S)',1,1,'C');

    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,146);
    $pdf->Cell(39,6,'.    .Washing',1,0,'L');
    $pdf->Cell(38,6,'.    .Cleaning',1,0,'L');
    $pdf->Cell(38,6,'.    .Ironing',1,1,'L');

    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,152);
    $pdf->Cell(39,6,'.    .Sewing',1,0,'L');
    $pdf->Cell(38,6,'.    .Cooking',1,0,'L');
    $pdf->Cell(38,6,'.    .Baby care',1,1,'L');

    $pdf->SetFont('Arial','B',9);
    $pdf->SetXY(10,158);
    $pdf->Cell(115,6,'CONTACT PERSON:',1,1,'C');

    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,164);
    $pdf->Cell(115,6,'Name:',1,1,'L');

    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,170);
    $pdf->Cell(115,6,'Contact Number:',1,1,'L');

    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,176);
    $pdf->Cell(115,6,'Relationship:',1,1,'L');

    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,182);
    $pdf->Cell(115,6,'Address:',1,1,'L');
   
    $pdf->SetFont('Arial','B',9);
    $pdf->SetXY(10,188);
    $pdf->Cell(115,6,'LANGUAGE YOU CAN SPEAK OR WRITE:',1,1,'C');


    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,194);
    $pdf->Cell(30,6,'Language',1,0,'L');
    $pdf->Cell(30,6,'Fluent',1,0,'L');
    $pdf->Cell(30,6,'Fair',1,0,'L');
    $pdf->Cell(30,6,'Poor',1,0,'L');
    $pdf->Cell(30,6,'Weight:',1,0,'R');
    $pdf->Cell(40,6,'',1,1,'L');

    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,200);
    $pdf->Cell(30,6,'English',1,0,'L');
    $pdf->Cell(30,6,'',1,0,'L');
    $pdf->Cell(30,6,'',1,0,'L');
    $pdf->Cell(30,6,'',1,0,'L');
    $pdf->Cell(30,6,'Height:',1,0,'R');
    $pdf->Cell(40,6,'',1,1,'L');

    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,206);
    $pdf->Cell(30,6,'Arabic',1,0,'L');
    $pdf->Cell(30,6,'',1,0,'L');
    $pdf->Cell(30,6,'',1,0,'L');
    $pdf->Cell(30,6,'',1,0,'L');
    $pdf->Cell(30,6,'Passport No:',1,0,'R');
    $pdf->Cell(40,6,'',1,1,'L');

    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,212);
    $pdf->Cell(30,6,'Mandarin',1,0,'L');
    $pdf->Cell(30,6,'',1,0,'L');
    $pdf->Cell(30,6,'',1,0,'L');
    $pdf->Cell(30,6,'',1,0,'L');
    $pdf->Cell(30,6,'Blood type:',1,0,'R');
    $pdf->Cell(40,6,'',1,1,'L');

    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(10,218);
    $pdf->Cell(190,35,'',1,1,'');

    $pdf->SetXY(10,220);
    $pdf->SetFont('Arial','',8);
    $pdf->Write(6,'REMARKS');



    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(160,62);
    $pdf->Cell(40,18,'',1,0,'');

    
     $pdf->SetXY(160,62);
     $pdf->SetFont('Arial','',8);
     $pdf->Write(6,'___Ex-Abroad');


    //  PHOTO 3R
    $pdf->SetFont('Arial','',9);
    $pdf->SetXY(125,80);
    $pdf->Cell(75,114,'',1,0,'');

     $pdf->SetXY(160,66);
     $pdf->SetFont('Arial','',8);
     $pdf->Write(6,'Previous Agency Name:');

     $pdf->SetXY(160,70);
     $pdf->SetFont('Arial','',8);
     $pdf->Write(6,'_______________________');
    
   
    // CHECKBOX FIRST TIMER
    $pdf->SetFont('Arial','B',9);
    $pdf->SetXY(127,63.5);
    $pdf->Cell(3,3,'',1,1,'L');

    // CHECKBOX EX-ABROAD
    $pdf->SetFont('Arial','B',9);
    $pdf->SetXY(162,63.5);
    $pdf->Cell(3,3,'',1,1,'L');

     //CHECKBOX WASHING
    $pdf->SetFont('Arial','B',9);
    $pdf->SetXY(12,148);
    $pdf->Cell(3,3,'',1,1,'L');

     //CHECKBOX CLEANING
     $pdf->SetFont('Arial','B',9);
     $pdf->SetXY(51,148);
     $pdf->Cell(3,3,'',1,1,'L');

      //CHECKBOX IRONING
      $pdf->SetFont('Arial','B',9);
      $pdf->SetXY(89,148);
      $pdf->Cell(3,3,'',1,1,'L');


      










 //CHECKBOX SEWING
 $pdf->SetFont('Arial','B',9);
 $pdf->SetXY(12,153);
 $pdf->Cell(3,3,'',1,1,'L');

  //CHECKBOX COOKING
  $pdf->SetFont('Arial','B',9);
  $pdf->SetXY(51,153);
  $pdf->Cell(3,3,'',1,1,'L');

   //CHECKBOX BABYCARE
   $pdf->SetFont('Arial','B',9);
   $pdf->SetXY(89,153);
   $pdf->Cell(3,3,'',1,1,'L');







//     //B set
//     $code='EOMS21E0000'.$value;
//     $pdf->Code128(50,70,$code,80,20);
//     $pdf->SetXY(50,95);
//     $pdf->Write(5,'B set: "'.$code.'"');

//     //C set
//     $code='EOMS21E0000'.$value;
//     $pdf->Code128(50,120,$code,110,20);
//     $pdf->SetXY(50,145);
//     $pdf->Write(5,'C set: "'.$code.'"');


//     //A,C,B sets
//     $code='EOMS21E0000'.$value;
// $pdf->Code128(50,170,$code,125,20);
// $pdf->SetXY(50,195);
// $pdf->Write(5,'ABC sets combined: "'.$code.'"');
   
}


// //A set
// $code='CODE 128';
// $pdf->Code128(50,20,$code,80,20);
// $pdf->SetXY(50,45);
// $pdf->Write(5,'A set: "'.$code.'"');

// //B set
// $code='Code 128';
// $pdf->Code128(50,70,$code,80,20);
// $pdf->SetXY(50,95);
// $pdf->Write(5,'B set: "'.$code.'"');

// //C set
// $code='12345678901234567890';
// $pdf->Code128(50,120,$code,110,20);
// $pdf->SetXY(50,145);
// $pdf->Write(5,'C set: "'.$code.'"');

// //A,C,B sets
// $code='ABCDEFG1234567890AbCdEf';
// $pdf->Code128(50,170,$code,125,20);
// $pdf->SetXY(50,195);
// $pdf->Write(5,'ABC sets combined: "'.$code.'"');

$pdf->Output();



?>
