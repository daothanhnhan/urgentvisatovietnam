<?php 
    $slug = isset($_GET['slug']) ? $_GET['slug'] : '';

    $rowLang = $action_service->getServiceLangDetail_byUrl($slug,$lang);
    $row = $action_service->getServiceDetail_byId($rowLang['service_id'],$lang);
    $_SESSION['sidebar'] = 'newsDetail';

    $service_sub_1 = $action->getDetail('content_service', 'id', 11);
    $service_sub_2 = $action->getDetail('content_service', 'id', 12);


    $service_sub_1 = str_replace('<span style="background-color:#3498db">', '<span class="num">', $service_sub_1);
    $service_sub_2 = str_replace('<span style="background-color:#3498db">', '<span class="num">', $service_sub_2);


    $list_faq = $action->getList('faq_service', 'service_id', $row['service_id'], 'id', 'asc', '', '', '');

    function departure_assistance () {
        global $conn_vn;
        if (isset($_POST['departure_assistance'])) {
            $name = mysqli_real_escape_string($conn_vn, $_POST['name']);
            $num = mysqli_real_escape_string($conn_vn, $_POST['num']);
            $email = mysqli_real_escape_string($conn_vn, $_POST['email']);
            $phone_1 = mysqli_real_escape_string($conn_vn, $_POST['phone_1']);
            $phone_2 = mysqli_real_escape_string($conn_vn, $_POST['phone_2']);
            $note = mysqli_real_escape_string($conn_vn, $_POST['note']);

            $sql = "INSERT INTO departure_assistance_book (name, num, email, phone_1, phone_2, note) VALUES ('$name', '$num', '$email', '$phone_1', '$phone_2', '$note')";
            $result = mysqli_query($conn_vn, $sql);
            if ($result) {
                echo '<script type="text/javascript">alert(\'You have successfully registered.\')</script>';
            } else {
                echo '<script type="text/javascript">alert(\'Có lỗi xảy ra.\')</script>';
                echo mysqli_error($conn_vn);
            }
        }
    }
    departure_assistance();
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
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#book-now-1" onclick="add_text('Departure Airport Transfer')">Book now</button>
				<div>
					<?= $service_sub_2['note_en'] ?>
				</div>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#book-now-1" onclick="add_text('VIP Departure Assistance')">Book now</button>
				
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
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Booking <span id="popup-title"></span></h4>
      </div>
      <div class="modal-body">
        <p>Please fill the form below to book <span id="popup-line"></span></p>
        <form action="" method="post" accept-charset="utf-8">
        	<div class="form-group">
		    	<label for="email">Number of travelers:</label>
			    <input type="number" class="form-control" id="email" name="num" min="1" placeholder="" required="">
			</div>
			  <div class="form-group">
			    <label for="pwd">Fullname:</label>
			    <input type="text" class="form-control" id="pwd" name="name" placeholder="Your Fullname" required="">
			  </div>
			<div class="form-group">
		    	<label for="email1">Phone number:</label>
		    	<div class="row">
		    		<div class="col-xs-5">
			    		<select class="form-control" id="sel1" name="phone_1">
							<option value="+1">United States(+1)</option>
                            <option value="+93">Afghanistan(+93)</option>
                            <option value="+355">Albania(+355)</option>
                            <option value="+213">Algeria(+213)</option>
                            <option value="+1 684">American Samoa(+1 684)</option>
                            <option value="+376">Andorra(+376)</option>
                            <option value="+244">Angola(+244)</option>
                            <option value="+1 264">Anguilla(+1 264)</option>
                            <option value="+672">Antarctica(+672)</option>
                            <option value="+1 268">Antigua and Barbuda(+1 268)</option>
                            <option value="+54">Argentina(+54)</option>
                            <option value="+374">Armenia(+374)</option>
                            <option value="+297">Aruba(+297)</option>
                            <option value="+61">Cocos Islands(+61)</option>
                            <option value="+43">Austria(+43)</option>
                            <option value="+994">Azerbaijan(+994)</option>
                            <option value="+1 242">Bahamas(+1 242)</option>
                            <option value="+973">Bahrain(+973)</option>
                            <option value="+880">Bangladesh(+880)</option>
                            <option value="+1 246">Barbados(+1 246)</option>
                            <option value="+375">Belarus(+375)</option>
                            <option value="+32">Belgium(+32)</option>
                            <option value="+501">Belize(+501)</option>
                            <option value="+229">Benin(+229)</option>
                            <option value="+1 441">Bermuda(+1 441)</option>
                            <option value="+975">Bhutan(+975)</option>
                            <option value="+591">Bolivia(+591)</option>
                            <option value="+387">Bosnia and Herzegovina(+387)</option>
                            <option value="+267">Botswana(+267)</option>
                            <option value="+55">Brazil(+55)</option>
                            <option value="+246">British Indian Ocean Territory(+246)</option>
                            <option value="+1 284">British Virgin Islands(+1 284)</option>
                            <option value="+673">Brunei(+673)</option>
                            <option value="+359">Bulgaria(+359)</option>
                            <option value="+226">Burkina Faso(+226)</option>
                            <option value="+257">Burundi(+257)</option>
                            <option value="+855">Cambodia(+855)</option>
                            <option value="+237">Cameroon(+237)</option>
                            <option value="+238">Cape Verde(+238)</option>
                            <option value="+1 345">Cayman Islands(+1 345)</option>
                            <option value="+236">Central African Republic(+236)</option>
                            <option value="+235">Chad(+235)</option>
                            <option value="+56">Chile(+56)</option>
                            <option value="+86">China(+86)</option>
                            <option value="+57">Colombia(+57)</option>
                            <option value="+269">Comoros(+269)</option>
                            <option value="+682">Cook Islands(+682)</option>
                            <option value="+506">Costa Rica(+506)</option>
                            <option value="+385">Croatia(+385)</option>
                            <option value="+53">Cuba(+53)</option>
                            <option value="+599">Netherlands Antilles(+599)</option>
                            <option value="+357">Cyprus(+357)</option>
                            <option value="+420">Czech Republic(+420)</option>
                            <option value="+243">Democratic Republic of the Congo(+243)</option>
                            <option value="+45">Denmark(+45)</option>
                            <option value="+253">Djibouti(+253)</option>
                            <option value="+1 767">Dominica(+1 767)</option>
                            <option value="+1 809/+1 829/+1 849">Dominican Republic(+1 809/+1 829/+1 849)</option>
                            <option value="+670">East Timor(+670)</option>
                            <option value="+593">Ecuador(+593)</option>
                            <option value="+20">Egypt(+20)</option>
                            <option value="+503">El Salvador(+503)</option>
                            <option value="+240">Equatorial Guinea(+240)</option>
                            <option value="+291">Eritrea(+291)</option>
                            <option value="+372">Estonia(+372)</option>
                            <option value="+251">Ethiopia(+251)</option>
                            <option value="+500">Falkland Islands(+500)</option>
                            <option value="+298">Faroe Islands(+298)</option>
                            <option value="+679">Fiji(+679)</option>
                            <option value="+358">Finland(+358)</option>
                            <option value="+33">France(+33)</option>
                            <option value="+689">Polynesia(+689)</option>
                            <option value="+241">Gabon(+241)</option>
                            <option value="+220">Gambia(+220)</option>
                            <option value="+995">Georgia(+995)</option>
                            <option value="+49">Germany(+49)</option>
                            <option value="+233">Ghana(+233)</option>
                            <option value="+350">Gibraltar(+350)</option>
                            <option value="+30">Greece(+30)</option>
                            <option value="+299">Greenland(+299)</option>
                            <option value="+1 473">Grenada(+1 473)</option>
                            <option value="+1 671">Guam(+1 671)</option>
                            <option value="+502">Guatemela(+502)</option>
                            <option value="+44">United Kingdom(+44)</option>
                            <option value="+224">Guinea(+224)</option>
                            <option value="+245">Guinea-Bissau(+245)</option>
                            <option value="+592">Guyana(+592)</option>
                            <option value="+509">Haiti(+509)</option>
                            <option value="+504">Honduras(+504)</option>
                            <option value="+852">Hong Kong(+852)</option>
                            <option value="+36">Hungary(+36)</option>
                            <option value="+354">Iceland(+354)</option>
                            <option value="+91">India(+91)</option>
                            <option value="+62">Indonesia(+62)</option>
                            <option value="+98">Iran(+98)</option>
                            <option value="+964">Iraq(+964)</option>
                            <option value="+353">Ireland(+353)</option>
                            <option value="+44 1624">Isle of Man(+44 1624)</option>
                            <option value="+972">Israel(+972)</option>
                            <option value="+39">Italy(+39)</option>
                            <option value="+225">Ivory Coast(+225)</option>
                            <option value="+1 876">Jamaica(+1 876)</option>
                            <option value="+81">Japan(+81)</option>
                            <option value="+44 1534">Jersey(+44 1534)</option>
                            <option value="+962">Jordan(+962)</option>
                            <option value="+7">Russian(+7)</option>
                            <option value="+254">Kenya(+254)</option>
                            <option value="+686">Kiribati(+686)</option>
                            <option value="+383">Kosovo(+383)</option>
                            <option value="+965">Kuwait(+965)</option>
                            <option value="+996">Kyrgyzstan(+996)</option>
                            <option value="+856">Laos(+856)</option>
                            <option value="+371">Latvia(+371)</option>
                            <option value="+961">Lebanon(+961)</option>
                            <option value="+266">Lesotho(+266)</option>
                            <option value="+231">Liberia(+231)</option>
                            <option value="+218">Libya(+218)</option>
                            <option value="+423">Liechtenstein(+423)</option>
                            <option value="+370">Lithuania(+370)</option>
                            <option value="+352">Luxembourg(+352)</option>
                            <option value="+853">Macau(+853)</option>
                            <option value="+389">Macedonia(+389)</option>
                            <option value="+261">Madagascar(+261)</option>
                            <option value="+265">Malawi(+265)</option>
                            <option value="+60">Malaysia(+60)</option>
                            <option value="+960">Maldives(+960)</option>
                            <option value="+223">Mali(+223)</option>
                            <option value="+356">Malta(+356)</option>
                            <option value="+692">Marshall Islands(+692)</option>
                            <option value="+222">Mauritania(+222)</option>
                            <option value="+230">Mauritius(+230)</option>
                            <option value="+262">Reunion(+262)</option>
                            <option value="+52">Mexico(+52)</option>
                            <option value="+583">Micronesia(+583)</option>
                            <option value="+373">Moldova(+373)</option>
                            <option value="+377">Monaco(+377)</option>
                            <option value="+976">Mongolia(+976)</option>
                            <option value="+381">Serbia(+381)</option>
                            <option value="+1 664">Montserrat(+1 664)</option>
                            <option value="+212">Western Sahara(+212)</option>
                            <option value="+258">Mozambique(+258)</option>
                            <option value="+95">Myanmar(+95)</option>
                            <option value="+264">Namibia(+264)</option>
                            <option value="+520">Nauru(+520)</option>
                            <option value="+977">Nepal(+977)</option>
                            <option value="+31">Netherlands(+31)</option>
                            <option value="+687">New Caledonia(+687)</option>
                            <option value="+64">Pitcairn(+64)</option>
                            <option value="+505">Nicaragua(+505)</option>
                            <option value="+227">Niger(+227)</option>
                            <option value="+234">Nigeria(+234)</option>
                            <option value="+683">Niue(+683)</option>
                            <option value="+850">North Korea(+850)</option>
                            <option value="+1 670">Northern Mariana Islands(+1 670)</option>
                            <option value="+47">Svalbard and Jan Mayen(+47)</option>
                            <option value="+968">Oman(+968)</option>
                            <option value="+92">Pakistan(+92)</option>
                            <option value="+680">Palau(+680)</option>
                            <option value="+970">Palestine(+970)</option>
                            <option value="+507">Panama(+507)</option>
                            <option value="+675">Papua New Guinea(+675)</option>
                            <option value="+595">Paraguay(+595)</option>
                            <option value="+51">Peru(+51)</option>
                            <option value="+63">Philippines(+63)</option>
                            <option value="+48">Poland(+48)</option>
                            <option value="+351">Portugal(+351)</option>
                            <option value="+1 787/+1 939">Puerto Rico(+1 787/+1 939)</option>
                            <option value="+974">Qatar(+974)</option>
                            <option value="+242">Republic of the Congo(+242)</option>
                            <option value="+40">Romania(+40)</option>
                            <option value="+250">Rwanda(+250)</option>
                            <option value="+590">Saint Martin(+590)</option>
                            <option value="+290">Saint Helena(+290)</option>
                            <option value="+1 869">Saint Kitts and Nevis(+1 869)</option>
                            <option value="+1 758">Saint Lucia(+1 758)</option>
                            <option value="+508">Saint Pierre and Miquelon(+508)</option>
                            <option value="+1 784">Saint Vincent and the Grenadines(+1 784)</option>
                            <option value="+685">Samoa(+685)</option>
                            <option value="+378">San Marino(+378)</option>
                            <option value="+239">Sao Tome and Principe(+239)</option>
                            <option value="+966">Saudi Arabia(+966)</option>
                            <option value="+221">Senegal(+221)</option>
                            <option value="+248">Seychelles(+248)</option>
                            <option value="+232">Sierra Leone(+232)</option>
                            <option value="+65">Singapore(+65)</option>
                            <option value="+1 721">Sint Maarten(+1 721)</option>
                            <option value="+421">Slovakia(+421)</option>
                            <option value="+386">Slovenia(+386)</option>
                            <option value="+677">Solomon Islands(+677)</option>
                            <option value="+252">Somalia(+252)</option>
                            <option value="+27">South Africa(+27)</option>
                            <option value="+82">South Korea(+82)</option>
                            <option value="+211">South Sudan(+211)</option>
                            <option value="+34">Spain(+34)</option>
                            <option value="+94">Sri Lanka(+94)</option>
                            <option value="+249">Sudan(+249)</option>
                            <option value="+597">Suriname(+597)</option>
                            <option value="+268">Swaziland(+268)</option>
                            <option value="+46">Sweden(+46)</option>
                            <option value="+41">Switzerland(+41)</option>
                            <option value="+963">Syria(+963)</option>
                            <option value="+886">Taiwan(+886)</option>
                            <option value="+992">Tajikista(+992)</option>
                            <option value="+255">Tanzania(+255)</option>
                            <option value="+66">Thailand(+66)</option>
                            <option value="+228">Togo(+228)</option>
                            <option value="+690">Tokelau(+690)</option>
                            <option value="+676">Tonga(+676)</option>
                            <option value="+1 868">Trinidad and Tobago(+1 868)</option>
                            <option value="+216">Tunisia(+216)</option>
                            <option value="+90">Turkey(+90)</option>
                            <option value="+993">Turkmenistan(+993)</option>
                            <option value="+1 649">Turks and Caicos Islands(+1 649)</option>
                            <option value="+688">Tuvalu(+688)</option>
                            <option value="+1 340">U.S. Virgin Islands(+1 340)</option>
                            <option value="+256">Uganda(+256)</option>
                            <option value="+380">Ukraine(+380)</option>
                            <option value="+971">United Arab Emirates(+971)</option>
                            <option value="+598">Uruguay(+598)</option>
                            <option value="+998">Uzbekistan(+998)</option>
                            <option value="+678">Vanuatu(+678)</option>
                            <option value="+379">Vatican(+379)</option>
                            <option value="+58">Venezuela(+58)</option>
                            <option value="+84">Vietnam(+84)</option>
                            <option value="+681">Wallis and Futuna(+681)</option>
                            <option value="+967">Yemen(+967)</option>
                            <option value="+260">Zambia(+260)</option>
                            <option value="+263">Zimbabwe(+263)</option>
						</select>
			    	</div>
			    	<div class="col-xs-7">
			    		<input type="number" class="form-control" id="email1" name="phone_2" placeholder="Your Phone number" required="">
			    	</div>
		    	</div>
		    	
			</div>
			<div class="form-group">
		    	<label for="email2">Email:</label>
			    <input type="email" class="form-control" id="email2" name="email" placeholder="Your email" required="">
                <input type="hidden" name="note" id="input_note">
			</div>
			  <button type="submit" name="departure_assistance" class="btn btn-danger">Submit request</button>
        	
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>
    function add_text (text) {
        document.getElementById("popup-title").innerHTML = text;
        document.getElementById("popup-line").innerHTML = text;
        document.getElementById("input_note").value = text;
    }
</script>