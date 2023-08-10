<?php
    $rows = $acc->getList("create_order","","","id","desc",$trang, 20, "create-order");//var_dump($rows);

    function ma_hoa ($id) {
        $text = (string)$id;
        $text_leng = strlen($text);
        $text_1 = '';
        for ($i=0;$i < $text_leng;$i++) {
            $tmp = (int)$text[$i] + 3;
            $tmp = $tmp%10;
            $text_1 .= (string)$tmp;
        }
        $alpha = 'abcdefghijklmnopqrstuvwxyz';
        $key = rand(0, 25);
        $text_end = $alpha[$key];
        $text_2 = $text_1 . $text_end;
        $text_2 = strrev($text_2);

        return $text_2;
    }
?>	
    <div class="boxPageNews">
        <h1><a href="index.php?page=them-create-order">Thêm create order</a></h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>OrderID</th>
                    <th>Number of Applicant</th>
                    <th>Citizenship</th>
                    <th>Contact name</th>
                    <th>Name of Service</th>
                    <th>Description</th>
                    <th>Unit Price</th>
                    <th>Payment Status</th>
                    <th>Create Date</th>
                    <th>Link Payment</th>
                    <th>Hoạt động</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $d = 0;
                    foreach ($rows['data'] as $row) {
                        $d++;
                        $ma = ma_hoa($row['id']);
                    ?>
                        <tr>
                            <td>#<?= $row['id'] ?></td>
                            <td><?= $row['num']?></td>
                            <td><?= $row['citizenship']?></td>
                            <td><?= $row['name']?></td>
                            <td><?= $row['name_service']?></td>
                            <td><?= $row['note']?></td>
                            <td><?= $row['price']?></td>
                            <td><?= $row['state']==0 ? 'Not Paid' : 'Paid' ?></td>
                            <td><?= date('M-d-Y', strtotime($row['ngay']))?></td>
                            <td><a href="/payment-create-order/<?= $ma ?>" title="">Link</a></td>
                            
                            <td style="float: none;"><a href="index.php?page=xoa-create-order&id=<?= $row['id'] ?>" style="float: none;" onclick="return confirm('Bạn có chắc muốn xóa.')">Xóa</a> | <a href="index.php?page=sua-create-order&id=<?= $row['id'] ?>" style="float: none;">Sửa</a></td>
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