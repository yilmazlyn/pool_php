<?php

class Gecko
{
  private $name;
  private $age;

  public function __construct($user_name ="", $user_age = "")
  {
  $this->name = $user_name;
  $this->age = $user_age;
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

  public function getAge()
  {
    return ($this->age);
  }

  public function setAge($new_user_age)
  {
      $this->age = $new_user_age;
  }



  public function status()
  {

    switch($this->age)
    {
      case $this->age == 0:
      echo "Unborn Gecko\n";
      break;

      case $this->age == 1:
      echo "Baby Gecko\n";
      break;

      case $this->age == 2:
      echo "Baby Gecko\n";
      break;

      case ($this->age >= 3) && ($this->age <=10):
      echo "Adult Gecko\n";
      break;

      case ($this->age >= 11) && ($this->age <=13):
      echo "Old Gecko\n";
      break;

      default:
      echo "Impossible Gecko\n";
      break;

    }

  }

}
