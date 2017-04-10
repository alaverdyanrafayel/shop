<?php

require_once "admin/config.php";


//getting values from ajax


if(isset($_POST['first_name'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $repassword = md5($_POST['repassword']);
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $name = "/^[a-zA-Z ]*$/";
    $number = "/^[0-9]*$/";


    //validate input types


    if(empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($repassword) ||
        empty($mobile) || empty($address)){
        echo "<div class='alert alert-warning alert-dismissable' style = 'width:530px; margin-left:350px'>
                 <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
                 <strong>Warning!</strong> Not all the fields are completed!
               </div>";
        exit();
    }else{
        if(!preg_match($name, $first_name)){
            echo "<div class='alert alert-warning alert-dismissable' style = 'width:530px; margin-left:350px'>
                 <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
                 <strong>Warning! first_name is not valid!</strong> 
               </div>";
            exit();
        }
        if(!preg_match($name, $last_name)){
            echo "<div class='alert alert-warning alert-dismissable' style = 'width:530px; margin-left:350px'>
                 <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
                 <strong>Warning! last_name is not valid!</strong> 
               </div>";
            exit();
        }

        if ($password != $repassword) {
            echo "<div class='alert alert-warning alert-dismissable' style = 'width:530px; margin-left:350px'>
                 <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
                 <strong>Warning! Passwords do not match!</strong> 
               </div>";
            exit();
        }
        if(!preg_match($number, $mobile)){
            echo "<div class='alert alert-warning alert-dismissable' style = 'width:530px; margin-left:350px'>
                 <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
                 <strong>Warning! Mobile is not valid!</strong> 
               </div>";
            exit();
        }

        //check if there is a user with the same email

        $select = "select id from users_login where email = '$email'";
        $run_select = mysqli_query($connect, $select);
        $num_select = mysqli_num_rows($run_select);
        if($num_select > 0){

            // prohibit the same email being registered twice

            echo "<div class='alert alert-warning alert-dismissable' style = 'width:530px; margin-left:350px'>
                 <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
                 <strong>Warning! There is already a user with this email, try another email!</strong> 
               </div>";
        }else{

            //insert datas into users_login

            $insert = "insert into users_login(first_name, last_name, email, password, mobile, address) 
                       values('$first_name', '$last_name', '$email', '$password', '$mobile', '$address')";
            $run_insert = mysqli_query($connect, $insert);
            if($run_insert){
                echo "inserted";
            }
        }
    }
}

