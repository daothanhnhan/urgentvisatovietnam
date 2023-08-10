<?php 
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$action = new action();

	$category_id = $_GET['category_id'];

	$group_port = $action->getList('arrival_port_group', 'category_id', $category_id, 'id', 'asc', '', '', '');//var_dump($group_port);
    $list_port_arrival = $action->getList('arrival_port', 'arrival_port_group_id', $group_port[0]['id'], 'id', 'asc', '', '', '');
    echo '<option value="0">Please select</option>';
    foreach ($list_port_arrival as $item) { 
    	if (empty($category_id)) {
    		break;
    	}
?>
<option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
<?php } ?>