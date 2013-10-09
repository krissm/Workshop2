<?php
require_once '/../Model/Register.php';

class Controller{
	private $register;
	
	public function __construct(){
		$this->register = new Register();
	}

// 	public function __destruct(){
// 		$this->register->SaveAll();
// 	}

	/**
	 * 
	 */
	public function Event(){
		$rc = new ReflectionClass($this->register);
		foreach ($_POST as $key => $value){
			$arguments[$key] = $value;
			if($rc->hasMethod($key)) {
				array_pop($arguments);
				$argument = array($arguments);
				//$controllerObj = $rc->newInstance();
				$methodObj = $rc->getMethod($key);
				$methodObj->invokeArgs($this->register, $argument);
			}
		}
		
		if (isset($_POST['AddNewMember'])){
			require_once '/../View/MemberDetails.php';
			exit();
		}

// 		if (isset($_POST['AddMember'])){
// 			$entry[] = strip_tags($_POST['name']);
// 			$entry[] = strip_tags($_POST['pn']);
// 			$this->register->AddMember($entry);
// 		}

		if (isset($_POST['DeleteMember'])){
			$entry = array($_POST['id']);
			$this->register->DeleteMember($entry);
		}

		if (isset($_POST['ViewMember'])){
			$entry = array($_POST['id']);
			$memberDetails = $this->register->ReadMember($entry);
			$boatDetails = $this->register->ReadBoats($entry);
			require_once '/../View/MemberDetails.php';
			exit();
		}

		if (isset($_POST['EditMember'])){
			$entry[] = strip_tags($_POST['name']);
			$entry[] = strip_tags($_POST['pn']);
			$entry[] = strip_tags($_POST['id']);
			$this->register->EditMember($entry);

			for ($i=0; isset($_POST['type'. $i]) ; $i++){
				$entr = null;
				$entr[] = strip_tags($_POST['type'. $i]);
				$entr[] = strip_tags($_POST['length'. $i]);
				$entr[] = strip_tags($_POST['id'. $i]);
				$this->register->EditBoat($entr);
			}

			if (isset($_POST['type']) && !empty($_POST['type'])){
				$ent[] = strip_tags($_POST['id']);
				$ent[] = strip_tags($_POST['type']);
				$ent[] = strip_tags($_POST['length']);
				$this->register->AddBoat($ent);
			}
		}

		if (isset($_POST['DeleteBoat'])){
			$boatnr = (int) $_POST['DeleteBoat'];
			$entry = array($_POST['id' . $boatnr]);
			$this->register->DeleteBoat($entry);
		}

		$list ="";
		$checked = "unchecked";
		$checked1 = "unchecked";
		if (isset($_POST['listTypes']) && $_POST['listTypes'] === "CompleteList"){
			require_once '/../View/CompleteList.php';
			$list = $CompleteList;
			$checked1 = "checked";
		} else {
			require_once '/../View/CompactList.php';
			$list = $CompactList;
			$checked = "checked";
		}
		require_once '/../View/View.php';

	}
}