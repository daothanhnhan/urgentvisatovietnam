<!DOCTYPE html>
<html lang="en">
<head>
  <title>Payment Success</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

  <link rel="stylesheet" href="/plugin/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/plugin/bootstrap/css/bootstrap-theme.css">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css'>
    <link rel="stylesheet" href="/plugin/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style-cuanhom.css">
    <script src="/plugin/jquery/jquery-2.0.2.min.js"></script>
    <script src="/plugin/bootstrap/js/bootstrap.js"></script>
</head>
<body>
<?php 
	include_once dirname(__FILE__) . "/functions/database.php";
	session_start();
	$order_id = $_SESSION['create_order_id'];
	// $order_id = 20046;

	$sql = "UPDATE create_order SET state = 1 WHERE id = $order_id";//var_dump($sql);
	$result = mysqli_query($conn_vn, $sql);

	$sql = "SELECT * FROM config WHERE config_id = 1";
	$result = mysqli_query($conn_vn, $sql);
	$row = mysqli_fetch_assoc($result);//var_dump($reo)
	/////////////////////////////////
	include_once('config.php');
	include_once('__autoload.php');
$action = new action();
include_once dirname(__FILE__).DIR_FUNCTIONS."database.php";
// $urlAnalytic = $action->showabc();    
include_once dirname(__FILE__).DIR_FUNCTIONS_PAGING."pagination.php";
include_once 'functions/phpmailer/class.smtp.php';
include_once 'functions/phpmailer/class.phpmailer.php';
include_once "functions/vi_en.php";

include_once dirname(__FILE__).DIR_FUNCTIONS_LANGUAGE."lang_config.php";

$action_email = new action_email();
// echo $translate['link_contact'];die;
$trang = isset($_GET['trang']) ? $_GET['trang'] : '1';
// $action = new action();
$cart = new action_cart();
$menu = new action_menu();
$action_product = new action_product();
$action_news = new action_news();
$action_service = new action_service();
if($lang == "vn"){
    $rowConfig_lang = $action->getDetail('config_languages','id',1);
}else{
    $rowConfig_lang = $action->getDetail('config_languages','id',2);
}


$rowConfig = $action->getDetail('config','config_id',1);
?>
<?php include_once dirname(__FILE__).DIR_THEMES."header.php";?>
<style>
.title {
    text-align: center;
    font-size: 30px;
    font-weight: bold;
    margin-top: 20px;
}
.giua {
	text-align: center;
}
img {
	margin: auto;
	width: 200px;
	display: block;
}
@media screen and (max-width: 768px) {
	img {
		width: 70%;
	}
	.title {
		font-size: 20px;
	}
}
footer .title {
	text-align: left;
}
</style>
<a href="/" style="margin-top: 30px;display: block;"><img src="/images/<?= $row['web_logo'] ?>" alt=""></a>
<h1 class="title">Vietnam Visa Online Application</h1>
<br>
<br>
<br>
<br>
<h1 class="title" style="color: blue">You have successfully placed your order!</h1>
<br>
<!-- <p class="giua">You can check the status of your visa here: <a href="/check-status">Check Status</a></p> -->
<?php include_once dirname(__FILE__).DIR_THEMES."footer.php"; ?>
</body>

</html>