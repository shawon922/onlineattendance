
    <?php 
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if(!isset($_SESSION['teacher']) && !isset($_SESSION['role_teacher'])) {
        header("Location: ../login.php");
    }

    
        require '../classes/functions.php';
        include 'includes/header.php'; 
        
        
        
        if(isset($_GET['course'])) {
            
            function getCourseName()
            {
                global $con;
                $coursecode = $_GET['course'];
                $getcoursename = "select course_name from course where course_code = '$coursecode'";
    	$query2 = $con->query($getcoursename);
    	$query2->setFetchMode(PDO::FETCH_ASSOC);
    
    	$row = $query2->fetch();
    	$coursename = $row['course_name'];
        
        echo $coursename;
            }
            
            
            
            /*function getCourseName()
            {
                global $con;
                $coursecode = $_GET['course'];
                $getcoursename = "select student_id from enrollment where course_code = '$coursecode'";
    	$query2 = $con->query($getcoursename);
    	$query2->setFetchMode(PDO::FETCH_ASSOC);
    
    	$row = $query2->fetch();
    	$coursename = $row['course_name'];
        
        echo $coursename;
            }   */       
            
        }
          
     ?>
    <div class="row greeting">
        <h2 class="h2">Teacher Panel</h2>
    </div>
    
    <?php 
    
        include 'includes/sidebar.php';
    ?>
        
        <div class="col-md-4">
            
            <form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <!--<div class="form-group">
                    <label class="col-sm-4 control-label">Select Semester</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="" onchange="getCity('classes/findcity.php?division_id='+this.value)">
                            <option value="" selected="selected">Select Semester</option> 
                        </select>
                    </div>
                </div>-->
            
            <table class="table table-bordered table-responsive">
                <tr>
                    <th colspan="2" style="text-align: center;">Attendance Sheet of <?php if(isset($_GET['course'])) { getCourseName(); } ?></th>
                </tr>
                <tr>
                    <th colspan="2" style="text-align: center;"><?php echo Date("Y-m-d"); ?></th>
                </tr>
                <tr>
                    <th>Student ID</th>
                    <th>Attendance Status</th>
                </tr>
                <tr>
                    <td>201130496</td>
                    <td class="status-checkbox"><input type="checkbox" class="checkbox" name="status[]" /></td>
                </tr>
                
            </table>
            </form>
        </div>
        
        </div>
    
        
    <?php include '../includes/footer.php'; ?>
    
    
    
    