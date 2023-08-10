<?php 
	$id = $_GET['id'];
	$sql = "SELECT * FROM arrival_port_group WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	$row = mysqli_fetch_assoc($result);
	$category_id = $row['category_id'];

	$sql = "DELETE FROM arrival_port_group WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	header('location: index.php?page=arrival-port-group&category_id='.$category_id);
?>