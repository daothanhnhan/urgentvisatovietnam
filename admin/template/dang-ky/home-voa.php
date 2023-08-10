<?php
    $rows = $acc->getList("home_voa","","","id","desc",$trang, 20, $_GET['page']);//var_dump($rows);
    $arr = array(1 => 'Received', 2 => 'Sent', 3 => 'Contacted', 4 => 'Finished');
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
                    <th>Số</th>
                    <th>Quốc gia</th>
                    <th>Passport(click vào để xem)</th>
                    <th>Ngày</th>
                    <th>State</th>
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
                            <td><?= $row['email']?></td>
                            <td><?= $row['phone']?></td>
                            <td><?= $row['num']?></td>
                            <td><?= $row['nation']?></td>
                            
                            <td>
                                <a href="/images/upload/<?= $row['passport'] ?>" target="_blank"><img src="/images/upload/<?= $row['passport'] ?>" width="100"></a>
                            </td>
                            <td><?= $row['ngay']?></td>
                            
                            <td><?= $arr[$row['state']]?></td>
                            <!-- <td><a href="index.php?page=sua-home-voa&id=<?= $row['id'] ?>">Sửa</a></td> -->
                            <td style="float: none;"><a href="index.php?page=xoa-home-voa&id=<?= $row['id'] ?>" style="float: none;" onclick="return confirm('Bạn có chắc muốn xóa.')">Xóa</a> | <a href="index.php?page=sua-home-voa&id=<?= $row['id'] ?>" style="float: none;">Sửa</a></td>
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