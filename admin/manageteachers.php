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
            <h4 class="h4"><a href="addteacher.php">Add Teacher</a></h4>
            <table class="table">
                <tr>
                    <th colspan="4">Teachers Table</th>
                </tr>
                <tr>
                    <th>Teacher Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>
                <tr>
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