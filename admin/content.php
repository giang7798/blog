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
	date_default_timezone_set('Asia/Ho_Chi_Minh');
        if (isset($_POST['submit'])) {
            //nếu submit rồi thì lấy các thông tin đã nhập
            $title = $_POST['title'];
			$photo = $_FILES['photo'];
			move_uploaded_file($photo['tmp_name'], "uploads/".$photo['name']);
			$content = $_POST['content'];
			$description = $_POST['description'];
			$keyword = $_POST['keyword'];
			$id = $_SESSION['id'];
			$user = $_SESSION['user'];
			$folder = $_POST['folder'];
			$date = date('d-m-Y');
					$result = mysqli_query($conn,'select id from folder where folder = "'.$folder.'"');
					$pt = mysqli_fetch_assoc($result);
					$idfolder = $pt['id'];
            if (!$content || !$title || !$description) {
                echo 'Bạn nhập thiếu thông tin!';
            } else {
				
                //nếu đã đầy đủ thông tin cần thiết, tiến hành chèn vào CSDL
                $sql = 'Insert into posts(user_id, user, title, photo, content, description, keyword, folder, time, id_folder) values("'.$id.'","'.$user.'","'.$title.'","
				     http://truonggiang.com/admin/uploads/'.$photo['name'].'", "'
                    .$content.'","'
                    .$description.'", "'
                    .$keyword.'", "'
					.$folder.'","'.$date.'","'.$idfolder.'")';
                //thực thi câu lệnh SQL
				$sql1 = 'select * from posts where title="'.$title.'"';
				$result = mysqli_query($conn, $sql1);
				if (mysqli_num_rows($result)){
					echo 'tiêu đề bài viết đã tồn tại';
				}
                else if (mysqli_query($conn, $sql)) {  //biến $conn được khai báo trong file connectdb
                    echo 'Đăng bài thành công!';
					$idArticle = mysqli_insert_id($conn);
                }
							// thêm tags cho  bài viết
	        $arrTags = explode(",", $_POST['keyword']);
			foreach ($arrTags as $tag)
			{
			//Hàm trim để cắt bỏ khoảng trắng
			$tag = trim($tag);

			//Lấy id của tag có tên là $tag, nếu ko có thì thêm mới
			$result = mysqli_query($conn, 'select id from tags where name= "'.$tag.'"');
			if ($i = mysqli_num_rows($result) > 0)
			{
				while($i = mysqli_fetch_assoc($result)){
					$idTag = $i['id'];
				}
			}
			else
			{
				$sql2 = 'insert into tags(name) values ("'.$tag.'")';
				if( mysqli_query($conn,$sql2)){
				$idTag = mysqli_insert_id($conn);
				 }
			}

			//Insert dữ liệu vào table Articles_Tags
			mysqli_query($conn,'insert into articlestags(article_id, tag_id) values("'.$idArticle.'","'.$idTag.'")');

}
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
                  <label class="control-label">Title</label>
                  <input class="form-control" type="text" placeholder="Enter Tile" name="title">
                </div>
				<div class="form-group">
                  <label class="control-label">Photo</label>
                  <input class="form-control" type="file" name="photo">
                </div>
                <div class="form-group">
                  <label class="control-label">Nội dung</label>
                  <textarea class="form-control" rows="4" placeholder="Enter your content" name="content"></textarea>
                </div>
				<div class="form-group">
                  <label class="control-label">Description</label>
                  <input class="form-control" type="text" placeholder="Enter Describe"  name="description">
                </div>
				<div class="form-group">
                  <label class="control-label">Keyword</label>
                  <input class="form-control" type="text" placeholder="Enter Keyword"  name="keyword">
                </div> 
				<div class="form-group">
					<label class="control-label">Thư Mục</label>           
					<div class="form-control">
					<select name="folder" class="input-text input-select">
                            <option value="" value="<?php if($a==0){echo $_POST['birthday_day'];} ?>"hidden></option>
                            <?php
                  
						$sql = 'select * from folder';
						$result = mysqli_query($conn, $sql);
						$i= 1;
						while($pt = mysqli_fetch_assoc($result)){ 
							$i++ ;
                            echo '<option value="'.$pt['folder'].'">'.$pt['folder'].'</option>';
						}
                            ?>
				</select>
				</div>
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