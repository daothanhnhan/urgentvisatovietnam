<?php 
	session_start();
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	// var_dump($_FILES['portrait']);

	$action = new action();

	$number_applicant = $_SESSION['step_1']['number_applicant'];
	$purpose = $_SESSION['step_1']['purpose'];
	$type_visa = $_SESSION['step_1']['type_visa'];
	$date = $_SESSION['step_1']['date'];
	$airport_id = $_SESSION['step_1']['airport_id'];
	$time = $_SESSION['step_1']['time'];
	$name = $_SESSION['step_1']['name'];
	$email_1 = $_SESSION['step_1']['email_1'];
	$countryPrefix = $_SESSION['step_1']['countryPrefix'];
	$phone = $_SESSION['step_1']['phone'];

	$citizenship = $_SESSION['step_1']['citizenship'];
	$category = $_SESSION['step_1']['category'];

	if ($purpose == 1) {
		$purpose_name = 'Tourist evisa';
	} else {
		$purpose_name = 'Business';
	}

	$type_visa_item = $action->getDetail('type_visa', 'id', $type_visa);

	$type_visa_name = $type_visa_item['name'];

	$type_visa_price = (int)$type_visa_item['price'];

	$airport = $action->getDetail('arrival_port', 'id', $airport_id)['name'];

	$time_item = $action->getDetail('processing_time', 'id', $time);

	$time = $time_item['name'];

	$time_price = (int)$time_item['price'];

	$phone_full = $countryPrefix . ' ' . $phone;

	$fee = $number_applicant * ($type_visa_price + $time_price);

	$nation = $action->getDetail('quoc_gia', 'id', $citizenship)['name'];
	$nation = mysqli_real_escape_string($conn_vn, $nation);
	$category = $action->getDetail('visa_category', 'id', $category)['name'];

	$sql = "INSERT INTO evisa_book (`number`, purpose, type_visa, `date`, airport, process_time, name, email, phone, fee, nation, category) VALUES ('$number_applicant', '$purpose_name', '$type_visa_name', '$date', '$airport', '$time', '$name', '$email_1', '$phone_full', '$fee', '$nation', '$category')";

	$result = mysqli_query($conn_vn, $sql);

	$evisa_id = mysqli_insert_id($conn_vn);

	$_SESSION['order_book_id'] = $evisa_id; 
// echo 'buoc 1';
	foreach ($_POST['address'] as $key => $val) {
		$fullname = $_POST['name'][$key];
		$passport_number = $_POST['passport_number'][$key];
		$nation = $_POST['nation'][$key];
		$birthday = $_POST['birthday'][$key];
		$expiry_date = $_POST['expiry_date'][$key];
		$religion = $_POST['religion'][$key];
		$address = $_POST['address'][$key];


		$src= "../../images/evisa/";

		$time_pre = time();

		$portrait = '';
		if(isset($_FILES['portrait']) && $_FILES['portrait']['name'][$key] != ""){

			uploadPicture($src, $time_pre.$_FILES['portrait']['name'][$key], $_FILES['portrait']['tmp_name'][$key]);
			$portrait = $time_pre.$_FILES['portrait']['name'][$key];

		}


		$passport = '';
		if(isset($_FILES['passport']) && $_FILES['passport']['name'][$key] != ""){

			uploadPicture($src, $time_pre.$_FILES['passport']['name'][$key], $_FILES['passport']['tmp_name'][$key]);
			$passport = $time_pre.$_FILES['passport']['name'][$key];

		}

		$sql = "INSERT INTO persion_visa (evisa_book_id, passport_number, nation, fullname, birthday, expiry_date, religion, portrait, passport, address) VALUES ($evisa_id, '$passport_number', '$nation', '$fullname', '$birthday', '$expiry_date', '$religion', '$portrait', '$passport', '$address')";

		$result = mysqli_query($conn_vn, $sql);

	}