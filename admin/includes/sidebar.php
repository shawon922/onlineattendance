    <?php 

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        if(!isset($_SESSION['admin']) && !isset($_SESSION['role_admin'])) {
            header("Location: ../login.php");
        }
    ?>
    <div class="row">
        <div class="col-md-3">
            <div class=" sidebar-left">
                <ul class="nav">
                    <li><a href="manageteachers.php">Manage Teachers</a></li>
                    <li><a href="managecourses.php">Manage Courses</a></li>
                    <li><a href="manageattendances.php">Manage Attendances</a></li>
                    
                </ul>
            </div>
        </div>
    