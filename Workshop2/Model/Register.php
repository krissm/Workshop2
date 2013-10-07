<?php
require_once('/../DatabaseHandler.php');
require_once 'Member.php';

class Register{
	private $members = array();
	private $db;
	private $dbPath;

	public function __construct(){
		// Create a database object.
		$this->db = new DatabaseHandler('sqlite:W1.sqlite');
		$this->Init();
	}

	public function GetMembers(){
		return $this->members;
	}

	public function Init() {
		$this->db->ExecuteQuery("CREATE TABLE IF NOT EXISTS MemberRegister (id INTEGER PRIMARY KEY AUTOINCREMENT, name string, pn string, created DATETIME default (datetime('now')));");
		$this->db->ExecuteQuery("CREATE TABLE IF NOT EXISTS BoatRegister (id INTEGER PRIMARY KEY AUTOINCREMENT, mId INTEGER, type string, length float, created DATETIME default (datetime('now')));");
		$members = $this->ReadAllMembers();
		$boats = $this->ReadAllBoats();
		foreach ($members as $member){
			foreach ($boats as $boat){
				$mBoats = array();
				if ($boat['mId'] === $member['id']) {
					$mBoats[] = $boat;
				}
				$this->members[] = new Member($member, $mBoats);
			}
		}
	}

	public function AddMember($entry) {
		$this->db->ExecuteQuery('INSERT INTO MemberRegister (name, pn) VALUES (?, ?);', $entry);
	}

	public function DeleteMember($entry) {
		$this->db->ExecuteQuery('DELETE FROM MemberRegister WHERE id=(?);', $entry);
	}

	public function EditMember($entry) {
		$this->db->ExecuteQuery('UPDATE MemberRegister SET name=(?), pn=(?)  WHERE id=(?);', $entry);
	}

	public function ReadMember($entry) {
		return $this->db->ExecuteSelectQueryAndFetchAll('SELECT * FROM MemberRegister WHERE id=(?);', $entry);
	}

	public function ReadBoat($entry) {
		return $this->db->ExecuteSelectQueryAndFetchAll('SELECT * FROM BoatRegister WHERE mId=(?);', $entry);
	}

	public function AddBoat($entry) {
		$this->db->ExecuteQuery('INSERT INTO BoatRegister (mId, type, length) VALUES (?, ?, ?);', $entry);
	}

	public function EditBoat($entry) {
		$this->db->ExecuteQuery('UPDATE BoatRegister SET type=(?), length=(?)  WHERE id=(?);', $entry);
	}

	public function DeleteBoat($entry) {
		$this->db->ExecuteQuery('DELETE FROM BoatRegister WHERE id=(?);', $entry);
	}

	public function ReadAllMembers() {
		return $this->db->ExecuteSelectQueryAndFetchAll('SELECT * FROM MemberRegister ORDER BY id DESC;');
	}

	public function ReadAllBoats() {
		return $this->db->ExecuteSelectQueryAndFetchAll('SELECT * FROM BoatRegister ORDER BY id DESC;');
	}


}