<?php
include_once ("AWeapon.php");
class PowerFist extends AWeapon
{


public function __construct()
{
  
parent:: __construct("Power Fist",8, 50, true);
}

  public function attack ()
  {
    echo "SBAM\n";

  }

}
