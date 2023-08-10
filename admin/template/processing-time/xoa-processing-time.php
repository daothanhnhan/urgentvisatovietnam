<?php 
	$id = $_GET['id'];
	$sql = "SELECT * FROM processing_time WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	$row = mysqli_fetch_assoc($result);
	$type_visa_id = $row['type_visa_id'];
	
	$sql = "DELETE FROM processing_time WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	header('location: index.php?page=processing-time&type_visa_id='.$type_visa_id);
?>