<?php 
    // $home_arr_service = array(81, 73, 74, 75, 71, 72);
    $home_arr_service = $action->getList('service', 'home', '1', 'service_id', 'desc', '', '', '');

    $home_service_page = $action->getDetail('page', 'page_id', 53);
?>
<link rel="stylesheet" href="/plugin/owl-carouse/owl.carousel.min.css">
<link rel="stylesheet" href="/plugin/owl-carouse/owl.theme.default.min.css">
<style>
.__vnvisa-our-service {

}
.__vnvisa-our-service .box-info .title {
    font-size: 32px;
    line-height: 40px;
    font-weight: bold;
    text-align: center;
}
.__vnvisa-our-service .box-info .service-des {
    text-align: center;
    margin-top: 20px;
    margin-bottom: 20px;

}
.__vnvisa-our-service .visa-service-item h4 a {
    color: #000;
    margin-top: 10px;
    margin-bottom: 10px;
    display: inline-block;
}
.__vnvisa-our-service .visa-service-item .__service-des {
    overflow: hidden;
    text-overflow: ellipsis;
    -webkit-line-clamp: 4;
    height: auto;
    display: -webkit-box;
    -webkit-box-orient: vertical;
}
.__vnvisa-our-service .owl-next {
    position: absolute;
    top: 20%;
    right: 0;
    background: #F5A83D !important;
}
.__vnvisa-our-service .owl-prev {
    position: absolute;
    top: 20%;
    left: 0;
    background: #F5A83D !important;
}
.__vnvisa-our-service .visa-service-item img {
    border-radius: 5px;
}
/*.__vnvisa-our-service .des {
    padding-left: 10px;
    padding-right: 10px;
}*/
@media screen and (max-width: 991px) {
    .__vnvisa-our-service .box-info .service-des {
        padding-left: 15px;
        padding-right: 15px;
    }
}
</style>
<div class="">
        <!-- HTML Code here -->
        <div class="__vnvisa-our-service mt-64">
            <div class="container">
                <div class="row">
                    <div class="col-lg-121">
                        <div class="box-info">
                            <h2 class="title"><?= $home_service_page['page_name'] ?></h2>
                            <div class="col-md-121 col-md-offset-2-1 mb-0 service-des"><p><?= $home_service_page['page_des'] ?></p></div>
                        </div>
                    </div>
                </div>
                <div class="owl-service position-relative">
                    <div class="owl-carousel owl-theme owl-visa-service">
                        <?php 
                        foreach ($home_arr_service as $item) { 
                            $service = $action->getDetail('service', 'service_id', $item['service_id']);
                        ?>
                            <div class="item">
                                <div class="visa-service-item">
                                    <a href="/<?= $service['friendly_url'] ?>">
                                        <img src="/images/<?= $service['service_img'] ?>" alt="Service">
                                    </a>
                                    <h4 class="hd-4 service-title"><a class="" href="/<?= $service['friendly_url'] ?>"><?= $service['service_name'] ?></a></h4>
                                    <p class="txt-14-22 c-dark-gray mb-0 __service-des"><?= $service['service_des'] ?></p>
                                </div>
                            </div>
                        <?php } ?>                            
                    </div>
                </div>
            </div>
        </div>
        </div>

<script src="/plugin/owl-carouse/owl.carousel.min.js"></script>

<script>
    $(document).ready(function () {

        var owl = $('.owl-visa-service');

        owl.owlCarousel({

            loop: true,

            margin: 20,

            navSpeed: 500,

            nav: true,

            dots: false,

            autoplay: false,

            rewind: true,

            navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],

            responsive: {

                0: {

                    items: 1

                },

                767: {

                    items: 2

                },

                992: {

                    items: 4

                }

            }

        });

    });
</script>