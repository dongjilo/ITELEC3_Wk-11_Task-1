<?php
require_once("../db/dbconnection.php");
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $table = $_GET['table'];
    $sql = "delete from $table where id='$id'";
    $query = $conn -> query($sql);
    if ($query) {
        $_SESSION["sess_del_suc"] = "Data successfully deleted.";
        unset($_SESSION["sess_del_err"]);
    }else {
        $_SESSION["sess_del_err"] = "Failed to delete data.";
        unset($_SESSION["sess_del_suc"]);
    }
} else {
    $_SESSION["sess_del_err"] = "No id specified.";
    unset($_SESSION["sess_del_suc"]);
}
header('Location: ../index.php');
