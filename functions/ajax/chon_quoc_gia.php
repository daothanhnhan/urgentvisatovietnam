<?php 
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$action = new action();

	$id = $_GET['id'];

	$quoc_gia = $action->getDetail('quoc_gia', 'id', $id);
	$visa_category = json_decode($quoc_gia['visa_category'], true);

	echo '<option value="0">---Please select---</option>';
    foreach ($visa_category as $cate_id) { 
    	$category = $action->getDetail('visa_category', 'id', $cate_id);
?>
<option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
<?php } ?>