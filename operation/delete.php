<?php
require_once("../db/dbconnection.php");
session_start();
$loc = $_GET['loc'];

switch ($loc) {
    case 'index':
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
        break;
    case 'items':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $tbl = $_GET['tbl'];
            $sql = "delete from $tbl where item_id='$id'";
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
        break;
    case 'category':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $tbl = $_GET['tbl'];
            $sql = "delete from $tbl where category_id='$id'";
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
        break;
    default:
        break;
}
header('Location: ../' . $loc . '.php');
