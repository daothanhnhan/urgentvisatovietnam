<!--MENU MOBILE-->

<?php include_once DIR_MENU."MS_MENU_CUANHOM_0002.php"; ?>

<!-- End menu mobile-->



<!--MENU DESTOP-->
<style>
@font-face {
    font-display: swap;
    font-family: ez-toc-icomoon;
    src: url(/fonts/ez-toc-icomoon.eot);
    src: url(/fonts/ez-toc-icomoon.eot?#iefix) format('embedded-opentype'), url(/fonts/ez-toc-icomoon.woff2) format('woff2'), url(/fonts/ez-toc-icomoon.woff) format('woff'), url(/fonts/ez-toc-icomoon.ttf) format('truetype'), url(/fonts/ez-toc-icomoon.svg#ez-toc-icomoon) format('svg');
    font-weight: 400;
    font-style: normal
}
@font-face {
    font-family: "icomoon";
    src: url("/fonts/icomoon.eot?y3d7zy");
    src: url("/fonts/icomoon.eot?y3d7zy#iefix") format("embedded-opentype"), url("/fonts/icomoon.ttf?y3d7zy") format("truetype"), url("/fonts/icomoon.woff?y3d7zy") format("woff"), url("/fonts/icomoon.svg?y3d7zy#icomoon") format("svg");
    font-weight: normal;
    font-style: normal;
    font-display: block
}
.gb-header-cuanhom {
    box-shadow: 0px 0px 16px rgb(0 0 0 / 10%);
}
.gb-header-cuanhom .header-top {
    border-bottom: 1px solid #ccc;
}
.gb-header-cuanhom .header-top .gb-top-header_cuanhom-left ul li {
        display: inline-block;
    font-size: 14px;
    line-height: 1.5;
    /*color: #fff;*/
    padding: 5px;
}
.gb-header-cuanhom .header-top .gb-top-header_cuanhom-left ul li i {
    width: 20px;
    height: 20px;
    border: 1px solid #000;
    border-radius: 50%;
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    margin-right: 10px;
    font-size: 10px;
}
.gb-header-cuanhom .header-top .gb-top-header_cuanhom-right {
    text-align: right;
}
.gb-header-cuanhom .header-top .gb-top-header_cuanhom-right ul li {
    display: inline-block;
    font-size: 16px;
    line-height: 1.5;
    /*color: #fff;*/
    padding: 5px;
}

.lang {
    cursor: pointer;
    position: relative;
}
.lang-box {
    position: absolute;
    background: #fff;
    box-shadow: 0 0 10px gray;
    top: 40px;
    z-index: 9999;
    padding: 20px;
    width: 170px;
    right: 0;
    text-align: left;
}
.lang-box ul li {
    display: block !important;
}
.gb-header-cuanhom .header-bottom {
    /*border-bottom: 1px solid #ccc;*/
    color: #000 !important;
    background-color: #fff;
}
.gb-main-menu_cuanhom .cssmenu > ul > li > a {
    color: #000;
    text-transform: unset;
    font-size: 15px;
    font-weight: 400;
}
.gb-main-menu_cuanhom .cssmenu ul .__header-apply {
    display: inline-block;
}
.gb-main-menu_cuanhom .cssmenu ul .__header-apply .btn-apply {
    background: linear-gradient(315deg, #DF1E26 0%, #EB5757 100%) !important;
    border-radius: 8px !important;
    color: #fff !important;
    font-weight: 500 !important;
}
.logo-top {
    margin-top: 8px;
    margin-left: 10px;
}

.date-update .social img {
    height: 12px;
}

@media screen and (max-width: 991px) {
    .date-update .social {
        margin-top: 10px;
    }

    .mobile-nav .menu-mobile-nav {
        font-size: 24px;
    }
}


</style>
<header>

    <div class="gb-header-cuanhom">

        <div class="header-top hidden-xs hidden-sm">
            <div class="container">
                <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="gb-top-header_cuanhom-left">

                        <ul>
                            <li><i class="fa fa-phone" aria-hidden="true"></i><?= $rowConfig['content_home3'] ?></li>
                            <li><i class="fa fa-calendar-plus-o"></i> <?= date('D M d Y, ') ?><span id="head-time"><?= date('H:i:s') ?></span> (GMT + 7)</li>
                        </ul>

                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="gb-top-header_cuanhom-right">
                        <ul>
                            <li><a href="/check-status" title="">Check status</a></li>
                            <!-- <li><a href="" title="">Login</a></li>
                            <li class="lang" onclick="flag()"><span><img src="/images/english.jpg" alt="flag" width="20"> English <i class="fa fa-caret-down"></i></span>
                                <div class="lang-box" id="lang-box-id" style="display: none;">
                                    <ul>
                                        <li><img src="/images/co_viet.png" alt="flag" width="20"> Vietnamese</li>
                                        <li><img src="/images/english.jpg" alt="flag" width="20"> English</li>
                                    </ul>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="header-bottom sticky-menu" id="menu-main">
            <div class="container">
                <div style="" class="row">
                    <div class="col-md-3">
                        <a href="/" style=""><img src="/images/<?= $rowConfig['web_logo'] ?>" alt="logo" class="img-responsive logo-top" width="200"></a>
                    </div>
                    <div class="col-md-9">
                        <?php include DIR_MENU."MS_MENU_CUANHOM_0001.php";?>
                        
                    </div>
                </div>
            </div>
        </div>


    </div>

</header>



<script src="/plugin/sticky/jquery.sticky.js"></script>

<script>

    $(document).ready(function () {
        <?php if (!empty($_GET['page'])) { ?>
        $(".sticky-menu").sticky({topSpacing:0});
        <?php } ?>
    });

</script>

<style>
.sticky-menu-main {
  position: fixed;
  top: 0px;
  width: 100%;
  z-index: 99999;
}
</style>
<script>
<?php if (empty($_GET['page'])) { ?>
window.onscroll = function() {menu_main();};
<?php } else { ?>
// window.onscroll = function() {menu_main()};
<?php } ?>

var navbar_menu_main = document.getElementById("menu-main");
var sticky_menu_main = navbar_menu_main.offsetTop;

function menu_main() {
  if (window.pageYOffset >= sticky_menu_main) {
    navbar_menu_main.classList.add("sticky-menu-main")
  } else {
    navbar_menu_main.classList.remove("sticky-menu-main");
  }
}
</script>

<script>
    function flag () {
        var co = document.getElementById("lang-box-id").style.display;
        if (co == 'none') {
            document.getElementById("lang-box-id").style.display = 'block';
        } else {
            document.getElementById("lang-box-id").style.display = 'none';
        }
    }

    setInterval(function () {
        var head_t = new Date();

        var head_gio = head_t.getHours();
        var head_phut = head_t.getMinutes();
        var head_giay = head_t.getSeconds();
        var head_luc = head_gio + ':' + head_phut + ':' + head_giay;

        document.getElementById("head-time").innerHTML = head_luc;
    }, 1000);
</script>