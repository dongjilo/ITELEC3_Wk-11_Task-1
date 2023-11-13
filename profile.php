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

<section style="background-color: #eee;">

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4 ">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png" alt="avatar"
                             class="rounded-5 img-fluid" style="width: 150px;">
                        <h5 class="my-3">@<?php echo $user -> username?></h5>
                        <div class="d-flex justify-content-center mb-2">
                            <?php echo "<a class='btn btn-primary' href='edituser.php?id={$user -> id}&from=profile'>Update Profile</a>"; ?>
                            <a class="btn btn-danger ms-1" href="operation/logout.php" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Full Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $user -> name; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Username</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $user -> username; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Password</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="password" class="text-muted mb-0" id="pw" value="<?php echo $user -> password; ?>" disabled readonly style="border: none;">
                                <button class="btn btn-danger btn-sm" id="showBtn" onclick="showPassword()">Show</button>

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Gender</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $user -> gender; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Civil Status</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $user -> civil_status; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Birthdate</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $user -> birthdate; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function showPassword() {
        var pw = document.getElementById("pw");
        var btn = document.getElementById("showBtn");
        if (pw.type === "password") {
            pw.type = "text";
            btn.classList.remove('btn-danger');
            btn.classList.add('btn-success');
            btn.innerText = "Hide";
        } else {
            pw.type = "password";
            btn.classList.remove('btn-success');
            btn.classList.add('btn-danger');
            btn.innerText = "Show";
        }
    }
</script>
</body>
</html>
