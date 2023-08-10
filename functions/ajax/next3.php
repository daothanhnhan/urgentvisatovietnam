<?php 
	session_start();

	include_once dirname(__FILE__) . '/../phpmailer/class.smtp.php';
	include_once dirname(__FILE__) . '/../phpmailer/class.phpmailer.php';

	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";
	include_once dirname(__FILE__) . "/../action_email.php";

	$action = new action();

	$action_email = new action_email();
	

	$number_applicant = $_SESSION['step_1']['number_applicant'];
	$date = $_SESSION['step_1']['date'];
	$name = $_SESSION['step_1']['name'];
	$email_1 = $_SESSION['step_1']['email_1'];
	$countryPrefix = $_SESSION['step_1']['countryPrefix'];
	$phone = $_SESSION['step_1']['phone'];

	

	$phone_full = $countryPrefix . ' ' . $phone;

	$nation = $action->getDetail('quoc_gia', 'id', $_SESSION['step_1']['citizenship'])['name'];
	$purpose_name = $action->getDetail('purpose_of_visit', 'id', $_SESSION['step_1']['purpose'])['name'];
	$category = $action->getDetail('visa_category', 'id', $_SESSION['step_1']['category'])['name'];
	$type_visa_name = $action->getDetail('type_visa', 'id', $_SESSION['step_1']['type_visa'])['name'];
	$airport = $action->getDetail('arrival_port', 'id', $_SESSION['step_1']['airport_id'])['name'];
	$time = $action->getDetail('processing_time', 'id', $_SESSION['step_1']['time'])['name'];

	$reshow_type = $action->getDetail('type_visa', 'id', $_SESSION['step_1']['type_visa']);
    $reshow_time = $action->getDetail('processing_time', 'id', $_SESSION['step_1']['time']);
    $fee = ($reshow_type['price'] + $reshow_time['price']) * $_SESSION['step_1']['number_applicant'];
    $fee_service = $reshow_type['price'];
    $fee_process = $reshow_time['price'];
	// $fee = 0;



	$sql = "INSERT INTO evisa_book (`number`, purpose, type_visa, `date`, airport, process_time, name, email, phone, fee, nation, category, fee_service, fee_process) VALUES ('$number_applicant', '$purpose_name', '$type_visa_name', '$date', '$airport', '$time', '$name', '$email_1', '$phone_full', '$fee', '$nation', '$category', '$fee_service', '$fee_process')";

	$result = mysqli_query($conn_vn, $sql);

	$evisa_id = mysqli_insert_id($conn_vn);

	$_SESSION['step_1']['evisa_id'] = $evisa_id;


	$now = date('M d, Y');
	$date = date('d/m/Y', strtotime($_SESSION['step_1']['date']));


	$text = (string)$evisa_id;
	$text_leng = strlen($text);
	$text_1 = '';
	for ($i=0;$i < $text_leng;$i++) {
		$tmp = (int)$text[$i] + 3;
		$tmp = $tmp%10;
		$text_1 .= (string)$tmp;
	}
	$alpha = 'abcdefghijklmnopqrstuvwxyz';
	$key = rand(0, 25);
	$text_end = $alpha[$key];
	$text_2 = $text_1 . $text_end;
	$text_2 = strrev($text_2);


	$web = 'https://'.$_SERVER['SERVER_NAME'];
	$web_1 = $web . '/info-order-review/'.$text_2;
	$web_2 = $web . '/pay-now/'.$text_2;


	$noi_dung = "<p>Dear Mr/Ms. $name</p>";
	$noi_dung .= "<p>Thank you very much for contacting us at https://urgentvisatovietnam.com. We have received your order on $now as follow. Below is the detail of the order:</p>";
	$noi_dung .= "<h3>OrderID: $evisa_id</h3>";
	$noi_dung .= "<h2 style='color:orange;'>Your Order Summary</h2>";
	$noi_dung .= "<div style='background:#e1e1e1;margin-left:20px;padding:1px 10px;'>";
	$noi_dung .= "<p>1. Visa Type: $type_visa_name</p>";
	$noi_dung .= "<p>2. Nationality: $nation</p>";
	$noi_dung .= "<p>3. Process Time: $time</p>";
	$noi_dung .= "<p>4. Applicant Number: $number_applicant applicant(s)</p>";
	$noi_dung .= "<p>5. Visa Fee: $ $fee_service/visa</p>";
	$noi_dung .= "<p>6. Service Fee: $ $fee_process/visa</p>";
	
	$noi_dung .= "<p>7. Stamping Fee: eVisa is Included, Visa On Arrival is not included</p>";
	$noi_dung .= "<p>8. <b>Total Fee: $ $fee</b></p>";
	$noi_dung .= "</div>";

	$noi_dung .= "<h2 style='color:orange;'>Application Details</h2>";
	$noi_dung .= "<div style='background:#e1e1e1;margin-left:20px;padding:1px 10px;'>";
	$noi_dung .= "<p>1. Date of entry: $date <span style='font-size:10px;'>(dd/mm/yyyy)</span></p>";
	$noi_dung .= "<p>2. Arrival airport: $airport</p>";
	$noi_dung .= "<p>3. Your email: $email_1</p>";
	$noi_dung .= "<p>4. Contact Infor: $phone_full</p>";
	$noi_dung .= "</div>";

	$noi_dung .= "<h2 style='color:orange;'>Applicant Information</h2>";
	$noi_dung .= "<div style='background:#e1e1e1;margin-left:20px;padding:1px 10px;'>";
	$noi_dung .= "<p>For detailed candidate information please visit this link: <a href='$web_1'>$web_1</a></p>";
	$noi_dung .= "</div>";

	$noi_dung .= "<p>In case you have not paid yet then you are pleased to click <a href='$web_2' style='color:red;'>Pay Now</a> to pay directly with your Credit or Debit card.</p>";

	$action_email->email_send($email_1, 'Receipt of OrderID:# '.$evisa_id, $noi_dung);




	$d = -1;
	foreach ($_SESSION['step_1']['passport'] as $item) {
		$d++;
		$passport = $item;
		$portrait = $_SESSION['step_1']['portrait'][$d];
		$sql = "INSERT INTO persion_visa (evisa_book_id, portrait, passport) VALUES ($evisa_id, '$portrait', '$passport')";
		$result1 = mysqli_query($conn_vn, $sql);
	}
	