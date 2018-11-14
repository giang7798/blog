<?php
ob_start();
$page_title = 'Chỉnh Sửa Bài Viết';
include "header.php";
//lấy user theo user id
$id = $_GET['id'];
if (!$id) {
	//nếu id không tồn tại
	header('Location: listpost.php?id=1');
}
$sql = 'select * from posts where id='.$id;
$result = mysqli_query($conn, $sql);
if (!mysqli_num_rows($result)) {
	//nếu id không tồn tại
	header('Location: listposts.php?id=1');
}
$pt = mysqli_fetch_array($result);
if (isset($_POST['submit'])) {
	//xóa dữ liệu trên table articletags
	mysqli_query($conn,"delete from articlestags where article_id = $id ");
	$title = $_POST['title'];
	$photo = $_FILES['photo'];
	move_uploaded_file($photo['tmp_name'], "uploads/".$photo['name']);
   	$content = $_POST['content'];
	$description = $_POST['description'];
	$keyword = $_POST['keyword'];
	$folder = $_POST['folder'];
    $sql = 'update posts set 
		    title="'.$title.'", 
			photo="http://truonggiang.com/admin/uploads/'.$photo['name'].'",
		    content="'.htmlentities($content).'",
		    description="'.$description.'",
		    keyword="'.$keyword.'",
			folder="'.$folder.'"
			where id='.$id;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		header('Location: listpost.php?id=1');
	} else {
		echo 'Sửa thất bại.';
	}
			$arrTags = explode(",", $_POST['keyword']);
			foreach ($arrTags as $tag)
			{
			//Hàm trim để cắt bỏ khoảng trắng
			$tag = trim($tag);

			//Lấy id của tag có tên là $tag, nếu ko có thì thêm mới
			$result = mysqli_query($conn, 'select id from tags where name= "'.$tag.'"');
			if (mysqli_num_rows($result) > 0)
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
			mysqli_query($conn,'insert into articlestags(article_id, tag_id) values("'.$id.'","'.$idTag.'")');

}
}
ob_get_flush();
?>
<script src="ckeditor/ckeditor.js" ></script>
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Chỉnh Sửa Bài Viết</h3>
            <div class="tile-body">
                <div class="form-group">
                  <label class="control-label">Title</label>
                  <input class="form-control" type="text" placeholder="Enter Tile" value="<?php echo $pt['title'];?>" name="title">
                </div>
				<div class="form-group">
                  <label class="control-label">Photo</label>
                  <input class="form-control" type="file" name="photo">
                </div>
                <div class="form-group">
                  <label class="control-label">Nội dung</label>
                  <textarea class="form-control" rows="4" placeholder="Enter your content" name="content" id="content"><?php echo $pt['content'];?></textarea>
                </div>
				<div class="form-group">
                  <label class="control-label">Description</label>
                  <input class="form-control" type="text" placeholder="Enter Describe" value="<?php echo $pt['description'];?>" name="description">
                </div>
				<div class="form-group">
                  <label class="control-label">Keyword</label>
                  <input class="form-control" type="text" placeholder="Enter Keyword" value="<?php echo $pt['keyword'];?>" name="keyword">
                </div> 
				<div class="form-group">
					<label class="control-label">Thư Mục</label>           
					<div class="form-control">
					<select name="folder" class="input-text input-select">
                        <?php    
						echo '<option value="'.$pt['folder'].'">'.$pt['folder'].'</option>';
						?>
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
			  <script>
			  CKEDITOR.replace('content');
			  </script>
          </div>
        </div>
	</div>
</form>
<?php
include 'footer.php';
?>