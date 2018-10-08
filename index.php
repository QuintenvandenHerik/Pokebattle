<?php

require 'pokemon.php';



$pikachu = new pokemon('Pikachu', 'electric', 35, 35, 55, 50, 40, 50, 90, 100, 0, ['Growl', 'Thunder Shock', 'Thunder Wave', 'Quick Attack']);
print_r('<pre>'. $pikachu . '</pre>');

$charmeleon = new pokemon('Charmeleon', 'fire', 58, 58, 64, 80, 58, 65, 80, 100, 0, ['Ember', 'Smokescreen', 'Fire Fang', 'Dragon Rage']);
print_r('<pre>'. $charmeleon . '</pre>');

PrintPokemonStats($pikachu);
PrintPokemonStats($charmeleon);

$pikachu->fight($charmeleon);

PrintPokemonStats($pikachu);
PrintPokemonStats($charmeleon);


function PrintPokemonStats($pokemon) {
	echo '<div style="border: 1px solid silver; font-weight:bold">';
	echo 'Pokemon:' . '<br>';
	echo 'Name: ' . $pokemon->name . '<br>';
	echo 'Hotpoints: ' . $pokemon->hitpoints . '<br>';
	echo '</div>';
}