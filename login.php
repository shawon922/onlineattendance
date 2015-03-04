    <?php 
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
                   
            if(isset($_SESSION['admin']) && isset($_SESSION['role_admin'])) {
                header("Location: admin");
            } elseif(isset($_SESSION['teacher']) && isset($_SESSION['role_teacher'])) {
                header("Location: teacher");
            }
            
        
        require 'classes/functions.php';
        include 'includes/header.php';
            
     ?> 
                
                
                <div class="row main">
                    <div class="col-md-5 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading"> <strong class="">Login</strong>

                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                                <div class="form-group">
                                    <div class="col-md-offset-4">
                                        <label class="radio-inline"> <input type="radio" name="role" id="admin" value="admin" checked="" /> Admin </label>
                                        <label class="radio-inline"> <input type="radio" name="role" id="teacher" value="teacher" /> Teacher </label>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Name or Id</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="inputEmail3" name="loginfo" placeholder="Admin Name or Teacher ID" required="" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="inputPassword3" name="password" placeholder="Password" required="" type="password" />
                                        </div>
                                    </div>
                                    <!--<div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <div class="checkbox">
                                                <label class="">
                                                    <input class="" type="checkbox" />Remember me</label>
                                            </div>
                                        </div>
                                    </div>-->
                                    <div class="form-group last">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="submit" name="submit" class="btn btn-primary btn-sm btn-signin">LogIn</button>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                
    <?php include 'includes/footer.php'; ?>
    
    
    
    
    
    <?php 
    
        if(isset($_POST['submit'])) {
            
            $salt = 'abcde';
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            $role = $_POST['role'];
            
            $name_id = $_POST['loginfo'];
    
            $password = md5($_POST['password']).$salt;
            
            if($role === 'admin') {
                $log_sql = "select * from admin where admin_name = '$name_id' and admin_password='$password'";
            } elseif($role === 'teacher') {
                $log_sql = "select * from teacher where teacher_id = '$name_id' and teacher_password='$password'";
            }
            
    
            $q = $con->query($log_sql);
    
            $row_count = $q->rowCount();
    
            if($row_count==0){
                echo "<script>alert('Invalid Information!!');</script>";
                //header('Location: signin.php');
    
            }else{
                //
                
            
                if($role === 'admin') {
                    $_SESSION['admin']=$name_id;
                    $_SESSION['role_admin'] = $role;
                    echo "<script>window.open('admin/index.php','_self');</script>";
                    //header("Location: admin/index.php");
                } elseif($role === 'teacher') {
                    $_SESSION['teacher']=$name_id;
                    $_SESSION['role_teacher'] = $role;
                    echo "<script>window.open('teacher/index.php','_self');</script>";
                    //header("Location: teacher/index.php");
                }
    
            }
        }
    }
    
    ?>