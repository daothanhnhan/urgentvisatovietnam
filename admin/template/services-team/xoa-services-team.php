<?php 
	$id = $_GET['id'];
	$sql = "DELETE FROM services_team WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	header('location: index.php?page=services-team');
?>