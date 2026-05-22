<div class="project_slider">
	<!-- Swiper -->
	<div class="swiper-container container top_project_slider">
		<!-- If No Discipline Selected -->
		<?php if(strstr($_SERVER['REQUEST_URI'], '?architecture') == false && strstr($_SERVER['REQUEST_URI'], '?interior') == false && strstr($_SERVER['REQUEST_URI'], '?planning') == false && strstr($_SERVER['REQUEST_URI'], '?brand') == false ): ?>
		<div class="swiper-wrapper">
			<?php if( have_rows('top_page_slidershow') ): while( have_rows('top_page_slidershow') ): the_row();?>
				<?php include 'template-parts/project-story-slides/project-top-slides-no-discipline.php';?>
			<?php endwhile; endif; // if( get_field('top_page_slidershow') ): ?>
		</div>
		<?php endif; ?>

		<!-- If Architecture Discipline Selected -->
		<?php if(strstr($_SERVER['REQUEST_URI'], '?architecture') == true ): ?>
		<div class="swiper-wrapper">
			<?php if($combined_stories_1 && strstr($combined_stories_one, 'Architecture')): ?>
				<?php if(strstr($combined_stories_one, 'Architecture')): ?>
					<?php if(  have_rows('architecture_project_content') ): while( have_rows('architecture_project_content') ): the_row(); if(  have_rows('architecture_project_slideshow') ): while( have_rows('architecture_project_slideshow') ): the_row();  ?>
						<?php include 'template-parts/project-story-slides/project-top-slides-with-discipline.php';?>
					<?php endwhile; endif; endwhile; endif;  // if( get_field('architecture_project_slideshow') ): ?>
				<?php elseif(strstr($combined_stories_one, 'Interior')): ?>
					<?php if(  have_rows('interior_project_content') ): while( have_rows('interior_project_content') ): the_row(); if(  have_rows('interior_project_slideshow') ): while( have_rows('interior_project_slideshow') ): the_row();  ?>
						<?php include 'template-parts/project-story-slides/project-top-slides-with-discipline.php';?>
					<?php endwhile; endif; endwhile; endif; // if( get_field('architecture_project_slideshow') ): ?>
				<?php elseif(strstr($combined_stories_one, 'Planning')): ?>
					<?php if(  have_rows('planning_project_content') ): while( have_rows('planning_project_content') ): the_row(); if(  have_rows('planning_project_slideshow') ): while( have_rows('planning_project_slideshow') ): the_row();  ?>
						<?php include 'template-parts/project-story-slides/project-top-slides-with-discipline.php';?>
					<?php endwhile; endif; endwhile; endif; // if( get_field('architecture_project_slideshow') ): ?>
				<?php elseif(strstr($combined_stories_one, 'Brand')): ?>
					<?php if(  have_rows('brand_project_content') ): while( have_rows('brand_project_content') ): the_row(); if(  have_rows('brand_project_slideshow') ): while( have_rows('brand_project_slideshow') ): the_row();  ?>
						<?php include 'template-parts/project-story-slides/project-top-slides-with-discipline.php';?>
					<?php endwhile; endif; endwhile; endif; // if( get_field('architecture_project_slideshow') ): ?>
				<?php endif; ?>
			<?php else: ?>
					<?php if(  have_rows('architecture_project_content') ): while( have_rows('architecture_project_content') ): the_row(); if(  have_rows('architecture_project_slideshow') ): while( have_rows('architecture_project_slideshow') ): the_row();  ?>
						<?php include 'template-parts/project-story-slides/project-top-slides-with-discipline.php';?>
					<?php endwhile; endif; endwhile; endif;  // if( get_field('architecture_project_slideshow') ): ?>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<!-- If Interior Discipline Selected -->
		<?php if(strstr($_SERVER['REQUEST_URI'], '?interior') == true ): ?>
		<div class="swiper-wrapper">
			<?php if($combined_stories_1 && strstr($combined_stories_one, 'Interior')): ?>
				<?php if(strstr('Interior', $combined_stories_one)): ?>
					<?php if(  have_rows('interior_project_content') ): while( have_rows('interior_project_content') ): the_row(); if(  have_rows('interior_project_slideshow') ): while( have_rows('interior_project_slideshow') ): the_row();  ?>
						<?php include 'template-parts/project-story-slides/project-top-slides-with-discipline.php';?>
					<?php endwhile; endif; endwhile; endif; // if( get_field('architecture_project_slideshow') ): ?>
				<?php elseif(strstr($combined_stories_one, 'Architecture')): ?>
					<?php if(  have_rows('architecture_project_content') ): while( have_rows('architecture_project_content') ): the_row(); if(  have_rows('architecture_project_slideshow') ): while( have_rows('architecture_project_slideshow') ): the_row();  ?>
						<?php include 'template-parts/project-story-slides/project-top-slides-with-discipline.php';?>
					<?php endwhile; endif; endwhile; endif;  // if( get_field('architecture_project_slideshow') ): ?>
				<?php elseif(strstr($combined_stories_one, 'Planning')): ?>
					<?php if(  have_rows('planning_project_content') ): while( have_rows('planning_project_content') ): the_row(); if(  have_rows('planning_project_slideshow') ): while( have_rows('planning_project_slideshow') ): the_row();  ?>
						<?php include 'template-parts/project-story-slides/project-top-slides-with-discipline.php';?>
					<?php endwhile; endif; endwhile; endif; // if( get_field('architecture_project_slideshow') ): ?>
				<?php elseif(strstr($combined_stories_one, 'Brand')): ?>
					<?php if(  have_rows('brand_project_content') ): while( have_rows('brand_project_content') ): the_row(); if(  have_rows('brand_project_slideshow') ): while( have_rows('brand_project_slideshow') ): the_row();  ?>
						<?php include 'template-parts/project-story-slides/project-top-slides-with-discipline.php';?>
					<?php endwhile; endif; endwhile; endif; // if( get_field('architecture_project_slideshow') ): ?>
				<?php endif; ?>
			<?php else: ?>
					<?php if(  have_rows('interior_project_content') ): while( have_rows('interior_project_content') ): the_row(); if(  have_rows('interior_project_slideshow') ): while( have_rows('interior_project_slideshow') ): the_row();  ?>
						<?php include 'template-parts/project-story-slides/project-top-slides-with-discipline.php';?>
					<?php endwhile; endif; endwhile; endif; // if( get_field('architecture_project_slideshow') ): ?>
			<?php endif; ?>
		</div>
		<?php endif; ?>


		<!-- If Planning Discipline Selected -->
		<?php if(strstr($_SERVER['REQUEST_URI'], '?planning') == true ): ?>
		<div class="swiper-wrapper">
			<?php if($combined_stories_1 && strstr($combined_stories_one, 'Planning')): ?>
				<?php if(strstr('Planning', $combined_stories_one)): ?>
					<?php if(  have_rows('planning_project_content') ): while( have_rows('planning_project_content') ): the_row(); if(  have_rows('planning_project_slideshow') ): while( have_rows('planning_project_slideshow') ): the_row();  ?>
						<?php include 'template-parts/project-story-slides/project-top-slides-with-discipline.php';?>
					<?php endwhile; endif; endwhile; endif; // if( get_field('architecture_project_slideshow') ): ?>
				<?php elseif(strstr($combined_stories_one, 'Architecture')): ?>
					<?php if(  have_rows('architecture_project_content') ): while( have_rows('architecture_project_content') ): the_row(); if(  have_rows('architecture_project_slideshow') ): while( have_rows('architecture_project_slideshow') ): the_row();  ?>
						<?php include 'template-parts/project-story-slides/project-top-slides-with-discipline.php';?>
					<?php endwhile; endif; endwhile; endif;  // if( get_field('architecture_project_slideshow') ): ?>
				<?php elseif(strstr($combined_stories_one, 'Interior')): ?>
					<?php if(  have_rows('interior_project_content') ): while( have_rows('interior_project_content') ): the_row(); if(  have_rows('interior_project_slideshow') ): while( have_rows('interior_project_slideshow') ): the_row();  ?>
						<?php include 'template-parts/project-story-slides/project-top-slides-with-discipline.php';?>
					<?php endwhile; endif; endwhile; endif; // if( get_field('architecture_project_slideshow') ): ?>				
				<?php elseif(strstr($combined_stories_one, 'Brand')): ?>
					<?php if(  have_rows('brand_project_content') ): while( have_rows('brand_project_content') ): the_row(); if(  have_rows('brand_project_slideshow') ): while( have_rows('brand_project_slideshow') ): the_row();  ?>
						<?php include 'template-parts/project-story-slides/project-top-slides-with-discipline.php';?>
					<?php endwhile; endif; endwhile; endif; // if( get_field('architecture_project_slideshow') ): ?>
				<?php endif; ?>
			<?php else: ?>
					<?php if(  have_rows('planning_project_content') ): while( have_rows('planning_project_content') ): the_row(); if(  have_rows('planning_project_slideshow') ): while( have_rows('planning_project_slideshow') ): the_row();  ?>
						<?php include 'template-parts/project-story-slides/project-top-slides-with-discipline.php';?>
					<?php endwhile; endif; endwhile; endif; // if( get_field('architecture_project_slideshow') ): ?>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<!-- If Planning Discipline Selected -->
		<?php if(strstr($_SERVER['REQUEST_URI'], '?brand') == true ): ?>
		<div class="swiper-wrapper">
			<?php if($combined_stories_1 && strstr($combined_stories_one, 'Brand')): ?>
				<?php if(strstr('Brand', $combined_stories_one)): ?>
					<?php if(  have_rows('brand_project_content') ): while( have_rows('brand_project_content') ): the_row(); if(  have_rows('brand_project_slideshow') ): while( have_rows('brand_project_slideshow') ): the_row();  ?>
						<?php include 'template-parts/project-story-slides/project-top-slides-with-discipline.php';?>
					<?php endwhile; endif; endwhile; endif; // if( get_field('architecture_project_slideshow') ): ?>
				<?php elseif(strstr($combined_stories_one, 'Architecture')): ?>
					<?php if(  have_rows('architecture_project_content') ): while( have_rows('architecture_project_content') ): the_row(); if(  have_rows('architecture_project_slideshow') ): while( have_rows('architecture_project_slideshow') ): the_row();  ?>
						<?php include 'template-parts/project-story-slides/project-top-slides-with-discipline.php';?>
					<?php endwhile; endif; endwhile; endif;  // if( get_field('architecture_project_slideshow') ): ?>
				<?php elseif(strstr($combined_stories_one, 'Interior')): ?>
					<?php if(  have_rows('interior_project_content') ): while( have_rows('interior_project_content') ): the_row(); if(  have_rows('interior_project_slideshow') ): while( have_rows('interior_project_slideshow') ): the_row();  ?>
						<?php include 'template-parts/project-story-slides/project-top-slides-with-discipline.php';?>
					<?php endwhile; endif; endwhile; endif; // if( get_field('architecture_project_slideshow') ): ?>
				<?php elseif(strstr($combined_stories_one, 'Planning')): ?>
					<?php if(  have_rows('planning_project_content') ): while( have_rows('planning_project_content') ): the_row(); if(  have_rows('planning_project_slideshow') ): while( have_rows('planning_project_slideshow') ): the_row();  ?>
						<?php include 'template-parts/project-story-slides/project-top-slides-with-discipline.php';?>
					<?php endwhile; endif; endwhile; endif; // if( get_field('architecture_project_slideshow') ): ?>
				<?php endif; ?>
			<?php else: ?>
					<?php if(  have_rows('brand_project_content') ): while( have_rows('brand_project_content') ): the_row(); if(  have_rows('brand_project_slideshow') ): while( have_rows('brand_project_slideshow') ): the_row();  ?>
						<?php include 'template-parts/project-story-slides/project-top-slides-with-discipline.php';?>
					<?php endwhile; endif; endwhile; endif; // if( get_field('architecture_project_slideshow') ): ?>
			<?php endif; ?>
		</div>
		<?php endif; ?>
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
					<h1><?php echo $post->post_title; ?></h1>
				</div>
		</div>
	</div>
	<div class="shimmer tumb_loading"></div>
	
</div>
