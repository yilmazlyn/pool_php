<?php
session_start()
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Yilmaz Putun/Epitech</title>
</head>
  <body>

<?php

//so that name variable be available in a $name
if(isset($_GET["name"]))
{
    $user_name= $_GET["name"];
    $_SESSION["name"]=$user_name;
    }

else
{
//if there is a session, name value, it is gonna be stocked on $name attribue
    if(isset($_SESSION['name']))
    {
        $user_name=$_SESSION['name'];
    }
//otherwise echo for default name
    else
    {
        $user_name="platypus";
    }
}
        echo "Hello ".$user_name.PHP_EOL;


 ?>
</body>
</html>
