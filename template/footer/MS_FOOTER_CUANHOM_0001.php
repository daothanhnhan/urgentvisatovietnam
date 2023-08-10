<?php 
    $foooter_content = $action->getDetail('footer', 'id', '1');
?>
<style>
footer {
    border-top: 1px solid #ccc;
    padding-top: 40px;
} 
footer .title {
    font-size: 14px;
    font-weight: bold;
    line-height: 2;
}
footer ul li {
    line-height: 2;
}
footer ul li a {
    color: #000;
    font-size: 14px;
}
footer .contact p {
    margin-bottom: 10px;
    font-size: 14px;
}
footer .footer-bottom ul li {
    display: inline-block;
}
footer .footer-bottom ul li i {
    font-size: 15px;
}
footer .footer-bottom .icon-list i {
    float: right;
}
footer .footer-bottom p {
    font-size: 14px;
}
@media screen and (max-width: 768px) {
    footer .line-bottom {
        border-bottom: 1px solid #ccc;
        margin-bottom: 8px;
        margin-top: 8px;
    }
    footer {
         padding-top: 20px;
    }
    
}
@media screen and (min-width: 768px) {
    footer .footer-list-1 {
        display: block !important;
    }
}
</style>
<footer>
    <div class="container">
        <div class="row icon-list">
            <div class="col-md-2 col-sm-3">
                <p class="title line-bottom" onclick="show_footer(1)">Vietnam visa <i class="fa fa-angle-down hidden-sm hidden-md hidden-lg"></i></p>
                <div class="footer-list-1" id="show_footer_1" style="display: none;">
                    <?= $foooter_content['note_1'] ?>
                </div>
                
            </div>
            <div class="col-md-2 col-sm-3">
                <p class="title line-bottom" onclick="show_footer(2)">Our Services <i class="fa fa-angle-down hidden-sm hidden-md hidden-lg"></i></p>
                <div class="footer-list-1" id="show_footer_2" style="display: none;">
                    <?= $foooter_content['note_2'] ?>
                </div>
            </div>  
            <div class="col-md-2 col-sm-3">
                <p class="title line-bottom" onclick="show_footer(3)">Our Services <i class="fa fa-angle-down hidden-sm hidden-md hidden-lg"></i></p>
                <div class="footer-list-1" id="show_footer_3" style="display: none;">
                    <?= $foooter_content['note_3'] ?>
                </div>
            </div>  
            <div class="col-md-2 col-sm-3">
                <p class="title line-bottom" onclick="show_footer(4)">Resources <i class="fa fa-angle-down hidden-sm hidden-md hidden-lg"></i></p>
                <div class="footer-list-1" id="show_footer_4" style="display: none;">
                    <?= $foooter_content['note_4'] ?>
                </div>
            </div>  
            <div class="col-md-4 col-sm-12 contact">
                <p class="title">Contacts</p>
                <p><b>Tel</b>: <?= $rowConfig['content_home3'] ?></p>
                <p><b>Email</b>: <?= $rowConfig['content_home2'] ?></p>
                <p><i class="fa fa-map-marker"></i> <?= $rowConfig['content_home1'] ?></p>
                <p><?= $rowConfig['web_email'] ?></p>
                
            </div>  
        </div>
        <hr>
        <div class="row1 footer-bottom" style="display: flex;justify-content: space-between;margin-left: -15px;margin-right: -15px;">
            <div class="col-md-6">
                <p><?= $rowConfig['content_home9'] ?></p>
            </div>
            <div class="col-md-6 text-right">
                <ul>
                    <li><a href="<?= $rowConfig['link1'] ?>" title=""><i class="fa fa-facebook-official"></i></a></li>
                    <li><a href="<?= $rowConfig['link2'] ?>" title=""><i class="fa fa-twitter"></i></a></li>
                </ul>
            </div>
        </dir>        
    </div>    
</footer>

<style>
.whatsapp {
    position: fixed;
    right: 20px;
    bottom: 140px;
    display: none;
} 
</style>
<a href="https://api.whatsapp.com/send?phone=<?= $rowConfig['link3'] ?>&amp;text=<?= $rowConfig['link4'] ?>" target="_blank" class="whatsapp">
  <img src="/images/WhatsApp.jpg" alt="whatsapp" width="66">
</a>

<script>
    function show_footer (so) {
        var list = document.getElementById('show_footer_'+so).style.display;
        // alert(list);
        if (list == 'none') {
            document.getElementById('show_footer_'+so).style.display = 'block';
        } else {
            document.getElementById('show_footer_'+so).style.display = 'none';
        }   
    }
</script>