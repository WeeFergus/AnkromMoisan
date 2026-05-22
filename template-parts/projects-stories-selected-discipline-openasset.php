<?php /* print_r($combined_stories_count); */ // echo $combined_stories_one;
echo "<!-- selected-discipline-openasset -->";

?>
<div class="container project_stories">

	<?php  ///////////////////////////////////// ARCHITECTURE STORY //////////////////////////////////////// ?>
	
	<?php if(strstr($_SERVER['REQUEST_URI'], 'architecture') == false ) { ?>
	<?php echo "<!-- Architecture Story -->"; ?>
	<div class="row project_architecture_story">
		<?php if( have_rows('architecture_project_content') ) { ?>
		<?php while( have_rows('architecture_project_content') ) { the_row(); 
			$projectstorytitle = get_sub_field('project_subtitle');
			$projectstorycontent = get_sub_field('project_content');
		?>
		<?php if($projectstorytitle) { ?>
		<div class="col-12 toggle_wrapper">
			<hr>
			<h5><a href="<?php the_permalink(); ?>/?architecture">Architecture Story</a></h5>
			<h2><?php echo $projectstorytitle; ?></h2>
	
					<!-- Swiper -->
				<?php   
					$albumhtml = getOpenAssetSwiper($OA_albums,$project_id,'architecture ranked','webview',1);
					if (($albumhtml!='') && (!$hide_open_asset_albums)) {
					?>
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?php echo $albumhtml;?>
						</div>
						<div class="slider_controls">
							<!-- Add Pagination -->
							<div class="swiper-pagination"></div>
							<!-- Add Arrows -->
							<div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div>
						</div>
						<div class="shimmer tumb_loading"></div>
					</div>
					<?php } else { ?> 
					<?php if( have_rows('architecture_project_slideshow') ): ?>
						<?php while( have_rows('architecture_project_slideshow') ): the_row(); ?>
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?php include 'project-story-slides/project-story-slides.php';?>
						</div>
						<div class="slider_controls">
							<!-- Add Pagination -->
							<div class="swiper-pagination"></div>
							<!-- Add Arrows -->
							<div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div>
						</div>
						<div class="shimmer tumb_loading"></div>
					</div>
					<?php endwhile; // end of the loop. ?>
					<?php endif; // if( get_field('architecture_project_slideshow') ): ?>
					<?php } ?>

				<div class="project_story_content toggle_item_wrap">
				<div class="toggled_text three_lines">
					<p class="two_col"><?php echo $projectstorycontent; ?></p>
				</div>
				<span class="three_dot">...</span>
				<div class="toggle_text three_lines">
	            	<span class="expando_icon"></span>
                </div>
			</div>

			</div>
		<?php } ?>
		<?php } // end of the loop. ?>
		<?php } // if( get_field('architecture_project_content') ): ?>
	</div>
	<?php } ?>
	
	
<?php  ///////////////////////////////////// END ARCHITECTURE STORY //////////////////////////////////////// ?>


<?php  ///////////////////////////////////// INTERIORS STORY //////////////////////////////////////// ?>
	
	<?php if(strstr($_SERVER['REQUEST_URI'], 'interiors') == false ){ ?>
	<?php echo "<!-- Interiors Story -->"; ?>
	<div class="row project_interior_story">
		<?php if( have_rows('interior_project_content') ) { ?>
		<?php while( have_rows('interior_project_content') ) { the_row(); 
			$projectstorytitle = get_sub_field('project_subtitle');
			$projectstorycontent = get_sub_field('project_content');
		?>
		<?php if($projectstorytitle) { ?>
		<div class="col-12 toggle_wrapper">
			<hr>
			<h5><a href="<?php the_permalink(); ?>/?interiors">Interior Story</a></h5>
			<h2><?php echo $projectstorytitle; ?></h2>
	
					<!-- Swiper -->
				<?php   
					$albumhtml = getOpenAssetSwiper($OA_albums,$project_id,'interiors ranked','webview',1);
					if (($albumhtml!='') && (!$hide_open_asset_albums)) {
					?>
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?php echo $albumhtml;?>
						</div>
						<div class="slider_controls">
							<!-- Add Pagination -->
							<div class="swiper-pagination"></div>
							<!-- Add Arrows -->
							<div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div>
						</div>
						<div class="shimmer tumb_loading"></div>
					</div>
					<?php } else { ?> 
					<?php if( have_rows('interior_project_slideshow') ): ?>
						<?php while( have_rows('interior_project_slideshow') ): the_row(); ?>
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?php include 'project-story-slides/project-story-slides.php';?>
						</div>
						<div class="slider_controls">
							<!-- Add Pagination -->
							<div class="swiper-pagination"></div>
							<!-- Add Arrows -->
							<div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div>
						</div>
						<div class="shimmer tumb_loading"></div>
					</div>
					<?php endwhile; // end of the loop. ?>
					<?php endif; // if( get_field('interior_project_slideshow') ): ?>
					<?php } ?>

				<div class="project_story_content toggle_item_wrap">
				<div class="toggled_text three_lines">
					<p class="two_col"><?php echo $projectstorycontent; ?></p>
				</div>
				<span class="three_dot">...</span>
				<div class="toggle_text three_lines">
	            	<span class="expando_icon"></span>
                </div>
			</div>


			</div>
		<?php } ?>
		<?php } // end of the loop. ?>
		<?php } // if( get_field('architecture_project_content') ): ?>
	</div>
	<?php } ?>
	
<?php  ///////////////////////////////////// END INTERIOR STORY //////////////////////////////////////// ?>



	
<?php  ///////////////////////////////////// PLANNING TORY //////////////////////////////////////// ?>
	
	<?php if(strstr($_SERVER['REQUEST_URI'], 'planning') == false ){ ?>
	<?php echo "<!-- Planning Story -->"; ?>

	<div class="row project_planning_story">
		<?php if( have_rows('planning_project_content') ){ ?>
		<?php while( have_rows('planning_project_content') ){ the_row(); 
			$projectstorytitle = get_sub_field('project_subtitle');
			$projectstorycontent = get_sub_field('project_content');
		?>
		<?php if($projectstorytitle){?>
		<div class="col-12 toggle_wrapper">
			<hr>
			<h5><a href="<?php the_permalink(); ?>/?plannings">Planning Story</a></h5>
			<h2><?php echo $projectstorytitle; ?></h2>
	
					<!-- Swiper -->
				<?php   
					$albumhtml = getOpenAssetSwiper($OA_albums,$project_id,'plannings ranked','webview',1);
					if (($albumhtml!='') && (!$hide_open_asset_albums)) {
					?>
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?php echo $albumhtml;?>
						</div>
						<div class="slider_controls">
							<!-- Add Pagination -->
							<div class="swiper-pagination"></div>
							<!-- Add Arrows -->
							<div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div>
						</div>
						<div class="shimmer tumb_loading"></div>
					</div>
					<?php } else { ?> 
					<?php if( have_rows('planning_project_slideshow') ): ?>
						<?php while( have_rows('planning_project_slideshow') ): the_row(); ?>
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?php include 'project-story-slides/project-story-slides.php';?>
						</div>
						<div class="slider_controls">
							<!-- Add Pagination -->
							<div class="swiper-pagination"></div>
							<!-- Add Arrows -->
							<div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div>
						</div>
						<div class="shimmer tumb_loading"></div>
					</div>
					<?php endwhile; // end of the loop. ?>
					<?php endif; // if( get_field('planning_project_slideshow') ): ?>
					<?php } ?>

				<div class="project_story_content toggle_item_wrap">
				<div class="toggled_text three_lines">
					<p class="two_col"><?php echo $projectstorycontent; ?></p>
				</div>
				<span class="three_dot">...</span>
				<div class="toggle_text three_lines">
	            	<span class="expando_icon"></span>
                </div>
			</div>


			</div>
		<?php } ?>
		<?php } // end of the loop. ?>
		<?php } // if( get_field('architecture_project_content') ): ?>
	</div>
	<?php } ?>

	
<?php  ///////////////////////////////////// END PLANNING STORY //////////////////////////////////////// ?>




<?php  ///////////////////////////////////// BRAND TORY //////////////////////////////////////// ?>
	
	<?php if(strstr($_SERVER['REQUEST_URI'], 'brand') == false ){ ?>
	<?php echo "<!-- Brand Story -->"; ?>

	<div class="row project_brand_story">
		<?php if( have_rows('brand_project_content') ){ ?>
		<?php while( have_rows('brand_project_content') ){ the_row(); 
			$projectstorytitle = get_sub_field('project_subtitle');
			$projectstorycontent = get_sub_field('project_content');
		?>
		<?php if($projectstorytitle){?>
		<div class="col-12 toggle_wrapper">
			<hr>
			<h5><a href="<?php the_permalink(); ?>/?brands">Brand Story</a></h5>
			<h2><?php echo $projectstorytitle; ?></h2>
	
					<!-- Swiper -->
				<?php   
					$albumhtml = getOpenAssetSwiper($OA_albums,$project_id,'brands ranked','webview',1);
					if (($albumhtml!='') && (!$hide_open_asset_albums)) {
					?>
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?php echo $albumhtml;?>
						</div>
						<div class="slider_controls">
							<!-- Add Pagination -->
							<div class="swiper-pagination"></div>
							<!-- Add Arrows -->
							<div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div>
						</div>
						<div class="shimmer tumb_loading"></div>
					</div>
					<?php } else { ?> 
					<?php if( have_rows('brand_project_slideshow') ): ?>
						<?php while( have_rows('brand_project_slideshow') ): the_row(); ?>
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?php include 'project-story-slides/project-story-slides.php';?>
						</div>
						<div class="slider_controls">
							<!-- Add Pagination -->
							<div class="swiper-pagination"></div>
							<!-- Add Arrows -->
							<div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div>
						</div>
						<div class="shimmer tumb_loading"></div>
					</div>
					<?php endwhile; // end of the loop. ?>
					<?php endif; // if( get_field('brand_project_slideshow') ): ?>
					<?php } ?>

				<div class="project_story_content toggle_item_wrap">
				<div class="toggled_text three_lines">
					<p class="two_col"><?php echo $projectstorycontent; ?></p>
				</div>
				<span class="three_dot">...</span>
				<div class="toggle_text three_lines">
	            	<span class="expando_icon"></span>
                </div>
			</div>


			</div>
		<?php } ?>
		<?php } // end of the loop. ?>
		<?php } // if( get_field('architecture_project_content') ): ?>
	</div>
	<?php } ?>


	
<?php  ///////////////////////////////////// END BRAND STORY //////////////////////////////////////// ?>




	<div class="row">
		<div class="col-12">
			<hr>
		</div>
	</div>
</div>
