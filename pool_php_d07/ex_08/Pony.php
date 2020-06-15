<?php
class Pony
{
  private $gender;
  private $name;
  private $color;

  public function __construct($gender, $name, $color)
  {
    $this->gender = $gender;
    $this->name = $name;
    $this->color = $color;
  }

  public function __destruct()
  {
    echo "I am dead pony.". PHP_EOL;
  }

  public function __toString()
  {
    return "Don't worry, I'm a pony!". PHP_EOL;
  }

  public function echo()
  {
    echo "Don't worry, I'm a ponny". PHP_EOL;
  }

  public function speak()
  {
    echo "Hii hii hii". PHP_EOL;
  }

  public function __call($name, $args)
  {
    echo "I don't know what to do...". PHP_EOL;
  }

  public function __set($still, $access)
  {
    if (property_exists("Pony", "$still"))
    {
        echo "It's not right to set a private attribute". PHP_EOL;

    }

    else
    {
      echo "There is no attribute: ". $still . PHP_EOL;
    }
  }

  public function __get($still)
  {
    if(property_exists("Pony", "$still" ))
    {
      echo "It's not right to set a private attribute" .PHP_EOL;

    }

    else
    {
      echo "There is no attribute: " . $still . "." . PHP_EOL;
    }
  }
}
