<?php
    require_once ("db/dbconnection.php");
    include 'operation/sessioncheck.php';

    if (isset($_GET['id']) && $_GET['id'] <> "") {
        $id = $_GET['id'];
        $sql = "select * from itemtbl where id='$id'";
        $query = $conn -> query($sql);
        while ($row = $query->fetch_assoc()) {
            $name = $row['name'];
            $price = $row['price'];
            $qty = $row['quantity'];
            $cat = $row['category'];

        }

    } else {
        header('Location: index.php');
    }
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
                    <li><a class="dropdown-item" href="operation/logout.php" onclick="confirm('Are you sure you want to logout?')">Logout</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="index.php">User Table</span></a>
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
        <p class="card-title h1 text-center ">Edit Item</p>
        <form action="operation/update.php?table=itemtbl" method="post">

            <div class="form-floating mb-3">
                <input type="hidden" class="form-control visually-hidden" id="floatingID" placeholder="ID" name="txtid" value="<?php echo $id; ?>">
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingName" placeholder="Name" name="txtname" value="<?php echo $name; ?>">
                <label for="floatingName">Enter Name</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingPrice" placeholder="Username" name="txtprice" value="<?php echo $price; ?>">
                <label for="floatingPrice">Enter Price</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingQty" placeholder="Username" name="txtqty" value="<?php echo $qty; ?>">
                <label for="floatingQty">Enter Quantity</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingCat" placeholder="Name" name="txtcat" value="<?php echo $cat; ?>">
                <label for="floatingCat">Enter Category</label>
            </div>

            <div class="container-fluid text-center mb-3">
                <input type="submit" class="btn btn-primary" value="Update" name="updBtn">
                <a href="items.php"  class="btn btn-danger">Cancel</a>
            </div>
            <?php
                if (isset($_SESSION["sess_upd_err_item"])) {
                    $error = $_SESSION["sess_upd_err_item"];
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
                    unset($_SESSION["sess_upd_err_item"]);
                }

                if (isset($_SESSION["sess_upd_suc_item"])) {
                    $success = $_SESSION["sess_upd_suc_item"];
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
                    unset($_SESSION["sess_upd_suc_item"]);
                }
            ?>
        </form>
    </div>
</div>
</body>
</html>
