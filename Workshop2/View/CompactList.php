<h1>Compact List</h1>

<form action="<?=$form_action?>" method='post'>
<p>
<input type='submit' name='CreateMember' value='Create Member' />
<input type='submit' name='EditMember' value='Edit Member' />
<input type='submit' name='DeleteMember' value='DeleteMember' />
</p>
</form>

<h1>Members</h1>
<table>
<caption><em>Show All Members</em></caption>
<tr>
<th>ID:</th>
<th>Name:</th>
<th>Personal Number:</th>
<th>Number of Boats:</th>
</tr>

<!--populate a table with the content of the database columns-->
  <?php foreach($entries as $val): ?>

  <tr>
	<td><?php echo $val; ?></td>
  </tr>

  <?php endforeach; ?>
</table>
