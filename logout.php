<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    
    session_destroy();
    
    session_unset();
    //unset($_SESSION['name_id']);
    //unset($_SESSION['role']);
    
    //echo $_SESSION['name_id']."--------".$_SESSION['role'];
    
    echo "<script>window.open('login.php','_self');</script>";