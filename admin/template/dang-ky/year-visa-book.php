<?php
    $rows = $acc->getList("year_visa_book","","","id","desc",$trang, 20, $_GET['page']);//var_dump($rows);
?>	
    <div class="boxPageNews">
        <!-- <h1><a href="index.php?page=them-thuong-hieu">Thêm</a></h1> -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Địa chỉ</th>
                    <th>Ghi chú</th>
                    <th>Overseas Vietnamese</th>
                    <th>Spouse of Vietnamese passport holder</th>
                    <th>Child of Vietnamese passport holder</th>
                    <th>Ngày</th>
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
                            <td><?= $row['email']?></td>
                            <td><?= $row['phone']?></td>
                            <td><?= $row['address']?></td>
                            <td><?= $row['note']?></td>
                            <td><?= $row['overseas']==1 ? 'Có' : 'Không' ?></td>
                            <td><?= $row['spouse']==1 ? 'Có' : 'Không' ?></td>
                            <td><?= $row['child']==1 ? 'Có' : 'Không' ?></td>
                            <!-- <td>
                                <img src="/images/upload/<?= $row['passport'] ?>" width="100">
                            </td> -->
                            <td><?= $row['ngay']?></td>
                            <!-- <td style="float: none;"><a href="index.php?page=xoa-thuong-hieu&id=<?= $row['id'] ?>" style="float: none;" onclick="return confirm('Bạn có chắc muốn xóa.')">Xóa</a> | <a href="index.php?page=sua-thuong-hieu&id=<?= $row['id'] ?>" style="float: none;">Sửa</a></td> -->
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