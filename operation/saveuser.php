<?php
require_once("../db/dbconnection.php");
session_start();
if (isset($_POST['saveBtn'])) {
    $name = $_POST['txtname'];
    $uname = $_POST['txtuname'];
    $password = $_POST['txtpassword'];

    if (!empty($name) && !empty($uname) && !empty($password)) {
        $sql = "insert into usertbl(name, username, password) VALUES('$name', '$uname', '$password')";
        $query = $conn -> query($sql);

        if ($query) {
            $_SESSION["sess_add_suc"] = "User successfully added.";
            unset($_SESSION["sess_add_err"]);
        }
        else {
            $_SESSION["sess_add_err"] = "Failed to add user.";
            unset($_SESSION["sess_add_suc"]);
        }


    } else {
        $_SESSION["sess_add_err"] = "Please complete all fields.";
        unset($_SESSION["sess_add_suc"]);
    }
} else {
    $_SESSION["sess_add_err"] = "Empty fields.";
    unset($_SESSION["sess_add_suc"]);

}

header('Location: ../add.php');