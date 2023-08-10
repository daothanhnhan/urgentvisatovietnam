<?php 
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$action = new action();

	$id = $_GET['id'];

	$type_visa = $action->getDetail('type_visa', 'id', $id);

	$arr = array(
				'name' => $type_visa['name'],
				'price' => $type_visa['price']
	);
	echo json_encode($arr);