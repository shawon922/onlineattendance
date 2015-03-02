<?php 
    session_start();
    
    if(!isset($_SESSION['admin']) && !isset($_SESSION['role_admin'])) {
        header("Location: ../login.php");
    }
    
    require '../classes/functions.php';
    include 'includes/header.php';
 ?>
    <div class="row greeting">
        <h2 class="h2">Manage Attendance</h2>
    </div>

<?php 

    include 'includes/sidebar.php';
?>

    <div class="col-md-9">
            <form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group">
                    <!--<label class="col-sm-4 control-label">Select Semester</label>-->
                    <div class="col-sm-3">
                        <select class="form-control" name="division" onchange="getCity('classes/findcity.php?division_id='+this.value)">
                            <option value="" selected="selected">Select Semester</option> 
                        </select>
                    </div>
                </div>
            </form>
            <table class="table">
                <tr>
                    <th colspan="3" style="text-align: center;">Attendance of Semester_Name - year</th>
                </tr>
                <tr>
                    <th>Course Name</th>
                    <th>Course Co-ordinator</th>
                    <th></th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align: right;">
                        <a href="viewattendance.php?t_id=">View</a> | 
                        <a href="downloadattendance.php?t_id=">Download</a> | 
                        <a href="printattendance.php?t_id=">Print</a>
                    </td>                 
                </tr>
            </table>
        </div>

    </div>

    
<?php include '../includes/footer.php'; ?>