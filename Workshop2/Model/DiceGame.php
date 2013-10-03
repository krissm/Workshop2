<?php
require_once 'Die.php';

class DiceGame{
	private $die1;
	private $die2;
	private $db;
	//private $listGameObserver;

	public function __construct(){
		$this->die1 = new Di();
		$this->die2 = new Di();
		// Create a database object.
		$this->db = new DatabaseHandler('sqlite: data/.ht.sqlite');

	}

	public function RegisterListener(){

	}

	public function PlayGame(){
		$this->die1->Roll();
		return $this->die1->GetValue();
	}

	public function GetDieValue(){

	}

	public function Init() {
		$this->db->ExecuteQuery("CREATE TABLE IF NOT EXISTS RollHistory (id INTEGER PRIMARY KEY, die1 INTEGER, die2 INTEGER, created DATETIME default (datetime('now')));");
	}

	public function Add($entry) {
		$this->db->ExecuteQuery('INSERT INTO RollHistory (entry) VALUES (?);', array($entry));
	}

	public function DeleteAll() {
		$this->db->ExecuteQuery('DELETE FROM RollHistory;');
	}

	public function ReadAll() {
		return $this->db->ExecuteSelectQueryAndFetchAll('SELECT * FROM RollHistory ORDER BY id DESC;');
	}
}