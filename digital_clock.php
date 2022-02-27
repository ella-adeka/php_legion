<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Clock</title>
    <style>
        body{
            background: black;
            color: white;
            position: absolute;
            width: 90%;
            text-align: center;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            
        }
    </style>
</head>
<body>
    <?php
        $date = "<h1 style='font-size:5em' id='date'>".date('h:i:s A')."</h1>";
        echo $date;
        echo date("l\, jS \of F Y")."<br>";       
    ?>
</body>
</html>