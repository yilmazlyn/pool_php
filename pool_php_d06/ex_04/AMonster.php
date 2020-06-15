<?php
include_once ("IUnit.php");
abstract class AMonster implements IUnit
{
$name = "";
$hp = 0;
$ap = 0;

  public function __construct($name, $hp,$ap)
  {
    $this->name = $name;
    $this->hp = $hp;
    $this->ap = $ap;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getHp()
  {
    return $this->hp;
  }

  public function getAp()
  {
    return $this->ap; 
  }

  public function equip($name)
  {

  }
  public function attack($attack)
  {

  }
  public function receiveDamage($receive)
  {

  }
  public function moveCloseTo($close_to)
  {

  }
  public function recoverAP()
  {

  }



}
