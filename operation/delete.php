<?php
require_once("../db/dbconnection.php");
session_start();
$loc = $_GET['loc'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $tbl = $_GET['tbl'];
    $sql = "delete from $tbl where id='$id'";
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
header('Location: ../' . $loc . '.php');
