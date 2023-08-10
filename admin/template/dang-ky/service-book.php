<?php
    $rows = $acc->getList("service_book","","","id","desc",$trang, 20, $_GET['page']);//var_dump($rows);
    $arr = array(1 => 'Received', 2 => 'Sent', 3 => 'Contacted', 4 => 'Finished');
?>	
    <div class="boxPageNews">
        <!-- <h1><a href="index.php?page=them-thuong-hieu">Thêm</a></h1> -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Title</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Nation</th>
                    <th>Message</th>
                    <th>State</th>
                    <th>Ngày</th>
                    <th>Action</th>
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
                            <td><?= $row['title']?></td>
                            <td><?= $row['name']?></td>
                            <td><?= $row['email']?></td>
                            <td><?= $row['phone_1']?> <?= $row['phone_2']?></td>
                            <td><?= $row['nation']?></td>
                            <td><?= $row['note']?></td>
                            <td><?= $arr[$row['state']]?></td>
                            <!-- <td>
                                <img src="/images/upload/<?= $row['passport'] ?>" width="100">
                            </td> -->
                            <td><?= $row['ngay']?></td>
                            <td style="float: none;"><a href="index.php?page=xoa-service-book&id=<?= $row['id'] ?>" style="float: none;" onclick="return confirm('Bạn có chắc muốn xóa.')">Xóa</a> | <a href="index.php?page=sua-service-book&id=<?= $row['id'] ?>" style="float: none;">Sửa</a></td>
                            <!-- <td><a href="index.php?page=sua-service-book&id=<?= $row['id'] ?>">Edit</a></td> -->
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