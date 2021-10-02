<?php

session_start();

$path = substr($_SERVER['SCRIPT_NAME'], 1);
$file = basename($path, ".php");

if ($file == 'login') {

    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
        header("Location: ./logout");
    }

} else if ($file == 'register') {

    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
        header("Location: ./logout?redirect=register");
    }

} else {

    if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] === false) {
        header("Location: ./logout");
    }

}


?>