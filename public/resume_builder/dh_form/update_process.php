<?php 

include 'connect.php';

if(isset($_POST['update_barcode'])){

    $barcode = $_POST['update_barcode'];
    $cno1 = $_POST['cno1'];
    $cno2 = $_POST['cno2'];

    $email1 = $_POST['email1'];
    $email2 = "";
    $skype = $_POST['skype'];
    $address = $_POST['address'];

    $contact_name = $_POST['contact_name'];
    $contact_no = $_POST['contact_no'];
    $marital_status = $_POST['marital_status'];
    $no_children = $_POST['no_children'];
    $c_relation = $_POST['c_relation'];
    $c_address = $_POST['c_address'];

    
    $db->query("INSERT INTO `c_contactinfo`(`u_num`, `cno1`, `cno2`, `email1`, `email2`, `skype`, `address`, `name`, `cno`, `marital_status`, `no_of_children`, `crelationship`, `caddress`) VALUES ('$barcode', '$cno1', '$cno2', '$email1', '$email2', '$skype', '$address','$contact_name','$contact_no','$marital_status','$no_children','$c_relation','$c_address' )");


    echo "SUCCESSFULLY SAVED";



}


if(isset($_POST['cbarcode'])){


    $cbarcode = $_POST['cbarcode'];
    $ccountry = $_POST['ccountry'];
    $cposition = $_POST['cposition'];
    $cdate = $_POST['cdate'];
    $ccompany = $_POST['ccompany'];


    $db->query("INSERT INTO `c_experience`(`u_num`, `cposition`, `ccompany`, `cdate`, `cdesc`, `ccountry`) VALUES ('$cbarcode', '$cposition', '$ccompany', '$cdate', '_' , '$ccountry')");


    echo "SUCCESSFULLY SAVED";



}



if(isset($_POST['skill_barcode'])){

$skill_barcode = $_POST['skill_barcode'];

    $washing = $_POST['washing'];
    $cleaning = $_POST['cleaning'];
    $ironing = $_POST['ironing'];
    $sewing = $_POST['sewing'];
    $cooking = $_POST['cooking'];
    $baby_care = $_POST['baby_care'];

    $english = $_POST['english'];
    $arabic = $_POST['arabic'];
    $mandarin = $_POST['mandarin'];

    $db->query("INSERT INTO `c_skills`(`u_num`, `skills`, `sdesc`, `washing`, `cleaning`, `ironing`, `sewing`, `cooking`, `baby_care`, `english`, `arabic`, `mandarin`) VALUES ('$skill_barcode','_','_','$washing','$cleaning','$ironing','$sewing','$cooking','$baby_care','$english','$arabic','$mandarin')");

    echo "INSERT INTO `c_skills`(`u_num`, `skills`, `sdesc`, `washing`, `cleaning`, `ironing`, `sewing`, `cooking`, `baby_care`, `english`, `arabic`, `mandarin`) VALUES ($skill_barcode,'_','_','$washing','$cleaning','$ironing','$sewing','$cooking','$baby_care','$english','$arabic','$mandarin')";

}



if(isset($_POST['hidden_id'])){

    $hidden_id = $_POST['hidden_id'];
    // $bcode = $_POST['bcode'];
    $recent_fullname = $_POST['recent_fullname'];
    $passport = $_POST['passport'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $height = $_POST['height'];
    $resume = $_POST['resume'];
    $objectivesblank = $_POST['objectivesblank'];
    $newName = $_POST['newName'];
    $status = $_POST['status'];
    $classD = $_POST['classD'];
   // $scomment = $_POST['scomment'];
   // $contactperson = $_POST['contactperson'];
    $religion = $_POST['religion'];
    $place_of_birth = $_POST['place_of_birth'];
    $weight_dh = $_POST['weight_dh'];
    $blood_type = $_POST['blood_type'];
    $country = $_POST['country'];
    $msalary = $_POST['msalary'];
    $category_radio_check = $_POST['category_radio_check'];
    $previous_agency = $_POST['previous_agency'];

    $db->query("UPDATE `c_information` SET `fullname`='$recent_fullname',`pnumber`='$passport',`gender`='$gender',`birthday`='$dob',`height`='$height',`resume`='$resume',`objectives`='$objectivesblank',`idpic`='$newName',`status`='$status',`class`='$classD',`religion`='$religion',`place_of_birth`='$place_of_birth',`weight`='$weight_dh',`blood_type`='$blood_type',`pcountry`='$country',`msalary`='$msalary',`first_or_ex`='$category_radio_check',`ex_agency`='$previous_agency' WHERE id = $hidden_id ");

    echo ("Information Successfully Updated! ");


}







// NO photo
if(isset($_POST['hidden_id2'])){

    $hidden_id = $_POST['hidden_id2'];
    $recent_fullname = $_POST['recent_fullname'];
    $passport = $_POST['passport'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $height = $_POST['height'];
    $resume = $_POST['resume'];
    $objectivesblank = $_POST['objectivesblank'];
    $status = $_POST['status'];
    $classD = $_POST['classD'];
  //  $scomment = $_POST['scomment'];
    // $contactpersoncontactperson = $_POST['contactperson'];
    $religion = $_POST['religion'];
    $place_of_birth = $_POST['place_of_birth'];
    $weight_dh = $_POST['weight_dh'];
    $blood_type = $_POST['blood_type'];
    $country = $_POST['country'];
    $msalary = $_POST['msalary'];
    $category_radio_check = $_POST['category_radio_check'];
    $previous_agency = $_POST['previous_agency'];

    $db->query("UPDATE `c_information` SET `fullname`='$recent_fullname',`pnumber`='$passport',`gender`='$gender',`birthday`='$dob',`height`='$height',`resume`='$resume',`objectives`='$objectivesblank',`status`='$status',`class`='$classD',`religion`='$religion',`place_of_birth`='$place_of_birth',`weight`='$weight_dh',`blood_type`='$blood_type',`pcountry`='$country',`msalary`='$msalary',`first_or_ex`='$category_radio_check',`ex_agency`='$previous_agency' WHERE id = $hidden_id ");

    echo ("Information Successfully Updated! ");


}

if(isset($_POST['id_other'])){

    $id_other = $_POST['id_other'];

    $u_marital_status = $_POST['u_marital_status'];
    $u_no_children = $_POST['u_no_children'];
    $u_cno1 = $_POST['u_cno1'];
    $u_cno2 = $_POST['u_cno2'];
    $u_email1 = $_POST['u_email1'];
    $u_skype = $_POST['u_skype'];
    $address = $_POST['address'];
    $u_contact_name = $_POST['u_contact_name'];
    $u_c_relation = $_POST['u_c_relation'];
    $u_contact_no = $_POST['u_contact_no'];
    $u_c_address = $_POST['u_c_address'];
    
    $db->query("UPDATE `c_contactinfo` SET `cno1`='$u_cno1',`cno2`='$u_cno2',`email1`='$u_email1',`email2`='',`skype`='$u_skype',`address`='$address',`name`='$u_contact_name',`cno`='$u_contact_no',`marital_status`='$u_marital_status',`no_of_children`='$u_no_children',`crelationship`='$u_c_relation',`caddress`='$u_c_address' WHERE id=$id_other");

    echo ("Information Successfully Updated! ");


}

if(isset($_POST['update_id'])){

$update_id = $_POST['update_id'];

$u_ccountry = $_POST['u_ccountry'];
$u_cposition = $_POST['u_cposition'];
$u_cdate = $_POST['u_cdate'];
$u_ccompany = $_POST['u_ccompany'];


$db->query("UPDATE `c_experience` SET `cposition`='$u_cposition',`ccompany`='$u_ccompany',`cdate`='$u_cdate',`cdesc`='_',`ccountry`='$u_ccountry' WHERE id='$update_id'");


echo ("Information Successfully Updated! ");

}


if(isset($_POST['skillId'])){

    // BARCODE
    $skillId = $_POST['skillId'];

    $isCheck_washing = $_POST['isCheck_washing'];
    $isCheck_sewing = $_POST['isCheck_sewing'];
    $isCheck_cleaning = $_POST['isCheck_cleaning'];
    $isCheck_cooking = $_POST['isCheck_cooking'];
    $isCheck_ironing = $_POST['isCheck_ironing'];
    $isCheck_babycare = $_POST['isCheck_babycare'];

    $english = $_POST['english'];
    $arabic = $_POST['arabic'];
    $mandarin = $_POST['mandarin'];

    $db->query("UPDATE `c_skills` SET `sdesc`='_',`washing`='$isCheck_washing',`cleaning`='$isCheck_cleaning',`ironing`='$isCheck_ironing',`sewing`='$isCheck_sewing',`cooking`='$isCheck_cooking',`baby_care`='$isCheck_babycare',`english`='$english',`arabic`='$arabic',`mandarin`='$mandarin' WHERE u_num='$skillId'");

    echo ("Skill Information Successfully Updated! ");

}

if(isset($_POST['u_num___11'])){

    $u_num = $_POST['u_num___11'];
    $degree = $_POST['degree'];
    $school = $_POST['school'];
    $year = $_POST['year'];

    $db->query("INSERT INTO `c_educ`(`u_num`, `degree`, `school`, `year`) VALUES ('$u_num','$degree','$school','$year')");

    echo ("Education Successfully Added! ");

}

if(isset($_POST['u___data_id'])){

    $u___data_id = $_POST['u___data_id'];
    $u___data_unum = $_POST['u___data_unum'];
    $u___data_degree = $_POST['u___data_degree'];
    $u___data_school = $_POST['u___data_school'];
    $u___data_year = $_POST['u___data_year'];

    $db->query("UPDATE `c_educ` SET `degree`='$u___data_degree',`school`='$u___data_school',`year`='$u___data_year' WHERE id=$u___data_id");

        echo ("Education Successfully Updated! ");



}



if(isset($_POST['barcode_remarks'])){

    $bcode = $_POST['barcode_remarks'];
    $remarks = $_POST['remarks'];

    $db->query("UPDATE `c_information` SET `scomment`='$remarks' WHERE bcode='$bcode'");

    echo (" Successfully Remarked!! ");


}














?>