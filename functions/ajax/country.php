<?php 
	include_once dirname(__FILE__) . "/../database.php";

	$prefix = $_GET['prefix'];
	$name = $_GET['name'];

	$prefix = str_replace(" ", "+", $prefix);
	$name = str_replace(" ", "+", $name);

	$prefix = mysqli_real_escape_string($conn_vn, $prefix);
	$name = mysqli_real_escape_string($conn_vn, $name);

	$sql = "INSERT INTO countryPrefix (prefix, name) VALUES ('$prefix', '$name')";
	// echo $sql;
	// $result = mysqli_query($conn_vn, $sql);
