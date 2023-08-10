<?php 
    function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	

	function content_service ($service_id) {
		global $conn_vn;
		if (isset($_POST['add_trademark'])) {
			$src= "../images/";
			// $src = "uploads/";

			$image = '';
			if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){

				uploadPicture($src, $_FILES['image']['name'], $_FILES['image']['tmp_name']);
				$image = $_FILES['image']['name'];

			}

			$note_en = mysqli_real_escape_string($conn_vn, $_POST['note_en']);
			$note_vi = mysqli_real_escape_string($conn_vn, $_POST['note_vi']);

			$sql = "INSERT INTO content_service (service_id, note_en, note_vi) VALUES ('$service_id', '$note_en', '$note_vi')";
			$result = mysqli_query($conn_vn, $sql);
			if ($result) {
				echo '<script type="text/javascript">alert(\'Bạn đã thêm được một nội dung dịch vụ.\');window.location.href="index.php?page=content-service&service_id='.$service_id.'"</script>';
			} else {
				echo '<script type="text/javascript">alert(\'Có lỗi xảy ra.\')</script>';
			}
			
		}
	}

	content_service($_GET['service_id']);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung </span>
            <p class="subLeftNCP">Nhập thông tin dịch vụ<br /><br /></p>     
            <p class="subLeftNCP"><a href="index.php?page=content-service&service_id=<?= $_GET['service_id'] ?>">Quay lại</a><br /><br /></p>     
                    
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Nội dung</p>
            <!-- <input type="text" class="txtNCP1" name="name" required/> -->
            <textarea name="note_en" class="ckeditor"></textarea>
            <!-- <p class="titleRightNCP">Nội dung</p> -->
            <!-- <input type="text" class="txtNCP1" name="name" required/> -->
            <!-- <textarea name="note_vi" class="ckeditor"></textarea> -->
            <!-- <p class="titleRightNCP">Ảnh thương hiệu</p>
            <input type="file" class="txtNCP1" name="image" required/> -->
            
        </div>
    </div><!--end rowNodeContentPage-->
    
    <button class="btn btnSave" type="submit" name="add_trademark">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Phát Triển Thương Hiệu Cafe Link Việt Nam</p>