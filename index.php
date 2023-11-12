<?php
    require_once("db/dbconnection.php");
    include 'operation/sessioncheck.php';
    $tbl = "usertbl";
    $loc = "index";
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
    <a class="navbar-brand" href="#">GROUP 3</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="profile.php">Profile</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Settings</a>
                <ul class="dropdown-menu">
                    <li><?php echo "<a class='dropdown-item' href='edituser.php?id={$user -> id}'>Update Profile</a>"; ?></li>
                    <li><a class="dropdown-item" href="operation/logout.php" onclick="return confirm('Are you sure you want to logout?')">Logout</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="index.php">User Table</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="items.php">Item Table</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="category.php">Category Table</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add.php">Add</a>
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
                unset($_SESSION["sess_del_err"]);
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
                unset($_SESSION["sess_del_suc"]);
            }

            $sql = "select * from {$tbl}";
            $query = $conn->query($sql);
            $numRows = $query->num_rows;

            if ($query->num_rows > 0) {
                echo "<table class='table table-hover table-striped table-bordered'> 
                        <tr>
                        <thead>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Gender</th>
                            <th>Civil Status</th>
                            <th>Birthdate</th>
                            <th>Action</th>
                        </thead>
                        </tr>";
                while($row = $query -> fetch_assoc()){
                    $id = $row['id'];
                    $name = $row['name'];
                    $username = $row['username'];
                    $password = $row['password'];
                    $gender = $row['gender'];
                    $civilStatus = $row['civil_status'];
                    $birthdate = $row['birthdate'];


                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$name</td>";
                    echo "<td>$username</td>";
                    echo "<td>$password</td>";
                    echo "<td>$gender</td>";
                    echo "<td>$civilStatus</td>";
                    echo "<td>$birthdate</td>";
                    echo "<td class='text-center'>
                            <a href='operation/delete.php?id=$id&tbl=$tbl&loc=$loc' class='btn btn-danger btn-sm' onclick='return confirm(`Are you sure you want to delete this row?`)'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='currentColor' class='bi bi-trash-fill flex-shrink-0 me-2' viewBox='0 0 16 16'>
                              <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                            </svg>Delete</a>
                            <a href='edituser.php?id=$id' class='btn btn-warning btn-sm'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='currentColor' class='bi bi-x-lg flex-shrink-0 me-2' viewBox='0 0 16 16'>
                              <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                            </svg>Edit</a>
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
