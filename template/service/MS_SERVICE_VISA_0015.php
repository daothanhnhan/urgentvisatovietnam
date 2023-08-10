<?php 
    $slug = isset($_GET['slug']) ? $_GET['slug'] : '';

    $rowLang = $action_service->getServiceLangDetail_byUrl($slug,$lang);
    $row = $action_service->getServiceDetail_byId($rowLang['service_id'],$lang);
    $_SESSION['sidebar'] = 'newsDetail';

    $service_sub_1 = $action->getDetail('content_service', 'id', 31);
    // $service_sub_2 = $action->getDetail('content_service', 'id', 14);


    $service_sub_1 = str_replace('<span style="background-color:#3498db">', '<span class="num">', $service_sub_1);
    // $service_sub_2 = str_replace('<span style="background-color:#3498db">', '<span class="num">', $service_sub_2);


    $list_faq = $action->getList('faq_service', 'service_id', $row['service_id'], 'id', 'asc', '', '', '');
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
.page-service .police-check .box p {
    width: 80%;
    margin: auto;
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
                <br>
				<?php //include DIR_INTRODUCE."MS_INTRODUCE_CUANHOM_0006.php";?>
				
				
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
        <h4 class="modal-title">Request Vietnam Visa Extension Service</h4>
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
                        <input type="text" class="form-control" id="pwd" name="national" placeholder="Nationality" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="pwd" name="date" placeholder="Expected arrival date" >
                    </div>
                </div>
            </div>
            <div class="row">
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
                
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea name="note" class="form-control" placeholder="Special notes" rows="4"></textarea>
                    </div>
                </div>
            </div>
              
            
              <button type="submit" class="btn btn-primary">GIVE ME MY QUOTE</button>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>