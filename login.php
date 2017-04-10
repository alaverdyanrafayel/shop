<?php

session_start();

require_once "admin/config.php";

//get values for users login

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $select = "select * from users_login where email = '$email' AND password = '$password'";
    $run_select = mysqli_query($connect, $select);
    $row_select = mysqli_fetch_array($run_select);
    if($row_select){
        $_SESSION['email'] = $email;
        echo "selected";
    }else{
        echo "fail";
    }
}
