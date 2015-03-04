<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if(!isset($_SESSION['admin']) && !isset($_SESSION['role_admin'])) {
        header("Location: ../login.php");
    }
    
    require '../classes/functions.php';
    include 'includes/header.php';
    
    if(isset($_GET['value'])) {
        $value = $_GET['value'];
        $getteacher = "select * from teacher where teacher_id = $value";
        
        $query = $con->query($getteacher);
        
        $query->setFetchMode(PDO::FETCH_ASSOC);
        
        while($row = $query->fetch()) {
            $teacherid = $row['teacher_id'];
            $teachername = $row['teacher_name'];
            $teacheremail = $row['teacher_email'];
        }
    }
 ?>
    

<?php 
    include 'includes/sidebar.php';
?>

                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"> <strong class="">Edit Teacher</strong>
        
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="post" action="">
                            
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label">Teacher Id</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="inputEmail3" name="teacherid" type="text" value="<?php if(isset($teacherid)) { echo $teacherid; } ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label">Teacher Name</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="inputEmail3" name="teachername" type="text" value="<?php if(isset($teachername)) { echo $teachername; } ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label">Password</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="inputEmail3" placeholder="Password" name="password" type="password" value="" />
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="inputEmail3" name="email" type="email" value="<?php if(isset($teacheremail)) { echo $teacheremail; } ?>" />
                                    </div>
                                </div>
                                                                   
                                
                                <div class="form-group last">
                                    <div class="col-sm-offset-4 col-sm-6">
                                        <button type="submit" class="btn btn-primary btn-sm btn-signup" name="edit">Edit</button>
                                        <button type="reset" class="btn btn-default btn-sm">Reset</button>
                                    </div>
                                </div>
                            </form>
        
                        </div>
                    </div>
                </div>

        

    </div>
<?php include '../includes/footer.php'; ?>




<?php
if(isset($_GET['value'])) {
    
    if(isset($_POST['edit'])){
    
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            $teacher_id = test_input($_POST["teacherid"]);
            
            $teacher_name = test_input($_POST["teachername"]);
            
            $password = test_input($_POST["password"]);
            
            
            $email = test_input($_POST["email"]);
            
                   
            
            if($teacher_id !== $teacherid) {
                $check_id = "select * from teacher where teacher_id='$teacher_id'";
        
                $q = $con->query($check_id);
        
                $id_count = $q->rowCount();
        
                if($id_count > 0) {
                    echo "<script>alert('Teacher Id already exist!!');</script>";
                    exit(1);
                }
            }
            
            if($teacheremail !== $email) {
            $check_email = "select * from teacher where teacher_email='$email'";
            
            $q = $con->query($check_email);
    
            $email_count = $q->rowCount();
    
            if($email_count > 0) {
                echo "<script>alert('Email already exist!!');</script>";
                exit(1);
            }
            }
            
            
            if(!empty($password)) {
                $password = md5($password);
                
                $update = "update teacher set teacher_id='$teacher_id', teacher_name = '$teacher_name', teacher_password = '$password', teacher_email = '$email' where teacher_id = '$value'";
                
                $q = $con->query($update);    
                echo "<script>alert('Successfully updated!!');</script>";
                echo "<script>window.open('manageteachers.php', '_self');</script>";
            } else {
                
                $update = "update teacher set teacher_id='$teacher_id', teacher_name = '$teacher_name', teacher_email = '$email' where teacher_id = '$value'";
                $q = $con->query($update);
    
                echo "<script>alert('Successfully updated!!');</script>";
                echo "<script>window.open('manageteachers.php', '_self');</script>";
                
            }
            
    
        }
    }

}

?>