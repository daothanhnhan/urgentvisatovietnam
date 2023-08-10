<?php 
	$id = $_GET['id'];
	$sql = "DELETE FROM about_us WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	header('location: index.php?page=about-us');
?>