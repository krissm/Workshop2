<?php
require_once '/../Model/Register.php';

class MembershipController{
	private $membershipRegister;
	
	public function __construct(){
		$this->membershipRegister = new Register();
	}
	
	public function Event(){
		if (isset($_POST['AddNewMember'])){
			require_once 'View/Member.php';
		}
		
		if (isset($_POST['AddMember'])){
			$entry = array($_POST['name'], $_POST['pn']);
			$this->membershipRegister->AddMember($entry);
		}
		
		$entries = $this->membershipRegister->ReadAllMembers();
		
		require_once 'View/CompleteList.php';
		
	}
	
	
	/*
	public function AddMember($entry) {
		$this->membershipRegister->AddMember($entry); 
	}
	
	public function AddBoat($entry) {
		$this->membershipRegister->AddBoat($entry);
	}
	
	public function DeleteMember($entry) {
		$this->membershipRegister->DeleteMember($entry);
	}
	
	public function ReadAllMembers() {
		return $this->membershipRegister->ReadAllMembers();
	}
	
	public function ReadMember($entry) {
		return $this->membershipRegister->ReadMember($entry);
	}
	
	public function EditMember($entry) {
		$this->membershipRegister->EditMember($entry);
	}
	*/
}