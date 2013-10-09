<?php
require_once('/../DatabaseHandler.php');
require_once 'Member.php';

class Register{
	private $members = array();
	private $db;
	//private $dbPath;

	public function __construct(){
		// Create a database object.
		$this->db = new DatabaseHandler('sqlite:W1.sqlite');
		$this->Init();
	}

	public function Init() {
		$this->db->ExecuteQuery("CREATE TABLE IF NOT EXISTS MemberRegister (id INTEGER PRIMARY KEY AUTOINCREMENT, name string, pn string, created DATETIME default (datetime('now')));");
		$this->db->ExecuteQuery("CREATE TABLE IF NOT EXISTS BoatRegister (id INTEGER PRIMARY KEY AUTOINCREMENT, mId INTEGER, type string, length float, created DATETIME default (datetime('now')));");
		$members = $this->ReadAllMembers();
		$boats = $this->ReadAllBoats();
		foreach ($members as $member){
			$mBoats = null;
			foreach ($boats as $boat){
				$mBoats = array();
				if ($boat['mId'] === $member['id']) {
					$mBoats[] = $boat;
				}
			}
			$this->members[] = new Member($member, $mBoats);
		}
	}
	
	public function ReadMembers(){
		$allMembers = array();
		foreach($this->members as $member){
			$allMembers[] = $member->ReadMember();
		}
		return $allMembers;
	}

	public function ReadMember($entry) {
		foreach ($this->members as $memberObj){
			$member = $memberObj->ReadMember();
			if ($member['id'] === $entry[0]){
				return $member;
			}
		}
		//return $this->db->ExecuteSelectQueryAndFetchAll('SELECT * FROM MemberRegister WHERE id=(?);', $entry);
	}

	public function ReadBoats($entry) {
		foreach ($this->members as $memberObj){
			$member = $memberObj->ReadMember();
			if ($member['id'] === $entry[0]){
				return $memberObj->ReadBoats();
			}
		}
		//return $this->db->ExecuteSelectQueryAndFetchAll('SELECT * FROM BoatRegister WHERE mId=(?);', $entry);
	}

	/**
	 * We made the add, delete and edit methods static since there is no point in setting the data to the objects 
	 * since they are deleted and recreated from the database at every page load. 
	 * @param unknown $entry
	 */
	public function AddMember($entry) {
		Member::AddMember($this->db, $entry);
	}
	
	public function DeleteMember($entry) {
		Member::DeleteMember($this->db, $entry);
	}
	
	public function EditMember($entry) {
		Member::EditMember($this->db, $entry);
	}
	
	public function AddBoat($entry) {
		Boat::AddBoat($this->db, $entry);
	}

	public function EditBoat($entry) {
		Boat::EditBoat($this->db,$entry);
	}

	public function DeleteBoat($entry) {
		Boat::DeleteBoat($this->db,$entry);
	}

	/**
	 * used to initiate member objects at each page load
	 */
	private function ReadAllMembers() {
		return $this->db->ExecuteSelectQueryAndFetchAll('SELECT * FROM MemberRegister ORDER BY id DESC;');
	}
	
	/**
	 * used to initiate boat objects at each page load
	 */
	private function ReadAllBoats() {
		return $this->db->ExecuteSelectQueryAndFetchAll('SELECT * FROM BoatRegister ORDER BY id DESC;');
	}
}