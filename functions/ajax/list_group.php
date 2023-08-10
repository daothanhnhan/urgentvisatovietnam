<?php 
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$action = new action();

	$category_id = $_GET['category_id'];

	$group_port = $action->getList('arrival_port_group', 'category_id', $category_id, 'id', 'asc', '', '', '');
	foreach ($group_port as $item) { 
?>
<option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
<?php } ?>