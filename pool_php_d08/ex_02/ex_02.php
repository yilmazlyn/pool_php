<?php
function my_password_hash($password)
{
  $salt =uniqid("", true);
  $hash = md5($salt . $password);
  $array = array("hash" => $hash, "salt" => $salt);
  echo $salt . PHP_EOL;
  echo $hash . PHP_EOL;

  return $array;

}

function my_password_verify($password, $salt, $hash)
{
  $verify_it = md5($salt . $password);
  $verify_it2 = md5($password);
  if($verify_it == $hash)
  {
    echo "match";
    return true;
  }

  else
  {echo "does not match";
    return false;

  }

  if($salt == NULL)
  {
    if($verify_it2 == $hash)
    {
      echo "match";
      return true;
    }

    else
    {echo "does not match";
      return false;

    }
  }

}
// $array = my_password_hash("Bonjour12");
// var_dump($array);
// my_password_verify("Bonjour12", $array["salt"], $array["hash"]);

 
