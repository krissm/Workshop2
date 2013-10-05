<?php
require_once('/../DatabaseHandler.php');
require_once 'Member.php';

class Register{
	private $members;
	private $db;
	private $dbPath;

	public function __construct(){
		// Create a database object.
		$this->db = new DatabaseHandler('sqlite:W1.sqlite');
		$this->Init();
	}

	public function Init() {
		$this->db->ExecuteQuery("CREATE TABLE IF NOT EXISTS MemberRegister (id INTEGER PRIMARY KEY AUTOINCREMENT, name string, pn string, created DATETIME default (datetime('now')));");
		$this->db->ExecuteQuery("CREATE TABLE IF NOT EXISTS BoatRegister (id INTEGER PRIMARY KEY AUTOINCREMENT, mId, type string, length float, created DATETIME default (datetime('now')));");
	}

	public function AddMember($entry) {
		$this->db->ExecuteQuery('INSERT INTO MemberRegister (name, pn) VALUES (?), (?);', array($entry));
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
	
	public function AddBoat($entry) {
		$this->db->ExecuteQuery('INSERT INTO BoatRegister (mId, type, length) VALUES (?), (?), (?);', array($entry));
	}
	
	public function DeleteBoat($entry) {
		$this->db->ExecuteQuery('DELETE FROM BoatRegister WHERE id=(?);', $entry);
	}

	public function ReadAllMembers() {
		return $this->db->ExecuteSelectQueryAndFetchAll('SELECT * FROM MemberRegister ORDER BY id DESC;');
	}
	
	
	
	
}