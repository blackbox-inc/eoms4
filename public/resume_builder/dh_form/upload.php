<?php


    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
    
        $new_filename = substr(sha1(mt_rand()),0,6) ."_".$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], '../upload/' . $new_filename );
        // echo "SUCCESS";

        echo  $new_filename;
        
    }



?>