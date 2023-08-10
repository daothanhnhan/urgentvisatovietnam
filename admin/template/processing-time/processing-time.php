<?php
    $rows = $acc->getList("processing_time","type_visa_id",$_GET['type_visa_id'],"sort","asc",$trang, 20, $_GET['page']);//var_dump($rows);
    $type_visa = $action->getDetail('type_visa', 'id', $_GET['type_visa_id']);
?>	
    <div class="boxPageNews">
        <h1><a href="index.php?page=them-processing-time&type_visa_id=<?= $_GET['type_visa_id'] ?>">Thêm processing time</a></h1>
        <!-- <a href="index.php?page=type-visa&quoc_gia_id=<?= $type_visa['quoc_gia_id'] ?>&category_id=<?= $type_visa['category_id'] ?>" title="">Quay lại</a> -->
        <a href="index.php?page=type-visa&category_id=<?= $type_visa['category_id'] ?>" title="">Quay lại</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Thứ tự</th>
                    <th>Tên</th>
                    <th>Active</th>
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
                            <td><?= $row['sort']?></td>
                            <td><?= $row['name']?></td>
                            <td><input type="checkbox" <?= $row['active']==1 ? 'checked' : '' ?> onclick="action(<?= $row['id'] ?>)"></td>
                            <!-- <td>
                                <img src="/images/<?= $row['image'] ?>" width="100">
                            </td> -->
                            <td style="float: none;"><a href="index.php?page=xoa-processing-time&id=<?= $row['id'] ?>" style="float: none;" onclick="return confirm('Bạn có chắc muốn xóa.')">Xóa</a> | <a href="index.php?page=sua-processing-time&id=<?= $row['id'] ?>" style="float: none;">Sửa</a></td>
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

<script>
    function action (id) {
        // alert(id);
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            // document.getElementById("demo").innerHTML = this.responseText;
                // alert(this.responseText);
            }
          xhttp.open("GET", "/functions/ajax/active_processing_time.php?id="+id, true);
          xhttp.send();
    }
</script>