<?php

require('code128.php');



$pdf=new PDF_Code128('P','mm','A4');
$pdf->AddPage();
$pdf->SetMargins(5, 5);
$pdf->SetAutoPageBreak(false, 10);

// BARCODE IMAGE 
$code = "EOMS21A00001";



$pdf->Code128(147,8,$code,50,7);
// TEXT BARCODE
$pdf->SetXY(161,14);
$pdf->SetFont('Arial','',8);
$pdf->Write(6,$code);



$pdf->Code128(15,265,$code,50,7);
// TEXT BARCODE
$pdf->SetXY(27,271);
$pdf->SetFont('Arial','',8);
$pdf->Write(6,$code);




// WORKER DETAIL HEADER 
$pdf->SetFont('Arial','',7);
$pdf->SetXY(10,5);
$pdf->Cell(50,10,'Name: _______________________',0,1,'L');

$pdf->SetXY(10,10);
$pdf->Cell(50,9,'Position Desired: _______________________',0,1,'L');

$pdf->SetXY(10,13);
$pdf->Cell(50,10,'Date: _______________________',0,1,'L');

$pdf->SetXY(10,17);
$pdf->Cell(50,10,'Account Officer: _______________________',0,1,'L');

$pdf->SetXY(10,21);
$pdf->Cell(50,10,'EPHESIANS OVERSEAS MANPOWER SUPPLY INC.',0,1,'L');

$pdf->SetXY(10,25);
$pdf->Cell(50,10,'Unit 301, Avenue Square Garden Bldg PH, J. Bocobo Street, 532 United Nations Ave, Ermita, Manila, 1004 / 0956-987-0764 / eomsinc.com',0,1,'L');

$pdf->SetXY(10,29);
$pdf->Cell(50,10,'-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------',0,1,'L');


$pdf->SetXY(10,35);
$pdf->Cell(185,55,'',1,1,'L');



// LOGO
$pdf->Image('logo.png',17,45,-800);

// APPLICATION FORM TITLE
$pdf->SetFont('Arial','',16);
$pdf->SetXY(80,56);
$pdf->Cell(45,10,'APPLICATION FORM',0,1,'C');





//  2x2 Box
$pdf->SetFont('Arial','',8);
$pdf->SetXY(147,38);
$pdf->Cell(45,45,'',1,1,'L');

// Passport
$pdf->SetXY(147,81);
$pdf->Cell(45,10,'Passport No.:________________',0,1,'L');

// EMPLOYMENT DESIRE
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(80,83);
$pdf->Cell(45,10,' EMPLOYMENT DESIRE',0,1,'C');




// /////////////////////////////////////////////////////////////////////////////////////

// SECTION II
$pdf->SetFont('Arial','',8);
$pdf->SetXY(10,90);
$pdf->Cell(185,30,'',1,1,'L');


// EMPLOYMENT DESIRE
$pdf->SetFont('Arial','',8);
$pdf->SetXY(15,88);
$pdf->Cell(45,10,'POSITION APPLIED',0,1,'L');

// POSITION 1
$pdf->SetFont('Arial','',8);
$pdf->SetXY(15,94);
$pdf->Cell(45,10,'1. _____________________________________________',0,1,'L');

// POSITION 2
$pdf->SetFont('Arial','',8);
$pdf->SetXY(15,102);
$pdf->Cell(45,10,'2. _____________________________________________',0,1,'L');

// POSITION 3
$pdf->SetFont('Arial','',8);
$pdf->SetXY(15,110);
$pdf->Cell(45,10,'3. _____________________________________________',0,1,'L');


// INDUSTRIES
$pdf->SetFont('Arial','',8);
$pdf->SetXY(133,88);
$pdf->Cell(30,10,'INDUSTRIES',0,1,'C');


// CHECKBOX FOOD SERVICE
$pdf->SetXY(120,97);
$pdf->Cell(3,3,'',1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->SetXY(123,97);
$pdf->Cell(3,3,'FOOD SERVICE',0,1,'L');


// CHECKBOX SALES
$pdf->SetXY(120,101);
$pdf->Cell(3,3,'',1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->SetXY(123,101);
$pdf->Cell(3,3,'SALES',0,1,'L');

// CHECKBOX EDUCATION
$pdf->SetXY(120,105);
$pdf->Cell(3,3,'',1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->SetXY(123,105);
$pdf->Cell(3,3,'EDUCATION',0,1,'L');

// CHECKBOX MINING
$pdf->SetXY(120,109);
$pdf->Cell(3,3,'',1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->SetXY(123,109);
$pdf->Cell(3,3,'MINING',0,1,'L');


// CHECKBOX CONSTRUCTION
$pdf->SetXY(120,113);
$pdf->Cell(3,3,'',1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->SetXY(123,113);
$pdf->Cell(3,3,'CONSTRUCTION',0,1,'L');


// ///////////////////////////////////////////////////////////////////////////



// CHECKBOX OIL AND GAS
$pdf->SetXY(150,97);
$pdf->Cell(3,3,'',1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->SetXY(153,97);
$pdf->Cell(3,3,'OIL AND GAS',0,1,'L');


// CHECKBOX INFRASTRUCTURE
$pdf->SetXY(150,101);
$pdf->Cell(3,3,'',1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->SetXY(153,101);
$pdf->Cell(3,3,'INFRASTRUCTURE',0,1,'L');

// CHECKBOX MEDICAL
$pdf->SetXY(150,105);
$pdf->Cell(3,3,'',1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->SetXY(153,105);
$pdf->Cell(3,3,'MEDICAL',0,1,'L');

// CHECKBOX SHIPYARD
$pdf->SetXY(150,109);
$pdf->Cell(3,3,'',1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->SetXY(153,109);
$pdf->Cell(3,3,'SHIPYARD',0,1,'L');


// CHECKBOX OTHERS
$pdf->SetXY(150,113);
$pdf->Cell(3,3,'',1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->SetXY(153,113);
$pdf->Cell(3,3,'OTHERS_______________',0,1,'L');





// /////////////////////////////////////////////////////////

//PERSONAL INFO BOX
$pdf->SetFont('Arial','',8);
$pdf->SetXY(10,120);
$pdf->Cell(185,45,'',1,1,'L');

//PERSONAL INFO BOX TITLE
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(10,120);
$pdf->Cell(185,4,'      PERSONAL INFORMATION',1,1,'L');



// FULLNAME
$pdf->SetFont('Arial','',7);
$pdf->SetXY(15,125);
$pdf->Cell(45,10,'NAME (LAST NAME, FIRST, MIDDLE) ______________________________________________________________________________________________',0,1,'L');

// AGE GENDER CIVIL RELIGION BIRTHDATE
$pdf->SetFont('Arial','',7);
$pdf->SetXY(15,130);
$pdf->Cell(45,10,'AGE________  GENDER_________________ CIVIL STATUS______________ RELIGION_______________________ BIRTHDATE __________________',0,1,'L');

// PLACE OF BIRTH  AND EMAIL
$pdf->SetFont('Arial','',7);
$pdf->SetXY(15,135);
$pdf->Cell(45,10,'PLACE OF BIRTH __________________________________________________________________ EMAIL ADDRESS_____________________________',0,1,'L');

// PERMANENT ADDRESS
$pdf->SetFont('Arial','',7);
$pdf->SetXY(15,140);
$pdf->Cell(45,10,'PERMANENT ADDRESS_________________________________________________________________________________________________________',0,1,'L');

// PROVINCE ADDRESS
$pdf->SetFont('Arial','',7);
$pdf->SetXY(15,145);
$pdf->Cell(45,10,'PROVINCE ADDRESS__________________________________________________________________________________________________________',0,1,'L');


// CONTACTS
$pdf->SetFont('Arial','',7);
$pdf->SetXY(15,150);
$pdf->Cell(45,10,'MOBILE NO (1) __________________________________   (2)____________________________________  TEL__________________________________ ',0,1,'L');

// CONTACTS EMERGENCY
$pdf->SetFont('Arial','',7);
$pdf->SetXY(15,155);
$pdf->Cell(45,10,'IN CASE OF EMERGENCY (NAME) ______________________________ MOBILE NO. ________________________ RELATIONSHIP_________________',0,1,'L');





// /////////////////////////////////////////////////////////////
//HIGHEST EDUCATIONAL ATTAINMENT
// SECTION III


$pdf->SetFont('Arial','',8);
$pdf->SetXY(10,169);
$pdf->Cell(185,25,'',1,1,'L');

$pdf->SetFont('Arial','B',8);
$pdf->SetXY(10,165);
$pdf->Cell(185,4,'      HIGHEST EDUCATIONAL ATTAINMENT',1,1,'L');


// PROVINCE ADDRESS
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(15,170);
$pdf->Cell(20,5,'LEVEL',1,0,'C');
$pdf->Cell(70,5,'NAME OF SCHOOL',1,0,'C');
$pdf->Cell(35,5,'YEARS GRADUATED',1,0,'C');
$pdf->Cell(50,5,'COURSE',1,0,'C');

$pdf->SetFont('Arial','',8);
$pdf->SetXY(15,175);
$pdf->Cell(20,5,'',1,0,'C');
$pdf->Cell(70,5,'',1,0,'C');
$pdf->Cell(35,5,'',1,0,'C');
$pdf->Cell(50,5,'',1,0,'C');

$pdf->SetFont('Arial','',8);
$pdf->SetXY(15,180);
$pdf->Cell(20,5,'',1,0,'C');
$pdf->Cell(70,5,'',1,0,'C');
$pdf->Cell(35,5,'',1,0,'C');
$pdf->Cell(50,5,'',1,0,'C');

$pdf->SetFont('Arial','',8);
$pdf->SetXY(15,185);
$pdf->Cell(20,5,'',1,0,'C');
$pdf->Cell(70,5,'',1,0,'C');
$pdf->Cell(35,5,'',1,0,'C');
$pdf->Cell(50,5,'',1,0,'C');



// //////////////////////////////////////////////////////
// SECTION IV

$pdf->SetFont('Arial','B',8);
$pdf->SetXY(10,194);
$pdf->Cell(185,4,'      FORMER EMPLOYERS (LIST BELOW LAST EMPLOYERS, STARTING WITH RECENT EMPLOYMENT)',1,1,'L');


$pdf->SetFont('Arial','',8);
$pdf->SetXY(10,198);
$pdf->Cell(185,58,'',1,1,'L');



$pdf->SetFont('Arial','B',8);
$pdf->SetXY(15,200);
$pdf->Cell(40,4,'DATE (MONTH AND YEAR)',1,0,'C');
$pdf->Cell(60,4,'NAME OF COMPANY',1,0,'C');
$pdf->Cell(30,4,'COUNTRY',1,0,'C');
$pdf->Cell(45,4,'POSITION',1,0,'C');

// FROM 1
$pdf->SetFont('Arial','',8);
$pdf->SetXY(15,204);
$pdf->Cell(40,6,'FROM:',1,1,'L');
// TO 1
$pdf->SetFont('Arial','',8);
$pdf->SetXY(15,210);
$pdf->Cell(40,6,'TO:',1,1,'L');


// FROM 2
$pdf->SetFont('Arial','',8);
$pdf->SetXY(15,216);
$pdf->Cell(40,6,'FROM:',1,1,'L');
// TO 2
$pdf->SetFont('Arial','',8);
$pdf->SetXY(15,222);
$pdf->Cell(40,6,'TO:',1,1,'L');



// FROM 3
$pdf->SetFont('Arial','',8);
$pdf->SetXY(15,228);
$pdf->Cell(40,6,'FROM:',1,1,'L');
// TO 3
$pdf->SetFont('Arial','',8);
$pdf->SetXY(15,234);
$pdf->Cell(40,6,'TO:',1,1,'L');


// FROM 4
$pdf->SetFont('Arial','',8);
$pdf->SetXY(15,240);
$pdf->Cell(40,6,'FROM:',1,1,'L');
// TO 4
$pdf->SetFont('Arial','',8);
$pdf->SetXY(15,246);
$pdf->Cell(40,6,'TO:',1,1,'L');




$pdf->SetFont('Arial','',8);
$pdf->SetXY(15,204);
$pdf->Cell(40,12,'',1,0,'C');
$pdf->Cell(60,12,'',1,0,'C');
$pdf->Cell(30,12,'',1,0,'C');
$pdf->Cell(45,12,'',1,0,'C');

$pdf->SetFont('Arial','',8);
$pdf->SetXY(15,216);
$pdf->Cell(40,12,'',1,0,'C');
$pdf->Cell(60,12,'',1,0,'C');
$pdf->Cell(30,12,'',1,0,'C');
$pdf->Cell(45,12,'',1,0,'C');

$pdf->SetFont('Arial','',8);
$pdf->SetXY(15,228);
$pdf->Cell(40,12,'',1,0,'C');
$pdf->Cell(60,12,'',1,0,'C');
$pdf->Cell(30,12,'',1,0,'C');
$pdf->Cell(45,12,'',1,0,'C');

$pdf->SetFont('Arial','',8);
$pdf->SetXY(15,240);
$pdf->Cell(40,12,'',1,0,'C');
$pdf->Cell(60,12,'',1,0,'C');
$pdf->Cell(30,12,'',1,0,'C');
$pdf->Cell(45,12,'',1,0,'C');


// /////////////////////////////////////////////////////////////////////////////

$pdf->SetFont('Arial','',8);
$pdf->SetXY(10,256);
$pdf->Cell(185,30,'',1,1,'L');


$pdf->SetFont('Arial','',7);
$pdf->SetXY(10,280);
$pdf->Cell(185,4,'Unit 301, Avenue Square Garden Bldg PH, J. Bocobo Street, 532 United Nations Ave, Ermita, Manila, 1004 ',0,1,'C');




$pdf->Output();
?>