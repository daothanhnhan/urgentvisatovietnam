<?php
//phpinfo();die;
session_start();
ob_start();
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$folder = dirname(__FILE__);
include_once('config.php');
include_once('__autoload.php');
$action = new action();
include_once dirname(__FILE__).DIR_FUNCTIONS."database.php";
// $urlAnalytic = $action->showabc();    
include_once dirname(__FILE__).DIR_FUNCTIONS_PAGING."pagination.php";
include_once 'functions/phpmailer/class.smtp.php';
include_once 'functions/phpmailer/class.phpmailer.php';
include_once "functions/vi_en.php";
// // LÀM RÕ NHỮNG THƯ VIỆN NÀY
// // include_once('lib/vi_en.php');
// // include_once('lib/nganLuong/NL_Checkoutv3.php');

// // LÀM RÕ Install Cart

// Install MultiLanguage
include_once dirname(__FILE__).DIR_FUNCTIONS_LANGUAGE."lang_config.php";
include_once dirname(__FILE__).DIR_FUNCTIONS_LANGUAGE.$lang_file;
// Install Friendly Url
include_once dirname(__FILE__).DIR_FUNCTIONS_URL."url_config.php";
// Configure Website
include_once dirname(__FILE__).DIR_FUNCTIONS."website_config.php";
include_once dirname(__FILE__).DIR_FUNCTIONS."action_email.php";
$action_email = new action_email();
// echo $translate['link_contact'];die;
$trang = isset($_GET['trang']) ? $_GET['trang'] : '1';
// $action = new action();
$cart = new action_cart();
$menu = new action_menu();
$action_product = new action_product();
$action_news = new action_news();
$action_service = new action_service();
if($lang == "vn"){
    $rowConfig_lang = $action->getDetail('config_languages','id',1);
}else{
    $rowConfig_lang = $action->getDetail('config_languages','id',2);
}


$rowConfig = $action->getDetail('config','config_id',1);

if ($_GET['page'] == 'step-1' || $_GET['page'] == 'step-2' || $_GET['page'] == 'step-3') {
  $seo = $action->getDetail('seo_page_book', 'id', 1);
  $title = $seo['title'];
  $meta_key = $seo['keyword'];
  $meta_des = $seo['des'];
}

if ($_GET['page'] == 'check-status') {
  $seo = $action->getDetail('seo_check_status', 'id', 1);
  $content_page_check_status = $seo['name'];
  $title = $seo['title'];
  $meta_key = $seo['keyword'];
  $meta_des = $seo['des'];
}
?>
<?php 
function curPageURL_paypal() {
     $pageURL = 'http';
     if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
     $pageURL .= "://";
     if ($_SERVER["SERVER_PORT"] != "80") {
      $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].'/';
     } else {
      $pageURL .= $_SERVER["SERVER_NAME"].'/';
     }
     return $pageURL;
}
$link_paypal = curPageURL_paypal();//die($link_paypal);

include_once dirname(__FILE__).'/functions/vendor/autoload.php';

// define('SITE_URL', 'http://vietnamfasttrack.org/');
define('SITE_URL', $link_paypal);

// tuan
// $paypal = new \PayPal\Rest\ApiContext(
//         new \PayPal\Auth\OAuthTokenCredential(
//                 'AYq5y9QlbbGxamZstVQWDD8-WzIgMcHfbcKJazHRSy7_ncmiedv-up80-JP7po2O1C2mvlif_GGShuVC',
//                 'EErTXQIqJyU6GFhvdlSC0nbCFqMEI4ztOa91xovHiBnPvERlnz8-0eyJJ129sBs7v6h5XnknLARise9y'
//             )
//     );

// khach
$paypal = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
                'AQaiYzjhbhQebtlyWt4CmxbT6SfaibmNNmXNQeiKlTFd6HPx1tbVzGTWk7cW98MPrombbZhLmzP8ogMJ',
                'EBbPICs2FEVde0UtWRRA4u0jL0Jbn4gw-HdQVYIGBg3LvU-GsfnP7W-7c_QFopfQjJEXmkdUfk5bEL5l'
            )
    );


$paypal->setConfig([
    'mode' => ('live'),
]);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?= $meta_des ?>"> 
    <meta name="keywords" content="<?= $meta_key ?>">
    <title><?= $title ?></title>
    <link rel="icon" href="/images/<?= $rowConfig['icon_web'] ?>" type="image/gif" sizes="16x16">

    <link rel="stylesheet" href="/plugin/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/plugin/bootstrap/css/bootstrap-theme.css">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css'>
    <link rel="stylesheet" href="/plugin/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style-cuanhom.css">
    <script src="/plugin/jquery/jquery-2.0.2.min.js"></script>
    <script src="/plugin/bootstrap/js/bootstrap.js"></script>

<style type="text/css">
  .suntory-alo-phone {
  background-color: transparent;
  cursor: pointer;
  height: 120px;
  position: fixed;
  transition: visibility 0.5s ease 0s;
  width: 105px;
  z-index: 200000 !important;
}
.suntory-alo-ph-circle {
  animation: 1.2s ease-in-out 0s normal none infinite running suntory-alo-circle-anim;
  background-color: transparent;
  border: 2px solid rgba(30, 30, 30, 0.4);
  border-radius: 100%;
  height: 100px;
  left: 0px;
  opacity: 0.1;
  position: absolute;
  top: 0px;
  transform-origin: 50% 50% 0;
  transition: all 0.5s ease 0s;
  width: 100px;
}
.suntory-alo-ph-circle-fill {
  animation: 2.3s ease-in-out 0s normal none infinite running suntory-alo-circle-fill-anim;
  border: 2px solid transparent;
  border-radius: 100%;
  height: 70px;
  left: 15px;
  position: absolute;
  top: 15px;
  transform-origin: 50% 50% 0;
  transition: all 0.5s ease 0s;
  width: 70px;
}
.suntory-alo-ph-img-circle {
  border: 2px solid transparent;
  border-radius: 100%;
  height: 50px;
  left: 25px;
  opacity: 0.7;
  position: absolute;
  top: 25px;
  transform-origin: 50% 50% 0;
  width: 50px;
  text-align: center;
}
.suntory-alo-phone.suntory-alo-hover, .suntory-alo-phone:hover {
  opacity: 1;
}
.suntory-alo-phone.suntory-alo-active .suntory-alo-ph-circle {
  animation: 1.1s ease-in-out 0s normal none infinite running suntory-alo-circle-anim !important;
}
.suntory-alo-phone.suntory-alo-static .suntory-alo-ph-circle {
  animation: 2.2s ease-in-out 0s normal none infinite running suntory-alo-circle-anim !important;
}
.suntory-alo-phone.suntory-alo-hover .suntory-alo-ph-circle, .suntory-alo-phone:hover .suntory-alo-ph-circle {
  border-color: #00aff2;
  opacity: 0.5;
}
.suntory-alo-phone.suntory-alo-green.suntory-alo-hover .suntory-alo-ph-circle, .suntory-alo-phone.suntory-alo-green:hover .suntory-alo-ph-circle {
  border-color: #EB278D;
  opacity: 1;
}
.suntory-alo-phone.suntory-alo-green .suntory-alo-ph-circle {
  border-color: #bfebfc;
  opacity: 1;
}
.suntory-alo-phone.suntory-alo-hover .suntory-alo-ph-circle-fill, .suntory-alo-phone:hover .suntory-alo-ph-circle-fill {
  background-color: rgba(0, 175, 242, 0.9);
}
.suntory-alo-phone.suntory-alo-green.suntory-alo-hover .suntory-alo-ph-circle-fill, .suntory-alo-phone.suntory-alo-green:hover .suntory-alo-ph-circle-fill {
  background-color: #EB278D;
}
.suntory-alo-phone.suntory-alo-green .suntory-alo-ph-circle-fill {
  background-color: rgba(0, 175, 242, 0.9);
}
.suntory-alo-phone.suntory-alo-hover .suntory-alo-ph-img-circle, .suntory-alo-phone:hover .suntory-alo-ph-img-circle {
  background-color: #00aff2;
}
.suntory-alo-phone.suntory-alo-green.suntory-alo-hover .suntory-alo-ph-img-circle, .suntory-alo-phone.suntory-alo-green:hover .suntory-alo-ph-img-circle {
  background-color: #EB278D;
}
.suntory-alo-phone.suntory-alo-green .suntory-alo-ph-img-circle {
  background-color: #00aff2;
}
@keyframes suntory-alo-circle-anim {
  0% {
    opacity: 0.1;
    transform: rotate(0deg) scale(0.5) skew(1deg);
  }
  30% {
    opacity: 0.5;
    transform: rotate(0deg) scale(0.7) skew(1deg);
  }
  100% {
    opacity: 0.6;
    transform: rotate(0deg) scale(1) skew(1deg);
  }
}
@keyframes suntory-alo-circle-img-anim {
  0% {
    transform: rotate(0deg) scale(1) skew(1deg);
  }
  10% {
    transform: rotate(-25deg) scale(1) skew(1deg);
  }
  20% {
    transform: rotate(25deg) scale(1) skew(1deg);
  }
  30% {
    transform: rotate(-25deg) scale(1) skew(1deg);
  }
  40% {
    transform: rotate(25deg) scale(1) skew(1deg);
  }
  50% {
    transform: rotate(0deg) scale(1) skew(1deg);
  }
  100% {
    transform: rotate(0deg) scale(1) skew(1deg);
  }
}
@keyframes suntory-alo-circle-fill-anim {
  0% {
    opacity: 0.2;
    transform: rotate(0deg) scale(0.7) skew(1deg);
  }
  50% {
    opacity: 0.2;
    transform: rotate(0deg) scale(1) skew(1deg);
  }
  100% {
    opacity: 0.2;
    transform: rotate(0deg) scale(0.7) skew(1deg);
  }
}
.suntory-alo-ph-img-circle i {
  animation: 1s ease-in-out 0s normal none infinite running suntory-alo-circle-img-anim;
  font-size: 30px;
  line-height: 50px;
  color: #fff;
  float: none;
}
@keyframes suntory-alo-ring-ring {
  0% {
    transform: rotate(0deg) scale(1) skew(1deg);
  }
  10% {
    transform: rotate(-25deg) scale(1) skew(1deg);
  }
  20% {
    transform: rotate(25deg) scale(1) skew(1deg);
  }
  30% {
    transform: rotate(-25deg) scale(1) skew(1deg);
  }
  40% {
    transform: rotate(25deg) scale(1) skew(1deg);
  }
  50% {
    transform: rotate(0deg) scale(1) skew(1deg);
  }
  100% {
    transform: rotate(0deg) scale(1) skew(1deg);
  }
}

</style>    
<?= $rowConfig['tab_header'] ?>
</head>

<body>

    
<a href="https://api.whatsapp.com/send?phone=<?= $rowConfig['link3'] ?>&amp;text=<?= $rowConfig['link4'] ?>" class="suntory-alo-phone suntory-alo-green" id="suntory-alo-phoneIcon" style="right: 0px; bottom: 0px;">
  <div class="suntory-alo-ph-circle"></div>
  <div class="suntory-alo-ph-circle-fill"></div>
  <div class="suntory-alo-ph-img-circle"><i class="fa fa-phone"></i></div>
</a>


<?php include_once dirname(__FILE__).DIR_THEMES."header.php";?>

<div class="gb-content">
    <?php
    if (isset($_GET['page'])){

        $urlAnalytic = $action->getTypePage_byUrl($_GET['page'],$lang);
        // echo $urlAnalytic;
        switch ($urlAnalytic) {

            case 'tin-tuc':
                $title = "Vietnam Visa Blogs";
                include_once dirname(__FILE__).DIR_THEMES."tintuc.php"; break;

            case 'visa-blogs':
                $title = "Vietnam Visa Blogs";
                include_once dirname(__FILE__).DIR_THEMES."tintuc.php"; break;

            case 'news_languages':

                include_once dirname(__FILE__).DIR_THEMES."chitiettintuc.php"; break;
            case 'lien-he':
                $title = "Liên hệ";
                include_once dirname(__FILE__).DIR_THEMES."lienhe.php"; break;

            case 'gio-hang':

                include_once dirname(__FILE__).DIR_THEMES."giohang.php"; break;

            case 'khuyen-mai':

                include_once dirname(__FILE__).DIR_THEMES."khuyenmai.php"; break;
            case 'san-pham':

                include_once dirname(__FILE__).DIR_THEMES."sanpham.php"; break;

            case 'productcat_languages':
                include_once dirname(__FILE__).DIR_THEMES."sanpham.php"; break;

            case 'search-product':
                include_once dirname(__FILE__) . DIR_THEMES . "search-product.php";break;

            case 'hang-thanh-ly':

                include_once dirname(__FILE__).DIR_THEMES."hangthanhly.php"; break;

            case 'thanh-toan':

                include_once dirname(__FILE__).DIR_THEMES."thanhtoan.php"; break;
            case 'product_languages':

                include_once dirname(__FILE__).DIR_THEMES."chitietsanpham.php"; break;
            case 'huong-dan-dat-hang':

                include_once dirname(__FILE__).DIR_THEMES."huongdanmuahang.php"; break;
            case 'huong-dan-thanh-toan':

                include_once dirname(__FILE__).DIR_THEMES."cachthucthanhtoan.php"; break;

            case 'chinh-sach-van-chuyen':

                include_once dirname(__FILE__).DIR_THEMES."chinhsachvanchuyen.php"; break;
            case 'page_language':

                include_once dirname(__FILE__).DIR_THEMES."gioithieu.php"; break;

            case 'service_languages':
                include_once dirname(__FILE__) . DIR_THEMES . "chitiet-dichvu.php";break;

            case 'about-us':
               include_once dirname(__FILE__) . DIR_THEMES . "about-us.php";break;

            case 'faqs':
                include_once dirname(__FILE__) . DIR_THEMES . "faqs.php";break;

            case 'services1':
                include_once dirname(__FILE__) . DIR_THEMES . "services.php";break;

            case 'step-1':
                include_once dirname(__FILE__) . DIR_THEMES . "step-1.php";break;

            case 'step-2':
                include_once dirname(__FILE__) . DIR_THEMES . "step-2.php";break;

            case 'step-3':
                include_once dirname(__FILE__) . DIR_THEMES . "step-3.php";break;

            case 'requirement_visa':
                include_once dirname(__FILE__) . DIR_THEMES . "requirement_visa.php";break;

            case 'emabassy_visa':
                include_once dirname(__FILE__) . DIR_THEMES . "emabassy_visa.php";break;

            case 'check-status':
                $title = 'Check status';
                include_once dirname(__FILE__) . DIR_THEMES . "check-status.php";break;

            case 'payment-page':
                include_once dirname(__FILE__) . DIR_THEMES . "payment-page.php";break;

            case 'test-paypal':
                include_once dirname(__FILE__) . DIR_THEMES . "test-paypal.php";break;

            case 'services':
                $title = 'Services';
                include_once dirname(__FILE__) . DIR_THEMES . "dich-vu.php";break;

            case 'info-order':
                include_once dirname(__FILE__) . DIR_THEMES . "info-order.php";break;

            case 'test-email':
                include_once dirname(__FILE__) . DIR_THEMES . "test-email.php";break;

            case 'info-order-review':
                include_once dirname(__FILE__) . DIR_THEMES . "info-order-review.php";break;

            case 'pay-now':
                include_once dirname(__FILE__) . DIR_THEMES . "pay-now.php";break;

            case 'payment-create-order':
                include_once dirname(__FILE__) . DIR_THEMES . "payment-create-order.php";break;

            default:
                include_once dirname(__FILE__) . DIR_THEMES . "404.php";break;
        }
    }
    else include_once dirname(__FILE__).DIR_THEMES."home.php";
    ?>
</div>


<?php include_once dirname(__FILE__).DIR_THEMES."footer.php"; ?>
<?= $rowConfig['tab_footer'] ?>
</body>

</html>

