<?php

require 'pokemon.php';
require 'pokebag.php';
require 'move.php';
require_once 'pokestats.php';


$pikachu = new pokemon('Pikachu', 'electric', /*maxHitpoints*/ 35, /*hitpoints*/ 35, /*attack*/ 55, /*SpAttack*/ 50, /*defence*/ 40, /*SpDefence*/ 50, /*speed*/ 90, /*accuracy*/ 100, /*evasion*/ 0, $stats);
dump($pikachu);

$charmeleon = new pokemon('Charmeleon', 'fire', /*maxHitpoints*/ 58, /*hitpoints*/ 58, /*attack*/ 64, /*SpAttack*/ 80, /*defence*/ 58, /*SpDefence*/ 65, /*speed*/ 80, /*accuracy*/ 100, /*evasion*/ 0, $stats);
dump($charmeleon);

$pokebag = new pokebag();
$pokebag->Add($pikachu);
$pokebag->Add($charmeleon);
dump($pokebag->GetAllNames());

PrintPokemonStats($pikachu);
PrintPokemonStats($charmeleon);

while($pikachu->hitpoints > 0 & $charmeleon->hitpoints > 0) {
	$pikachu->fight($charmeleon);
	$charmeleon->fight($pikachu);

	PrintPokemonStats($pikachu);
	PrintPokemonStats($charmeleon);
}

function PrintPokemonStats($pokemon) {
	echo '<div style="border: 1px solid silver; font-weight:bold">';
	echo 'Pokemon:' . '<br>';
	echo 'Name: ' . $pokemon->name . '<br>';
	echo 'Hitpoints: ' . $pokemon->hitpoints . '<br>';
	echo 'defence: ' . $pokemon->defence . '<br>';
	echo '</div>';
}

function dump($var) {
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
}