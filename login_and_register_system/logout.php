<?php
    require_once 'includes/database.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="./styling/index.css">
</head>
<body>
 
    <?php 
    
        echo('You have successfully logged out'.'<a href="index.php" style="margin-left: 10px;">Go to Home</a>'.'<br>');
        echo('<a href="login.php" style="margin-right: 20px;">Login</a>');
        echo('<a href="register.php"> Register</a>');
    ?>
</body>
</html>