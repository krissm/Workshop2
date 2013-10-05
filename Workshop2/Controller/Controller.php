<?php
require_once '/../Model/Register.php';
require_once '/../View/ViewHelper';

class Controller{
	private $register;

	public function __construct(){
		$this->register = new Register();
	}

	public function Event(){
		if (isset($_POST['AddNewMember'])){
			require_once 'View/MemberDetails.php';
			exit();
		}

		if (isset($_POST['AddMember'])){
			$entry = array($_POST['name'], $_POST['pn']);
			$this->register->AddMember($entry);
		}
		
		if (isset($_POST['DeleteMember'])){
			$entry = array($_POST['id']);
			$this->register->DeleteMember($entry);
		}
		
		if (isset($_POST['EditMember'])){
			$entry = array($_POST['id']);
			$this->register->EditMember($entry);
			
		}
		
		if (isset($_POST['ReadMember'])){
			$entry = array($_POST['id']);
			$memberDetails = $this->register->ReadMember($entry);
			//TODO: connect $memberDetails to some kind of view
			require_once '/../View/MemberDetails.php';
			exit();
		}

		$entries = $this->register->ReadAllMembers();

		require_once 'View/CompleteList.php';

	}
	
}