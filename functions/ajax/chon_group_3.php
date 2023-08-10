<?php 
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$action = new action();


	$quoc_gia_id = $_GET['quoc_gia_id'];

	$quoc_gia_first = $action->getDetail('quoc_gia', 'id', $quoc_gia_id);
    $visa_category = json_decode($quoc_gia_first['visa_category'], true);


    $group_port = $action->getList('arrival_port_group', 'category_id', $visa_category[0], 'id', 'asc', '', '', '');//var_dump($group_port);
    $list_port_arrival = $action->getList('arrival_port', 'arrival_port_group_id', $group_port[0]['id'], 'id', 'asc', '', '', '');
    echo '<option value="0">Please select</option>';
    foreach ($list_port_arrival as $item) {
?>
<option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
<?php } ?>