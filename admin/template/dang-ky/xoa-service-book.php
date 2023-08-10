<?php 
	$id = $_GET['id'];
	$sql = "DELETE FROM service_book WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	header('location: index.php?page=service-book');
?>