<?php 
	$id = $_GET['id'];
	$sql = "SELECT * FROM type_visa WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	$row = mysqli_fetch_assoc($result);
	$quoc_gia_id = $row['quoc_gia_id'];
	$category_id = $row['category_id'];

	$sql = "DELETE FROM type_visa WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	// header('location: index.php?page=type-visa&quoc_gia_id='.$quoc_gia_id.'&category_id='.$category_id);
	header('location: index.php?page=type-visa&category_id='.$category_id);
?>