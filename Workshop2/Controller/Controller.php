<?php
require_once '/../Model/Register.php';

class Controller{
	private $register;
	private $data = array();
	
	public function __construct(){
		$this->register = new Register();
	}

	/**
	 * 
	 */
	public function Event(){
		$rc = new ReflectionClass($this->register);
		foreach ($_POST as $key => $value){
			$arguments[$key] = $value;
			if($rc->hasMethod($key)) {
				//array_pop($arguments);
				$argument = array($arguments);
				//$controllerObj = $rc->newInstance();
				$methodObj = $rc->getMethod($key);
				$this->data = $methodObj->invokeArgs($this->register, $argument);
			}
		}
	}
	
	/**
	 * Rendering the web page
	 */
	Public function View(){		
		if ($this->data != null){
		extract($this->data);
		}
		
		$members = $this->register->ReadMembers();
		$list ="";
		$checked = "unchecked";
		$checked1 = "unchecked";
		if (isset($_POST['ViewMember']) || isset($_POST['AddNewMember'])){
			require_once '/../View/MemberDetails.php';
			exit();
		} else if (isset($_POST['listTypes']) && $_POST['listTypes'] === "CompleteList"){
			//TODO: the view will change back to compactList unless we use session or database to remember preference. (login database table maybe)
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