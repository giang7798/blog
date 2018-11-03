<?php
ob_start();
$page_title = 'Chỉnh Sửa Bài Viết';
include "header.php";
//lấy user theo user id
$id = $_GET['id'];
if (!$id) {
	//nếu id không tồn tại
	header('Location: logo.php');
}
$sql = 'select * from logo where id=1';
$result = mysqli_query($conn, $sql);
$pt = mysqli_fetch_array($result);
if (isset($_POST['submit'])) {
	$img = $_FILES['img'];
	move_uploaded_file($img['tmp_name'], "../images/".$img['name']);
    $sql = 'update logo set 
			img="/images/'.$img['name'].'" where id=1';
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo 'thành công';
	} else {
		echo 'Sửa thất bại.';
	}
}
ob_get_flush();
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Chỉnh Sửa logo</h3>
            <div class="tile-body">
				<div class="form-group">
                  <label class="control-label">Photo</label>
                  <input class="form-control" type="file" name="img">
                </div>
			 	<div class="tile-footer">
              	<button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Đăng 			Bài</button>&nbsp;&nbsp;&nbsp;
				<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            	</div>
          </div>
        </div>
	</div>
</form>
<?php
include 'footer.php';
?>