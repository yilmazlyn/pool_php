<?php
interface IUnit
{
  public function equip($name);
  public function attack($attack);
  public function receiveDamage($receive);
  public function moveCloseTo($close_to);
  public function recoverAP();
}
