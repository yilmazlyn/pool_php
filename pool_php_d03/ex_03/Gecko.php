<?php

class Gecko
{
  private $name;

  public function __construct($user_name ="")
  {
  $this->name = $user_name;
    if($this->name == "")
    {
      echo "Hello !\n";
    }

    else
    {
      echo "Hello $user_name !\n";
    }
  }

  public function __destruct()
  {
    if($this->name == "")
    {
      echo "Bye !\n";
    }

    else
    {
      echo "Bye $this->name !\n";
    }
  }

  public function getName()
  {

    return $this->name;

  }

}/*
include_once("Gecko.php");
$thomas = new Gecko("Thomas");
$anonymous = new Gecko();
$serguei = new Gecko("Serguei");
unset($serguei);
echo $thomas->getName() . "\n";
echo $anonymous->getName() . "\n";
?>
*/
