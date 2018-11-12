<?php
ob_start();
include 'header.php';
include 'slider.php';
$sotin1trang = 4;
$current_page = isset($_GET['id']) ? $_GET['id'] : 1;
if(isset($_GET["id"])){
$trang = $_GET["id"];
}else{
	echo 'không có trang này';
	header('Location: index.php?id=1');
}
$from = ($trang -1)* $sotin1trang;
ob_end_flush();
?>

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="heading-block center">
						<h1>Bài Viết Mới Nhất</h1>
						<span>Đặc Biệt ,Hot, Bổ Ích</span>
					</div>

					<!-- Posts
					============================================= -->
					<div id="posts">
						<!--//lấy dữ liệu danh sách bài viết-->
<?php
	$sql = "select * from posts order by id DESC limit $from,$sotin1trang";
	$result = mysqli_query($conn, $sql);
	while($pt = mysqli_fetch_assoc($result)){ 
	$imgData = $pt['photo'];  
?>
<?php
	//lấy số lượng người comment
	$sql = mysqli_query($conn,'SELECT * FROM comment WHERE post_id="'.$pt['id'].'"');
	$total = mysqli_num_rows($sql);
	mysqli_free_result($sql);
?>
						
						<div class="entry clearfix">
							<div class="entry-image">
								<a <?php echo " href=\"$imgData\" ";?> data-lightbox="image"><img class="image_fade" alt="Standard Post with Image" width="50px" <?php echo " src=\"$imgData\" ";?> </a>
							</div>
							<div class="entry-title">
								<h2><a <?php echo 'href=/content.php?id='.$pt['id'];?>><?php echo $pt['title'];?></a></h2>
							</div>
							<ul class="entry-meta clearfix">
								<li><i class="icon-calendar3"></i><?php echo $pt['time'];?></li>
								<li><a><i class="icon-user"></i> <?php echo $pt['user'];?></a></li>
								<li><i class="icon-folder-open"></i> <?php echo '<a href="/category.php?id='.$pt['id_folder'].'&page=1">';?><?php echo $pt['folder'];?></a></li>
								<li><a><i class="icon-comments"></i> <?php echo $total;?> Comments</a></li>
							</ul>
							<div class="entry-content">
								<p><?php echo $pt['description'];?></p>
								<a <?php echo 'href=/content.php?id='.$pt['id'];?> class="more-link" >Read More</a>
							</div>
						</div>
						<?php
						}
						?>

					</div><!-- #posts end -->
			<!--			//hiện phân trang-->
						<div class="col-sm-12 col-md-7">
	<div class="dataTables_paginate paging_simple_numbers" id="sampleTable_paginate">
		<ul class="pagination">
			<?php
				$x = mysqli_query($conn, "select id from posts");
				$tongsotin = mysqli_num_rows($x);
				$sotrang = ceil($tongsotin/$sotin1trang);
			?>
<?php
					// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
if ($current_page > 1 && $sotrang > 1){
    echo '<li class="paginate_button page-item previous" id="sampleTable_previous"><a aria-controls="sampleTable" data-dt-idx="0" tabindex="0" class="page-link" href="index.php?id='.($current_page-1).'">Prev</a>  </li>';
}
 
// Lặp khoảng giữa
for ($i = 1; $i <= $sotrang; $i++){
    // Nếu là trang hiện tại thì hiển thị thẻ span
    // ngược lại hiển thị thẻ a
    if ($i == $current_page){
        echo '<a id="linkpage" class="page-link">'.$i.'</a>  ';
    }
    else{
        echo '<li class="paginate_button page-item "><a aria-controls="sampleTable" data-dt-idx="1" tabindex="0" class="page-link" href="index.php?id='.$i.'">'.$i.'</a> </li> ';
    }
}
 
// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
if ($current_page < $sotrang && $sotrang > 1){
    echo '<li class="paginate_button page-item next " id="sampleTable_next"><a aria-controls="sampleTable" data-dt-idx="7" tabindex="0" class="page-link" href="index.php?id='.($current_page+1).'">Next</a> </li> ';
}
					?>
				</ul>
			</div>
					</div>

					<!-- .pager end -->

				</div>

			</div>

		</section><!-- #content end -->

		
<?php
include 'footer.php';
?>