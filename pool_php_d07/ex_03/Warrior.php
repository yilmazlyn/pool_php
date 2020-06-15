<?php
class Warrior extends Character

{
  protected $name;
  protected $life;
  protected $agility;
  protected $strength;
  protected $wit;
  const CLASSE = "Warrior";

  public function __construct($name)
  {
    parent::__construct($name, 100, 10, 8, 3);
    /*
    $this->name = $name;
    $this->life = 100;
    $this->agility = 10;
    $this->strength = 8;
    $this->wit = 3;*/
    echo $name. ": I'll engrave my name in history!".PHP_EOL;

  }

  public function __destruct()
  {
  echo $this->name . ": Aarrg I can't believe I'm dead...".PHP_EOL;
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

  public function attack()
  {
    echo $this->name . ": I'll crush you with my hammer!".PHP_EOL;
  }

}



 ?>
