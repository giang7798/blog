<?php
include 'connectdb.php';
//lấy user theo user id
if (isset($_GET['id'])) {
	//Lây id được gửi qua từ bên listusers.php
	$id = $_GET['id'];
	//Thực thi câu lệnh sql delete để xóa user
	$sql = 'update folder set hidden="0" where id='.$id;
	$result = mysqli_query($conn, $sql);
	$query = mysqli_query($conn, $sql);
	header('Location: listfolder.php');
}

?>
