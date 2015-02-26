<?php 

    require '../classes/functions.php';
    include 'includes/header.php';
 ?>
    
<?php 

    include 'includes/sidebar.php';
?>



                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"> <strong class="">Add New Teacher</strong>
        
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                            
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label">Teacher Id</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="inputEmail3" placeholder="Teacher Id" name="teacherid" required="" type="text" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label">Teacher Name</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="inputEmail3" placeholder="Full Name" name="teachername" required="" type="text" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label">Password</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="inputEmail3" placeholder="Password" name="password" required="" type="password" />
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="inputEmail3" placeholder="Email" name="email" required="" type="email" />
                                    </div>
                                </div>
                                                                   
                                
                                <div class="form-group last">
                                    <div class="col-sm-offset-4 col-sm-6">
                                        <button type="submit" class="btn btn-primary btn-sm btn-signup" name="add">Add</button>
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

if(isset($_POST['add'])){

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
        $teacherid = test_input($_POST["teacherid"]);
        
        $teachername = test_input($_POST["teachername"]);
        
        $password = md5($_POST["password"]);
           
        
        $email = test_input($_POST["email"]);
        
               
      

        $check_id = "select * from teacher where teacher_id='$teacherid'";

        $q = $con->query($check_id);

        $id_count = $q->rowCount();

        if($id_count > 0) {
            echo "<script>alert('Teacher Id already exist!!');</script>";
            exit(1);
        }
        
        $check_email = "select * from teacher where teacher_email='$email'";
        
        $q = $con->query($check_email);

        $email_count = $q->rowCount();

        if($email_count > 0) {
            echo "<script>alert('Email already exist!!');</script>";
            exit(1);
        }
        
        $insert = "insert into teacher values ('$teacherid', '$teachername','$password', '$email')";

        //$insert = "insert into customers (user_name, user_pass, user_email) values ('$name','$pass','$email')";

        $q = $con->query($insert);

        echo "<script>alert('A New Teacher Successfully added!!');</script>";
        //header('Location: welcome.php');

    }
}



?>