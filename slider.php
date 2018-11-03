	<div class="swiper-container swiper-parent">
				<div class="swiper-wrapper">
					<td>
					<div class="swiper-slide dark" style="background-image: url('images/slider/swiper/1.jpg');">
						<div class="container clearfix">
							<div class="slider-caption slider-caption-center">
								<h2 data-caption-animate="fadeInUp"><?php echo $pt['title'] ?></h2>
								<p class="d-none d-sm-block" data-caption-animate="fadeInUp" data-caption-delay="200"><?php echo $pt['content']?></p>
							</div>
						</div>
					</div>
					</td>
					<div class="swiper-slide dark">
						<div class="container clearfix">
							<div class="slider-caption slider-caption-center">
								<h2 data-caption-animate="fadeInUp"><?php echo $pt['title'] ?></h2>
								<p class="d-none d-sm-block" data-caption-animate="fadeInUp" data-caption-delay="200"><?php echo $pt['content']?></p>
							</div>
						</div>
						<div class="video-wrap">
							<video poster="images/videos/explore.jpg" preload="auto" loop autoplay muted>
								<source src='images/videos/explore.mp4' type='video/mp4' />
								<source src='images/videos/explore.webm' type='video/webm' />
							</video>
							<div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>
						</div>
					</div>
					<div class="swiper-slide" style="background-image: url('images/slider/swiper/3.jpg'); background-position: center top;">
						<div class="container clearfix">
							<div class="slider-caption">
								<h2 data-caption-animate="fadeInUp"><?php echo $pt['title'] ?></h2>
								<p class="d-none d-sm-block" data-caption-animate="fadeInUp" data-caption-delay="200"><?php echo $pt['content']?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
				<div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
				<div class="slide-number"><div class="slide-number-current"></div><span>/</span><div class="slide-number-total"></div></div>
			</div>