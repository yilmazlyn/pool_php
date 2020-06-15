<?php
class Character
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
}
/*
$perso = new Character ( "Jean-Luc" );
echo $perso -> getName () , PHP_EOL;
echo $perso -> getLife () , PHP_EOL;
echo $perso -> getAgility () , PHP_EOL;
echo $perso -> getStrength () , PHP_EOL;
echo $perso -> getWit () , PHP_EOL;
echo $perso -> getClasse () , PHP_EOL;
// displays : " Jean - Luc " , "50" , "2" , "2" , "2" and " Character "

 ?>*/
