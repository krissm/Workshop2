<?php
//populate a table with the content of the database columns-->
foreach($entries as $val):

$rows = <<<EOD
  "<tr>
	<td>{$val}</td>
	<td>
		<form>
			<input type='submit' name='ViewMember' value='View/Edit'/>
			<input type='submit' name='DeleteMember' value='Delete'/>
		</form>
	</td>
  </tr>"
EOD;
endforeach;

$CompleteList = <<<EOD

<table>
<caption><em>Show All Members</em></caption>
<tr>
<th>ID:</th>
<th>Name:</th>
<th>Personal Number:</th>
<th>Number of Boats:</th>
<th>Actions:</th>
</tr>
{$rows}
</table>
EOD;





?>

<h2>Members</h2>

<form action="">
<input type="radio" name="listTypes" value="CompactList" checked> Compact View
<input type="radio" name="listTypes" value="CompleteList">Complete View<br>
</form>
<?php echo $CompleteList?>