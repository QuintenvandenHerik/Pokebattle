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
    	echo $table[$this->energytype][$target->energytype] . "<br>";
    }

    public function fight($target) {
    	echo $this->name . " will attack " . $target->name . " with " . $this->energytype . " for " . $this->attack . " points.<br>";
    	$this->doDamage($this->energytype, $this->attack);
    	print_r($this->moves);
    }

    public function doDamage($energytype, $damage) {
    	echo $this->name . " attacked with " . $energytype . " for " . $damage . " points.<br>";
    }
}