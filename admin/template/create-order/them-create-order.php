<?php 
    function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	

	function create_order () {
		global $conn_vn;
		if (isset($_POST['add_trademark'])) {
			$src= "../images/";
			// $src = "uploads/";

			$image = '';
			if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){

				uploadPicture($src, $_FILES['image']['name'], $_FILES['image']['tmp_name']);
				$image = $_FILES['image']['name'];

			}

			$num = mysqli_real_escape_string($conn_vn, $_POST['number_applicant']);
			$citizenship = mysqli_real_escape_string($conn_vn, $_POST['citizenship']);
			$name = mysqli_real_escape_string($conn_vn, $_POST['name']);
			$name_service = mysqli_real_escape_string($conn_vn, $_POST['name_service']);
			$note = mysqli_real_escape_string($conn_vn, $_POST['note']);
			$price = mysqli_real_escape_string($conn_vn, $_POST['price']);
			$ngay = date('Y-m-d H:i:s');

			$sql = "INSERT INTO create_order (num, citizenship, name, name_service, note, price, ngay, state) VALUES ('$num', '$citizenship', '$name', '$name_service', '$note', '$price', '$ngay', 0)";
			// echo $sql;die;
			$result = mysqli_query($conn_vn, $sql);
			if ($result) {
				echo '<script type="text/javascript">alert(\'Bạn đã thêm được một create order.\');window.location.href="index.php?page=create-order"</script>';
			} else {
				echo '<script type="text/javascript">alert(\'Có lỗi xảy ra.\')</script>';
			}
			
		}
	}

	create_order();

	$quoc_gia = $action->getList('quoc_gia', '', '', 'id', 'asc', '', '', '');
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung </span>
            <p class="subLeftNCP">Nhập thông tin thương hiệu<br /><br /></p>     
            <p class="subLeftNCP"><a href="index.php?page=create-order">Quay lại</a><br /><br /></p>     
                    
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Number of Applicant</p>
            <select class="txtNCP1" name="number_applicant" id="">
                <option value="1">1 Applicant</option>
                <option value="2">2 Applicants</option>    
                <option value="3">3 Applicants</option>    
                <option value="4">4 Applicants</option>    
                <option value="5">5 Applicants</option>    
                <option value="6">6 Applicants</option>    
                <option value="7">7 Applicants</option>    
                <option value="8">8 Applicants</option>    
                <option value="9">9 Applicants</option>    
                <option value="10">10 Applicants</option>    
            </select>
            <p class="titleRightNCP">Citizenship</p>
            <select class="txtNCP1" name="citizenship" id="">
                <?php foreach ($quoc_gia as $item) { ?>
                <option value="<?= $item['name'] ?>"><?= $item['name'] ?></option>    
                <?php } ?>
            </select>
            <p class="titleRightNCP">Contact Name</p>
            <input type="text" class="txtNCP1" name="name" required/>
            <p class="titleRightNCP">Name of Service</p>
            <input type="text" class="txtNCP1" name="name_service" required/>
            <p class="titleRightNCP">Description</p>
            <textarea name="note" class="txtNCP1"></textarea>
            <p class="titleRightNCP">Unit Price</p>
            <input type="number" class="txtNCP1" name="price" value="0" required/>
        </div>
    </div><!--end rowNodeContentPage-->
    
    <button class="btn btnSave" type="submit" name="add_trademark">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Phát Triển Thương Hiệu Cafe Link Việt Nam</p>