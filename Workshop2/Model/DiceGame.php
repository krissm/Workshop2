<?php
require_once 'Die.php';
require_once('/../DatabaseHandler.php');


class DiceGame{
	private $die1;
	private $die2;
	private $db;
	private $dbPath;
	//private $listGameObserver;

	public function __construct(){
		$this->die1 = new Di();
		$this->die2 = new Di();
		// Create a database object.
		$dbPath = dirname(__file__) . "Model/Data/W1.sqlite";
		$this->db = new DatabaseHandler('sqlite:$dbPath');
		$this->Init();
	}

	public function RegisterListener(){

	}

	public function PlayGame(){
		$this->die1->Roll();
		$roll = $this->die1->GetValue();
		$this->Add($roll);
		return $roll;
	}

	public function GetDieValue(){

	}

	public function Init() {
		$this->db->ExecuteQuery("CREATE TABLE IF NOT EXISTS RollHistory (id INTEGER PRIMARY KEY AUTOINCREMENT, die1 INTEGER, die2 INTEGER, created DATETIME default (datetime('now')));");
	}

	public function Add($entry) {
		$this->db->ExecuteQuery('INSERT INTO RollHistory (die1) VALUES (?);', array($entry));
	}

	public function DeleteAll() {
		$this->db->ExecuteQuery('DELETE FROM RollHistory;');
	}

	public function ReadAll() {
		return $this->db->ExecuteSelectQueryAndFetchAll('SELECT * FROM RollHistory ORDER BY id DESC;');
	}
}