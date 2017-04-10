<?php

require_once "admin/config.php";
require "header.php";


$select_cat = "select * from categories LIMIT 3";
$run_select_cat = mysqli_query($connect, $select_cat);

$count = 0;

//select image

$sel = "select * from product_image where slider_image = 1";
$run_sel = mysqli_query($connect, $sel);
$row_sel = mysqli_num_rows($run_sel);
$row = mysqli_fetch_array($run_sel);
$product_id = $row['products_id'];
$product_id = (int)$product_id;
$select_product = "select * from products where id = '$product_id'";
$run_select_product = mysqli_query($connect, $select_product);
$row_select_product = mysqli_fetch_array($run_select_product);



?>

<div class="container" style = "width:70%; height:500px; margin-top:0px">
    <br>

    <div id="myCarousel" class="carousel slide" data-ride="carousel" style = "width:100%; height:500px">
        <!-- Indicators -->

        <ol style = "background:yellowgreen" class="carousel-indicators">
            <?php
            for($count = 0; $count < $row_sel; $count++){
            ?>
            <li data-target="#myCarousel" data-slide-to="<php echo $count; ?>"></li>
            <?php } ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="<?php echo 'uploads/'.$row['image']; ?>" alt="<?php echo $row['image']; ?>" style = "width:600px;height:500px">
                <div class="carousel-caption">
                    <h3 style = "color:red;font-size:40px;font-weight: bold"><?php echo $row_select_product['eng_name']; ?></h3>
                </div>

            </div>
            <?php

                   while($row_sel = mysqli_fetch_array($run_sel)){
                       $product_id = $row_sel['products_id'];
                       $product_id = (int)$product_id;
                       $select_product = "select * from products where id = '$product_id'";
                        $run_select_product = mysqli_query($connect, $select_product);
                        $row_select_product = mysqli_fetch_array($run_select_product);
            ?>
            <div class="item">
                <img src="<?php echo 'uploads/'.$row_sel['image']; ?>"
                     alt="<?php echo $row_sel['image']; ?>" style = "width:600px;height:500px">
                <div class="carousel-caption">
                    <h3 style = "color:red;font-size:40px;font-weight: bold"><?php echo $row_select_product['eng_name']; ?></h3>
                </div>
            </div>
            <?php }  ?>
        </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>
<h1 style = "font-size:100px; color:blue; margin-top:110px; margin-left:330px">CATEGORIES</h1>
<div class = "under_categories">
    <?php
    while($row_select_cat = mysqli_fetch_array($run_select_cat))  {
        $category_id = $row_select_cat['id'];
        $select_product = "select * from products where category_id = '$category_id'";
        $run_select_product = mysqli_query($connect, $select_product);
        $row_select_product = mysqli_fetch_array($run_select_product);
        $product_id = $row_select_product['id'];
        $select_image = "select * from product_image where products_id = '$product_id' AND primary_image = 1";
        $run_select_image = mysqli_query($connect, $select_image);
        $row_select_image = mysqli_fetch_array($run_select_image);
        ?>

        <div class = "inner_under_categories">
            <h2><a href = "home.php?id=<?php echo $row_select_cat['id']; ?>"><?php echo $_SESSION['lang']=='am' ? ($row_select_cat['arm_name']) : ($row_select_cat['eng_name']); ?></a></h2>

            <img src = "<?php echo 'uploads/'.$row_select_image['image']; ?>" alt="<?php echo $row_select_image['image']; ?>">

            <h3><?php echo  $_SESSION['lang']=='am' ?  ($row_select_product['arm_name']) : ($row_select_product['eng_name']); ?></h3>

            <h6><?php echo  $_SESSION['lang']=='am' ?  ($row_select_product['arm_desc']) : ($row_select_product['eng_desc']); ?></h6>
            </div>

    <?php } ?>
</div>

<?php
require "footer.php";
?>
