<?php
class MemberList{
	
	public function ListMembers($listType){
		$this->Top();
		
		if ($listType === "CompleteList"){
			$this->CompleteList();
		} else {
			$this->CompactList();
		}
	}
	
	public function Top(){
		$top = <<<EOD
		<h2>Members</h2>
		<form method="post">
		<input type="submit" name="AddNewMember" value="AddNewMember">
		<input type="radio" name="listTypes" value="CompactList" onclick="this.form.submit();" <?php echo $checked; ?>> Compact View
		<input type="radio" name="listTypes" value="CompleteList" onclick="this.form.submit();" <?php echo $checked1; ?>>Complete View<br>
		</form>
EOD;
		
		return $top;
	}
	
	public function CompleteList(){
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