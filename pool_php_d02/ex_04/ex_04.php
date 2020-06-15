<?php

function my_password_hash ($password)
{

  $salt = uniqid('', true);
  $hash = md5($password.$salt);
  $array = array ("hash" => $hash, "salt" => $salt);
  return $array;



}


 function my_password_verify($password, $salt, $hash){

    if (md5($password.$salt) == $hash){

    return true;

  }

  else {

    return false;
  }
}

$arrayhash = my_password_hash("Bonjour");

my_password_verify("Bonjour", $arrayhash["salt"], $arrayhash["hash"]);
