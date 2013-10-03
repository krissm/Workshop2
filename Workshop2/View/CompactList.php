<h1>Compact List</h1>

<!--
<form action="<?=$form_action?>" method='post'>
<p>
<input type='submit' name='CreateMember' value='Create Member' />
<input type='submit' name='EditMember' value='Edit Member' />
<input type='submit' name='DeleteMember' value='DeleteMember' />
</p>
</form>
-->

<h1>Members</h1>
<table>
<caption><em>Show All Members</em></caption>
<tr>
<th>ID:</th>
<th>Name:</th>
<th>Date Created:</th>
</tr>

<!--populate a table with the content of the database columns-->
  <?php foreach($entries as $val): ?>

  <tr>
	<td><?php echo $val['id']; ?></td>
	<td><?php echo $val['name']; ?></td>
	<td><?php echo $val['pn']; ?></td>
	<td><?php echo $val['created']; ?></td>
  </tr>

  <?php endforeach; ?>
</table>
