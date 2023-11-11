<?php
require_once("../db/dbconnection.php");
session_start();

if (isset($_POST['updBtn'])) {
    $id = $_POST['txtid'];
    $name = $_POST['txtname'];
    $username = $_POST['txtuname'];
    $password = $_POST['txtpassword'];
    $gender = $_POST['txtgender'];
    $birthdate = $_POST['txtbdate'];
    $civil_status = $_POST['txtstatus'];

    if (!empty($id) && !empty($name) && !empty($username) && !empty($password) && !empty($gender) && !empty($birthdate) && !empty($civil_status)) {
        $sql = "update usertbl set name='$name', username='$username', password='$password', gender='$gender', birthdate='$birthdate', civil_status='$civil_status'  where id='$id'";
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

header("Location: ../edituser.php?id=$id");