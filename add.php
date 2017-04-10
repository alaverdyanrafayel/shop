<?php
session_start();
require_once "admin/config.php";

// get request from js

if(isset($_POST['id'])){
    $id =  $_POST['id'];

// select datas from 2 products and product_image tables

    $select_product = "select * from products where id = '$id'";
    $run_select_product = mysqli_query($connect, $select_product);
    $row_select_product = mysqli_fetch_array($run_select_product);
    $product_id = $row_select_product['id'];
    $select_image = "select * from product_image where products_id = '$product_id'";
    $run_select_image = mysqli_query($connect, $select_image);
        while($row_select_image = mysqli_fetch_array($run_select_image)){

            // creatre a multidimansional array

            $array = array(
                "image" => $row_select_image['image'],
                "eng_name" => $row_select_product['eng_name'],
                "max_amount" => $row_select_product['amount'],
                "price" => $row_select_product['price'],
                "amount" => 1,
                "total_price" => $row_select_product['price'],
            );
        }

        // get total price each time

        $_SESSION['total'] += $row_select_product['price'];

            // create Session for loop

    if(!isset($_SESSION['card_products'])){
        $_SESSION['card_products'] = array();
    }

    // check if the key exists in array

    if(!array_key_exists($id, $_SESSION['card_products'])){

        $_SESSION['card_products'][$id] = $array;

        // make json from an array
        $json = json_encode($array, JSON_FORCE_OBJECT );

        echo $json; die;

    }
}

