<?php
include 'connectdb.php';
//lấy user theo user id
if (isset($_GET['id'])) {
	//Lây id được gửi qua từ bên listusers.php
	$id = $_GET['id'];
	//xóa các comment có liên quan tới bài viết trong table tags
	$sql = "select * from articlestags where article_id = $id";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)>0){
		while($i = mysqli_fetch_assoc($result)){
			$k = $i['tag_id'];
				mysqli_query($conn, "delete from tags where id = $k");
		}
	}
	//Thực thi câu lệnh sql delete để xóa user
	$sql = "delete from posts where id = $id";
	$query = mysqli_query($conn, $sql);
	//xóa bảng articlestags
	mysqli_query($conn, "delete from articlestags where article_id = $id");
	//xóa bảng comment của bài viết
	mysqli_query($conn, "delete from comment where post_id = $id");
	header('Location: listpost.php?id=1');
}

?>
