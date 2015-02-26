    <?php 
    
        require 'classes/functions.php';
        include 'includes/header.php';
            
     ?> 
     
     <!--Registration process-->

<?php

if(isset($_POST['signup'])){

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $fullname = test_input($_POST["fullname"]);
           
        
        $email = test_input($_POST["email"]);
        
        if(isset($_POST['categories'])) {
            
        }
        
      

        $check_name = "select * from technicians where username='$username'";

        $q = $con->query($check_name);

        $name_count = $q->rowCount();

        

        $insert = "";

        //$insert = "insert into customers (user_name, user_pass, user_email) values ('$name','$pass','$email')";

        $q = $con->query($insert);

        echo "<script>window.open('welcome.php','_self');</script>";
        //header('Location: welcome.php');

    }
}

?>






    <div class="row main">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading"> <strong class="">Registration for Student</strong>

                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                    
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Student Id</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="inputEmail3" placeholder="Student Id" name="studentid" required="" type="text" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Full Name</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="inputEmail3" placeholder="Full Name" name="fullname" required="" type="text" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="inputEmail3" placeholder="Email" name="email" required="" type="email" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Batch</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="inputEmail3" placeholder="Batch" name="batch" required="" type="text" />
                            </div>
                                                
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Select Courses</label>
                            <div class="col-sm-6">
                                <?php  ?>
                            </div>
                        </div>
                        
                        <div class="form-group last">
                            <div class="col-sm-offset-4 col-sm-6">
                                <button type="submit" class="btn btn-primary btn-sm btn-signup" name="register">Register</button>
                                <button type="reset" class="btn btn-default btn-sm">Reset</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
     
      <?php include 'includes/footer.php'; ?>