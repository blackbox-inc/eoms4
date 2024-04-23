<?php 

include 'connect.php';



if(isset($_POST['barc'])){

    $isBarcode  = $_POST['barc'];

    $findbarcode =  $db->query("SELECT * FROM fdh WHERE barcode='$isBarcode' ");
    $rowcount=mysqli_num_rows($findbarcode);
    $rows = $findbarcode->fetch_assoc();

    if($rowcount > 0){
        $app_name = $rows['applicant_name'];
        if($app_name == "_"){
            echo 1;
        }else{
            echo 2;
        }
        
    }else{
        echo 0;
    }



}



if(isset($_POST['bcode'])){
    $bcode = $_POST['bcode'];
    $fullname = $_POST['fullname'];
    $passport = $_POST['passport'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $height = $_POST['height'];
    $resume = $_POST['resume'];
    $objectivesblank = $_POST['objectivesblank'];
    $newName = $_POST['newName'];
    $status = $_POST['status'];
    $classD = $_POST['classD'];
    $scomment = $_POST['scomment'];
    $contactperson = $_POST['contactperson'];
    $religion = $_POST['religion'];
    $place_of_birth = $_POST['place_of_birth'];
    $weight_dh = $_POST['weight_dh'];
    $blood_type = $_POST['blood_type'];
    $country = $_POST['country'];
    $msalary = $_POST['msalary'];
    $category_radio_check = $_POST['category_radio_check'];
    $previous_agency = $_POST['previous_agency'];
    $position_applied = $_POST['position_applied'];  	$upperBcode = strtoupper($bcode);


       // Insert Procedure to c_information

       $db->query("INSERT INTO `c_information`(`bcode`, `fullname`, `pnumber`, `gender`, `birthday`, `height`, `resume`, `objectives`, `idpic`, `status`, `class`, `scomment`, `contact_person`, `religion`, `place_of_birth`, `weight`, `blood_type`, `pcountry`, `msalary`, `first_or_ex`, `ex_agency`, `position_applied`) VALUES ('$upperBcode','$fullname','$passport','$gender','$dob','$height','$resume','$objectivesblank','$newName','$status','$classD','$scomment','$contactperson','$religion','$place_of_birth','$weight_dh' ,'$blood_type','$country','$msalary','$category_radio_check','$previous_agency','$position_applied')");


        echo "SUCCESSFULLY SAVED";


        // update fdh with fullname
        $db-> query("UPDATE `fdh` SET `applicant_name`='$fullname' WHERE `barcode`= '$bcode' ");


        // Insert Category
        $db->query("INSERT INTO `c_category`(`u_num`, `cat1`, `cat2`, `cat3`, `cat4`, `cat5`, `passport`, `nbi`, `pdos`, `owwa`, `medcert`, `visa`, `stampedvisa`, `contract`, `ticket`, `soffer`, `oec`, `tesda`, `resume`, `ereg`, `peos`) VALUES ('$bcode','','$position_applied','','','','','','','','','','','','','','','','','','')");

}

if(isset($_POST['prev_position'])){


$general_barcode = $_POST['general_barcode'];
$prev_position = $_POST['prev_position'];
$prev_country = $_POST['prev_country'];
$frm_date = $_POST['frm_date'];
$to_date = $_POST['to_date'];

    $db->query("INSERT INTO `c_hsw_exp`(`bcode`, `exp_position`, `country`, `frm`, `to_exp`) VALUES ('$general_barcode','$prev_position', '$prev_country', '$frm_date', '$to_date')");
    echo "PREVIOUS EMPLOYMENT SAVED";


}



?>