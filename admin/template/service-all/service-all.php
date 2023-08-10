<?php
    $rows = $acc->getList("service_all","parent_id",$_GET['parent_id'],"id","asc",$trang, 20, "service-all");//var_dump($rows);
?>	
    <div class="boxPageNews">
        <h1><a href="index.php?page=them-service-all&parent_id=<?= $_GET['parent_id'] ?>">Thêm Link</a></h1>
        <?php if ($_GET['parent_id'] != 0) { ?>
        <a href="index.php?page=service-all&parent_id=0" title="">Quay lại</a>
        <?php } ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <!-- <th>STT</th> -->
                    <th>Tên</th>
                    <th>Mục cha</th>
                    <th>Link</th>
                    <th>Hoạt động</th>
                    <th>Link con</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $d = 0;
                    foreach ($rows['data'] as $row) {
                        $d++;
                        $rows_2 = $acc->getList("service_all","parent_id",$row['id'],"id","asc","", "", "");
                    ?>
                        <tr>
                            <!-- <td><?= $d ?></td> -->
                            <td><?= $row['name']?></td>
                            <td><?= $row['parent_id']?></td>
                            <td><?= $row['link']?></td>
                            
                            <td style="float: none;"><a href="index.php?page=xoa-service-all&id=<?= $row['id'] ?>" style="float: none;" onclick="return confirm('Bạn có chắc muốn xóa.')">Xóa</a> | <a href="index.php?page=sua-service-all&id=<?= $row['id'] ?>" style="float: none;">Sửa</a></td>
                            <?php if ($_GET['parent_id'] == 0) { ?>
                            <td><a href="index.php?page=service-all&parent_id=<?= $row['id'] ?>">Link Con</a></td>
                            <?php } ?>
                        </tr>
                        <?php foreach ($rows_2 as $item_2) { ?>
                            <tr style="display: none;">
                                <!-- <td><?= $d ?></td> -->
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;<?= $item_2['name']?></td>
                                <td><?= $item_2['parent_id']?></td>
                                <td><?= $item_2['link']?></td>
                                
                                <td style="float: none;"><a href="index.php?page=xoa-service-all&id=<?= $row['id'] ?>" style="float: none;" onclick="return confirm('Bạn có chắc muốn xóa.')">Xóa</a> | <a href="index.php?page=sua-service-all&id=<?= $row['id'] ?>" style="float: none;">Sửa</a></td>
                                
                            </tr>
                        <?php } ?>
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