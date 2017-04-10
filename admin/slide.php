<?php
require_once "config.php";

if(isset($_POST['ajax_id'])){
    $id = $_POST['ajax_id'];
    $product_id = $_POST['ajax_product_id'];
    $select = "select * from product_image where id = '$id'";
    $run_select = mysqli_query($connect, $select);
    $row_select = mysqli_fetch_array($run_select);

    if($row_select['slider_image'] == 0){
            $update = "update product_image set slider_image = '1' where id = '$id'";
            $run_update = mysqli_query($connect, $update);
            if ($run_update) {
                echo 1;
                die;
        }
    }else if($row_select['slider_image'] == 1){
        $update = "update product_image set slider_image = '0' where id = '$id'";
        $run_update = mysqli_query($connect, $update);
        if($run_update){
            echo 0; die;
        }
    }
}