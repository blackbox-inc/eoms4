<?php

require 'connect.php';

// if($username == "jesplana" || $username == "ghernandez" || $username == "rpadilla" || $_POST['jsCookieAhmie'] == "dhernandez" || $_POST['jsCookieAhmie'] == "dhernandez" || $_POST['jsCookieAhmie'] == "encoder" || $_POST['jsCookieAhmie'] == "encoder1" )
// {}


echo UserAccount( "D" );
function UserAccount($Code){
   
    require 'connect.php';



    $today = date("y"); 
    $bcodestringformat = "EOMS".$today.$Code."%";
    $getLast = $db -> query("SELECT * FROM c_information where bcode LIKE '". $bcodestringformat ."' ORDER BY id DESC LIMIT 1");

    if($getLast->num_rows != 0){
        while($rows = $getLast->fetch_assoc()){
            $bcode = $rows['bcode'];
            list($q, $w) = explode("EOMS".$today.$Code, $bcode);
            $new2 = $w+1;
            $results = "EOMS".$today.$Code.str_pad($new2, 5, "0", STR_PAD_LEFT);

            return $results;
        }

    }else{
            return "EOMS".$today.$Code.str_pad(1, 5, "0", STR_PAD_LEFT);
    }
  




}







?>