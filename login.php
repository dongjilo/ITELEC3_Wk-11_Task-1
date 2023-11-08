<?php
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
    <title>Login</title>
</head>
<body style="background-color: #eee">
<div class="container w-50 pt-5">
    <div class="card p-4 mt-4" id="user">
        <p class="card-title h1 text-center">Login</p>
        <form action="operation/checklogin.php" method="post">

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingUname" placeholder="Username" name="txtuname">
                <label for="floatingUname">Enter Username</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="txtpassword">
                <label for="floatingPassword">Enter Password</label>
            </div>

            <div class="container-fluid text-center mb-3">
                <input type="submit" class="btn btn-primary" value="Login" name="loginBtn">
                <input type="reset" class="btn btn-danger" value="Cancel" name="cancelBtn">
            </div>
            <?php
            if (isset($_SESSION['login_error'])) {
                echo "<div class='alert alert-danger alert-dismissible fade show d-flex align-items-center' role='alert'>
                                {$_SESSION['login_error']}
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
            }
            ?>
        </form>
    </div>
</div>
</body>
</html>
