<?php
require_once 'Controller/Controller.php';
require_once 'Model/Register.php';
require_once 'View/View.php';
require_once 'View/LoginForm.php';
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
$view = new View($controller->Event($model, "ReadMembers"));
$view->RenderView();


//TODO:	add communcation diagrams 
//TODO: add class diagram 
//TODO: add link to github 
//TODO: put it on the bth server
//TODO: search - use a design pattern ; show what needs to change in order to add a new search criterion (you don't have to implement)
//TODO: search - use a design pattern for describing multiple search criterions
//TODO: data validation - messages to the user