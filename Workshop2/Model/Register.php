<?php
require_once('/../DatabaseHandler.php');
require_once 'Member.php';

class Register{
	private $members = array();
	private $db;

	public function __construct(){
		$this->db = new DatabaseHandler('sqlite:W1.sqlite');
		$this->InitDBTables();
		$this->InitMemberObjects();
	}

	private function InitDBTables() {
		$this->db->ExecuteQuery("CREATE TABLE IF NOT EXISTS MemberRegister (id INTEGER PRIMARY KEY AUTOINCREMENT, name string, pn string, created DATETIME default (datetime('now')));");
		$this->db->ExecuteQuery("CREATE TABLE IF NOT EXISTS BoatRegister (id INTEGER PRIMARY KEY AUTOINCREMENT, mId INTEGER, type string, length float, created DATETIME default (datetime('now')));");
	}
	
	private function InitMemberObjects(){
		$members = $this->db->ExecuteSelectQueryAndFetchAll('SELECT * FROM MemberRegister ORDER BY id DESC;');
		$boats = $this->db->ExecuteSelectQueryAndFetchAll('SELECT * FROM BoatRegister ORDER BY id DESC;');
		foreach ($members as $member){
			$membersBoats = array();
			foreach ($boats as $boat){
				if ($boat['mId'] === $member['id']) {
					$membersBoats[] = $boat;
				}
			}
			$this->members[] = new Member($member, $membersBoats);
		}
	}
	/**
	 * 
	 * @return array of Member's Data
	 */
	public function ReadMembers(){
		$allMembers = array();
		foreach($this->members as $member){
			$allMembers['members'][] = $member->ReadMember();
		}
		return $allMembers;
	}

	public function ViewMember($entry){
		return $data = array("memberDetails" => $this->ReadMember($entry)); 
	}
	
	private function ReadMember($entry) {
		foreach ($this->members as $memberObj){
			$member = $memberObj->ReadMember();
			if ($member['id'] === $entry['id']){
				return $member;
			}
		}
	}

	public function AddMember($entry) {
		$this->members[] = Member::AddMember($this->db, $entry);
		return $this->ReadMembers();
	}
		
	public function DeleteMember($entry) {
		$count = count($this->members);
		for ($i = 0; $i < $count; $i++){
			if ($this->members[$i]->GetMembershipNo() === $entry['id']) {
				$this->members[$i]->DeleteMember($this->db, $entry);
				unset($this->members[$i]);
			}
		}
		return $this->ReadMembers();
	}
	
	public function EditMember($entry) {
		$count = count($this->members);
		for ($i = 0; $i < $count; $i++){
			if ($this->members[$i]->GetMembershipNo() === $entry['id']) {
				$this->members[$i]->EditMember($this->db, $entry);
			}
		}
		return $this->ReadMembers();
	}
	
	public function DeleteBoat($entry) {
		$count = count($this->members);
		for ($i = 0; $i < $count; $i++){
			if ($this->members[$i]->GetMembershipNo() === $entry['id']) {
				$this->members[$i]->DeleteBoat($this->db, $entry);
			}
		}
		return $this->ReadMembers();
	}

}