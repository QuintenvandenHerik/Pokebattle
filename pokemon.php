<?php

class pokemon
{
	public $name;
    public $energytype1;
    public $energytype2;
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

	public function __construct($name, $energytype1, $energytype2, $maxHitpoints, $hitpoints, $attack, $SpAttack, $defence, $SpDefence, $speed, $accuracy, $evasion, $stats)
    {
    	if(false == isset($stats[$name])) {
        	die('No info about ' . $name . ' in pokestats.php');
        }

        $this->name = $name;
        $this->energytype1 = $energytype1;
        $this->energytype2 = $energytype2;
        $this->maxHitpoints = $maxHitpoints;
        $this->hitpoints = $hitpoints;
        $this->attack = $attack;
        $this->SpAttack = $SpAttack;
        $this->defence = $defence;
        $this->SpDefence = $SpDefence;
        $this->speed = $speed;
        $this->accuracy = $accuracy;
        $this->evasion = $evasion;

        if(isset($stats[$name])) {

			foreach ($stats[$name]['Moves'] as $attackname=>$value) {
				$this->Moves[] = new move($attackname, $value);
			}
		} else {
			$this->moves = [];
		}


    }

    public function __toString()
    {
        return json_encode($this);
    }

    public function checkModifier($target)
    {
    	require 'typechart.php';
        if ($target->energytype2 == null) {
            $modifier = $table[$this->energytype1][$target->energytype1];
        }
        else {
            $modifier = $table[$this->energytype1][$target->energytype1] * $table[$this->energytype1][$target->energytype2];
        }

    	return $modifier;
    }

    public function fight($target)
    {
    	$modifier = $this->checkModifier($target);

    	$target->doDamage($this->hitpoints, $this->name, $this->energytype1, $this->attack, $modifier, $target->name, $target);
    	//print_r($this->moves);
    }

    public function doDamage($hitpoints, $name, $energytype, $points, $modifier, $targetName, $target)
    {
    	$damage = $points * $modifier - $target->defence;
    	if ($damage < 0) {
    		$damage = 0;
    	}
    	echo $name . " attacked " . $targetName . " with " . $energytype . " for " .$points. " points, with a modifier of " . $modifier . " and did " . $damage . " damage <br>";

    	$target->hitpoints = $target->hitpoints - $damage;
        if ($target->hitpoints <= 0) {
            $target->hitpoints = 0;
            echo $target->name . " fainted! <br>";
        }
    }
}