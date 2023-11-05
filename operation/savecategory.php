<?php
require_once("../db/dbconnection.php");
session_start();
if (isset($_POST['saveBtn'])) {
    $name = $_POST['txtcatname'];
    $desc = $_POST['txtcatdes'];

    if (!empty($name) && !empty($desc)) {
        $sql = "insert into categorytbl(category_name, category_description) VALUES('$name', '$desc')";
        $query = $conn -> query($sql);

        if ($query) {
            $_SESSION["sess_add_suc_cat"] = "Category successfully added.";
            unset($_SESSION["sess_add_err_cat"]);
        }
        else {
            $_SESSION["sess_add_err_cat"] = "Failed to add category.";
            unset($_SESSION["sess_add_suc_cat"]);
        }


    } else {
        $_SESSION["sess_add_err_cat"] = "Please complete all fields.";
        unset($_SESSION["sess_add_suc_cat"]);
    }
} else {
    $_SESSION["sess_add_err_cat"] = "Empty fields.";
    unset($_SESSION["sess_add_suc_cat"]);

}

header('Location: ../add.php');