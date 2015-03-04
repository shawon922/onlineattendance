<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if(!isset($_SESSION['admin']) && !isset($_SESSION['role_admin'])) {
        header("Location: ../login.php");
    }
    
    require '../classes/functions.php';
    include 'includes/header.php';
 ?>
    <div class="row greeting">
        <h2 class="h2">Manage Course</h2>
    </div>

<?php 

    include 'includes/sidebar.php';
?>

    <div class="col-md-9">
            <h4 class="h4 right"><a href="addcourse.php">Add New Course</a> | <a href="offeredcourses.php">Offered Course</a></h4>
            <table class="table">
                <tr>
                    <th colspan="4" style="text-align: center;">All Courses</th>
                </tr>
                <tr>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Credit</th>
                    <th></th>
                </tr>
                
                <?php getCourse(); ?>
                
            </table>
        </div>

    </div>
    
<?php include '../includes/footer.php'; ?>