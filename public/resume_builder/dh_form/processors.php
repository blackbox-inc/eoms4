<?php 





session_start();




if(isset($_POST['selected_code'])){
    $selected_code  = $_POST['selected_code'];
    $_SESSION['code'] = $selected_code;

    // header("Location: /v2/resume_builder/dh_form/fgen.php"); 
    // exit();

    echo $selected_code;


}











?>