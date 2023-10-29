<?php

    require_once("db/dbconnection.php");
    session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/bootstrap.bundle.min.js"></script>
    <title>User Table</title>
</head>
<body style="background-color: #eee">
<nav class="navbar navbar-expand navbar-dark bg-dark sticky-top px-5 text-secondary">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link active" href="index.php">User Table</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="items.php">Item Table</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="category.php">Category Table</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container pt-5">
    <div class="card p-4">
        <h1 class="py-2 text-center">User Table</h1>
        <?php
            if (isset($_SESSION["sess_del_err"])) {
                $error = $_SESSION["sess_del_err"];
                echo "<div class='alert alert-danger d-flex alert-dismissible fade show align-items-center' role='alert'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Warning:'>
                                <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
                            </svg>
                            <div>
                                $error
                            </div>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
            }

            if (isset($_SESSION["sess_del_suc"])) {
                $success = $_SESSION["sess_del_suc"];
                echo "<div class='alert alert-success alert-dismissible fade show d-flex align-items-center' role='alert'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-check-circle-fill flex-shrink-0 me-2' viewBox='0 0 16 16'>
                                    <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
                                </svg>
                            <div>
                                $success
                            </div>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
            }

            $sql = "select * from usertbl";
            $query = $conn->query($sql);
            $numRows = $query->num_rows;

            if ($query->num_rows > 0) {
                echo "<table class='table table-hover table-striped table-bordered'> 
                        <tr>
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Action</th>
                        </thead>
                        </tr>";
                while($row = $query -> fetch_assoc()){
                    $id = $row['id'];
                    $name = $row['name'];
                    $username = $row['username'];
                    $password = $row['password'];

                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$name</td>";
                    echo "<td>$username</td>";
                    echo "<td>$password</td>";
                    echo "<td class='text-center'><a href='operation/delete.php?id=$id' class='btn btn-danger btn-sm'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
                              <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z'/>
                            </svg></a>
                            </td>";
                    echo "</tr>";

                }
                echo "</table>";
            } else {
                echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
                        <div>Empty table.</div>
                    </div>";
            }
        ?>
    </div>
</div>
</body>
</html>
