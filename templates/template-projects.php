<?php
/**
 * Template Name: All Projects Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();?>
<?php if(strstr($_SERVER['REQUEST_URI'], 'oregon') == true): 
		$locationStateTitle = 'Oregon';
		$locationState = 'Portland';
	elseif(strstr($_SERVER['REQUEST_URI'], 'washington') == true):
		$locationStateTitle = 'Washington';
		$locationState = 'Seattle';
	elseif(strstr($_SERVER['REQUEST_URI'], 'california') == true):
		$locationStateTitle = 'California';
		$locationState = 'San Francisco';
	else:
		$locationStateTitle = '';
		$locationState = '';
	endif;
	
	?>

<div class="container no_slider_top_text_wrap">
	<div class="row">
		<div class="col-12">
			<h1><bold>All Our Projects<?php if($locationStateTitle): ?> in <?php echo $locationStateTitle; ?><?php endif; ?>.</bold></h1>
		</div>
	</div>
</div>

<!-- Full Width Project -->
<?php $args = array(
    'post_type' => 'portfolio_project',
    'post_status' => 'publish',
    'portfolio_category' => $locationState,
    'offset' => 0,
    'posts_per_page' => 200,
    'post__not_in' => array(get_the_ID()),
);

$arr_posts = new WP_Query( $args ); 
if ( $arr_posts->have_posts() ) :
while ( $arr_posts->have_posts() ) :
        $arr_posts->the_post(); ?>
<div class="full_width_project_wrap toggle_wrapper hover_arrow_story">
	<div class="row project_wrap hover_arrow_story">
		<div class="story_image col-12">
			<?php if( have_rows('top_page_slidershow') ): while( have_rows('top_page_slidershow') ): the_row(); ?>  
			<?php if( have_rows('slide_one') ): while( have_rows('slide_one') ): the_row(); 
				$projectslideone = get_sub_field('image'); ?>
			<a href="<?php the_permalink(); ?>">
				<div class="project-center-cropped" style="background-image: url(<?php echo $projectslideone; ?>);"></div>
				<div class="shimmer tumb_loading"></div>
			</a>
			<?php endwhile; endif; // if( get_field('slide_one') ): ?>
			<?php endwhile; endif; // if( get_field('top_page_slidershow') ): ?>
		</div>
		<div class="container project_content_wrap">
			<?php if( have_rows('top_project_content') ): ?>
			<?php while( have_rows('top_project_content') ): the_row(); 
				$topprojecttitle = get_sub_field('project_subtitle');
				$topprojectcontent = get_sub_field('project_content');
			?>
			<div class="row col-12 d-lg-flex">
				<div class="col-md-10 col-sm-12">
					<div class="d-lg-block">
						<h3 class="shimmer"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<h4><a href="<?php the_permalink(); ?>"><?php echo $topprojecttitle; ?></a></h4>
					</div>
				</div>
				<div class="col-md-2 col-sm-12 arrow_wrap">
					<a href="<?php the_permalink(); ?>">
    					<div id="cta_arrow">
    						<span class="arrow_right primera black"></span>
    						<span class="arrow_right segunda black"></span>
    					</div>
					</a>
				</div>
				<div class="col-12">
					<div class="toggle_item_wrap">
            			<div class="toggle_text">
                			<span class="expando_icon"></span>
            			</div>
            			<div class="toggled_text">
							<p class="two_col"><?php echo $topprojectcontent; ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php endwhile; // end of the loop. ?>
			<?php endif; // if( get_field('top_project_content') ): ?>
		</div>
	</div>
</div>
<?php endwhile; 
	else: ?>
<div class="container no_projects">
	<div class="row">
		<div class="col-12">
			<p>We don't have these types of projects at this location—yet.</p>
		</div>
	</div>
</div>
<?php endif; ?>




<?php get_footer(); ?>
