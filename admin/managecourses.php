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
            <h4 class="h4 right"><a href="addcourse.php">Add Course</a> | <a href="offercourse.php">Offer Course</a></h4>
            <table class="table">
                <tr>
                    <th colspan="4" style="text-align: center;">Courses Table</th>
                </tr>
                <tr>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Credit</th>
                    <th></th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align: right;">
                        <a href="editteacher.php?t_id=">Edit</a> | 
                        <a href="deleteteacher.php?t_id=">Delete</a>
                    </td>
                </tr>
            </table>
        </div>

    </div>
    
<?php include '../includes/footer.php'; ?>