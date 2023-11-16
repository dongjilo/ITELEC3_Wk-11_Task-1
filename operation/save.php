<?php
require_once("../db/dbconnection.php");
session_start();
$from = $_GET['from'];
$table = $_GET['table'];

switch ($table) {

    case 'usertbl':
        if (isset($_POST['saveBtn'])) {
            $name = $_POST['txtname'];
            $username = $_POST['txtuname'];
            $password = $_POST['txtpassword'];
            $gender = $_POST['txtgender'];
            $birthdate = $_POST['txtbdate'];
            $civil_status = $_POST['txtstatus'];

            if (!empty($name) && !empty($username) && !empty($password) && !empty($gender) && !empty($birthdate) && !empty($civil_status)) {
                $sql = "insert into usertbl(name, username, password, gender, civil_status, birthdate) VALUES('$name', '$username', '$password', '$gender', '$civil_status', '$birthdate')";
                $query = $conn -> query($sql);

                if ($query) {
                    switch ($from) {
                        case 'reg':
                            $_SESSION["sess_add_suc"] = "Account successfully registered.";
                            unset($_SESSION["sess_add_err"]);
                            break;
                        case 'add':
                            $_SESSION["sess_add_suc"] = "User successfully added.";
                            unset($_SESSION["sess_add_err"]);
                            break;
                        default:
                            break;
                    }
                } else {
                    switch ($from) {
                        case 'reg':
                            $_SESSION["sess_add_suc"] = "Register account failed.";
                            unset($_SESSION["sess_add_err"]);
                            break;
                        case 'add':
                            $_SESSION["sess_add_suc"] = "Failed to add user.";
                            unset($_SESSION["sess_add_err"]);
                            break;
                        default:
                            break;
                    }
                }
            } else {
                $_SESSION["sess_add_err"] = "Please complete all fields.";
                unset($_SESSION["sess_add_suc"]);
            }
        } else {
            $_SESSION["sess_add_err"] = "Empty fields.";
            unset($_SESSION["sess_add_suc"]);

        }

        switch ($from) {
            case 'reg':
                header('Location: ../register.php');
                break;
            case 'add':
                header('Location: ../add.php');
                break;
            default:
                break;
        }
        break;

    case 'itemtbl':
        if (isset($_POST['saveBtn'])) {
            $name = $_POST['txtname'];
            $price = $_POST['txtprice'];
            $qty = $_POST['txtqty'];
            $cat = $_POST['category_select'];

            if (!empty($name) && !empty($price) && !empty($qty) && !empty($cat)) {
                $sql = "insert into itemtbl(item_name, item_price, item_quantity, category_id) VALUES('$name', '$price', '$qty', '$cat')";
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
        break;

    case 'categorytbl':
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
        break;

    case 'ordertbl':
        if (isset($_POST['saveBtn'])) {
            $item = $_POST['item_select'];
            $qty = $_POST['txtqty'];
            $total = $_POST['txttotal'];

            if (!empty($item) && !empty($qty) && !empty($total)) {
                $sql = "insert into ordertbl(item_id, quantity, total) VALUES('$item', '$qty', '$total')";
                $query = $conn -> query($sql);

                if ($query) {
                    $_SESSION["sess_add_suc_order"] = "Order successfully added.";
                    unset($_SESSION["sess_add_err_order"]);
                }
                else {
                    $_SESSION["sess_add_err_order"] = "Failed to add order.";
                    unset($_SESSION["sess_add_suc_order"]);
                }


            } else {
                $_SESSION["sess_add_err_order"] = "Please complete all fields.";
                unset($_SESSION["sess_add_suc_item"]);
            }
        } else {
            $_SESSION["sess_add_err_order"] = "Empty fields.";
            unset($_SESSION["sess_add_suc_order"]);

        }
        header('Location: ../add.php');
        break;

    default:
        break;
}