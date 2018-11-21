<?php

require 'pokemon.php';
require 'pokebag.php';
require 'move.php';
require_once 'pokestats.php';


$pikachu = new pokemon('Pikachu', 'electric', null, /*maxHitpoints*/ 35, /*hitpoints*/ 35, /*attack*/ 55, /*SpAttack*/ 50, /*defence*/ 40, /*SpDefence*/ 50, /*speed*/ 90, /*accuracy*/ 100, /*evasion*/ 0, $stats);

$charmeleon = new pokemon('Charmeleon', 'fire', null, /*maxHitpoints*/ 58, /*hitpoints*/ 58, /*attack*/ 64, /*SpAttack*/ 80, /*defence*/ 58, /*SpDefence*/ 65, /*speed*/ 80, /*accuracy*/ 100, /*evasion*/ 0, $stats);

$ivysaur = new pokemon('Ivysaur', 'grass', 'poison', /*maxHitpoints*/ 60, /*hitpoints*/ 60, /*attack*/ 62, /*SpAttack*/ 80, /*defence*/ 63, /*SpDefence*/ 80, /*speed*/ 60, /*accuracy*/ 100, /*evasion*/ 0, $stats);

$wartortle = new pokemon('Wartortle', 'water', null, /*maxHitpoints*/ 59, /*hitpoints*/ 59, /*attack*/ 63, /*SpAttack*/ 65, /*defence*/ 80, /*SpDefence*/ 80, /*speed*/ 58, /*accuracy*/ 100, /*evasion*/ 0, $stats);

$butterfree = new pokemon('Butterfree', 'bug', 'flying', /*maxHitpoints*/ 60, /*hitpoints*/ 60, /*attack*/ 45, /*SpAttack*/ 90, /*defence*/ 50, /*SpDefence*/ 80, /*speed*/ 70, /*accuracy*/ 100, /*evasion*/ 0, $stats);

$beedrill = new pokemon('Beedrill', 'bug', 'poison', /*maxHitpoints*/ 65, /*hitpoints*/ 65, /*attack*/ 90, /*SpAttack*/ 45, /*defence*/ 40, /*SpDefence*/ 80, /*speed*/ 75, /*accuracy*/ 100, /*evasion*/ 0, $stats);


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
		dump($pokemon1->name);
		dump($pokemon2->name);
	}

}

dump($pokemon1);
dump($pokemon2);

echo "Array of all pokemon: ";
dump($pokebag->all());
echo "All pokemon name: ";
dump($pokebag->getAllNames());
echo "Array of chosen pokemon: ";
dump($pokebag->get(1));
echo "Id of random pokemon: ";
dump($pokebag->random());

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
	echo 'Hitpoints: ' . $pokemon->hitpoints . '<br>';
	echo 'defence: ' . $pokemon->defence . '<br>';
	echo '</div>';
}

function dump($var)
{
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
}