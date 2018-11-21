<?php

$effects = [
	'Burn' => [$target->health/* Damages the target for 1/8 of its HP, and attack is reduced to 50% */],
	'Confused' => [/* Duration of 1-4 turns, has a 50% chance to attack itself, and attack is reduced to 50% */],
	'Flinch' => [/* Unable to move for 1 turn */],
	'Frozen' => [/* Unable to move for 1-2 turns, firetype attacks remove this effect */],
	'Leech Seed' => [$target->health/* Damages the opponent for 1/16 of its HP, and heals the damage done */],
	'Paralyzed' => [/* 25% chance of being unable to attack, its damage is reduced by 50% */],
	'Poison' => [$target->health/* Losses an amount of HP every turn */],
	'Sleep' => [/* Asleep for x turns */],
]

?>