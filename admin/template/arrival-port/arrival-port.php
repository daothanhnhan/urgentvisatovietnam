<?php
    $rows = $acc->getList("arrival_port","arrival_port_group_id",$_GET['arrival_port_group_id'],"id","asc",$trang, 20, $_GET['page']);//var_dump($rows);
    // $type_visa = $action->getDetail('type_visa', 'id', $_GET['type_visa_id']);
    $arrival_port_group = $action->getDetail('arrival_port_group', 'id', $_GET['arrival_port_group_id']);
?>	
    <div class="boxPageNews">
        <h1><a href="index.php?page=them-arrival-port&arrival_port_group_id=<?= $_GET['arrival_port_group_id'] ?>">Thêm arrival port</a></h1>
        <!-- <a href="index.php?page=type-visa&quoc_gia_id=<?= $type_visa['quoc_gia_id'] ?>&category_id=<?= $type_visa['category_id'] ?>" title="">Quay lại</a> -->
        <a href="index.php?page=arrival-port-group&category_id=<?= $arrival_port_group['category_id'] ?>" title="">Quay lại</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>

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
                            <td><?= $row['name']?></td>
                            <!-- <td>
                                <img src="/images/<?= $row['image'] ?>" width="100">
                            </td> -->
                            <td style="float: none;"><a href="index.php?page=xoa-arrival-port&id=<?= $row['id'] ?>" style="float: none;" onclick="return confirm('Bạn có chắc muốn xóa.')">Xóa</a> | <a href="index.php?page=sua-arrival-port&id=<?= $row['id'] ?>" style="float: none;">Sửa</a></td>
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