<?php 
	session_start();
	$number_applicant = $_GET['number_applicant'];
	$purpose = $_GET['purpose'];
	$type_visa = $_GET['type_visa'];
	$date = $_GET['date'];
	$airport_id = $_GET['airport_id'];
	$time = $_GET['time'];
	$name = $_GET['name'];
	$email_1 = $_GET['email_1'];
	$countryPrefix = $_GET['countryPrefix'];
	$phone = $_GET['phone'];
	$citizenship = $_GET['citizenship'];
	$category = $_GET['category'];
	$group_port = $_GET['group_port'];

	$countryPrefix = str_replace(" ", "+", $countryPrefix);

	if (isset($_SESSION['step_1'])) {
		$_SESSION['step_1'] = array(
						'number_applicant' => $number_applicant,
						'purpose' => $purpose,
						'type_visa' => $type_visa,
						'date' => $date,
						'airport_id' => $airport_id,
						'time' => $time,
						'name' => $name,
						'email_1' => $email_1,
						'countryPrefix' => $countryPrefix,
						'phone' => $phone,
						'citizenship' => $citizenship,
						'category' => $category,
						'group_port' => $group_port
		);
	} else {
		$_SESSION['step_1'] = array(
						'number_applicant' => $number_applicant,
						'purpose' => $purpose,
						'type_visa' => $type_visa,
						'date' => $date,
						'airport_id' => $airport_id,
						'time' => $time,
						'name' => $name,
						'email_1' => $email_1,
						'countryPrefix' => $countryPrefix,
						'phone' => $phone,
						'citizenship' => $citizenship,
						'category' => $category,
						'group_port' => $group_port
		);
	}