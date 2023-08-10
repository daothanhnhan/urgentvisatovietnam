<?php 

$action_product = new action_product(); 

$slug = isset($_GET['slug']) ? $_GET['slug'] : '';



$rowLang = $action_product->getProductLangDetail_byUrl($slug,$lang);

$name_pro = $rowLang['lang_product_name'];

$row = $action_product->getProductDetail_byId($rowLang[$nameColIdProduct_productLanguage],$lang);

$_SESSION['productcat_id_relate'] = $row[$nameColIdProductCat_product];

$_SESSION['sidebar'] = 'productDetail';

$arr_id = $row['productcat_ar'];

$arr_id = explode(',', $arr_id);

$productcat_id = (int)$arr_id[0];

$product_breadcrumb = $action_product->getProductCatLangDetail_byId($productcat_id, $lang);

$breadcrumb_url = $product_breadcrumb['friendly_url'];

$breadcrumb_name = $product_breadcrumb['lang_productcat_name'];

$use_breadcrumb = true;



$img_sub = json_decode($row['product_sub_img']);

?>

<link rel="stylesheet" href="/plugin/slickNav/slicknav.css"/>

<link rel="stylesheet" href="/plugin/slick/slick.css"/>

<link rel="stylesheet" href="/plugin/slick/slick-theme.css"/>

<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_CUANHOM_0003.php";?>

<div class="gb-chitiet_sanpham_cuanhom">

    <div class="gb-chitiet_sanpham_cuanhom-body">

        <div class="container">

            <div class="row">

                <div class="col-sm-3 hidden-xs">

                    <?php include DIR_SIDEBAR."MS_SIDEBAR_CUANHOM_0001.php";?>

                    <?php include DIR_SIDEBAR."MS_SIDEBAR_CUANHOM_0002.php";?>

                    <?php include DIR_SIDEBAR."MS_SIDEBAR_CUANHOM_0004.php";?>

                </div>



                <div class="col-sm-9">

                    <div class="gb-chitiet_sanpham_cuanhom-left">

                        <!--chi titest sản phẩm-->

                        <!--                        <div class="row">-->

                            <!--                            <div class="col-md-8">-->

                                <div class="gb-chitiet_sanpham_cuanhom_left-img">

                                    <div class="uni-single-car-gallery-images">

                                        <div class="slider slider-for">

                                            <div class="slide-item"><img src="/images/<?= $row['product_img'] ?>" alt="view" class="img-responsive img1" data-zoom-image="/images/<?= $row['product_img'] ?>"></div>

                                            <?php 

                                            $d = 1;

                                            foreach ($img_sub as $item) {

                                              $d++;

                                              $image = json_decode($item, true);?>

                                              <div class="slide-item"><img src="/images/<?= $image['image'] ?>" alt="" class="img-responsive img2" data-zoom-image="/images/<?= $image['image'] ?>"></div>

                                          <?php } ?>

                                      </div>

                                      <div class="slider slider-nav">

                                        <div class="slide-item-nav"><img src="/images/<?= $row['product_img'] ?>" alt="" class="img-responsive" data-zoom-image="/images/<?= $row['product_img'] ?>"></div>

                                        <?php 

                                        $d = 1;

                                        foreach ($img_sub as $item) {

                                          $d++;

                                          $image = json_decode($item, true);?>

                                          <div class="slide-item-nav"><img src="/images/<?= $image['image'] ?>" alt="" class="img-responsive" data-zoom-image="/images/<?= $image['image'] ?>"></div>

                                      <?php } ?>

                                  </div>

                              </div>

                          </div>

                          <!--                            </div>-->

                          <!--                            <div class="col-md-4">-->

                            <div class="gb-chitiet_sanpham_cuanhom_left-info">

                                <h1><?= $name_pro ?></h1>

                                <p>Mã sản phẩm: <?= $row['product_code'] ?></p>

                                <p>Hãng sản xuất: <?= $row['product_expiration'] ?></p>

                                <p>Xuất sứ: <?= $row['product_material'] ?></p>

                                <?php $price =  $row?>
                                <?php include DIR_PRODUCT."MS_PRODUCT_CUANHOM_0009.php";?>

                                <div class="product-des">

                                    <?= $row['product_des'] ?>

                                </div>

                                <div class="hotline_cuanhom">Hotline : <?= $rowConfig['content_home3'] ?></div>

                            </div>

                            <!--                            </div>-->

                            <!--                        </div>-->



                            <!--THÔNG SỐ VÀ MÔ TẢ-->

                            <div class="gb-thongso-mota">

                                <div class="uni-shortcode-tabs-default">

                                    <div class="uni-shortcode-tab-3">

                                        <div class="tabbable-panel">

                                            <div class="tabbable-line">

                                                <ul class="nav nav-tabs ">

                                                    <li  class="active">

                                                        <a href="#tab_default_32" data-toggle="tab">

                                                        Mô tả sản phẩm</a>

                                                    </li>

                                                    <li>

                                                        <a href="#tab_default_33" data-toggle="tab">

                                                        Hình thức vận chuyển</a>

                                                    </li>

                                                    <li>

                                                        <a href="#tab_default_34" data-toggle="tab">

                                                        Hình thức thanh toán</a>

                                                    </li>

                                                </ul>

                                                <div class="tab-content">

                                                    <div class="tab-pane active" id="tab_default_32">

                                                        <?= $row['product_content'] ?>

                                                    </div>

                                                    <div class="tab-pane" id="tab_default_33">

                                                        <?php 

                                                        $action_page = new action_page(); 

                                                        $slug = 'hinh-thuc-giao-hang';



                                                        $rowLang = $action_page->getPageLangDetail_byUrl($slug,$lang);

                                                        $row = $action_page->getPageDetail_byId($rowLang['news_id'],$lang);

                                                        $_SESSION['sidebar'] = 'pageDetail';

                                                        ?>
                                                         <?= $rowLang['lang_page_content'] ?>


                                                    </div>

                                                    <div class="tab-pane" id="tab_default_34">
                                                        <?php 

                                                        $action_page = new action_page(); 

                                                        $slug = 'hinh-thuc-thanh-toan';



                                                        $rowLang = $action_page->getPageLangDetail_byUrl($slug,$lang);

                                                        $row = $action_page->getPageDetail_byId($rowLang['news_id'],$lang);

                                                        $_SESSION['sidebar'] = 'pageDetail';

                                                        ?>
                                                         <?= $rowLang['lang_page_content'] ?>

                                                     <!-- <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="1"></div> -->

                                                 </div>

                                             </div>

                                         </div>

                                     </div>

                                 </div>

                             </div>

                         </div>



                         <!--realte product-->

                         <?php include DIR_PRODUCT."MS_PRODUCT_CUANHOM_0005.php";?>



                     </div>

                 </div>

                 <div class="col-sm-3 hidden-sm hidden-md hidden-lg">

                    <?php include DIR_SIDEBAR."MS_SIDEBAR_CUANHOM_0001.php";?>

                    <?php include DIR_SIDEBAR."MS_SIDEBAR_CUANHOM_0002.php";?>

                    <?php include DIR_SIDEBAR."MS_SIDEBAR_CUANHOM_0004.php";?>

                </div>

             </div>

         </div>

     </div>

 </div>



 <script src="/plugin/slick/scripts.js"></script>

 <script src="/plugin/slick/slick.js"></script>

 <script src="/plugin/slickNav/jquery.slicknav.js"></script>



 <div id="fb-root"></div>

 <script>(function(d, s, id) {

    var js, fjs = d.getElementsByTagName(s)[0];

    if (d.getElementById(id)) return;

    js = d.createElement(s); js.id = id;

    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";

    fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));</script>



<script type="text/javascript">

    $(document).ready(function() {

        $('.slider-for').slick({

            slidesToShow: 1,

            slidesToScroll: 1,

            speed: 500,

            arrows: false,

            fade: true,

            asNavFor: '.slider-nav'

        });

        $('.slider-nav').slick({

            slidesToShow: 6,

            slidesToScroll: 1,

            speed: 500,

            asNavFor: '.slider-for',

            dots: false,

            focusOnSelect: true,

            slide: 'div'

        });

    });

</script>