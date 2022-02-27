<?php
    require_once 'includes/database.php';
    // header('Location: index.php');
    // exit;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" name="username" required placeholder="Username">
        <br>
        <input type="password" name="password" placeholder="Password">
        <br>
        <input type="submit" value="Submit">

        
    </form>
    <a href="register.php">Don't Have An Account? Then Register</a>
    <?php 
 
    ?>
</body>
</html>