<?php

function test($result)
{
    $result = htmlspecialchars($result);
    $result = trim($result);
    $result = stripslashes($result);
    return $result;
}