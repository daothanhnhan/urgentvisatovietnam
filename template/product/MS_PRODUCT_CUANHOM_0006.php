<?php 

    $linhkien_cat = $action_product->getProductCatLangDetail_byId(154, $lang);

    $linhkien = $action_product->getProductList_byMultiLevel_orderProductId(154, 'desc', 1, 6, '');//var_dump($msxcn);

?>

<div class="gb-linhkienthaythe_cuanhom home-procat">

    <div  class="gb-maysanxuat_cuanhom_title">

        <h2><?= $linhkien_cat['lang_productcat_name'] ?></h2>

    </div>

    <div class="row" style="display: flex;flex-wrap: wrap;">

        <?php 

        $d = 0;

        foreach ($linhkien['data'] as $item) { 

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

</div>