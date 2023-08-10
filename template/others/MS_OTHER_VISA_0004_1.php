<?php 
    $countryPrefix = $action->getList('countryPrefix', '', '', 'name', 'asc', '', '', '');
    $airport_name = $action->getList('airport_name', '', '', 'id', 'asc', '', '', '');
    $quoc_gia = $action->getList('quoc_gia', '', '', 'id', 'asc', '', '', '');

    $quoc_gia_first = $action->getDetail('quoc_gia', 'id', '3');
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

    $processing_time = $action->getList('processing_time', 'type_visa_id', $list_type_visa_2[0]['id'], 'sort', 'asc', '', '', '');//var_dump($processing_time);
    $group_port = $action->getList('arrival_port_group', 'category_id', $visa_category[0], 'id', 'asc', '', '', '');//var_dump($group_port);
    $list_port_arrival = $action->getList('arrival_port', 'arrival_port_group_id', $group_port[0]['id'], 'id', 'asc', '', '', '');
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
	padding: 20px 0;
}
.page-book .form-group {
	clear: both;
	height: 45px;
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
}
@media (min-width: 768px){
	.page-book .control-label {
	    padding-top: 7px;
	    margin-bottom: 0;
	    text-align: right;
	}
}

</style>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" /> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />


<div class="tab-step hidden-xs" style="position: relative;">
        <h1 class="text-center" style="font-size: 24px;color: #333333;margin: 48px 0; font-weight: bold;">Vietnam Visa Online Application</h1>
        <ul class="tab-booking">
            <!--26120220 - Edited by Hieudzai - 3/8/2018-->
            <li class="active col-lg-4">
                <span class="numberTitle">1</span>
                <span class="stepTitle">Visa Options</span>
            </li>
            <li class="col-lg-4">
                <span class="numberTitle">2</span>
                <span class="stepTitle">Applicant Detail</span>
            </li>
            <li class="col-lg-4"><span class="numberTitle">3</span>
                <span class="stepTitle">Review &amp; Finalize</span>
            </li>
            <!--26120220 - End edit-->
            <div id="icon-play-left" style=""><span id="span-icon-left" style="" class="glyphicon glyphicon-play"></span></div>
            <div id="icon-play-right" style=""><span id="span-icon-right" style="" class="glyphicon glyphicon-play"></span></div>
        </ul>
    </div>

<div class="page-book">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label col-sm-4" for="email">Number of visa</label>
			      <div class="col-sm-8">
			        
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
                    <label class="control-label col-sm-4" for="email">Your citizenship<span style="color: red;">*</span></label>
                  <div class="col-sm-8">
                    
                    <select class="form-control input-lg1 cursor_poi" name="citizenship" id="citizenship" onchange="chon_quoc_gia(this.value)">
                        <option value="0">---Please select---</option>
                        <?php foreach ($quoc_gia as $item) { ?>
                        <option value="<?= $item['id'] ?>" <?= $_SESSION['step_1']['citizenship']==$item['id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                        <?php } ?>
                    </select>
                  </div>
                </div>

				<div class="form-group">
					<label class="control-label col-sm-4" for="email">Purpose of visit</label>
			      	<div class="col-sm-8">
                        <?php if (!isset($_SESSION['step_1'])) { ?>
			      		<label class="radio-inline"><input type="radio" name="optradio" value="1" id="purpose_1" checked="">Tourist (E-visa)</label>
						<label class="radio-inline"><input type="radio" name="optradio" value="2" id="purpose_2">Business</label>
                        <?php } else { ?>
                        <label class="radio-inline"><input type="radio" name="optradio" value="1" id="purpose_1" <?= $_SESSION['step_1']['purpose']==1 ? 'checked' : '' ?> >Tourist (E-visa)</label>
                        <label class="radio-inline"><input type="radio" name="optradio" value="2" id="purpose_2" <?= $_SESSION['step_1']['purpose']==2 ? 'checked' : '' ?> >Business</label>
                        <?php } ?>
			      	</div>
				</div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Visa Category<span style="color: red;">*</span></label>
                  <div class="col-sm-8">
                    
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
					<label class="control-label col-sm-4" for="email">Type of visa<span style="color: red;">*</span></label>
			      <div class="col-sm-8">
			        <select class="form-control input-lg1 cursor_poi" name="type_visa" id="type_visa" onchange="chon_type_visa(this.value)">
                        <option value="0">---Please select---</option>
                        <?php foreach ($list_type_visa_2 as $visa_type) { ?>
                        <option value="<?= $visa_type['id'] ?>"><?= $visa_type['name'] ?></option>
                        <?php } ?>
                    </select>
			      </div>
				</div>
				<div class="form-group">
				    <label class="control-label col-sm-4" for="email">Arrival date<span style="color: red;">*</span></label>
				    <div class="col-sm-8">
				      <input type="date" class="form-control" id="date" value="<?= $_SESSION['step_1']['date'] ?>" lang="en" placeholder="" required="">
				    </div>
				  </div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="email">Arrival Port<span style="color: red;">*</span></label>
			      <div class="col-sm-3">
			        <select class="form-control input-lg1 cursor_poi" name="airport_group" id="airport_group" onchange="chon_group(this.value)">
                        
                        	<?php foreach ($group_port as $item) { ?>
                        	<option value="<?= $item['id'] ?>"  ><?= $item['name'] ?></option>
                        	<?php } ?>
                        </select>
			      </div>
                  <div class="col-sm-5">
                    <select class="form-control input-lg1 cursor_poi" name="airport_name" id="airport_name">
                        <option value="0">Please select the exact one</option>
                            <?php foreach ($list_port_arrival as $item) { ?>
                            <option value="<?= $item['id'] ?>" <?= $_SESSION['step_1']['airport_name']==$item['id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                            <?php } ?>
                        </select>
                  </div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="email">Processing Time<span style="color: red;">*</span></label>
			      <div class="col-sm-8">
			        <select class="form-control input-lg1 cursor_poi" name="time" id="time" onchange="set_price(this.value)">
                        <option value="0">---Please select---</option>
                        <?php foreach ($processing_time as $item) { ?>
                        <option value="<?= $item['id'] ?>" <?= $_SESSION['step_1']['time']==$item['id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                        <?php } ?>
                    </select>
			      </div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				    <label class="control-label col-sm-4" for="email">Contact Name<span style="color: red;">*</span></label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="name" value="<?= $_SESSION['step_1']['name'] ?>" placeholder="Type your name here">
				    </div>
				  </div>
				<div class="form-group">
				    <label class="control-label col-sm-4" for="email">Contact Email<span style="color: red;">*</span></label>
				    <div class="col-sm-8">
				      <input type="email" class="form-control" id="email_1" value="<?= $_SESSION['step_1']['email_1'] ?>" placeholder="Email">
				    </div>
				  </div>
				<div class="form-group">
				    <label class="control-label col-sm-4" for="email"></label>
				    <div class="col-sm-8">
				      <input type="email" class="form-control" id="email_2" value="<?= $_SESSION['step_1']['email_1'] ?>" placeholder="Confirm email address">
				    </div>
				  </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Contact Phone</label>
                    <div class="col-sm-4">
                      <!-- <input type="email" class="form-control" id="email" placeholder="Type your name here"> -->
                        <select class="form-control selectpicker" data-live-search="true" name="countryPrefix" id="countryPrefix">
                            <option value="">Select country</option>
                            <option value="+84">Vietnam(+84)</option>
                            <?php foreach ($countryPrefix as $item) { ?>
                            <option value="<?= $item['prefix'] ?>" <?= $_SESSION['step_1']['countryPrefix']==$item['prefix'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                            <?php } ?>       
                        </select>
                    </div>
                    <div class="col-sm-4">
                      <input type="tel" class="form-control" id="phone" value="<?= $_SESSION['step_1']['phone'] ?>" placeholder="Your phone number">
                    </div>
                    <br>
                    <br>
                    <p class="text-note">Phone number is HIGHLY RECOMMENDED in emergency!</p>
                  </div>

                  <div class="form-group">
                    <br>
                    <br>
                    <div class="row">
                        <label class="control-label col-sm-6" for="email">TOTAL ESTIMATED SERVICE FEE</label>
                        <?php if (!isset($_SESSION['step_1'])) { ?>
                        <label class="control-label col-sm-6" for="email" id="fee">N/A</label>
                        <?php } else { ?>
                        <label class="control-label col-sm-6" for="email" id="fee"><?= $_SESSION['step_1']['number_applicant']*50 ?> $</label>
                        <?php } ?>
                    </div>
                    
                    
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
            <button class="next" type="button" onclick="next1()">Next step <img src="https://booking.vietnam-visa.com/public/images/booking/arrow-white.png" alt=""></button>
        </div>

    </div>
</div>

<script>
    function next1 () {
        var number_applicant = document.getElementById("number_applicant").value;
        var purpose_1 = document.getElementById("purpose_1").checked;
        var type_visa = document.getElementById("type_visa").value;
        var date = document.getElementById("date").value;
        var airport_name = document.getElementById("airport_name").value;
        var time = document.getElementById("time").value;
        var name = document.getElementById("name").value;
        var email_1 = document.getElementById("email_1").value;
        var email_2 = document.getElementById("email_2").value;
        var countryPrefix = document.getElementById("countryPrefix").value;
        var phone = document.getElementById("phone").value;
        var purpose = 1;
        // alert(phone);
        if (purpose_1 == true) {
            purpose = 1;
        } else {
            purpose = 2;
        }
        // alert(purpose);
        if (date == '') {
            alert('You have not entered the date');
            return false;
        }
        if (airport_name == '0') {
            alert('You have not selected a airport name');
            return false;
        }
        if (time == '0') {
            alert('You have not selected a processing time');
            return false;
        }
        if (name == '') {
            alert('You have not entered your name');
            return false;
        }
        if (email_1 == '') {
            alert('You have not entered your email');
            return false;
        }
        if (email_2 == '') {
            alert('You have not entered confirm email');
            return false;
        }
        if (email_1 != email_2) {
            alert('Invalid email confirmation');
            return false;
        }
        if (countryPrefix == '') {
            alert('You have not entered perfix phone');
            return false;
        }
        if (phone == '') {
            alert('You have not entered phone');
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
            "&airport_name="+airport_name+
            "&time="+time+
            "&name="+name+
            "&email_1="+email_1+
            "&countryPrefix="+countryPrefix+
            "&phone="+phone
            , true);
          xhttp.send();
    }

    function set_price (val) {
        if (val != 0) {
            var number_applicant = document.getElementById("number_applicant").value;
            document.getElementById("fee").innerHTML = number_applicant * 50 + ' $';
        } else {
            document.getElementById("fee").innerHTML ='N/A';
        }
    }

    function set_price_num (num) {
        var time = document.getElementById("time").value;
        if (time != 0) {
            document.getElementById("fee").innerHTML = num * 50 + ' $';
        } else {
            document.getElementById("fee").innerHTML ='N/A';
        }
    }

    function chon_category (id) {
        // alert(id);
        var quoc_gia_id = document.getElementById("citizenship").value;
        // alert(quoc_gia_id);
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            // alert(this.responseText);
            document.getElementById("type_visa").innerHTML = this.responseText;
            chon_type_visa_2(id, quoc_gia_id);
            list_group(id);
            }
          xhttp.open("GET", "/functions/ajax/chon_category.php?id="+id+"&quoc_gia_id="+quoc_gia_id, true);
          xhttp.send();
    }

    function chon_category_2 (quoc_gia_id) {
        // alert(id);
        // var quoc_gia_id = document.getElementById("citizenship").value;
        // alert(quoc_gia_id);
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            // alert(this.responseText);
            document.getElementById("type_visa").innerHTML = this.responseText;
                chon_type_visa_3(quoc_gia_id);
                list_group_2(quoc_gia_id);
            }
          xhttp.open("GET", "/functions/ajax/chon_category_2.php?quoc_gia_id="+quoc_gia_id, true);
          xhttp.send();
    }

    function chon_quoc_gia (id) {
        // alert(id);
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
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            document.getElementById("time").innerHTML = this.responseText;
            }
          xhttp.open("GET", "/functions/ajax/chon_type_visa.php?id="+id, true);
          xhttp.send();
    }

    function chon_type_visa_2 (category_id, quoc_gia_id) {
        // alert(id);
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            document.getElementById("time").innerHTML = this.responseText;
            }
          xhttp.open("GET", "/functions/ajax/chon_type_visa_2.php?category_id="+category_id+"&quoc_gia_id="+quoc_gia_id, true);
          xhttp.send();
    }

    function chon_type_visa_3 (quoc_gia_id) {
        // alert(id);
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            document.getElementById("time").innerHTML = this.responseText;
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
</script>

<script>
$(function() {
  $('.selectpicker').selectpicker();
});
</script>
