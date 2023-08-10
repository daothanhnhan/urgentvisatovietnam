<?php
    $rows = $acc->getList_type_visa("type_visa","category_id",$_GET['category_id'],"sort","asc",$trang, 20, $_GET['page']);//var_dump($rows);
    $quoc_gia = $action->getDetail('quoc_gia', 'id', $_GET['quoc_gia_id']);
?>	
    <div class="boxPageNews">
        <!-- <h1><a href="index.php?page=them-type-visa&quoc_gia_id=<?= $_GET['quoc_gia_id'] ?>&category_id=<?= $_GET['category_id'] ?>">Thêm type visa</a></h1> -->
        <h1><a href="index.php?page=them-type-visa&category_id=<?= $_GET['category_id'] ?>">Thêm type visa</a></h1>
        <!-- <a href="index.php?page=sua-quoc-gia&id=<?= $_GET['quoc_gia_id'] ?>" title="">Quay lại</a> -->
        <a href="index.php?page=visa-category" title="">Quay lại</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Thứ tự</th>
                    <th>Tên</th>
                    <th>Price</th>
                    <th>Des</th>
                    <th>Hoạt động</th>
                    <!-- <th>Port of arrival</th> -->
                    <th>Pocessing time</th>
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
                            <td><?= $row['sort']?></td>
                            <td><?= $row['name']?></td>
                            <td><?= number_format($row['price']) ?></td>
                            <td><?= $row['des']?></td>
                            <!-- <td>
                                <img src="/images/<?= $row['image'] ?>" width="100">
                            </td> -->
                            <td style="float: none;"><a href="index.php?page=xoa-type-visa&id=<?= $row['id'] ?>" style="float: none;" onclick="return confirm('Bạn có chắc muốn xóa.')">Xóa</a> | <a href="index.php?page=sua-type-visa&id=<?= $row['id'] ?>" style="float: none;">Sửa</a></td>

                            <!-- <td><a href="index.php?page=arrival-port&type_visa_id=<?= $row['id'] ?>">Port of arrival</a></td> -->
                            <td><a href="index.php?page=processing-time&type_visa_id=<?= $row['id'] ?>">Processing time</a></td>
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