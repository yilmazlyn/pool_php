<?php
include_once ("Animal.php");
class Canary extends Animal
{

  private $eggs = 0;

  public function __construct($name)
  {
      parent::__construct($name,2,2);
      echo "Yellow and smart ? Here I am !\n";
  }

  public function getEggsCount()
  {
      return $this->eggs;
  }

  public function layEgg()
  {
      ++$this->eggs;
  }

}

 
