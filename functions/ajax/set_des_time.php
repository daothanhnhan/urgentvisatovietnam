<?php 
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$action = new action();

	$id = $_GET['id'];

	$processing_time_des = $action->getDetail('processing_time', 'id', $id)['des'];

	echo "<p>$processing_time_des</p>";