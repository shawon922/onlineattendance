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
    
    