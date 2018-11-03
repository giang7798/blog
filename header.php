<?php
include "admin/connectdb.php";
?>
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
	<link rel="stylesheet" href="css/swiper.css" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
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
	<title>Home - Blog Layout | Canvas</title>

</head>

<body class="stretched"> 
	<?php
	                include "admin/connectdb.php";
					//lấy tất cả các user có trong bảng users
					//câu query để lấy
					$sql = 'select * from logo'; // không có where vì mình cần lấy tất cả
					$result = mysqli_query($conn, $sql);
					$user = mysqli_fetch_assoc($result);
					$imgData = $user['img'];  
	?>
	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="sticky-style-2">

			<div class="container clearfix">

				<!-- Logo
				============================================= -->
				<div id="logo" class="divcenter">
					<a href="index.php" class="standard-logo" data-dark-logo="images/logo-dark.png"><img class="divcenter" <?php echo "src=\"$imgData\" ";?> alt="Canvas Logo"></a>
					<a href="index.html" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img class="divcenter" src="images/logo@2x.png" alt="Canvas Logo"></a>
				</div><!-- #logo end -->

			</div>

			<div id="header-wrap">

				<!-- Primary Navigation
				============================================= -->
				<nav id="primary-menu" class="style-2 center">

					<div class="container clearfix">

						<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

						<ul>
							<li class="current"><a href="index.php"><div>Home</div></a></li>
						<?php
						$sql = 'select * from folder';
						$result = mysqli_query($conn, $sql);
						$i= 1;

						while($pt = mysqli_fetch_assoc($result)){ 
							if($pt['hidden']!=0){

						?>
							<li><a href="#"><div><?php echo $pt['folder']?></div></a></li>
						<?php
							}
						}
						?>
						</ul>
				

						<!-- Top Search
						============================================= -->
						<div id="top-search">
							<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
							<form action="search.html" method="get">
								<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
							</form>
						</div><!-- #top-search end -->

					</div>

				</nav><!-- #primary-menu end -->

			</div>

		</header><!-- #header end -->

		<section id="slider" class="slider-element slider-parallax swiper_wrapper clearfix">
			<div class="swiper-container swiper-parent">
				<div class="swiper-wrapper">
			<?php
			 	$sql = 'select * from slider';
				$result = mysqli_query($conn, $sql);
				while($pt = mysqli_fetch_assoc($result)) {
					if($pt['hidden']!=0){
				$imgData = $pt['picture'];
				
			?>
					<div class="swiper-slide dark" style="background-image: <?php echo 'url('.$imgData.');'?>">
						<div class="container clearfix">
							<div class="slider-caption slider-caption-center">
								<h2 data-caption-animate="fadeInUp"><?php echo $pt['title']; ?></h2>
								<p class="d-none d-sm-block" data-caption-animate="fadeInUp" data-caption-delay="200"><?php echo $pt['content']?></p>
							</div>
						</div>
					</div>
				
			
				<?php
					}
				}
					?>
				</div>
				<div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
				<div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
				<div class="slide-number"><div class="slide-number-current"></div><span>/</span><div class="slide-number-total"></div></div>
			</div>

		</section>
