<?php /* print_r($combined_stories_count); */ // echo $combined_stories_one;
	if($combined_stories_1){
		if(count($combined_stories_count) === 2){ $currentVal = strstr($_SERVER['REQUEST_URI'], strtolower($combined_stories_one[0])) == false && strstr($_SERVER['REQUEST_URI'], strtolower($combined_stories_one[1])) == false; } 
		if(count($combined_stories_count) === 3){ $currentVal = strstr($_SERVER['REQUEST_URI'], strtolower($combined_stories_one[0])) == false && strstr($_SERVER['REQUEST_URI'], strtolower($combined_stories_one[1])) == false && strstr($_SERVER['REQUEST_URI'], strtolower($combined_stories_one[2])) == false; }
		if(count($combined_stories_count) === 4){ $currentVal = strstr($_SERVER['REQUEST_URI'], strtolower($combined_stories_one[0])) == false && strstr($_SERVER['REQUEST_URI'], strtolower($combined_stories_one[1])) == false && strstr($_SERVER['REQUEST_URI'], strtolower($combined_stories_one[2])) == false && strstr($_SERVER['REQUEST_URI'], strtolower($combined_stories_one[3])) == false; } 
		}
?>
<div class="container project_stories">
	<?php if(strstr($_SERVER['REQUEST_URI'], 'architecture') == false): ?>
	
	<?php if(!strstr($combined_stories_one, 'Architecture')): ?>
	<div class="row project_architecture_story">
		<?php if( have_rows('architecture_project_content') ): ?>
		<?php while( have_rows('architecture_project_content') ): the_row(); 
			$projectstorytitle = get_sub_field('project_subtitle');
			$projectstorycontent = get_sub_field('project_content');
		?>
		<?php if($projectstorytitle):?>
		<div class="col-12 toggle_wrapper">
			<hr>
			<h5>Architecture Story</h5>
			<h2><?php echo $projectstorytitle; ?></h2>
			<div class="project_story_content toggle_item_wrap">
				<div class="toggle_text">
	            	<span class="expando_icon"></span>
                </div>
				<div class="toggled_text project_selected_discipline">
					<!-- Swiper -->
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
					<p class="two_col"><?php echo $projectstorycontent; ?></p>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
		<?php endif; // if( get_field('architecture_project_content') ): ?>
	</div>
	<?php endif; ?>
	<?php endif; ?>
	
	<?php if(strstr($combined_stories_one, 'Architecture') || strstr($combined_stories_one, 'Interior')): ?>
	<?php if($currentVal): ?>
	<div class="row project_architecture_story">
		<?php if( have_rows('architecture_project_content') ): ?>
		<?php while( have_rows('architecture_project_content') ): the_row(); 
			$projectstorytitle = get_sub_field('project_subtitle');
			$projectstorycontent = get_sub_field('project_content');
		?>
		<?php if($projectstorytitle):?>
		<div class="col-12 toggle_wrapper">
			<hr>
			<h5><?php if(strstr($combined_stories_one, 'Architecture')): ?>Architecture + <?php endif; ?><?php if(strstr($combined_stories_one, 'Interior')): ?>Interior <?php if(strstr($combined_stories_one, 'Planning') || strstr($combined_stories_one, 'Brand')): ?>+ <?php endif; ?><?php endif; ?><?php if(strstr($combined_stories_one, 'Planning')): ?>Planning <?php if(strstr($combined_stories_one, 'Brand')): ?>+ <?php endif; ?><?php endif; ?><?php if(strstr($combined_stories_one, 'Brand')): ?>Brand <?php endif; ?>Stories</h5>
			<h2><?php echo $projectstorytitle; ?></h2>
			<div class="project_story_content toggle_item_wrap">
				<div class="toggle_text">
	            	<span class="expando_icon"></span>
                </div>
				<div class="toggled_text project_selected_discipline">
					<!-- Swiper -->
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?php if(strstr($combined_stories_one, 'Architecture')): ?>
								<?php if( have_rows('architecture_project_slideshow') ): while( have_rows('architecture_project_slideshow') ): the_row(); ?>
									<?php include 'project-story-slides/project-story-slides.php'; ?>
								<?php endwhile; endif; // if( get_field('architecture_project_slideshow') ): ?>
							<?php endif; ?>
							<?php if(strstr($combined_stories_one, 'Interior')): ?>
								<?php if(  have_rows('interior_project_content') ): while( have_rows('interior_project_content') ): the_row(); if(  have_rows('interior_project_slideshow') ): while( have_rows('interior_project_slideshow') ): the_row();  ?>
									<?php include 'project-story-slides/project-story-slides.php';?>
								<?php endwhile; endif; endwhile; endif; // if( get_field('architecture_project_slideshow') ): ?>
							<?php endif; ?>
							<?php if(strstr($combined_stories_one, 'Planning')): ?>
								<?php if(  have_rows('planning_project_content') ): while( have_rows('planning_project_content') ): the_row(); if(  have_rows('planning_project_slideshow') ): while( have_rows('planning_project_slideshow') ): the_row();  ?>
									<?php include 'project-story-slides/project-story-slides.php';?>
								<?php endwhile; endif; endwhile; endif; // if( get_field('architecture_project_slideshow') ): ?>
							<?php endif; ?>
							<?php if(strstr($combined_stories_one, 'Brand')): ?>
								<?php if(  have_rows('brand_project_content') ): while( have_rows('brand_project_content') ): the_row(); if(  have_rows('brand_project_slideshow') ): while( have_rows('brand_project_slideshow') ): the_row();  ?>
									<?php include 'project-story-slides/project-story-slides.php';?>
								<?php endwhile; endif; endwhile; endif; // if( get_field('architecture_project_slideshow') ): ?>
							<?php endif; ?>
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
					<p class="two_col"><?php echo $projectstorycontent; ?></p>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
		<?php endif; // if( get_field('architecture_project_content') ): ?>
	</div>
	<?php endif; ?>
	<?php endif; ?>

	
	<?php if(strstr($_SERVER['REQUEST_URI'], 'interior') == false ): ?>
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
			<h5>Interior Story</h5>
			<h2><?php echo $projectstorytitle; ?></h2>
			<div class="project_story_content toggle_item_wrap">
				<div class="toggle_text">
	            	<span class="expando_icon"></span>
                </div>
				<div class="toggled_text project_selected_discipline">
					<!-- Swiper -->
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
					<p class="two_col"><?php echo $projectstorycontent; ?></p>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
		<?php endif; // if( get_field('interior_project_content') ): ?>
	</div>
	<?php endif; ?>
	<?php endif; ?>
	
	<?php if(!strstr($combined_stories_one, 'Architecture') && !strstr($combined_stories_one, 'Interior')): ?>
	<?php if($currentVal): ?>
	<div class="row project_architecture_story">
		<?php if( have_rows('architecture_project_content') ): ?>
		<?php while( have_rows('architecture_project_content') ): the_row(); 
			$projectstorytitle = get_sub_field('project_subtitle');
			$projectstorycontent = get_sub_field('project_content');
		?>
		<?php if($projectstorytitle):?>
		<div class="col-12 toggle_wrapper">
			<hr>
			<h5><?php if(strstr($combined_stories_one, 'Architecture')): ?>Architecture + <?php endif; ?><?php if(strstr($combined_stories_one, 'Interior')): ?>Interior <?php if(strstr($combined_stories_one, 'Planning') || strstr($combined_stories_one, 'Brand')): ?>+ <?php endif; ?><?php endif; ?><?php if(strstr($combined_stories_one, 'Planning')): ?>Planning <?php if(strstr($combined_stories_one, 'Brand')): ?>+ <?php endif; ?><?php endif; ?><?php if(strstr($combined_stories_one, 'Brand')): ?>Brand <?php endif; ?>Stories</h5>
			<h2><?php echo $projectstorytitle; ?></h2>
			<div class="project_story_content toggle_item_wrap">
				<div class="toggle_text">
	            	<span class="expando_icon"></span>
                </div>
				<div class="toggled_text project_selected_discipline">
					<!-- Swiper -->
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?php if(strstr($combined_stories_one, 'Architecture')): ?>
								<?php if( have_rows('architecture_project_slideshow') ): while( have_rows('architecture_project_slideshow') ): the_row(); ?>
									<?php include 'project-story-slides/project-story-slides.php'; ?>
								<?php endwhile; endif; // if( get_field('architecture_project_slideshow') ): ?>
							<?php endif; ?>
							<?php if(strstr($combined_stories_one, 'Interior')): ?>
								<?php if(  have_rows('interior_project_content') ): while( have_rows('interior_project_content') ): the_row(); if(  have_rows('interior_project_slideshow') ): while( have_rows('interior_project_slideshow') ): the_row();  ?>
									<?php include 'project-story-slides/project-story-slides.php';?>
								<?php endwhile; endif; endwhile; endif; // if( get_field('architecture_project_slideshow') ): ?>
							<?php endif; ?>
							<?php if(strstr($combined_stories_one, 'Planning')): ?>
								<?php if(  have_rows('planning_project_content') ): while( have_rows('planning_project_content') ): the_row(); if(  have_rows('planning_project_slideshow') ): while( have_rows('planning_project_slideshow') ): the_row();  ?>
									<?php include 'project-story-slides/project-story-slides.php';?>
								<?php endwhile; endif; endwhile; endif; // if( get_field('architecture_project_slideshow') ): ?>
							<?php endif; ?>
							<?php if(strstr($combined_stories_one, 'Brand')): ?>
								<?php if(  have_rows('brand_project_content') ): while( have_rows('brand_project_content') ): the_row(); if(  have_rows('brand_project_slideshow') ): while( have_rows('brand_project_slideshow') ): the_row();  ?>
									<?php include 'project-story-slides/project-story-slides.php';?>
								<?php endwhile; endif; endwhile; endif; // if( get_field('architecture_project_slideshow') ): ?>
							<?php endif; ?>
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
					<p class="two_col"><?php echo $projectstorycontent; ?></p>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
		<?php endif; // if( get_field('architecture_project_content') ): ?>
	</div>
	<?php endif; ?>
	<?php endif; ?>
	
	
	<?php if(strstr($_SERVER['REQUEST_URI'], 'planning') == false ): ?>
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
			<h5>Planning Story</h5>
			<h2><?php echo $projectstorytitle; ?></h2>
			<div class="project_story_content toggle_item_wrap">
				<div class="toggle_text">
	            	<span class="expando_icon"></span>
                </div>
				<div class="toggled_text project_selected_discipline">
					<!-- Swiper -->
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
					<p class="two_col"><?php echo $projectstorycontent; ?></p>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
		<?php endif; // if( get_field('planning_project_content') ): ?>
	</div>
	<?php endif; ?>
	<?php endif; ?>
	
	<?php if(strstr($_SERVER['REQUEST_URI'], 'brand') == false ): ?>	
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
			<h5>Brand Story</h5>
			<h2><?php echo $projectstorytitle; ?></h2>
			<div class="project_story_content toggle_item_wrap">
				<div class="toggle_text">
	            	<span class="expando_icon"></span>
                </div>
				<div class="toggled_text project_selected_discipline">
					<!-- Swiper -->
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
					<p class="two_col"><?php echo $projectstorycontent; ?></p>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
		<?php endif; // if( get_field('brand_project_content') ): ?>
	</div>
	<?php endif; ?>
	<?php endif; ?>
	<div class="row">
		<div class="col-12">
			<hr>
		</div>
	</div>
</div>
