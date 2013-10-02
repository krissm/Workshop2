<?php

class Di{
	private $value;
	
	public function Roll(){
		$this->value = rand(1,6);
	}
	
	public function GetValue(){
		return $this->value;		
	}
}