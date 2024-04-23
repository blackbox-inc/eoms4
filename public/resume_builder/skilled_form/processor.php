<?php 


include 'connect.php';


if(isset($_POST['lst_bcode'])){

$code_type = $_POST['code_type'];
$nxt_bcode = $_POST['nxt_bcode'];
$add_higher_num =  $_POST['add_higher_num'];
$yr_created =  $_POST['year_is'];



   // SAVING TO DATABASE EACH BARCODE

   for ($i = $nxt_bcode; $i <= $add_higher_num ; $i++  ){

    $code='EOMS'.$yr_created.$code_type.str_pad($i, 5,'0', STR_PAD_LEFT);    
    $db->query("INSERT INTO f_skl (barcode) VALUES ('$code')");
    
   }
   



    echo "SUCCESS";
}

?>