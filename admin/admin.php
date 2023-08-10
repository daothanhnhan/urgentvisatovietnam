<?php
include_once('__autoload.php');


if (isset($_GET['logout'])) {
    $acc->logout();
    $acc->redirect("index.php");
}

$trang = isset($_GET['trang']) ? $_GET['trang'] : '1';
$infor = $acc->getLoginInfor();

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'vn';
if (isSet($_GET['lang'])) {
    $lang = $_GET['lang'];
    $id_lang = $_GET['lang'];
    // register the session and set the cookie
    $_SESSION['lang'] = $lang;

    //setcookie('lang', $lang, time() + (3600 * 24 * 30));
} else if (isSet($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
    $id_lang = $_SESSION['lang'];
} else if (isSet($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
    $id_lang = $_COOKIE['lang'];
} else {
    $lang = 'vn';
    $id_lang = 'vn';
}
switch ($lang) {
    case 'en':
        $lang_file = 'lang_en.php';
        break;

    case 'vn':
        $lang_file = 'lang_vn.php';
        break;

    default:
        $lang_file = 'lang_vn.php';

}
include_once '../languages/' . $lang_file;
$config_id = 1;
$rowConfigLang = $action->getDetail_New('config_languages', array('config_id', 'languages_code'), array(&$config_id, &$lang), 'is');
?>
<?php
    $hidden_multi_lang = 'hidden';// de an text laf hidden.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Quản trị</title>

    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="css/content.css"/>
    <link rel="stylesheet" type="text/css" href="css/header.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/content.css"/>
    <link rel="stylesheet" type="text/css" href="css/footer.css"/>
    <link rel="stylesheet" type="text/css" href="css/pageload.css"/>
    <link rel='stylesheet' type='text/css' href='css/chi-tiet-trang-noi-dung.css'/>
    <link rel='stylesheet' type='text/css' href='css/trac-nghiem-benh-tri.css'/>
    <link rel="stylesheet" type="text/css" href="css/font.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script src="https://rawgit.com/andrewng330/PreviewImage/master/preview.image.min.js"></script>
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script src="js/getslug.js"></script>
    <script src="js/action_query_ajax.js"></script>
    <script src="js/pageload.min.js"></script>

    <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        (function () {
            var link_element = document.createElement("link"),
                s = document.getElementsByTagName("script")[0];
            if (window.location.protocol !== "http:" && window.location.protocol !== "https:") {
                link_element.href = "http:";
            }
            link_element.href += "//fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600italic,600,700italic,700,800italic,800";
            link_element.rel = "stylesheet";
            link_element.type = "text/css";
            s.parentNode.insertBefore(link_element, s);
        })();
    </script>
</head>


<body>
<div id="divWrapper">
    <?php include_once('fixedNav.php'); ?>
    <div class="centerWeb">
        <div class="coverWeb">
            <?php
            if (isset($_GET["page"])) {
                switch ($_GET["page"]) {

                    case 'trinh-don':
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        echo "<link rel='stylesheet' type='text/css' href='css/trang-noi-dung.css' />";
                        include_once('template/trinh-don/menu.php');
                        break;

                    case 'them-trinh-don':
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/trinh-don/them-menu.php");
                        break;

                    case 'sua-trinh-don':
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/trinh-don/sua-menu.php");
                        break;

                    /*----------- Bài viết ------------*/

                    case "bai-viet":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        echo "<link rel='stylesheet' type='text/css' href='css/trang-noi-dung.css' />";
                        include_once("template/bai-viet/trang-noi-dung.php");
                        break;

                    case "sua-bai-viet":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/bai-viet/chi-tiet-trang-noi-dung.php");
                        break;

                    case "them-bai-viet":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/bai-viet/them-trang-noi-dung.php");
                        break;

                    /*----------- Danh mục bài viết ------------*/

                    case "danh-muc-tin-tuc":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        echo "<link rel='stylesheet' type='text/css' href='css/trang-noi-dung.css' />";
                        include_once("template/danh-muc-tin-tuc/danh-muc-tin-tuc.php");
                        break;

                    case "sua-danh-muc-tin-tuc":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/danh-muc-tin-tuc/sua-danh-muc-tin-tuc.php");
                        break;

                    case "them-danh-muc-tin-tuc":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/danh-muc-tin-tuc/them-danh-muc-tin-tuc.php");
                        break;

                    /*------------- Tin tức ------------*/

                    case "them-tin-tuc":
                        if ($_SESSION['admin_role'] == 2) {
                            header('location: index.php');
                        }
                        include_once("template/tin-tuc/them-tin-tuc.php");
                        break;

                    case "sua-tin-tuc":
                        if ($_SESSION['admin_role'] == 2) {
                            header('location: index.php');
                        }
                        include_once("template/tin-tuc/sua-tin-tuc.php");
                        break;

                    case "tin-tuc":
                        if ($_SESSION['admin_role'] == 2) {
                            header('location: index.php');
                        }
                        echo "<link rel='stylesheet' type='text/css' href='css/trang-bai-viet.css' />";
                        include_once("template/tin-tuc/tin-tuc.php");
                        break;

                    /*----------- Danh mục dịch vụ ------------*/

                    case "danh-muc-dich-vu":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        echo "<link rel='stylesheet' type='text/css' href='css/trang-danh-muc-dich-vu.css' />";
                        include_once("template/danh-muc-dich-vu/danh-muc-dich-vu.php");
                        break;

                    case "sua-danh-muc-dich-vu":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/danh-muc-dich-vu/sua-danh-muc-dich-vu.php");
                        break;

                    case "them-danh-muc-dich-vu":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/danh-muc-dich-vu/them-danh-muc-dich-vu.php");
                        break;

                    /*------------- Tin tức ------------*/

                    case "them-dich-vu":
                        if ($_SESSION['admin_role'] == 2) {
                            header('location: index.php');
                        }
                        include_once("template/dich-vu/them-dich-vu.php");
                        break;

                    case "sua-dich-vu":
                        if ($_SESSION['admin_role'] == 2) {
                            header('location: index.php');
                        }
                        include_once("template/dich-vu/sua-dich-vu.php");
                        break;

                    case "dich-vu":
                        if ($_SESSION['admin_role'] == 2) {
                            header('location: index.php');
                        }
                        echo "<link rel='stylesheet' type='text/css' href='css/trang-dich-vu.css' />";
                        include_once("template/dich-vu/dich-vu.php");
                        break;


                    /*-------------- Sản phẩm -----------*/

                    case "them-san-pham":
                        echo "<link rel='stylesheet' type='text/css' href='css/trang-san-pham-them-moi.css' />";
                        include_once("template/san-pham/them-san-pham.php");
                        break;

                    case "sua-san-pham":
                        echo "<link rel='stylesheet' type='text/css' href='css/trang-san-pham-them-moi.css' />";
                        include_once("template/san-pham/sua-san-pham.php");
                        break;

                    case "san-pham":
                        echo "<link rel='stylesheet' type='text/css' href='css/trang-noi-dung.css' />";
                        include_once("template/san-pham/san-pham.php");
                        break;

                    /*-------------- Danh mục sản phẩm -----------*/

                    case "them-danh-muc-san-pham":
                        include_once("template/danh-muc-san-pham/them-loai-san-pham.php");
                        break;

                    case "sua-danh-muc-san-pham":
                        include_once("template/danh-muc-san-pham/sua-loai-san-pham.php");
                        break;

                    case "danh-muc-san-pham":
                        echo "<link rel='stylesheet' type='text/css' href='css/trang-noi-dung.css' />";
                        include_once("template/danh-muc-san-pham/loai-san-pham.php");
                        break;

                    /*-------------- danh sach nguoi dung dang ky thong tin ... -----------*/

                    case "dang-ky":
                        include_once("template/dang-ky/dang-ky.php");
                        break;

                    case "sua-dang-ky":
                        include_once("template/dang-ky/sua-dang-ky.php");
                        break;

                    case "them-dang-ky":
                        include_once("template/dang-ky/them-dang-ky.php");
                        break;

                    /*-------------- danh sach nguoi dung dang ky thành viên -----------*/

                    // case thanh vien user
                     case "tai-khoan-user":
                        include_once("template/tai-khoan-user/tai-khoan-user.php");
                        break;

                    // 

                    case "thanh-vien":
                        include_once("template/thanh-vien/thanh-vien.php");
                        break;

                    case "sua-thanh-vien":
                        include_once("template/thanh-vien/sua-thanh-vien.php");
                        break;

                    case "them-thanh-vien":
                        include_once("template/thanh-vien/them-thanh-vien.php");
                        break;


                    /*------------- Tài khoản ------------*/

                    case "tai-khoan":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        echo "<link rel='stylesheet' type='text/css' href='css/trang-san-pham.css' />";
                        include_once("template/tai-khoan/tai-khoan.php");
                        break;

                    case "them-tai-khoan":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        echo "<link rel='stylesheet' type='text/css' href='css/trang-san-pham-them-moi.css' />";
                        include_once("template/tai-khoan/them-tai-khoan.php");
                        break;

                    case "sua-tai-khoan":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        echo "<link rel='stylesheet' type='text/css' href='css/trang-san-pham-them-moi.css' />";
                        include_once("template/tai-khoan/sua-tai-khoan.php");
                        break;


                    /*--------- Config -------------*/

                    case 'config':
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once('config.php');
                        break;

                    ///////////// Trang đơn hàng //////////////////

                    case "them-don-hang":
                        include_once("template/don-hang/them-don-hang.php");
                        break;

                    case "sua-don-hang":
                        echo "<link rel='stylesheet' type='text/css' href='css/sua-don-hang.css' />";
                        include_once("template/don-hang/sua-don-hang.php");
                        break;

                    case "don-hang":
                        echo "<link rel='stylesheet' type='text/css' href='css/trang-don-hang.css' />";
                        include_once("template/don-hang/don-hang.php");
                        break;

                    case 'lien-he':
                        include_once('template/lien-he.php');
                        break;
                    //////////////Slider///////////////////
                    case "slider":
                        include_once("slider.php");
                        break;

                    case "them-slider":
                        include_once("them-slider.php");
                        break;

                    case "sua-slider":
                        include_once("sua-slider.php");
                        break;
                    /////////////// Quảng cáo //////////////////////
                    case "quang-cao":
                        include_once("quang-cao.php");
                        break;

                    case "them-quang-cao":
                        include_once("them-quang-cao.php");
                        break;

                    case "sua-quang-cao":
                        include_once("sua-quang-cao.php");
                        break;
                    //////////// content service //////////
                    case "content-service":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/content-service/content-service.php");
                        break;
                    case "them-content-service":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/content-service/them-content-service.php");
                        break;
                    case "sua-content-service":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/content-service/sua-content-service.php");
                        break;
                    case "xoa-content-service":
                        include_once("template/content-service/xoa-content-service.php");
                        break;
                    //////////// faq service //////////////
                    case "faq-service":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/faq-service/faq-service.php");
                        break;
                    case "them-faq-service":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/faq-service/them-faq-service.php");
                        break;
                    case "sua-faq-service":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/faq-service/sua-faq-service.php");
                        break;
                    case "xoa-faq-service":
                        include_once("template/faq-service/xoa-faq-service.php");
                        break;
                    ////////////// faqs ///////////////////
                    case "faqs":    
                        if ($_SESSION['admin_role'] == 2) {
                            header('location: index.php');
                        }
                        include_once("template/faqs/faqs.php");
                        break;
                    case "them-faqs":
                        if ($_SESSION['admin_role'] == 2) {
                            header('location: index.php');
                        }
                        include_once("template/faqs/them-faqs.php");
                        break;
                    case "sua-faqs":
                        if ($_SESSION['admin_role'] == 2) {
                            header('location: index.php');
                        }
                        include_once("template/faqs/sua-faqs.php");
                        break;
                    case "xoa-faqs":
                        include_once("template/faqs/xoa-faqs.php");
                        break;
                    //////////// quoc gia /////////////////
                    case "quoc-gia":
                        if ($_SESSION['admin_role'] == 2) {
                            header('location: index.php');
                        }
                        include_once("template/quoc-gia/quoc-gia.php");
                        break;
                    case "them-quoc-gia":
                        if ($_SESSION['admin_role'] == 2) {
                            header('location: index.php');
                        }
                        include_once("template/quoc-gia/them-quoc-gia.php");
                        break;
                    case "sua-quoc-gia":
                        if ($_SESSION['admin_role'] == 2) {
                            header('location: index.php');
                        }
                        include_once("template/quoc-gia/sua-quoc-gia.php");
                        break;
                    case "xoa-quoc-gia":
                        include_once("template/quoc-gia/xoa-quoc-gia.php");
                        break;
                    //////////// say //////////////////////
                    case "say":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/say/say.php");
                        break;
                    case "them-say":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/say/them-say.php");
                        break;
                    case "sua-say":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/say/sua-say.php");
                        break;
                    case "xoa-say":
                        include_once("template/say/xoa-say.php");
                        break;
                    //////////// footer ///////////////////
                    case "footer-content":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/footer/footer.php");
                        break;
                    //////////// nhom faqs ////////////////
                    case "nhom-faqs":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/nhom-faqs/nhom-faqs.php");
                        break;
                    case "them-nhom-faqs":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/nhom-faqs/them-nhom-faqs.php");
                        break;
                    case "sua-nhom-faqs":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/nhom-faqs/sua-nhom-faqs.php");
                        break;
                    case "xoa-nhom-faqs":
                        include_once("template/nhom-faqs/xoa-nhom-faqs.php");
                        break;
                    ///////////// arrival port ////////////
                    case "arrival-port":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/arrival-port/arrival-port.php");
                        break;
                    case "them-arrival-port":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/arrival-port/them-arrival-port.php");
                        break;
                    case "sua-arrival-port":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/arrival-port/sua-arrival-port.php");
                        break;
                    case "xoa-arrival-port":
                        include_once("template/arrival-port/xoa-arrival-port.php");
                        break;
                    //////////// type visa ////////////////
                    case "type-visa":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/type-visa/type-visa.php");
                        break;
                    case "them-type-visa":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/type-visa/them-type-visa.php");
                        break;
                    case "sua-type-visa":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/type-visa/sua-type-visa.php");
                        break;
                    case "xoa-type-visa":
                        include_once("template/type-visa/xoa-type-visa.php");
                        break;
                    /////////// processing time /////////
                    case "processing-time":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/processing-time/processing-time.php");
                        break;
                    case "them-processing-time":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/processing-time/them-processing-time.php");
                        break;
                    case "sua-processing-time":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/processing-time/sua-processing-time.php");
                        break;
                    case "xoa-processing-time":
                        include_once("template/processing-time/xoa-processing-time.php");
                        break;
                    /////////// visa category /////////////
                    case "visa-category":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/visa-category/visa-category.php");
                        break;
                    case "them-visa-category":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/visa-category/them-visa-category.php");
                        break;
                    case "sua-visa-category":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/visa-category/sua-visa-category.php");
                        break;
                    case "xoa-visa-category":
                        include_once("template/visa-category/xoa-visa-category.php");
                        break;
                    /////////// purpose of visit //////////
                    case "purpose-of-visit":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/purpose-of-visit/purpose-of-visit.php");
                        break;
                    case "them-purpose-of-visit":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/purpose-of-visit/them-purpose-of-visit.php");
                        break;
                    case "sua-purpose-of-visit":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/purpose-of-visit/sua-purpose-of-visit.php");
                        break;
                    case "xoa-purpose-of-visit":
                        include_once("template/purpose-of-visit/xoa-purpose-of-visit.php");
                        break;
                    ////////// arrival port group /////////
                    case "arrival-port-group":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/arrival-port-group/arrival-port-group.php");
                        break;
                    case "them-arrival-port-group":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/arrival-port-group/them-arrival-port-group.php");
                        break;
                    case "sua-arrival-port-group":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/arrival-port-group/sua-arrival-port-group.php");
                        break;
                    case "xoa-arrival-port-group":
                        include_once("template/arrival-port-group/xoa-arrival-port-group.php");
                        break;
                    /////////// country prefix ////////////
                    case "country-prefix":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/country-prefix/country-prefix.php");
                        break;
                    case "them-country-prefix":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/country-prefix/them-country-prefix.php");
                        break;
                    case "sua-country-prefix":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/country-prefix/sua-country-prefix.php");
                        break;
                    case "xoa-country-prefix":
                        include_once("template/country-prefix/xoa-country-prefix.php");
                        break;
                    ////////////// seo ////////////////////
                    case "sua-seo-page-book":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/seo/sua-seo-page-book.php");
                        break;
                    case "sua-seo-check-status":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/seo/sua-seo-check-status.php");
                        break;
                    //////////// service all //////////////
                    case "service-all":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/service-all/service-all.php");
                        break;
                    case "them-service-all":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/service-all/them-service-all.php");
                        break;
                    case "sua-service-all":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/service-all/sua-service-all.php");
                        break;
                    case "xoa-service-all":
                        include_once("template/service-all/xoa-service-all.php");
                        break;
                    //////////// about us /////////////////
                    case "about-us":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/about-us/about-us.php");
                        break;
                    case "them-about-us":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/about-us/them-about-us.php");
                        break;
                    case "sua-about-us":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/about-us/sua-about-us.php");
                        break;
                    case "xoa-about-us":
                        include_once("template/about-us/xoa-about-us.php");
                        break;
                    ///////////// why /////////////////////
                    case "why":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/why/why.php");
                        break;
                    case "them-why":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/why/them-why.php");
                        break;
                    case "sua-why":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/why/sua-why.php");
                        break;
                    case "xoa-why":
                        include_once("template/why/xoa-why.php");
                        break;
                    //////////// milestones ///////////////
                    case "milestones":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/milestones/milestones.php");
                        break;
                    case "them-milestones":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/milestones/them-milestones.php");
                        break;
                    case "sua-milestones":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/milestones/sua-milestones.php");
                        break;
                    case "xoa-milestones":
                        include_once("template/milestones/xoa-milestones.php");
                        break;
                    //////////// leadership ///////////////
                    case "leadership":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/leadership/leadership.php");
                        break;
                    case "them-leadership":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/leadership/them-leadership.php");
                        break;
                    case "sua-leadership":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/leadership/sua-leadership.php");
                        break;
                    case "xoa-leadership":
                        include_once("template/leadership/xoa-leadership.php");
                        break;
                    //////////// services team ////////////
                    case "services-team":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/services-team/services-team.php");
                        break;
                    case "them-services-team":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/services-team/them-services-team.php");
                        break;
                    case "sua-services-team":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/services-team/sua-services-team.php");
                        break;
                    case "xoa-services-team":
                        include_once("template/services-team/xoa-services-team.php");
                        break;
                    ///////////// typical client //////////
                    case "typical-client":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/typical-client/typical-client.php");
                        break;
                    case "them-typical-client":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/typical-client/them-typical-client.php");
                        break;
                    case "sua-typical-client":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/typical-client/sua-typical-client.php");
                        break;
                    case "xoa-typical-client":
                        include_once("template/typical-client/xoa-typical-client.php");
                        break;
                    ///////////// location ////////////////
                    case "location":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/location/location.php");
                        break;
                    case "them-location":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/location/them-location.php");
                        break;
                    case "sua-location":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/location/sua-location.php");
                        break;
                    case "xoa-location":
                        include_once("template/location/xoa-location.php");
                        break;
                    ///////////// e visa book /////////////
                    case "book-visa":
                        if ($_SESSION['admin_role'] == 3) {
                            header('location: index.php');
                        }
                        include_once("template/book-visa/book-visa.php");
                        break;
                    case "person-visa":
                        if ($_SESSION['admin_role'] == 3) {
                            header('location: index.php');
                        }
                        include_once("template/book-visa/person-visa.php");
                        break;
                    case "state-visa":
                        if ($_SESSION['admin_role'] == 3) {
                            header('location: index.php');
                        }
                        include_once("template/book-visa/state-visa.php");
                        break;
                    case "sua-book-visa":
                        if ($_SESSION['admin_role'] == 3) {
                            header('location: index.php');
                        }
                        include_once("template/book-visa/sua-book-visa.php");
                        break;
                    case "xoa-book-visa":
                        include_once("template/book-visa/xoa-book-visa.php");
                        break;
                    //////////// pay pal key //////////////
                    case "paypal-key":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/paypal-key/paypal-key.php");
                        break;
                    ////////////// create order //////////
                    case "create-order":
                        if ($_SESSION['admin_role'] == 3) {
                            header('location: index.php');
                        }
                        include_once("template/create-order/create-order.php");
                        break;
                    case "them-create-order":
                        if ($_SESSION['admin_role'] == 3) {
                            header('location: index.php');
                        }
                        include_once("template/create-order/them-create-order.php");
                        break;
                    case "sua-create-order":
                        if ($_SESSION['admin_role'] == 3) {
                            header('location: index.php');
                        }
                        include_once("template/create-order/sua-create-order.php");
                        break;
                    case "xoa-create-order":
                        include_once("template/create-order/xoa-create-order.php");
                        break;
                    ////////////// our services ///////////
                    case "our-services":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/our-services/our-services.php");
                        break;
                    case "them-our-services":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/our-services/them-our-services.php");
                        break;
                    case "sua-our-services":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/our-services/sua-our-services.php");
                        break;
                    case "xoa-our-services":
                        include_once("template/our-services/xoa-our-services.php");
                        break;
                    //////////// day file pdf /////////////
                    case "file-pdf":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/file-pdf/file-pdf.php");
                        break;
                    ///////////// tao sitemap /////////////
                    case "tao-sitemap":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/tao-sitemap/tao-sitemap.php");
                        break;
                    //////////// dang ky //////////////////
                    case "home-voa":
                        if ($_SESSION['admin_role'] == 3) {
                            header('location: index.php');
                        }
                        include_once("template/dang-ky/home-voa.php");
                        break;
                    case "sua-home-voa":
                        if ($_SESSION['admin_role'] == 3) {
                            header('location: index.php');
                        }
                        include_once("template/dang-ky/sua-home-voa.php");
                        break;
                    case "xoa-home-voa":
                        include_once("template/dang-ky/xoa-home-voa.php");
                        break;
                    case "arrival-assistance-book":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/dang-ky/arrival-assistance-book.php");
                        break;
                    case "departure-assistance-book":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/dang-ky/departure-assistance-book.php");
                        break;
                    case "work-permit-book":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/dang-ky/work-permit-book.php");
                        break;
                    case "temporary-residence-book":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/dang-ky/temporary-residence-book.php");
                        break;
                    case "urgent-visa-book":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/dang-ky/urgent-visa-book.php");
                        break;
                    case "year-visa-book":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/dang-ky/year-visa-book.php");
                        break;
                    case "visa-extension-book":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/dang-ky/visa-extension-book.php");
                        break;
                    case "apec-book":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/dang-ky/apec-book.php");
                        break;
                    case "service-book":
                        if ($_SESSION['admin_role'] == 3) {
                            header('location: index.php');
                        }
                        include_once("template/dang-ky/service-book.php");
                        break;
                    case "sua-service-book":
                        if ($_SESSION['admin_role'] == 3) {
                            header('location: index.php');
                        }
                        include_once("template/dang-ky/sua-service-book.php");
                        break;
                    case "xoa-service-book":
                        include_once("template/dang-ky/xoa-service-book.php");
                        break;
                    case "check-status":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/dang-ky/check-status.php");
                        break;
                    case "info-email":
                        if ($_SESSION['admin_role'] != 1) {
                            header('location: index.php');
                        }
                        include_once("template/dang-ky/info-email.php");
                        break;
                    ///////////// Default /////////////////
                    default:
                        include_once("homeAdmin.php");
                }
            } else {
                include_once("homeAdmin.php");
            }
            ?>

        </div><!--end coverWeb-->
    </div>
</div><!--end divWrapper-->
<link rel="stylesheet" type="text/css" href="../css/select2.min.css"/>
<script src="../js/select2.min.js"></script>
<script>
    $(function () {
        $('.select2').select2({
            width: '100%',
        });
    })
</script>
<style>
    .select2-results__option, .select2-results__options {
        width: 100%;
    }
</style>
</body>
</html>

