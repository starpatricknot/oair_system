<?php

session_start();
session_destroy();

if (isset($_COOKIE['user']) and isset($_COOKIE['password'])) {
    setcookie("username", '', time() - (3600));
    setcookie("password", '', time() - (3600));
}

header('location:admin_login.php');
