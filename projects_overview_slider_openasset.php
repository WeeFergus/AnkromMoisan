<div class="project_slider">
	<!-- Swiper -->
	<div class="container swiper-container  top_project_slider">
		<div class="swiper-wrapper">
			<?php if( have_rows('top_page_slidershow') ){
			  while( have_rows('top_page_slidershow') ){ the_row();?>


							<?php 
							$albumhtml = getOpenAssetSwiperTop($OA_albums,$project_id,'overview ranked','medium',1);
							if (($albumhtml!='') && (!$hide_open_asset_albums)) {
								echo $albumhtml;
							} else {
								include 'template-parts/project-story-slides/project-top-slides-no-discipline.php';
							}
							?>


			<?php } } // if( get_field('top_page_slidershow') ): ?>
		</div>
		<div class="container slider_controls_title_wrap">
			<div class="row col-12">
				<div class="slider_controls">
					<!-- Add Pagination -->
					<div class="swiper-pagination"></div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
				<div class="slider_title">
					<h1>&nbsp;<?php //echo $post->post_title; ?></h1>
				</div>
				<div class="slider_controls"><!-- for symmetry --></div>
		</div>
	</div>
	<div class="shimmer tumb_loading"></div>
	</div>
</div>