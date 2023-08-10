<?php 
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$action = new action();

	$id = $_GET['id'];

	$processing_time = $action->getDetail('processing_time', 'id', $id);

	$active = $processing_time['active'];

	if ($active == 0) {
		$sql = "UPDATE processing_time SET active = 1 WHERE id = $id";
	} else {
		$sql = "UPDATE processing_time SET active = 0 WHERE id = $id";
	}

	$result = mysqli_query($conn_vn, $sql);