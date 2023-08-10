<?php 
	$id = $_GET['id'];

	$person = $action->getList('persion_visa', 'evisa_book_id', $_GET['id'], 'id', 'asc', '', '', '');
	foreach ($person as $item) {
		$link1 = dirname(__FILE__) .'/../../../images/evisa/'.$item['passport'];//echo $link1;
		unlink($link1);
		$link2 = dirname(__FILE__) .'/../../../images/evisa/'.$item['portrait'];
		unlink($link2);
	}
	$sql = "DELETE FROM evisa_book WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	header('location: index.php?page=book-visa');
?>