<?php
require_once "config.php";
require "header.php";
require "function.php";

if(!isset($_SESSION['name'])){
    header("Location: index.php");
}

$products_id = $_GET['id'];




//inserting images

if(isset($_POST['insert'])){
    for($i=0; $i<count($_FILES['image']['name']); $i++){
        $filetmp = $_FILES['image']['tmp_name'][$i];		
        $filename = $_FILES['image']['name'][$i];
        $filepath = '../uploads/'.$filename;
        move_uploaded_file($filetmp, $filepath);
        $insert = "insert into product_image(image, products_id, primary_image) values('$filename', '$products_id', '0')";
        $run_insert = mysqli_query($connect, $insert);
		
		
    }
}

//updating products

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $arm_name = $_POST['arm_name'];
    $eng_name = $_POST['eng_name'];
    $amount = $_POST['amount'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $arm_desc = $_POST['arm_desc'];
    $eng_desc = $_POST['eng_desc'];
    $update = "update products set arm_name = '$arm_name', eng_name = '$eng_name', amount = '$amount', price = '$price',
                discount = '$discount', arm_desc = '$arm_desc', eng_desc = '$eng_desc' where id = '$id'";
    $run_update = mysqli_query($connect, $update);
}




//selecting products datas



$select = "select * from product_image where products_id = '$products_id'";
$run_select = mysqli_query($connect, $select);


$sel = "select * from products where id = '$products_id'";
$run_sel = mysqli_query($connect, $sel);
$row = mysqli_fetch_assoc($run_sel);



?>
<div class = "edprod_total">
    <div class = "upper_edprod">
        <div class = "edprod_left">
                <?php while($row_select = mysqli_fetch_array($run_select)){ ?>
            <div class = "complex <?php echo ($row_select['primary_image'] == 0) ? 'low_opacity':'high_opacity'; ?>&<?php echo ($row_select['slider_image'] == 0) ? 'transparent_color':'thick_color'; ?>"
                 id="<?php echo $row_select['id']; ?>">
                   <img src = "<?php echo '../uploads/'.$row_select['image']; ?>" class="img-thumbnail"
                        id="<?php echo $row_select['id']; ?>"><br>
                   <input type="checkbox" name = "id" value = "<?php echo $row_select['id']; ?>" style = "width:35px; height:35px; margin-left:20px">
                   <span class="glyphicon glyphicon-remove" data-type="image"  value = "<?php echo $row_select['id']; ?>"
                         data-toggle="modal" data-target="#myModal"></span>
            </div>
                <?php  } ?>
        </div>
        <div class = "edprod_right">
             Անուն։ <?php echo $row['arm_name']; ?><br>
             Name: <?php echo $row['eng_name']; ?></br>
             Available: <?php echo $row['amount']; ?><br>
             Price: <?php echo $row['price'].'$'; ?><br>
             Discount: <?php echo $row['discount'].'%'; ?><br>
             Նկարագրություն։ <?php echo $row['arm_desc']; ?><br>
             Description:  <?php echo $row['eng_desc']; ?>
        </div>
    </div>
    <div class = "under_edpro">
        <form action="" method="post" enctype="multipart/form-data">
            <div class = "under_left">
                 <input type="file" name = "image[]" multiple /><br>
                 <input type="submit" class="btn btn-primary" name="insert" value="Add images">
            </div>
            <div class = "under_right">
                <div class="form-group">
                    <label for="usr">ID:</label>
                    <input type="text" class="form-control id" name = "id" value = "<?php echo $row['id']; ?>">
                </div>
                <div class="form-group">
                    <label for="usr">Arm_name:</label>
                    <input type="text" class="form-control arm_name" name = "arm_name" value = "<?php echo $row['arm_name']; ?>">
                </div>
                <div class="form-group">
                    <label for="usr">Eng_name:</label>
                    <input type="text" class="form-control eng_name" name = "eng_name" value = "<?php echo $row['eng_name']; ?>">
                </div>
                <div class="form-group">
                    <label for="usr">Amount:</label>
                    <input type="text" class="form-control eng_num" name = "amount" value = "<?php echo $row['amount']; ?>">
                </div>
                <div class="form-group">
                    <label for="usr">Price:</label>
                    <input type="text" class="form-control eng_price" name = "price" value = "<?php echo $row['price']; ?>">
                </div>
                <div class="form-group">
                    <label for="usr">Discount:</label>
                    <input type="text" class="form-control eng_discount" name = "discount" value = "<?php echo $row['discount']; ?>">
                </div>
                <div class="form-group">
                    <label for="comment">Նկարագրություն:</label>
                    <textarea class="form-control arm_desc" rows="3" name = "arm_desc"><?php echo $row['arm_desc']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="comment">English description:</label>
                    <textarea class="form-control eng_desc" rows="3" name = "eng_desc"><?php echo $row['eng_desc']; ?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="update" value="Change data">
                </div>
            </div>
        </form>
    </div>
</div>


<?php

    require "footer.php";

?>