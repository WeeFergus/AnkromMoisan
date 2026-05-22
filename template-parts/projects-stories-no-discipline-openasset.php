<?php echo "<!-- no-discipline-openasset -->"; ?>

<div class="container project_stories">

	<?php  ///////////////////////////////////// ARCHITECTURE STORY //////////////////////////////////////// ?>

	<?php if(!strstr($combined_stories_one, 'Architecture')): ?> 
	<div class="row project_interior_story">
		<?php if( have_rows('architecture_project_content') ): ?>
		<?php while( have_rows('architecture_project_content') ): the_row(); 
			$projectstorytitle = get_sub_field('project_subtitle');
			$projectstorycontent = get_sub_field('project_content');
			$project_category = "Architecture";
			$story_text = "Story";
			///////////  CHECK FOR ALTERNATIVE CATEGORY AND STORY //////////////////
			$alternative_project_category = get_sub_field('alternative_project_category');
			if ($alternative_project_category) {
				$project_category = $alternative_project_category;
			}
			$alternative_story_text = get_sub_field('alternative_story_text');
			if ($alternative_story_text) {
				$story_text = $alternative_story_text;
			}
		?>
		<?php if($projectstorytitle):?>
		<div class="col-12 toggle_wrapper">
			<hr>
			<h5><a href="<?php the_permalink(); ?>/?architecture"><?php echo $project_category;?> <?php echo $story_text;?></a></h5>
			<h2><?php echo $projectstorytitle; ?></h2>


			<!-- Swiper -->
			<?php if( have_rows('architecture_project_slideshow') ): ?>
				<?php while( have_rows('architecture_project_slideshow') ): the_row(); ?>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					
							<?php 
							$albumhtml = getOpenAssetSwiper($OA_albums,$project_id,'architecture ranked','webview',1);
							if (($albumhtml!='') && (!$hide_open_asset_albums)) {
								echo $albumhtml;
							} else {
								include 'project-story-slides/project-story-slides.php';
							}
							?>

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
		<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
		<?php endif; // if( get_field('interior_project_content') ): ?>
	</div>
	<?php endif; ?>

	<?php  ///////////////////////////////////// END ARCHITECTURE STORY //////////////////////////////////////// ?>







	<?php  ///////////////////////////////////// INTERIORS STORY //////////////////////////////////////// ?>

	<?php if(!strstr($combined_stories_one, 'Interior')): ?>
	<div class="row project_interior_story">
		<?php if( have_rows('interior_project_content') ): ?>
		<?php while( have_rows('interior_project_content') ): the_row(); 
			$projectstorytitle = get_sub_field('project_subtitle');
			$projectstorycontent = get_sub_field('project_content');
		?>
		<?php if($projectstorytitle):?>
		<div class="col-12 toggle_wrapper">
			<hr>
			<h5><a href="<?php the_permalink(); ?>/?interiors">Interior Story</a></h5>
			<h2><?php echo $projectstorytitle; ?></h2>


			<!-- Swiper -->
			<?php if( have_rows('interior_project_slideshow') ): ?>
				<?php while( have_rows('interior_project_slideshow') ): the_row(); ?>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					
							<?php 
							$albumhtml = getOpenAssetSwiper($OA_albums,$project_id,'interiors ranked','webview',1);
							if (($albumhtml!='') && (!$hide_open_asset_albums)) {
								echo $albumhtml;
							} else {
								include 'project-story-slides/project-story-slides.php';
							}
							?>

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
		<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
		<?php endif; // if( get_field('interior_project_content') ): ?>
	</div>
	<?php endif; ?>

	<?php  ///////////////////////////////////// END INTERIORS STORY //////////////////////////////////////// ?>








	<?php  ///////////////////////////////////// PLANNING STORY //////////////////////////////////////// ?>
	
	<?php if(!strstr($combined_stories_one, 'Planning')): ?>
	<div class="row project_planning_story">
		<?php if( have_rows('planning_project_content') ): ?>
		<?php while( have_rows('planning_project_content') ): the_row(); 
			$projectstorytitle = get_sub_field('project_subtitle');
			$projectstorycontent = get_sub_field('project_content');
		?>
		<?php if($projectstorytitle):?>
		<div class="col-12 toggle_wrapper">
			<hr>
			<h5><a href="<?php the_permalink(); ?>/?planning">Planning Story</a></h5>
			<h2><?php echo $projectstorytitle; ?></h2>

			<!-- Swiper -->
			<?php if( have_rows('planning_project_slideshow') ): ?>
			<?php while( have_rows('planning_project_slideshow') ): the_row(); ?>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					
							<?php 
							$albumhtml = getOpenAssetSwiper($OA_albums,$project_id,'planning ranked','webview',1);
							if (($albumhtml!='') && (!$hide_open_asset_albums)) {
								echo $albumhtml;
							} else {
								include 'project-story-slides/project-story-slides.php';
							}
							?>

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
		<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
		<?php endif; // if( get_field('planning_project_content') ): ?>
	</div>
	<?php endif; ?>

	<?php  ///////////////////////////////////// END PLANNING STORY //////////////////////////////////////// ?>






	<?php  ///////////////////////////////////// BRAND STORY //////////////////////////////////////// ?>

	<?php if(!strstr($combined_stories_one, 'Brand')): ?>
	<div class="row project_brand_story">
		<?php if( have_rows('brand_project_content') ): ?>
		<?php while( have_rows('brand_project_content') ): the_row(); 
			$projectstorytitle = get_sub_field('project_subtitle');
			$projectstorycontent = get_sub_field('project_content');
		?>
		<?php if($projectstorytitle):?>
		<div class="col-12 toggle_wrapper">
			<hr>
			<h5><a href="<?php the_permalink(); ?>/?brand">Brand Story</a></h5>
			<h2><?php echo $projectstorytitle; ?></h2>



				<?php //////////////////////  ALBUM BRAND ////////////// ?>
				<div id="album-brand" class="albumsdiv"></div>


			<!-- Swiper -->
			<?php if( have_rows('brand_project_slideshow') ): ?>
				<?php while( have_rows('brand_project_slideshow') ): the_row(); ?>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					
							<?php 
							$albumhtml = getOpenAssetSwiper($OA_albums,$project_id,'brand ranked','webview',1);
							if (($albumhtml!='') && (!$hide_open_asset_albums)) {
								echo $albumhtml;
							} else {
								include 'project-story-slides/project-story-slides.php';
							}
							?>

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
		<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
		<?php endif; // if( get_field('brand_project_content') ): ?>
	</div>
	<?php endif; ?>


	<?php  ///////////////////////////////////// END BRAND STORY //////////////////////////////////////// ?>


	<div class="row">
		<div class="col-12">
			<hr>
		</div>
	</div>
</div>
