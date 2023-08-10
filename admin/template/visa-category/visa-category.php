<?php
    $rows = $acc->getList("visa_category","","","id","asc",$trang, 20, "visa-catgory");//var_dump($rows);
?>	
    <div class="boxPageNews">
        <h1><a href="index.php?page=them-visa-category">Thêm visa category</a></h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <!-- <th>Ảnh</th> -->
                    <th>Hoạt động</th>
                    <th>Visa type</th>
                    <th>Group port</th>
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
                            <td style="float: none;"><a href="index.php?page=xoa-visa-category&id=<?= $row['id'] ?>" style="float: none;" onclick="return confirm('Bạn có chắc muốn xóa.')">Xóa</a> | <a href="index.php?page=sua-visa-category&id=<?= $row['id'] ?>" style="float: none;">Sửa</a></td>
                            <td><a href="index.php?page=type-visa&category_id=<?= $row['id'] ?>">Visa type</a></td>
                            <td><a href="index.php?page=arrival-port-group&category_id=<?= $row['id'] ?>">Group port</a></td>
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