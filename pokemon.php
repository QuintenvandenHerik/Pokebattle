<?php
require 'typechart.php';
class pokemon {
	public $name;
	public $energytype;
	public $hitpoints;
	public $weakness;
	public $ressistance;
	public $moves;
	public $damage;
	public $defence;

	public function __construct($name, $energytype, $hitpoints, $weakness, $ressistance, $damage, $defence, $moves)
    {
        $this->name = $name;
        $this->energytype = $energytype;
        $this->hitpoints = $hitpoints;
        $this->weakness = $weakness;
        $this->ressistance = $ressistance;
        $this->damage = $damage;
        $this->defence = $defence;
        $this->moves = $moves;
    }
    public function __toString() {
        return json_encode($this);
    }

    public function checkModifier($target) {
    	echo $table[$this->energytype][$target->energytype];
    }

    public function attack($target) {
    	echo $this->name . " will attack " . $target->name . " with " . $this->energytype . " for " . $this->damage . " points.<br>";
    	$this->doDamage($this->energytype, $this->damage);
    	print_r($this->moves);
    }

    public function doDamage($energytype, $damage) {
    	echo $this->name . " attacked with " . $energytype . " for " . $damage . " points.<br>";
    }
}