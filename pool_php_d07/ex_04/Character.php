<?php
include_once ("IMovable.php");
class Character implements IMovable
{
  protected $name;
  protected $life;
  protected $agility;
  protected $strength;
  protected $wit;
  protected $classe;
  const CLASSE = "Character";

  public function __construct($name, $life, $agility, $strength, $wit)

  {
    $this->name = $name;
    $this->life = 50;
    $this->agility = 2;
    $this->strength = 2;
    $this->wit = $wit = 2;
    $this->classe = self::CLASSE;

  }

  public function getName()
  {
    return $this->name;
  }

  public function getLife()
  {
    return $this->life;
  }

  public function getAgility()
  {
    return $this->agility;
  }

  public function getStrength()
  {
    return $this->strength;
  }

  public function getWit()
  {
    return $this->wit;
  }

  public function getClasse()
  {
    return self::CLASSE;
  }

  public function moveRight()
  {
    if ($this->classe == "Warrior")
    {
      echo $this->name .": moves right like a bad boy.". PHP_EOL;
    };

    if ($this->classe == "Mage")
    {
      echo $this->name . ": moves right furtively.". PHP_EOL;
    };
  // echo $this->name .": moves right".PHP_EOL;
  }

  public function moveLeft()
  {

    if ($this->classe == "Warrior")
    {
      echo $this->name .": moves left like a bad boy.". PHP_EOL;
    }

    if ($this->classe == "Mage")
    {
      echo $this->name . ": moves left furtively.". PHP_EOL;
    }

    //echo $this->name .": moves left".PHP_EOL;
  }

  public function moveUp()
  {
    if ($this->classe == "Warrior")
    {
      echo $this->name .": moves up like a bad boy.". PHP_EOL;
    }

    if ($this->classe == "Mage")
    {
      echo $this->name . ": moves up furtively.". PHP_EOL;
    }
    //echo $this->name .": moves up".PHP_EOL;
  }

  public function moveDown()
  {
    if ($this->classe == "Warrior")
    {
      echo $this->name .": moves down like a bad boy.". PHP_EOL;
    }

    if ($this->classe == "Mage")
    {
      echo $this->name . ": moves down furtively.". PHP_EOL;
    }
    //echo $this->name .": moves down".PHP_EOL;
  }

}

 ?>
