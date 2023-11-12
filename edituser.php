<?php
    require_once ("db/dbconnection.php");
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
    <title>Edit Page</title>
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

<div class="container w-50 mt-5">
    <div class="card p-4">
        <p class="card-title h1 text-center ">Edit Information</p>
        <form action="operation/update.php?table=usertbl" method="post">

            <div class="form-floating mb-3">
                <input type="hidden" class="form-control visually-hidden" id="floatingID" placeholder="ID" name="txtid" value="<?php echo $user -> id; ?>">
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingName" placeholder="Name" name="txtname" value="<?php echo $user -> name; ?>">
                <label for="floatingName">Enter Name</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingUname" placeholder="Username" name="txtuname" value="<?php echo $user -> username; ?>">
                <label for="floatingUname">Enter Username</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="txtpassword" value="<?php echo $user -> password; ?>">
                <label for="floatingPassword">Enter Password</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingGender" placeholder="Gender" name="txtgender" value="<?php echo $user -> gender; ?>">
                <label for="floatingGender">Enter gender</label>
            </div>

            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="floatingBdate" placeholder="0000-00-00" name="txtbdate" value="<?php echo $user -> birthdate; ?>">
                <label for="floatingUname">Enter Birthdate</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingStatus" placeholder="Civil Status" name="txtstatus" value="<?php echo $user -> civil_status; ?>">
                <label for="floatingStatus">Enter Civil Status</label>
            </div>

            <div class="container-fluid text-center mb-3">
                <input type="submit" class="btn btn-primary" value="Update" name="updBtn">
                <a href="index.php"  class="btn btn-danger">Cancel</a>
            </div>

            <?php
                if (isset($_SESSION["sess_upd_err"])) {
                    $error = $_SESSION["sess_upd_err"];
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
                    unset($_SESSION["sess_upd_err"]);
                }

                if (isset($_SESSION["sess_upd_suc"])) {
                    $success = $_SESSION["sess_upd_suc"];
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
                    unset($_SESSION["sess_upd_suc"]);
                }
            ?>
        </form>
    </div>
</div>
</body>
</html>
