<?php 
	include_once dirname(__FILE__) . "/../database.php";

	$note = $_GET['note'];//echo $note;
	$name = $_GET['name'];//echo $name;

	$note = str_replace("^", "+", $note);
	$name = str_replace("^", "+", $name);

	$note = str_replace("@", "&", $note);
	$name = str_replace("@", "&", $name);

	$note = mysqli_real_escape_string($conn_vn, $note);
	$name = mysqli_real_escape_string($conn_vn, $name);

	$sql = "INSERT INTO nation (note, name) VALUES ('$note', '$name')";
	// echo $sql;
	// $result = mysqli_query($conn_vn, $sql);
