<?php 
    // var_dump($_SESSION['step_1']);

    $countryPrefix = $action->getList('countryPrefix', '', '', 'name', 'asc', '', '', '');
    $airport_name = $action->getList('airport_name', '', '', 'id', 'asc', '', '', '');
    $quoc_gia = $action->getList('quoc_gia', '', '', 'id', 'asc', '', '', '');

    $quoc_gia_first = $action->getDetail('quoc_gia', 'id', $_SESSION['step_1']['citizenship']);
    $visa_category = json_decode($quoc_gia_first['visa_category'], true);//var_dump($visa_category);
    $type_visa_has = json_decode($quoc_gia_first['type_visa'], true);//var_dump($type_visa);
    // echo '<pre>';
    $list_type_visa = $action->getList('type_visa', 'category_id', $visa_category[0], 'sort', 'asc', '', '', '');//var_dump($list_type_visa);
    $list_type_visa_2 = array();
    foreach ($list_type_visa as $item) {
        if (in_array($item['id'], $type_visa_has)) {
            $list_type_visa_2[] = $item;
        }
    }

    if (!empty($list_type_visa_2[0]['id'])) {
    	$processing_time = $action->getList('processing_time', 'type_visa_id', $list_type_visa_2[0]['id'], 'sort', 'asc', '', '', '');//var_dump($processing_time);
    }
    
    $group_port = array();
    $list_port_arrival = array();

    $type_visa_des = '';
    $time_des = '';

    if (isset($_SESSION['step_1'])) {
        $type_visa_price = (int)$action->getDetail('type_visa', 'id', $_SESSION['step_1']['type_visa'])['price'];
        $time_price = (int)$action->getDetail('processing_time', 'id', $_SESSION['step_1']['time'])['price'];
        $price_fee = $type_visa_price + $time_price;

        $type_visa_des = $action->getDetail('type_visa', 'id', $_SESSION['step_1']['type_visa'])['des'];//var_dump($type_visa_des);
        $time_des = $action->getDetail('processing_time', 'id', $_SESSION['step_1']['time'])['des'];

        $group_port = $action->getList('arrival_port_group', 'category_id', $_SESSION['step_1']['category'], 'id', 'asc', '', '', '');//var_dump($group_port);
        $list_port_arrival = $action->getList('arrival_port', 'arrival_port_group_id', $_SESSION['step_1']['group_port'], 'id', 'asc', '', '', '');

        $list_type_visa = $action->getList('type_visa', 'category_id', $_SESSION['step_1']['category'], 'sort', 'asc', '', '', '');//var_dump($list_type_visa);
        $list_type_visa_2 = array();
        foreach ($list_type_visa as $item) {
            if (in_array($item['id'], $type_visa_has)) {
                $list_type_visa_2[] = $item;
            }
        }

        $active = 1;
        $processing_time = $action->getList_New('processing_time', array('type_visa_id', 'active'), array(&$_SESSION['step_1']['type_visa'], &$active), array('sort'), array('asc'), 'ii', '', '', '');//var_dump($processing_time);

        $reshow_type = $action->getDetail('type_visa', 'id', $_SESSION['step_1']['type_visa']);
        $reshow_time = $action->getDetail('processing_time', 'id', $_SESSION['step_1']['time']);
        $reshow_price = ($reshow_type['price'] + $reshow_time['price']) * $_SESSION['step_1']['number_applicant'];
    } 

    // var_dump($_SESSION['step_1']);
    // $airport = $action->getDetail('airport_name', 'id', 8)['name'];var_dump($airport);
    $purpose_of_visit = $action->getList('purpose_of_visit', '', '', 'id', 'asc', '', '', '');
?>
<style>
.tab-step {
    margin-left: auto;
    margin-right: auto;
    width: 70%;
    /*border-bottom: 3px #df1f26 solid;*/
}
.tab-booking {
    float: left;
    width: 100%!important;
}
.tab-booking li {
    width: 33%;
    padding: 0px;
    height: 100px;
    font-size: 19px!important;
    text-align: center;
    padding-top: 35px!important;
    background: white;
    margin: 0px;
    font-family: 'Source Sans Pro', sans-serif!important;
    font-weight: 100;
    color: #a1a1a1;
}
.tab-booking li.active {
    /* background-color: #065689; */
    color: white;
    height: 115px;
    font-weight: bold;
}
.numberTitle {
    display: block;
}
.tab-booking li span.numberTitle {
    width: 30px;
    border-radius: 35px;
    margin-left: auto;
    border: 1px solid #cfcfcf;
    margin-right: auto;
}
.tab-booking li.active span.numberTitle {
    background-color: #055788;
    width: 30px;
    border-radius: 35px;
    margin-left: auto;
    margin-right: auto;
    border: 1px solid #055788;
}
.tab-booking li.active span.stepTitle {
    color: #065b91;
    font-size: 14px;
}
#icon-play-left {
    position: absolute;
    border-top: 2px dotted #839199;
    width: 26%;
    left: 20%;
    margin-top: 48px;
}
#span-icon-left {
    position: absolute;
    left: 50%;
    top: -9px;
    color: red;
    background-color: #fff;
}
#icon-play-right {
    position: absolute;
    border-top: 2px dotted #839199;
    width: 26%;
    left: 53%;
    margin-top: 48px;
}
#span-icon-right {
    position: absolute;
    left: 50%;
    top: -9px;
    color: red;
    background-color: #fff;
}

.page-book {
	background-color: #f2f6f9;
	clear: both;
	/*padding: 20px 0;*/
    padding-top: 20px;
    padding-bottom: 20px;
}
.page-book .form-group {
	clear: both;
	min-height: 45px;
}

.page-book .text-note {
    color: red;
    font-style: italic;
    text-align: right;
    font-size: 12px;
    margin-top: 10px;
}

.page-book .next {
    border: 0;
    background: #e86d71;
    border-radius: 30px;
    padding: 10px 20px;
    color: #fff;
    font-size: 20px;
    font-weight: bold;
    margin: auto;
    display: block;
}
@media (min-width: 768px){
	.page-book .control-label {
	    padding-top: 7px;
	    margin-bottom: 0;
	    text-align: right;
        
	}
    .page-book #fee {
        font-size: 35px;
    }
}
.short-des {
    background: #fff;
    padding: 10px;
    border-radius: 3px;
    margin: 5px 0;
    font-size: 13px;
}
#type-visa-text {
    /*font-weight: bold;*/
}
#type-visa-fee {
    /*font-weight: bold;*/
}
#time-text {
    /*font-weight: bold;*/
}
#time-fee {
    /*font-weight: bold;*/
}
.box-info-service {
    padding-left: 42px;
}
.box-info-service hr {
    margin-top: 0;
    margin-bottom: 10px;
    border-top: 1px solid #000;
}
.page-book .next:hover {
    background: #e1262c;
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

.tab-booking li span.stepTitle {
    font-size: 14px;
}

@media screen and (max-width: 767px) {
    .mobile-margin-top {
        margin-top: 10px;
    }

    .box-info-service {
        padding-left: 0;
    }

    .page-book .text-note {
        text-align: left;
        margin-left: 20px;
    }
    .total-fee {
        justify-content: space-between;
    }
    .total-fee:before {
        display: none;
    }
    .total-fee:after {
        display: none;
    }
    .box-info-fee {
        display: flex;
        justify-content: space-between;
    }
}
@media screen and (max-width: 991px) {
    .le-trai-mb {
        text-align: left !important;
    }
    #text-fee {
        text-align: left;
        padding-left: 30px;
    }
    #fee {
        padding-right: 35px;
    }
    .box-info-service {
        padding-left: 30px;
        padding-right: 30px;
    }
}
</style>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" /> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />

<link rel="stylesheet" href="/css/jquery-ui.css">
<!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
$( function() {
$( "#date" ).datepicker();
$( "#date" ).datepicker( "option", "dateFormat", "M-dd-yy", "2007-01-26" );
// $( "#date" ).datepicker().parseDate( "yy-mm-dd", "2007-01-26" );
 $("#date").datepicker("setDate", "<?= $_SESSION['step_1']['date'] ?>");
} );
</script>

<div class="tab-step hidden-xs" style="position: relative;">
        <h1 class="text-center" style="font-size: 24px;color: #333333;margin: 48px 0; font-weight: bold;">Vietnam Visa Online Application</h1>
        <ul class="tab-booking">
            <!--26120220 - Edited by Hieudzai - 3/8/2018-->
            <li class="active col-sm-4">
                <span class="numberTitle">1</span>
                <span class="stepTitle">Visa Options</span>
            </li>
            <li class="col-sm-4">
                <span class="numberTitle">2</span>
                <span class="stepTitle">Applicant Detail</span>
            </li>
            <li class="col-sm-4"><span class="numberTitle">3</span>
                <span class="stepTitle">Review &amp; Finalize</span>
            </li>
            <!--26120220 - End edit-->
            <div id="icon-play-left" style=""><span id="span-icon-left" style="" class="glyphicon glyphicon-play"></span></div>
            <div id="icon-play-right" style=""><span id="span-icon-right" style="" class="glyphicon glyphicon-play"></span></div>
        </ul>
    </div>

<div class="hidden-sm hidden-md hidden-lg">
    <h1 class="text-center" style="font-size: 20px;color: #333333;margin: 48px 0; font-weight: bold;">Vietnam Visa Online Application</h1>
    <div style="text-align: center;">
        <span class="badge">1</span>
    </div>
    <p style="text-align: center;font-size: 14px;font-weight: bold;">Visa Options</p>
</div>

<div class="page-book">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-sm-3 col-md-4 le-trai-mb" for="email">Number of visa</label>
			      <div class="col-sm-9 col-md-8">
			        
			        <select class="form-control input-lg1 cursor_poi" name="number_applicant" id="number_applicant" onchange="set_price_num(this.value)">
                        <option value="1" <?= $_SESSION['step_1']['number_applicant']==1 ? 'selected' : '' ?> >1 Applicant</option>
                            <option value="2" <?= $_SESSION['step_1']['number_applicant']==2 ? 'selected' : '' ?> >2 Applicants</option>    
                            <option value="3" <?= $_SESSION['step_1']['number_applicant']==3 ? 'selected' : '' ?> >3 Applicants</option>    
                            <option value="4" <?= $_SESSION['step_1']['number_applicant']==4 ? 'selected' : '' ?> >4 Applicants</option>    
                            <option value="5" <?= $_SESSION['step_1']['number_applicant']==5 ? 'selected' : '' ?> >5 Applicants</option>    
                            <option value="6" <?= $_SESSION['step_1']['number_applicant']==6 ? 'selected' : '' ?> >6 Applicants</option>    
                            <option value="7" <?= $_SESSION['step_1']['number_applicant']==7 ? 'selected' : '' ?> >7 Applicants</option>    
                            <option value="8" <?= $_SESSION['step_1']['number_applicant']==8 ? 'selected' : '' ?> >8 Applicants</option>    
                            <option value="9" <?= $_SESSION['step_1']['number_applicant']==9 ? 'selected' : '' ?> >9 Applicants</option>    
                            <option value="10" <?= $_SESSION['step_1']['number_applicant']==10 ? 'selected' : '' ?> >10 Applicants</option>    
                        
                    </select>
			      </div>
				</div>

                <div class="form-group">
                    <label class="control-label col-sm-3 col-md-4 le-trai-mb" for="email">Your citizenship<span style="color: red;">*</span></label>
                  <div class="col-sm-9 col-md-8">
                    
                    <select class="form-control input-lg1 cursor_poi selectpicker" data-live-search="true" name="citizenship" id="citizenship" onchange="chon_quoc_gia(this.value)">
                        <option value="0">---Please select---</option>
                        <?php foreach ($quoc_gia as $item) { ?>
                        <option value="<?= $item['id'] ?>" <?= $_SESSION['step_1']['citizenship']==$item['id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                        <?php } ?>
                    </select>
                  </div>
                </div>

				<div class="form-group">
					<label class="control-label col-sm-3 col-md-4 le-trai-mb" for="email">Purpose of visit</label>
			      	<div class="col-sm-9 col-md-8">
                        <select class="form-control input-lg1 cursor_poi" name="purpose" id="purpose">
                            <?php foreach ($purpose_of_visit as $item) { ?>
                            <option value="<?= $item['id'] ?>" <?= $_SESSION['step_1']['purpose']==$item['id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                            <?php } ?>
                            
                        </select>
			      	</div>
				</div>

                <div class="form-group">
                    <label class="control-label col-sm-3 col-md-4 le-trai-mb" for="email">Visa category<span style="color: red;">*</span></label>
                  <div class="col-sm-9 col-md-8">
                    
                    <select class="form-control input-lg1 cursor_poi" name="category" id="category" onchange="chon_category(this.value)">
                        <option value="0">---Please select---</option>
                        <?php 
                        foreach ($visa_category as $cate_id) { 
                            $category = $action->getDetail('visa_category', 'id', $cate_id);
                        ?>
                        <option value="<?= $category['id'] ?>" <?= $_SESSION['step_1']['category']==$category['id'] ? 'selected' : '' ?> ><?= $category['name'] ?></option>
                        <?php } ?>
                        
                    </select>
                  </div>
                </div>

				<div class="form-group">
					<label class="control-label col-sm-3 col-md-4 le-trai-mb" for="email">Type of visa<span style="color: red;">*</span></label>
			      <div class="col-sm-9 col-md-8">
			        <select class="form-control input-lg1 cursor_poi" name="type_visa" id="type_visa" onchange="chon_type_visa(this.value)">
                        <option value="0">---Please select---</option>
                        <?php foreach ($list_type_visa_2 as $visa_type) { ?>
                        <option value="<?= $visa_type['id'] ?>" data-price="<?= $visa_type['price'] ?>" <?= $_SESSION['step_1']['type_visa']==$visa_type['id'] ? 'selected' : '' ?> ><?= $visa_type['name'] ?></option>
                        <?php } ?>
                    </select>

                    <?php if (empty($type_visa_des)) { ?>
                    <div id="type-visa-des" class="short-des" style="display: none;">
                    </div>
                    <?php } else { ?>
                    <div id="type-visa-des" class="short-des" style="display: block;">
                        <?= $type_visa_des ?>
                    </div>
                    <?php } ?>

                    
			      </div>
                  
				</div>
				<div class="form-group">
				    <label class="control-label col-sm-3 col-md-4 le-trai-mb" for="email">Arrival date<span style="color: red;">*</span></label>
				    <div class="col-sm-9 col-md-8">
				      <input type="text" class="form-control" id="date" value="<?= $_SESSION['step_1']['date'] ?>" lang="en" placeholder="" required="" autocomplete="off">
                        <!-- <div class="short-des">
                            <p>Date format is yyyy-mm-dd</p>
                        </div> -->
				    </div>
				  </div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-md-4 le-trai-mb" for="email">Arrival port<span style="color: red;">*</span></label>
			      <div class="col-sm-4 col-md-4">
			        <select class="form-control input-lg1 cursor_poi" name="airport_group" id="airport_group" onchange="chon_group(this.value)">
                        
                        	<?php foreach ($group_port as $item) { ?>
                        	<option value="<?= $item['id'] ?>"  <?= $_SESSION['step_1']['group_port']==$item['id'] ? 'selected' : '' ?>  ><?= $item['name'] ?></option>
                        	<?php } ?>
                        </select>
			      </div>
                  <div class="col-sm-5 col-md-4">
                    <select class="form-control input-lg1 cursor_poi mobile-margin-top" name="airport_name" id="airport_name">
                        <option value="0">Please select</option>
                            <?php foreach ($list_port_arrival as $item) { ?>
                            <option value="<?= $item['id'] ?>" <?= $_SESSION['step_1']['airport_id']==$item['id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                            <?php } ?>
                        </select>
                  </div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-md-4 le-trai-mb" for="email">Processing time<span style="color: red;">*</span></label>
			      <div class="col-sm-9 col-md-8">
			        <select class="form-control input-lg1 cursor_poi" name="time" id="time" onchange="set_price(this.value, this.options[this.selectedIndex].getAttribute('data-price'))">
                        <option value="0">---Please select---</option>
                        <?php foreach ($processing_time as $item) { ?>
                        <option value="<?= $item['id'] ?>" data-price="<?= $item['price'] ?>" <?= $_SESSION['step_1']['time']==$item['id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                        <?php } ?>
                    </select>

                    <?php if (empty($time_des)) { ?>
                    <div id="processing-time-des" class="short-des" style="display: none;">
                    </div>
                    <?php } else { ?>
                    <div id="processing-time-des" class="short-des" style="display: block;">
                        <?= $time_des ?>
                    </div>
                    <?php } ?>
			      </div>
                
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				    <label class="control-label col-sm-3 col-md-4 le-trai-mb" for="email">Contact name<span style="color: red;">*</span></label>
				    <div class="col-sm-9 col-md-8">
				      <input type="text" class="form-control" id="name" value="<?= $_SESSION['step_1']['name'] ?>" placeholder="Type your name here">
				    </div>
				  </div>
				<div class="form-group">
				    <label class="control-label col-sm-3 col-md-4 le-trai-mb" for="email">Contact email<span style="color: red;">*</span></label>
				    <div class="col-sm-9 col-md-8">
				      <input type="email" class="form-control" id="email_1" value="<?= $_SESSION['step_1']['email_1'] ?>" placeholder="Email">
				    </div>
				  </div>
				<div class="form-group">
				    <label class="control-label col-sm-3 col-md-4 le-trai-mb hidden-xs" for="email"></label>
				    <div class="col-sm-9 col-md-8">
				      <input type="email" class="form-control" id="email_2" value="<?= $_SESSION['step_1']['email_1'] ?>" placeholder="Confirm email address">
				    </div>
				  </div>
                <div class="form-group">
                    <label class="control-label col-sm-3 col-md-4 le-trai-mb" for="email">Contact phone</label>
                    <div class="col-sm-5 col-md-4">
                      <!-- <input type="email" class="form-control" id="email" placeholder="Type your name here"> -->
                        <select class="form-control selectpicker" data-live-search="true" name="countryPrefix" id="countryPrefix">
                            <option value="">Select country</option>
                            <option value="+84">Vietnam(+84)</option>
                            <?php foreach ($countryPrefix as $item) { ?>
                            <option value="<?= $item['prefix'] ?>" <?= $_SESSION['step_1']['countryPrefix']==$item['prefix'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                            <?php } ?>       
                        </select>
                    </div>
                    <div class="col-sm-4 col-md-4">
                      <input type="tel" class="form-control mobile-margin-top" id="phone" value="<?= $_SESSION['step_1']['phone'] ?>" placeholder="Your phone number">
                    </div>
                    <br class="hidden-xs">
                    <br class="hidden-xs">
                    <p class="text-note">Phone number is HIGHLY RECOMMENDED in emergency!</p>
                  </div>

                  <div class="form-group">
                    <br>
                    <br>
                    <?php if (isset($_SESSION['step_1']) && !empty($_SESSION['step_1']['number_applicant'])) { ?>
                    <div class="row total-fee" style="display: flex;align-items: center;">
                        <label class="control-label col-sm-6" for="email" id="text-fee">TOTAL <span class="hidden-xs">ESTIMATED</span> SERVICE FEE</label>
                        
                        <label class="control-label col-sm-6" for="email" id="fee">$ <?= $reshow_price ?></label>
                    </div>
                    
                    <div class="row box-info-service">
                        <hr>
                        <div class="col-md-12">
                            <p>Visa Fee</p>
                        </div>
                        <div class="box-info-fee">
                            <div class="col-sm-6">
                                <p id="type-visa-text"><?= $reshow_type['name'] ?></p>
                            </div>
                            <div class="col-sm-6">
                                <p id="type-visa-fee" class="text-right">$ <?= $reshow_type['price'] ?> * <?= $_SESSION['step_1']['number_applicant'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p>Service Fee</p>
                        </div>
                        <div class="box-info-fee">
                            <div class="col-sm-6">
                                <p id="time-text"><?= $reshow_time['name'] ?></p>
                            </div>
                            <div class="col-sm-6">
                                <p id="time-fee" class="text-right">$ <?= $reshow_time['price'] ?> * <?= $_SESSION['step_1']['number_applicant'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="row total-fee" style="display: flex;align-items: center;">
                        <label class="control-label col-sm-6" for="email" id="text-fee">TOTAL <span class="hidden-xs">ESTIMATED</span> SERVICE FEE</label>
                        
                        <label class="control-label col-sm-6" for="email" id="fee">N/A</label>
                    </div>
                    
                    <div class="row box-info-service">
                        <hr>
                        <div class="col-md-12">
                            <p>Visa Fee</p>
                        </div>
                        <div class="box-info-fee">
                            <div class="col-sm-6">
                                <p id="type-visa-text"></p>
                            </div>
                            <div class="col-sm-6">
                                <p id="type-visa-fee" class="text-right"></p>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <p>Service Fee</p>
                        </div>
                        <div class="box-info-fee">
                            <div class="col-sm-6">
                                <p id="time-text"></p>
                            </div>
                            <div class="col-sm-6">
                                <p id="time-fee" class="text-right"></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                  </div>
                
			</div>
		</div>
	</div>
</div>

<div class="container page-book" style="background-color: #fff;">
    <div class="row">
        
        <div class="col-md-9">
            
        </div>
        <div class="col-md-3">
            <button class="next" type="button" onclick="next1()">Next step <img src="/images/arrow-white.png" alt=""></button>
        </div>

    </div>
</div>

<script>
    function next1 () {
        var number_applicant = document.getElementById("number_applicant").value;
        var citizenship = document.getElementById("citizenship").value;
        var purpose = document.getElementById("purpose").value;
        var category = document.getElementById("category").value;
        var type_visa = document.getElementById("type_visa").value;
        var date = document.getElementById("date").value;
        var airport_id = document.getElementById("airport_name").value;
        var time = document.getElementById("time").value;
        var name = document.getElementById("name").value;
        var email_1 = document.getElementById("email_1").value;
        var email_2 = document.getElementById("email_2").value;
        var countryPrefix = document.getElementById("countryPrefix").value;
        var phone = document.getElementById("phone").value;
        var group_port = document.getElementById("airport_group").value;
        // var purpose = 1;
        // alert(phone);
        // if (purpose_1 == true) {
        //     purpose = 1;
        // } else {
        //     purpose = 2;
        // }
        // alert(airport_id);
        if (citizenship == 0) {
            alert('Please select Your Citizenship');
            return false;
        }
        if (category == 0) {
            alert('Please select Visa Category');
            return false;
        }
        if (type_visa == 0) {
            alert('Please select Type of Visa');
            return false;
        }
        if (date == '') {
            alert('Please select the Date');
            return false;
        }
        if (airport_id == '0') {
            alert('Please select Airport Name');
            return false;
        }
        if (time == '0') {
            alert('Please select Processing Time');
            return false;
        }
        if (name == '') {
            alert('Please select Your Name');
            return false;
        }
        if (email_1 == '') {
            alert('Please select Your Email');
            return false;
        }
        if (email_2 == '') {
            alert('Please select Confirm Email');
            return false;
        }
        if (email_1 != email_2) {
            alert('Invalid Email Confirmation');
            return false;
        }
        if (countryPrefix == '') {
            alert('Please select Perfix Phone');
            return false;
        }
        if (phone == '') {
            alert('Please select Phone');
            return false;
        }

        

        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            // document.getElementById("demo").innerHTML = this.responseText;
                // alert(this.responseText);
                window.location.href = "/step-2";
            }
          xhttp.open("GET", "/functions/ajax/set_info_step_1.php?number_applicant="+number_applicant+
            "&purpose="+purpose+
            "&type_visa="+type_visa+
            "&date="+date+
            "&airport_id="+airport_id+
            "&time="+time+
            "&name="+name+
            "&email_1="+email_1+
            "&countryPrefix="+countryPrefix+
            "&phone="+phone+
            "&citizenship="+citizenship+
            "&category="+category+
            "&group_port="+group_port
            , true);
          xhttp.send();
    }

    function set_price (val, price) {
        if (val != 0) {
            // alert(price);
            var show_price = 0;
            var number_applicant = document.getElementById("number_applicant").value;
            var type_visa = document.getElementById("type_visa");
            var type_visa_price = type_visa.options[type_visa.selectedIndex].getAttribute('data-price');
            // alert(type_visa_price);
            if (type_visa_price == null) {
                document.getElementById("fee").innerHTML ='N/A';

            } else {
                show_price = number_applicant * (parseInt(type_visa_price) + parseInt(price));
                document.getElementById("fee").innerHTML = '$ ' + show_price;
                set_des_time(val);
                get_fee_time(val);

            }
            
        } else {
            document.getElementById("fee").innerHTML ='N/A';
            document.getElementById("processing-time-des").style.display = 'none';
            document.getElementById("time-text").innerHTML = '';
	        document.getElementById("time-fee").innerHTML = '';
        }
    }

    function set_price_num (num) {
        var time = document.getElementById("time");
        var time_price = time.options[time.selectedIndex].getAttribute('data-price');
        var type_visa = document.getElementById("type_visa");
        var type_visa_price = type_visa.options[type_visa.selectedIndex].getAttribute('data-price');
        if (time.value != 0 && type_visa.value != 0) {
            show_price = num * (parseInt(type_visa_price) + parseInt(time_price));
            document.getElementById("fee").innerHTML = '$ ' + show_price;
            document.getElementById("type-visa-fee").innerHTML = '$ ' + type_visa_price + ' * ' + num;
            document.getElementById("time-fee").innerHTML = '$ ' + time_price + ' * ' + num;
        } else {
            // document.getElementById("fee").innerHTML ='N/A';
            if (type_visa.value != 0) {
            	document.getElementById("type-visa-fee").innerHTML = '$ ' + type_visa_price + ' * ' + num;
            }
        }
    }

    function chon_category (id) {
    	clear_fee();
        // alert(id);
        var quoc_gia_id = document.getElementById("citizenship").value;
        // alert(quoc_gia_id);
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            // alert(this.responseText);
            document.getElementById("type_visa").innerHTML = this.responseText;
            chon_type_visa_2(id, quoc_gia_id);
            list_group(id);
            document.getElementById("type-visa-des").style.display = 'none';
            document.getElementById("processing-time-des").style.display = 'none';
            }
          xhttp.open("GET", "/functions/ajax/chon_category.php?id="+id+"&quoc_gia_id="+quoc_gia_id, true);
          xhttp.send();
    }

    function chon_category_2 (quoc_gia_id) {
    	clear_fee();
        // alert(id);
        // var quoc_gia_id = document.getElementById("citizenship").value;
        // alert(quoc_gia_id);
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            // alert(this.responseText);
            // document.getElementById("type_visa").innerHTML = this.responseText;
            clear_type_visa();
                // chon_type_visa_3(quoc_gia_id);
                // list_group_2(quoc_gia_id);
                clear_airport();
                document.getElementById("type-visa-des").style.display = 'none';
                document.getElementById("processing-time-des").style.display = 'none';
            }
          xhttp.open("GET", "/functions/ajax/chon_category_2.php?quoc_gia_id="+quoc_gia_id, true);
          xhttp.send();
    }

    function chon_quoc_gia (id) {
        // alert(id);
        clear_fee();
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            // alert(this.responseText);
            document.getElementById("category").innerHTML = this.responseText;
                chon_category_2(id);
            }
          xhttp.open("GET", "/functions/ajax/chon_quoc_gia.php?id="+id, true);
          xhttp.send();
    }

    function chon_type_visa (id) {
        // alert(id);
        document.getElementById("fee").innerHTML ='N/A';
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            document.getElementById("time").innerHTML = this.responseText;
                set_des_type_visa(id);
                get_fee_type_visa(id);
                document.getElementById("time-text").innerHTML = '';
	            document.getElementById("time-fee").innerHTML = '';
	            document.getElementById("processing-time-des").style.display = 'none';
            }
          xhttp.open("GET", "/functions/ajax/chon_type_visa.php?id="+id, true);
          xhttp.send();
    }

    function chon_type_visa_2 (category_id, quoc_gia_id) {
        // alert(id);
        document.getElementById("fee").innerHTML ='N/A';
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            // document.getElementById("time").innerHTML = this.responseText;
            clear_process_time();
            }
          xhttp.open("GET", "/functions/ajax/chon_type_visa_2.php?category_id="+category_id+"&quoc_gia_id="+quoc_gia_id, true);
          xhttp.send();
    }

    function chon_type_visa_3 (quoc_gia_id) {
        // alert(id);
        document.getElementById("fee").innerHTML ='N/A';
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            // document.getElementById("time").innerHTML = this.responseText;
            clear_process_time();
            }
          xhttp.open("GET", "/functions/ajax/chon_type_visa_3.php?quoc_gia_id="+quoc_gia_id, true);
          xhttp.send();
    }

    function chon_group (id) {
        // alert(id);
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            document.getElementById("airport_name").innerHTML = this.responseText;
            }
          xhttp.open("GET", "/functions/ajax/chon_group.php?id="+id, true);
          xhttp.send();
    }

    function chon_group_2 (category_id) {
        // alert(id);
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            document.getElementById("airport_name").innerHTML = this.responseText;
            }
          xhttp.open("GET", "/functions/ajax/chon_group_2.php?category_id="+category_id, true);
          xhttp.send();
    }

    function chon_group_3 (quoc_gia_id) {
        // alert(id);
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            document.getElementById("airport_name").innerHTML = this.responseText;
            }
          xhttp.open("GET", "/functions/ajax/chon_group_3.php?quoc_gia_id="+quoc_gia_id, true);
          xhttp.send();
    }

    function list_group (category_id) {
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            document.getElementById("airport_group").innerHTML = this.responseText;
            chon_group_2(category_id);
            }
          xhttp.open("GET", "/functions/ajax/list_group.php?category_id="+category_id, true);
          xhttp.send();
    }

    function list_group_2 (quoc_gia_id) {
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            document.getElementById("airport_group").innerHTML = this.responseText;
            chon_group_3(quoc_gia_id);
            }
          xhttp.open("GET", "/functions/ajax/list_group_2.php?quoc_gia_id="+quoc_gia_id, true);
          xhttp.send();
    }

    function set_des_type_visa (id) {
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            document.getElementById("type-visa-des").innerHTML = this.responseText;
            	if (id == 0) {
            		document.getElementById("type-visa-des").style.display = 'none';
            		document.getElementById("processing-time-des").style.display = 'none';
            	} else {
            		document.getElementById("type-visa-des").style.display = 'block';
            	}
                
            }
          xhttp.open("GET", "/functions/ajax/set_des_type_visa.php?id="+id, true);
          xhttp.send();
    }

    function set_des_time (id) {
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            document.getElementById("processing-time-des").innerHTML = this.responseText;
            	// alert(id);
            	if (id == 0) {
            		document.getElementById("processing-time-des").style.display = 'none';
            	} else {
            		document.getElementById("processing-time-des").style.display = 'block';
            	}
                
            }
          xhttp.open("GET", "/functions/ajax/set_des_time.php?id="+id, true);
          xhttp.send();
    }

    function get_fee_type_visa (id) {
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
                // alert(this.responseText);
                if (id == 0) {
                	document.getElementById("type-visa-text").innerHTML = '';
	                document.getElementById("type-visa-fee").innerHTML = '';
                } else {
                	var num = document.getElementById("number_applicant").value;
	                const obj = JSON.parse(this.responseText);
	                document.getElementById("type-visa-text").innerHTML = obj.name;
	                document.getElementById("type-visa-fee").innerHTML = '$ ' + obj.price + ' * ' + num;
                }
                
            }
          xhttp.open("GET", "/functions/ajax/get_fee_type_visa.php?id="+id, true);
          xhttp.send();
    }

    function get_fee_time (id) {
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
                // alert(this.responseText);
                if (id != 0) {
                	var num = document.getElementById("number_applicant").value; 
	                const obj = JSON.parse(this.responseText);
	                document.getElementById("time-text").innerHTML = obj.name;
	                document.getElementById("time-fee").innerHTML = '$ ' + obj.price + ' * ' + num;
                } else {
                	document.getElementById("time-text").innerHTML = '';
	                document.getElementById("time-fee").innerHTML = '';
                }
                
            }
          xhttp.open("GET", "/functions/ajax/get_fee_time.php?id="+id, true);
          xhttp.send();
    }

    function clear_fee () {
    	document.getElementById("fee").innerHTML ='N/A';
    	document.getElementById("type-visa-text").innerHTML = '';
	    document.getElementById("type-visa-fee").innerHTML = '';
    	document.getElementById("time-text").innerHTML = '';
	    document.getElementById("time-fee").innerHTML = '';
    }

    function clear_process_time () {
    	document.getElementById("time").innerHTML = '<option value="0">---Please select---</option>';
    }

    function clear_type_visa () {
    	document.getElementById("type_visa").innerHTML = '<option value="0">---Please select---</option>';
    }

    function clear_airport () {
        document.getElementById("airport_group").innerHTML = '';
        document.getElementById("airport_name").innerHTML = '<option value="0">---Please select---</option>';
    }
</script>

<script>
$(function() {
  $('.selectpicker').selectpicker();
});
</script>
<!-- https://jqueryui.com/datepicker/ -->