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
        <h2 class="h2">Admin Panel</h2>
    </div>

<?php 

    include 'includes/sidebar.php';
?>

    <div class="col-md-9">
            <h4 class="h4 right"><a href="addcourse.php">Offer New Course</a>
            <table class="table">
                <tr>
                    <th colspan="6" style="text-align: center;">Offered Courses Table</th>
                </tr>
                <tr>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Semester Name</th>
                    <th>Year</th>
                    <th>Teacher Name</th>
                    <th></th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align: right;">
                        <a href="editcourse.php?t_id=">Edit</a> | 
                        <a href="deletecourse.php?t_id=">Delete</a>
                    </td>
                </tr>
            </table>
        </div>

    </div>
    
<?php include '../includes/footer.php'; ?>