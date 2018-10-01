<?php

class move {
	public $name;
	public $attackPoints;

	public function __construct($name, $attackPoints) {
		$this->name = $name;
		$this->attackPoints = $attackPoints;
	}
}
