<?php
$name;
$email;
$password;
$confirm_passwd;
$date;
$submit = $_POST;

// form data
var_dump($_POST);
$name = STRIP_TAGS($_POST["name"]);
$email = STRIP_TAGS($_POST['email']);
$password = STRIP_TAGS($_POST['password']);
$confirm_passwd = STRIP_TAGS($_POST['confirm_passwd']);
$date = date("Y-m-d");

if ($submit)
{
    if($name&&$email&&$password&&$confirm_passwd)


      if (!filter_var($email, FILTER_VALIDATE_EMAIL))
      {
        $emailErr = "Invalid email format";
      echo "echomail error". $emailErr;

    if ($password==$confirm_passwd)
    {
        //check char length of username and fullname
        if(strlen($name)>10||strlen($name)<3)
        {
            echo "Invalid name";
        }

        else
        {   //check password length

            if (strlen($password)>10||strlen($password)<3)
            {
            echo "Password must be between 3 and 10 characters";//put specifique exo phrases
            }

            else
            {   //register the user!
                // encrypt password
            password_hash($password, PASSWORD_DEFAULT);
            password_hash($confirm_passwd, PASSWORD_DEFAULT); // to verify PASSWORD_DEFAULT??????

                //open database

            $connect = mysql_connect("localhost", "admin", "mysql");
            mysql_select_db("coding");

            $queryreg = mysql_query("
            CREATE DATABASE registration
            INSERT INTO users VALUES ('','$name','$email','$password','$date')`

            ");

            die ("Thankyou for registering! <a href='index.php'> Return to login page</a>");
            }
        }


    }
    else{
        echo "Your passwords do not match!";
        }
    }
    else
    {
        echo "Please fill in <b>all</b> fields!";
      }

  else
  {
    echo "Email accepted";
  }
}


?>

<html>
<body>
<form name"Registration Form" method="POST">
  <div class="container">
    <h1>Register</h1>
    <p>Use this form for your inscription</p>
    <hr/>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Your Name" name="name" required value="<?php $_POST["name"]; ?>"><br/><br/>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required value="<?php echo $_POST["email"]; ?>"><br/><br/>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required value="<?php echo $_POST["password"]; ?>"><br/><br/>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Confirm Password" name="confirm_passwd" required value="<?php echo $_POST ["confirm_passwd"]; ?>"><br/><br/>
    <hr/>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <input type="submit" class="registerbutton" value="submit">Submit</input>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form>
</body>
</html>
