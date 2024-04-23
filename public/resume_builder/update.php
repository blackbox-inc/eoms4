<?php

require 'connect.php';


if(isset($_POST['bcode_bcode'])){
    date_default_timezone_set('Asia/Manila');
    // MAIN BARCODE
    $bcode = $_POST['bcode_bcode'];
    
    $dfullname = $_POST['dfullname'];
    $pnumber = $_POST['pnumber'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $height = $_POST['height'];
    $classification = $_POST['classification'];
    $editor101 = $_POST['editor101'];
    $image_filename = $_POST['image_filename'];
    $cno1 = $_POST['cno1'];
    $cno2 = $_POST['cno2'];
    $email1 = $_POST['email1'];
    $email2 = $_POST['email2'];
    $skype = $_POST['skype'];
    $contact_person = $_POST['contact_person'];
    $contact_number1 = $_POST['contact_number1'];
    $cat2 = $_POST['cat2'];
    $cat3 = $_POST['cat3'];
    $cat4 = $_POST['cat4'];
    $username = $_POST['username'];
    $address = $_POST['address'];



    $today = date("Y-m-d"); 

    // INSERT C_INFORMATION
     $db->query("UPDATE c_information
     SET bcode = '$bcode', fullname = '$dfullname', pnumber = '$pnumber', gender = '$gender', birthday = '$birthday',height = '$height',`resume` = '$bcode$dfullname', objectives = '$editor101', idpic = '$image_filename', class = '$classification', contact_person = '$username' WHERE bcode='$bcode'");

    

    //   INSERT C_CONTACTINFO

    $db->query("UPDATE c_contactinfo
    SET u_num = '$bcode', cno1 = '$cno1', cno2 = '$cno2', email1 = '$email1', email2 = '$email2', skype = '$skype',`address` = '$address', `name` = '$contact_person', cno = '$contact_number1' WHERE u_num='$bcode'");


   
    

    // // INSERT c_category

    $db->query("UPDATE c_category
    SET u_num = '$bcode', cat2 = '$cat2', cat3 = '$cat3', cat4 = '$cat4' WHERE u_num='$bcode'");

    // $db->query("INSERT INTO c_category (u_num, cat2, cat3, cat4)
    // VALUES ('$bcode','$cat2','$cat3','$cat4')");

   
     echo "UPDATED SUCCESSFULLY";


}



?>