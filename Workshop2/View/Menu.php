<?php 
$disabled = isset($_SESSION['authenticated']) ? "" : "disabled";

function userLoginMenu() {
	// array with all menu items
	$menu = array(
		"login"   => "index.php?p=login",
		"logout"  => "index.php?p=logout",
	);

	// check if user is logged in or not, alter the menu depending on the result
	if(isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
		unset($menu['login']);
	} else {
		unset($menu['logout']);
	}

	$html = "<nav class='login'>";
	foreach($menu as $key=>$val) {
		$html .= "<a href='$val'>$key</a> ";
	}
	$html .= "</nav>";
	return $html;
}
?>

<h2>Members</h2>
<!-- login & logout menu -->
<?php echo userLoginMenu(); ?>
<form method="post">
<input <?php echo $disabled; ?> type="submit" name="AddNewMember" value="AddNewMember">
<input type="radio" name="listTypes" value="CompactList" onclick="this.form.submit();" <?php echo $checked; ?>> Compact View
<input type="radio" name="listTypes" value="CompleteList" onclick="this.form.submit();" <?php echo $checked1; ?>>Complete View<br>
</form>

<?php 

echo $list;

?>