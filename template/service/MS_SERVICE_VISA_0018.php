<?php 
    $slug = isset($_GET['slug']) ? $_GET['slug'] : '';

    $rowLang = $action_service->getServiceLangDetail_byUrl($slug,$lang);
    $row = $action_service->getServiceDetail_byId($rowLang['service_id'],$lang);
    $_SESSION['sidebar'] = 'newsDetail';

    // $service_sub_1 = $action->getDetail('content_service', 'id', 33);
    // $service_sub_2 = $action->getDetail('content_service', 'id', 34);
    // $service_sub_3 = $action->getDetail('content_service', 'id', 35);


    // $service_sub_1 = str_replace('<span style="background-color:#3498db">', '<span class="num">', $service_sub_1);
    // $service_sub_2 = str_replace('<span style="background-color:#3498db">', '<span class="num">', $service_sub_2);

    $rowLang['lang_service_content'] = str_replace('<span style="background-color:#3498db">', '<span class="num">', $rowLang['lang_service_content']);
    $rowLang['lang_service_content'] = str_replace('<span style="background-color:#2980b9">', '<span class="nut">', $rowLang['lang_service_content']);


    $list_faq = $action->getList('faq_service', 'service_id', $row['service_id'], 'id', 'asc', '', '', '');

    $quoc_gia = $action->getList('quoc_gia', '', '', 'id', 'asc', '', '', '');

    function service_book () {
        global $conn_vn;
        $action_email = new action_email();
        $action = new action();
        if (isset($_POST['service_book'])) {
            $title = mysqli_real_escape_string($conn_vn, $_POST['title']);
            $name = mysqli_real_escape_string($conn_vn, $_POST['name']);
            $nation = mysqli_real_escape_string($conn_vn, $_POST['nation']);
            $email = mysqli_real_escape_string($conn_vn, $_POST['email']);
            $phone_1 = mysqli_real_escape_string($conn_vn, $_POST['phone_1']);
            $phone_2 = mysqli_real_escape_string($conn_vn, $_POST['phone_2']);
            $note = mysqli_real_escape_string($conn_vn, $_POST['note']);

            $ngay = date('Y-m-d H:i:s');

            $noidung = "<ul>";
            $noidung .= "<li>Title: $title</li>";
            $noidung .= "<li>Name: $name</li>";
            $noidung .= "<li>National: $nation</li>";
            $noidung .= "<li>Email: $email</li>";
            $noidung .= "<li>Phone: $phone_1 $phone_2</li>";
            $noidung .= "<li>Message: $note</li>";
            $noidung .= "</ul>";

            $action_email->email_send_2('sale@urgentvisatovietnam.com', 'Service book', $noidung);

            $sql = "INSERT INTO service_book (title, name, nation, email, phone_1, phone_2, note, ngay, state) VALUES ('$title', '$name', '$nation', '$email', '$phone_1', '$phone_2', '$note', '$ngay', '1')";
            $result = mysqli_query($conn_vn, $sql);
            if ($result) {
                echo '<script type="text/javascript">alert(\'You have successfully registered.\')</script>';
            } else {
                echo '<script type="text/javascript">alert(\'Có lỗi xảy ra.\')</script>';
                echo mysqli_error($conn_vn);
            }
        }
    }
    service_book();

    if (empty($row['service_author'])) {
        $nut = '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#book-now-1">Submit Request</button>';
    } else {
        $nut = '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#book-now-1">'.$row['service_author'].'</button>';
    }
    
    $rowLang['lang_service_content'] = str_replace('[submit]', $nut, $rowLang['lang_service_content']);

    $countryPrefix = $action->getList("countryPrefix","","","name","asc", "", "", "");
?>
<style>
/*.page-service h1 {
	font-size: 32px;
    line-height: 40px;
    font-weight: bold;
}*/
.page-service .title-service {
    font-size: 2em;
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
.page-service .content .nut {
    background-color: #1167B1;
    padding: 10px 40px;
    margin-top: 10px;
    margin-bottom: 10px;
    display: inline-block;
    font-weight: bold;
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
    padding: 16px 16px 16px 0;
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
    text-decoration: none;
}
.shor__faq [aria-expanded=false] .icon-show::before {
    content: "";
    font-family: "icomoon" !important;
}
.shor__faq [aria-expanded=true] .icon-show::before {
    content: "";
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

.page-service .exemption .box {
    border: 2px solid #DF1E26;
    padding: 30px 0px 30px 0px;
    text-align: center;
    border-radius: 10px;
    margin-top: 10px;
    margin-bottom: 10px;
}
.page-service .exemption .box h2 {
    color: #007CBA;
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 20px;
}
.page-service .exemption .box .nut {
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
    fill: #FFFFFF;
    color: #FFFFFF;
    background-color: #1167B1;
    border-radius: 0px 0px 0px 0px;
    padding: 15px 45px 15px 45px;
    display: inline-block;
    margin-top: 20px;
}
.page-service .exemption .box .box-sub {
    text-align: left;
    width: 80%;
    margin: auto;
    background-color: #F4FCFF;
    padding: 20px;
    color: #007CBA;
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

.page-service .form-nhap {
    font-family: "SVN Airbnb-Cereal", Sans-serif;
    font-size: 15px;
    font-weight: 700;
    text-transform: uppercase;
    fill: #FFFFFF;
    color: #FFFFFF;
    background-color: #1167B1;
    border-radius: 10px 10px 10px 10px;
    padding: 10px 45px 10px 45px;
    margin-top: 10px;
    margin-bottom: 10px;
    display: inline-block;
}

.service-faqs-page .card .card-body ul, .service-faqs-page .card .card-body ol {
    list-style: revert;
    margin-left: 30px;
    margin-bottom: 10px;
}
.shor__faq .card .card-body {
    padding: 10px 10px 10px 0;
}
.shor__faq .card .card-body p {
    padding: 0;
    margin-bottom: 20px;
}

@media screen and (max-width: 768px) {
    .page-service .content h1 {
        font-size: 1.7em;
    }
    .page-service .content h2 {
        font-size: 1.3em;
    }
    .page-service .title-service {
        font-size: 1.7em;
    }

    .shor__faq {
        margin-top: 20px;
    }
}
</style>
<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_CUANHOM_0002.php";?>
<div class="container page-service">
	<div class="row">
		<div class="col-md-8">
			<h1 class="title-service"><?= $rowLang['lang_service_name'] ?></h1>
            <br>
			<div class="date-update">
				<div class="date">
					Last update: <?= date('M d, Y', strtotime($row['service_update_date'])); ?>
				</div>
				<div class="social">
					<a href="<?= $rowConfig['link1'] ?>"><img src="/images/fb.jpg" alt="fb"></a>
                    <a href="<?= $rowConfig['link2'] ?>"><img src="/images/twitter.jpg" alt="twitter"></a>
				</div>
			</div>
			<hr>
			<div class="content">
				<div>
					<?= $rowLang['lang_service_content'] ?>
				</div>
                
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#book-now-1"><?= empty($row['service_author']) ? 'Submit Request' : $row['service_author'] ?></button>
                
				
			</div>
            
            <div class="shor__faq mt-64 service-faqs-page">
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
<div id="book-now-1" class="modal fade" role="dialog" style="z-index: 999999;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?= $rowLang['lang_service_name'] ?><span id="popup-title"></span></h4>
      </div>
      <div class="modal-body">
        <!-- <p>Please fill the form below to book <span id="popup-line"></span></p> -->
        <form action="" method="post" accept-charset="utf-8">
            <input type="hidden" name="title" value="<?= $rowLang['lang_service_name'] ?>">
            
              <div class="form-group">
                <label for="pwd">Your Fullname:</label>
                <input type="text" class="form-control" id="pwd" name="name" placeholder="Your Fullname" required="">
              </div>
              <div class="form-group">
                <label for="email">Your Nationality:</label>
                <select name="nation" class="form-control">
                    <?php foreach ($quoc_gia as $quoc) { ?>
                    <option value="<?= $quoc['name'] ?>"><?= $quoc['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="email2">Email:</label>
                <input type="email" class="form-control" id="email2" name="email" placeholder="Your email" required="">
                <input type="hidden" name="note" value="" id="input_note">
            </div>
            <div class="form-group">
                <label for="email1">Phone number:</label>
                <div class="row">
                    <div class="col-xs-5">
                        <select class="form-control" id="sel1" name="phone_1">
                            <?php foreach ($countryPrefix as $item) { ?>
                            <option value="<?= $item['perfix'] ?>"><?= $item['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-xs-7">
                        <input type="number" class="form-control" id="email1" name="phone_2" placeholder="Your Phone number" required="">
                    </div>
                </div>
            </div>

            <div class="form-group">
              <label for="comment">Your message:</label>
              <textarea class="form-control" rows="5" id="comment" name="note"></textarea>
            </div>

            <div class="text-center">
                <button type="submit" name="service_book" class="btn btn-danger">Submit request</button>
            </div>
              
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>