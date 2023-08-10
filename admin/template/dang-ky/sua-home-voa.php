<?php 
  $arr = array(1 => 'Received', 2 => 'Sent', 3 => 'Contacted', 4 => 'Finished');

  function home_voa ($id) {
    global $conn_vn;
    if (isset($_POST['book'])) {
      $state = $_POST['state'];

      $sql = "UPDATE home_voa SET state = '$state' WHERE id = $id";
      $result = mysqli_query($conn_vn, $sql);
    }
  }
  home_voa($_GET['id']);

  $info = $action->getDetail('home_voa', 'id', $_GET['id']);
?>
<a href="index.php?page=home-voa" title="">Quay lại</a>
<br>
<br>
<form action="" method="post">
  <div class="form-group">
    <label for="email">State:</label>

    <select name="state" class="form-control">
      <?php foreach ($arr as $key => $item) { ?>
      <option value="<?= $key ?>" <?= $key==$info['state'] ? 'selected' : '' ?> ><?= $item ?></option>
      <?php } ?>
    </select>
  </div>
  
  
  <button type="submit" name="book" class="btn btn-default">Submit</button>
</form>