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
    
    
    