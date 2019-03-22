<?php 

class Pikachu extends Pokemon
{
    public function __construct($name, $energyType, $level, $maxHitpoints, $hitpoints, $attack, $SpAttack, $defence, $SpDefence, $speed, $accuracy, $evasion, $moves) {
       
        parent::__construct($name, $energyType, $level, $maxHitpoints, $hitpoints, $attack, $SpAttack, $defence, $SpDefence, $speed, $accuracy, $evasion, $moves);

         $this->talks = true;
    }
}