<?php 
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
	// var_dump($text_2);
	$order = $action->getDetail('evisa_book', 'id', $text_2);//var_dump($order);

	$reshow_type = (int)$order['fee_service'];
    $reshow_time = (int)$order['fee_process'];
    $reshow_price = ($reshow_type + $reshow_type) * $order['number'];

    if ($order['number'] > 1) {
        $person = 'persons';
        $applicant = 'applicants';
    } else {
        $person = 'person';
        $applicant = 'applicant';
    }

    $arr = array('Received', 'Excuting', 'Finished');
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
	color: blue;
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
.payment-page .info-status {
	margin-top: 5px;
	background: #bdcedb;
	padding: 5px;
}
.payment-page .info-status span {
	color:red;
}
.payment-page .info-status .first {
	margin-bottom: 10px;
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
<div class="payment-page container">
	<h1 class="title">Vietnam Visa Online Application</h1>
	<br>
	<br>
	<br>
	<div style="text-align: center;">
		<span class="badge">5</span>
	</div>
	<p class="text-2">Check Status</p>
	<br>

	<div class="order-id">
		<p><b>Order ID:</b> #<?= $order['id'] ?></p>
	</div>
	<div class="order-id info-status">
		<p class="first"><b>Visa Processing:</b> <span><b><?= $arr[$order['visa_state']] ?></b></span></p>
		<p><b>Visa Payment:</b> <span><b><?= $order['payment']==0 ? 'Not paid' : 'Paid' ?></b></span></p>
	</div>
	<div style="height: 10px;">
		
	</div>
	<div class="row">
		<div class="col-md-7">
			<div class="box-left">
				<h2>VISA INFORMATION</h2>
				<div class="row">
					<div class="col-xs-6"><b>Nationality:</b></div>
					<div class="col-xs-6 text-right"><?= $order['nation'] ?></div>
				</div>
				<div class="row">
					<div class="col-xs-6"><b>Purpose of visa:</b></div>
					<div class="col-xs-6 text-right"><?= $order['purpose'] ?></div>
				</div>
				<div class="row">
					<div class="col-xs-6"><b>Visa category:</b></div>
					<div class="col-xs-6 text-right"><?= $order['category'] ?></div>
				</div>
				<div class="row">
					<div class="col-xs-6"><b>Type of visa:</b></div>
					<div class="col-xs-6 text-right"><?= $order['type_visa'] ?></div>
				</div>
				<div class="row">
					<div class="col-xs-6"><b>Arrival date:</b></div>
					<div class="col-xs-6 text-right"><?= $order['date'] ?></div>
				</div>
				<div class="row">
					<div class="col-xs-6"><b>Arrival airport:</b></div>
					<div class="col-xs-6 text-right"><?= $order['airport'] ?></div>
				</div>

				<br>
				<h2>CONTACT INFORMATION</h2>
				<div class="row">
					<div class="col-xs-6"><b>Contact name:</b></div>
					<div class="col-xs-6 text-right"><?= $order['name'] ?></div>
				</div>
				<div class="row">
					<div class="col-xs-6"><b>Contact email:</b></div>
					<div class="col-xs-6 text-right"><?= $order['email'] ?></div>
				</div>
				<div class="row">
					<div class="col-xs-6"><b>Contact phone:</b></div>
					<div class="col-xs-6 text-right"><?= $order['phone'] ?></div>
				</div>
			</div>
			
		</div>
		<div class="col-md-5">
			<div class="box-right">
				<div class="box">
					<h2>YOUR ORDER</h2>
					<hr>
					<div class="row">
	                    <div class="col-xs-6 left"><b>Total applicants:</b></div>
	                    <div class="col-xs-6 right text-right"><?= $order['number'] ?> <?= $applicant ?></div>
	                </div>
	                <div class="row">
	                    <div class="col-xs-6 left"><b>Visa service fee:</b><br>EVISA-1 month single entry</div>
	                    <div class="col-xs-6 right text-right">$<?= $reshow_type ?> x <?= $order['number'] ?> <?= $person ?> = $<?= $reshow_type*$order['number'] ?></div>
	                </div>
	                <div class="row">
	                    <div class="col-xs-6 left"><b>Processing time:</b><br>5 Working Days, Mon-Fri</div>
	                    <div class="col-xs-6 right text-right">$<?= $reshow_time ?> x <?= $order['number'] ?> <?= $person ?> = $<?= $reshow_time*$order['number'] ?></div>
	                </div>
	                <div class="row">
                        <div class="col-xs-6 left"><b>Discount:</b></div>
                        <div class="col-xs-6 right text-right">$<?= $order['discount'] ?></div>
                    </div>
	                <div class="row">
	                    <div class="col-xs-6 left"><b>Current total fees:</b></div>
	                    <div class="col-xs-6 right text-right" style="font-size: 30px;">$<?= $order['fee'] ?>.00</div>
	                </div>
	                
				</div>
				    
			</div>
		</div>
	</div>
</div>