<?php
session_start();

require_once "config.php";

// getting values from ajax and performing them

if(isset($_POST['ajax_name'])){
    $name = test_input($_POST['ajax_name']);
    $password = test_input($_POST['ajax_password']);
    $select = "select * from admin_login where name ='$name' AND password ='$password'";
    $run_select = mysqli_query($connect, $select);

    $row_select = mysqli_num_rows($run_select);
    if($row_select){
        $_SESSION['name'] = "$name";
        echo "success";
            }else{
        echo "fail";
    }
}

function test_input($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}
