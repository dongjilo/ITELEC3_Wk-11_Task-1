<?php
require_once("db/dbconnection.php");
include "model/user.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
} else {
    $user = new User();

    $username = $_SESSION['username'];
    $sql = "select * from usertbl where username='$username'";
    $query = $conn ->query($sql);
    while ($row = $query->fetch_assoc()) {
        $user -> id = $row['id'];
        $user -> password = $row['password'];
        $user -> username = $row['username'];
        $user -> name = $row['name'];
        $user -> gender = $row['gender'];
        $user -> civil_status= $row['civil_status'];
        $user -> birthdate = $row['birthdate'];
    }
}
