<?php
class loginModel{
	private $db;

	public function __construct(){
		$this->db = new DatabaseHandler('sqlite:W1.sqlite');
		$this->InitDBTable();
	}

	private function InitDBTable() {
		$this->db->ExecuteQuery("CREATE TABLE IF NOT EXISTS UserCredentials (id INTEGER PRIMARY KEY AUTOINCREMENT, username string, password string, created DATETIME default (datetime('now')));");
	}
	
	public function doLogin($entry){
		$parameters = array($entry['account'], $entry['password']);
		$success = $this->db->ExecuteSelectQueryAndFetchAll('SELECT * FROM UserCredentials WHERE username=(?) AND password=(?) ORDER BY id DESC;', $parameters);
		if ($success !== null && count($success) === 1){
			return true;
		} else {
			return false;
		}
	}
}