<?php
//require_once '/../Model/Register.php';

class Controller{
	protected $eventOutputData = array();
	protected $inputData = array();
	protected $modelX; 
	

	/**
	 * 
	 * @param object $modelX
	 * @param method name you want to execute incase there is no events e.g. at startup  $onNoEvent
	 * @return value of the method you execute
	 */
	public function Event($modelX, $onNoEvent = null){
		$this->modelX = $modelX;
		$noEvent = true;
		$rc = new ReflectionClass($modelX);
		foreach ($_POST as $key => $value){
			$this->inputData[0][$key] = $value;
			if($rc->hasMethod($key)) {
				$noEvent = false;
				$methodObj = $rc->getMethod($key);
				$this->eventOutputData = $methodObj->invokeArgs($modelX, $this->inputData);
			}
		}
		if ($noEvent && $rc->hasMethod($onNoEvent)){
			$methodObj = $rc->getMethod($onNoEvent);
			$this->eventOutputData = $methodObj->invokeArgs($modelX, $this->inputData);
		}
		return $this->eventOutputData;
	}
	
// 	/**
// 	 * Rendering the web page
// 	 */
// 	Public function View($view = null){		
		
// 		if ($this->eventOutputData != null){
// 			extract($this->eventOutputData);
// 		}
		
		
// 		$list ="";
// 		$checked = "unchecked";
// 		$checked1 = "unchecked";
// 		if (isset($_POST['ViewMember']) || isset($_POST['AddNewMember'])){
// 			require_once '/../View/MemberDetails.php';
// 			exit();
// 		} else if (isset($_POST['listTypes']) && $_POST['listTypes'] === "CompleteList"){
// 			//TODO: the view will change back to compactList unless we use session or database to remember preference. (login database table maybe)
// 			require_once '/../View/CompleteList.php';
// 			$list = $CompleteList;
// 			$checked1 = "checked";
// 		} else {
// 			require_once '/../View/CompactList.php';
// 			$list = $CompactList;
// 			$checked = "checked";
// 		}
// 		require_once '/../View/View.php';
// 	}
}