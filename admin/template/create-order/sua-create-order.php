<?php 
    function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	

	function create_order ($id) {
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
			$state = mysqli_real_escape_string($conn_vn, $_POST['state']);
			// $ngay = date('Y-m-d H:i:s');

			$sql = "UPDATE create_order SET num = '$num', citizenship = '$citizenship', name = '$name', name_service = '$name_service', note = '$note', price = '$price', state = '$state' WHERE id = $id";
			// echo $sql;die;
			$result = mysqli_query($conn_vn, $sql);
			if ($result) {
				echo '<script type="text/javascript">alert(\'Bạn đã sửa được một create order.\')</script>';
			} else {
				echo '<script type="text/javascript">alert(\'Có lỗi xảy ra.\')</script>';
				echo mysqli_error($conn_vn);
			}
			
		}
	}

	create_order($_GET['id']);

	$quoc_gia = $action->getList('quoc_gia', '', '', 'id', 'asc', '', '', '');

	$info = $action->getDetail('create_order', 'id', $_GET['id']);
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
                <option value="1" <?= $info['num']==1 ? 'selected' : '' ?> >1 Applicant</option>
                <option value="2" <?= $info['num']==2 ? 'selected' : '' ?> >2 Applicants</option>    
                <option value="3" <?= $info['num']==3 ? 'selected' : '' ?> >3 Applicants</option>    
                <option value="4" <?= $info['num']==4 ? 'selected' : '' ?> >4 Applicants</option>    
                <option value="5" <?= $info['num']==5 ? 'selected' : '' ?> >5 Applicants</option>    
                <option value="6" <?= $info['num']==6 ? 'selected' : '' ?> >6 Applicants</option>    
                <option value="7" <?= $info['num']==7 ? 'selected' : '' ?> >7 Applicants</option>    
                <option value="8" <?= $info['num']==8 ? 'selected' : '' ?> >8 Applicants</option>    
                <option value="9" <?= $info['num']==9 ? 'selected' : '' ?> >9 Applicants</option>    
                <option value="10" <?= $info['num']==10 ? 'selected' : '' ?> >10 Applicants</option>    
            </select>
            <p class="titleRightNCP">Citizenship</p>
            <select class="txtNCP1" name="citizenship" id="">
                <?php foreach ($quoc_gia as $item) { ?>
                <option value="<?= $item['name'] ?>" <?= $info['citizenship']==$item['name'] ? 'selected' : '' ?>><?= $item['name'] ?></option>    
                <?php } ?>
            </select>
            <p class="titleRightNCP">Contact Name</p>
            <input type="text" class="txtNCP1" name="name" value="<?= $info['name'] ?>" required/>
            <p class="titleRightNCP">Name of Service</p>
            <input type="text" class="txtNCP1" name="name_service" value="<?= $info['name_service'] ?>" required/>
            <p class="titleRightNCP">Description</p>
            <textarea name="note" class="txtNCP1"><?= $info['note'] ?></textarea>
            <p class="titleRightNCP">Unit Price</p>
            <input type="number" class="txtNCP1" name="price" value="<?= $info['price'] ?>" required/>
            <p class="titleRightNCP">Number of Applicant</p>
            <select class="txtNCP1" name="state" id="">
                <option value="0" <?= $info['state']==0 ? 'selected' : '' ?> >Not Paid</option>
                <option value="1" <?= $info['state']==1 ? 'selected' : '' ?> >Paid</option>
            </select>
        </div>
    </div><!--end rowNodeContentPage-->
    
    <button class="btn btnSave" type="submit" name="add_trademark">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Phát Triển Thương Hiệu Cafe Link Việt Nam</p>