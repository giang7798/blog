<?php
$page_title = 'Thêm Bài Viết';
include('header.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<script src="ckeditor/ckeditor.js"></script>
	<?php
        if (isset($_POST['submit'])) {
            //nếu submit rồi thì lấy các thông tin đã nhập
            $content = $_POST['content'];
				
                //nếu đã đầy đủ thông tin cần thiết, tiến hành chèn vào CSDL
                $sql = 'Insert into vd(content) values("'.$content.'")';
                //thực thi câu lệnh SQL
				if (mysqli_query($conn, $sql)) {  //biến $conn được khai báo trong file connectdb
                    echo 'Đăng bài thành công!';
                }
		}
			
	?>
	<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Viết Bài</h3>
            <div class="tile-body">
                <div class="form-group">
                  <label class="control-label">Nội dung</label>
                  <textarea class="form-control" rows="4" placeholder="Enter your content" name="content"></textarea>
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
	<script>
	CKEDITOR.replace('content');
	</script>
	<?php
include('footer.php');
?>
</body>
</html>