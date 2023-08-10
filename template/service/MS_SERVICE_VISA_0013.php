<?php 
    $slug = isset($_GET['slug']) ? $_GET['slug'] : '';

    $rowLang = $action_service->getServiceLangDetail_byUrl($slug,$lang);
    $row = $action_service->getServiceDetail_byId($rowLang['service_id'],$lang);
    $_SESSION['sidebar'] = 'newsDetail';

    $service_sub_1 = $action->getDetail('content_service', 'id', 29);
    // $service_sub_2 = $action->getDetail('content_service', 'id', 14);


    $service_sub_1 = str_replace('<span style="background-color:#3498db">', '<span class="num">', $service_sub_1);
    // $service_sub_2 = str_replace('<span style="background-color:#3498db">', '<span class="num">', $service_sub_2);

    $list_country_visa = $action->getList('quoc_gia', '', '', 'name', 'asc', '', '', '');
    $list_country_visa_popular = $action->getList('quoc_gia', 'most_popular', '1', 'name', 'asc', '', '', '');


    $list_faq = $action->getList('faq_service', 'service_id', $row['service_id'], 'id', 'asc', '', '', '');
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

.__short-btn-check .__short-search {
    display: flex;
    flex-wrap: nowrap;
    width: 65%;
}
.__short-btn-check .__short-search .wrap-ip-search {
    border: 1px solid #d8d8d8;
    border-right: 0;
    padding: 11px 30px 11px 16px;
    width: 100%;
    border-radius: 4px 0 0 4px;
    position: relative;
}
.__short-btn-check .__short-search .wrap-ip-search .__t-search {
    border: none;
    width: 100%;
}
.__short-btn-check .__short-search .wrap-ip-search .__t-search:focus-visible {
    border: 0;
    outline: 0;
}
.__short-btn-check .__short-search .wrap-ip-search .icon-topbar-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: 11px;
}
.__short-btn-check .__short-search .btn-shor-check {
    border-radius: 0 4px 4px 0 !important;
    padding: 11px 23px;
    display: flex;
    align-items: center;
    color: #fff;
    color: #fff !important;
    font-weight: 500;
    background-image: linear-gradient(135deg, #1dc675 0.42%, #1dc675 100%) !important;
    border-image-slice: 1;
    border-width: 0px;
    position: relative;
    z-index: 1;
    border-radius: 8px;
}
.__short-btn-check .__short-search .wrap-ip-search .__list-req-emb {
    max-height: 290px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 0 1px rgb(68 68 68 / 11%);
    box-sizing: border-box;
    margin-top: 3px;
    opacity: 0;
    overflow: auto;
    padding: 0;
    pointer-events: none;
    position: absolute;
    top: 100%;
    max-height: 260px;
    left: 0;
    -webkit-transform-origin: 50% 0;
    -ms-transform-origin: 50% 0;
    transform-origin: 50% 0;
    -webkit-transform: scale(0.75) translateY(-21px);
    -ms-transform: scale(0.75) translateY(-21px);
    transform: scale(0.75) translateY(-21px);
    -webkit-transition: all .2s cubic-bezier(0.5, 0, 0, 1.25),opacity .15s ease-out;
    transition: all .2s cubic-bezier(0.5, 0, 0, 1.25),opacity .15s ease-out;
    z-index: 9;
    width: 100%;
}
.__short-btn-check .__short-search .wrap-ip-search .__list-req-emb.open {
        opacity: 1;
    pointer-events: auto;
    -webkit-transform: scale(1) translateY(0);
    -ms-transform: scale(1) translateY(0);
    transform: scale(1) translateY(0);
}
.__short-btn-check .__short-search .wrap-ip-search .__list-req-emb li {
    list-style: none;
    padding: 8px 16px;
    cursor: pointer;
}
@media screen and (max-width: 768px) {
    .__short-btn-check .__short-search {
        width: 100%;
    }
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

.tab-content table {
    width: 100%;
}
.tab-content table th {
    padding: 10px;
    background: #f0f6ff;
}
.tab-content table td {
    padding: 10px;
}

.mau-do {
    color: red;
}

@media screen and (max-width: 768px) {
    .mb_tab {
        width: 100%;
    }
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
}
</style>
<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_VISA_0002.php";?>
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
					<?= $service_sub_1['note_en'] ?>
				</div>
                <br>
				<?php //include DIR_INTRODUCE."MS_INTRODUCE_CUANHOM_0006.php";?>
				
				
			</div>

            <div class="country-visa">
                <div class="__short-btn-check">
            <div class="wrap-search-requirement __short-search">
                <div class="wrap-ip-search">
                    <input class="search-requirement __t-search js-t-search" id="input-filter-country" onkeyup="filter_list(this.value)" type="text" placeholder="Select your nationality" autocomplete="off">
                    <span class="icon-topbar-arrow"></span>
                    <ul class="list-requirement __list-req-emb" id="country-visa">
                        <?php foreach ($list_country_visa as $item) { ?>                                        
                            <li data-value="" onclick="chon_nation('<?= $item['requirement_url'] ?>', '<?= $item['name'] ?>')"><?= $item['name'] ?></li>
                        <?php } ?>       
                    </ul>
                </div>
                <a href="#" type="submit" id="nut-chon-nation" class="btn btn-blue-grad btn-requirement btn-shor-check"><span>Check</span>&nbsp; <span class="mb-rqm d-inline-block ml-1">requirement</span></a>
            </div>
        </div>
            </div>

<br>
            <div class="service-tab">
                <ul class="nav nav-tabs">
                  <li class="mb_tab"><a style="color: #000;">Showing nationality for:</a></li>
                  <li class="active"><a data-toggle="tab" href="#menu1" style="font-weight: bold;">Most popular</a></li>
                  <li><a data-toggle="tab" href="#menu2" style="font-weight: bold;">All countries</a></li>
                  <li><a  style="color: #000;">(*): Not required with conditions</a></li>
                </ul>
    
                <div class="tab-content">
                  
                  <div id="menu1" class="tab-pane fade in active">
                    <table cellspacing="0" cellpadding="0" class="table-bordered">
                        <thead>
                            <tr>
                                <th>Countries</th>
                                <th>Tourist visa</th>
                                <th>Business visa</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($list_country_visa_popular as $item) { 
                                if ($item['visa_required']==1) {
                                    $text_require = "Required";
                                    $red = '';
                                } else {
                                    $text_require = $item['visa_require_text'];
                                    $red = 'mau-do';
                                }
                            ?>
                                    <tr>
                                        <td><a class="c-green" href="/<?= $item['requirement_url'] ?>" title="Australia"><?= $item['name'] ?></a></td>
                                        <td><span class="c-red <?= $red ?>"><?= $text_require ?></span></td>
                                        <td><span class="c-red <?= $red ?>"><?= $text_require ?></span></td>
                                        
                                    </tr>
                            <?php } ?>               
                        </tbody>
                    </table>
                  </div>
                  <div id="menu2" class="tab-pane fade">
                    <table cellspacing="0" cellpadding="0" class="table-bordered">
                        <thead>
                            <tr>
                                <th>Countries</th>
                                <th>Tourist visa</th>
                                <th>Business visa</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($list_country_visa as $item) { 
                                if ($item['visa_required']==1) {
                                    $text_require = "Required";
                                    $red = '';
                                } else {
                                    $text_require = $item['visa_require_text'];
                                    $red = 'mau-do';
                                }
                            ?>
                                        <tr>
                                            <td><a class="c-green" href="/<?= $item['requirement_url'] ?>" title="Afghanistan"><?= $item['name'] ?></a></td>
                                            <td><span class="c-red <?= $red ?>"><?= $text_require ?></span></td>
                                            <td><span class="c-red <?= $red ?>"><?= $text_require ?></span></td>
                                        </tr>
                            <?php } ?>                       
                        </tbody>
                    </table>
                  </div>
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

<script>
$(document).ready(function(){
  $("#input-filter-country").focusin(function(){
    // $("#country-visa").css("opacity", "1");
    $("#country-visa").addClass("open");
  });
  $("#input-filter-country").focusout(function(){
    
     setTimeout(function() { 
        // $("#country-visa").css("opacity", "0");
        $("#country-visa").removeClass("open");
    }, 300);
  });
});
</script>
<script>
    function filter_list (val) {
        // alert('filter');
        // var input = document.getElementById('myInput');
        var filter = val.toUpperCase();

        var ul = document.getElementById("country-visa");
        var li = ul.getElementsByTagName('li');

        for (i = 0; i < li.length; i++) {
            // a = li[i].getElementsByTagName("a")[0];
            txtValue = li[i].textContent || li[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              li[i].style.display = "";
            } else {
              li[i].style.display = "none";
            }
        }
    }

    function chon_nation (link, nation) {
        // alert(nation);
        document.getElementById("input-filter-country").value = nation;
        document.getElementById("nut-chon-nation").setAttribute('href', '/'+link);
    }
</script>