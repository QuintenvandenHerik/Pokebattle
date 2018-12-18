<?php

class pokemon
{
	public $name;
    public $energytype1;
    public $energytype2;
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

	public function __construct($name, $energytype1, $energytype2, $level, $maxHitpoints, $hitpoints, $attack, $SpAttack, $defence, $SpDefence, $speed, $accuracy, $evasion, $stats)
    {
    	if(false == isset($stats[$name])) {
        	die('No info about ' . $name . ' in pokestats.php');
        }

        $this->name = $name;
        $this->energytype1 = $energytype1;
        $this->energytype2 = $energytype2;
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

        if(isset($stats[$name])) {

			foreach ($stats[$name]['Moves'] as $attackname=>$value) {
				$this->Moves[] = new move($attackname, $value);
			}
		} else {
			$this->Moves = [];
		}


    }

    /*public function __toString()
    {
        return json_encode($this);
    }*/

    public function checkMultiplier($target)
    {
    	require 'typechart.php';
        if ($target->energytype2 == null) {
            $multiplier = $table[$this->energytype1][$target->energytype1];
        }
        else {
            $multiplier = $table[$this->energytype1][$target->energytype1] * $table[$this->energytype1][$target->energytype2];
        }

    	return $multiplier;
    }

    public function fight($target)
    {
    	$multiplier = $this->checkMultiplier($target);

    	$target->doDamage($this->hitpoints, $this->name, $this->level, $this->energytype1, $this->attack, $multiplier, $target->name, $target, $this->Moves);
    	//print_r($this->moves);
    }

    public function doDamage($hitpoints, $name, $level, $energytype, $attack, $multiplier, $targetName, $target, $moves)
    {
        var_dump($moves[rand(0, 3)]);
        /*
        !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        */
        $moves[rand(0, 3)];
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