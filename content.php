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
	<title>Blog Single | Canvas</title>

</head>

	<?php
	include 'header.php';
	?>
	<?php
$page_title = 'Chỉnh Sửa Bài Viết';
//lấy user theo user id
$id = $_GET['id'];
if (!$id) {
	//nếu id không tồn tại
	header('Location: index.php');
}
$sql = 'select * from posts where id='.$id;
$result = mysqli_query($conn, $sql);
if (!mysqli_num_rows($result)) {
	//nếu id không tồn tại
	header('Location: index.php');
}
$pt = mysqli_fetch_array($result);
	$img = $pt['photo'];
	$folder = $pt['folder'];
ob_get_flush();
	?>
	<?php
	//lấy số lượng người comment
							$sql = mysqli_query($conn,'SELECT * FROM comment WHERE post_id="'.$id.'"');
							$total = mysqli_num_rows($sql);
                            mysqli_free_result($sql);
echo $total;
	?>

	<!-- Document Wrapper
	============================================= -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Post Content
					============================================= -->
					<div class="postcontent nobottommargin clearfix">

						<div class="single-post nobottommargin">

							<!-- Single Post
							============================================= -->
							<div class="entry clearfix">

								<!-- Entry Title
								============================================= -->
								<div class="entry-title">
									<h2><?php echo $pt['title'];?></h2>
								</div><!-- .entry-title end -->

								<!-- Entry Meta
								============================================= -->
								<ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> <?php echo $pt['time'];?></li>
									<li><a ><i class="icon-user"></i> <?php echo $pt['user'];?></a></li>
									<li><i class="icon-folder-open"></i> <?php echo '<a href="/category.php?id='.$pt['id_folder'].'">';?><?php echo $pt['folder'];?></a></li>
									<li><a><i class="icon-comments"></i> <?php echo $total; ?></a></li>
								</ul><!-- .entry-meta end -->

								<!-- Entry Image
								============================================= -->
								<div class="entry-image">
									<a href="#"><img alt="Blog Single" <?php echo "<img src=\"$img\" ";?> ></a>
								</div><!-- .entry-image end -->

								<!-- Entry Content
								============================================= -->
								<div class="entry-content notopmargin">
                                    <?php echo $pt['content'];?>
									<!-- Tag Cloud
									============================================= -->
									<div class="tagcloud clearfix bottommargin">
								    <?php
									$sql = 'SELECT * FROM articlestags INNER JOIN tags on articlestags.tag_id = tags.id WHERE articlestags.article_id = "'.$id.'"';
									$result = mysqli_query($conn, $sql);
									while($tag = mysqli_fetch_assoc($result)){
									?>
									
										<a <?php echo 'href=/content.php?id='.$pt['id'];?>><?php echo $tag['name'];?></a>
									
									<?php
									}
										?>
									</div><!-- .tagcloud end -->

									<div class="clear"></div>

									<!-- Post Single - Share
									============================================= -->
									<div class="si-share noborder clearfix">
										<span>Share this Post:</span>
									</div><!-- Post Single - Share End -->
									<div class="fb-share-button" <?php echo 'data-href=/content.php?id='.$pt['id'];?> data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>

								</div>
							</div><!-- .entry end -->

							<!-- Post Author Info
							============================================= -->
  			<?php
				$sql = 'SELECT * FROM `pageusers` 
				JOIN users 
				ON users.id = pageusers.user_id order by pageusers.id DESC';
					$result = mysqli_query($conn, $sql);
					$user = mysqli_fetch_assoc($result);
			?>
							<div class="card">
								<div class="card-header"><strong>Posted by <a href="#"><?php echo $user['username'];?></a></strong></div>
								<div class="card-body">
									<div class="author-image">
										<img width="50px" src="<?php echo $user['picture'];?>" alt="" class="rounded-circle">
									</div>
									<?php echo $user['content']; ?>
								</div>
							</div><!-- Post Single - Author End -->

							<div class="line"></div>

							<!-- Comments
							============================================= -->

							<div id="comments" class="clearfix">

								<h3 id="comments-title"><span><?php echo $total;?></span> Comments</h3>

								<!-- Comments List
								============================================= -->
								<ol class="commentlist clearfix">

									<!--<li class="comment even thread-even depth-1" id="li-comment-1">

										<div id="comment-1" class="comment-wrap clearfix">

											<div class="comment-meta">

												<div class="comment-author vcard">

													<span class="comment-avatar clearfix">
													<img alt='' src='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60' class='avatar avatar-60 photo avatar-default' height='60' width='60' /></span>

												</div>

											</div>

											<div class="comment-content clearfix">

												<div class="comment-author">John Doe<span><a href="#" title="Permalink to this comment">April 24, 2012 at 10:46 am</a></span></div>

												<p>Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>

												<a class='comment-reply-link' href='#'><i class="icon-reply"></i></a>

											</div>

										</div>


										<ul class='children'>

											<li class="comment byuser comment-author-_smcl_admin odd alt depth-2" id="li-comment-3">

												<div id="comment-3" class="comment-wrap clearfix">

													<div class="comment-meta">

														<div class="comment-author vcard">

															<span class="comment-avatar clearfix">
															<img alt='' src='http://1.gravatar.com/avatar/30110f1f3a4238c619bcceb10f4c4484?s=40&amp;d=http%3A%2F%2F1.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D40&amp;r=G' class='avatar avatar-40 photo' height='40' width='40' /></span>

														</div>

													</div>

													<div class="comment-content clearfix">

														<div class="comment-author"><a href='#' rel='external nofollow' class='url'>SemiColon</a><span><a href="#" title="Permalink to this comment">April 25, 2012 at 1:03 am</a></span></div>

														<p>Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

														<a class='comment-reply-link' href='#'><i class="icon-reply"></i></a>

													</div>

													<div class="clear"></div>

												</div>

											</li>

										</ul>

									</li>-->
                                    <?php
									$sql = 'select * from comment where post_id="'.$id.'" ';
									$result = mysqli_query($conn, $sql);
									while($cm = mysqli_fetch_assoc($result)){
									?>	
									<li class="comment byuser comment-author-_smcl_admin even thread-odd thread-alt depth-1" id="li-comment-2">

										<div id="comment-2" class="comment-wrap clearfix">

											<div class="comment-meta">

												<div class="comment-author vcard">

													<span class="comment-avatar clearfix">
													<img alt='' src='http://1.gravatar.com/avatar/30110f1f3a4238c619bcceb10f4c4484?s=60&amp;d=http%3A%2F%2F1.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D60&amp;r=G' class='avatar avatar-60 photo' height='60' width='60' /></span>

												</div>

											</div>

											<div class="comment-content clearfix">

												<div class="comment-author"><a href='http://themeforest.net/user/semicolonweb' rel='external nofollow' class='url'><?php echo $cm['name']; ?></a><span><a href="#" title="Permalink to this comment"><?php echo $cm['day']; ?></a></span></div>

												<p><?php echo $cm['comment'] ?></p>

												<a class='comment-reply-link' href='#'><i class="icon-reply"></i></a>

											</div>

										</div>

									</li>
									<?php
									}
										?>
									

								</ol><!-- .commentlist end -->
								<?php include 'comment.php'; ?>
							</div><!-- #comments end -->

						</div>

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
												<h4><a href="#"><?php echo $pt['title'];?></a></h4>
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

							<div class="widget clearfix">

								</div>


							</div>

						</div>

					</div><!-- .sidebar end -->

				</div>

			</div>

		</section><!-- #content end -->
		<?php
		include 'footer.php';
		?>

