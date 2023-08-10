<?php 
    $slug = isset($_GET['slug']) ? $_GET['slug'] : '';

    $rowLang = $action_service->getServiceLangDetail_byUrl($slug,$lang);
    $row = $action_service->getServiceDetail_byId($rowLang['service_id'],$lang);
    $_SESSION['sidebar'] = 'newsDetail';

    $service_sub_1 = $action->getDetail('content_service', 'id', 19);
    $service_sub_2 = $action->getDetail('content_service', 'id', 20);


    $service_sub_1 = str_replace('<span style="background-color:#3498db">', '<span class="num">', $service_sub_1);
    $service_sub_2 = str_replace('<span style="background-color:#3498db">', '<span class="num">', $service_sub_2);


    $list_faq = $action->getList('faq_service', 'service_id', $row['service_id'], 'id', 'asc', '', '', '');
?>
<?php 
    function uploadPicture($src, $img_name, $img_temp){

        $src = $src.$img_name;//echo $src;

        if (!@getimagesize($src)){

            if (move_uploaded_file($img_temp, $src)) {

                return true;

            }

        }

    }

    function urgent_visa () {
        global $conn_vn;
        if (isset($_POST['urgent_visa'])) {
            $src= "images/upload/";
            // $src = "uploads/";

            $passport = '';
            if(isset($_FILES['passport']) && $_FILES['passport']['name'] != ""){

                $time = time();

                uploadPicture($src, $time.$_FILES['passport']['name'], $_FILES['passport']['tmp_name']);
                $passport = $time.$_FILES['passport']['name'];

            }

            $portrait = '';
            if(isset($_FILES['portrait']) && $_FILES['portrait']['name'] != ""){

                $time = time();

                uploadPicture($src, $time.$_FILES['portrait']['name'], $_FILES['portrait']['tmp_name']);
                $portrait = $time.$_FILES['portrait']['name'];

            }

            $flight = '';
            if(isset($_FILES['flight']) && $_FILES['flight']['name'] != ""){

                $time = time();

                uploadPicture($src, $time.$_FILES['flight']['name'], $_FILES['flight']['tmp_name']);
                $flight = $time.$_FILES['flight']['name'];

            }
            // var_dump($image);die;
            $name = mysqli_real_escape_string($conn_vn, $_POST['name']);
            $email = mysqli_real_escape_string($conn_vn, $_POST['email']);
            $phone = mysqli_real_escape_string($conn_vn, $_POST['phone']);
            $number = mysqli_real_escape_string($conn_vn, $_POST['number']);
            $national = mysqli_real_escape_string($conn_vn, $_POST['national']);
            $date = mysqli_real_escape_string($conn_vn, $_POST['date']);
            $port = mysqli_real_escape_string($conn_vn, $_POST['port']);
            $time = mysqli_real_escape_string($conn_vn, $_POST['time']);
            $note = mysqli_real_escape_string($conn_vn, $_POST['note']);

            $sql = "INSERT INTO urgent_visa_book (name, email, phone, `number`, national, `date`, port, `time`, note, passport, portrait, flight) VALUES ('$name', '$email', '$phone', '$number', '$national', '$date', '$port', '$time', '$note', '$passport', '$portrait', '$flight')";
            $result = mysqli_query($conn_vn, $sql);
            if ($result) {
                echo '<script type="text/javascript">alert(\'You have successfully registered.\')</script>';
            } else {
                echo '<script type="text/javascript">alert(\'Có lỗi xảy ra.\')</script>';
                echo mysqli_error($conn_vn);
            }
            
        }
    }

    urgent_visa();
?>
<style>
.page-service h1 {
	font-size: 32px;
    line-height: 40px;
    font-weight: bold;
}
.page-service .content {
	line-height: 2;
}
.page-service .content p {
	line-height: 2;
}
.page-service .content h1 {
	font-size: 2em;
}
.page-service .content h2 {
	font-size: 1.5em;
}
.page-service .content h3 {
	font-size: 1.17em;
}
.page-service .content h4 {
	/*font-size: 2em;*/
}
.page-service .content h5 {
	font-size: 0.83em;
}
.page-service .content h6 {
	font-size: 0.67em;
}
.page-service .content ul, .page-service .content ol {
	list-style: revert;
	margin-left: 20px;
}
.page-service .content table {
	width: 100%;
}
.page-service .content table th {
	border: 1px solid #ccc;
	padding: 10px;
	background: #dee2e6;
}
.page-service .content table td {
	border: 1px solid #ccc;
	padding: 10px;
}
@media (min-width: 768px){
	.page-service .date-update {
		display: flex;
		align-items: center;
		justify-content: space-between;
	}
}
.page-service .content .num {
	border-radius: 50%;
	color: #fff;
	background: #3498db;
	padding: 3px 12px;
}
.page-service .content button {
	margin-top: 20px;
	margin-bottom: 20px;
}
@media (min-width: 768px){
	.modal-dialog {
	    margin: 60px auto;
	}
}

.shor__faq {
    margin-bottom: 16px;
    margin-top: 64px;
}
.shor__faq h2 {
    font-size: 24px;
    line-height: 32px;
    font-weight: bold;
    margin-top: 15px;
    margin-bottom: 24px;
}
.shor__faq .card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    /*border: 1px solid rgba(0,0,0,.125);*/
    border-radius: 0.25rem;
}
.card-header:first-child {
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
}
.shor__faq .card .card-header {
    background: rgba(0,0,0,0);
    border-bottom: 0;
    border-top: 1px solid #d8d8d8;
    padding: 16px;
}
.shor__faq [aria-expanded=false] {
    font-weight: normal;
}
.shor__faq .card .card-header a {
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: #222 !important;
    font-weight: bold;
}
.shor__faq [aria-expanded=false] .icon-show::before {
    content: "";
    font-family: "icomoon" !important;
}
.icon-plus:before {
    content: "";
    font-family: "icomoon" !important;
}
.shor__faq .card .card-body p {
    padding: 20px;
}
.shor__faq .card:last-child {
    border-bottom: 1px solid #d8d8d8;
}
.shor__faq .card .card-header .collapsed {
    font-weight: 100;
}

.page-service .police-check .box {
    border: 3px solid #DF1E26;
    padding: 30px 0px 30px 0px;
    text-align: center;
}
.page-service .police-check .box h3 {
    color: #000000;
    font-size: 35px;
    font-weight: 600;
}
.page-service .police-check .box a {
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
    fill: #FFFFFF;
    color: #FFFFFF;
    background-color: #DF1E26;
    border-radius: 0px 0px 0px 0px;
    padding: 15px 45px 15px 45px;
    display: inline-block;
    margin-top: 20px;
}

/*.page-service .content h2:nth-of-type(2) {
    border: 1px solid #d8d8d8;
    border-radius: 8px;
    margin: 0;
    margin-top: 20px;
    border-bottom: none;
    padding: 20px 0 15px 25px;
    border-left-width: 8px;
    border-left-color: #ffe187;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}*/
.page-service .content .btn-apply {
    margin-top: 20px;
    margin-bottom: 20px;
}
.page-service .content .btn-apply span {
    font-family: "SVN Airbnb-Cereal", Sans-serif;
    font-size: 15px;
    font-weight: 700;
    text-transform: uppercase;
    fill: #FFFFFF;
    color: #FFFFFF;
    background-color: #1167B1;
    border-radius: 10px 10px 10px 10px;
    padding: 15px 45px 15px 45px;
    display: inline-block;
}
blockquote {
    font-family: Georgia,serif;
    font-size: 16px;
    font-style: italic;
    width: 100%;
    margin: 0.25em 0;
    padding: 0.55em 40px;
    line-height: 1.45;
    position: relative;
    color: #383838;
    border-left: 3px dashed #c1c1c1;
    background: #eee;
}
</style>
<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_CUANHOM_0002.php";?>
<div class="container page-service">
	<div class="row">
		<div class="col-md-8">
			<h1 class=""><?= $rowLang['lang_service_name'] ?></h1>
			<div class="date-update">
				<div class="date">
					Last update: <?= date('M d, Y', strtotime($row['service_update_date'])); ?>
				</div>
				<div class="social">
					<img src="/images/fb.jpg" alt="fb">
					<img src="/images/twitter.jpg" alt="twitter">
				</div>
			</div>
			<hr>
			<div class="content">
				<div>
					<?= $service_sub_1['note_en'] ?>
				</div>
                <div class="btn-apply">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <span href="" title="" data-toggle="modal" data-target="#book-now-1"><i class="fa fa-rocket"></i> Request for Emergency Vietnam visa</span>
                        </div>
                        
                    </div>
                </div>
                <div>
                    <?= $service_sub_2['note_en'] ?>
                </div>
				<?php //include DIR_INTRODUCE."MS_INTRODUCE_CUANHOM_0006.php";?>
				
				
			</div>
            <div class="police-check hidden">
                <div class="box">
                    <h3>Ready to get Your Police Check?</h3>
                    <p>Send us your request online and we will do the rest!</p>
                    <a href="/police-check-application-form/">
                        <span>Get Started Now</span>
                    </a>
                </div>
            </div>
            <div class="shor__faq mt-64">
                <h2 class="hd-2 mb-4">Frequently Asked Questions</h2>
                <div id="accordion">
                    <?php 
                    $d = 0;
                    foreach ($list_faq as $item) { 
                        $d++;
                    ?>
                        <div class="card ">
                            <div class="card-header">
                                <a class="card-link collapsed" data-toggle="collapse" href="#collapse-<?= $d ?>" aria-expanded="false">
                                    <span><?= $item['name_en'] ?></span><span class="icon-plus icon-show"></span>
                                </a>
                            </div>
                            <div id="collapse-<?= $d ?>" class="collapse" style="">
                                <div class="card-body">
                                    <p><?= $item['note_en'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>                        
                </div>
            </div>
		</div>
		<div class="col-md-4">
			<?php include DIR_SIDEBAR."MS_SIDEBAR_VISA_0001.php";?>
			<?php include DIR_SIDEBAR."MS_SIDEBAR_VISA_0002.php";?>
			<?php include DIR_SIDEBAR."MS_SIDEBAR_VISA_0003.php";?>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="book-now-1" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Request for Urgent Vietnam visa</h4>
      </div>
      <div class="modal-body">
        
        <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        	<div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="pwd" name="name" placeholder="Contact Name" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="email" class="form-control" id="pwd" name="email" placeholder="Email" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="tel" class="form-control" id="pwd" name="phone" placeholder="Mobile Number" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="pwd" name="number" placeholder="Number of Applicants" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="pwd" name="national" placeholder="Nationality" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="pwd" name="date" placeholder="Expected arrival date" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="pwd" name="port" placeholder="Port of arrival" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select name="time" class="form-control">
                            <option value="2 - 3 working days">2 - 3 working days</option>
                            <option value="1 working day">1 working day</option>
                            <option value="4 working hours">4 working hours</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Please upload your passport photo</label>
                        <input type="file" class="form-control" id="pwd" name="passport" placeholder="Port of arrival" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Please upload your portrait photo</label>
                        <input type="file" class="form-control" id="pwd" name="portrait" placeholder="Port of arrival" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Please upload your Flight Ticket</label>
                        <input type="file" class="form-control" id="pwd" name="flight" placeholder="Port of arrival" >
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea name="note" class="form-control" placeholder="Special notes" rows="4"></textarea>
                    </div>
                </div>
            </div>
			  
			
			  <button type="submit" name="urgent_visa" class="btn btn-danger">Request Now</button>
        	
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>