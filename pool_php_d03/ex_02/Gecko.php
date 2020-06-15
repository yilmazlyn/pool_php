<?php

class Gecko
{
  public $name;

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
}
