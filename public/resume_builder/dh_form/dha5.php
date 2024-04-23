<?php

    session_start();
    $_SESSION['code'] = "DHA-5";
    header("Location: /v2/resume_builder/dh_form/fgen.php"); 
    exit();
?>