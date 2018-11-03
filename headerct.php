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
				
					</div>

				</nav><!-- #primary-menu end -->

			</div>

		</header><!-- #header end -->
