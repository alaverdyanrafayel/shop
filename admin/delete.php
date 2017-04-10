<?php

require_once "config.php";
require "header.php";
include "function.php";


if(!isset($_SESSION['name'])){
    header("Location: index.php");
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
    if($_POST['del_key'] == "image"){
        $i = implode(",", $id);
        $select = "select image from product_image where id in ($i)";
        $run_select = mysqli_query($connect, $select);
        while($row_select = mysqli_fetch_array($run_select)){
            unlink("../uploads/".$row_select['image']);
        }
        $str = implode(',', $id);
        $delete = "delete from product_image where id in ($str)";
        $run_delete = mysqli_query($connect, $delete);
    }
}
    if($_POST['del_key'] == "products"){
        $str = implode(',', $id);
        $delete = "delete from products where id in ($str)";
        $run_delete = mysqli_query($connect, $delete);
    }
    if($_POST['del_key'] == "categories"){
        $str = implode(',', $id);
        $delete = "delete from categories where id in ($str)";
        $run_delete = mysqli_query($connect, $delete);
}