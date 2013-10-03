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
		$this->db->ExecuteQuery('DELETE FROM MemberRegister WHERE id=(?);', $entry);
	}
	
	public function ReadAll() {
		return $this->db->ExecuteSelectQueryAndFetchAll('SELECT * FROM MemberRegister ORDER BY id DESC;');
	}
	
	public function ReadMember($entry) {
		return $this->db->ExecuteSelectQueryAndFetchAll('SELECT * FROM MemberRegister WHERE id=(?);', $entry);
	}
	
	public function EditMember($entry) {
		$this->db->ExecuteQuery('UPDATE MemberRegister SET ............WHERE id=(?);', $entry);
	}
}