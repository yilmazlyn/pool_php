<?php

abstract class AWeapon
{
protected $name;
protected $apcost;
protected $damage;
protected $melee;

  public function __construct($wname, $wapcost, $wdamage, $wmelee = false)
  {
    $this->name = $wname;
    $this->apcost = $wapcost;
    $this->damage = $wdamage;
    $this->melee = $wmelee;
    /*if attributes get some weird values, lets give error on output*/
    if(!is_string($wname) or !is_integer($wapcost) or !is_integer($wdamage))
    {
      throw new Exception ("Error in AWeapon constructor. Bad parameters.");
    }
  }

  public function getName()
  {
    return $this->name;
  }

  public function getApcost()
  {
    return $this->apcost;
  }

  public function getDamage()
  {
    return $this->damage;
  }

  public function isMelee()
  {
    return $this->melee;
  }

  abstract public function attack();


}
