<h1>Dice Game</h1>
<p>Welcome to the Dice Game in PHP</p>

<form action="<?=$form_action?>" method='post'>
  <p>
    <input type='submit' name='doAdd$$$$' value='Roll 1' />
    <input type='submit' name='doClear$$$$' value='Roll 2' />
    <input type='submit' name='doQuit' value='Quit' />
  </p>
</form>

<h1>Roll History</h1>
<table>
  <caption><em>Show Roll History.</em></caption>
  <tr>
	<th>ID:</th>
    <th>Die 1:</th>
    <th>Die 2:</th>
    <th>Date:</th>
  </tr>

  <!--populate a table with the content of the database columns-->
  <?php foreach($entries as $val): ?>

  <tr>
	<td><?php echo $val; ?></td>
  </tr>

  <?php endforeach; ?>
</table>
