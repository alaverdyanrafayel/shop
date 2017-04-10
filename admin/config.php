<?php
$connect = mysqli_connect('localhost', 'root', '', 'shop');
if(!$connect){
    die("Connection failed!" . mysqli_connect_error());
}
// Change character set to utf8
mysqli_set_charset($connect,"utf8");
