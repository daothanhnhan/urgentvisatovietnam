<?php 
    $home_page = $action->getDetail('page', 'page_id', 47);

    $home_page['page_content'] = str_replace("<p>", '<p><i class="fa fa-check-circle"></i> ', $home_page['page_content']);
?>
<style>
.gb-introvechungtoi_rem .title {
    text-align: center;
    font-size: 30px;
    font-weight: bold;
    margin-bottom: 10px;
}
.gb-introvechungtoi_rem .des {
    /*max-width: 600px;*/
    text-align: center;
    margin: auto;
    margin-bottom: 20px;
}
.gb-introvechungtoi_rem .gb-introvechungtoi_rem-left {
    padding-top: 20px;
}
.gb-introvechungtoi_rem .gb-introvechungtoi_rem-left ul {
    list-style: revert;
    margin-left: 20px;
    
}
.gb-introvechungtoi_rem .gb-introvechungtoi_rem-left .gb-introvechungtoi_rem-doctiep {
    background: none;
    border: 0px solid #fff;
    color: blue;
    text-transform: none;
    padding: 10px;
}
.gb-introvechungtoi_rem .gb-introvechungtoi_rem-left .gb-introvechungtoi_rem-doctiep:hover {
    color: #F5A83D;
}
.gb-introvechungtoi_rem .gb-introvechungtoi_rem-right img {
    border-radius: 10px;
}
@media screen and (min-width: 768px) {
    .gb-introvechungtoi_rem .gb-introvechungtoi_rem-left ul {
        columns: 2;
      -webkit-columns: 2;
      -moz-columns: 2;
    }
}
.gb-introvechungtoi_rem .gb-introvechungtoi_rem-left p {
    margin-bottom: 10px;
    line-height: 1.3;
}
.gb-introvechungtoi_rem .gb-introvechungtoi_rem-left ul {
    position: relative;
}
.gb-introvechungtoi_rem .gb-introvechungtoi_rem-left ul li {
    position: relative;
    margin-bottom: 6px;
}
.gb-introvechungtoi_rem .gb-introvechungtoi_rem-left ul li:before {
        position: absolute;
    content: "";
    color: #2cd1a0;
    font-family: "icomoon" !important;
    left: -20px;
}
.gb-introvechungtoi_rem .gb-introvechungtoi_rem-left ul {
    list-style-type: none;
    padding: 0;
}
.gb-introvechungtoi_rem .gb-introvechungtoi_rem-left ul li::marker {
    display: none;
    content: '';
    color:#fff;
    z-index:-5;
}
.gb-introvechungtoi_rem .gb-introvechungtoi_rem-left ul li::-webkit-details-marker {
    display: none;
}
.gb-introvechungtoi_rem .gb-introvechungtoi_rem-left i {
    color: #2cd1a0;
}
.home-read-more {
    border: 1px solid #1dc675 !important;
    padding: 20px 30px !important;
    color: #1dc675 !important;
    font-weight: bold;
    border-radius: 4px;
    display: inline-block;
}
@media screen and (max-width: 768px) {
    .gb-introvechungtoi_rem {
        padding: 25px 0;
    }
}
</style>
<div class="gb-introvechungtoi_rem">

    <div class="container">

        <div class="row">

            <h2 class="title"><?= $home_page['page_name'] ?></h2>
            <p class="des"><?= $home_page['page_des'] ?></p>

            <div class="col-md-6">

                <div class="gb-introvechungtoi_rem-right">

                    <img src="/images/<?= $home_page['page_img'] ?>" alt="" class="img-responsive">

                </div>

            </div>

            <div class="col-md-6">

                <div class="gb-introvechungtoi_rem-left">

                    

                    <!-- <div class="gb-divider"></div> -->

                    <div>

                        <?= $home_page['page_content'] ?>

                    </div>

                    <a href="/about-us" class="gb-introvechungtoi_rem-doctiep home-read-more">Read more</a>

                </div>

            </div>

        </div>

    </div>

</div>