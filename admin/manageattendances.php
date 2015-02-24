<?php 

    require '../classes/functions.php';
    include 'includes/header.php';
 ?>
    <div class="row greeting">
        <h2 class="h2">Admin Panel</h2>
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
                    <th colspan="2" style="text-align: center;">Attendance of Semester_Name - year</th>
                </tr>
                <tr>
                    <th>Course Name</th>
                    <th>Teacher Name</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>                   
                </tr>
            </table>
        </div>

    </div>

    
<?php include '../includes/footer.php'; ?>