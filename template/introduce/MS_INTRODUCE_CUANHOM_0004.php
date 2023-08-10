<?php 
    $home_news = $action->getList('news', 'home', '1', 'news_id', 'desc', '', '9', '');
?>
<link rel="stylesheet" href="/plugin/owl-carouse/owl.carousel.min.css">
<link rel="stylesheet" href="/plugin/owl-carouse/owl.theme.default.min.css">
<style>
.home-partner {
    background: #f0f7fd;
    padding: 48px 0;
    margin-top: 64px;
}
.home-partner .service-title {
    font-size: 32px;
    line-height: 40px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 10px;
}
.home-partner img {
    width: 100%;
    margin-bottom: 20px;
}
/*/////////////*/
.home-partner .aspect-box {
    position: relative;
    width: 100%;
    padding-top: 60%;
    display: block;
}
.home-partner .aspect-img {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    object-fit: cover;
    width: 100%;
    height: 100%;
    border-radius: 5px;
}
.home-partner .info a {
    font-weight: bold;
    font-size: 16px;
    margin-top: 20px;
    margin-bottom: 10px;
    /*min-height: 40px;*/
    display: inline-block;
    color: #000;
}
.home-partner .info p {
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}
.home-partner .home-partner-des {
    text-align: center;
    margin-bottom: 30px;
}
@media screen and (max-width: 768px) {
    .home-partner {
        padding: 25px 0;
        margin-top: 25px;
    }
}
@media screen and (max-width: 991px) {
    .home-partner .home-partner-des {
        padding-left: 15px;
        padding-right: 15px;
    }
}
</style>
<div class="home-partner">
    <div class="container">
        <div class="row">
            <h2 class="service-title">Vietnam Visa News</h2>
            <p class="home-partner-des">Get updated with useful tips and guide about Vietnam evisa and Vietnam travel - Don't ignore if you are planning a visit to Vietnam</p>
        </div>
        <div class=" owl-carousel owl-theme owl-visa-news">
            <?php foreach ($home_news as $item) { ?>
            <div class="col-md-121">
                <a href="/<?= $item['friendly_url'] ?>" class="aspect-box">
                    <img src="/images/<?= $item['news_img'] ?>" alt="news" class="aspect-img">
                </a>
                <div class="info">
                    <a href="/<?= $item['friendly_url'] ?>" title=""><?= $item['news_name'] ?></a>
                    <p><?= $item['news_des'] ?></p>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<script src="/plugin/owl-carouse/owl.carousel.min.js"></script>

<script>
    $(document).ready(function () {

        var owl = $('.owl-visa-news');

        owl.owlCarousel({

            loop: true,

            margin: 20,

            navSpeed: 500,

            nav: false,

            dots: true,

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

                    items: 3

                }

            }

        });

    });
</script>