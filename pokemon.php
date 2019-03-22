<?php

require_once "move.php";

class Pokemon
{
	public $name;
    private $energyType;
    private $level;
	public $maxHitpoints;
	public $hitpoints;
	private $attack;
	private $SpAttack;
	public $defence;
	public $SpDefence;
	public $speed;
	private $accuracy;
    private $evasion;
    private $moves;
    protected $talks;


	public function __construct($name, $energyType, $level, $maxHitpoints, $hitpoints, $attack, $SpAttack, $defence, $SpDefence, $speed, $accuracy, $evasion, $moves)
    {
        $this->name = $name;
        $this->energyType = $energyType;
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
        $this->moves = $moves;
        $this->talks = false;
    }

    private function checkMultiplier($target, $move)
    {
    	require 'typechart.php';
        if ($target->energyType[1] == null) {
            $multiplier = $table[$move->energyType][$target->energyType[0]];
        }
        else {
            $multiplier = $table[$move->energyType][$target->energyType[0]] * $table[$move->energyType][$target->energyType[1]];
        }

    	return $multiplier;
    }

    public function fight($target)
    {
        $moveNumber = $this->moves[rand (0, 3)];
    	$multiplier = $this->checkMultiplier($target, $moveNumber);

    	$target->doDamage($this->hitpoints, $this->name, $this->level, $this->energyType[0], $this->attack, $this->SpAttack, $multiplier, $target->name, $target, $moveNumber);
    }

    private function doDamage($hitpoints, $name, $level, $energytype, $attack, $SpAttack, $multiplier, $targetName, $target, $move)
    {
        $power = $move->powerLevel;

        if ($move->category = "normal") {
            $damage = (((((2 * $level) / 5) + 2) * $power * $attack / $target->defence / 50) + 2) * $multiplier;
    	    if ($damage < 0) {
    		    $damage = 0;
    	    }
        }
        elseif ($move->category = "special") {
            $damage = (((((2 * $level) / 5) + 2) * $power * $SpAttack / $target->SpDefence / 50) + 2) * $multiplier;
            if ($damage < 0) {
                $damage = 0;
            }
        }
        elseif ($move->category = "status") {
            $damage = (((((2 * $level) / 5) + 2) * $power * $attack / $target->defence / 50) + 2) * $multiplier;
            if ($damage < 0) {
                $damage = 0;
            }
        }
    	echo $name . " attacked " . $targetName . " with " . $move->energyType . " for " . round($attack) . " points, with a multiplier of " . $multiplier . " and did " . round($damage) . " damage <br>";

    	$target->hitpoints = $target->hitpoints - round($damage);
        if ($target->hitpoints <= 0) {
            $target->hitpoints = 0;
            echo $target->name . " fainted! <br>";
        }
    }
}