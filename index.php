<?php
include 'header.php';
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
	   					<?php
						$sql = 'select * from posts order by id DESC';
						$result = mysqli_query($conn, $sql);
						while($pt = mysqli_fetch_assoc($result)){ 
                        $imgData = $pt['photo'];  
						?>
						<div class="entry clearfix">
							<div class="entry-image">
								<a href="images/portfolio/full/17.jpg" data-lightbox="image"><img class="image_fade" alt="Standard Post with Image" <?php echo "<img src=\"$imgData\" />";?> </a>
							</div>
							<div class="entry-title">
								<h2><a href="blog-single.html"><?php echo $pt['title'];?></a></h2>
							</div>
							<ul class="entry-meta clearfix">
								<li><i class="icon-calendar3"></i> 10th February 2014</li>
								<li><a href="#"><i class="icon-user"></i> <?php echo $pt['user'];?></a></li>
								<li><i class="icon-folder-open"></i> <a href="#"><?php echo $pt['folder'];?></a></li>
								<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13 Comments</a></li>
								<li><a href="#"><i class="icon-camera-retro"></i></a></li>
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

					<!-- Pagination
					============================================= -->
					<div class="row mb-3">
						<div class="col-12">
							<a href="#" class="btn btn-outline-secondary float-left">&larr; Older</a>
							<a href="#" class="btn btn-outline-dark float-right">Newer &rarr;</a>
						</div>
					</div>
					<!-- .pager end -->

				</div>

			</div>

		</section><!-- #content end -->

		
<?php
include 'footer.php';
?>