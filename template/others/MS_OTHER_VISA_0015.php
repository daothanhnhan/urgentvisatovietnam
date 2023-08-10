<?php 
	$ma_key_paypal = $action->getDetail('paypal_key', 'id', 1)['name'];//var_dump($ma_key_paypal);

	$text = strrev($_GET['trang']);
	$text_1 = substr($text, 0, -1);
	$text_leng = strlen($text_1);
	$text_2 = '';
	for ($i=0;$i < $text_leng;$i++) {
		$tmp = (int)$text[$i];
		if ($tmp < 3) {
			$tmp += 10;
		}
		$tmp = $tmp - 3;
		$text_2 .= (string)$tmp;
	}
	$_SESSION['create_order_id'] = $text_2;
	// var_dump($text_2);
	$order = $action->getDetail('create_order', 'id', $text_2);

	$price = $order['price'];
	$num = $order['num'];

    if ($order['num'] > 1) {
        $person = 'persons';
        $applicant = 'applicants';
    } else {
        $person = 'person';
        $applicant = 'applicant';
    }

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

    	if (isset($_POST['paypal'])) {
    		// echo 'chay';
    		// $action = new action();
    		// $order = $action->getDetail('evisa_book', 'id', $_SESSION['step_1']['evisa_id']);
    		$amount = $order['fee'];//echo $amount;
    		$name = $order['name'];
    		$email = $order['email'];
    		$phone = $order['phone'];
    		$order_id = $_SESSION['step_1']['evisa_id'];

    		$product = '#'.$order_id.'-'.$name.'-'.$email.'-'.$phone;
    		// echo $info;


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
// die();
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
<style>
.payment-page {
	margin-bottom: 20px;
}
.payment-page .title {
	text-align: center;
	font-size: 24px;
	font-weight: bold;
	margin-top: 20px;
}
@media screen and (max-width: 768px) {
	.payment-page .title {
		font-size: 20px;
	}
}
.payment-page .text-2 {
	text-align: center;
	font-size: 20px;
	font-weight: bold;
}
.payment-page .order-id {
	background: #ECF5FC;
	padding: 20px 5px;
}
.payment-page .order-id p {
	font-size: 20px;
}
.payment-page .box-left h2 {
	font-size: 20px;
	color: #065b91;
}
.payment-page .box-left .row {
	margin-bottom: 10px;
}
.payment-page .box-left {
	background: #f2f6f9;
	padding: 10px;
	border-radius: 5px;
}
.payment-page .box-right {
	background: #f2f6f9;
	padding: 10px;
	border-radius: 5px;
}
.payment-page .box-right .box {
	border-radius: 15px;
	background: #fff;
	border: 1px solid #ccc;
	padding: 10px;
}
.payment-page .box-right .box .row {
	margin-bottom: 10px;
}
.payment-page .box-right .box .row .right {
	color: #065b91;
	font-weight: bold;
}

.badge {
  background-color: #055788;
  color: #fff;
  font-weight: bold;
  border-radius: 50%;
  padding: 5px 10px;
  text-align: center;
  margin-left: 5px;
  font-size: 16px;
}
</style>
<script src="https://www.paypal.com/sdk/js?client-id=<?= $ma_key_paypal ?>&amp;currency=USD" data-sdk-integration-source="button-factory" data-uid-auto="uid_mvhxthxhxeamwlrsaugkgjxdfrjjzs"></script>
<div class="payment-page container">
	<h1 class="title">Vietnam Visa Online Application</h1>
	<br>
	<br>
	<br>
	<div style="text-align: center;">
		<span class="badge">1</span>
	</div>
	
	<p class="text-2">Make Payment</p>
	<br>

	<div class="order-id">
		<p><b>Order ID:</b> #<?= $text_2 ?></p>
	</div>
	<div style="height: 10px;">
		
	</div>
	<div class="row">
		<div class="col-md-7">
			<div class="box-left">
				<h2>ORDER INFORMATION</h2>
				<div class="row">
					<div class="col-xs-6"><b>Your Citizenship:</b></div>
					<div class="col-xs-6 text-right"><?= $order['citizenship'] ?></div>
				</div>
				<div class="row">
					<div class="col-xs-6"><b>Name Of Service:</b></div>
					<div class="col-xs-6 text-right"><?= $order['name_service'] ?></div>
				</div>
				<div class="row">
					<div class="col-xs-6"><b>Unit Price ($):</b></div>
					<div class="col-xs-6 text-right"><?= number_format($order['price']) ?></div>
				</div>
				<div class="row">
					<div class="col-xs-6"><b>Description:</b></div>
					<div class="col-xs-6 text-right"><?= $order['note'] ?></div>
				</div>
				<div class="row">
					<div class="col-xs-6"><b>Create Date:</b></div>
					<div class="col-xs-6 text-right"><?= date('M-d-Y', strtotime($order['ngay'])) ?></div>
				</div>
				

				<br>
				
			</div>
			
		</div>
		<div class="col-md-5">
			<div class="box-right">
				<div class="box">
					<h2>YOUR ORDER</h2>
					<hr>
					<div class="row">
	                    <div class="col-xs-6 left"><b>Total applicants:</b></div>
	                    <div class="col-xs-6 right text-right"><?= $num ?> <?= $applicant ?></div>
	                </div>
	                <div class="row">
	                    <div class="col-xs-6 left"><b>Service fee:</b></div>
	                    <div class="col-xs-6 right text-right">$<?= $price ?> x <?= $num ?> <?= $person ?> = $<?= $price*$num ?></div>
	                </div>
	                
	                <div class="row">
	                    <div class="col-xs-6 left"><b>Current total fees:</b></div>
	                    <div class="col-xs-6 right text-right" style="font-size: 30px;">$<?= $price*$num ?>.00</div>
	                </div>
	                <!-- <div class="row">
	                    <form action="" method="post" accept-charset="utf-8">
	                    	<button type="submit" name="paypal" style="display: none;" id="nut-paypal"></button>
	                    	<img src="/images/buton-paypal.png" alt="" style="width: 100%;" onclick="document.getElementById('nut-paypal').click();">
	                    </form>
	                </div> -->
	                <div>
	                	<div id="paypal-button-container"></div>
						<div id="paypal-button-message"></div>
	                </div>
				</div>
				    
			</div>
		</div>
	</div>
</div>

<script>
              function initPayPalButton() {
                paypal.Buttons({
                  style: {
                    shape: 'rect',
                    color: 'gold',
                    layout: 'vertical',
                    label: 'paypal',

                  },

                  createOrder: function(data, actions) {
                    return actions.order.create({                                       
                      purchase_units: [{
                                      amount: {                                      
										value: '<?= $price*$num ?>',
										currency_code: 'USD'
                                      },
                        			  description:'OrderID:<?= $text_2 ?>'
                                    }],                     
                    });
                  },

                  onApprove: function(data, actions) {
                    return actions.order.capture().then(function(orderData) {					  
                      if(orderData.status == 'COMPLETED'){                       
                        actions.redirect('https://<?= $_SERVER['SERVER_NAME'] ?>/success-create.php')	
                      }else{
                          const element = document.getElementById('paypal-button-message');
                          element.innerHTML = '';
                          element.innerHTML = '<h3>Fail to Payment!</h3>';
                      }
                      				
                    });
                  },
                    
                //onCancel: function (data) {
                          //const element = document.getElementById('paypal-button-message');
                          //element.innerHTML = '';
                          //element.innerHTML = '<h3></h3>';
                 //}
                  
                //onShippingChange: function(data, actions) {					
				//	return actions.reject();				
				//}  
                  
                }).render('#paypal-button-container');
                
                //fix the issue: paypal is not defined
                var waitForSdk = setInterval(function () {
                    if (typeof paypal !== 'undefined') {
                       clearInterval(waitForSdk);
                       paypal.Buttons.render('#paypal-button-container');
                    }
                  }, 100);
              }
              
              //function status(res) {
              //    if (!res.ok) {
              //        throw new Error(res.statusText);
              //    }
              //    return res;
              //}               
              initPayPalButton();
			</script>