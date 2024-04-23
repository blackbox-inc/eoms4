<?php

    session_start();
    $_SESSION['code'] = "DHC";
    header("Location: /v2/resume_builder/dh_form/fgen.php"); 
    exit();

?>