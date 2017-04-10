<?php
session_start();

require_once "config.php";


?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <script src="../js/jquery.js"></script>
        <script src="../js/init.js"></script>
    </head>
    <body>
    <?php if(isset($_SESSION['name'])){ ?>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"></a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="">Home</a></li>
                <li><a href="">Products</a></li>
                </ul>
            <div class = "logout"><a href = "logout.php">Log Out</a></div>
        </div>
    </nav>
    <?php } ?>
