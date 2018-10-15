<?php

require 'pokemon.php';
require 'move.php';
require_once 'pokestats.php';


$pikachu = new pokemon('Pikachu', 'electric', 35, 35, 55, 50, 40, 50, 90, 100, 0, $stats);
dump($pikachu);

$charmeleon = new pokemon('Charmeleon', 'fire', 58, 58, 64, 80, 58, 65, 80, 100, 0, $stats);
dump($charmeleon);

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