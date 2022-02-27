<?php

    // parametrs to connect to the database
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "phptutorial";

    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

    if (!$conn) {
        die("Database connection failed");
    }
?>