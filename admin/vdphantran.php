<?php
include 'connectdb.php';
$sotin1trang = 4;
if(isset($_GET["id"])){
$trang = $_GET["id"];
}
?>
<?php
$from = ($trang -1)* $sotin1trang;
$qr = "select * from posts limit $from,$sotin1trang";
$ds = mysqli_query($conn,$qr);
while($tin = mysqli_fetch_array($ds)){
?>
<h3><?php echo $tin['title']?></h3>
<?php }?>
<div id ="phantrang">
<?php
	$x = mysqli_query($conn, "select id from posts");
	$tongsotin = mysqli_num_rows($x);
    $sotrang = ceil($tongsotin/$sotin1trang);

for($t=1;$t<=$sotrang;$t++){
	echo "<a href='vd.php?id=$t'>trang $t</a> -";
}
?>
</div>