<?php

class Character {

	private $name;
	private $strength;
	private $magic;
	private $intelligence;
	private $life;

    function __construct($name =""){
		$this->name = $name;
		$this->strength = 0;
		$this->magic = 0;
		$this->intelligence = 0;
		$this->life = 100;
    $this->i = $name;
	}

	function getName()
  {
		return $this->name;
	}

	 function getStrength()
  {
		return $this->strength;
	}

	 function getMagic()
  {
		return $this->magic;
	}

	function getIntelligence()
  {
		return $this->intelligence;
	}

	 function getLife()
  {
		return $this->life;
	}

	 function __toString()
  {
		return $this->name;
	}
}
