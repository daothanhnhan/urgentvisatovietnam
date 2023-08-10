<?php 
    function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	

	function thuong_hieu () {
		global $conn_vn;
		if (isset($_POST['add_trademark'])) {
			$src= "../images/pdf/";
			// $src = "uploads/";

			$image = '';
			if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){

				uploadPicture($src, $_FILES['image']['name'], $_FILES['image']['tmp_name']);
				$image = $_FILES['image']['name'];

			}

			
			
		}
	}

	thuong_hieu();
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung </span>
            <p class="subLeftNCP">Upload file pdf<br /><br /></p>     
            <!-- <p class="subLeftNCP"><a href="index.php?page=thuong-hieu">Quay lại</a><br /><br /></p>      -->
                    
        </div>
        <div class="boxNodeContentPage">
            <!-- <p class="titleRightNCP">Tên thương hiệu</p>
            <input type="text" class="txtNCP1" name="name" required/> -->
            <p class="titleRightNCP">File PDF</p>
            <input type="file" class="txtNCP1" name="image" required/>
            
        </div>
    </div><!--end rowNodeContentPage-->
    
    <button class="btn btnSave" type="submit" name="add_trademark">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Phát Triển Thương Hiệu Cafe Link Việt Nam</p>

<?php
echo 'Danh sách file:<br>';
$filenameArray = [];
// echo dirname(realpath(__FILE__)).'/../../../images/pdf/';
$handle = opendir(dirname(realpath(__FILE__)).'/../../../images/pdf/');
        while($file = readdir($handle)){
          // echo $file;
            if($file !== '.' && $file !== '..'){
                array_push($filenameArray, "$file");
                echo $file.'<br>';
            }
        }
// var_dump($filenameArray);
    echo 'Mã nhúng:<br>';
    echo    htmlspecialchars('<iframe src="/images/pdf/vietnam visa application form.pdf" width="100%" height="800px"></iframe>');
?>

