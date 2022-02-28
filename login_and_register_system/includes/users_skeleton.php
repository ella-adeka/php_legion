<?php
    $sql = "SELECT * from users";
    $result = mysqli_query($conn, $sql);
    $blogs = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    mysqli_free_result($result);
    // mysqli_close($conn);
?>