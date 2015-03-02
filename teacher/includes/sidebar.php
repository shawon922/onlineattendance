<?php 

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
        
    if(!isset($_SESSION['teacher']) && !isset($_SESSION['role_teacher'])) {
        header("Location: ../login.php");
    }

?>

    <div class="row">
        <div class="col-md-3">
            <h4 class="h4">Courses List</h4>
            <ul class="nav">
                <li><a href="attendancesheet.php?course=">Software Engineering</a></li>
            </ul>
        </div>