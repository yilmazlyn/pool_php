<?php
class Mars

{
  private static $id_num =0;
  private $id;


  public function __construct()
  {
    $this->id = self:: $id_num;
    self :: $id_num++;

  }

  public function getId()
  {
    return $this->id;
  }

}
/*
$rocks = new Mars();
$lite = new Mars();
$snack = new Mars();
echo $rocks->getId() . "\n";
echo $lite->getId() . "\n";
echo $snack->getId() . "\n";
echo $snack->getId() . "\n";
echo $snack->getId() . "\n";
 ?>
*/
