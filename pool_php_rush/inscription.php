<?php

session_start();
    // var_dump($_SESSION);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Registration</h2>

        <form action="server.php" method="post">
            <div class="form-group <?php echo (isset($_SESSION["name_err"])) ? 'has-error' : ''; ?>">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php if(isset($_SESSION["name"])){ print($_SESSION["name"]);
				unset($_SESSION["name"]);} ?>">
                <span class="help-block"><?php if(isset($_SESSION["name_err"])){ print($_SESSION["name_err"]); unset($_SESSION["name_err"]);} ?></span>
            </div>   
            <div class="form-group <?php echo (isset($_SESSION["email_err"])) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php if(isset($_SESSION["email"])){
				print($_SESSION["email"]);
				unset($_SESSION["email"]);
			} ?>">
                <span class="help-block"><?php if(isset($_SESSION["email_err"])){ print($_SESSION["email_err"]); unset($_SESSION["email_err"]);} ?></span>
            </div>    
            <div class="form-group <?php echo (isset($_SESSION["password_err"])) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php if(isset($_SESSION["password"])){print($_SESSION["password"]);
				unset($_SESSION["password"]);} ?>">
                <span class="help-block"><?php if(isset($_SESSION["password_err"])){ print($_SESSION["password_err"]); unset($_SESSION["password_err"]);} ?></span>
            </div>
            <div class="form-group <?php echo (isset($_SESSION["confirm_password_err"])) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php if(isset($_SESSION["confirm_password"])){ print($_SESSION["confirm_password"]);
				unset($_SESSION["confirm_password"]);} ?>">
                <span class="help-block"><?php if(isset($_SESSION["confirm_password_err"])){ print($_SESSION["confirm_password_err"]); unset($_SESSION["confirm_password_err"]);} ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="signUp" value="Submit">
            </div>

        </form>
    </div> 
    <?php 
		session_destroy();
	 ?>   
</body>
</html>