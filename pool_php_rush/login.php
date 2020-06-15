<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//     header("location: welcome.php");
//     exit;
// }
 
// Define variables and initialize with empty values

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <form action="server.php" method="post">
            <div class="form-group <?php echo (isset($_SESSION["email_err"])) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php if(isset($_SESSION["email"])){ print($_SESSION["email"]);
				unset($_SESSION["email"]);} ?>">
                <span class="help-block"><?php if(isset($_SESSION["email_err"])){ print($_SESSION["email_err"]); unset($_SESSION["email_err"]);} ?></span>
            </div>    
            <div class="form-group <?php echo (isset($_SESSION["password_err"])) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" <?php if(isset($_SESSION["password"])){print($_SESSION["password"]);
				unset($_SESSION["password"]);} ?>>
                <span class="help-block"><?php if(isset($_SESSION["password_err"])){ print($_SESSION["password_err"]); unset($_SESSION["password_err"]);} ?></span>
            </div>
            <div class="form-group">
                <input type="submit" name="logIn" class="btn btn-primary" value="Login">
            </div>
           
        </form>
    </div>    
</body>
</html> 
