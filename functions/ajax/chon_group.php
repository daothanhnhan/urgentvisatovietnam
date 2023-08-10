<?php 
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$action = new action();

	$id = $_GET['id'];

	$list_port_arrival = $action->getList('arrival_port', 'arrival_port_group_id', $id, 'id', 'asc', '', '', '');
	echo '<option value="0">Please select</option>';
	foreach ($list_port_arrival as $item) { 
?>
<option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
<?php } ?>