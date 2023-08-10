<?php
    $rows = $acc->getList("faqs","","","id","asc",$trang, 20, "faqs");//var_dump($rows);

    // $arr = array(1 => 'Visa on Arrival', 2 => 'Visa Cost, Payment', 3 => 'Visa Requirements', 4 => 'Problems and Concerns');
?>	
    <div class="boxPageNews">
        <h1><a href="index.php?page=them-faqs">Thêm faq</a></h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Nội dung</th>
                    <th>Nhóm</th>
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
                            <td><?= $row['name_en']?></td>
                            <td><?= substr(strip_tags($row['note_en']), 0, 200) ?></td>
                            <td><?= $action->getDetail('nhom_faqs', 'id', $row['type'])['name'] ?></td>
                            
                            <td style="float: none;"><a href="index.php?page=xoa-faqs&id=<?= $row['id'] ?>" style="float: none;" onclick="return confirm('Bạn có chắc muốn xóa.')">Xóa</a> | <a href="index.php?page=sua-faqs&id=<?= $row['id'] ?>" style="float: none;">Sửa</a></td>
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