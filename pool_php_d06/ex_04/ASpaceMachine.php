<?php
include_once("IUnit.php")
abstract class ASpaceMachine implements IUnit
{
$name;
$hp;
$ap;

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



}
 ?>
