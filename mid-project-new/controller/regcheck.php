<?php

session_start();

if (isset($_POST['submit'])) {
    $userName = $_POST['userName'];
    $password = ($_POST['password']);
    $confirmPassword = ($_POST['confirmPassword']);
    $email = ($_POST['email']);
    if(isset($_POST['type']))
    {
        $type = ($_POST['type']);
    }
    

    if (empty($userName) || empty($password) || empty($email)) 
    {
        echo "All field must be fill up!" . "<br>";
    } 
    elseif (strlen($userName) <= 4 || strlen($password) <= 4) 
    {
        echo "Username and password must have a minimum of 5 letters" . "<br>";
    } 
    
    elseif (substr($userName, 0, 1) == "." || substr($userName, 0, 1) == "-") 
    {
        echo "Name must start with a letter" . "<br>";
    } 
    elseif (substr($email, -4, -3) != ".") {
        echo "Invalid email format" . "<br>";
    } 
    elseif ($password != $confirmPassword) 
    {
        echo "Passwords do not match!" . "<br>";
    } 
    elseif (empty($type))
    {
        echo "Please choose an user type" . "<br>";
    } 
    else 
    {
        setcookie('userName', $userName, time() + 30, '/');
        setcookie('password', $password, time() + 30, '/');
        setcookie('email', $email, time() + 30, '/');
        setcookie('type', $type, time() + 30, '/');


        if ($type == 'admin') {
            $file = fopen('../model/admin.txt', 'a');
            $admin = $userName . "|" . $password . "|" . $email . "|" . $type . "\n";
            fwrite($file, $admin);
            fclose($file);
        } elseif ($type == 'faculty') {
            $file = fopen('../model/other.txt', 'a');
            $faculty = $userName . "|" . $password . "|" . $email . "|" . $type . "\n";
            fwrite($file, $faculty);
            fclose($file);
        } elseif ($type == 'instrctor') {
            $file = fopen('../model/other.txt', 'a');
            $instructor = $userName . "|" . $password . "|" . $email . "|" . $type . "\n";
            fwrite($file, $instructor);
            fclose($file);
        } else {
            $file = fopen('../model/other.txt', 'a');
            $student = $userName . "|" . $password . "|" . $email . "|" . $type . "\n";
            fwrite($file, $student);
            fclose($file);
        }
        //echo "Registration Completed!";
        header('location: ../views/login.html');
    }
} else {
    echo "Something went wrong";
}

include('../views/registration.html');
