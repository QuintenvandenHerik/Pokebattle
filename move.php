<?php

class move {
	public $name;
	public $energyType;
	public $powerLevel;
	public $powerPoints;
	public $accuracy;
	public $category;

	public function __construct($name, $energyType, $powerLevel, $powerPoints, $accuracy, $category) {
		$this->name = $name;
		$this->energyType = $energyType;
		$this->powerLevel = $powerLevel;
		$this->powerPoints = $powerPoints;
		$this->accuracy = $accuracy;
		$this->category = $category;
	}
}
