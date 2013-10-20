<?php
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
}