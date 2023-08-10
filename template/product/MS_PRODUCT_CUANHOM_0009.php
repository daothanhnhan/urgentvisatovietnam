
<!-- <?php print_r($price) ?> -->
<?php if($price['product_price_sale'] > 0){ ?>
    <div class="gb-product_price hidden">Giá: <span class="hpfix01"><?= number_format($price['product_price']) ?>đ</span> <span class="hpfix03"><?= number_format($price['product_price']*(100-$price['product_price_sale'])/100) ?>đ</span></div>

<?php }else{ ?>
    <div class="gb-product_price_sale hidden">Giá: <span class="hpfix03"><?= number_format($price['product_price']) ?>đ</span></div>
<?php } ?>

<div class="gb-product_price_sale">Giá: <span class="hpfix03">Liên hệ</span></div>