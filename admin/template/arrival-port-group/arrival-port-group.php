<?php
    $rows = $acc->getList("arrival_port_group","category_id",$_GET['category_id'],"id","asc",$trang, 20, "arrival-port-group");//var_dump($rows);
?>	
    <div class="boxPageNews">
        <h1><a href="index.php?page=them-arrival-port-group&category_id=<?= $_GET['category_id'] ?>">Thêm group port</a></h1>
        <a href="index.php?page=visa-category" title="">Quay lại</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <!-- <th>Ảnh</th> -->
                    <th>Hoạt động</th>
                    <th>Arrival port</th>
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
                            <td><?= $row['name']?></td>
                            <!-- <td>
                                <img src="/images/<?= $row['image'] ?>" width="100">
                            </td> -->
                            <td style="float: none;"><a href="index.php?page=xoa-arrival-port-group&id=<?= $row['id'] ?>" style="float: none;" onclick="return confirm('Bạn có chắc muốn xóa.')">Xóa</a> | <a href="index.php?page=sua-arrival-port-group&id=<?= $row['id'] ?>" style="float: none;">Sửa</a></td>
                            <td><a href="index.php?page=arrival-port&arrival_port_group_id=<?= $row['id'] ?>">Arrival port</a></td>
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