<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if(!isset($_SESSION['admin']) && !isset($_SESSION['role_admin'])) {
        header("Location: ../login.php");
    }

    require '../classes/db_connection.php';
    
    if(isset($_GET['value'])) {
        $value = $_GET['value'];
        $delete = "delete from teacher where teacher_id = '$value'";
        
        $query = $con->query($delete);
        
        header("Location: manageteachers.php");
    }