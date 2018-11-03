<?php 
// hàm include để nhập nội dung file header vào đây
// hàm này có thể nhập được các mã PHP để xử lý trên file này
$page_title = 'Quản lý user';
include('header.php');
 ?>
<?php
$_SESSION['user'];
if(isset($_SESSION['user'])){
include('list.php');
}else{
	echo 'bạn cần đăng nhập để xem được danh sách';
}
?>
<?php include('footer.php'); ?>