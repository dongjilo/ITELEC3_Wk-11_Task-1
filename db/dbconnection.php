<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "itelec3db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn -> connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}
//    echo "<div class='container'>
//      <div class='alert alert-success alert-dismissible fade show' role='alert'>
//        <div>Database successfully connected</div>
//        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
//      </div>
//      </div>";





