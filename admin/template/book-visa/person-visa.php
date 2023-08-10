<a href="index.php?page=book-visa" title="" style="font-size: 30px;width: 100%;">Quay lại</a>
<?php 
	$person = $action->getList('persion_visa', 'evisa_book_id', $_GET['id'], 'id', 'asc', '', '', '');
	foreach ($person as $item) {
?>

<br>
<div class="row">
	<div class="col-md-6">
		<p>Passport</p>
		<img src="/images/evisa/<?= $item['passport'] ?>" alt="" style="width: 100%;">
	</div>
	<div class="col-md-6">
		<p>Portrait</p>
		<img src="/images/evisa/<?= $item['portrait'] ?>" alt="" style="width: 100%;">
	</div>
</div>
<?php } ?>