<?php

$disabled = isset($_SESSION['authenticated']) ? "" : "disabled";

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
 			<input $disabled type='submit' name='ViewMember' value='View/Edit'/>
 			<input $disabled type='submit' name='DeleteMember' value='Delete'/>
 		</form>
  	</td>
	</tr>";
}

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
