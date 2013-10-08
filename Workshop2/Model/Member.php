<?php
require_once 'Boat.php';

class Member{
	private $membershipNo;
	private $name;
	private $pn;
	private $boats = array();

	public function __construct($member = null, $mBoats = null){
		if($member !== null){
		$this->membershipNo = $member['id'];
		$this->name = $member['name'];
		$this->pn = $member['pn'];
		}
		if($mBoats !== null){
			foreach ($mBoats as $boat){
				$this->boats[] = new Boat($boat);
			}
		}
	}

	public function AddMember($db, $entry) {
		$db->ExecuteQuery('INSERT INTO MemberRegister (name, pn) VALUES (?, ?);', $entry);
	}

	public function DeleteMember($db, $entry) {
		$db->ExecuteQuery('DELETE FROM MemberRegister WHERE id=(?);', $entry);
	}

	public function EditMember($db, $entry) {
		$db->ExecuteQuery('UPDATE MemberRegister SET name=(?), pn=(?)  WHERE id=(?);', $entry);
	}

	public function ReadBoats() {
		$boatData;
		$i = 0;
		if(count($this->boats) > 0){
			foreach ($this->boats as $boat){
				$boatData[$i] = $boat->ReadBoat();
				$i++;
			}
			return $boatData;
		}
	}

	public function ReadMember(){
		//$data = array();
		$data['id'] = $this->membershipNo;
		$data['name'] = $this->name;
		$data['pn'] = $this->pn;
		$data['noOfBoats'] = count($this->boats);
		return $data;
	}


}