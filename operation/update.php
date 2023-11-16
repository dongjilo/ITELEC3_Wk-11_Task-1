<?php
require_once("../db/dbconnection.php");
session_start();

$table = $_GET['table'];

switch ($table) {
    case 'usertbl':
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
        break;
    case 'itemtbl':
        if (isset($_POST['updBtn'])) {
            $id = $_POST['txtid'];
            $name = $_POST['txtname'];
            $price = $_POST['txtprice'];
            $qty = $_POST['txtqty'];
            $cat = $_POST['category_select'];
            if (!empty($id) && !empty($name) && !empty($price) && !empty($qty) && !empty($cat)) {
                $sql = "update itemtbl set item_name='$name', item_price='$price', item_quantity='$qty', category_id='$cat' where item_id='$id'";
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
        break;
    case 'categorytbl':
        if (isset($_POST['updBtn'])) {
            $id = $_POST['txtcatid'];
            $name = $_POST['txtcatname'];
            $desc = $_POST['txtcatdes'];
            if (!empty($id) && !empty($name) && !empty($desc)) {
                $sql = "update categorytbl set category_name='$name', category_description='$desc' where category_id='$id'";
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
        break;

    case 'ordertbl':
        if (isset($_POST['updBtn'])) {
            $id = $_POST['txtid'];
            $item = $_POST['item_select'];
            $qty = $_POST['txtqty'];
            $total = $_POST['txttotal'];

            if (!empty($item) && !empty($qty) && !empty($total)) {
                $sql = "update ordertbl set item_id = '{$item}', quantity='{$qty}', total='{$total}' where order_id={$id}";
                $query = $conn -> query($sql);

                if ($query) {
                    $_SESSION["sess_upd_suc_order"] = "Order successfully updated.";
                    unset($_SESSION["sess_upd_err_order"]);
                }
                else {
                    $_SESSION["sess_upd_err_order"] = "Failed to update order.";
                    unset($_SESSION["sess_upd_suc_order"]);
                }


            } else {
                $_SESSION["sess_upd_err_order"] = "Please complete all fields.";
                unset($_SESSION["sess_upd_suc_item"]);
            }
        } else {
            $_SESSION["sess_upd_err_order"] = "Empty fields.";
            unset($_SESSION["sess_upd_suc_order"]);
        }
        header("Location: ../editorder.php?id=$id");
        break;
    default:
        break;
}