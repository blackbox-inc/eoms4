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

    $db->query("INSERT INTO c_information (bcode, fullname, pnumber, gender, birthday, height, `resume`, objectives, idpic, class, contact_person)
    VALUES ('$bcode','$dfullname','$pnumber','$gender','$birthday','$height','$bcode $dfullname','$editor101','$image_filename','$classification','$username')");

   

    //   INSERT C_CONTACTINFO
    $db->query("INSERT INTO c_contactinfo (u_num, cno1, cno2, email1, email2, skype, `address`, `name`, cno, `date` )
    VALUES ('$bcode','$cno1','$cno2','$email1','$email2','$skype','$address', '$contact_person', '$contact_number1', '$today')");

  

    // INSERT c_category
    $db->query("INSERT INTO c_category (u_num, cat2, cat3, cat4)
    VALUES ('$bcode','$cat2','$cat3','$cat4')");



   
    echo "SUCCESSFULLY ADDED INFORMATION PLEASE PROCEED TO HIS/HER EDUCATION, EXPERIENCE, TRAININGS AND SEMINARS ";


}



?>