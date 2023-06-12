<?php 
    session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe System</title>
    <link rel="stylesheet" href="./style.css" type="text/css">
</head>
<body>
<nav>
    <ul>
       
        <?php if (!isset($_SESSION['usersId'])) : ?>
            <a href="signup.php"><li>Sign Up</li></a>
            <a href="login.php"><li>Login</li></a>
        <?php else : ?>
            <a href="index.php"><li>Home</li></a>
            <?php if ($_SESSION['isAdmin']) : ?>
                <a href="./adduser.php"><li>Add User</li></a>
                <a href="../createcategory.php"><li>Add Category</li></a>
                <a href="../createproduct.php"><li>Add Product</li></a>
            <?php endif; ?>
            <a href="../../controller/Users.php?q=logout"><li>Logout</li></a>
        <?php endif; ?>
    </ul>
</nav>

    