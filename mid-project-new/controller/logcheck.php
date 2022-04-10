<?php

session_start();

if (isset($_POST['submit'])) {

    $userName = $_POST['userName'];
    $password = $_POST['password'];

    if (empty($userName) || empty($password)) {
        echo "Username/Password is needed";
    } else {
        if (isset($_COOKIE['userName']) && isset($_COOKIE['password'])) {
            if ($userName == $_COOKIE['userName'] && $password == $_COOKIE['password']) {
                setcookie('STATUS', 'OK', time() + 3600, '/');
                header('location: ../views/adminHome.html');
            } else {
                echo "Wrong username/password";
            }
        } else {
            echo "Account doesn't exist";
        }
    }
} else {
    echo "invalid request";
}
include('../views/login.html');