<?php
/**
 * Template Name: Career Page
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();

if(strstr($_SERVER['REQUEST_URI'], 'oregon') == true): 
		$locationCategory = '+Portland';
	elseif(strstr($_SERVER['REQUEST_URI'], 'washington') == true):
		$locationCategory = '+Seattle';	
	elseif(strstr($_SERVER['REQUEST_URI'], 'california') == true): 
		$locationCategory = '+San Francisco';
	else:
		$locationCategory = '';
	endif; 
	 
	if(strstr($_SERVER['REQUEST_URI'], 'architecture') == true): 
		$disciplineCategory = '+Architecture';
		$selectedDisciplineContent = 'architecture_project_content';
		$selectedDisciplineHeroImages = 'architecture_project_slideshow';
		$selectedDisciplineHeroImagesSize = 'medium';
		$sectorheroImageDiscipline = 'slide_two';
	elseif(strstr($_SERVER['REQUEST_URI'], 'interiors') == true): 
		$disciplineCategory = '+Interiors';
		$selectedDisciplineContent = 'interior_project_content';
		$selectedDisciplineHeroImages = 'interior_project_slideshow';
		$selectedDisciplineHeroImagesSize = 'medium';
		$sectorheroImageDiscipline = 'slide_three';
	elseif(strstr($_SERVER['REQUEST_URI'], 'planning') == true): 
		$disciplineCategory = '+Planning';
		$selectedDisciplineContent = 'planning_project_content';
		$selectedDisciplineHeroImages = 'planning_project_slideshow';
		$selectedDisciplineHeroImagesSize = 'medium';
		$sectorheroImageDiscipline = 'slide_four';
	elseif(strstr($_SERVER['REQUEST_URI'], 'brand') == true):
		$disciplineCategory = '+Brand';
		$selectedDisciplineContent = 'brand_project_content';
		$selectedDisciplineHeroImages = 'brand_project_slideshow';
		$selectedDisciplineHeroImagesSize = 'medium';
		$sectorheroImageDiscipline = 'slide_five';
	else:
		$disciplineCategory = '';
		$selectedDisciplineHeroImages = 'top_page_slidershow';
		$selectedDisciplineHeroImagesSize = 'image';
		$sectorheroImageDiscipline = 'slide_one';
	endif;
	
	if(strstr($_SERVER['REQUEST_URI'], 'housing') == true): 
		$sectorCategory = '+Housing';
	elseif(strstr($_SERVER['REQUEST_URI'], 'office') == true): 
		$sectorCategory = '+Office';
	elseif(strstr($_SERVER['REQUEST_URI'], 'senior-communities') == true): 
		$sectorCategory = '+Senior Communities';
	elseif(strstr($_SERVER['REQUEST_URI'], 'healthcare') == true):
		$sectorCategory = '+Healthcare';
	elseif(strstr($_SERVER['REQUEST_URI'], 'higher-education') == true): 
		$sectorCategory = '+Higher Education';
	elseif(strstr($_SERVER['REQUEST_URI'], 'hospitality') == true): 
		$sectorCategory = '+Hospitality';
	elseif(strstr($_SERVER['REQUEST_URI'], 'retail') == true): 
		$sectorCategory = '+Retail';
	elseif(strstr($_SERVER['REQUEST_URI'], 'community') == true):
		$sectorCategory = '+Community';
	else:
		$sectorCategory = '';
	endif;
	
	$currentCategory = $post->post_title;
?>

<div class="hero_sector_wrapper">
	<?php $careerheroImage = get_field('career_hero_image'); ?>
	<div class="hero_sector_image_wrap">
		
		<div class="hero_image <?php echo $selectedDisciplineContent; ?> <?php echo strtolower(str_replace(' ', '_', $currentCategory)); ?>" style="background-image: url(<?php echo $careerheroImage; ?>);"></div>
		<div class="shimmer tumb_loading"></div>
		<div class="container hero_title">
			<div class="row">
				<div class="col-12">
					<h1 class="header"><?php echo $post->post_title; ?></h1>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="container sector_top_content">
	<div class="row">
		<div class="col-lg-10 col-md-12 text_block">
			<?php 
				$careertitle = get_field('career_subtitle');
				$careercontent = get_field('career_text');
				$careerbtntext = get_field('career_button_button_text');
				$careerbtnlink = get_field('career_button_button_link');
			?>
			<?php if($careertitle): ?>
			<h2><?php echo $careertitle; ?></h2>
			<?php endif; ?>
			<?php if($careercontent): ?>
			<?php echo $careercontent; ?>
			<?php endif; ?>
			<div class="btn full_width">
				<a class="row col-12" href="<?php echo $careerbtnlink; ?>" target="_blank">
					<h3><?php echo $careerbtntext; ?></h3>
				</a>
			</div>
		</div>
		<div class="col-lg-2 col-md-12"></div>
	</div>
</div>

<style>
.breadcrumbs {
	display: none !important;
}
</style>






<?php get_footer(); ?>

