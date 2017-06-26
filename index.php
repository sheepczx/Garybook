<?php
//start session
session_start();
//config.php
require_once('config.php');
//require classes
require ('classes/messages.php');
require_once('classes/bootstrap.php') ;
//include controller&model file
require('classes/controller.php');
require('classes/Model.php');

require('controllers/home.php');
require('controllers/shares.php');
require('controllers/users.php');

require('models/home.php');
require('models/share.php');
require('models/user.php');

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller){
	$controller->executeAction();
}