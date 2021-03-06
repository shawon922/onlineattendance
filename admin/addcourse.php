
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
                    <h2 class="h2">Admin Panel</h2>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"> <strong class="">Add New Course</strong>
            
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                                
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Course Code</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="inputEmail3" placeholder="Course Code" name="coursecode" required="" type="text" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Course Name</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="inputEmail3" placeholder="Course Name" name="coursename" required="" type="text" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Credit</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="inputEmail3" placeholder="Credit" name="credit" required="" type="text" />
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
        
        $coursecode = test_input($_POST["coursecode"]);
        
        
        $coursename = test_input($_POST["coursename"]);
           
        
        $credit = test_input($_POST["credit"]);
        

        $check_coursecode = "select * from course where course_code ='$coursecode'";

        $q = $con->query($check_coursecode);

        $coursecode_count = $q->rowCount();

        if($coursecode_count > 0) {
            echo "<script>alert('Course already exist!!');</script>";
            exit(1);
        }
        
        $check_coursename = "select * from course where course_name='$coursename'";
        
        $q = $con->query($check_coursename);

        $coursename_count = $q->rowCount();

        if($coursename_count > 0) {
            echo "<script>alert('Course Name already exist!!');</script>";
            exit(1);
        }
        
        $insert = "insert into course (course_code, course_name, course_credit) values ('$coursecode', '$coursename', '$credit')";

        
        $q = $con->query($insert);

        echo "<script>alert('A New Course Successfully Added!!');</script>";
        //header('Location: welcome.php');

    }
}



?>