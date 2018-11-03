<?php
ob_start();
$page_title = 'Chỉnh Sửa Slider';
include "header.php";
//lấy user theo user id
$id = $_GET['id'];
if (!$id) {
	//nếu id không tồn tại
	header('Location: slider.php');
}
$sql = 'select * from slider where id='.$id;
$result = mysqli_query($conn, $sql);
if (!mysqli_num_rows($result)) {
	//nếu id không tồn tại
	header('Location: slider.php');
}
$pt = mysqli_fetch_array($result);
if (isset($_POST['submit'])) {
	$title = $_POST['title'];
	$photo = $_FILES['picture'];
	move_uploaded_file($photo['tmp_name'], "uploads/".$photo['name']);
	$content = $_POST['content'];
    $sql = 'update slider set 
		    title="'.$title.'", 
			picture="http://truonggiang.com/admin/uploads/'.$photo['name'].'",
			content="'.$content.'" where id='.$id;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		header('Location: slider.php');
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
            <h3 class="tile-title">Chỉnh Sửa slider</h3>
            <div class="tile-body">
                <div class="form-group">
                  <label class="control-label">Title</label>
                  <input class="form-control" type="text" placeholder="Enter Tile" value="<?php echo $pt['title'];?>" name="title">
                </div>
				<div class="form-group">
                  <label class="control-label">Picture</label>
                  <input class="form-control" type="file" name="picture">
                </div>
				<div class="form-group">
                  <label class="control-label">Nội dung</label>
                  <textarea class="form-control" rows="4" placeholder="Enter your content" name="content"><?php echo $pt['content'];?></textarea>
                </div>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Đăng Bài</button>&nbsp;&nbsp;&nbsp;
			<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
          </div>
        </div>
	</div>
</form>
<?php
include 'footer.php';
?>