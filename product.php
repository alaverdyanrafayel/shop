<?php
require_once "admin/config.php";
require "header.php";

//fetch products table

$product_id = $_GET['id'];
$select = "select * from products where id = '$product_id'";
$run_select = mysqli_query($connect, $select);
$row_select = mysqli_fetch_array($run_select);

//select images

$sel_image = "select * from product_image where products_id = '$product_id'";
$run_sel_image = mysqli_query($connect, $sel_image);


?>

    <div class = "whole">
        <div class = "images">
            <?php
            while($row_sel_image = mysqli_fetch_array($run_sel_image)){
            ?>
                <img src="<?php echo 'uploads/'.$row_sel_image['image']; ?>" class="img-rounded" alt="<?php echo $row_sel_image['image']; ?>"
                     width="214" height="246">
            <?php } ?>
        </div>
        <div class = "images_product">
            <h2><?php echo $_SESSION['lang']=='am' ? ($row_select['arm_name']) : ($row_select['eng_name']); ?></h2><br>
            <h2><?php echo $row_select['price'].'$'; ?></h2><br>
            <h2>Discount: <?php echo $row_select['discount'].'%'; ?></h2><br>
            <span><?php echo $_SESSION['lang']=='am' ? ($row_select['arm_desc']) : ($row_select['eng_desc']); ?></span><br>
        </div>
    </div>
<?php
    require "footer.php";
?>
