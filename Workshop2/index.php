<?php
require_once 'Controller/Controller.php';
require_once 'Model/Register.php';
require_once 'View/RenderView.php';
require_once 'View/Login.php';
require_once 'Model/Login.php';

session_start();

$controller = new Controller();

if (isset($_GET['p'])) {
	$loginModel = new loginModel();
	$loginView = new LoginForm($controller->Event($loginModel));
	$loginView->RenderLogin();
	exit();
}

$model = new Register();
$view = new RenderView($controller->Event($model, "ReadMembers"));
$view->RenderView();

//$controller->View();

//TODO: test for wrong input
//TODO: hide and read only id fields DONE
//TODO:	add communcation diagrams to the application (over different view as well)
//TODO: add class diagram to the application
//TODO: add link to github in the application to get access to the source code
//TODO: put it on the bht server
//TODO: type of boat enumerable?
//TODO: no code duplication
//TODO: login - user needs to be logged in to create, update, and delete information (members and boats). Anonymos users should still be able to view all info
//TODO: search - use a design pattern ; show what needs to change in order to add a new search criterion (you don't have to implement)
//TODO: search - use a design pattern for describing multiple search criterions
//TODO: data validation - messages to the user