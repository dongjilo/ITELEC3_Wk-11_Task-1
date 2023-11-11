<?php
    include 'operation/sessioncheck.php';

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
    <title>Profile Page</title>
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
                <a class="nav-link active" href="profile.php">Profile</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Settings</a>
                <ul class="dropdown-menu">
                    <li><?php echo "<a class='dropdown-item' href='edituser.php?id={$user -> id}'>Update Profile</a>"; ?></li>
                    <li><a class="dropdown-item" href="operation/logout.php" onclick="confirm('Are you sure you want to logout?')">Logout</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">User Table</span></a>
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

<div class="container w-50 pt-5">
    <div class="card p-4">
        <p class="card-title h4">Welcome, <?php echo $user -> name; ?>.</p>
        <table class="table-borderless my-3">
            <tr>
                <td><b>Name:</b></td>
                <td><?php echo $user -> name; ?></td>
            </tr>
            <tr>
                <td><b>Username:</b></td>
                <td><?php echo $user -> username; ?></td>
            </tr>
            <tr>
                <td><b>Password:</b></td>
                <td><?php echo $user -> password; ?></td>
            </tr>
            <tr>
                <td><b>Gender:</b></td>
                <td><?php echo $user -> gender; ?></td>
            </tr>
            <tr>
                <td><b>Civil Status:</b></td>
                <td><?php echo $user -> civil_status; ?></td>
            </tr>
            <tr>
                <td><b>Birthdate:</b></td>
                <td><?php echo $user -> birthdate; ?></td>
            </tr>
        </table>

        <script>
            function showPassword() {
                var x = document.getElementById("pw");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
        <div class="container text-center">
        <a href="operation/logout.php" class="btn btn-danger" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
        </div>
    </div>
</div>
</body>
</html>
