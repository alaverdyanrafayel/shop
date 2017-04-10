<?php
session_start();

require_once "admin/config.php";

$defaultLang = "en";

if (!empty($_GET["lang"])) {
    switch (strtolower($_GET["lang"])) {
        case "en":
            $_SESSION['lang'] = 'en';
            break;
        case "am":
            $_SESSION['lang'] = 'am';
            break;
        default:
            $_SESSION['lang'] = $defaultLang;
            break;
    }
}

if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = $defaultLang;
}

?>