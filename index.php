<?php

require 'pokemon.php';



$pikachu = new pokemon('Pikachu', 'electric', 35, 35, 55, 50, 40, 50, 90, 100, 0, ['Growl', 'Thunder Shock', 'Thunder Wave', 'Quick Attack']);
print_r('<pre>'. $pikachu . '</pre>');

$charmeleon = new pokemon('Charmeleon', 'fire', 58, 58, 64, 80, 58, 65, 80, 100, 0, ['Ember', 'Smokescreen', 'Fire Fang', 'Dragon Rage']);
print_r('<pre>'. $charmeleon . '</pre>');

$pikachu->checkModifier($charmeleon);
$pikachu->fight($charmeleon);