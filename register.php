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
    <title>Register</title>
</head>
<body>
<div class="container w-50">
    <div class="card p-4 mt-4" id="user">
        <p class="card-title h1 text-center">Register</p>

        <form action="operation/save.php?from=reg&table=usertbl" method="post">

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingName" placeholder="Name" name="txtname">
                <label for="floatingName">Enter Name</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingUname" placeholder="Username" name="txtuname">
                <label for="floatingUname">Enter Username</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="txtpassword">
                <label for="floatingPassword">Enter Password</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingGender" placeholder="Gender" name="txtgender">
                <label for="floatingGender">Enter gender</label>
            </div>

            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="floatingBdate" placeholder="0000-00-00" name="txtbdate">
                <label for="floatingUname">Enter Birthdate</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingStatus" placeholder="Civil Status" name="txtstatus">
                <label for="floatingStatus">Enter Civil Status</label>
            </div>

            <div class="container-fluid text-center mb-3">
                <input type="submit" class="btn btn-primary" value="Save" name="saveBtn">
                <a href="login.php" class="btn btn-danger">Cancel</a>
            </div>

            <?php
            if (isset($_SESSION["sess_add_err"])) {
                $error = $_SESSION["sess_add_err"];
                echo "
                            <div class='alert alert-danger d-flex align-items-center' role='alert'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Warning:'>
                                    <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
                                </svg>
                                <div>
                                    $error
                                </div>
                            </div>
                        ";
                unset($_SESSION["sess_add_err"]);
            }

            if (isset($_SESSION["sess_add_suc"])) {
                $success = $_SESSION["sess_add_suc"];
                echo "
                            <div class='alert alert-success   d-flex align-items-center' role='alert'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-check-circle-fill flex-shrink-0 me-2' viewBox='0 0 16 16'>
                                        <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
                                    </svg>
                                <div>
                                    $success
                                </div>
                            </div>
                        ";
                unset($_SESSION["sess_add_suc"]);
            }
            ?>
        </form>
    </div>
</div>
</body>
</html>
