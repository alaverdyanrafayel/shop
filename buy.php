<?php

require "lang.php";

//allow to buy products those who have account and logged in it


if(!isset($_SESSION['email'])){
    header("Location: index.php");
}

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
<body style = "background:#fff">
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
                        <?php echo $_SESSION['lang']=='am' ? 'Ապրանք' : 'Product'; ?></a></li>
                <li style = "margin-left:750px"><a href="logout.php"><span class="glyphicon glyphicon-modal-user"></span>
                        <?php echo $_SESSION['lang']=='am' ? 'Դուրս գալ' : 'Log Out'; ?></a></li>
            </ul>

        </div>
    </nav>
                        <table class="table" style = "width:800px;margin:20px auto">
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
                    if(isset($_SESSION['card_products'])){
                        foreach($_SESSION['card_products'] as $id => $array) {
                            echo "
                                        <tr id = 'row'>  
                                            <td>". "<img style = 'width:190px; height:180px' src = 'uploads/".$array['image'] ."'></td>   
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
                <span style ="float:right;margin-right:350px"><a href = ""><input type = "button"
                        class= "btn btn-success buy" name = "buy" value = "Buy"></a></span>
                <p style = "color:red; font-size: 28px; margin-left:300px"><?php echo $_SESSION['lang']=='am' ? 'Ապրանքների-գին' : 'Total';  ?>:
                    <span id = "total"><?php echo isset($_SESSION['total'] )? $_SESSION['total'] : 0 ?></span>
                </p>



        <?php
            require "footer.php";
        ?>



