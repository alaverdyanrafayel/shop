<?php



require_once "config.php";
require "header.php";
include "function.php";


if(isset($_SESSION['name'])){
    header("Location: home.php");
}


?>

    <body>;
        <div class="container admin_login">
            <h2>Admin Login</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="usr">Name:</label>
                    <input type="text" class="form-control name" name = "name">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control password" name = "password">
                </div>
                <div class="form-group">
                    <input type="button" class="btn btn-primary log" value = "Login">
                </div>
            </form>
            <h1 class = "error"></h1>
        </div>
<?php
    require "footer.php";
?>