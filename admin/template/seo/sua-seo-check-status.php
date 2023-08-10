<?php 
    function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	

	function seo ($id) {
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
			$title = mysqli_real_escape_string($conn_vn, $_POST['title']);
			$keyword = mysqli_real_escape_string($conn_vn, $_POST['keyword']);
			$des = mysqli_real_escape_string($conn_vn, $_POST['des']);

			$sql = "UPDATE seo_check_status SET title = '$title', keyword = '$keyword', des = '$des', name = '$name' WHERE id = $id";
			$result = mysqli_query($conn_vn, $sql);
			if ($result) {
				echo '<script type="text/javascript">alert(\'Bạn đã sửa được một seo.\')</script>';
			} else {
				echo '<script type="text/javascript">alert(\'Có lỗi xảy ra.\')</script>';
			}
			
		}
	}

	seo(1);

	$info = $action->getDetail('seo_check_status', 'id', 1);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung </span>
            <p class="subLeftNCP">Nhập thông tin SEO page book<br /><br /></p>     
            <!-- <p class="subLeftNCP"><a href="index.php?page=country-prefix">Quay lại</a><br /><br /></p>      -->
                    
        </div>
        <div class="boxNodeContentPage">
        	<p class="titleRightNCP">Nội dung con</p>
            <input type="text" class="txtNCP1" name="name" value="<?= $info['name'] ?>" required/>
            <p class="titleRightNCP">Tiêu đề</p>
            <input type="text" class="txtNCP1" name="title" value="<?= $info['title'] ?>" required/>
            <p class="titleRightNCP">Từ khóa</p>
            <input type="text" class="txtNCP1" name="keyword" value="<?= $info['keyword'] ?>" required/>
            <p class="titleRightNCP">Thẻ mô tả</p>
            <textarea name="des" class="txtNCP1"><?= $info['des'] ?></textarea>
        </div>
    </div><!--end rowNodeContentPage-->
    
    <button class="btn btnSave" type="submit" name="add_trademark">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Phát Triển Thương Hiệu Cafe Link Việt Nam</p>