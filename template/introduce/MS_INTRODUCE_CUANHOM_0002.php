<?php 
    function uploadPicture($src, $img_name, $img_temp){

        $src = $src.$img_name;//echo $src;

        if (!@getimagesize($src)){

            if (move_uploaded_file($img_temp, $src)) {

                return true;

            }

        }

    }

    

    function home_voa () {
        global $conn_vn;
        $action_email = new action_email();
        if (isset($_POST['home_voa'])) {
            $src= "images/upload/";
            // $src = "uploads/";

            $image = '';
            if(isset($_FILES['passport']) && $_FILES['passport']['name'] != ""){

                $time = time();

                uploadPicture($src, $time.$_FILES['passport']['name'], $_FILES['passport']['tmp_name']);
                $image = $time.$_FILES['passport']['name'];

            }
            // var_dump($image);die;
            $name = mysqli_real_escape_string($conn_vn, $_POST['name']);
            $email = mysqli_real_escape_string($conn_vn, $_POST['email']);
            $phone = mysqli_real_escape_string($conn_vn, $_POST['phone']);
            $num = mysqli_real_escape_string($conn_vn, $_POST['num']);
            $nation = mysqli_real_escape_string($conn_vn, $_POST['nation']);

            $noidung = "<ul>";
            $noidung .= "<li>Name: $name</li>";
            $noidung .= "<li>Email: $email</li>";
            $noidung .= "<li>Phone: $phone</li>";
            $noidung .= "<li>Number: $num</li>";
            $noidung .= "<li>National: $nation</li>";
            $noidung .= "</ul>";

            $action_email->email_send_2('sale@urgentvisatovietnam.com', 'Request Tourist VOA Package Quote', $noidung);

            $sql = "INSERT INTO home_voa (name, email, phone, num, nation, passport) VALUES ('$name', '$email', '$phone', '$num', '$nation', '$image')";
            $result = mysqli_query($conn_vn, $sql);
            if ($result) {
                echo '<script type="text/javascript">alert(\'You have successfully registered.\')</script>';
            } else {
                echo '<script type="text/javascript">alert(\'Có lỗi xảy ra.\')</script>';
            }
            
        }
    }

    home_voa();

    $home_box_page = $action->getDetail('page', 'page_id', 52);
?>
<style>
.voa {
	transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
    /*margin-top: 50px;*/
    margin-bottom: 50px;
    padding: 50px 0px 50px 0px;
    background-color: #FFFFFF;
    background-image: url(/images/<?= $home_box_page['page_img'] ?>);
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
}
.voa .box {
	border-style: solid;
    /*border-width: 1px 1px 1px 1px;*/
    border-color: #ffffff;
    transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
    /*padding: 50px 150px 50px 150px;*/
    position: relative;
}
.voa .box h4 {
	color: #ffffff;
    font-size: 45px;
    font-weight: 600;
    line-height: 1.2em;
    text-align: center;
}
.voa .box .text {
	color: #fff;
	text-align: center;
	margin-top: 20px;
}
.voa .box .btn {
	text-align: center;
	margin-top: 20px;
	display: block;
}
.voa .box a {
	    font-size: 15px;
    font-weight: 600;
    fill: #FFFFFF;
    color: #FFFFFF;
    background-color: #DF1E26;
    border-radius: 0px 0px 0px 0px;
    padding: 15px 45px 15px 45px;
    display: inline-block;
}
.voa .overlay {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: #0000009e;
    width: 100%;
    height: 100%;
}
@media screen and (min-width: 768px) {
    #book-now-home-voa .modal-dialog {
        margin-top: 70px;
    }

}
@media screen and (max-width: 768px) {
    .voa .box {
        /*padding: 10px;*/
    }
    .voa .box h4 {
        font-size: 20px;
    }
    .voa {
        padding: 25px 0;
        margin-bottom: 25px;
    }
}
</style>
<div class="">
		<section class="voa">
            <div class="overlay">
                
            </div>
			<div class="container">
				<div class="">
					<div class="">
						<div class="box">
							<div class="">
								<div class="" >
									<div class="">
										<h4 class=""><?= $home_box_page['page_name'] ?></h4>
									</div>
								</div>
								<div class="">
									<div class="">
										<div class="text">
											<p><?= $home_box_page['page_des'] ?></p>
										</div>
									</div>
								</div>
								<div class="">
									<div class="">
										<div class="btn">
											<a class="" data-toggle="modal" data-target="#book-now-home-voa">
												<span class="elementor-button-content-wrapper">
													 
													<span class="elementor-button-text">Get Quoted NOW</span>
													<span class="elementor-button-icon elementor-align-icon-right">
														<i class="fa fa-angle-double-right"></i>
													</span>
												</span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

<!-- Modal -->
<div id="book-now-home-voa" class="modal fade" role="dialog" style="z-index: 999999;">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Request Tourist VOA Package Quote</h4>
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
                        <input type="text" class="form-control" id="pwd" name="num" placeholder="Number of Travelers" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="pwd" name="nation" placeholder="Travelers' nationalities" required="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Please upload your passport photo</label>
                        <br>
                        <button type="button" onclick="document.getElementById('chon_anh').click()">Select</button>
                        <input type="file" class="form-control hidden" id="chon_anh" name="passport" accept=".png, .jpg, .jpeg" placeholder="Port of arrival" required="">
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Please upload your portrait photo</label>
                        <input type="file" class="form-control" id="pwd" name="portrait" placeholder="Port of arrival" required="">
                    </div>
                </div> -->
                
                <!-- <div class="col-md-12">
                    <div class="form-group">
                        <textarea name="note" class="form-control" placeholder="Special notes" rows="4"></textarea>
                    </div>
                </div> -->
            </div>
			  
			
			  <button type="submit" name="home_voa" class="btn btn-primary"><i class="fa fa-edit"></i> REQUEST NOW!</button>
        	
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>