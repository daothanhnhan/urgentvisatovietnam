<?php   
    $action_service = new action_service();
    if (isset($_GET['slug']) && $_GET['slug'] != '') {
        $slug = $_GET['slug'];//echo 'tuan';die;                    
        $rowCatLang = $action_service->getServiceCatLangDetail_byUrl($slug,$lang);//var_dump($rowCatLang);
        $rowCat = $action_service->getServiceCatDetail_byId($rowCatLang['servicecat_id'],$lang);
        if (newsCatPageHasSub) {
            $rows = $action_service->getServiceList_byMultiLevel_orderServiceId($rowCat['servicecat_id'],'desc',$trang,8,$slug);
        } else {
            $rows = $action_service->getServiceCat_byServiceCatIdParentHighest($rowCat['servicecat_id'],'desc');//var_dump($rows);die;
        }        
    }
    else $rows = $action->getList($nameTable_news,'','',$nameColId_news,'desc',$trang,8,'tin-tuc'); 
    // var_dump($rows);die;
?>
<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_VISA_0005.php";?>
<div class="gb-page-blog_cuanhom">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    <?php 
                    $d = 0;
                    foreach ($rows['data'] as $item) {
                        $d++;
                        $rowLang = $action_service->getServiceLangDetail_byId($item['service_id'],$lang); 
                        // var_dump($item);
                    ?>
                    <div class="col-sm-6">
                        <div class="gb-news-blog_cuanhom-item">
                            <div class="gb-news-blog_cuanhom-item-img">
                                <a href="/<?= $rowLang['friendly_url'] ?>"><img src="/images/<?= $item['service_img'] ?>" alt="<?= $rowLang['lang_service_name'] ?>" class="img-responsive"></a>
                                <div class="caption caption-large">
                                    <time class="the-date"><?= substr($item['service_create_date'], 0, 10) ?></time>
                                </div>
                            </div>
                            <div class="gb-news-blog_cuanhom-item-text">
                                <div class="gb-news-blog_cuanhom-item-title">
                                    <h3><a href="/<?= $rowLang['friendly_url'] ?>"><?= $rowLang['lang_service_name'] ?></a></h3>
                                </div>
                                <div class="gb-news-blog_cuanhom-item-text-des">
                                    <p><?= $rowLang['lang_service_des'] ?></p>
                                </div>
                            </div>
                            <div class="gb-news-blog_cuanhom-item-button">
                                <a href="/<?= $rowLang['friendly_url'] ?>">
                                    <button type="button" class="btn gb-btn-readmore">Read more</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php 
                    if ($d%2==0) {
                        echo '<hr style="width:100%;border:0;" />';
                    }
                    } ?>
                </div>
                <div><?= $rows['paging'] ?></div>
            </div>
            <div class="col-sm-3">
                <?php //include DIR_SIDEBAR."MS_SIDEBAR_CUANHOM_0001.php";?>
                <?php //include DIR_SIDEBAR."MS_SIDEBAR_CUANHOM_0002.php";?>
                <?php include DIR_SIDEBAR."MS_SIDEBAR_CUANHOM_0003.php";?>
            </div>
        </div>
    </div>
</div>