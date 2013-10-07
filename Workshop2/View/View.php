<h2>Members</h2>

<form method="post">
<input type="submit" name="AddNewMember" value="AddNewMember">
<input type="radio" name="listTypes" value="CompactList" onclick="this.form.submit();" <?php echo $checked; ?>> Compact View
<input type="radio" name="listTypes" value="CompleteList" onclick="this.form.submit();" <?php echo $checked1; ?>>Complete View<br>
</form>

<?php echo $list ?>
