<?php 
    function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	

	function processing_time ($id) {
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
			$price = mysqli_real_escape_string($conn_vn, $_POST['price']);
			$des = mysqli_real_escape_string($conn_vn, $_POST['des']);
			$sort = mysqli_real_escape_string($conn_vn, $_POST['sort']);

			$sql = "UPDATE processing_time SET name = '$name', price = '$price', des = '$des', sort = '$sort' WHERE id = $id";
			$result = mysqli_query($conn_vn, $sql);
			if ($result) {
				echo '<script type="text/javascript">alert(\'Bạn đã sửa được một processing time.\')</script>';
			} else {
				echo '<script type="text/javascript">alert(\'Có lỗi xảy ra.\')</script>';
			}
			
		}
	}

	processing_time($_GET['id']);

	$info = $action->getDetail('processing_time', 'id', $_GET['id']);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung </span>
            <p class="subLeftNCP">Nhập thông tin processing time<br /><br /></p>     
            <p class="subLeftNCP"><a href="index.php?page=processing-time&type_visa_id=<?= $info['type_visa_id'] ?>">Quay lại</a><br /><br /></p>     
                    
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Tên</p>
            <input type="text" class="txtNCP1" name="name" value="<?= $info['name'] ?>" required/>
            <!-- <p class="titleRightNCP">Ảnh thương hiệu</p>
            <input type="file" class="txtNCP1" name="image" required/> -->
            <p class="titleRightNCP">Price</p>
            <input type="number" class="txtNCP1" name="price" value="<?= $info['price'] ?>" required/>
            <p class="titleRightNCP">Short des</p>
            <textarea name="des" class="txtNCP1"><?= $info['des'] ?></textarea>
            <p class="titleRightNCP">Thứ tự</p>
            <input type="number" class="txtNCP1" name="sort" value="<?= $info['sort'] ?>" required/>
        </div>
    </div><!--end rowNodeContentPage-->
    
    <button class="btn btnSave" type="submit" name="add_trademark">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Phát Triển Thương Hiệu Cafe Link Việt Nam</p>