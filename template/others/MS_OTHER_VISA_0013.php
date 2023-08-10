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
    // var_dump($_SESSION['step_1']);
// echo '<pre>';
    $evisa_book = $action->getDetail('evisa_book', 'id', $text_2);//var_dump($evisa_book);
    $person_order = $action->getList('persion_visa', 'evisa_book_id', $text_2, 'id', 'asc', '', '', '');//var_dump($person);
    // var_dump($_SESSION['step_1']);
    // $type_visa_price = (int)$action->getDetail('type_visa', 'id', $_SESSION['step_1']['type_visa'])['price'];
    // $time_price = (int)$action->getDetail('processing_time', 'id', $_SESSION['step_1']['time'])['price'];

    if ($evisa_book['number'] > 1) {
        $person = 'persons';
        $applicant = 'applicants';
    } else {
        $person = 'person';
        $applicant = 'applicant';
    }

    // $category_item = $action->getDetail('visa_category', 'id', $_SESSION['step_1']['category']);
    // $show_passport = $category_item['passport'];
    // $show_portrait = $category_item['portrait'];

    // $term = $action->getDetail('footer', 'id', 1)['note_6'];
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

.page-step-3 {
    background: #f2f6f9;
    clear: both;
    padding-top: 40px;
    padding-bottom: 30px;
}
.page-step-3 table th {
    border: 1px solid #ccc;
}
.page-step-3 table td {
    border: 1px solid #ccc;
}
.page-step-3 .box-left .box-sub {
    border: 1px solid #ccc;
    border-radius: 15px;
    padding: 15px;
    background: #fff;
    margin-bottom: 20px;
}
.page-step-3 .box-right {
    background: #fff;
    border: 1px solid #ccc;
    padding: 20px;
    border-radius: 15px;
}
.page-step-3 .visa-option {
    border-radius: 10px;
}
.page-step-3 .visa-option th {
    width: 16%;
    text-align: center;
    padding: 10px;
}
.page-step-3 .visa-option td {
    text-align: center;
    padding: 10px;
    background: #fff;
}
.page-step-3 .box-left {
    /*overflow-x: scroll;*/
    margin-bottom: 20px;
}
.page-step-3 .box-left h3 {
    color: #065b91;
    font-size: 20px;
    margin-bottom: 10px;
}
.page-step-3 .box-right h3 {
    /*color: #ccc;*/
    font-size: 20px;
}
.page-step-3 .box-right .row {
    margin-bottom: 10px;
}
.page-step-3 .box-right .text-right {
    color: #065b91;
    font-weight: bold;
}
.page-step-3 .box-right .box-content {
    background-color: #f2f6f9;
    padding-top: 30px;
    padding-bottom: 30px;
    padding: 13px;
}
.page-step-3 .box-right .box-content textarea {
    width: 100%;
    padding: 10px;
}
.page-step-3 .box-right .run-process {
    border-radius: 30px;
    border: 0;
    padding: 15px 20px;
    background: red;
    color: #fff;
    font-weight: bold;
    font-size: 14px;
}
.page-step-3 .box-left .info-1 .row {
    margin-bottom: 5px;
}

.page-step-3 .step-2 {
    padding: 10px 20px;
    border-radius: 30px;
    border: 1px solid black;
    color: #000;
    display: inline-block;
    font-size: 20px;
    font-weight: bold;
}
.page-step-3 .box-left .text-applicant {
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
<div class="tab-step hidden-xs" style="position: relative;">
        <h1 class="text-center" style="font-size: 24px;color: #333333;margin: 48px 0; font-weight: bold;">Vietnam Visa Online Application</h1>
        <ul class="tab-booking">
            <!--26120220 - Edited by Hieudzai - 3/8/2018-->
            <li class="active col-sm-4">
                <span class="numberTitle">1</span>
                <span class="stepTitle">Visa Options</span>
            </li>
            <li class="active col-sm-4">
                <span class="numberTitle">2</span>
                <span class="stepTitle">Applicant Detail</span>
            </li>
            <li class="active col-sm-4"><span class="numberTitle">3</span>
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
        <span class="badge">3</span>
    </div>
    <p style="text-align: center;font-size: 14px;font-weight: bold;">Applicant Detail</p>
</div>

<div class="page-step-3">
    <div class="container">
        <div class="row">
            <div class="col-md-7 box-left">
                <h3>VISA OPTION</h3>
                <table class="visa-option hidden">
                    <thead>
                        <tr>
                            <th>Visa type</th>
                            <th>Visit purpose</th>
                            <th>Processing</th>
                            <th>Arrival date</th>
                            <!-- <th>Exit date</th> -->
                            <th>Arrival Airport</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $evisa_book['type_visa'] ?></td>
                            <td><?= $evisa_book['purpose'] ?></td>
                            <td><?= $evisa_book['process_time'] ?></td>
                            <td><?= $evisa_book['date'] ?></td>
                            <!-- <td><?= $evisa_book['date'] ?></td> -->
                            <td><?= $evisa_book['airport'] ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="info-1">
                    <div class="row">
                        <div class="col-xs-5"><b>Nationality:</b></div>
                        <div class="col-xs-7 text-right"><?= $evisa_book['nation'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-5"><b>Purpose of visa:</b></div>
                        <div class="col-xs-7 text-right"><?= $evisa_book['purpose'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-5"><b>Visa category:</b></div>
                        <div class="col-xs-7 text-right"><?= $evisa_book['category'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-5"><b>Type of visa:</b></div>
                        <div class="col-xs-7 text-right"><?= $evisa_book['type_visa'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-5"><b>Arrival date:</b></div>
                        <div class="col-xs-7 text-right"><?= $evisa_book['date'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-5"><b>Arrival airport:</b></div>
                        <div class="col-xs-7 text-right"><?= $evisa_book['airport'] ?></div>
                    </div>
                </div>
                
                
                <br>
                <h3>CONTACT INFORMATION</h3>
                <div class="info-1">
                    <div class="row">
                        <div class="col-xs-5"><b>Contact name:</b></div>
                        <div class="col-xs-7 text-right"><?= $evisa_book['name'] ?></div>
                    </div>
                     <div class="row">
                        <div class="col-xs-5"><b>Contact email:</b></div>
                        <div class="col-xs-7 text-right"><?= $evisa_book['email'] ?></div>
                    </div>
                     <div class="row">
                        <div class="col-xs-5"><b>Contact phone:</b></div>
                        <div class="col-xs-7 text-right"><?= $evisa_book['phone'] ?></div>
                    </div>
                </div>
                
                <br>
                <h3>APPLICANT INFORMATION</h3>

                <?php 
                $d = 0;
                foreach ($person_order as $anh) { 
                    $d++;
                ?>
                    <div class="row">
                        <p class="col-xs-12 text-applicant">Applicant <?= $d ?></p>
                        
                        <?php if (!empty($anh['portrait'])) { ?>
                        <div class="col-md-8">
                            <img src="/images/evisa/<?= $anh['passport'] ?>" alt="passport" style="width: 100%;">
                        </div>
                        <div class="col-md-4">
                            <img src="/images/evisa/<?= $anh['portrait']  ?>" alt="portrait" style="width: 100%;">
                        </div>
                        <?php } else { ?>
                        <div class="col-md-12">
                            <img src="/images/evisa/<?= $anh['passport'] ?>" alt="passport" style="width: 100%;">
                        </div>
                        <?php } ?>
                    </div>
                <?php } ?>

                <table class="visa-option hidden">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Nationality</th>
                            <!-- <th>Passport Number</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $d = 0;
                        foreach ($person as $item) { 
                            $d++;
                        ?>  
                        <tr>
                            <td><?= $d ?></td>
                            <td><?= $evisa_book['name'] ?></td>
                            <td><?= $evisa_book['email'] ?></td>
                            <td><?= $evisa_book['phone'] ?></td>
                            <td><?= $evisa_book['nation'] ?></td>
                            <!-- <td><?= $item['passport_number'] ?></td> -->
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

                <!-- <h3>APPLICANT INFORMATION</h3>
                <div class="box-sub">
                    <h4>FAST-TRACK IMMIGRATION SERVICE</h4>
                    <p>By using our fast track service, you will be welcomed by our representative after landing at Vietnam airport, escorted through the Vietnam Immigration Counter and luggage lounge quickly till you reach your driver.</p>
                    <div class="radio">
                          <label><input type="radio" name="immigration">Yes, please (Recommended)</label>
                    </div>
                    <div class="radio">
                      <label><input type="radio" name="immigration" checked>No, thanks</label>
                    </div>
                </div>

                <div class="box-sub">
                    <h4>PRIVATE CAR PICK-UP SERVICE</h4>
                    <p>Price for Airport Pick-up service depends on service class (type of car) chosen After finishing visa procedures and having your luggage with you, please look for our driver who stands at the Arrival Hall with your name on a board. In case you need any assistance, please call us immediately at our hotline: +84946.583.583</p>
                    <div class="radio">
                      <label><input type="radio" name="car">Yes, please (Recommended)</label>
                    </div>
                    <div class="radio">
                      <label><input type="radio" name="car" checked>No, thanks</label>
                    </div>
                </div> -->
            </div>
            <div class="col-md-5">
                <div class="box-right">
                    <h3>REVIEW YOUR ORDER</h3>
                    <hr>
                    <!-- <div class="row">
                        <div class="col-xs-6 left"><b>Order Code:</b></div>
                        <div class="col-xs-6 right text-right"><?= $_SESSION['order_book_id'] ?></div>
                    </div> -->
                    <div class="row">
                        <div class="col-xs-6 left"><b>Total applicants:</b></div>
                        <div class="col-xs-6 right text-right"><?= $evisa_book['number'] ?> <?= $applicant ?></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 left"><b>Visa service fee:</b><br><?= $evisa_book['type_visa'] ?></div>
                        <div class="col-xs-6 right text-right">$<?= $evisa_book['fee_service'] ?> x <?= $evisa_book['number'] ?> <?= $person ?> = $<?= $evisa_book['fee_service']*$evisa_book['number'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 left"><b>Processing time:</b><br><?= $evisa_book['process_time'] ?></div>
                        <div class="col-xs-6 right text-right">$<?= $evisa_book['fee_process'] ?> x <?= $evisa_book['number'] ?> <?= $person ?> = $<?= $evisa_book['fee_process']*$evisa_book['number'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 left"><b>Discount:</b></div>
                        <div class="col-xs-6 right text-right">$<?= $evisa_book['discount'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 left"><b>Current total fees:</b></div>
                        <div class="col-xs-6 right text-right" style="font-size: 30px;">$<?= $evisa_book['fee'] ?>.00</div>
                    </div>
                    <hr>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function next3 () {
        var tick_1 = document.getElementById("check_box_1").checked;
        var tick_2 = document.getElementById("check_box_2").checked;
        // alert(tick_1);
        if (tick_1 == true && tick_2 == true) {
            const xhttp = new XMLHttpRequest();
              xhttp.onload = function() {
                // document.getElementById("demo").innerHTML = this.responseText;
                    // alert(this.responseText);
                    window.location.href = "/payment-page";
                }
              xhttp.open("GET", "/functions/ajax/next3.php", true);
              xhttp.send();
        } else {
            alert('You have not selected the checkbox');
        }
        
    }
</script>