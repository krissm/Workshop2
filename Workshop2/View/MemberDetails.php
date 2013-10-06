<form method="post">
	<fieldset>
		<legend>Membership</legend>
	
		<label for="id">ID</label>
		<input type="text" name="id" value="<?php echo $memberDetails['0']['id']; ?>"><br>
	
		<label for="name">Name</label>
		<input type="text" name="name" value="<?php echo $memberDetails['0']['name']; ?>"><br>
	
		<label for="pn">Personal No.</label>
		<input type="text" name="pn" value="<?php echo $memberDetails['0']['pn']; ?>"><br>
		
		<?php if (isset($_POST['AddNewMember'])): ?>
		<input type="submit" name="AddMember" value="Add Member">
		<?php endif;?>
		<?php if (isset($_POST['ViewMember'])): ?>
		<input type="submit" name="EditMember" value="Edit Member">
		<?php endif;?>
	</fieldset>
</form>
