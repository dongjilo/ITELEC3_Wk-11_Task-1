<?php
require_once("../db/dbconnection.php");
session_start();

if (isset($_POST['updBtn'])) {
    $id = $_POST['txtid'];
    $name = $_POST['txtname'];
    $price = $_POST['txtprice'];
    $qty = $_POST['txtqty'];
    $cat = $_POST['txtcat'];
    if (!empty($id) && !empty($name) && !empty($price) && !empty($qty) && !empty($cat)) {
        $sql = "update itemtbl set name='$name', price='$price', quantity='$qty', category='$cat' where id='$id'";
        $query = $conn -> query($sql);
        if ($query) {
            $_SESSION["sess_upd_suc_item"] = "Info successfully updated.";
            unset($_SESSION["sess_upd_err_item"]);
        }
        else {
            $_SESSION["sess_upd_err_item"] = "Failed to update info.";
            unset($_SESSION["sess_upd_suc_item"]);
        }
    } else {
        $_SESSION["sess_upd_err_item"] = "Please fill out all the fields.";
        unset($_SESSION["sess_upd_suc_item"]);
    }
} else {
    $_SESSION["sess_upd_err_item"] = "Empty fields.";
    unset($_SESSION["sess_upd_suc_item"]);
}

header("Location: ../edititem.php?id=$id");