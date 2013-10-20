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
				<select name='type<?php echo $i; ?>'>
					<option value='sailboat' <?php if($boatDetails[$i]['type'] == 'sailboat'): ?> selected="selected"<?php endif; ?>>Sailboat</option>
					<option value='motorboat' <?php if($boatDetails[$i]['type'] == 'motorboat'): ?> selected="selected"<?php endif; ?>>Motorboat</option>
					<option value='kayak' <?php if($boatDetails[$i]['type'] == 'kayak'): ?> selected="selected"<?php endif; ?>>Kayak or Canoe</option>
					<option value='other' <?php if($boatDetails[$i]['type'] == 'other'): ?> selected="selected"<?php endif; ?>>Other</option>
				</select>
				
				<label for="length<?php echo $i; ?>">Length: </label>
				<input type="text" name="length<?php echo $i; ?>" value="<?php echo $boatDetails[$i]['length']; ?>"><br>
	
				<input type="submit" name="DeleteBoat" value="Delete Boat <?php echo $i + 1; ?>">
			<?php endfor; ?>

			<h2>New Boat</h2>
			<label for="type">Type: </label>
				<select name='type'>
				    <option value=-1>Select Boat Type</option>
					<option value='sailboat'>Sailboat</option>
					<option value='motorboat'>Motorboat</option>
					<option value='kayak'>Kayak or Canoe</option>
					<option value='other'>Other</option>
				
				</select>

			<label for="length">Length: </label>
			<input type="text" name="length" value=""><br>

			<input type="submit" name="EditMember" value="Save">
		<?php endif;?>
	</fieldset>
</form>