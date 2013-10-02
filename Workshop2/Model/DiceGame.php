<?php
require_once 'Die.php';

class DiceGame{
	private $die1;
	private $die2;
	//private $listGameObserver;
	
	public function __construct(){
		$this->die1 = new Di();
		$this->die2 = new Di();
	}
	
	public function RegisterListener(){
		
	}
	
	public function PlayGame(){
		$this->die1->Roll();
		return $this->die1->GetValue();
	}
	
	public function GetDieValue(){
		
	}
}