
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
                            <div class="panel-heading"> <strong class="">Offer New Course</strong>
            
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                                
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Select Course</label>
                                        <div class="col-sm-6">
                                            <select class="form-control col-md-6" name="courselist">
                                            <option value="" selected="selected">Select Course</option>                  
                                                <?php getCourseList(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Select Semester</label>
                                        <div class="col-sm-6">
                                            <select class="form-control" name="semesterlist">
                                            <option value="" selected="selected">Select Semester</option>                  
                                                <?php getSemesterList(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Year</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="inputEmail3" placeholder="Year" name="year" required="" type="text" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Select Teacher</label>
                                        <div class="col-sm-6">
                                            <select class="form-control" name="teacherlist">
                                            <option value="" selected="selected">Select Teacher</option>                  
                                                <?php getTeacherList(); ?>
                                            </select>
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
        
        $coursecode = test_input($_POST["courselist"]);
        
        
        $semesterid = test_input($_POST["semesterlist"]);
           
        
        $year = test_input($_POST["year"]);
        
        $teacherid = test_input($_POST["teacherlist"]);
        

        $check_offeredcourse = "select * from offeredcourse where course_code ='$coursecode' and semester_id = $semesterid and semester_year = $year";

        $q = $con->query($check_offeredcourse);

        $offeredcourse_count = $q->rowCount();

        if($offeredcourse_count > 0) {
            echo "<script>alert('Course already offered !!');</script>";
            exit(1);
        }
        
        
        $insert = "insert into offeredcourse (course_code, semester_id, semester_year, teacher_id) values ('$coursecode', $semesterid, '$year', '$teacherid')";

        
        $q = $con->query($insert);

        echo "<script>alert('A New Course Offered Successfully !!');</script>";
        //header('Location: welcome.php');

    }
}



?>