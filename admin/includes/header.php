<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if(!isset($_SESSION['admin']) && !isset($_SESSION['role_admin'])) {
        header("Location: ../login.php");
    }
    
    $loginname = $_SESSION['admin'];
    
    $getadmin = "select issuperadmin from admin where admin_name = '$loginname'";
        
    $query = $con->query($getadmin);
    
    $query->setFetchMode(PDO::FETCH_ASSOC); 
    
    $row = $query->fetch();
                
    $issuperadmin = $row['issuperadmin'];

?>



<!DOCTYPE html>
<html>
    <head>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Online Attendance for AUB</title>
        
        <!--Bootstrap CSS-->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        
        <!--Font Awesome-->
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        
        <!--Reset CSS-->
        <link href="../styles/reset.css" rel="stylesheet" type="text/css" />
        
        <!--Custom CSS-->
        <link href="../styles/style.css" rel="stylesheet" type="text/css" />
        
        
        
    </head>
    <body>
        <div class="full"> <!--Full div start-->
            <div class="container"> <!--Full div start-->
                <div class="row">
                    <a class="navbar-brand" href="index.php">Online Attendance for AUB</a>
                    <div class="col-md-2 logo">
                        
                    </div>
                    <div class="col-md-6 banner">
                        
                    </div>                    
                </div>
                
                
                <div class="row">
                    <nav class="navbar navbar-default">
                            <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">                           
                              
                              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                              </button>
                              
                            </div>
                        
                            <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
                                    <ul class="nav navbar-nav">
                                        <li class="active"><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
                                        
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="addadmin.php">New Admin</a></li>
                                        <?php if($issuperadmin) { ?>
                                        <li><a href="manageadmins.php">View Admin</a></li>
                                        <?php } ?>
                                        
                                        
                                        <li><a href="editprofile.php">Edit Profile</a></li>
                                        <li><a href="../logout.php">Log Out</a></li>
                                    </ul> 
                                                        
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                    
                                    