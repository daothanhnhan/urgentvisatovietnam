<?php 
	$id = $_GET['id'];
	$sql = "DELETE FROM about_us_our_services WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	header('location: index.php?page=our-services');
?>