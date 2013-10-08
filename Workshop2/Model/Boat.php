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

	public function ReadBoat(){
		//$boatData = array();
		$boatData['id'] = $this->id;
		$boatData['mId'] = $this->mId;
		$boatData['type'] = $this->type;
		$boatData['length'] = $this->length;
		return $boatData;
	}
}