<?php

require_once("../db/dbconnection.php");
session_start();

if (isset($_POST['loginBtn'])) {
    $username = $_POST['txtuname'];
    $password = $_POST['txtpassword'];

    $sql = "select * from usertbl where username='$username' and password='$password'";
    $query = $conn -> query($sql);
    $numRows = $query->num_rows;

    if ($numRows > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['login_success'] = "You have successfully logged in to your account.";
        unset($_SESSION['login_error']);
        header('Location: ../profile.php');
    } else {
        $error = "Account does not exist.";
        $_SESSION['login_error'] = $error;
        unset($_SESSION['login_success']);
        header('Location: ../login.php');
    }
} else {
    $error = "Invalid credentials.";
    $_SESSION['login_error'] = $error;
    unset($_SESSION['login_success']);
    header('Location: ../login.php');
}