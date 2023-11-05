<?php
require_once("../db/dbconnection.php");
session_start();

if (isset($_POST['updBtn'])) {
    $id = $_POST['txtid'];
    $name = $_POST['txtname'];
    $uname = $_POST['txtuname'];
    $password = $_POST['txtpassword'];
    if (!empty($id) && !empty($name) && !empty($uname) && !empty($password)) {
        $sql = "update usertbl set name='$name', username='$uname', password='$password' where id='$id'";
        $query = $conn -> query($sql);
        if ($query) {
            $_SESSION["sess_upd_suc"] = "Info successfully updated.";
            unset($_SESSION["sess_upd_err"]);
        }
        else {
            $_SESSION["sess_upd_err"] = "Failed to update info.";
            unset($_SESSION["sess_upd_suc"]);
        }
    } else {
        $_SESSION["sess_upd_err"] = "Please fill out all the fields.";
        unset($_SESSION["sess_upd_suc"]);
    }
} else {
    $_SESSION["sess_upd_err"] = "Empty fields.";
    unset($_SESSION["sess_upd_suc"]);
}

header("Location: ../edit.php?id=$id");