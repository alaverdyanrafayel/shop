<?php

require_once "admin/config.php";
require "header.php";


// pagination

$select_cat = "select * from categories LIMIT 3";
$run_select_cat = mysqli_query($connect, $select_cat);
$row_select_cat = mysqli_fetch_array($run_select_cat);


$category_id = $_GET['id'];
$category_id = (int)$category_id;


$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 3 ? (int)$_GET['per-page'] : 3;



$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
$sel_product = "SELECT * FROM products WHERE category_id = '$category_id' LIMIT $start, 3";
$run_sel_product = mysqli_query($connect, $sel_product);


$total = "SELECT FOUND_ROWS() as total from products where category_id = '$category_id'";
$run_total = mysqli_query($connect, $total);
$row_total = mysqli_num_rows($run_total);
$pages = ceil($row_total/$perPage);



?>
<div class = "under_categories">
    <?php
        while($row_sel_product = mysqli_fetch_assoc($run_sel_product)){
            $product_id = $row_sel_product['id'];
            $select_image = "select * from product_image where products_id = '$product_id' AND primary_image = 1";
            $run_select_image = mysqli_query($connect, $select_image);
           while($row_select_image = mysqli_fetch_array($run_select_image)) {
    ?>
    <div class = "inner_under_categories">
        <h3 style = "left:60px"><a href = "product.php?id=<?php echo $row_sel_product['id']; ?>">
               <?php echo $_SESSION['lang'] == 'am' ? ($row_sel_product['arm_name']) : ($row_sel_product['eng_name']); ?></a></h3>
        <img src = "<?php echo 'uploads/'.$row_select_image['image']; ?>" alt="<?php echo $row_select_image['image']; ?>">
        <h4><?php echo $row_sel_product['price']."$"; ?></h4>
        <div class = "panel-heading">
            <button style = "margin-left:90px" id='<?php echo $row_sel_product['id']; ?>' class = "btn btn-danger btn-md add_product">
                <?php echo $_SESSION['lang']=='am' ? 'Ավելացնել' : 'Add To Card'; ?></button>
        </div>
    </div>
    <?php }  } ?>
</div>
    <div class = "pagination">
        <?php for($x = 1; $x <= $pages; $x++) { ?>
            <a href = "home.php?&<?php echo  (isset($_SESSION['lang']))=='am' ?  'lang=am' : 'lang=en'; ?>&id=<?php echo $_GET['id']; ?>&page=<?php echo $x ?>&per-page=<?php echo $perPage; ?>"
            <?php if($page === $x) {echo 'class = "selected"'; } ?>><?php echo $x; ?></a>
        <?php } ?>
    </div>

<?php
    require "footer.php";
?>