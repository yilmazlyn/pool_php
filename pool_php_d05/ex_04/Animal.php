<?php

class Animal
{
  const MAMMAL = 0;
  const FISH = 1;
  const BIRD = 2;

  protected $name;
  private $legs;
  private $type;

  static $numberOfMammals = 0;
  static $numberOfFishes = 0;
  static $numberOfBirds = 0;
  static $numberOfAnimalsAlive;


  public function __construct($name_of_, $legs_of_, $type_of_)
  {
    $this->name = $name_of_;
    $this->legs = $legs_of_;
    $this->type = $type_of_;

    ++self::$numberOfAnimalsAlive;

    if ($this->type == 0)
    {
        ++self::$numberOfMammals;
    }

    elseif($this->type == 1)
    {
      ++self::$numberOfFishes;
    }

    else
    {
      ++self::$numberOfBirds;
    }
  echo "My name is ".$this->name." and I am a ".$this->getType($this->type). " !\n";
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

  static function getNumberOfAnimalsAlive()
  {
    if (self::$numberOfAnimalsAlive == 1)
    {
      echo "There is currently " . self::$numberOfAnimalsAlive ." animal alive in our world.\n";
    }

    else
    {
      echo "There are currently " . self::$numberOfAnimalsAlive ." animals alive in our world.\n";
    }
    return self::$numberOfAnimalsAlive;


  }

  static function getNumberOfMammals()
  {
    if (self::$numberOfMammals == 1)
    {
      echo "There is currently " . self::$numberOfMammals ." mamal alive in our world.\n";
    }

    else
    {
      echo "There are currently " . self::$numberOfMammals ." mamals alive in our world.\n";
    }
    return self::$numberOfMammals;
  }

  static function getNumberOfFishes()
  {
    if (self::$numberOfFishes == 1)
    {
      echo "There is currently " . self::$numberOfFishes ." fish alive in our world.\n";
    }
    else
    {
      echo "There are currently " . self::$numberOfFishes ." fishes alive in our world.\n";
    }

    return self::$numberOfFishes;
  }

  static function getNumberOfBirds()
  {
    if (self::$numberOfBirds == 1)
    {
      echo "There is currently " . self::$numberOfBirds ." bird alive in our world.\n";
    }
    else
    {
      echo "There are currently " . self::$numberOfBirds ." birds alive in our world.\n";
    }
    return self::$numberOfBirds;
  }
}
