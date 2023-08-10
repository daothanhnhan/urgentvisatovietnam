<?php 
    function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	

	function service_all ($id) {
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
			$parent_id = mysqli_real_escape_string($conn_vn, $_POST['parent_id']);

			$sql = "UPDATE service_all SET name = '$name', link = '$link' WHERE id = $id";
			$result = mysqli_query($conn_vn, $sql);
			if ($result) {
				echo '<script type="text/javascript">alert(\'Bạn đã sửa được một Link.\')</script>';
			} else {
				echo '<script type="text/javascript">alert(\'Có lỗi xảy ra.\')</script>';
			}
			
		}
	}

	service_all($_GET['id']);

	$cha = $action->getList('service_all', '', '', 'id', 'asc', '', '', '');

	$info = $action->getDetail('service_all', 'id', $_GET['id']);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung </span>
            <p class="subLeftNCP">Nhập thông tin Link<br /><br /></p>     
            <p class="subLeftNCP"><a href="index.php?page=service-all&parent_id=<?= $info['parent_id'] ?>">Quay lại</a><br /><br /></p>     
                    
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Tên</p>
            <input type="text" class="txtNCP1" name="name" value="<?= $info['name'] ?>" required/>
            <p class="titleRightNCP">Link</p>
            <input type="text" class="txtNCP1" name="link" value="<?= $info['link'] ?>" required/>
            <p class="titleRightNCP">Mục cha</p>
            <!-- <select name="parent_id" class="txtNCP1">
            	<option value="0">Chọn</option>
            	<?php foreach ($cha as $item) { ?>
            	<option value="<?= $item['id'] ?>" <?= $item['id']==$info['parent_id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
            	<?php } ?>
            </select> -->
        </div>
    </div><!--end rowNodeContentPage-->
    
    <button class="btn btnSave" type="submit" name="add_trademark">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Phát Triển Thương Hiệu Cafe Link Việt Nam</p>