<?php

require 'pokemon.php';



$pikachu = new pokemon('Pikachu', 'Electric', 35, 'ground', 'Fighting', 55, 40, ['Growl', 'Thunder Shock', 'Thunder Wave', 'Quick Attack']);
print_r('<pre>'. $pikachu . '</pre>');

$charmeleon = new pokemon('Charmeleon', 'Fire', 58, 'Water', 'Lightning', 64, 58, ['Ember', 'Smokescreen', 'Fire Fang', 'Dragon Rage']);
print_r('<pre>'. $charmeleon . '</pre>');

$pikachu->checkModifier($charmeleon);
$pikachu->attack($charmeleon);