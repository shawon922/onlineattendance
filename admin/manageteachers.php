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
        <h2 class="h2">Manage Teacher</h2>
    </div>

<?php 

    include 'includes/sidebar.php';
?>

        <div class="col-md-9">
            <h4 class="h4"><a href="addteacher.php">Add Teacher</a></h4>
            <table class="table table-bordered">
                <tr>
                    <th colspan="4">Teachers Table</th>
                </tr>
                <tr>
                    <th>Teacher Id</th>
                    <th>Teacher Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>
                
                
                <?php 
                    getTeacher();
                ?>
                
                
            </table>
        </div>

    </div>
<?php include '../includes/footer.php'; ?>