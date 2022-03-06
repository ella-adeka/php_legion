<?php
    // Initialize the session
    session_start();
    
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        header('Location: index.php');
        exit;
    };

    // Include database file
    require_once 'includes/database.php';

    // Define variables and initialize with empty values
    $username = $password = "";
    $username_err = $password_err = $login_err  = "";

    // Processing form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Check if username is empty
        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter username";
        } else {
            $username = trim($_POST["username"]);
        }

        // Check if password is empty
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter password";
        } else {
            $password = trim($_POST["password"]);
        }

        // Validate credentials
        if (empty($username_err) && empty($password_err)) {
            // Prepare a select statement
            $sql = "SELECT user_id, username, password FROM users WHERE username = ?";

            if ($stmt = mysqli_prepare($conn,$sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                // Set parameters
                $param_username = $username;

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Store result
                    mysqli_stmt_store_result($stmt);

                    // Check if username exists, if yes then verify password
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $user_id, $username, $hashed_password);

                        if (mysqli_stmt_fetch($stmt)) {
                            if (password_verify($password, $hashed_password)) {
                                // Password is correct, so start a new session
                                session_start();

                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["user_id"] = $user_id;
                                $_SESSION["username"] = $username;

                                // Redirect user to welcome page
                                header('Location: index.php');
                            } else {
                                // Password is not valid, display a generic error message
                                $login_err = "Invalid username or password.";
                                echo ("<h1>$login_err</h1>");
                            }
                        }
                    } else {
                        // Username does not exist, display a generic error message
                        $login_err = "Invalid username or password.";
                        echo ("<h1>$login_err</h1>;");
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later";
                }
                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
        // Close connection
        mysqli_close($conn);
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <input type="text" name="username" id="username" required placeholder="Username">
        <br>
        <input type="password" name="password" id="password" placeholder="Password">
        <br>
        <input type="submit" value="Submit">

        
    </form>
    <a href="register.php">Don't Have An Account? Then Register</a>
    <?php 

        

        // if (isset($_POST['username']) && isset($_POST['password'])) {
        //     $username=$_POST['username'];
        //     $password=$_POST['password'];
        //     $sql = "SELECT user_id FROM users WHERE username = ?"; 
        //     $res = mysqli_query($conn, $sql);
        //     $row = mysqli_fetch_assoc($res);

        //     header('Location: index.php');
        // } elseif (empty($_POST['username']) || empty($_POST['password'])) {
        //         echo("<br>");
            
        // } else {
        //     echo ("Username or Password incorrect");
        // }
    ?>
</body>
</html>