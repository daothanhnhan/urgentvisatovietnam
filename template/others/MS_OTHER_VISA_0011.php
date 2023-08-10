<?php //include DIR_BREADCRUMBS."MS_BREADCRUMS_VIETNAMFASTTRACK_0001.php";?>
<?php 
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

// $action_email = new action_email();
	if (isset($_POST['payment_online'])) {

		$name = $_POST['fullname'];
		$email = $_POST['email'];
		$amount = $_POST['amount'];
		$description = $_POST['description'];
		$appid = $_POST['appid'];
		$product = $name . '-' . $email . '-' . $description;
		// echo $product;
$noidung = "Hello $name,<br> 
We have received your request of online payment for the service of Vietnam Fast Track. Thank you for contacting us and using our service. Please kindly wait for our payment confirmation email. <br>
Should you have any queries, please feel free to contact us.<br>
We look forward to assisting you in your journey. <br>
Regards,<br>
Vietnam Fast Track  Team
";
// $action_email->email_send($email, 'Confirmation of successful submission', $noidung);
// echo '<script type="text/javascript">alert(\'Payment Success.\')</script>';

$price = (float)$amount;
$shipping = 0.00;

$total = $price + $shipping;

$payer = new Payer();
$payer->setPaymentMethod('paypal');

$item = new Item();
$item->setName($product)
	->setCurrency('USD')
	->setQuantity(1)
	->setPrice($price);

$itemList = new ItemList();
$itemList->setItems([$item]);

$details = new Details();
$details->setShipping($shipping)
	->setSubtotal($price);

$amount = new Amount();
$amount->setCurrency('USD')
	->setTotal($total)
	->setDetails($details);

$transaction = new Transaction();
$transaction->setAmount($amount)
	->setItemList($itemList)
	->setDescription('mo ta o day')
	->setInvoiceNumber(uniqid());

$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl(SITE_URL . 'pay.php?success=true')
	->setCancelUrl(SITE_URL . 'pay.php?success=false');

$payment = new Payment();
$payment->setIntent('sale')
	->setPayer($payer)
	->setRedirectUrls($redirectUrls)
	->setTransactions([$transaction]);

try {
	$payment->create($paypal);
} catch (Exception $e) {
	echo '<pre>';
	var_dump($e);
	die();
}

$approvalUrl = $payment->getApprovalLink();
echo $approvalUrl;

header("location: {$approvalUrl}");
	}
?>
<?php 
  // $action_page = new action_page();
  // $paon_page = $action_page->getPageLangDetail_byId(56, $lang);
?>

<div class="container">
  <div style="margin: 30px auto;">
    <?= $paon_page['lang_page_content'] ?>
  </div>
  <h2 style="font-size: 2em;">PAYMENT ONLINE</h2>
  <hr>
  <h4> Please fill the form to place an order</h4>
  <form class="form-horizontal" action="" method="post">
    <div class="form-group">
      <label class="control-label col-sm-3" for="fullname">Your Fullname <span style="color: red;">*</span>:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="fullname" placeholder="Enter your fullname" name="fullname" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Email <span style="color: red;">*</span>:</label>
      <div class="col-sm-9">          
        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="appid">Application ID:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="appid" placeholder="Enter your application id" name="appid">
        <span style="line-height: 25px">E.g: VAF0001</span>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="amount">Amount(USD) <span style="color: red;">*</span>:</label>
      <div class="col-sm-9">
        <input type="number" class="form-control" id="amount" placeholder="50" name="amount" min="0" step="0.01" required>
        <span style="line-height: 25px">E.g: 50</span>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="description">Payment Description <span style="color: red;">*</span>:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="description" name="description" required>
        <span style="line-height: 25px">E.g: I would like to pay for...</span>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-3 col-sm-9">
        <button type="submit" class="btn btn-danger" name="payment_online">Payment</button>
      </div>
    </div>
  </form>
  <h4>Payment Method</h4>
  <p>After payment is made, you will receive an email confirming your order.</p>
  <div style="text-align: center;">
  	<img src="/images/paypal.png">
  </div>
</div>