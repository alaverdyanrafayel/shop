<?php
require "lang.php";

require_once "admin/config.php";

?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js"></script>
    <script src="js/init.js"></script>
</head>
<body>
<div class="all">
<nav class="navbar navbar-default" style = "background:#FA4331">
    <div class="container-fluid" style = "float:left">
        <div class="navbar-header">
            <a class="navbar-brand"><?php echo $_SESSION['lang']=='am' ? 'Բարի գալուստ․․․' : 'Welcome to our store!'; ?></a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href=""><span class="glyphicon glyphicon-home" ></span>
                <?php echo $_SESSION['lang']=='am' ? 'Հիմնական' : 'Home'; ?></a></li>
            <li><a href=""><span class="glyphicon glyphicon-modal-window"></span>
                    <?php echo $_SESSION['lang']=='am' ? 'Ապրանքներ' : 'About'; ?></a></li>
            <li><a href=""><span class="glyphicon glyphicon-modal-window"></span>
                    <?php echo $_SESSION['lang']=='am' ? 'Ապրանք' : 'Product'; ?></a></li>
            <li style = "width:250px;left:10px;top:10px"><input type = "text" class = "form-control" id = "search"></li>

            <li style = "left:10px;top:10px;margin-right:15px"><input type = "submit" class ="btn btn-primary" id = "search-button"></li>
        </ul>

        <ul class = "nav navbar-nav navbar-right">

            <!-- Shopping card form -->

            <li><a href="" class = "dropdown-toggle card_container" data-toggle = "dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>
                    <?php echo $_SESSION['lang']=='am' ? 'Գնումներ' : 'Shopping Cart'; ?>
                    <span class = "badge"><?php echo (isset($_SESSION['card_products']) ?  count($_SESSION['card_products']) : 0); ?></span></a>
                    <div class="dropdown-menu" style = "width:550px">
                        <table class="table">
                            <thead>
                            <tr>
                                <th><?php echo $_SESSION['lang']=='am' ? 'Նկար' : 'Image'; ?></th>
                                <th><?php echo $_SESSION['lang']=='am' ? 'Անուն' : 'Name'; ?></th>
                                <th><?php echo $_SESSION['lang']=='am' ? 'Քանակ' : 'Amount'; ?></th>
                                <th><?php echo $_SESSION['lang']=='am' ? 'Գին' : 'Price'; ?></th>
                                <th><?php echo $_SESSION['lang']=='am' ? 'Ընդհանուր_Գին' : 'Total_Price'; ?></th>
                                <th><?php echo $_SESSION['lang']=='am' ? 'Ջնջել' : 'Remove'; ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            //  get the content in basket

                                if(isset($_SESSION['card_products'])){
                                    foreach($_SESSION['card_products'] as $id => $array) {
                                        echo "
                                        <tr id = 'row'>  
                                            <td>". "<img style = 'width:90px; height:80px' src = 'uploads/".$array['image'] ."'></td>   
                                            <td>". $array['eng_name']. "</td>     
                                            <td><select class = 'changable' id=". $id . ">";
                                        for($i = 1; $i <= $array['max_amount']; $i++){
                                            echo   "<option value =" . $i . (($i == $array['amount']) ? ' selected ' : "") . ">$i</option>";
                                        }
                                       echo  "</select></td>";
                                        echo   "<td>". $array['price']. "</td>";
                                        echo   "<td class = 'total_amount'>". $array['total_price']. "</td>";
                                        echo   "<td><span class = 'glyphicon glyphicon-stop choosen_remove' id = '$id'></td>
                                        </tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <span style ="float:right;margin-right:50px"><a href = "buy.php"><input type = "button"
                              class= "btn btn-success buy" name = "buy" value = "Buy"></a></span>
                        <p><?php echo $_SESSION['lang']=='am' ? 'Ապրանքների-գին' : 'Total';  ?>
                            <span id = "total"><?php echo isset($_SESSION['total'] )? $_SESSION['total'] : 0 ?></span>
                        </p>
                    </div>
            </li>

            <!-- Login form -->

            <li><a href="" class = "dropdown-toggle" data-toggle = "dropdown"><span class="glyphicon glyphicon-user"></span>
                    <?php echo $_SESSION['lang']=='am' ? 'Մուտք' : 'Sign In'; ?></a>
                <ul class = "dropdown-menu">
                    <form action = "" method="post" enctype="multipart/form-data">
                        <div style = "width:300px;height:200px">
                                <div class = "panel panel-primary">
                                 <div class = "panel-heading"><?php echo $_SESSION['lang']=='am' ? 'Մուտք' : 'Լօգ In'; ?></div>
                                 <div class = "panel-body">
                                    <label for = "email"><?php echo $_SESSION['lang']=='am' ? 'Էլ․հասցե' : 'Email'; ?></label>
                                     <input type = "email" class = "form-control email" id = "email">
                                     <label for = "password"><?php echo $_SESSION['lang']=='am' ? 'Գաղտնաբառ' : 'Password'; ?></label>
                                     <input type = "password" class = "form-control password" id = "password">
                                     <p><br/></p>
                                     <a href = "" style = "color:#000;list-style:none"><?php echo $_SESSION['lang']=='am' ? 'Չեք հիշում գաղտնաբառը․․․' : 'Forgotten Password?'; ?></a>
                                     <input type = "button" class = "btn btn-success login" style = "float:right;margin-top:-10px" id = "login" value = "Login">
                                 </div>
                                    <div clas = "panel-footer" id = 'e-msg'></div>
                            </div>
                        </div>
                    </form>
                </ul>
            </li>

            <!-- Registration form -->

            <li><a href="registration.php"><span class="glyphicon glyphicon-user"></span>
                    <?php echo $_SESSION['lang']=='am' ? 'Գրանցվել' : 'Sign Up'; ?></a></li>
            <span style = "line-height:50px;margin-left:25px">
                <a href = "<?php echo $_SERVER['PHP_SELF']?>?lang=am<?php echo (isset($_GET['id'])) ? '&id='.($_GET['id']) : '';?><?php echo (isset($_GET['page'])) ? '&page='.($_GET['page']) : '';?>">Am |</a>
                <a href = "<?php echo $_SERVER['PHP_SELF']?>?lang=en<?php echo (isset($_GET['id'])) ? '&id='.($_GET['id']) : '';?><?php echo (isset($_GET['page'])) ? '&page='.($_GET['page']) : '';?>">En</a>
            </span>
        </ul>
    </div>
</nav>



