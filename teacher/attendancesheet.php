
    <?php 
    
        require '../classes/functions.php';
        include 'includes/header.php';            
     ?>
    <div class="row greeting">
        <h2 class="h2">Welcome to Teacher Panel</h2>
    </div>
    
    <?php 
    
        include 'includes/sidebar.php';
    ?>
        
        <div class="col-md-4">
            <form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group">
                    <!--<label class="col-sm-4 control-label">Select Semester</label>-->
                    <div class="col-sm-6">
                        <select class="form-control" name="" onchange="getCity('classes/findcity.php?division_id='+this.value)">
                            <option value="" selected="selected">Select Semester</option> 
                        </select>
                    </div>
                </div>
            </form>
            <table class="table">
                <tr>
                    <th colspan="2" style="text-align: center;">Attendance Sheet of Course_Name</th>
                </tr>
                <tr>
                    <th colspan="2" style="text-align: center;">Date</th>
                </tr>
                <tr>
                    <th>Student ID</th>
                    <th>Attendance Status</th>
                </tr>
                <tr>
                    <td>201130496</td>
                    <td><input type="checkbox" class="checkbox" name="status[]" /></td>
                </tr>
                
            </table>
        </div>
        
        </div>
    
        
    <?php include '../includes/footer.php'; ?>