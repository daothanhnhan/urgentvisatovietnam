<?php 
	function check_status () {
		global $conn_vn;
		$action = new action();
		if (isset($_POST['check_status'])) {
			$id = mysqli_real_escape_string($conn_vn, $_POST['id']);
			$email = mysqli_real_escape_string($conn_vn, $_POST['email']);
			$ngay = date('Y-m-d H:i:s');

			$sql = "SELECT * FROM evisa_book WHERE id = $id AND email = '$email'";
			$result = mysqli_query($conn_vn, $sql);
			$num = mysqli_num_rows($result);
			if ($num == 0) {
				echo '<script>alert("The information you entered is incorrect.")</script>';
			} else {
				$row = mysqli_fetch_assoc($result);
				// $row['id'] = 88888;
				$text = (string)$row['id'];
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
				// echo $text_2;
				echo '<script>location.href = "/info-order/'.$text_2.'";</script>';
			}
		}
	}
	check_status();
?>

<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_CUANHOM_0002.php";?>
<style>
.check-status .box-form {
	background: #f0f7fd;
	padding: 50px;
	max-width: 400px;
	border-radius: 5px;
	margin-bottom: 20px;
}
.check-status .box-form button {
	width: 100%;
}
@media (min-width: 768px){
    .gb-single-blog_cuanhom .date-update {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
}

</style>
<div class="gb-single-blog_cuanhom check-status">
    <div class="container">
        <div class="row">
            <div class="col-md-8 gb-single-blog_cuanhom-right">
                
                <div class="gb-single-blog_cuanhom-right-title">
                    <h2>Check status</h2>
                </div>
                <div class="date-update">
                    <div class="date">
                        Last update: <?= date('M d, Y', strtotime('now')); ?>
                    </div>
                    <div class="social">
                        <img src="/images/fb.jpg" alt="fb">
                        <img src="/images/twitter.jpg" alt="twitter">
                    </div>
                </div>
                <hr>
                <p><?= $content_page_check_status ?></p>
               	<br>
                <div class="box-form">
                	<form action="" method="post">
					  <div class="form-group">
					    <label for="email">Your Oder ID:</label>
					    <input type="number" class="form-control" id="email" name="id" placeholder="Your Order ID" required="">
					  </div>
					  <div class="form-group">
					    <label for="pwd">Your email:</label>
					    <input type="email" class="form-control" id="pwd" name="email" placeholder="Enter email" required="">
					  </div>
					  
					  <button type="submit" name="check_status" class="btn btn-danger">Check status</button>
					</form>
                </div>
                

                

            </div>
            <div class="col-md-4 gb-blog-left">
                <?php //include DIR_SIDEBAR."MS_SIDEBAR_CUANHOM_0003.php";?>
                <?php //include DIR_SIDEBAR."MS_SIDEBAR_VISA_0002.php";?>
                <?php include DIR_SIDEBAR."MS_SIDEBAR_VISA_0003.php";?>
            </div>
        </div>
    </div>
</div>
