<?php 
	$id = $_GET['id'];
	$sql = "SELECT * FROM faq_service WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	$row = mysqli_fetch_assoc($result);
	$service_id = $row['service_id'];

	$sql = "DELETE FROM faq_service WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	header('location: index.php?page=faq-service&service_id='.$service_id);
?>