<?php



session_start();

if(isset($_GET["name"]))
        {
        $user_name = $_GET["name"];

        setcookie("name", $user_name, time()+86400);

        $_COOKIE["name"] = $user_name;
        }
else
        {

        if(isset($_COOKIE["name"]))
                {
                $user_name=$_COOKIE["name"];
                }
        else
                {
                $user_name='platypus';
                }
        }

echo "Hello " . $user_name . PHP_EOL;
