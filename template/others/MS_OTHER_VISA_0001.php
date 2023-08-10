<?php 
    $about_us = $action->getList('about_us', '', '', 'id', 'asc', '', '', '');
    $our_services = $action->getList('about_us_our_services', '', '', 'id', 'asc', '', '', '');
    $why = $action->getList('why', '', '', 'id', 'asc', '', '', '');
    $milestones = $action->getList('milestones', '', '', 'id', 'desc', '', '', '');
    $leadership = $action->getList('leadership', '', '', 'id', 'asc', '', '', '');
    $services_team = $action->getList('services_team', '', '', 'id', 'asc', '', '', '');
    $typical_client = $action->getList('typical_client', '', '', 'id', 'asc', '', '', '');
    $location = $action->getList('location', '', '', 'id', 'asc', '', '', '');

    $list_li = explode("\r\n", $about_us[2]['note']);
?>
<style>
.__sidebar-about-us h2 {
	font-size: 24px;
    line-height: 32px;
    font-weight: bold;
    margin-bottom: 20px;
}
.__sidebar-about-us ul li a.active {
    border-left: 4px solid #009eeb;
    background: #f0f7fd;
}
.__sidebar-about-us ul li a {
    display: block;
    padding: 12px 0 12px 20px;
}

.__wrap-about-us h1 {
    /*font-size: 32px;*/
	font-size: 24px;
    line-height: 40px;
    font-weight: bold;
}
.__wrap-about-us h2 {
	font-size: 24px;
    line-height: 32px;
    font-weight: bold;
}
.__wrap-about-us hr {
    margin: 32px 0;
    border-top: 1px solid;
    border-bottom: 1px solid;
}
.__wrap-about-us ul.list-items-success {
	margin-left: 20px;
}
/*.__wrap-about-us ul.list-items-success li::marker {
    content: "";
    color: green;
    font-family: "icomoon" !important;
    speak: never;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    text-indent: 7px !important;
    -webkit-font-smoothing: antialiased;
    
}*/
.__wrap-about-us ul.list-items-success li:before {
    position: absolute;
    content: "";
    color: #2cd1a0;
    font-family: "icomoon" !important;
    left: 15px;
}

.__shor-our-milestones .time-line {
    position: relative;
}
.__shor-our-milestones .time-line::before {
    position: absolute;
    content: "";
    width: 1px;
    height: 100%;
    background: #d8d8d8;
    left: 76px;
    z-index: -1;
}
.__shor-our-milestones .time-line .oneline {
    display: flex;
    align-items: baseline;
    margin: 16px 0;
    flex-wrap: wrap;
}
.__shor-our-milestones .time-line .oneline:first-child {
    position: relative;
}
.__shor-our-milestones .time-line .oneline:first-child::before {
    position: absolute;
    content: "";
    width: 1px;
    height: 9px;
    background: #fff;
    left: 76px;
    top: 0;
}
.__shor-our-milestones .time-line .oneline .year {
    width: 40px;
}
.__shor-our-milestones .time-line .oneline .musty {
    width: 9px;
    height: 9px;
    background: #df1e26;
    border-radius: 50%;
    margin: 0 32px;
}
.__shor-our-milestones .time-line .oneline .content {
    width: calc(100% - 140px);
}
@media (min-width: 782px){
	.__wrap-about-us .wp-block-columns {
	    flex-wrap: nowrap;
	    display: flex;
	    /*margin-bottom: 1.75em;*/
	    box-sizing: border-box;
	}
	.__wrap-about-us .wp-block-column {
	    flex-basis: 0;
	    flex-grow: 1;
	    min-width: 0;
	    word-break: break-word;
	    overflow-wrap: break-word;
	}
}
.page-about-us iframe {
    width: 95%;
}

.about_us_img_radius {
    border-radius: 10px;
}
</style>
<div class="container page-about-us">
	<div class="row">
		<div class="col-md-8">
			<div class="__wrap-about-us">
                    
<figure class="wp-block-image size-full is-resized">
	<img src="/images/<?= $about_us[0]['image'] ?>" alt="About us" class="wp-image-36320 entered lazyloaded about_us_img_radius" width="1000" height="NaN">
</figure>



<h1 id="Overview"><?= $about_us[0]['name'] ?></h1>



<p><?= $about_us[0]['note'] ?></p>



<hr class="wp-block-separator">



<h2 id="Our-Vision-Mission"><strong><?= $about_us[1]['name'] ?></strong></h2>



<p><?= str_replace("\r\n", "<br>", $about_us[1]['note']) ?></p>







<hr class="wp-block-separator is-style-default">



<h2 id="Our-service"><?= $about_us[2]['name'] ?></h2>



<div class="wp-block-columns">
<div class="wp-block-column">
<p><?= $list_li[0] ?></p>



<ul class="list-items-success">
	<?php 
    unset($list_li[0]);
    foreach ($our_services as $item) { 
    ?>
	<li><a href="<?= $item['link'] ?>"><?= $item['name'] ?></a></li>
	<?php } ?>
</ul>
</div>



<div class="wp-block-column">
<figure class="wp-block-image size-full">
	<img width="570" height="380" src="/images/<?= $about_us[2]['image'] ?>" alt="img" class="wp-image-36156 entered lazyloaded about_us_img_radius">
</figure>
</div>
</div>



<hr class="wp-block-separator is-style-default">



<h2 id="Why-apply-with-us">Why apply with us?</h2>



<div class="wp-block-columns">
<?php 
$d = 0;
foreach ($why as $item) { 
    $d++;
?>
<div class="wp-block-column">
<figure class="wp-block-image size-full">
    <img width="81" height="71" src="/images/<?= $item['image'] ?>" alt="why" class="wp-image-36163 entered lazyloaded"
    >
</figure>



<p><strong><?= $item['name'] ?></strong></p>



<p><?= $item['note'] ?></p>
</div>

<?php
    if ($d%2 == 0) {
        echo '</div><div class="wp-block-columns">';
    }
 } ?>



</div>











<hr class="wp-block-separator is-style-default">



<h2 id="Our-milestones">Our Milestones</h2>


<div class="wp-block-lazyblock-vn-visa-our-milestones lazyblock-vn-visa-our-milestones-18LTJk">        <!-- HTML Code here -->
        <div class="__shor-our-milestones">
            <div class="time-line">
                <?php foreach ($milestones as $item) { ?>
                    <div class="oneline">
                        <div class="year font-w-bold"><?= $item['name'] ?></div>
                        <div class="musty"></div>
                        <div class="content">
                        	<p><?= $item['note'] ?></p>
                        </div>
                    </div>
                <?php } ?>               
            </div>
        </div>
        </div>


<hr class="wp-block-separator is-style-default">



<h2 id="Our-team"><?= $leadership[0]['name'] ?></h2>



<p><?= $leadership[0]['note'] ?></p>



<h3 style="font-weight: bold;font-size: 18px;">Leadership</h3>



<div class="wp-block-columns">
<?php 
    $d = 0;
    unset($leadership[0]);
    foreach ($leadership as $item) { 
        $d++;
?>
<div class="wp-block-column">
<figure class="wp-block-image size-full">
	<img width="170" height="170" src="/images/<?= $item['image'] ?>" alt="Leadership" class="wp-image-36197 entered lazyloaded about_us_img_radius"
	>
</figure>



<p style="margin-bottom: 12px;"> <span style="color: #027eb8"><strong><?= $item['name'] ?></strong></span> – <?= $item['position'] ?></p>



<p><?= $item['note'] ?></p>
</div>

<?php 
    if ($d%2==0) {
        echo '</div><div class="wp-block-columns">';
    }
    }
?>


</div>







<h3 style="font-weight: bold;font-size: 18px;"><?= $services_team[0]['name'] ?></h3>



<p><?= $services_team[0]['note'] ?></p>


<?php 
    unset($services_team[0]);
    foreach ($services_team as $item) { 
?>
<figure class="wp-block-image size-full">
	<img width="750" height="500" src="/images/<?= $item['image'] ?>" alt="services team" class="wp-image-36345 entered lazyloaded about_us_img_radius">
</figure>



<p style="margin-bottom: 12px;"> <span style="color: #027eb8"><strong><?= $item['name'] ?></strong></span></p>



<p><?= $item['note'] ?></p>

<?php } ?>





<hr class="wp-block-separator is-style-default">



<div class="wp-block-group"><div class="wp-block-group__inner-container"><div class="js-partner wp-block-lazyblock-vnb-home-partners lazyblock-vnb-home-partners-EO7PQ">
        <!-- HTML Code here -->
        <div id="anchor-partners-no-fullw" class="__vnvisa-partners-no-fullw">
            <div class="other-container ">
                                <h2 class="hd-2 mb-2 service-title resp-title">Our Typical Client</h2>
                    <div class="list-partners-no-fullw">
                        <?php foreach ($typical_client as $item) { ?>
                            <img src="/images/<?= $item['image'] ?>" alt="im-typical-2" width="170" height="112" class="entered lazyloaded">
                        <?php } ?>
                                                    
                    </div>
                    
            </div>
        </div>
        </div></div></div>



<hr class="wp-block-separator is-style-default">



<h2 id="Location">Location</h2>



<div class="wp-block-columns">
<?php 
    $d = 0;
    foreach ($location as $item) {
        $d++; 
?>
<div class="wp-block-column">
    <p>
        <?= $item['note'] ?>
        
    </p>



<p><strong><?= $item['name'] ?>:</strong></p>



<p><?= $item['address'] ?></p>
</div>

<?php
    if ($d%2 == 0) {
        echo '</div><div class="wp-block-columns">';
    } 
    }
?>


</div>
                </div>
		</div>
		<div class="col-md-4">
			<div class="js-sidebar-about-us __sidebar-about-us position-sticky sticky-about hidden-xs hidden-sm" id="menu-right">
                    <h2 class="hd-2 mb-3">Content</h2>
                    <ul>
                        <li><a href="#Overview" class="active">Overview</a></li>
                        <li><a href="#Our-Vision-Mission" class="">Our mission &amp; vision</a></li>
                        <li><a href="#Our-service" class="">Our service</a></li>
                        <li><a href="#Why-apply-with-us" class="">Why apply with us</a></li>
                        <li><a href="#Our-milestones" class="">Our milestones</a></li>
                        <li><a href="#Our-team" class="">Our team</a></li>
                        <li><a href="#anchor-partners-no-fullw" class="">Our typical clients</a></li>
                        <li><a href="#Location" class="">Location</a></li>
                    </ul>
                    
                </div>
		</div>
	</div>
</div>
<style>
.sticky {
  position: fixed;
  top: 100px;
  width: 100%;
}
</style>
<script>

    // $(document).ready(function () {
    //     if ($(window).width() > 576) {
    //         $(".sticky-about").sticky({topSpacing:60});
    //     }
    // });

    window.onscroll = function() {menu_right()};

var navbar = document.getElementById("menu-right");
var sticky = navbar.offsetTop;

function menu_right() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

</script>
<script>
$(document).ready(function() {
    let _elm_sidebar = $('.js-sidebar-about-us');
    let list_anchor = [];

    _elm_sidebar.find('li:first-child a').addClass('active');
    _elm_sidebar.find('a').each(function() {
        let target = $(this).attr("href");
        console.log($(target));

        if ($(target).length) {
            let item = {
                "anchor" : target,
                "p1" : $(target).offset().top + 100,
                "p2" : $(target).offset().top + $(target).outerHeight() + 100
            };
            list_anchor.push(item);
        }
    });

    let point_math = false;
    let point_direction = 0;
    
    $(window).scroll(function(event){
        event.preventDefault();
        let top = $(window).scrollTop();
        
        list_anchor.forEach(function(index){
            if (top > index.p1 && top < index.p2) {
                _elm_sidebar.find('a').removeClass('active');
                _elm_sidebar.find('a[href="'+ index.anchor +'"]').addClass('active');
            }
        });
    });

    $('.js-sidebar-about-us a').click(function(e) {
        e.preventDefault();
        let _target = $(this).attr("href");

        $('html, body').stop().animate({
            scrollTop: $(_target).offset().top - 80
        }, 700);
    });
    console.log(list_anchor);

    let _top = $(window).scrollTop();
    list_anchor.forEach(function(index){
        if (_top > index.p1 && _top < index.p2) {
            _elm_sidebar.find('a').removeClass('active');
            _elm_sidebar.find('a[href="'+ index.anchor +'"]').addClass('active');
        }
    });

    // xử lý sidebar ở mobile 
    if ($(window).width() < 576) {
        let get_sb_mb = _elm_sidebar.get(0);
        $('.__wrap-about-us').prepend(get_sb_mb);
    }
});
</script>