<?php 
	$id = $_GET['id'];
	$sql = "SELECT * FROM arrival_port WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	$row = mysqli_fetch_assoc($result);
	$arrival_port_group_id = $row['arrival_port_group_id'];

	$sql = "DELETE FROM arrival_port WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	header('location: index.php?page=arrival-port&arrival_port_group_id='.$arrival_port_group_id);
?>