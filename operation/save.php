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
                    $_SESSION["sess_add_suc"] = "User successfully added.";
                    unset($_SESSION["sess_add_err"]);
                }
                else {
                    $_SESSION["sess_add_err"] = "Failed to add user.";
                    unset($_SESSION["sess_add_suc"]);
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
    default:
        break;
}