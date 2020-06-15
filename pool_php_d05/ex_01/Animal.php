<?php

class Animal
{
  const MAMMAL = 0;
  const FISH = 1;
  const BIRD = 2;

  private $name;
  private $legs;
  private $type;

  public function __construct($name_of_, $legs_of_, $type_of_)
  {
    $this->name = $name_of_;
    $this->legs = $legs_of_;
    $this->type = $type_of_;
    echo "My name is ".$this->name." and I am a ".$this->getType($this->type). "!\n";

  }

  function getName()
  {
    return $this->name;
  }

  function setName ($name_of_)
  {
      $this->name = $name_of_;
  }

  function getLegs()
  {
    return $this->legs;
  }

  function getType()

  {
    if($this->type == 0)
    {
      return "mammal";

    }

    elseif ($this->type == 1)
    {
      return "fish";

    }

    else
    {
      return "bird";
    }

  }

  function setType($type_of_)
  {
    $this->type = $type_of_;
  }

}
