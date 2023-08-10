<?php
    $rows = $acc->getList("faq_service","service_id",$_GET['service_id'],"id","asc",$trang, 20, "faq-service");//var_dump($rows);
?>	
    <div class="boxPageNews">
        <h1><a href="index.php?page=them-faq-service&service_id=<?= $_GET['service_id'] ?>">Thêm faq dịch vụ</a></h1>
        <a href="index.php?page=sua-dich-vu&id=<?= $_GET['service_id'] ?>" title="">Quay lại</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Nội dung</th>
                    <th>Hoạt động</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $d = 0;
                    foreach ($rows['data'] as $row) {
                        $d++;
                    ?>
                        <tr>
                            <td><?= $d ?></td>
                            <td><?= $row['name_en']?></td>
                            <td><?= $row['note_en']?></td>
                            
                            <td style="float: none;"><a href="index.php?page=xoa-faq-service&id=<?= $row['id'] ?>" style="float: none;" onclick="return confirm('Bạn có chắc muốn xóa.')">Xóa</a> | <a href="index.php?page=sua-faq-service&id=<?= $row['id'] ?>" style="float: none;">Sửa</a></td>
                        </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
    	
        <div class="paging">             
        	<?= $rows['paging'] ?>
		</div>
    </div>
    <p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Phát Triển Thương Hiệu Cafe Link Việt Nam</p>             