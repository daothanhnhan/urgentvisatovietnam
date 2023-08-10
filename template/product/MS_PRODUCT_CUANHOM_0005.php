<?php 

    $product_related1 = $action_product->getListProductRelate_byIdCat_hasLimit($productcat_id, 6);

?>

<div class="gb-home-product gb-home-product-relate home-procat">

    <div class="gb-home-product-relate_cuanhom_title">

        Sản phẩm liên quan

    </div>

    <div class="row">

        <?php 

        $d = 0;

        foreach ($product_related1 as $item) {

            $d++;

            $row = $item;

            $rowLang = $action_product->getProductLangDetail_byId($row['product_id'],$lang);

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