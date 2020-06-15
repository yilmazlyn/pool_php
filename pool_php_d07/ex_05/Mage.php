<?php
class Mage extends Character
{
  protected $name;
  protected $life;
  protected $agility;
  protected $strength;
  protected $wit;
  protected $classe;
  const CLASSE = "Mage";

  public function __construct($name)

  {

    parent::__construct($name, 70, 10, 3, 10);
    /*
    $this->name = $name;
    $this->life = 70;
    $this->agility = 10;
    $this->strength = 3;
    $this->wit = 10;*/
      $this->classe = self::CLASSE;
    echo $name. ": May the gods be with me." .PHP_EOL;
  }

  public function __destruct()
  {
  echo $this->name . ": By the four gods, I passed away...".PHP_EOL;
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
    echo $this->name .": Feel the power of my magic!".PHP_EOL;
  }
}
 ?>
