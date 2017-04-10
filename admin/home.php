<?php

require_once "config.php";
require "header.php";
include "function.php";

if(!isset($_SESSION['name'])){
    header("Location: index.php");
}
if (isset($_POST['add'])) {
    $arm_name = test($_POST['arm_name']);
    $eng_name = test($_POST['eng_name']);
	
    if ($arm_name != "" && $eng_name != "") {
        if($eng_name < 0 || $arm_name < 0){
            $insert = "insert into categories(arm_name, eng_name) values('$arm_name', '$eng_name')";
            $run_insert = mysqli_query($connect, $insert);
            if ($run_insert) {
                echo "Inserted";
            } else {
                echo "Not Inserted!";
            }
        }
    }
}

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$arm_name = $_POST['arm_name'];
		$eng_name = $_POST['eng_name'];
        if($eng_name < 0 || $arm_name < 0) {
            $update = "update categories set arm_name = '$arm_name', eng_name = '$eng_name' where id = '$id'";
            $run_update = mysqli_query($connect, $update);
            if ($run_update) {
                echo "updated!";
            } else {
                echo "Sth wrong happened!";
            }
        }
	}

$select = "select * from categories";
$run_select = mysqli_query($connect, $select);

?>



<div class="container categories">
    <h2>Categories</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="usr">Arm_name:</label>
            <input type="text" class="form-control arm_name" name="arm_name">
        </div>
        <div class="form-group">
            <label for="pwd">Eng_name:</label>
            <input type="text" class="form-control eng_name" name="eng_name">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="add" value="Add Categories">
        </div>
    </form>
</div>
<div class="container tables">
    <h2>Categories Table</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Arm_name</th>
            <th>Eng_name</th>
            <th>Go to products</th>
            <th>Delete</th>
            <th>Edit</th>
            <th>Checkbox</th>
        </tr>
        </thead>
        <tbody>
        <?php

            while($row_select = mysqli_fetch_array($run_select)){
            ?>
        <tr id="<?php echo $row_select['id']; ?>">
            <td><?php echo $row_select['id']; ?></td>
            <td><?php echo $row_select['arm_name']; ?></td>
            <td><?php echo $row_select['eng_name']; ?></td>
            <td><a href = "products.php?id=<?php echo $row_select['id']; ?>">Go to products</a></td>
            <td><span class="glyphicon glyphicon-remove" data-type="categories" value = "<?php echo $row_select['id']; ?>"></span></td>
            <td><span class="glyphicon glyphicon-pencil pencil" data-id="<?php echo $row_select['id']; ?>"
                      data-arm_name="<?php echo $row_select['arm_name']; ?>" data-eng_name="<?php echo $row_select['eng_name'];?>"
                      data-toggle="modal" data-target="#myModal" name = "pencil"></span></td>
            <td><input type = "checkbox" value ="<?php echo $row_select['id']; ?>" style = "width:35px; height:35px; margin-left:20px"></td>
        </tr>
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title intromod">Table for etiting categories</h4>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="usr">Arm_name:</label>
                                    <input type="text" class="form-control arm_name" name="arm_name"></td>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Eng_name:</label>
                                    <input type="text" class="form-control eng_name" name="eng_name">
                                </div>
								 <div class="form-group">
                                    <label for="usr">Id:</label>
                                    <input type="text" class="form-control id" name="id">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="edit" value="Edit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php }   ?>
        </tbody>
    </table>
</div>
<?php
require "footer.php";
?>


