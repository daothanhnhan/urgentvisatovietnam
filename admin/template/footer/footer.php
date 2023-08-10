<?php 
    function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	

	function footer ($id) {
		global $conn_vn;
		if (isset($_POST['add_trademark'])) {
			$src= "../images/";
			// $src = "uploads/";
			$image = '';

			if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){

				uploadPicture($src, $_FILES['image']['name'], $_FILES['image']['tmp_name']);
				$image = $_FILES['image']['name'];

			}

			$note_1 = mysqli_real_escape_string($conn_vn, $_POST['note_1']);
			$note_2 = mysqli_real_escape_string($conn_vn, $_POST['note_2']);
			$note_3 = mysqli_real_escape_string($conn_vn, $_POST['note_3']);
			$note_4 = mysqli_real_escape_string($conn_vn, $_POST['note_4']);
			$note_5 = mysqli_real_escape_string($conn_vn, $_POST['note_5']);
			$note_6 = mysqli_real_escape_string($conn_vn, $_POST['note_6']);

			$sql = "UPDATE footer SET note_1 = '$note_1', note_2 = '$note_2', note_3 = '$note_3', note_4 = '$note_4', note_5 = '$note_5', note_6 = '$note_6' WHERE id = 1";

			$result = mysqli_query($conn_vn, $sql);
			if ($result) {
				echo '<script type="text/javascript">alert(\'Bạn đã sửa footer thành công.\')</script>';
			} else {
				echo '<script type="text/javascript">alert(\'Có lỗi xảy ra.\')</script>';
			}
			
		}
	}

	footer($_GET['id']);

	$info = $action->getDetail('footer', 'id', 1);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung </span>
            <p class="subLeftNCP">Nhập thông tin footer<br /><br /></p>  
            <!-- <p class="subLeftNCP"><a href="index.php?page=thuong-hieu">Quay lại</a><br /><br /></p>    -->
                    
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Cột Vietnam Visa</p>
            <textarea name="note_1" class="txtNCP1 ckeditor"><?= $info['note_1'] ?></textarea>
            <p class="titleRightNCP">Cột Our services 1</p>
            <textarea name="note_2" class="txtNCP1 ckeditor"><?= $info['note_2'] ?></textarea>
            <p class="titleRightNCP">Cột Our services 2</p>
            <textarea name="note_3" class="txtNCP1 ckeditor"><?= $info['note_3'] ?></textarea>
            <p class="titleRightNCP">Cột Resources</p>
            <textarea name="note_4" class="txtNCP1 ckeditor"><?= $info['note_4'] ?></textarea>
            <p class="titleRightNCP">Why apply with us?</p>
            <textarea name="note_5" class="txtNCP1 " rows="5"><?= $info['note_5'] ?></textarea>
            <p class="titleRightNCP">Terms of Use</p>
            <textarea name="note_6" class="txtNCP1 " rows="5"><?= $info['note_6'] ?></textarea>
        </div>
    </div><!--end rowNodeContentPage-->
    
    <button class="btn btnSave" type="submit" name="add_trademark">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Phát Triển Thương Hiệu Cafe Link Việt Nam</p>