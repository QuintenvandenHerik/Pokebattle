<?php

require_once 'pokemon.php';
require_once 'pokebag.php';    // pokebag requires move.php
require_once 'pokestats.php';

$pikachu = new pokemon('Pikachu', 'electric', null, /*level*/40, /*maxHitpoints*/ rand(90 , 115), /*hitpoints*/ null, /*attack*/ rand(61 , 86), /*SpAttack*/ rand(57 , 82), /*defence*/ rand(49 , 74), /*SpDefence*/ rand(57 , 82), /*speed*/ rand(89 , 114), /*accuracy*/ 100, /*evasion*/ 0, $QuickAttack, $Growl, $ThunderShock, $Discharge);

$charmeleon = new pokemon('Charmeleon', 'fire', null, /*level*/40, /*maxHitpoints*/ rand(108 , 134), /*hitpoints*/ null, /*attack*/ rand(68 , 93), /*SpAttack*/ rand(81 , 106), /*defence*/ rand(63 , 89), /*SpDefence*/ rand(69 , 94), /*speed*/ rand(81 , 106), /*accuracy*/ 100, /*evasion*/ 0, $Ember, $Smokescreen, $DragonRage, $FireFang);

$ivysaur = new pokemon('Ivysaur', 'grass', 'poison', /*level*/40, /*maxHitpoints*/ rand(110 , 135), /*hitpoints*/ null, /*attack*/ rand(67 , 92), /*SpAttack*/ rand(81 , 106), /*defence*/ rand(67 , 93), /*SpDefence*/ rand(81 , 106), /*speed*/ rand(65 , 90), /*accuracy*/ 100, /*evasion*/ 0, $LeechSeed, $VineWhip, $PoisonPowder, $SleepPowder);

$wartortle = new pokemon('Wartortle', 'water', null, /*level*/40, /*maxHitpoints*/ rand(109 , 134), /*hitpoints*/ null, /*attack*/ rand(67 , 93), /*SpAttack*/ rand(69 , 94), /*defence*/ rand(81 , 106), /*SpDefence*/ rand(81 , 106), /*speed*/ rand(63 , 89), /*accuracy*/ 100, /*evasion*/ 0, $WaterGun, $Bubble, $Bite, $AquaTail);

$butterfree = new pokemon('Butterfree', 'bug', 'flying', /*level*/40, /*maxHitpoints*/ rand(110 , 135), /*hitpoints*/ null, /*attack*/ rand(53 , 78), /*SpAttack*/ rand(89 , 114), /*defence*/ rand(57 , 82), /*SpDefence*/ rand(81 , 106), /*speed*/ rand(73 , 98), /*accuracy*/ 100, /*evasion*/ 0, $Confusion, $PoisonPowder, $BugBuzz, $AirSlash);

$beedrill = new pokemon('Beedrill', 'bug', 'poison', /*level*/40, /*maxHitpoints*/ rand(114 , 139), /*hitpoints*/ null, /*attack*/ rand(89 , 114), /*SpAttack*/ rand(53 , 78), /*defence*/ rand(49 , 74), /*SpDefence*/ rand(81 , 106), /*speed*/ rand(77 , 102), /*accuracy*/ 100, /*evasion*/ 0, $Twineedle, $Venoshock, $PoisonJab, $Endeavor);


$pokemon1 = null;
$pokemon2 = null;
$pokebag = new pokebag();

$pokebag->Add($pikachu);
$pokebag->Add($charmeleon);
$pokebag->Add($ivysaur);
$pokebag->Add($wartortle);
$pokebag->Add($butterfree);
$pokebag->Add($beedrill);

while ($pokemon1 == $pokemon2) {
	$pokemon1 = $pokebag->random();
	$pokemon2 = $pokebag->random();
	if ($pokemon1 == $pokemon2) {
		$pokemon1 = null;
		$pokemon2 = null;
	}
	else {
		$pokemon1 = $pokebag->get($pokemon1);
		$pokemon2 = $pokebag->get($pokemon2);
		$pokemon1->hitpoints = $pokemon1->maxHitpoints;
		$pokemon2->hitpoints = $pokemon2->maxHitpoints;
		dump($pokemon1->name);
		dump($pokemon2->name);
	}

}

dump($pokemon1);
dump($pokemon2);

//echo "Array of all pokemon: ";
//dump($pokebag->all());
echo "All pokemon name: ";
dump($pokebag->getAllNames());
//echo "Array of chosen pokemon: ";
//dump($pokebag->get(1));
//echo "Id of random pokemon: ";
//dump($pokebag->random());

PrintPokemonStats($pokemon1);
PrintPokemonStats($pokemon2);

while($pokemon1->hitpoints > 0 & $pokemon2->hitpoints > 0) {
	$pokemon1->fight($pokemon2);
	$pokemon2->fight($pokemon1);

	PrintPokemonStats($pokemon1);
	PrintPokemonStats($pokemon2);
}

function PrintPokemonStats($pokemon)
{
	echo '<div style="border: 1px solid silver; font-weight:bold">';
	echo 'Pokemon:' . '<br>';
	echo 'Name: ' . $pokemon->name . '<br>';
	echo 'Hitpoints: ' . round($pokemon->hitpoints) . '<br>';
	echo 'defence: ' . $pokemon->defence . '<br>';
	echo '</div>';
}

function dump($var)
{
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
}