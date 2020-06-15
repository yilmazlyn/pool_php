<?php
class Gecko
{
   public $friends = array();
   public $skills;

   public function __construct(array $friends = null, Skill $skills)
  {
    $this->friends = $friends;
    $this->skills = $skills;
  }

}


 ?>
