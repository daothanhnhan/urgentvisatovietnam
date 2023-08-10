<?php 
    $why_apply = $action->getDetail('footer', 'id', 1)['note_5'];
    $why_apply_arr = explode("\r\n", $why_apply);
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.__sb-why-apply {
    margin-bottom: 32px;
    border: 1px solid #d8d8d8;
    border-radius: 8px;
    padding: 24px;
}
.__sb-why-apply h2 {
    font-size: 24px;
    line-height: 32px;
    font-weight: bold;
}
.__sb-why-apply .list-why-apply ul {
    margin-left: 0;
}
.__sb-why-apply .list-why-apply ul li {
    list-style: none;
    padding: 8px 0;
    /*padding-left: 20px;*/
    position: relative;
    height: 35px;
}
.__sb-why-apply .list-why-apply ul li::before {
    /*position: absolute;
    content: "\e900";
    font-family: "icomoon" !important;
    left: 0;
    color: #2cd1a0;*/
}
.__sb-why-apply .list-why-apply ul i {
    color: #2cd1a0;
    font-size: 14px;
}
</style>
<div class="__sb-why-apply">
    <h2 class="hd-2 mb-0">Why apply with us?</h2>
    <div class="list-why-apply mt-2">
        <ul class="sidebar-why-apply">
            <?php foreach ($why_apply_arr as $item) { ?>
            <li class="page_item page-item-29512"><i class="fa fa-check-circle"></i> <?= $item ?></li>
            <?php } ?>
        </ul>
    </div>
</div>