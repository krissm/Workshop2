<?php
class Boat{
	public $id;
	private $mId;
	private $type;
	private $length;

	public function __construct($boat){
		$this->id = $boat['id'];
		$this->mId = $boat['mId'];
		$this->type = $boat['type'];
		$this->length = $boat['length'];
	}
}