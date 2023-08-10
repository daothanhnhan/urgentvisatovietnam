<?php 
    function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	

	function service_all ($parent_id) {
		global $conn_vn;
		if (isset($_POST['add_trademark'])) {
			$src= "../images/";
			// $src = "uploads/";

			$image = '';
			if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){

				uploadPicture($src, $_FILES['image']['name'], $_FILES['image']['tmp_name']);
				$image = $_FILES['image']['name'];

			}

			$name = mysqli_real_escape_string($conn_vn, $_POST['name']);
			$link = mysqli_real_escape_string($conn_vn, $_POST['link']);
			// $parent_id = mysqli_real_escape_string($conn_vn, $_POST['parent_id']);
			if (empty($parent_id)) {
				$parent_id = 0;
			}

			$sql = "INSERT INTO service_all (name, link, parent_id) VALUES ('$name', '$link', '$parent_id')";//echo $sql;
			$result = mysqli_query($conn_vn, $sql);
			if ($result) {
				echo '<script type="text/javascript">alert(\'Bạn đã thêm được một Link.\');window.location.href="index.php?page=service-all&parent_id='.$parent_id.'"</script>';
			} else {
				echo '<script type="text/javascript">alert(\'Có lỗi xảy ra.\')</script>';
				echo mysqli_error($conn_vn);
			}
			
		}
	}

	service_all($_GET['parent_id']);

	$cha = $action->getList('service_all', '', '', 'id', 'asc', '', '', '');
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung </span>
            <p class="subLeftNCP">Nhập thông tin Link<br /><br /></p>     
            <p class="subLeftNCP"><a href="index.php?page=service-all&parent_id=<?= $_GET['parent_id'] ?>">Quay lại</a><br /><br /></p>     
                    
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Tên</p>
            <input type="text" class="txtNCP1" name="name" required/>
            <p class="titleRightNCP">Link</p>
            <input type="text" class="txtNCP1" name="link" required/>
            <p class="titleRightNCP">Mục cha</p>
            <!-- <select name="parent_id" class="txtNCP1">
            	<option value="0">Chọn</option>
            	
            	<?php foreach ($cha as $item) { ?>
            	<option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
            	<?php } ?>
            </select> -->
        </div>
    </div><!--end rowNodeContentPage-->
    
    <button class="btn btnSave" type="submit" name="add_trademark">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Phát Triển Thương Hiệu Cafe Link Việt Nam</p>