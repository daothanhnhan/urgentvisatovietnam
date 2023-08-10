<?php 
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$action = new action();

	$id = $_GET['id'];

	$type_visa_des = $action->getDetail('type_visa', 'id', $id)['des'];

	echo "<p>$type_visa_des</p>";