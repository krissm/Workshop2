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
		$boatData['id'] = $this->id;
		$boatData['mId'] = $this->mId;
		$boatData['type'] = $this->type;
		$boatData['length'] = $this->length;
		return $boatData;
	}
	
	public static function AddBoat($db, $entry) {
		$db->ExecuteQuery('INSERT INTO BoatRegister (mId, type, length) VALUES (?, ?, ?);', $entry);
		$boat = $db->ExecuteSelectQueryAndFetchAll('SELECT * FROM BoatRegister WHERE mId=(?) AND type=(?) AND length=(?);', $entry);
		return new self($boat[0]);
	}
	
	public function EditBoat($db, $entry) {
		$this->type = $entry['type'];
		$this->length = $entry['length'];
		$parameters = array($entry['type'], $entry['length'], $entry['id']);
		$db->ExecuteQuery('UPDATE BoatRegister SET type=(?), length=(?)  WHERE id=(?);', $parameters);
	}
	
	public function DeleteBoat($db, $entry) {
		$db->ExecuteQuery('DELETE FROM BoatRegister WHERE id=(?);', $entry);
	}
	
	public function GetId(){
		return $this->id;
	}
	
}