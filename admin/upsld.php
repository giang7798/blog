<?php
$page_title = 'Thêm Slider';
include('header.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Slider</title>
</head>

<body>
	<?php
        if (isset($_POST['submit'])) {
            //nếu submit rồi thì lấy các thông tin đã nhập
            $title = $_POST['title'];
			$photo = $_FILES['picture'];
			move_uploaded_file($photo['tmp_name'], "uploads/".$photo['name']);	
			$content = $_POST['content'];
                //nếu đã đầy đủ thông tin cần thiết, tiến hành chèn vào CSDL
                $sql = 'Insert into slider(title, picture, content) values("'.$title.'","
				     http://truonggiang.com/admin/uploads/'.$photo['name'].'","'.$content.'")';
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
            <h3 class="tile-title">slider</h3>
            <div class="tile-body">
                <div class="form-group">
                  <label class="control-label">Title</label>
                  <input class="form-control" type="text" placeholder="Enter Tile" name="title">
                </div>
				<div class="form-group">
                  <label class="control-label">Picture</label>
                  <input class="form-control" type="file" name="picture">
                </div>
				<div class="form-group">
                  <label class="control-label">Nội dung</label>
                  <textarea class="form-control" rows="4" placeholder="Enter your content" name="content"></textarea>
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