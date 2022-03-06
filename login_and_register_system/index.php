<?php
    // Initialize the session
    session_start();

    // if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    //     header("location: login.php");
    //     exit;
    // }
    // require_once 'includes/database.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./styling/index.css">
</head>
<body>
 
    <?php 
    if (isset($_SESSION['username'])) {
        echo($_SESSION['username'].'<br>');
        echo('Welcome'.' To'.' Your Home Page'.'<br>');
        echo('<a href="logout.php"> Logout</a>');
    } else {
        echo('Hello There'.'<br>');
        echo('<a href="login.php" style="margin-right: 20px;">Login</a>');
        echo('<a href="register.php"> Register</a>');
    }
    ?>
</body>
</html>