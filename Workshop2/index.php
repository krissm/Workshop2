<?php
require_once 'Controller/Controller.php';

$controller = new Controller();

$controller->Event();

//TODO: add member and boat objects. connects boats to members through association rather than keys
//TODO: test for wrong input
//TODO:	add communcation diagrams to the application (over the two different view as well)
//TODO: add class diagram to the application
//TODO: add link to github in the application to get access to the source code
//TODO: put it on the bht server
//TODO: add no of boats to compact view
//TODO: type of boat enumerable?
//TODO: no code duplication
//TODO: login - user needs to be logged in to create, update, and delete information (members and boats). Anonymos users should still be able to view all info
//TODO: search - use a design pattern ; show what needs to change in order to add a new search criterion (you don't have to implement)
//TODO: search - use a design pattern for describing multiple search criterions
//TODO: data validation - messages to the user  