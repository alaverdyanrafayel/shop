<?php
session_start();

require_once "config.php";

include "function.php";

if(!isset($_SESSION['name'])){
    header("Location: index.php");
}


if(isset($_POST['ajax_id'])){
    $id = $_POST['ajax_id'];
    $products_id = $_POST['ajax_products_id'];
    $select = "select * from product_image where id = '$id'";
    $run_select = mysqli_query($connect, $select);
    $row_select = mysqli_fetch_array($run_select);



    if($row_select['primary_image'] == 0){
        $update = "update product_image set primary_image = '0' where products_id = '$products_id'";
        $run_update = mysqli_query($connect, $update);
        if($run_update) {
            $update = "update product_image set primary_image = '1' where id = '$id'";
            $run_update = mysqli_query($connect, $update);
            if ($run_update) {
                echo 1;
                die;
            }
        }
    }else if($row_select['primary_image'] == 1){
        $update = "update product_image set primary_image = '0' where id = '$id'";
        $run_update = mysqli_query($connect, $update);
        if($run_update){
            echo 0;
            die;
        }
    }
}
