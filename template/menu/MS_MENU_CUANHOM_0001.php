<nav class="gb-main-menu_cuanhom" >
    <div class="">
        <nav class="main-navigation uni-menu-text_cuanhom">
            <div class="cssmenu">
                <!-- <ul>
                    <li><a href="/index.php" class="slide-section">Trang chủ</a></li>
                    <li><a href="">Giới thiệu</a></li>
                    <li><a href="san-pham">Sản phẩm</a></li>
                    <li><a href="tin-tuc">Tin tức</a></li>
                    <li><a href="lien-he">Liên hệ</a></li>
                </ul> -->
                <?php 
                    $list_menu = $menu->getListMainMenu_byOrderASC();
                    $menu->showMenu_byMultiLevel_mainMenuTraiCam($list_menu,0,$lang,0);
                ?>
            </div>
        </nav>
    </div>
</nav>

<script src="/plugin/sticky/jquery.sticky.js"></script>
<script>
    $(document).ready(function () {
        var headerHeight = $('.gb-main-menu_cuanhom').outerHeight();

        $('.slide-section').click(function () {
            var linkHref = $(this).attr('href');
            $('html, body').animate({
                scrollTop: $(linkHref).offset().top - headerHeight
            }, 1000);
            e.preventDefault();
        });

        // $(".sticky-menu").sticky({topSpacing:0});
    });
</script>