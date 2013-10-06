<?php
require_once '/../Model/Register.php';
//require_once '/../View/ViewHelper';

class Controller{
	private $register;

	public function __construct(){
		$this->register = new Register();
	}

	public function Event(){
		if (isset($_POST['AddNewMember'])){
			require_once '/../View/MemberDetails.php';
			exit();
		}

		if (isset($_POST['AddMember'])){
			$entry[] = strip_tags($_POST['name']);
			$entry[] = strip_tags($_POST['pn']);
			$this->register->AddMember($entry);
		}
		
		if (isset($_POST['DeleteMember'])){
			$entry = array($_POST['id']);
			$this->register->DeleteMember($entry);
		}
		
		if (isset($_POST['ViewMember'])){
			$entry = array($_POST['id']);
			$memberDetails = $this->register->ReadMember($entry);
			//TODO: connect $memberDetails to some kind of view
			require_once '/../View/MemberDetails.php';
			exit();
		}
		
		if (isset($_POST['EditMember'])){
			$entry[] = strip_tags($_POST['name']);
			$entry[] = strip_tags($_POST['pn']);
			$entry[] = strip_tags($_POST['id']);
			$this->register->EditMember($entry);
			//TODO: a for loop which loops until there are no more boats. use an increment variable after each post
// 			if (isset($_POST['type'])){
// 				$entry[] = strip_tags($_POST['id']);
// 				$entry[] = strip_tags($_POST['type']);
// 				$entry[] = strip_tags($_POST['length']);
// 				$this->register->AddBoat($entry);
// 			}	
		}
		
		if (isset($_POST['AddNewBoat'])){
			require_once 'View/BoatForm.php';
			exit();
		}
		
		if (isset($_POST['AddBoat'])){
			$entry[] = strip_tags($_POST['id']);
			$entry[] = strip_tags($_POST['type']);
			$entry[] = strip_tags($_POST['length']);
			$this->register->AddBoat($entry);
		}
		

		$entries = $this->register->ReadAllMembers();
		
		require_once '/../View/CompleteList.php';
		require_once '/../View/CompactList.php';
		$list ='';
		
		
		if (isset($_POST['listType']) && $_POST['listType'] === "CompactList"){
			$list = $CompactList;
		
		} elseif (isset($_POST['listType']) && $_POST['listType'] === "CompleteList"){
			$list = $CompleteList;
			
		}
		require_once '/../View/View.php';
		
	}
	
}