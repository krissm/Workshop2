<?php
require_once('/../DatabaseHandler.php');

class Register{
	private $db;
	private $dbPath;

	public function __construct(){
		// Create a database object.
		$this->db = new DatabaseHandler('sqlite:W1.sqlite');
		$this->Init();
	}

	public function Init() {
		$this->db->ExecuteQuery("CREATE TABLE IF NOT EXISTS MemberRegister (id INTEGER PRIMARY KEY AUTOINCREMENT, name string, pn string, created DATETIME default (datetime('now')));");
		$this->db->ExecuteQuery("CREATE TABLE IF NOT EXISTS BoatRegister (id INTEGER PRIMARY KEY AUTOINCREMENT, name string, pn string, created DATETIME default (datetime('now')));");
	}

	public function AddMember($entry) {
		$this->db->ExecuteQuery('INSERT INTO MemberRegister (name, pn) VALUES (?);', array($entry));
	}

	public function DeleteMember($entry) {
		$this->db->ExecuteQuery('DELETE FROM MemberRegister WHERE id=(?);', $entry);
	}

	public function ReadAllMembers() {
		return $this->db->ExecuteSelectQueryAndFetchAll('SELECT * FROM MemberRegister ORDER BY id DESC;');
	}
	
	public function ReadMember($entry) {
		return $this->db->ExecuteSelectQueryAndFetchAll('SELECT * FROM MemberRegister WHERE id=(?);', $entry);
	}
	
	public function EditMember($entry) {
		$this->db->ExecuteQuery('UPDATE MemberRegister SET ............WHERE id=(?);', $entry);
	}
}