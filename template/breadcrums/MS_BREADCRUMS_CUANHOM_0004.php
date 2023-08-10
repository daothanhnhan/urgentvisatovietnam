<?php 
	$arr_procat = array();
	function getParent ($id) {
		global $conn_vn;
		global $arr_procat;
		if ($id != 0) {
			$sql = "SELECT * FROM productcat WHERE productcat_id = $id";
			$result = mysqli_query($conn_vn, $sql);
			$row = mysqli_fetch_assoc($result);
			$arr_procat[] = array(
					'url' => $row['friendly_url'],
					'name' => $row['productcat_name']
				);
			getParent($row['productcat_parent']);
		}		
	}

	getParent($rowCat['productcat_id']);
	krsort($arr_procat);
	// var_dump($arr_procat);
?>
<div class="gb-breadcrumbs_cuanhom">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <?php foreach ($arr_procat as $item) { ?>
            <li><a href="/<?= $item['url'] ?>"><?= $item['name'] ?></a></li>
            <?php } ?>
            <?php 
            if ($_GET['page'] == 'san-pham') {
            	echo '<li class="active">Sản phẩm</li>';
            }
            ?>
            <!-- <li class="active"><?= $title ?></li> -->
        </ul>
    </div>
</div>