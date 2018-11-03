<?php
$page_title = 'Thêm Thư Mục';
include('header.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
        if (isset($_POST['submit'])) {
            //nếu submit rồi thì lấy các thông tin đã nhập
            $folder = $_POST['folder'];
				
                //nếu đã đầy đủ thông tin cần thiết, tiến hành chèn vào CSDL
			$sql = 'Insert into folder(folder) values("'.$folder.'")';
                //thực thi câu lệnh SQL
			if (mysqli_query($conn, $sql)) {  //biến $conn được khai báo trong file connectdb
				echo 'Tạo Thư mục thành công!';
			
			}
		}

	?>
	<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Tạo Thư Mục</h3>
            <div class="tile-body">
                <div class="form-group">
                  <label class="control-label">Tạo Thư Mục</label>
                  <input class="form-control" type="text" placeholder="Enter folder" name="folder">
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
include('footer.php');
?>
</body>
</html>