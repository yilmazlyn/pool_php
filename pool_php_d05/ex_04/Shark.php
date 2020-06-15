<?php
include_once ("Animal.php");
class Shark extends Animal
{
private $frenzy = false;

  function __construct($name)
  {
    parent::__construct($name, 0, 1);

    echo "A KILLER IS BORN !\n";
  }

  function smellBlood($boolean_of_shark)
  {
    $this->frenzy = $boolean_of_shark;

  }

  public function status()

  {


    if($this->frenzy == true)
    {
      echo $this->name. " is smelling blood and wants to kill.\n";
    }

   else
    {
      echo $this->name . " is swimming peacefully.\n";
    }
  }
}
