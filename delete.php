<?php
session_start();
require_once "admin/config.php";


if(isset($_POST['del_id'])){
    $del_id = $_POST['del_id'];

    //$_SESSION['total'] -= $_SESSION['card_products']["total_price"];

    $_SESSION['total'] -= $_SESSION['card_products'][$del_id]['total_price'];



unset($_SESSION['card_products'][$del_id]);

echo  $_SESSION['total'];


}

?>