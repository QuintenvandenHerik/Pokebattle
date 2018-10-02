<?php

require 'pokemon.php';



$pikachu = new pokemon('Pikachu', 'electric', 35, 'ground', 'fighting', 55, 40, ['Growl', 'Thunder Shock', 'Thunder Wave', 'Quick Attack']);
print_r('<pre>'. $pikachu . '</pre>');

$charmeleon = new pokemon('Charmeleon', 'fire', 58, 'water', 'lightning', 64, 58, ['Ember', 'Smokescreen', 'Fire Fang', 'Dragon Rage']);
print_r('<pre>'. $charmeleon . '</pre>');

$pikachu->checkModifier($charmeleon);
$pikachu->attack($charmeleon);