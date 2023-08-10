<?php 
    $quoc_gia = $action->getList('quoc_gia', '', '', 'id', 'asc', '', '', '');//var_dump($quoc_gia);
    $alpha = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
    // foreach ($quoc_gia as $item) {
    //     $mot = substr($item['name'], 1);
    //     $mot = strtolower($mot);
    //     foreach ($alpha as $k => $b) {
    //         if ($mot == $b) {
    //             $alpha[$k][] = $item;
    //         }
    //     }
    // }
    // var_dump($alpha);
?>
<style>
.visa-embassy {
    margin-top: 32px;
}
.d-flex {
    display: -ms-flexbox!important;
    display: flex!important;
}
.visa-embassy .Upper {
    width: 33%;
    font-weight: bold;
    font-size: 24px;
    line-height: 32px;
}
.visa-embassy .chess-country {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
}
.visa-embassy .chess-country .item-chess {
    width: 33.3333333333%;
    margin-bottom: 24px;
    display: flex;
    align-items: center;
}
.visa-embassy .chess-country .item-chess img {
    width: 20px;
    height: 14px;
    object-fit: cover;
    margin-right: 6px;
}
@media screen and (max-width: 768px) {
    .visa-embassy .Upper {
        width: 30px;
    }
}
</style>
<div class="visa-embassy">
    <?php foreach ($alpha as $key => $val) { ?>
        
        <div class="table-row d-flex">
            <div class="Upper bold"><?= strtoupper($val) ?></div>
            <div class="chess-country">
                <?php 
                foreach ($quoc_gia as $item) { 
                    $mot = substr($item['name'], 0, 1);
                    $mot = strtolower($mot);
                    if ($val == $mot) {
                ?>
                <div class="item-chess">
                    <a href="/<?= $item['emabassy_url'] ?>" title=" Angola"> <?= $item['name'] ?></a>
                </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <hr>    
    <?php } ?>                    
</div>