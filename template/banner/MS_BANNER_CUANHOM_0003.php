<?php 
    $home_list_country = $action->getList('quoc_gia', '', '', 'id', 'asc', '', '', '');

    $home_banner_page = $action->getDetail('page', 'page_id', 51);
?>
<style>
.banner--bg {
    height: 500px;
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    justify-content: center;
    background-position: center center;
    background-size: cover;
}
.banner--bg::before {
    position: absolute;
    content: "";
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,.6);
    z-index: -1;
}
.banner--bg .__home-search {
    text-align: center;
    color: #fff;
}
@media (min-width: 768px){
    .__wraper-banner>.container .home-title {
        font-size: 38px;
    }
}
.banner--bg .__home-search .__vnvisa-search {
    background: #fff;
    color: #222;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 11px 10px 24px;
    border-radius: 12px;
    position: relative;
    width: 480px;
    margin: auto;
}
.banner--bg .__home-search .__vnvisa-search .search-nationality {
    width: 100%;
}
.banner--bg .__home-search .__vnvisa-search .search-nationality label {
    font-size: 10px;
    line-height: 14px;
    text-align: left;
    display: block;
    margin: 0;
}
.banner--bg .__home-search .__vnvisa-search .search-nationality input {
    width: 100%;
    border: none;
    padding-right: 15px;
}
.pd-12-16 {
    padding: 12px 16px;
}
.btn-blue-grad {
    color: #fff !important;
    font-weight: 500;
    background-image: linear-gradient(135deg, #1dc675 0.42%, #1dc675 100%) !important;
    border-image-slice: 1;
    border-width: 0px;
    position: relative;
    z-index: 1;
    border-radius: 8px;
}
input:focus {
    outline: none !important;
    box-shadow: none !important;
}
.banner--bg .__home-search .__vnvisa-search .list-nationa {
        max-height: 290px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 0 1px rgb(68 68 68 / 11%);
        box-sizing: border-box;
        margin-top: 2px;
        margin-bottom: 0;
        opacity: 0;
        overflow: auto;
        padding: 0;
        pointer-events: none;
        position: absolute;
        top: 100%;
        max-height: 260px;
        left: 0;
        /*-webkit-transform-origin: 50% 0;
        -ms-transform-origin: 50% 0;
        transform-origin: 50% 0;
        -webkit-transform: scale(0.75) translateY(-21px);
        -ms-transform: scale(0.75) translateY(-21px);
        transform: scale(0.75) translateY(-21px);
        -webkit-transition: all .2s cubic-bezier(0.5, 0, 0, 1.25),opacity .15s ease-out;
        transition: all .2s cubic-bezier(0.5, 0, 0, 1.25),opacity .15s ease-out;*/
        z-index: 99999999999999999999;
        width: 100%;
    }
@media (min-width: 768px){
    
    .banner--bg .__home-search .__vnvisa-search .list-nationa li {
        list-style: none;
        text-align: left;
        padding: 4px 24px;
        cursor: pointer;
    }
    .banner--bg .__home-search .open .list-nationa {
        opacity: 1;
        pointer-events: none;
        -webkit-transform: scale(1) translateY(0);
        -ms-transform: scale(1) translateY(0);
        transform: scale(1) translateY(0);
    }
}


.__vnvisa-slide-info {
    background: linear-gradient(180deg, #F5A83D 0.42%, #F5A83D 100%);
    color: #fff;
    padding: 25px 0;
    overflow-x: scroll;
}
@media screen and (min-width: 991px) {
    .__vnvisa-slide-info {
        overflow: hidden;
    }
}
.__vnvisa-slide-info .visa-param {
    font-size: 40px;
    line-height: 56px;
    font-weight: bold;
}
.txt-14-22 {
    font-size: 14px;
    line-height: 22px;
}
@media (min-width: 1024px){
    .__vnvisa-slide-info .owl-stage {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100% !important;
    }
}
.visa-info .owl-stage-outer {
    width: 900px;
    margin: auto;
}
@media screen and (max-width: 768px) {
    .banner--bg .__home-search .__vnvisa-search {
        width: auto;
    }
    .banner--bg .__home-search .__vnvisa-search .list-nationa li {
        text-align: left;
        padding: 10px;
    }
    .__vnvisa-slide-info .owl-item {
        width: 10%!important;
    }

    .home-title {
        font-size: 25px;
        font-weight: bold;
    }

    .banner--bg {
        height: 400px;
    }

}


.slide-info {
    background: linear-gradient(180deg, #1dc675 0.42%, #1dc675 100%);
    color: #fff;
    padding-top: 20px;
    padding-bottom: 20px;
}
.slide-info .visa-param {
    font-weight: bold;
    font-size: 40px;
}
</style>

<link rel="stylesheet" href="/plugin/owl-carouse/owl.carousel.min.css">
<link rel="stylesheet" href="/plugin/owl-carouse/owl.theme.default.min.css">
<link rel="stylesheet" href="/plugin/animsition/css/animate.css">

<div class="wp-block-lazyblock-vnb-home-search lazyblock-vnb-home-search-Z1wQFwN">
        <div class="__wraper-banner banner--bg rocket-lazyload entered lazyloaded" style="background-image: url(/images/<?= $rowConfig['banner1'] ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="__home-search position-relative">
                            <div class="wrap-title-home">
                                <h1 class="home-title"><?= $home_banner_page['page_name'] ?></h1>
                                <div class="home-des hidden-xs"><?= $home_banner_page['page_content'] ?></div>
                                <!-- <p style="text-align:center" class="hidden-sm hidden-md hidden-lg">Check your visa requirement</p> -->
                                <span style="font-size: 27px;font-weight: bold"></span>
                            </div>
                            <div class="wrap-search mt-32 ">
                                
                                <div class="__vnvisa-search">
                                    <div class="search-nationality">
                                        <label for="">NATIONALITY</label>
                                        <input class="js-search" type="text" name="gender" id="search-nation-id" value="" placeholder="Your nationality" autocomplete="off" onkeyup="filter_list(this.value)">
                                    </div>
                                    <a href="#" class="btn btn-blue-grad btn-requirement pd-12-16" id="btn-select-nation"><span>Check requirement</span></a>
                                    <ul class="list-nationa js-list-nationa" id="list-nation-id">
                                                                                        
                                    <?php foreach ($home_list_country as $item) { ?>                                        
                                        <li data-value="" onclick="chon_nation('<?= $item['requirement_url'] ?>', '<?= $item['name'] ?>')"><?= $item['name'] ?></li>
                                    <?php } ?>                               
                                                                                        
                                                                            </ul>
                                </div>
                            </div>
                                                    </div>
                    </div>
                </div>
            </div>
        </div>
        
<div class="slide-info">
    <div class="container ">
        <div class="gb-visa-conso-slide owl-carousel owl-theme">

            <div class="item">
                <div class="wrap-item text-center">
                    <p class="visa-param mb-0"><?= $rowConfig['content_home4'] ?></p>
                    <span class="txt-14-22">years</span>
                </div>
            </div>
            <div class="item">
                <div class="wrap-item text-center">
                    <p class="visa-param mb-0"><?= $rowConfig['content_home5'] ?></p>
                    <span class="txt-14-22">clients</span>
                </div>
            </div>
            <div class="item">
                <div class="wrap-item text-center">
                    <p class="visa-param mb-0"><?= $rowConfig['content_home6'] ?></p>
                    <span class="txt-14-22">countries</span>
                </div>
            </div>
            <div class="item">
                <div class="wrap-item text-center">
                    <p class="visa-param mb-0"><?= $rowConfig['content_home7'] ?></p>
                    <span class="txt-14-22">success</span>
                </div>
            </div>
        </div>
    </div>
</div>
 

        <script type="text/javascript">
            $(".js-list-nationa").each(function() {
                // $(this).find("li:first-child").remove();
            });
        </script>
        </div>

<script>
$(document).ready(function(){
  $(".js-search").focusin(function(){
    $("#list-nation-id").css("opacity", "1");
    $("#list-nation-id").css("pointer-events", "auto");
  });
  $(".js-search").focusout(function(){
    
     setTimeout(function() { 
        $("#list-nation-id").css("opacity", "0");
        $("#list-nation-id").css("pointer-events", "none");
    }, 300);
  });
});
</script>

<script>
    function filter_list (val) {
        // alert('filter');
        // var input = document.getElementById('myInput');
        var filter = val.toUpperCase();

        var ul = document.getElementById("list-nation-id");
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
        document.getElementById("search-nation-id").value = nation;
        document.getElementById("btn-select-nation").setAttribute('href', '/'+link);
    }
</script>

<script src="/plugin/owl-carouse/owl.carousel.min.js"></script>
<script>
    $(document).ready(function (){
        $('.gb-visa-conso-slide').owlCarousel({
            loop:true,
            margin:0,
            navSpeed:500,
            nav:false,
            dots: false,
            autoplay: false,
            rewind: true,
            navText:[],
            items:4,
             responsive:{
                0:{
                    items:2
                },
                1000:{
                    items:4
                }
            }
        });
    });
</script>