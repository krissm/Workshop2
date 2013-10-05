<?php

$rows = "";

foreach($entries as $val){
	$rows .=

	"<tr>
	 <td> {$val['id']}   </td>
	 <td> {$val['name']} </td>
	 <td> {$val['pn']}   </td>
	 <td> {$val['created']}   </td>
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
<th>Member Since:</th>
<th></th>
</tr>
{$rows}
</table>
EOD;

//populate a table with the content of the database columns-->


?>