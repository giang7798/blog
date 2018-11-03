<?php
include 'connectdb.php';
//lấy user theo user id
if (isset($_GET['id'])) {
	//Lây id được gửi qua từ bên listusers.php
	$id = $_GET['id'];
	//Thực thi câu lệnh sql delete để xóa user
	$sql = "delete from posts where id = $id";
	$query = mysqli_query($conn, $sql);
	header('Location: listpost.php');
}

?>
