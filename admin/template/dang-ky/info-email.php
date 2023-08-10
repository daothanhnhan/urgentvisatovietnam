<?php 
    function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	

	function info_email () {
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
			$email = mysqli_real_escape_string($conn_vn, $_POST['email']);
			$pass = mysqli_real_escape_string($conn_vn, $_POST['pass']);
			$smtp = mysqli_real_escape_string($conn_vn, $_POST['smtp']);

			$sql = "UPDATE info_email SET name = '$name', email = '$email', pass = '$pass', smtp = '$smtp' WHERE id = 1";

			$result = mysqli_query($conn_vn, $sql);
			if ($result) {
				echo '<script type="text/javascript">alert(\'Bạn đã sửa thông tin email thành công.\')</script>';
			} else {
				echo '<script type="text/javascript">alert(\'Có lỗi xảy ra.\')</script>';
			}
			
		}
	}

	info_email();

	$info = $action->getDetail('info_email', 'id', '1');
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung </span>
            <p class="subLeftNCP">Nhập thông tin thương hiệu<br /><br /></p>  
            <p class="subLeftNCP"><a href="index.php?page=thuong-hieu">Quay lại</a><br /><br /></p>   
                    
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Tên</p>
            <input type="text" class="txtNCP1" name="name" value="<?= $info['name'] ?>" required/>
            <p class="titleRightNCP">Email</p>
            <input type="email" class="txtNCP1" name="email" value="<?= $info['email'] ?>" required/>
            <p class="titleRightNCP">Mật khẩu</p>
            <input type="text" class="txtNCP1" name="pass" value="<?= $info['pass'] ?>" required/>
            <p class="titleRightNCP">SMTP</p>
            <input type="text" class="txtNCP1" name="smtp" value="<?= $info['smtp'] ?>" required/>
        </div>
    </div><!--end rowNodeContentPage-->
    
    <button class="btn btnSave" type="submit" name="add_trademark">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Phát Triển Thương Hiệu Cafe Link Việt Nam</p>