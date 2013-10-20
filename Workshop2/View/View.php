<?php
class View{
	private $data;
	
	public function __construct($data){
		$this->data = $data;
	}
	
	public function RenderView(){
		if ($this->data != null){
			extract($this->data);
		}
				
		$list ="";
		$checked = "unchecked";
		$checked1 = "unchecked";
		if (isset($_POST['ViewMember']) || isset($_POST['AddNewMember'])){
			require_once 'MemberDetails.php';
			exit();
		} else if (isset($_POST['listTypes']) && $_POST['listTypes'] === "CompleteList"){
			//TODO: the view will change back to compactList unless we use session or database to remember preference. (login database table maybe)
			require_once 'CompleteList.php';
			$list = $CompleteList;
			$checked1 = "checked";
		} else {
			require_once 'CompactList.php';
			$list = $CompactList;
			$checked = "checked";
		}						
		require_once 'Menu.php';
	}
}