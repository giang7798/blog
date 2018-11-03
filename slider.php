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