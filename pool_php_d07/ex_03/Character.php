<?php
include_once ("IMovable.php");
class Character implements IMovable
{
  protected $name;
  protected $life;
  protected $agility;
  protected $strength;
  protected $wit;
  const CLASSE = "Character";

  public function __construct($name)

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
    echo $this->name .": moves right".PHP_EOL;
  }

  public function moveLeft()
  {
    echo $this->name .": moves left".PHP_EOL;
  }

  public function moveUp()
  {
    echo $this->name .": moves up".PHP_EOL;
  }

  public function moveDown()
  {
    echo $this->name .": moves down".PHP_EOL;
  }

}

 ?>
