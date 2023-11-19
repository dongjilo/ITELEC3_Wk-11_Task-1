<?php
    require_once("db/dbconnection.php");
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
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            $('#orderPrice').val(0);
            $('#orderQty').val(0);
            $('#orderTotal').val(0);

            var selectedValue = localStorage.getItem('selectedValue');
            if (selectedValue) {
                $('#add_type').val(selectedValue);
                showSelectedForm(selectedValue);
            }

            $('#add_type').on('change', function() {
                var val = $(this).val();
                localStorage.setItem('selectedValue', val);
                showSelectedForm(val);
            });

            function showSelectedForm(selectedForm) {
                $('#user, #item, #category, #order').hide();
                $('#' + selectedForm).show();
            }

            $('#item_select').on('change', function (){
                var selectedPrice = $('#item_select').find('option:selected').data('price');
                $('#orderPrice').val(selectedPrice);
                calculateTotal();
            });

            $('#orderQty').on('keyup', function(){
                calculateTotal();
            });

            $('#orderPrice').on('change', function () {
                calculateTotal();
            });

            function calculateTotal() {
                var price = $('#orderPrice').val();
                var quantity = $('#orderQty').val();
                var total = quantity * price;
                $('#orderTotal').val(total);
            }
        });
    </script>
    <title>Add Page</title>
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
                    <li><?php echo "<a class='dropdown-item' href='edituser.php?id={$user -> id}&from=profile'>Update Profile</a>"; ?></li>
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
                <a class="nav-link" href="order.php">Order Table</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="add.php">Add</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container w-50 mt-5">
<div class="form-floating">
    <select class="form-select" aria-label="Select table to add" id="add_type" name="add_type">
        <option selected> </option>
        <option value="user">User</option>
        <option value="item">Item</option>
        <option value="category">Category</option>
        <option value="order">Order</option>
    </select>
    <label for="add_type">Select table to add</label>
</div>
    <div class="card p-4 mt-4" style="display: none;" id="user">
        <p class="card-title h1 text-center">Add User</p>
        <form action="operation/save.php?from=add&table=usertbl" method="post">

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
                <label for="floatingBdate">Enter Birthdate</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingStatus" placeholder="Civil Status" name="txtstatus">
                <label for="floatingStatus">Enter Civil Status</label>
            </div>

            <div class="container-fluid text-center mb-3">
                <input type="submit" class="btn btn-primary" value="Save" name="saveBtn">
                <a href="index.php" class="btn btn-danger">Cancel</a>
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

    <div class="card p-4 mt-4" style="display: none;" id="item">
        <p class="card-title h1 text-center">Add Item</p>
        <form action="operation/save.php?table=itemtbl&from=add" method="post">

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingName" placeholder="Name" name="txtname">
                <label for="floatingName">Enter Name</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingPrice" placeholder="Username" name="txtprice">
                <label for="floatingPrice">Enter Price</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingQty" placeholder="Username" name="txtqty">
                <label for="floatingQty">Enter Quantity</label>
            </div>

            <div class="form-floating mb-3">
                <select name="category_select" id="category_select" class="form-select">
                    <?php
                        $sql = "select * from categorytbl";
                        $query = $conn->query($sql);
                        while ($row = $query->fetch_assoc()){
                            $category_id = $row["category_id"];
                            $category_name = $row["category_name"];
                            echo "<option value='$category_id'>$category_name</option>";
                        }
                    ?>
                </select>
                <label for="category_select">Select Category</label>
            </div>

            <div class="container-fluid text-center mb-3">
                <input type="submit" class="btn btn-primary" value="Save" name="saveBtn">
                <a href="items.php" class="btn btn-danger">Cancel</a>
            </div>

            <?php
            if (isset($_SESSION["sess_add_err_item"])) {
                $error = $_SESSION["sess_add_err_item"];
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
                unset($_SESSION["sess_add_err_item"]);
            }

            if (isset($_SESSION["sess_add_suc_item"])) {
                $success = $_SESSION["sess_add_suc_item"];
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
                unset($_SESSION["sess_add_suc_item"]);
            }
            ?>
        </form>
    </div>

    <div class="card p-4 mt-4" style="display: none;" id="category">
        <p class="card-title h1 text-center ">Add Category</p>
        <form action="operation/save.php?table=categorytbl" method="post">

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingName" placeholder="Name" name="txtcatname">
                <label for="floatingName">Enter Category Name</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingDesc" placeholder="Description" name="txtcatdes">
                <label for="floatingDesc">Enter Category Description</label>
            </div>

            <div class="container-fluid text-center mb-3">
                <input type="submit" class="btn btn-primary" value="Save" name="saveBtn">
                <a href="category.php" class="btn btn-danger">Cancel</a>
            </div>

            <?php
                if (isset($_SESSION["sess_add_err_cat"])) {
                    $error = $_SESSION["sess_add_err_cat"];
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
                    unset($_SESSION["sess_add_err_cat"]);
                }

                if (isset($_SESSION["sess_add_suc_cat"])) {
                    $success = $_SESSION["sess_add_suc_cat"];
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
                    unset($_SESSION["sess_add_suc_cat"]);
                }
            ?>
        </form>
    </div>

    <div class="card p-4 mt-4" style="display: none;" id="order">
        <p class="card-title h1 text-center">Add Order</p>
        <form action="operation/save.php?table=ordertbl&from=add" method="post">

            <div class="form-floating mb-3">
                <select name="user_select" id="user_select" class="form-select">
                    <option selected></option>
                    <?php
                    $sql = "select * from usertbl";
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()){
                        $user_id = $row["id"];
                        $user_name = $row["name"];
                        echo "<option value='$user_id'>$user_name</option>";
                    }
                    ?>
                </select>
                <label for="user_select">Select User</label>
            </div>


            <div class="form-floating mb-3">
                <select name="item_select" id="item_select" class="form-select">
                    <option selected></option>
                    <?php
                    $sql = "select * from itemtbl";
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()){
                        $item_id = $row["item_id"];
                        $item_name = $row["item_name"];
                        $item_price = $row["item_price"];
                        echo "<option value='$item_id' data-price='$item_price'>$item_name</option>";
                    }
                    ?>
                </select>
                <label for="category_select">Select Item</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="orderPrice" placeholder="Username" name="txtprice" readonly>
                <label for="orderPrice">Price</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="orderQty" placeholder="Username" name="txtqty">
                <label for="orderQty">Enter Quantity</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="orderTotal" placeholder="Total" name="txttotal" readonly>
                <label for="orderTotal">Total</label>
            </div>

            <div class="container-fluid text-center mb-3">
                <input type="submit" class="btn btn-primary" value="Save" name="saveBtn">
                <a href="order.php" class="btn btn-danger">Cancel</a>
            </div>

            <?php
            if (isset($_SESSION["sess_add_err_order"])) {
                $error = $_SESSION["sess_add_err_order"];
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
                unset($_SESSION["sess_add_err_order"]);
            }

            if (isset($_SESSION["sess_add_suc_order"])) {
                $success = $_SESSION["sess_add_suc_order"];
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
                unset($_SESSION["sess_add_suc_order"]);
            }
            ?>
        </form>
    </div>
</div>

</body>
</html>
