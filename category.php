<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Blog - Small Thumbs | Canvas</title>

</head>


<?php
include 'header.php';
?>
<?php
$id = $_GET['id'];
$sotin1trang = 4;
$current_page = isset($_GET['page']) ? $_GET['page'] : '1';
$trang = $_GET["page"];
if (!$id) {
	//nếu id không tồn tại
	header('Location: index.php');
}
$sql = 'select * from folder where id='.$id;
$result = mysqli_query($conn, $sql);
if (!mysqli_num_rows($result)) {
	//nếu id không tồn tại
	header('Location: index.php');
}
$user = mysqli_fetch_array($result);
$folder = $user['folder'];
$from = ($trang -1)* $sotin1trang;
?> 


		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Post Content
					============================================= -->
					<div class="postcontent nobottommargin clearfix">

						<!-- Posts
						============================================= -->
						<div id="posts" class="small-thumbs">
				<?php
					//lấy tất cả các user có trong bảng users
					//câu query để lấy
					$sql = "SELECT *
							FROM folder
							INNER JOIN posts 
							ON folder.folder = posts.folder
							WHERE posts.folder = '$folder' order by posts.id DESC limit $from,$sotin1trang"; 
					$result1 = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result1)) {
						while($fol = mysqli_fetch_assoc($result1)) {
							$imgData = $fol['photo']; 
				?>
				<?php
				$x = mysqli_query($conn, "SELECT *
							FROM folder
							INNER JOIN posts 
							ON folder.folder = posts.folder
							WHERE posts.folder = '$folder'");
				$tongsotin = mysqli_num_rows($x);
				$sotrang = ceil($tongsotin/$sotin1trang);
				?>
				<?php
					//lấy số lượng người comment
					$sql = mysqli_query($conn,'SELECT * FROM comment WHERE post_id="'.$fol['id'].'"');
					$total = mysqli_num_rows($sql);
					mysqli_free_result($sql);
				?>
							<div class="entry clearfix">
								<div class="entry-image">
									<a href="images/blog/full/17.jpg" data-lightbox="image"><img class="image_fade" alt="Standard Post with Image" <?php echo " src=\"$imgData\" ";?>></a>
								</div>
								<div class="entry-c">
									<div class="entry-title">
										<h2><a <?php echo 'href=/content.php?id='.$fol['id'];?>><?php echo $fol['title'];?></a></h2>
									</div>
									<ul class="entry-meta clearfix">
										<li><i class="icon-calendar3"></i> <?php echo $fol['time']; ?></li>
										<li><a><i class="icon-user"></i> <?php echo $fol['user'];?></a></li>
										<li><i class="icon-folder-open"></i> <a><?php echo $fol['folder'];?></a></li>
										<li><a><i class="icon-comments"></i><?php echo $total; ?></a></li>
									</ul>
									<div class="entry-content">
										<p><?php echo $fol['description'];?></p>
										<a <?php echo 'href=/content.php?id='.$fol['id'];?> class="more-link">Read More</a>
									</div>
								</div>
							</div>
							<?php
													}
					}
							?>
							
						</div><!-- #posts end -->
					<!--			//hiện phân trang-->
						<div class="col-sm-12 col-md-7">
	<div class="dataTables_paginate paging_simple_numbers" id="sampleTable_paginate">
		<ul class="pagination">
						<?php
					// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
if ($current_page > 1 && $sotrang > 1){
    echo '<li class="paginate_button page-item previous" id="sampleTable_previous"><a aria-controls="sampleTable" data-dt-idx="0" tabindex="0" class="page-link" href="category.php?id='.$id.'&page='.($current_page-1).'">Prev</a>  </li>';
}
 
// Lặp khoảng giữa
for ($i = 1; $i <= $sotrang; $i++){
    // Nếu là trang hiện tại thì hiển thị thẻ span
    // ngược lại hiển thị thẻ a
    if ($i == $current_page){
        echo '<a id="linkpage" class="page-link">'.$i.'</a>  ';
    }
    else{
        echo '<li class="paginate_button page-item "><a aria-controls="sampleTable" data-dt-idx="1" tabindex="0" class="page-link" href="category.php?id='.$id.'&page='.$i.'">'.$i.'</a> </li> ';
    }
}
 
// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
if ($current_page < $sotrang && $sotrang > 1){
    echo '<li class="paginate_button page-item next " id="sampleTable_next"><a aria-controls="sampleTable" data-dt-idx="7" tabindex="0" class="page-link" href="category.php?id='.$id.'&page='.($current_page+1).'">Next</a> </li> ';
}
					?>
							</ul>
			</div>
					</div>

						<!-- .pager end -->

					</div><!-- .postcontent end -->

					<!-- Sidebar
					============================================= -->
					<div class="sidebar nobottommargin col_last clearfix">
						<div class="sidebar-widgets-wrap">
							<div class="widget clearfix">

								
								<h4>Related Posts</h4>
								<div id="post-list-footer">
				<?php
					//lấy tất cả các user có trong bảng users
					//câu query để lấy
					$sql = 'SELECT *
							FROM folder
							INNER JOIN posts
							ON folder.folder = posts.folder
							WHERE posts.folder = \''.$folder.'\' order by posts.id DESC'; 
					$result1 = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result1)) {
						$i=1;
						while($pt = mysqli_fetch_assoc($result1)) {
							$i++;
							if($i<5){
							$imgData = $pt['photo'];
				?>
									<div class="spost clearfix">
										<div class="entry-image">
											<a href="#" class="nobg"><img <?php echo "src=\"$imgData\"";?> alt=""></a>
										</div>
										<div class="entry-c">
											<div class="entry-title">
												<h4><a <?php echo 'href=/content.php?id='.$pt['id'];?>><?php echo $pt['title'];?></a></h4>
											</div>
											<ul class="entry-meta">
												<li><?php echo $pt['time'];?></li>
											</ul>
										</div>
									</div>
									<?php
											}
						}
								}
									?>
								</div>

							</div>

						</div>

					</div><!-- .sidebar end -->

				</div>

			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<?php
	include 'footer.php';
	?>