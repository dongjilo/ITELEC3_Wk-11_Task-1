<?php

require_once("db/dbconnection.php");

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <title>Category Table</title>
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
                <a class="nav-link " href="index.php">User Table</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="items.php">Item Table</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="category.php">Category Table</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add.php">Add User</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container pt-5">
    <div class="card p-4">
        <h1 class="py-2 text-center">Category Table</h1>
        <?php
        $sql = "select * from categorytbl";
        $query = $conn->query($sql);
        $numRows = $query->num_rows;

        if ($query->num_rows > 0) {
            //            echo "Total no of rows: $numRows";
            echo "<table class='table table-hover table-striped table-bordered'> 
                        <tr>
                        <thead>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Category Description</th>
                        </thead>
                        </tr>";
            while($row = $query -> fetch_assoc()){
                $id = $row['category_id'];
                $name = $row['category_name'];
                $desc = $row['category_description'];

                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$name</td>";
                echo "<td>$desc</td>";

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

