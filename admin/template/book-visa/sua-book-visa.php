<?php 
    function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	

	function book_visa ($id) {
		global $conn_vn;
		if (isset($_POST['add_trademark'])) {
			$src= "../images/";
			// $src = "uploads/";
			$image = '';

			if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){

				uploadPicture($src, $_FILES['image']['name'], $_FILES['image']['tmp_name']);
				$image = $_FILES['image']['name'];

			}

			$fee = $_POST['fee'];
			$discount = $_POST['discount'];

			$sql = "UPDATE evisa_book SET fee = '$fee', discount = '$discount' WHERE id = $id";

			$result = mysqli_query($conn_vn, $sql);
			if ($result) {
				echo '<script type="text/javascript">alert(\'Bạn đã sửa book visa thành công.\')</script>';
			} else {
				echo '<script type="text/javascript">alert(\'Có lỗi xảy ra.\')</script>';
			}
			
		}
	}

	book_visa($_GET['id']);

	$info = $action->getDetail('evisa_book', 'id', $_GET['id']);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung </span>
            <p class="subLeftNCP">Nhập thông tin book visa<br /><br /></p>  
            <p class="subLeftNCP"><a href="index.php?page=book-visa">Quay lại</a><br /><br /></p>   
                    
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Fee</p>
            <input type="number" class="txtNCP1" name="fee" value="<?= $info['fee'] ?>" required/>

            <p class="titleRightNCP">Discount</p>
            <input type="number" class="txtNCP1" name="discount" value="<?= $info['discount'] ?>" required/>
            
        </div>
    </div><!--end rowNodeContentPage-->
    
    <button class="btn btnSave" type="submit" name="add_trademark">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Phát Triển Thương Hiệu Cafe Link Việt Nam</p>