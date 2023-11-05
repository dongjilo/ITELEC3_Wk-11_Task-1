<?php
require_once("../db/dbconnection.php");
session_start();
if (isset($_POST['saveBtn'])) {
    $name = $_POST['txtname'];
    $price = $_POST['txtprice'];
    $qty = $_POST['txtqty'];
    $cat = $_POST['txtcat'];

    if (!empty($name) && !empty($price) && !empty($qty) && !empty($cat)) {
        $sql = "insert into itemtbl(name, price, quantity, category) VALUES('$name', '$price', '$qty', '$cat')";
        $query = $conn -> query($sql);

        if ($query) {
            $_SESSION["sess_add_suc_item"] = "Item successfully added.";
            unset($_SESSION["sess_add_err_item"]);
        }
        else {
            $_SESSION["sess_add_err_item"] = "Failed to add item    .";
            unset($_SESSION["sess_add_suc_item"]);
        }


    } else {
        $_SESSION["sess_add_err_item"] = "Please complete all fields.";
        unset($_SESSION["sess_add_suc_item"]);
    }
} else {
    $_SESSION["sess_add_err_item"] = "Empty fields.";
    unset($_SESSION["sess_add_suc_item"]);

}

header('Location: ../add.php');