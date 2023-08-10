<?php 
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$action = new action();

	// $id = $_GET['id'];
	$quoc_gia_id = $_GET['quoc_gia_id'];

	$quoc_gia = $action->getDetail('quoc_gia', 'id', $quoc_gia_id);
	$visa_category = json_decode($quoc_gia['visa_category'], true);//var_dump($visa_category);
	$type_visa_has = json_decode($quoc_gia['type_visa'], true);//var_dump($type_visa_has);

	$list_type_visa = $action->getList('type_visa', 'category_id', $visa_category[0], 'sort', 'asc', '', '', '');//var_dump($list_type_visa);
    $list_type_visa_2 = array();
    foreach ($list_type_visa as $item) {
        if (in_array($item['id'], $type_visa_has)) {
            $list_type_visa_2[] = $item;
        }
    }
    echo '<option value="0">---Please select---</option>';
    foreach ($list_type_visa_2 as $item) { 
?>
<option value="<?= $item['id'] ?>" data-price="<?= $item['price'] ?>"><?= $item['name'] ?></option>
<?php } ?>