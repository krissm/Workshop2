<?php
class RenderView{
	private $data;
	
	public function __construct($data){
		$this->data = $data;
	}
	
	public function RenderView(){
		echo $this->Top();
		
		if (isset($_POST['ViewMember']) || isset($_POST['AddNewMember'])){
			if ($this->data != null){
				extract($this->data);
			}
			require_once 'MemberDetails.php';
			exit();
		} else if (isset($_POST['listTypes']) && $_POST['listTypes'] === "CompleteList"){
			//TODO: the view will change back to compactList unless we use session or database to remember preference. (login database table maybe)
			echo $this->CompleteList();
		} else {
			echo $this->CompactList();
		}
		
	}
	
	public function Top(){
		$top = <<<EOD
		<h2>Members</h2>
		<form method="post">
		<input type="submit" name="AddNewMember" value="AddNewMember">
		<input type="radio" name="listTypes" value="CompactList" onclick="this.form.submit();"> Compact View
		<input type="radio" name="listTypes" value="CompleteList" onclick="this.form.submit();">>Complete View<br>
		</form>
EOD;
		
		return $top;
	}
	
	public function CompleteList(){
		if ($this->data != null){
			extract($this->data);
		}
		
		$rows = "";
		foreach($members as $member){
			$rows .=
			"<tr>
			 <td> {$member['id']}</td>
			 <td> {$member['name']}</td>
			 <td> {$member['pn']}</td>
			 <td>
			 <ol>";
			 foreach($member['boats']  as $boat){
				 $rows .= "<li>Type: {$boat['type']}&nbsp;&nbsp;&nbsp;
				 Length:{$boat['length']}</li>";
			 }
			 
			 $rows .= "</ol>
		     </td>
			 <td>
		 		<form method='post'>
		 			<input name='id' hidden value='{$member['id']}'/>
		 			<input type='submit' name='ViewMember' value='View/Edit'/>
		 			<input type='submit' name='DeleteMember' value='Delete'/>
		 		</form>
		  	</td>
			</tr>";
		};

		$CompleteList = <<<EOD
		<table>
		<caption><em>Show All Members</em></caption>
		<tr>
		<th>ID:</th>
		<th>Name:</th>
		<th>Personal Number:</th>
		<th>Boats:</th>
		<th></th>
		</tr>
		{$rows}
		</table>
EOD;

		return $CompleteList;
	}
	
	public function CompactList(){
		if ($this->data != null){
			extract($this->data);
		}
		
		$rows = "";
		foreach($members as $member){
			$rows .=
			"<tr>
			<td> {$member['id']}</td>
			<td> {$member['name']}</td>
			<td> {$member['pn']}</td>
			<td> {$member['noOfBoats']}</td>
			<td>
			<form method='post'>
			<input name='id' hidden value='{$member['id']}'/>
					<input type='submit' name='ViewMember' value='View/Edit'/>
					<input type='submit' name='DeleteMember' value='Delete'/>
					</form>
					</td>
					</tr>";
		}
		
		$CompactList = <<<EOD
		<table>
		<caption><em>Show All Members</em></caption>
		<tr>
		<th>ID:</th>
		<th>Name:</th>
		<th>Personal Number:</th>
		<th>Boats:</th>
		<th></th>
		</tr>
		{$rows}
		</table>
EOD;
		return $CompactList;
	}
}