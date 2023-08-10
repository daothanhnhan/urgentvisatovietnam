<?php
    // $rows = $acc->getList("quoc_gia","","","id","asc",$trang, 20, "quoc-gia");//var_dump($rows);

    if (isset($_GET['search']) && $_GET['search'] != '') {
        $rows = $action->getSearchAdmin('quoc_gia',array('name'), $_GET['search'],$trang,20,$_GET['page']);
    }else{
       $rows = $acc->getList("quoc_gia","","","id","asc",$trang, 20, "quoc-gia");
    }
?>	
    <div class="boxPageNews">
        <h1><a href="index.php?page=them-quoc-gia">Thêm quốc gia</a></h1>

        <div class="searchBox">
            <form action="">
                <input type="hidden" name="page" value="quoc-gia">
                <button type="submit" class="btnSearchBox">Tìm kiếm</button>
                <input type="text" class="txtSearchBox" name="search" />                                    
            </form>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Yêu cầu visa</th>
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
                            <td><?= $row['visa_required']==1 ? 'Yêu cầu' : 'Không yêu cầu' ?></td>
                            <!-- <td>
                                <img src="/images/<?= $row['image'] ?>" width="100">
                            </td> -->
                            <td style="float: none;"><a href="index.php?page=xoa-quoc-gia&id=<?= $row['id'] ?>" style="float: none;" onclick="return confirm('Bạn có chắc muốn xóa.')">Xóa</a> | <a href="index.php?page=sua-quoc-gia&id=<?= $row['id'] ?>" style="float: none;">Sửa</a></td>
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