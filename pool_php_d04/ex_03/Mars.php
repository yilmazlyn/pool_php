<?php
namespace chocolate {

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
}

namespace planet {

  class Mars
    {
    private static $id_num = 0;
    private $id;
    private $size;


    public function __construct($planet_size = 0)
    {
      $this->id = self ::$id_num;
      self::$id_num++;
      $this->size = $planet_size;
    }

    public function setSize($new_size)
    {
      $this->size = $new_size;
    }

    public function getSize()
    {
      return $this->size;
    }
  }
}
