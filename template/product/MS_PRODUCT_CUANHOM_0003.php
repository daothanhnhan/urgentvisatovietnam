<?php 

    if (isset($_GET['slug']) && $_GET['slug'] != '') {

        $slug = $_GET['slug'];



        $rowCatLang = $action_product->getProductCatLangDetail_byUrl($slug,$lang);

        $rowCat = $action_product->getProductCatDetail_byId($rowCatLang['productcat_id'],$lang);

        $rows = $action_product->getProductList_byMultiLevel_orderProductId($rowCat['productcat_id'],'desc',$trang,12,$slug);//var_dump($rows);

    }else{

        $rows = $action->getList('product','','','product_id','desc',$trang,12,'san-pham');

        

    }



    $_SESSION['sidebar'] = 'productCat';

?>
<style>
.padding-mobile-procat {
    padding-right: 2px;
    padding-left: 2px;
}
</style>
<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_CUANHOM_0004.php";?>

<div class="gb-page-sanpham_cuanhom home-procat">

    <div class="container padding-mobile-procat">

        <div class="col-md-9">

            <?php include DIR_SEARCH."MS_SEARCH_CUANHOM_0001.php";?>

            <div class="row" style="display: flex;flex-wrap: wrap;">

                <?php 

                $d = 0;

                foreach ($rows['data'] as $item) { 

                    $d++;

                    $rowLang = $action_product->getProductLangDetail_byId($item['product_id'], $lang);

                ?>

                <div class="col-xs-6 col-sm-4">

                    <div class="gb-product-item_cuanhom">

                        <div class="gb-product-item_cuanhom-img">

                            <a href="/<?= $rowLang['friendly_url'] ?>"><img src="/images/<?= $item['product_img'] ?>" alt="<?= $rowLang['lang_product_name'] ?>" class="img-responsive"></a>

                        </div>

                        <div class="gb-product-item_cuanhom-text">

                            <h2><a href="/<?= $rowLang['friendly_url'] ?>"><?= $rowLang['lang_product_name'] ?></a></h2>

                            <!-- <p>Mã sản phẩm: <?= $item['product_code'] ?></p> -->
                            <div class="hpfix02"><?= $item['product_des'] ?></div>
                            <?php $price =  $item?>
                            <?php include DIR_PRODUCT."MS_PRODUCT_CUANHOM_0009.php";?>
                            <div class="hotline_cuanhom">Hotline: <?= $rowConfig['content_home3'] ?></div>

                        </div>

                    </div>

                </div>

                <?php 

                if ($d%3==0) {

                    // echo '<hr style="width:100%;border:0;" />';

                }

                } ?>

            </div>

            <div><?= $rows['paging'] ?></div>

        </div>

        <div class="col-md-3">
            <?php include DIR_SIDEBAR."MS_SIDEBAR_CUANHOM_0009.php";?>

            <?php include DIR_SIDEBAR."MS_SIDEBAR_CUANHOM_0001.php";?>

            <?php include DIR_SIDEBAR."MS_SIDEBAR_CUANHOM_0002.php";?>

            <?php include DIR_SIDEBAR."MS_SIDEBAR_CUANHOM_0004.php";?>

        </div>

    </div>

</div>