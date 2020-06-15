<html>
<head>
<title>PHP User Registration Form</title>

</head>
<body>
    <form name="formRegistration" method="post" action="">
        <div>
        <div>Sign Up</div>

<?php
if (! empty($errorMessage) && is_array($errorMessage))
?>
            <div>
            <?php
            foreach($errorMessage as $message) {
                echo $message . "<br/>";
            }
            ?>
            </div>

            <div>
                <label>Name</label>
                <div>
                    <input type="text"
                        name="name" required
                        placeholder=<?php if(isset($_POST['name'])) echo $_POST['name']; ?>>
                </div>
            </div>

            <div>
                <label>Email</label>
                <div>
                    <input type="text"
                        name="email" required
                        placeholder=<?php if(isset($_POST['email'])) echo $_POST['email']; ?>>
                </div>
            </div>

            <div>
                <label>Password</label>
                <div><input type="password"
                    name="password" required placeholder=<?php if(isset($_POST['password'])) echo $_POST['password']; ?>></div>
            </div>
            <div>
                <label>Confirm Password</label>
                <div>
                    <input type="password"
                        name="confirm_password" placeholder= <?php if (isset($_POST["password"]) == isset($_POST["confirm_password"]))
                        {
                            echo "Password matched!"
                        }

                        else {
                  echo "Password did not match!"
                }?>
                </div>
            </div>
                <div>
                    <input type="submit"
                        name="register-user" value="Register"

                </div>
            </div>
        </div>
    </form>
</body>
</html>
