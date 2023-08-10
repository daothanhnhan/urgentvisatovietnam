<?php 
	$id = $_GET['id'];
	$sql = "SELECT * FROM content_service WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	$row = mysqli_fetch_assoc($result);
	$service_id = $row['service_id'];

	$sql = "DELETE FROM content_service WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	header('location: index.php?page=content-service&service_id='.$service_id);
?>