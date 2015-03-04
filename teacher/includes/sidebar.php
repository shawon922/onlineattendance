<?php 

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
        
    if(!isset($_SESSION['teacher']) && !isset($_SESSION['role_teacher'])) {
        header("Location: ../login.php");
    }

?>

    <div class="row">
        <div class="col-md-3">
            <h4 class="h4">Courses List</h4>
            <ul class="nav">
                <?php getCourse(); ?>
            </ul>
        </div>
        
        
        
    <?php 
    	
    
    	function getCourse() {
            global $con;
    		
            $teacherid = $_SESSION['teacher'];
    
    		$getcourse = "select course_code from offeredcourse where teacher_id = '$teacherid'";
    
    		$query = $con->query($getcourse);
    		$query->setFetchMode(PDO::FETCH_ASSOC);
    
    		while($result = $query->fetch()) {
    			$coursecode = $result['course_code'];			
    	$getcoursename = "select course_name from course where course_code = '$coursecode'";
    	$query2 = $con->query($getcoursename);
    	$query2->setFetchMode(PDO::FETCH_ASSOC);
    
    	$row = $query2->fetch();
    	$coursename = $row['course_name'];
    	echo "<li><a href='attendancesheet.php?course={$coursecode}'>$coursename</a></li>";
		}
	}


?>