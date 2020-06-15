<?php
include_once ("Animal.php");
class Cat extends Animal
{
  private $color;

  function __construct($name, $color = "grey")
  {
    parent::__construct($name, 4, 0);
    $this->color = $color;


    echo $this->name . ": MEEEOOWWWW\n";

  }
  function getColor()
  {
    return $this->color;
  }

  function setColor($color)
  {
    return $this->color = $color;
  }

  function meow()
  {
    echo $this->name. " the " . $this->color . " kitty is meowing.\n";
  }
}
/*
$isidore = new Cat("Isidore", "orange");
echo $isidore->getName() . " has " . $isidore->getLegs() . " legs and is a " .
$isidore->getType() . ".\n";
$isidore->meow();*/
