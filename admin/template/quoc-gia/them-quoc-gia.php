<?php 
    function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	

	function quoc_gia () {
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
			$visa_required = mysqli_real_escape_string($conn_vn, $_POST['visa_required']);
			$requirement = mysqli_real_escape_string($conn_vn, $_POST['requirement']);
			$emabassy = mysqli_real_escape_string($conn_vn, $_POST['emabassy']);

			$sql = "INSERT INTO quoc_gia (name, visa_required, requirement, emabassy) VALUES ('$name', '$visa_required', '$requirement', '$emabassy')";
			$result = mysqli_query($conn_vn, $sql);
			if ($result) {
				echo '<script type="text/javascript">alert(\'Bạn đã thêm được một quốc gia.\');window.location.href="index.php?page=quoc-gia"</script>';
			} else {
				echo '<script type="text/javascript">alert(\'Có lỗi xảy ra.\')</script>';
			}
			
		}
	}

	quoc_gia();
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung </span>
            <p class="subLeftNCP">Nhập thông tin quốc gia<br /><br /></p>     
            <p class="subLeftNCP"><a href="index.php?page=quoc-gia">Quay lại</a><br /><br /></p>     
                    
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Tên</p>
            <input type="text" class="txtNCP1" name="name" required/>
            <p class="titleRightNCP">Yêu cầu visa</p>
            <select name="visa_required" class="txtNCP1">
            	<option value="1">Yêu cầu</option>
            	<option value="2">Không yêu cầu</option>
            	
            </select>
            <br>
            <br>
            <br>
            <p class="titleRightNCP">Yêu cầu về visa</p>
            <textarea name="requirement" class="ckeditor" required=""></textarea>
            <br>
            <br>
            <br>
            <p class="titleRightNCP">Đại sứ quán</p>
            <textarea name="emabassy" class="ckeditor" required=""></textarea>
        </div>
    </div><!--end rowNodeContentPage-->
    
    <button class="btn btnSave" type="submit" name="add_trademark">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Phát Triển Thương Hiệu Cafe Link Việt Nam</p>