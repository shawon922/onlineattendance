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
    

<?php 

    include 'includes/sidebar.php';
?>

        <div class="col-md-9">
            <div class="row greeting">
                <h2 class="h2">Manage Admin</h2>
            </div>          
            <table class="table table-bordered">
                <tr>
                    <th colspan="3">Admins Table</th>
                </tr>
                <tr>
                    <th>Login Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>
                
                
                <?php 
                    getAdmin();
                ?>
                
                
            </table>
        </div>

    </div>
<?php include '../includes/footer.php'; ?>