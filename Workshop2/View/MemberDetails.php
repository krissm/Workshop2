<form method="post">
	<fieldset>
		<legend>Membership</legend>

		<label for="id">ID</label>
		<input type="text" name="id" readonly value="<?php if (isset($memberDetails)): ?><?php echo $memberDetails['id']; ?><?php endif;?>"><br>

		<label for="name">Name</label>
		<input type="text" name="name" value="<?php if (isset($memberDetails)): ?><?php echo $memberDetails['name']; ?><?php endif;?>"><br>

		<label for="pn">Personal No.</label>
		<input type="text" name="pn" value="<?php if (isset($memberDetails)): ?><?php echo $memberDetails['pn']; ?><?php endif;?>"><br>

		<?php if (isset($_POST['AddNewMember'])): ?>
			<input type="submit" name="AddMember" value="Add Member">
		<?php endif;?>
		
		<?php if (isset($_POST['ViewMember'])): ?>
			<?php for ($i=0; isset($boatDetails[$i]) ; $i++): ?>
				<h2>Boat <?php echo $i + 1; ?></h2>
				<input type="text" style="display:none;" name="id<?php echo $i; ?>" value="<?php echo $boatDetails[$i]['id']; ?>"><br>
	
				<label for="type<?php echo $i; ?>">Type: </label>
				<input type="text" name="type<?php echo $i; ?>" value="<?php echo $boatDetails[$i]['type']; ?>"><br>
	
				<label for="length<?php echo $i; ?>">Length: </label>
				<input type="text" name="length<?php echo $i; ?>" value="<?php echo $boatDetails[$i]['length']; ?>"><br>
	
				<input type="submit" name="DeleteBoat" value="Delete Boat <?php echo $i + 1; ?>">
			<?php endfor; ?>

			<h2>New Boat</h2>
			<label for="type">Type: </label>
			<input type="text" name="type" value=""><br>

			<label for="length">Length: </label>
			<input type="text" name="length" value=""><br>

			<input type="submit" name="EditMember" value="Save">
		<?php endif;?>
	</fieldset>
</form>