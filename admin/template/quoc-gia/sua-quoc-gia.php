<?php 
    function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	

	function quoc_gia ($id) {
		global $conn_vn;
		if (isset($_POST['add_trademark'])) {
			$src= "../images/";
			// $src = "uploads/";

			$image = '';
			if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){

				uploadPicture($src, $_FILES['image']['name'], $_FILES['image']['tmp_name']);
				$image = $_FILES['image']['name'];

			}

			$visa_require_text = mysqli_real_escape_string($conn_vn, $_POST['visa_require_text']);
			$visa_required = mysqli_real_escape_string($conn_vn, $_POST['visa_required']);
			$requirement_title = mysqli_real_escape_string($conn_vn, $_POST['requirement_title']);
			$requirement_content = mysqli_real_escape_string($conn_vn, $_POST['requirement_content']);
			$requirement_des = mysqli_real_escape_string($conn_vn, $_POST['requirement_des']);
			$requirement_keyword = mysqli_real_escape_string($conn_vn, $_POST['requirement_keyword']);
			$requirement_url = mysqli_real_escape_string($conn_vn, $_POST['requirement_url']);
			$emabassy_title = mysqli_real_escape_string($conn_vn, $_POST['emabassy_title']);
			$emabassy_content = mysqli_real_escape_string($conn_vn, $_POST['emabassy_content']);
			$emabassy_des = mysqli_real_escape_string($conn_vn, $_POST['emabassy_des']);
			$emabassy_keyword = mysqli_real_escape_string($conn_vn, $_POST['emabassy_keyword']);
            $emabassy_url = mysqli_real_escape_string($conn_vn, $_POST['emabassy_url']);
			$name = mysqli_real_escape_string($conn_vn, $_POST['name']);

            $arrival_port = json_encode($_POST['arrival_port']);
            $type_visa = json_encode($_POST['type_visa']);
            $visa_category = json_encode($_POST['visa_category']);
            $processing_time = json_encode($_POST['processing_time']);

            $arrival_port = mysqli_real_escape_string($conn_vn, $arrival_port);
            $type_visa = mysqli_real_escape_string($conn_vn, $type_visa);
            $visa_category = mysqli_real_escape_string($conn_vn, $visa_category);
            $processing_time = mysqli_real_escape_string($conn_vn, $processing_time);

            $most_popular = $_POST['most_popular']==1 ? 1 : 0;

            $evisa = $_POST['evisa']==1 ? 1 : 0;//var_dump($_POST['evisa']);
            $voa = $_POST['voa']==1 ? 1 : 0;

			$sql = "UPDATE quoc_gia SET visa_require_text = '$visa_require_text', 
			visa_required = '$visa_required', 
			requirement_title = '$requirement_title', 
			requirement_content = '$requirement_content', 
			requirement_des = '$requirement_des', 
			requirement_keyword = '$requirement_keyword', 
			requirement_url = '$requirement_url', 
			emabassy_title = '$emabassy_title',
			emabassy_content = '$emabassy_content', 
			emabassy_des = '$emabassy_des', 
			emabassy_keyword = '$emabassy_keyword', 
			emabassy_url = '$emabassy_url',
            most_popular = '$most_popular', 
            arrival_port = '$arrival_port', 
            type_visa = '$type_visa', 
            visa_category = '$visa_category', 
            processing_time = '$processing_time',
            evisa = '$evisa',
            voa = '$voa', 
            name = '$name' 
			WHERE id = $id";
			$result = mysqli_query($conn_vn, $sql);
            // echo $sql;
			if ($result) {
				echo '<script type="text/javascript">alert(\'Bạn đã sửa được một quốc gia.\')</script>';
			} else {
				echo '<script type="text/javascript">alert(\'Có lỗi xảy ra.\')</script>';
			}
			
		}
	}

	quoc_gia($_GET['id']);

	$info = $action->getDetail('quoc_gia', 'id', $_GET['id']);//var_dump($info['evisa']);

    $arrival_port = $action->getList('arrival_port', '', '', 'id', 'asc', '', '', '');
    $type_visa = $action->getList('type_visa', '', '', 'id', 'asc', '', '', '');
    $processing_time = $action->getList('processing_time', '', '', 'id', 'asc', '', '', '');
    $visa_category = $action->getList('visa_category', '', '', 'id', 'asc', '', '', '');

    $arrival_port_arr = json_decode($info['arrival_port'], true);//var_dump($arrival_port_arr);
    $type_visa_arr = json_decode($info['type_visa'], true);
    $visa_category_arr = json_decode($info['visa_category'], true);//var_dump($visa_category_arr);
    $processing_time_arr = json_decode($info['processing_time'], true);
?>
<style>
table {
    width: 100%;
}
</style>
<form action="" method="post" enctype="multipart/form-data">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung </span>
            <p class="subLeftNCP">Nhập thông tin quốc gia<br /><br /></p>     
            <p class="subLeftNCP"><a href="index.php?page=quoc-gia">Quay lại</a><br /><br /></p>     
                    
        </div>
        <div class="boxNodeContentPage">
        	<p class="titleRightNCP">Quốc gia</p>
            <input type="text" class="txtNCP1" name="name" value="<?= $info['name'] ?>"  />
            <p class="titleRightNCP">Yêu cầu visa</p>
            <input type="text" class="txtNCP1" name="visa_require_text" value="<?= $info['visa_require_text'] ?>" />
            <p class="titleRightNCP">Yêu cầu visa</p>
            <select name="visa_required" class="txtNCP1">
            	<option value="1">Yêu cầu</option>
            	<option value="2" <?= $info['visa_required']==2 ? 'selected' : '' ?> >Không yêu cầu</option>
            	
            </select>
            <p class="titleRightNCP">Yêu cầu visa tiêu đề</p>
            <input type="text" class="txtNCP1" name="requirement_title" onchange="ChangeToSlug_requirement(this.value)" value="<?= $info['requirement_title'] ?>" />
            <br>
            <br>
            <br>
            <p class="titleRightNCP">Yêu cầu về visa nội dung</p>
            <textarea name="requirement_content" class="ckeditor" ><?= $info['requirement_content'] ?></textarea>
            <p class="titleRightNCP">Yêu cầu visa Mô tả</p>
            <textarea name="requirement_des" class="txtNCP1" ><?= $info['requirement_des'] ?></textarea>
            <p class="titleRightNCP">Yêu cầu visa Keyword</p>
            <input type="text" class="txtNCP1" name="requirement_keyword" value="<?= $info['requirement_keyword'] ?>" />
            <p class="titleRightNCP">Yêu cầu visa Đường dẫn</p>
            <input type="text" class="txtNCP1" name="requirement_url" id="requirement_url" value="<?= $info['requirement_url'] ?>" />
            <br>
            <br>
            <br>
            <p class="titleRightNCP">Đại sứ quán tiều đề</p>
            <input type="text" class="txtNCP1" name="emabassy_title" onchange="ChangeToSlug_emabassy(this.value)" value="<?= $info['emabassy_title'] ?>" />
            <p class="titleRightNCP">Đại sứ quán Nội dung</p>
            <textarea name="emabassy_content" class="ckeditor" ><?= $info['emabassy_content'] ?></textarea>
            <p class="titleRightNCP">Đại sứ quán Mô tả</p>
            <textarea name="emabassy_des" class="txtNCP1" ><?= $info['emabassy_des'] ?></textarea>
            <p class="titleRightNCP">Đại sứ quán Keyword</p>
            <input type="text" class="txtNCP1" name="emabassy_keyword" value="<?= $info['emabassy_keyword'] ?>" />
            <p class="titleRightNCP">Đại sứ quán Đường dẫn</p>
            <input type="text" class="txtNCP1" name="emabassy_url" id="emabassy_url" value="<?= $info['emabassy_url'] ?>" />
            <p class="titleRightNCP">Most popular</p>
            <input type="checkbox" class="txtNCP1" name="most_popular" value="1" <?= $info['most_popular']==1 ? 'checked' : '' ?> />
        </div>
    </div><!--end rowNodeContentPage-->

    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung </span>
            <p class="subLeftNCP">Nhập thông Category<br /><br /></p>     
                 
                    
        </div>
        <div class="boxNodeContentPage">
            <?php 
            foreach ($visa_category as $item) { 
                $type_visa = $action->getList('type_visa', 'category_id', $item['id'], 'sort', 'asc', '', '', '');
            ?>
            <label class="selectCate">
                <input type="checkbox" value="<?= $item['id'] ?>" name="visa_category[]" onclick="type_show(<?= $item['id'] ?>, this.checked)" <?= in_array($item['id'], $visa_category_arr) ? 'checked' : '' ?> >
                <?= $item['name'] ?>
            </label>
                <?php foreach ($type_visa as $type) { ?>
                <label class="selectCate tick-sub-<?= $item['id'] ?>" style="margin-left: 20px;display: <?= in_array($item['id'], $visa_category_arr) ? 'block' : 'none' ?>;">
                    <input type="checkbox" value="<?= $type['id'] ?>" name="type_visa[]" class="box-tick-sub-<?= $item['id'] ?>" <?= in_array($type['id'], $type_visa_arr) ? 'checked' : '' ?> >
                    <?= $type['name'] ?>
                </label>
                <?php } ?>
            <?php } ?>
        </div>
    </div>

    
    
    <button class="btn btnSave" type="submit" name="add_trademark">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Phát Triển Thương Hiệu Cafe Link Việt Nam</p>

<script>
	function ChangeToSlug_requirement(title){
        var title, slug;
        //alert ("a");
        //Lấy text từ thẻ input title 
        // title = document.getElementById("title").value;
        // document.getElementById('title_seo').value = title;
        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();
     
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        slug = slug.replace(/[^a-zA-Z0-9\-]+/gi, '');
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('requirement_url').value = slug;
        // document.getElementById('title_seo').value = title;

    }

    function ChangeToSlug_emabassy(title){
        var title, slug;
        //alert ("a");
        //Lấy text từ thẻ input title 
        // title = document.getElementById("title").value;
        // document.getElementById('title_seo').value = title;
        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();
     
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        slug = slug.replace(/[^a-zA-Z0-9\-]+/gi, '');
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('emabassy_url').value = slug;
        // document.getElementById('title_seo').value = title;

    }

    function type_show (id, chk) {
        // alert(id);
        // alert(chk);
        var sub = document.getElementsByClassName("tick-sub-"+id);
        var sub_box = document.getElementsByClassName("box-tick-sub-"+id);
        var length = sub.length;
        // alert(length);
        for (var i=0;i<length;i++) {
            if (chk == false) {
                sub[i].style.display = 'none';
                sub_box[i].checked = false;
            } else {
                sub[i].style.display = 'block';
            }
        }
        
    }
</script>