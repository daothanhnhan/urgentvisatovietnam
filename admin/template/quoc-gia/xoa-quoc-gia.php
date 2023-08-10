<?php 
	$id = $_GET['id'];
	$sql = "DELETE FROM quoc_gia WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	header('location: index.php?page=quoc-gia');
?>