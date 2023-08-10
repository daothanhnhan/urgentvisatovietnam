<?php 
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

// require 'app/start.php';
// function curPageURL_paypal() {
//      $pageURL = 'http';
//      if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
//      $pageURL .= "://";
//      if ($_SERVER["SERVER_PORT"] != "80") {
//       $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].'/';
//      } else {
//       $pageURL .= $_SERVER["SERVER_NAME"].'/';
//      }
//      return $pageURL;
// }
// $link_paypal = curPageURL_paypal();
////////////////
include_once dirname(__FILE__).'/functions/vendor/autoload.php';

define('SITE_URL', 'http://urgentvisatovietnam.cafelink.org/');
// define('SITE_URL', $link_paypal);

// tuan
// $paypal = new \PayPal\Rest\ApiContext(
//         new \PayPal\Auth\OAuthTokenCredential(
//                 'AYq5y9QlbbGxamZstVQWDD8-WzIgMcHfbcKJazHRSy7_ncmiedv-up80-JP7po2O1C2mvlif_GGShuVC',
//                 'EErTXQIqJyU6GFhvdlSC0nbCFqMEI4ztOa91xovHiBnPvERlnz8-0eyJJ129sBs7v6h5XnknLARise9y'
//             )
//     );

// khach
$paypal = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
                'AQaiYzjhbhQebtlyWt4CmxbT6SfaibmNNmXNQeiKlTFd6HPx1tbVzGTWk7cW98MPrombbZhLmzP8ogMJ',
                'EBbPICs2FEVde0UtWRRA4u0jL0Jbn4gw-HdQVYIGBg3LvU-GsfnP7W-7c_QFopfQjJEXmkdUfk5bEL5l'
            )
    );

$paypal->setConfig([
    'mode' => ('live'),
]);
////////////////

if (!isset($_GET['success'], $_GET['paymentId'], $_GET['PayerID'])) {
    include_once dirname(__FILE__) . "/fail.php";
	die();
}

if ((bool)$_GET['success'] === false) {
    include_once dirname(__FILE__) . "/fail.php";
	die();
}

$paymentId = $_GET['paymentId'];
$payerId = $_GET['PayerID'];

$payment = Payment::get($paymentId, $paypal);

$execute = new PaymentExecution();
$execute->setPayerId($payerId);

try {
	$result = $payment->execute($execute, $paypal);
} catch (Exception $e) {
	die($e);
}

include_once dirname(__FILE__) . "/success.php";
// echo 'success thank ';
// echo '<a href="/">tiếp tục</a>';