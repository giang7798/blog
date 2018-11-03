<?php
ob_start();
$page_title = 'Edit folder';
include "header.php";
//lấy user theo user id
$id = $_GET['id'];
if (!$id) {
	//nếu id không tồn tại
	header('Location: listfolder.php');
}
$sql = 'select * from folder where id='.$id;
$result = mysqli_query($conn, $sql);
if (!mysqli_num_rows($result)) {
	//nếu id không tồn tại
	header('Location: listfolder.php');
}
$user = mysqli_fetch_array($result);
if (isset($_POST['submit'])) {
    $folder = $_POST['folder'];
    $sql = 'update folder set 
		    folder="'.$folder.'" where id='.$id;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		header('Location: listfolder.php');
	} else {
		echo 'Sửa thất bại.';
	}
}
ob_get_flush();
?>
<div class="col-md-12">
  <div class="tile">
    <h3 class="tile-title">Folder</h3>
    <div class="tile-body">
      <form class="form-horizontal" method="post" action="">
        <div class="form-group row">
          <label class="control-label col-md-3">Folder</label>
          <div class="col-md-8">
            <input class="form-control col-md-8" type="text" name="folder" value="<?php echo $user['folder']; ?>">
          </div>
        </div>
    </div>
    <div class="tile-footer">
      <div class="row">
        <div class="col-md-8 col-md-offset-3">
          <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
        </div>
      </div>
    </div>
    </form>
  </div>
</div>
<?php
include "footer.php";
?>