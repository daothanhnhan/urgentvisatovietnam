<?php
    $rows = $acc->getList("evisa_book","","","id","desc",$trang, 20, "book-visa");//var_dump($rows);
    $arr = array('Received', 'Excuting', 'Finished');
?>	
    <div class="boxPageNews">
        <!-- <h1><a href="index.php?page=them-thuong-hieu">Thêm</a></h1> -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID ORDER</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Điện thoại</th>
                    <th>Số người</th>
                    <th>Quốc gia</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Arrival date</th>
                    <th>Arrival port</th>
                    <th>Processing time</th>
                    <th>Fee</th>
                    <th>Person</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $d = 0;
                    foreach ($rows['data'] as $row) {
                        $d++;
                        $text = (string)$row['id'];
                        $text_leng = strlen($text);
                        $text_1 = '';
                        for ($i=0;$i < $text_leng;$i++) {
                            $tmp = (int)$text[$i] + 3;
                            $tmp = $tmp%10;
                            $text_1 .= (string)$tmp;
                        }
                        $text_2 = $text_1 . 'f';
                        $text_2 = strrev($text_2);
                    ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['name']?></td>
                            <td><?= $row['email']?></td>
                            <td><?= $row['phone']?></td>
                            <td><?= $row['number']?></td>
                            <td><?= $row['nation']?></td>
                            <td><?= $row['category']?></td>
                            <td><?= $row['type_visa']?></td>
                            <td><?= $row['date']?></td>
                            <td><?= $row['airport']?></td>
                            <td><?= $row['process_time']?></td>
                            <td><?= $row['fee']?></td>
                            <td><a href="index.php?page=person-visa&id=<?= $row['id'] ?>" title="">Person</a></td>
                            <!-- <td>
                                <img src="/images/<?= $row['image'] ?>" width="100">
                            </td> -->
                            
                            <td><?= $row['payment']==1 ? 'Paid' : 'Not Paid' ?></td>
                            <td><a href="index.php?page=state-visa&id=<?= $row['id'] ?>"><?= $arr[$row['visa_state']] ?></a></td>
                            <td style="float: none;"><a href="index.php?page=xoa-book-visa&id=<?= $row['id'] ?>" style="float: none;" onclick="return confirm('Bạn có chắc muốn xóa.')">Xóa</a> | <a href="index.php?page=sua-book-visa&id=<?= $row['id'] ?>" style="float: none;">Sửa</a></td>
                            <td><a href="/pay-now/<?= $text_2 ?>" target="_blank">Link</a></td>
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