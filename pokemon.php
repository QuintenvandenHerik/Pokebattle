<?php

class pokemon
{
	public $name;
    public $energyType1;
    public $energyType2;
    public $level;
	public $maxHitpoints;
	public $hitpoints;
	public $attack;
	public $SpAttack;
	public $defence;
	public $SpDefence;
	public $speed;
	public $accuracy;
    public $evasion;
    public $move1;
    public $move2;
    public $move3;
    public $move4;

	public function __construct($name, $energyType1, $energyType2, $level, $maxHitpoints, $hitpoints, $attack, $SpAttack, $defence, $SpDefence, $speed, $accuracy, $evasion, $move1, $move2, $move3, $move4)
    {

        $this->name = $name;
        $this->energyType1 = $energyType1;
        $this->energyType2 = $energyType2;
        $this->level = $level;
        $this->maxHitpoints = $maxHitpoints;
        $this->hitpoints = $hitpoints;
        $this->attack = $attack;
        $this->SpAttack = $SpAttack;
        $this->defence = $defence;
        $this->SpDefence = $SpDefence;
        $this->speed = $speed;
        $this->accuracy = $accuracy;
        $this->evasion = $evasion;
        $this->move1 = $move1;
        $this->move2 = $move2;
        $this->move3 = $move3;
        $this->move4 = $move4;


    }

    public function checkMultiplier($target)
    {
    	require 'typechart.php';
        if ($target->energyType2 == null) {
            $multiplier = $table[$this->energyType1][$target->energyType1];
        }
        else {
            $multiplier = $table[$this->energyType1][$target->energyType1] * $table[$this->energyType1][$target->energyType2];
        }

    	return $multiplier;
    }

    public function fight($target)
    {
    	$multiplier = $this->checkMultiplier($target);

    	$target->doDamage($this->hitpoints, $this->name, $this->level, $this->energyType1, $this->attack, $multiplier, $target->name, $target);
    }

    public function doDamage($hitpoints, $name, $level, $energytype, $attack, $multiplier, $targetName, $target)
    {
        /*
        !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        */
        $power = 50;
        /*
        !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        */
        $damage = (((((2 * $level) / 5) + 2) * $power * $attack / $target->defence / 50) + 2) * $multiplier;
    	if ($damage < 0) {
    		$damage = 0;
    	}
    	echo $name . " attacked " . $targetName . " with " . $energytype . " for " . round($attack) . " points, with a multiplier of " . $multiplier . " and did " . round($damage) . " damage <br>";

    	$target->hitpoints = $target->hitpoints - round($damage);
        if ($target->hitpoints <= 0) {
            $target->hitpoints = 0;
            echo $target->name . " fainted! <br>";
        }
    }
}