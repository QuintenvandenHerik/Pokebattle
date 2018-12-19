<?php

require_once "move.php";

$QuickAttack =	new move('Quick Attack', 	/*energy type*/'normal', 	/*power level*/40, 	/*power points*/ 30, 	/*accuracy*/ 100, 	/*category*/ "physical");
$Growl =		new move('Growl', 			/*energy type*/'normal', 	/*power level*/45, 	/*power points*/ 40, 	/*accuracy*/ 100, 	/*category*/ "Status");
$ThunderShock =	new move('Thunder Shock', 	/*energy type*/'electric', 	/*power level*/40, 	/*power points*/ 30, 	/*accuracy*/ 100, 	/*category*/ "special");
$Discharge =	new move('Discharge', 		/*energy type*/'electric', 	/*power level*/40, 	/*power points*/ 30, 	/*accuracy*/ 100, 	/*category*/ "special");
$Ember =		new move('Ember', 			/*energy type*/'fire', 		/*power level*/40, 	/*power points*/ 25, 	/*accuracy*/ 100, 	/*category*/ "special");
$Smokescreen =	new move('Smokescreen', 	/*energy type*/'normal', 	/*power level*/0, 	/*power points*/ 20, 	/*accuracy*/ 100, 	/*category*/ "status");
$DragonRage =	new move('Dragon Rage', 	/*energy type*/'dragon', 	/*power level*/0, 	/*power points*/ 10, 	/*accuracy*/ 100, 	/*category*/ "special");
$FireFang =		new move('Fire Fang', 		/*energy type*/'fire', 		/*power level*/65, 	/*power points*/ 15, 	/*accuracy*/ 100, 	/*category*/ "physical");
$LeechSeed =	new move('Leech Seed', 		/*energy type*/'grass', 	/*power level*/0, 	/*power points*/ 10, 	/*accuracy*/ 90, 	/*category*/ "status");
$VineWhip =		new move('Vine Whip', 		/*energy type*/'grass', 	/*power level*/45, 	/*power points*/ 25, 	/*accuracy*/ 100, 	/*category*/ "physical");
$PoisonPowder =	new move('Poison Powder', 	/*energy type*/'poison', 	/*power level*/0, 	/*power points*/ 35, 	/*accuracy*/ 75, 	/*category*/ "status");
$SleepPowder =	new move('Sleep Powder', 	/*energy type*/'grass', 	/*power level*/0, 	/*power points*/ 15, 	/*accuracy*/ 100, 	/*category*/ "status");
$WaterGun =		new move('Water Gun', 		/*energy type*/'water', 	/*power level*/40, 	/*power points*/ 25, 	/*accuracy*/ 100, 	/*category*/ "special");
$Bubble =		new move('Bubble', 			/*energy type*/'water', 	/*power level*/40, 	/*power points*/ 30, 	/*accuracy*/ 100, 	/*category*/ "special");
$Bite =			new move('Bite', 			/*energy type*/'dark', 		/*power level*/60, 	/*power points*/ 25, 	/*accuracy*/ 100, 	/*category*/ "physical");
$AquaTail =		new move('Aqua Tail', 		/*energy type*/'water', 	/*power level*/90, 	/*power points*/ 10, 	/*accuracy*/ 90, 	/*category*/ "physical");
$Confusion =	new move('Confusion', 		/*energy type*/'physic', 	/*power level*/50, 	/*power points*/ 25, 	/*accuracy*/ 100, 	/*category*/ "special");
$BugBuzz =		new move('Bug Buzz', 		/*energy type*/'bug', 		/*power level*/90, 	/*power points*/ 10, 	/*accuracy*/ 100, 	/*category*/ "special");
$AirSlash =		new move('Air Slash', 		/*energy type*/'flying', 	/*power level*/75, 	/*power points*/ 20, 	/*accuracy*/ 95, 	/*category*/ "special");
$Twineedle =	new move('Twineedle', 		/*energy type*/'bug', 		/*power level*/25, 	/*power points*/ 20, 	/*accuracy*/ 100, 	/*category*/ "physical");
$Venoshock =	new move('Venoshock', 		/*energy type*/'poison', 	/*power level*/65, 	/*power points*/ 10, 	/*accuracy*/ 100, 	/*category*/ "special");
$PoisonJab =	new move('Poison Jab', 		/*energy type*/'poison', 	/*power level*/80, 	/*power points*/ 20, 	/*accuracy*/ 100, 	/*category*/ "physical");
$Endeavor =		new move('Endeavor', 		/*energy type*/'normal', 	/*power level*/0, 	/*power points*/ 5, 	/*accuracy*/ 100, 	/*category*/ "physical");