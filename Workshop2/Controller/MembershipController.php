<?php
require_once '../Model/Register.php';

class MembershipController{
	private $membershipRegister;
	
	public function __construct(){
		$membershipRegister = new Register();
	}
	
	public function AddMember($entry) {
		$this->membershipRegister->AddMember($entry); 
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
}