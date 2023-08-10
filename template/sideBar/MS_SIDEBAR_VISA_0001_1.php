<?php 
    $service_all = 0;
    if (isset($row['service_id'])) {
        $arr_service_id = array(71, 72, 73, 74, 75, 76, 77, 78, 79, 80);
        if (in_array($row['service_id'], $arr_service_id)) {
            $service_all = 1;
        }
    }

    $sidebar_service_item_1 = $action->getDetail('service', 'service_id', 71);
    $sidebar_service_item_2 = $action->getDetail('service', 'service_id', 72);
    $sidebar_service_item_3 = $action->getDetail('service', 'service_id', 73);
    $sidebar_service_item_4 = $action->getDetail('service', 'service_id', 74);
    $sidebar_service_item_5 = $action->getDetail('service', 'service_id', 75);
    $sidebar_service_item_6 = $action->getDetail('service', 'service_id', 76);
    $sidebar_service_item_7 = $action->getDetail('service', 'service_id', 77);
    $sidebar_service_item_8 = $action->getDetail('service', 'service_id', 78);
    $sidebar_service_item_9 = $action->getDetail('service', 'service_id', 79);
    $sidebar_service_item_10 = $action->getDetail('service', 'service_id', 80);

    $sidebar_page = $action->getDetail('page', 'page_id', 48);

    $sidebar_news_1 = $action->getDetail('news', 'news_id', 115);
    $sidebar_news_2 = $action->getDetail('news', 'news_id', 117);
    $sidebar_news_3 = $action->getDetail('news', 'news_id', 118);

?>
<style>
.__sb-all-services {
    margin-bottom: 32px;
}
.__sb-all-services h2 {
    font-size: 24px;
    line-height: 32px;
    font-weight: bold;
}
.__sb-all-services button {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    transition: .4s;
    font-weight: 500;
}
.__sb-all-services .list-all-service .panel {
    padding: 0 18px;
    background-color: #fff;
    overflow: hidden;
    max-height: 0;
    transition: max-height .2s ease-out;
    margin-bottom: 0;
}
.__sb-all-services .list-all-service .panel ul {
    margin-top: 15px;
    list-style: revert;
    margin-left: 20px;
}
.__sb-all-services .list-all-service a {
    display: block;
    margin: 8px 15px;
}
.__sb-all-services .list-all-service .button-active {
    color: #009eeb;
    border-left: 5px solid #009eeb;
}
.__sb-all-services .list-all-service .accordion-sidebar:hover {
    color: #009eeb;
    border-left: 5px solid #009eeb;
}
</style>
<div class="__sb-all-services <?= $service_all==1 ? '' : 'hidden' ?>">
    <h2 class="hd-2 mb-0">All services</h2>
    <div class="mt-2 list-all-service">
        <button class="accordion-sidebar">Airport service</button>
        <div class="panel" style="">
            <ul>
                <li><a href="/<?= $sidebar_service_item_1['friendly_url'] ?>">Arrival Assistance</a></li>
                <li><a href="/<?= $sidebar_service_item_2['friendly_url'] ?>">Departure Assistance</a></li>
            </ul>
        </div>

        <button class="accordion-sidebar">Expat service</button>
        <div class="panel" style="">
            <ul>
                <li><a href="/<?= $sidebar_service_item_3['friendly_url'] ?>">Work permit</a></li>
                <li><a href="/<?= $sidebar_service_item_4['friendly_url'] ?>">Temporary Residence Card</a></li>
                <li><a href="/<?= $sidebar_service_item_5['friendly_url'] ?>">Police Check</a></li>
                <li><a href="/<?= $sidebar_page['friendly_url'] ?>">Consular Legalization</a></li>
            </ul>
        </div>

        <button class="accordion-sidebar">Visa Service</button>
        <div class="panel" style="">
            <ul>
                <li><a href="/<?= $sidebar_service_item_6['friendly_url'] ?>">Visa on Arrival</a></li>
                <li><a href="/<?= $sidebar_service_item_7['friendly_url'] ?>">Urgent Visa</a></li>
                <li><a href="/<?= $sidebar_news_1['friendly_url'] ?>">Working Visa</a></li>
                <li><a href="/<?= $sidebar_news_2['friendly_url'] ?>">Investor Visa</a></li>
                <li><a href="/<?= $sidebar_service_item_8['friendly_url'] ?>">5 Years Visa</a></li>
                <li><a href="/<?= $sidebar_news_3['friendly_url'] ?>">Exit Visa</a></li>
                <li><a href="/<?= $sidebar_service_item_9['friendly_url'] ?>">Visa Extension</a></li>
                <li><a href="/<?= $sidebar_service_item_10['friendly_url'] ?>">ABTC stay extension</a></li>
            </ul>
        </div>
    </div>
</div>

<script>
var acc = document.getElementsByClassName("accordion-sidebar");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("button-active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}
</script>