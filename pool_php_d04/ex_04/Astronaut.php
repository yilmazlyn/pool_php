<?php
include_once("Mars.php");
class Astronaut
{
  private  $name;
  private  $snacks;
  private  $destination;
  private  $id;
  private static $unique_id_num =0;

  public function __construct ($per_name = "")
  {
  $this->id = self:: $unique_id_num;
  self :: $unique_id_num++;
  $this->name = $per_name;
  $this->snacks = 0;
  $this->destination = NULL;
  echo "$per_name ready for launch !\n";
  }

  public function __destruct()
  {
    if($this->destination == NULL)
    {
    echo "$this->name: Mission aborted !\n";
    }

    else
    {
      echo "$this->name: I may have done nothing, but I have ".t$his->snacks." Mars to eat at least
! "
    }
  }

  public function getId()
  {
    return $this->id;
    //return $this->snack;
  }

  public function getSnacks()
  {
    return $this->snacks;

  }

  public function getDestination()
  {
    return $this->destination;
  }

  public function setDestination ($target)
  {
    $this->destination = $target;
  }

  public function doAction()
  {

  }



}/*
$mutta = new Astronaut("Mutta");
$hibito = new Astronaut("Hibito");
echo $mutta->getId() . "\n";
echo $hibito->getId() . "\n";
echo $mutta->getDestination() . "\n";
echo $hibito->getDestination() . "\n";
 ?>*/
