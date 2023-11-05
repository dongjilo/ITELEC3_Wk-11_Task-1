<?php
require_once("../db/dbconnection.php");
session_start();

if (isset($_POST['updBtn'])) {
    $id = $_POST['txtcatid'];
    $name = $_POST['txtcatname'];
    $desc = $_POST['txtcatdes'];
    if (!empty($id) && !empty($name) && !empty($desc)) {
        $sql = "update categorytbl set category_name='$name', category_description='$desc' where id='$id'";
        $query = $conn -> query($sql);
        if ($query) {
            $_SESSION["sess_upd_suc_cat"] = "Info successfully updated.";
            unset($_SESSION["sess_upd_err_cat"]);
        }
        else {
            $_SESSION["sess_upd_err_cat"] = "Failed to update info.";
            unset($_SESSION["sess_upd_suc_cat"]);
        }
    } else {
        $_SESSION["sess_upd_err_cat"] = "Please fill out all the fields.";
        unset($_SESSION["sess_upd_suc_cat"]);
    }
} else {
    $_SESSION["sess_upd_err_cat"] = "Empty fields.";
    unset($_SESSION["sess_upd_suc_cat"]);
}

header("Location: ../editcategory.php?id=$id");