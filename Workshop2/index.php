<?php
require_once 'Controller/MembershipController.php';

$membershipController = new MembershipController();

$membershipController->Event();


/*
if (isset($_POST['AddNewMember'])){
	require_once 'View/Member.php';
}

if (isset($_POST['AddMember'])){
	$membershipController->AddMember($_POST['name'], $_POST['pn']);
}
*/