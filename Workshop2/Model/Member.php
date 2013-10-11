<?php
require_once 'Boat.php';

class Member{
	private $membershipNo;
	private $name;
	private $pn;
	private $boats = array();

	/**
	 * 
	 * @param an array with member data $member
	 * @param an array with a member's boats. Each boat contain an array with boat data $mBoats
	 */
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
	
	public function ReadMember(){
		$data['id'] = $this->membershipNo;
		$data['name'] = $this->name;
		$data['pn'] = $this->pn;
		$data['noOfBoats'] = count($this->boats);
		$data['boats'] = $this->ReadBoats();
		return $data;
	}

	/**
	 * 
	 * @return an array with a member's boats if there are any. 
	 */
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

	/**
	 * Static so that you can call the method before the object is initialized
	 * @param database handler $db
	 * @param parameters $entry
	 * @return a Member object
	 */
	public static function AddMember($db, $entry) {
		$parameters = array($entry['name'], $entry['pn']);
		$db->ExecuteQuery('INSERT INTO MemberRegister (name, pn) VALUES (?, ?);', $parameters);
		$member = $db->ExecuteSelectQueryAndFetchAll('SELECT * FROM MemberRegister WHERE name=(?) AND pn=(?);', $parameters);
		return new self($member[0]);
	}
	
	/**
	 * 
	 * @param database handler $db
	 * @param parameters $entry
	 */
	public function DeleteMember($db, $entry) {
		$parameters = array($entry['id']);
		$db->ExecuteQuery('DELETE FROM MemberRegister WHERE id=(?);', $parameters);
		$db->ExecuteQuery('DELETE FROM BoatRegister WHERE mId=(?);', $parameters);
	}
	
	public function EditMember($db, $entry) {
		$parameters = array($entry['name'], $entry['pn'], $entry['id']);
		$db->ExecuteQuery('UPDATE MemberRegister SET name=(?), pn=(?)  WHERE id=(?);', $parameters);
		$this->name = $entry['name'];
		$this->pn = $entry['pn'];
		
		for ($i=0; isset($entry['type'. $i]) ; $i++){
			$boatParameters = array('type' => $entry['type'. $i], 'length' => $entry['length'. $i], 'id' => $entry['id'. $i]);
			foreach ($this->boats as $boat){
				if ($boat->GetId() === $boatParameters['id']){
					$boat->EditBoat($db, $boatParameters);
				}
			}
		}
		
		if (isset($entry['type']) && !empty($entry['type'])){
			$parameters = array($entry['id'], $entry['type'], $entry['length']);
			$this->boats[] = Boat::AddBoat($db, $parameters);
		}
	}
	
	public function GetMembershipNo(){
		return $this->membershipNo;
	}
	
	public function DeleteBoat($db, $entry){		
		$boatnr = filter_var($entry['DeleteBoat'], FILTER_SANITIZE_NUMBER_INT);
		$boatId = array($entry['id' . ($boatnr - 1)]);
		$count = count($this->boats);
		for ($i = 0; $i < $count; $i++){
			if ($this->boats[$i]->GetId() === $boatId[0]){
				$this->boats[$i]->DeleteBoat($db, $boatId);
				unset($this->boats[$i]);
			}
		}
	}
	
}