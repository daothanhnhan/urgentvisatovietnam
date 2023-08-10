<?php 
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$action = new action();

	$id = $_GET['id'];

	$processing_time = $action->getList('processing_time', 'type_visa_id', $id, 'sort', 'asc', '', '', '');
	echo '<option value="0">---Please select---</option>';
	foreach ($processing_time as $item) {
		if ($item['active'] == 0) {
			continue;
		}
?>
<option value="<?= $item['id'] ?>" data-price="<?= $item['price'] ?>"><?= $item['name'] ?></option>
<?php } ?>