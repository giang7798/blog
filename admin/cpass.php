<?php
$page_title = 'Đổi password';
include "header.php";
//lấy user theo user id
$id = $_SESSION['id'];
if (!$id) {
	//nếu id không tồn tại
	header('Location: listusers.php');
}
$sql = 'select * from users where id='.$id;
$result = mysqli_query($conn, $sql);
if (!mysqli_num_rows($result)) {
	//nếu id không tồn tại
	header('Location: listusers.php');
}
$user = mysqli_fetch_array($result);
if (isset($_POST['submit'])) {
	if($_POST['password1'] != $_POST['password']){
		echo 'Mật khẩu không trùng khớp nhập lại';
	}else{
		$password = $_POST['password'];	

    $sql = 'update users set 
		    password="'.md5($password).'" where id='.$id;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo 'Sửa thành công.';
	} else {
		echo 'Sửa thất bại.';
	}
}
}
?>
<div class="col-md-12">
  <div class="tile">
    <h3 class="tile-title">Register</h3>
    <div class="tile-body">
      <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
        <div class="form-group row">
          <label class="control-label col-md-3">Mật Khẩu Mới:</label>
          <div class="col-md-8">
            <input class="form-control col-md-8" type="password" placeholder="password" name="password" >
          </div>
        </div>
		          <div class="form-group row">
          <label class="control-label col-md-3">Nhập lại mật khẩu:</label>
          <div class="col-md-8">
            <input class="form-control col-md-8" type="password" placeholder="password" name="password1" >
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