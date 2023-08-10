<?php 
    $slug = isset($_GET['slug']) ? $_GET['slug'] : '';

    $rowLang = $action_news->getNewsLangDetail_byUrl($slug,$lang);
    $row = $action_news->getNewsDetail_byId($rowLang['news_id'],$lang);
    $_SESSION['sidebar'] = 'newsDetail';

    $sim = '<div class="has-image shopify-buy__layout-vertical shopify-buy__product"><div class="shopify-buy__product-img-wrapper" data-element="product.imgWrapper"><img alt="Vietnam Tourist eSim 7GB - 8 days" data-element="product.img" class="shopify-buy__product__variant-img" src="https://cdn.shopify.com/s/files/1/0549/4204/0126/products/giga7_550x825.png?v=1667316168"></div><h1 class="shopify-buy__product__title" data-element="product.title">Vietnam Tourist eSim 7GB - 8 days</h1><div class="shopify-buy__product__price" data-element="product.prices">            <span class="visuallyhidden">Regular price&nbsp;</span>            <span class="shopify-buy__product__actual-price " data-element="product.price">$8.90</span>          </div><div class="shopify-buy__btn-wrapper" data-element="product.buttonWrapper"><button class="shopify-buy__btn  " data-element="product.button">Add to cart</button></div></div>';

    $rowLang['lang_news_content'] = str_replace("<p>[sim]</p>", $sim, $rowLang['lang_news_content']);

    function news_views ($news_id) {
        global $conn_vn;
        $sql = "SELECT * FROM news WHERE news_id = $news_id";
        $result = mysqli_query($conn_vn, $sql);
        $row = mysqli_fetch_assoc($result);
        $diem = $row['news_views'];
        $diem++;

        $sql = "UPDATE news SET news_views = $diem WHERE news_id = $news_id";
        $result = mysqli_query($conn_vn, $sql);
    }
    news_views($row['news_id']);
    // var_dump($row);
?>
<style>
.gb-single-blog_cuanhom .gb-single-blog_cuanhom-right-text {
    line-height: 2;
}
.gb-single-blog_cuanhom .gb-single-blog_cuanhom-right-text ul, .gb-single-blog_cuanhom .gb-single-blog_cuanhom-right-text ol {
    list-style: revert;
    margin-left: 20px;
}
.gb-single-blog_cuanhom .gb-single-blog_cuanhom-right-text {
    line-height: 2;
}
.gb-single-blog_cuanhom .gb-single-blog_cuanhom-right h1 {
    font-size: 2em;
}
.gb-single-blog_cuanhom .gb-single-blog_cuanhom-right h2 {
    font-size: 1.5em;
}
.gb-single-blog_cuanhom .gb-single-blog_cuanhom-right h3 {
    font-size: 1.17em;
}
.gb-single-blog_cuanhom .gb-single-blog_cuanhom-right h4 {
    /*font-size: 2em;*/
}
.gb-single-blog_cuanhom .gb-single-blog_cuanhom-right h5 {
    font-size: 0.83em;
}
.gb-single-blog_cuanhom .gb-single-blog_cuanhom-right h6 {
    font-size: 0.67em;
}
.gb-single-blog_cuanhom .gb-single-blog_cuanhom-right table td {
    border: 1px solid black;
}
.gb-single-blog_cuanhom .gb-single-blog_cuanhom-right table th {
    border: 1px solid black;
}

blockquote {
    font-family: Georgia,serif;
    font-size: 16px;
    font-style: italic;
    width: 100%;
    margin: 0.25em 0;
    padding: 0.55em 40px;
    line-height: 1.45;
    position: relative;
    color: #383838;
    border-left: 3px dashed #c1c1c1;
    background: #eee;
}

#sim {
    width: 100%;
    height: 295px;
}
@media (min-width: 768px){
    .gb-single-blog_cuanhom .date-update {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
}

.gb-single-blog_cuanhom-right-text table {
    width: 100%;
}
.gb-single-blog_cuanhom-right-text table th {
    border: 1px solid #ccc;
    padding: 10px;
    background: #dee2e6;
}
.gb-single-blog_cuanhom-right-text table td {
    border: 1px solid #ccc;
    padding: 10px;
}
@media screen and (max-width: 768px) {
    .gb-single-blog_cuanhom .gb-single-blog_cuanhom-right h1 {
        font-size: 1.7em;
    }
    .gb-single-blog_cuanhom .gb-single-blog_cuanhom-right h2 {
        font-size: 1.3em;
    }
}
</style>
<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_VISA_0001.php";?>
<div class="gb-single-blog_cuanhom">
    <div class="container">
        <div class="row">
            <div class="col-md-8 gb-single-blog_cuanhom-right">
                <!-- <div class="gb-single-blog_cuanhom-right-img">
                    <img src="/images/<?= $row['news_img'] ?>" alt="<?= $rowLang['lang_news_name'] ?>" class="img-responsive">
                </div> -->
                <div class="gb-single-blog_cuanhom-right-title">
                    <h1><?= $rowLang['lang_news_name'] ?></h1>
                </div>
                <div class="date-update">
                    <div class="date">
                        Last update: <?= date('M d, Y', strtotime($row['news_created_date'])); ?>
                    </div>
                    <div class="social">
                        <img src="/images/fb.jpg" alt="fb">
                        <img src="/images/twitter.jpg" alt="twitter">
                    </div>
                </div>
                <hr>
                <!-- <div class="gb-single-blog_cuanhom-right-info">
                    <ul>
                        <li><i class="fa fa-user" aria-hidden="true"></i><a href="#"> Admin</a></li>
                        <li><i class="fa fa-clock-o" aria-hidden="true"></i><a href="#"> <?= date('F, d, M', strtotime($row['news_created_date'])) ?></a></li>
                        <li><i class="fa fa-folder-open-o" aria-hidden="true"></i><a href="#"> Design, Graphic</a></li>
                        <li><i class="fa fa-comment-o" aria-hidden="true"></i><a href="#"> 5 comments</a></li>
                    </ul>
                </div> -->
                <div class="gb-single-blog_cuanhom-right-text">
                    <?= $rowLang['lang_news_content'] ?>
                </div>

                <!-- <div class="gb-single-blog_cuanhom-share">
                    <div class="row">
                        <div class="col-md-5 gb-single-blog_cuanhom-share-left">
                            <ul>
                                <li><a href="#">Finance</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Photo</a></li>
                            </ul>
                        </div>
                        <div class="col-md-5 col-md-offset-2 gb-single-blog_cuanhom-share-right">
                            <ul>
                                <li><span><i class="fa fa-share-alt" aria-hidden="true"></i> share</span></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div> -->

                <!--bình luận-->
                <?php include DIR_EMAIL."MS_EMAIL_CUANHOM_0002.php";?>

                <!--tin tức liên quan-->
                <?php include DIR_NEWS."MS_NEWS_CUANHOM_0003.php";?>

            </div>
            <div class="col-md-4 gb-blog-left">
                <?php include DIR_SIDEBAR."MS_SIDEBAR_CUANHOM_0003.php";?>
                <?php include DIR_SIDEBAR."MS_SIDEBAR_VISA_0002.php";?>
                <?php include DIR_SIDEBAR."MS_SIDEBAR_VISA_0003.php";?>
            </div>
        </div>
    </div>
</div>
