<?php 
    $requirement_visa = $action->getDetail('quoc_gia', 'requirement_url', $_GET['page']);

    // $rowLang['lang_page_content'] = str_replace('<span style="background-color:#3498db">', '<span class="num">', $rowLang['lang_page_content']);
?>
<style>
.gb-page-gioithieu .gb-page-gioithieu-right ul, .gb-page-gioithieu .gb-page-gioithieu-right ol {
    list-style: revert;
    margin-left: 20px;
}
.gb-page-gioithieu .gb-page-gioithieu-right {
    line-height: 2;
}
.gb-page-gioithieu .gb-page-gioithieu-right h1 {
    font-size: 2em;
}
.gb-page-gioithieu .gb-page-gioithieu-right h2 {
    font-size: 1.5em;
}
.gb-page-gioithieu .gb-page-gioithieu-right h3 {
    font-size: 1.17em;
}
.gb-page-gioithieu .gb-page-gioithieu-right h4 {
    /*font-size: 2em;*/
}
.gb-page-gioithieu .gb-page-gioithieu-right h5 {
    font-size: 0.83em;
}
.gb-page-gioithieu .gb-page-gioithieu-right h6 {
    font-size: 0.67em;
}

.gb-page-gioithieu-right .num {
    border-radius: 50%;
    color: #fff;
    background: #3498db;
    padding: 3px 12px;
}

blockquote {
    font-family: Georgia,serif;
    font-size: 16px;
    font-style: italic;
    width: 100%;
    margin: 0.25em 0;
    padding: 0.55em 40px;
    line-height: 1.45;
    position: relative;
    color: #383838;
    border-left: 3px dashed #c1c1c1;
    background: #eee;
}
@media screen and (max-width: 768px) {
    .gb-page-gioithieu .gb-page-gioithieu-right h1 {
        font-size: 1.7em;
    }
    .gb-page-gioithieu .gb-page-gioithieu-right h2 {
        font-size: 1.3em;
    }
}
</style>
<div class="gb-page-gioithieu">
    <?php include DIR_BREADCRUMBS."MS_BREADCRUMS_CUANHOM_0006.php";?>
    <div class="container">
        <div class="gb-page-gioithieu-right">
            <div class="row">
                <div class="col-md-8" style="margin-bottom: 20px;">
                    <h1><?= $requirement_visa['requirement_title'] ?></h1>
                    <hr>
                    <?= $requirement_visa['requirement_content'] ?>
                    
                </div>
                <div class="col-md-4">
                    <?php include DIR_SIDEBAR."MS_SIDEBAR_VISA_0002.php";?>
                    <?php include DIR_SIDEBAR."MS_SIDEBAR_VISA_0003.php";?>
                </div>
            </div>
            
        </div>
    </div>
</div>