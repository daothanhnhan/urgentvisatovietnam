<?php 
    $sidebar_procat = $action_product->getProductCat_byProductCatIdParentSort(0, 'asc');
?>
<div class="gb-danhmucsanpham_cuanhom widget-sidebar">
    <aside class="widget">
        <h3 class="widget-title-sidebar-cuanhom">Danh mục sản phẩm</h3>
        <div class="widget-content">
            <div class="accordion-default">
                <ul class="accordion">
                    <!-- <li class="accordion-toggle"><a href="">MÁY SẢN XUẤT CỬA NHÔM</a></li>
                    <ul class="accordion-content">
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> Máy cắt nhôm</a></li>
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> Máy ghép góc nhôm</a></li>
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> Máy  phay đầu đố nhôm</a></li>
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> Máy đục lỗ khoá nhôm</a></li>
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> Máy cắt ke góc nhôm</a></li>
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> Máy dập khe cửa trượt và rãnh thoát nước</a></li>
                    </ul>

                    <li class="accordion-toggle"><a href="">MÁY SẢN XUẤT CỬA NHÔM LÕI THÉP</a></li>
                    <ul class="accordion-content">
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>Máy cắt hai đầu</a></li>
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>Máy hàn cửa nhựa</a></li>
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>Máy phay đầu đố</a></li>
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>Máy cắt nẹp kính</a></li>
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>Máy đục lỗ khoá</a></li>
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>Máy đục rãnh thoát nước</a></li>
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>Máy làm sạch góc hàn</a></li>
                    </ul>

                    <li class="accordion-toggle"><a href="">VẬT TƯ SẢN XUẤT</a></li>
                    <ul class="accordion-content">
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>Vật tư sản xuất trong ngành cửa nhựa</a></li>
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>Vật tư trong ngành sản xuất cửa nhôm</a></li>
                    </ul> -->
                    <?php 
                    foreach ($sidebar_procat as $item) {
                        $rowLang = $action_product->getProductCatLangDetail_byId($item['productcat_id'], $lang); 
                    ?>
                    <li class="accordion-toggle" style="text-transform: uppercase;"><a href="/<?= $rowLang['friendly_url'] ?>"><?= $rowLang['lang_productcat_name'] ?></a></li>
                    <ul class="accordion-content">
                        <?php 
                        $nav_children = $action_product->getProductCat_byProductCatIdParentSort($item['productcat_id'], 'asc');
                        foreach ($nav_children as $item_nav) {
                            $rowLang_children = $action_product->getProductCatLangDetail_byId($item_nav['productcat_id'], $lang); 
                        ?>
                        <li><a href="/<?= $rowLang_children['friendly_url'] ?>"><i class="fa fa-angle-right" aria-hidden="true"></i><?= $rowLang_children['lang_productcat_name'] ?></a></li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </aside>
</div>

<script>
    $(document).ready(function () {
        $('.accordion-default .accordion .accordion-toggle').on('click', function (e) {
            $(this).next().slideToggle('600');
            // $(".accordion-content").not($(this).next()).slideUp('600');
            $(this).toggleClass('active').siblings().removeClass('active');
        });
    });
</script>