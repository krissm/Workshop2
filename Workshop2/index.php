<?php
require_once 'Controller/MembershipController.php';

$membershipController = new MembershipController();

$entries = $membershipController->ReadAllMembers();

require_once 'View/CompleteList.php';