<style>
@font-face {
    font-display: swap;
    font-family: ez-toc-icomoon;
    src: url(/fonts/ez-toc-icomoon.eot);
    src: url(/fonts/ez-toc-icomoon.eot?#iefix) format('embedded-opentype'), url(/fonts/ez-toc-icomoon.woff2) format('woff2'), url(/fonts/ez-toc-icomoon.woff) format('woff'), url(/fonts/ez-toc-icomoon.ttf) format('truetype'), url(/fonts/ez-toc-icomoon.svg#ez-toc-icomoon) format('svg');
    font-weight: 400;
    font-style: normal
}
@font-face {
    font-family: "icomoon";
    src: url("/fonts/icomoon.eot?y3d7zy");
    src: url("/fonts/icomoon.eot?y3d7zy#iefix") format("embedded-opentype"), url("/fonts/icomoon.ttf?y3d7zy") format("truetype"), url("/fonts/icomoon.woff?y3d7zy") format("woff"), url("/fonts/icomoon.svg?y3d7zy#icomoon") format("svg");
    font-weight: normal;
    font-style: normal;
    font-display: block
}
.__sb-contact-us {
    margin-bottom: 32px;
    border: 1px solid #d8d8d8;
    border-radius: 8px;
    padding: 24px;
}
.__sb-contact-us h2 {
    font-size: 24px;
    line-height: 32px;
    font-weight: bold;
}
.__sb-contact-us .list-contact-us ul {
    margin-left: 0;
}
.__sb-contact-us .list-contact-us ul li {
    list-style: none;
    padding: 8px 0;
    padding-left: 20px;
    position: relative;
    color: #009eeb;
    height: 35px;
}
.__sb-contact-us .list-contact-us ul li:first-child::before {
    content: "";
}
.__sb-contact-us .list-contact-us ul li:nth-child(2)::before {
    content: "";
}
.__sb-contact-us .list-contact-us ul li::before {
    position: absolute;
    font-family: "icomoon" !important;
    left: 0;
    color: #009eeb;
}
.__sb-contact-us .sb-time .icon-sideba-time::before {
    color: #009eeb;
    margin-right: 4px;
}
.icon-sideba-time:before {
    content: "";
    /*position: absolute;*/
    font-family: "icomoon" !important;
    left: 0;
    color: #009eeb;
    display: inline-block;
    width: 20px;
}
.__sb-contact-us .icon-sideba-time {
    font-family: "icomoon" !important;
    speak: never;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.__sb-contact-us #sb-datetime {
    color: #000;
}
</style>
<div class="__sb-contact-us">
    <h2 class="hd-2 mb-0">Contact us!</h2>
    <div class="list-contact-us mt-2">
        <ul class="sidebar-why-apply">
            <li class="page_item page-item-29512"><?= $rowConfig['content_home3'] ?></li>
            <li class="page_item page-item-29512"><?= $rowConfig['content_home2'] ?></li>
            <li style="padding-left: 0;">
                <span class="icon-sideba-time"></span>
                <span id="sb-datetime"><?= date('D M d Y, H:i:s') ?> (GMT+7)</span>
            </li>
        </ul>
    </div>
    <!-- <p class="sb-time mb-0 mt-2" style="margin-bottom: 12px;">
        <span class="icon-sideba-time"></span>
        <span id="sb-datetime"><?= date('D M d Y, H:i:s') ?> (GMT+7)</span>
    </p> -->
</div>