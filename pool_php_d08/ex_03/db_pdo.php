<?php

const ERROR_LOG_FILE = "./error_log_file";

function connect_db($host, $db, $port, $username, $passwd)
{

 try
 {
  $connection = new PDO("mysql:host=$host; dbname=$db; port=$port;", $username, $passwd);
   echo "[BDD] Connected successfully". PHP_EOL;
 }

 catch (PDOException $events)
 {
   echo '[BDD] Connection failed: ' . $events->getMessage() . PHP_EOL;

   error_log($events->getMessage()." | ".strftime('%A %d %B %Y %I:%M:%S').PHP_EOL, 3, ERROR_LOG_FILE);
 }

}


 // connect_db('localhost','coding', 3306,'user','pswd');
 connect_db("localhost", "coding", 3306, "admin", "mysql");
