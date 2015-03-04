<?php

    require 'db_connection.php';
    
    
    function getTeacher()
    {
        global $con;
        
        $getteacher = "select * from teacher";
        
        $query = $con->query($getteacher);
        
        $query->setFetchMode(PDO::FETCH_ASSOC);
        
        while($row = $query->fetch()) {
            $teacherid = $row['teacher_id'];
            $teachername = $row['teacher_name'];
            $teacheremail = $row['teacher_email'];
            
            echo "<tr>
                    <td>$teacherid</td>
                    <td>$teachername</td>
                    <td>$teacheremail</td>
                    <td style='text-align: right;'>
                        <a href='editteacher.php?value=$teacherid'>Edit</a> | 
                        <a href='deleteteacher.php?value=$teacherid'>Delete</a>
                    </td>
                </tr>";
        }
    }
    
    
    function getAdmin()
    {
        global $con;
        
        $getadmin = "select * from admin";
        
        $query = $con->query($getadmin);
        
        $query->setFetchMode(PDO::FETCH_ASSOC);
        
        while($row = $query->fetch()) {
            $adminid = $row['admin_id'];
            $loginname = $row['admin_name'];
            $adminemail = $row['admin_email'];
            
            echo "<tr>
                    <td>$loginname</td>
                    <td>$adminemail</td>
                    <td style='text-align: right;'>
                        <a href='editadmin.php?value=$adminid'>Edit</a> | 
                        <a href='deleteadmin.php?value=$adminid'>Delete</a>
                    </td>
                </tr>";
        }
    }
    
    
    
    function getCourse()
    {
        global $con;
        
        $getcourse = "select * from course";
        
        $query = $con->query($getcourse);
        
        $query->setFetchMode(PDO::FETCH_ASSOC);
        
        while($row = $query->fetch()) {
            $coursecode = $row['course_code'];
            $coursename = $row['course_name'];
            $credit = $row['course_credit'];
            
            echo "<tr>
                    <td>$coursecode</td>
                    <td>$coursename</td>
                    <td>$credit</td>
                    <td style='text-align: right;'>
                        <a href='editofferedcourse.php?value=$coursecode'>Edit</a> | 
                        <a href='deleteofferedcourse.php?value=$coursecode'>Delete</a>
                    </td>
                </tr>";
        }
    }
    
    
    function getCourseList()
    {
        global $con;
        
        $getcourse = "select * from course";
        
        $query = $con->query($getcourse);
        
        $query->setFetchMode(PDO::FETCH_ASSOC);
        
        while($row = $query->fetch()) {
            $coursecode = $row['course_code'];
            $coursename = $row['course_name'];
            
            echo "<option value='".$coursecode."'>".$coursecode." - ".$coursename."</option>";
        }
    }
    
    
    function getSemesterList()
    {
        global $con;
        
        $getsemester = "select * from semester";
        
        $query = $con->query($getsemester);
        
        $query->setFetchMode(PDO::FETCH_ASSOC);
        
        while($row = $query->fetch()) {
            $semesterid = $row['semester_id'];
            $semestername = $row['semester_name'];
            
            echo "<option value='".$semesterid."'>".$semestername."</option>";
        }
    }
    
    
    function getTeacherList()
    {
        global $con;
        
        $getteacher = "select * from teacher";
        
        $query = $con->query($getteacher);
        
        $query->setFetchMode(PDO::FETCH_ASSOC);
        
        while($row = $query->fetch()) {
            $teacherid = $row['teacher_id'];
            $teachername = $row['teacher_name'];
            
            echo "<option value='".$teacherid."'>".$teachername."</option>";
        }
    }
    
    
    /*function getOfferedCourse()
    {
        global $con;
        
        $getofferedcourse = "select * from offeredcourse";
        
        $query = $con->query($getofferedcourse);
        
        $query->setFetchMode(PDO::FETCH_ASSOC);
        
        while($row = $query->fetch()) {
            
        }
    }*/
    
    
    
    
    