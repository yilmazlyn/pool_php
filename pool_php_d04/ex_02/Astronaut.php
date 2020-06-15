<?php
class Astronaut
{
  private  $name;
  private  $snacks;
  private  $destination;
  private  $id;
  private static $id_num =0;

  public function __construct ($per_name = "")
  {
  $this->id = self:: $id_num;
  self :: $id_num++;
  $this->name = $per_name;
  $this->snack = 0;
  $this->destination = NULL;
  echo "$per_name ready for launch !\n";
  }

  public function getId()
  {
    return $this->id;
    return $this->snack;

  }
  public function getDestination()
  {
    return $this->destination;
  }

}/*
$mutta = new Astronaut("Mutta");
$hibito = new Astronaut("Hibito");
echo $mutta->getId() . "\n";
echo $hibito->getId() . "\n";
echo $mutta->getDestination() . "\n";
echo $hibito->getDestination() . "\n";
 ?>*/
