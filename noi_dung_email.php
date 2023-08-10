<?php
	include_once dirname(__FILE__) . "/functions/database.php";
	include_once dirname(__FILE__) . "/functions/library.php";
	include_once dirname(__FILE__) . "/functions/action.php";

	$action = new action();

	session_start();
	// var_dump($_SESSION['step_1']);
	$name = $_SESSION['step_1']['name'];
	$now = date('M d, Y');
	$evisa_id = $_SESSION['step_1']['evisa_id'];
	$visa_type = $action->getDetail('type_visa', 'id', $_SESSION['step_1']['type_visa'])['name'];
	$national = $action->getDetail('quoc_gia', 'id', $_SESSION['step_1']['citizenship'])['name'];
	$process = $action->getDetail('processing_time', 'id', $_SESSION['step_1']['time'])['name'];
	$num = $_SESSION['step_1']['number_applicant'];
	$fee_visa = $action->getDetail('type_visa', 'id', $_SESSION['step_1']['type_visa'])['price'];
	$fee_service = $action->getDetail('processing_time', 'id', $_SESSION['step_1']['time'])['price'];

	$fee_total = ($fee_visa + $fee_service) * $num;

	$date = date('d/m/Y', strtotime($_SESSION['step_1']['date']));
	$airport = $action->getDetail('arrival_port', 'id', $_SESSION['step_1']['airport_id'])['name'];
	$email = $_SESSION['step_1']['email_1'];
	$phone = $_SESSION['step_1']['countryPrefix'] . ' ' . $_SESSION['step_1']['phone'];

	$web = 'http://'.$_SERVER['SERVER_NAME'];
	$web_1 = $web . '/info-order-review/'.$evisa_id;
	$web_2 = $web . '/pay-now/'.$evisa_id;

$noi_dung = "<p>Dear Mr/Ms. $name</p>";
$noi_dung .= "<p>Thank you very much for contacting us at https://urgentvisatovietnam.com. We have received your order on $now as follow. Below is the detail of the order:</p>";
$noi_dung .= "<h3>OrderID: $evisa_id</h3>";
$noi_dung .= "<h2 style='color:yellow;'>Your Order Summary</h2>";
$noi_dung .= "<div style='background:#e1e1e1;margin-left:20px;padding:1px 10px;'>";
$noi_dung .= "<p>1. Visa Type: $visa_type</p>";
$noi_dung .= "<p>2. Nationality: $national</p>";
$noi_dung .= "<p>3. Process Time: $process</p>";
$noi_dung .= "<p>4. Applicant Number: $num applicant(s)</p>";
$noi_dung .= "<p>5. Visa Fee: $ $fee_visa/visa</p>";
$noi_dung .= "<p>6. Service Fee: $ $fee_service/visa</p>";
$noi_dung .= "<p>7. Total Fee: $ $fee_total</p>";
$noi_dung .= "<p>8. Stamping Fee: eVisa is Included, Visa On Arrival is not included</p>";
$noi_dung .= "</div>";

$noi_dung .= "<h2 style='color:yellow;'>Application Details</h2>";
$noi_dung .= "<div style='background:#e1e1e1;margin-left:20px;padding:1px 10px;'>";
$noi_dung .= "<p>1. Date of entry: $date <span style='font-size:10px;'>(dd/mm/yyyy)</span></p>";
$noi_dung .= "<p>2. Arrival airport: $airport</p>";
$noi_dung .= "<p>3. Your email: $email</p>";
$noi_dung .= "<p>4. Contact Infor: $phone</p>";
$noi_dung .= "</div>";

$noi_dung .= "<h2 style='color:yellow;'>Applicant Information</h2>";
$noi_dung .= "<div style='margin-left:20px;padding:1px 10px;'>";
$noi_dung .= "<p>For detailed candidate information please visit this link: <a href='$web_1'>$web_1</a></p>";
$noi_dung .= "</div>";

$noi_dung .= "<p>In case you have not paid yet then you are pleased to click <a href='$web_2' style='color:red;'>Pay Now</a> to pay directly with your Credit or Debit card.</p>";

echo $noi_dung;