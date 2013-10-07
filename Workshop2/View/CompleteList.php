<?php

$rows = "";

foreach($members as $val){
	$rows .=

	"<tr>
	 <td> {$val['id']}   </td>
	 <td> {$val['name']} </td>
	 <td> {$val['pn']}   </td>
	 <td> 
	 <ol>";
	
	 foreach($boats as $boat){
		 if($boat['mId'] === $val['id']){
			 $rows .= "<li>Type: {$boat['type']}&nbsp;&nbsp;&nbsp;
			 Length:{$boat['length']}</li>";
		 }
	 }
	 
	 $rows .= "</ol>
     </td>
	 <td>
 		<form method='post'>
 			<input name='id' hidden value='{$val['id']}'/>
 			<input type='submit' name='ViewMember' value='View/Edit'/>
 			<input type='submit' name='DeleteMember' value='Delete'/>
 		</form>
  	</td>
	<tr>";
}


$CompleteList = <<<EOD

<table>
<caption><em>Show All Members</em></caption>
<tr>
<th>ID:</th>
<th>Name:</th>
<th>Personal Number:</th>
<th>Boat:</th>
<th></th>
</tr>
{$rows}
</table>
EOD;
