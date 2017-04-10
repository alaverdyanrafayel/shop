<?php


require_once "lang.php";

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
            <ul class="nav navbar-nav" style = "float: left">
                <li><a href=""><span class="glyphicon glyphicon-home" ></span>
                        <?php echo $_SESSION['lang']=='am' ? 'Հիմնական' : 'Home'; ?></a></li>
                <li><a href=""><span class="glyphicon glyphicon-modal-window"></span>
                        <?php echo $_SESSION['lang']=='am' ? 'Ապրանքներ' : 'About'; ?></a></li>
            </ul>

            <ul class = "nav navbar-nav navbar-right" style = "float: right">
                <span style = "line-height:50px;margin-left:25px">
                <a href = "<?php echo $_SERVER['PHP_SELF']?>?lang=am<?php echo (isset($_GET['id'])) ? '&id='.($_GET['id']) : '';?><?php echo (isset($_GET['page'])) ? '&page='.($_GET['page']) : '';?>">Am |</a>
                <a href = "<?php echo $_SERVER['PHP_SELF']?>?lang=en<?php echo (isset($_GET['id'])) ? '&id='.($_GET['id']) : '';?><?php echo (isset($_GET['page'])) ? '&page='.($_GET['page']) : '';?>">En</a>
            </span>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class = "row" id = "signup_msg">

        </div>
        <div class ="row">
            <div class="col-md-3"></div>
            <div class="col-md-5">
                <div class="panel panel-primary">
                    <div class="panel panel-heading"><?php echo $_SESSION['lang']=='am' ? 'Գրանցվել' : 'Customer Sign Up'; ?></div>
                    <div class="panel panel-body">

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <label for = "first_name"><?php echo $_SESSION['lang']=='am' ? 'Անուն' : 'First Name'; ?></label>
                                <input type="text" class="form-control first_name " id="first_name" name="first_name">
                            </div>
                            <div class="row">
                                <label for = "last_name"><?php echo $_SESSION['lang']=='am' ? 'Ազգանուն' : 'Last Name'; ?></label>
                                <input type="text" class="form-control last_name" id="last_name" name="last_name">
                            </div>
                            <div class = "row">
                                <label for = "email"><?php echo $_SESSION['lang']=='am' ? 'Էլ․հասցե' : 'Email'; ?></label>
                                <input type="text" class="form-control email" id="email" name="email">
                            </div>
                            <div class = "row">
                                <label for = "password"><?php echo $_SESSION['lang']=='am' ? 'Գաղտնաբառ' : 'Password'; ?></label>
                                <input type="password" class="form-control password" id="password" name="password">
                            </div>
                            <div class = "row">
                                <label for = "repassword"><?php echo $_SESSION['lang']=='am' ? 'Վերահաստատել Գաղտնաբառը' : 'Re-enter password'; ?></label>
                                <input type="password" class="form-control repassword" id="repassword" name="repassword">
                            </div>
                            <div class = "row">
                                <label for = "mobile"><?php echo $_SESSION['lang']=='am' ? 'Հեռախոս' : 'Mobile'; ?></label>
                                <input type="text" class="form-control mobile" id="mobile" name="mobile">
                            </div>
                            <div class = "row">
                                <label for = "address"><?php echo $_SESSION['lang']=='am' ? 'Հասցե' : 'Address'; ?></label>
                                <input type="text" class="form-control address" id="address" name="address"><br>
                            </div>
                            <div class="row">
                                <input type="button" class="btn btn-success btn-lg" id="register" name="register" value="register">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



