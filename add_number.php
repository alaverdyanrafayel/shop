<?php

session_start();

require_once "admin/config.php";

// get parameters for new amount of product

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $data_product_id = $_POST['data_product_id'];

    // update new amount of each product

    $_SESSION['card_products'][$data_product_id]["amount"] = $id;

    // calculate the total price of each product

    $_SESSION['card_products'][$data_product_id]["total_price"] =
        $_SESSION['card_products'][$data_product_id]["price"] * $_SESSION['card_products'][$data_product_id]["amount"] ;



    // calculate total price of all selected products
    $_SESSION['total'] = 0;
    foreach($_SESSION['card_products'] as $card_product){

        $_SESSION['total'] += $card_product['total_price'];

    }
    $result = array("product_total_price" => $_SESSION['card_products'][$data_product_id]["total_price"],
        "total_price" => $_SESSION['total']);
    $result = json_encode($result, JSON_FORCE_OBJECT );
    echo $result;
}