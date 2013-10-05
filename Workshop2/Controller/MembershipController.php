<?php
require_once '/../Model/Register.php';

class Controller{
	private $register;
	
	public function __construct(){
		$this->register = new Register();
	}
	
	public function Event(){
		if (isset($_POST['AddNewMember'])){
			require_once 'View/Member.php';
		}
		
		if (isset($_POST['AddMember'])){
			$entry = array($_POST['name'], $_POST['pn']);
			$this->register->AddMember($entry);
		}
		
		$entries = $this->register->ReadAllMembers();
		
		require_once 'View/CompactList.php';
		
	}
	
	
	/*
	public function AddMember($entry) {
		$this->register->AddMember($entry); 
	}
	
	public function AddBoat($entry) {
		$this->register->AddBoat($entry);
	}
	
	public function DeleteMember($entry) {
		$this->register->DeleteMember($entry);
	}
	
	public function ReadAllMembers() {
		return $this->register->ReadAllMembers();
	}
	
	public function ReadMember($entry) {
		return $this->register->ReadMember($entry);
	}
	
	public function EditMember($entry) {
		$this->register->EditMember($entry);
	}
	*/
}