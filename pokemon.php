<?php

class pokemon {

	public $name;
	public $energytype;
	public $maxHitpoints;
	public $hitpoints;
	public $attack;
	public $SpAttack;
	public $defence;
	public $SpDefence;
	public $speed;
	public $accuracy;
	public $evasion;
	public $moves;

	public function __construct($name, $energytype, $maxHitpoints, $hitpoints, $attack, $SpAttack, $defence, $SpDefence, $speed, $accuracy, $evasion, $moves)
    {
        $this->name = $name;
        $this->energytype = $energytype;
        $this->maxHitpoints = $maxHitpoints;
        $this->hitpoints = $hitpoints;
        $this->attack = $attack;
        $this->SpAttack = $SpAttack;
        $this->defence = $defence;
        $this->SpDefence = $SpDefence;
        $this->speed = $speed;
        $this->accuracy = $accuracy;
        $this->evasion = $evasion;
        $this->moves = $moves;
    }
    public function __toString() {
        return json_encode($this);
    }

    public function checkModifier($target) {
    	require 'typechart.php';
    	$modifier = $table[$this->energytype][$target->energytype];
    	return $modifier;
    }

    public function fight($target) {
    	$modifier = $this->checkModifier($target);

    	echo $this->name . " will attack " . $target->name . " with " . $this->energytype . " for " . $this->attack . " points with modifier" . $modifier . "<br>";
    	$target->doDamage($this->energytype, $this->attack, $modifier);
    	//print_r($this->moves);
    }

    public function doDamage($energytype, $points, $modifier) {
    	echo $this->name . " attacked with " . $energytype . "  points:" .$points. " with modifier" . $modifier . "<br>";
    	$this->hitpoints = $this->hitpoints - $points * $modifier;
    }
}