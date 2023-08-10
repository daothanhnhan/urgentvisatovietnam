<?php 
    function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	

	function faqs ($id) {
		global $conn_vn;
		if (isset($_POST['add_trademark'])) {
			$src= "../images/";
			// $src = "uploads/";

			$image = '';
			if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){

				uploadPicture($src, $_FILES['image']['name'], $_FILES['image']['tmp_name']);
				$image = $_FILES['image']['name'];

			}

			$name_en = mysqli_real_escape_string($conn_vn, $_POST['name_en']);
			$note_en = mysqli_real_escape_string($conn_vn, $_POST['note_en']);
			$type = mysqli_real_escape_string($conn_vn, $_POST['type']);

			$sql = "UPDATE faqs SET name_en = '$name_en', note_en = '$note_en', type = '$type' WHERE id = $id";
			$result = mysqli_query($conn_vn, $sql);
			if ($result) {
				echo '<script type="text/javascript">alert(\'Bạn đã sửa được một faq.\')</script>';
			} else {
				echo '<script type="text/javascript">alert(\'Có lỗi xảy ra.\')</script>';
			}
			
		}
	}

	faqs($_GET['id']);

	$info = $action->getDetail('faqs', 'id', $_GET['id']);

	$list_nhom = $action->getList('nhom_faqs', '', '', 'id', 'asc', '', '', '');
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung </span>
            <p class="subLeftNCP">Nhập thông tin thương hiệu<br /><br /></p>     
            <p class="subLeftNCP"><a href="index.php?page=faqs">Quay lại</a><br /><br /></p>     
                    
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Tên</p>
            <input type="text" class="txtNCP1" name="name_en" value="<?= $info['name_en'] ?>" required/>
            <p class="titleRightNCP">Nội dung</p>
            <textarea name="note_en" class="txtNCP1 ckeditor" rows="5" required=""><?= $info['note_en'] ?></textarea>
            <p class="titleRightNCP">Nhóm câu</p>
            <select name="type" class="txtNCP1">
            	<?php foreach ($list_nhom as $item) { ?>
            	<option value="<?= $item['id'] ?>" <?= $info['type']==$item['id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
            	<?php } ?>
            
            </select>
        </div>
    </div><!--end rowNodeContentPage-->
    
    <button class="btn btnSave" type="submit" name="add_trademark">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Phát Triển Thương Hiệu Cafe Link Việt Nam</p>