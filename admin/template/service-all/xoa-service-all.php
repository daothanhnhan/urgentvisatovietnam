<?php 
	$id = $_GET['id'];
	$sql = "SELECT * FROM service_all WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	$row = mysqli_fetch_assoc($result);
	$parent_id = $row['parent_id'];

	$sql = "DELETE FROM service_all WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	header('location: index.php?page=service-all&parent_id='.$parent_id);
?>