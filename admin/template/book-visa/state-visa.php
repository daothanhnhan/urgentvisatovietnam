<?php 
  $arr = array('Received', 'Excuting', 'Finished');

  function evisa_book ($id) {
    global $conn_vn;
    if (isset($_POST['book'])) {
      $state = $_POST['state'];

      $sql = "UPDATE evisa_book SET visa_state = '$state' WHERE id = $id";
      $result = mysqli_query($conn_vn, $sql);
    }
  }
  evisa_book($_GET['id']);

  $info = $action->getDetail('evisa_book', 'id', $_GET['id']);
?>
<a href="index.php?page=book-visa" title="">Quay lại</a>
<br>
<br>
<form action="" method="post">
  <div class="form-group">
    <label for="email">Status:</label>

    <select name="state" class="form-control">
      <?php foreach ($arr as $key => $item) { ?>
      <option value="<?= $key ?>" <?= $key==$info['visa_state'] ? 'selected' : '' ?> ><?= $item ?></option>
      <?php } ?>
    </select>
  </div>
  
  
  <button type="submit" name="book" class="btn btn-default">Submit</button>
</form>