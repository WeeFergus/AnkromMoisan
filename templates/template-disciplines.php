<?php
/**
 * Template Name: Discipline Page
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();

	if(strstr($_SERVER['REQUEST_URI'], 'architecture') == true){ 
        $selectedDiscipline = 'Architecture';
		$disciplineCategory = '+Architecture';
		$selectedDisciplineContent = 'architecture_project_content';
		$selectedDisciplineHeroImages = 'architecture_project_slideshow';
		$selectedDisciplineHeroImagesSize = 'medium';
		$sectorheroImageDiscipline = 'slide_two';
	} elseif(strstr($_SERVER['REQUEST_URI'], 'interiors') == true){ 
		$selectedDiscipline = 'Interiors';
		$disciplineCategory = '+Interiors';
		$selectedDisciplineContent = 'interior_project_content';
		$selectedDisciplineHeroImages = 'interior_project_slideshow';
		$selectedDisciplineHeroImagesSize = 'medium';
		$sectorheroImageDiscipline = 'slide_three';
	} elseif(strstr($_SERVER['REQUEST_URI'], 'planning') == true){ 
		$selectedDiscipline = 'Planning';
		$disciplineCategory = '+Planning';
		$selectedDisciplineContent = 'planning_project_content';
		$selectedDisciplineHeroImages = 'planning_project_slideshow';
		$selectedDisciplineHeroImagesSize = 'medium';
		$sectorheroImageDiscipline = 'slide_four';
	} elseif(strstr($_SERVER['REQUEST_URI'], 'brand') == true){
		$selectedDiscipline = 'Brand';
		$disciplineCategory = '+Brand';
		$selectedDisciplineContent = 'brand_project_content';
		$selectedDisciplineHeroImages = 'brand_project_slideshow';
		$selectedDisciplineHeroImagesSize = 'medium';
		$sectorheroImageDiscipline = 'slide_five';
	} else{  // default to architecture
        $selectedDiscipline = '';
		$disciplineCategory = '+Architecture';
		$selectedDisciplineContent = 'architecture_project_content';
		$selectedDisciplineHeroImages = 'architecture_project_slideshow';
		$selectedDisciplineHeroImagesSize = 'medium';
		$sectorheroImageDiscipline = 'slide_two';
	}
	
	

	
?>

<div class="hero_discipline_wrapper">
	<?php if( have_rows('top_page_slidershow') ){ while( have_rows('top_page_slidershow') ){ the_row(); 
		  if( have_rows('slide_one') ){ while( have_rows('slide_one') ){ the_row(); 
			$disciplineheroimage = get_sub_field('image');
		?>
	<div class="hero_discipline_image_wrap">
		<div class="hero_image" style="background-image: url(<?php echo $disciplineheroimage; ?>);"></div>
		<div class="shimmer tumb_loading"></div>
		<div class="container hero_title">
			<div class="row">
				<div class="col-12">
					<h1 class="header"><?php echo $post->post_title; ?></h1>
				</div>
			</div>
		</div>
	</div>
	<?php } } // end of the loop. ?>
	<?php } } // end of the loop. ?>
</div>

<div class="container discipline_top_content">
	<div class="row">
		<div class="col-12">
			<?php if( have_rows('top_page_slidershow') ){ while( have_rows('top_page_slidershow') ){ the_row(); 
				$disciplineherotitle = get_sub_field('title'); ?>
			<?php if($disciplineherotitle){?>
			<h1><?php echo $disciplineherotitle; ?></h1>
			<?php } ?>
			<?php } } // end of the loop. ?>
			<?php $discipline_top_content = get_field('top_project_content'); ?>
			<p><?php echo $discipline_top_content['project_content']; ?></p>
			<?php $discipline_benefits = get_field('discipline_benefits');
				$benefitonetitle = $discipline_benefits['benefit_one']['title'];
				$benefittwotitle = $discipline_benefits['benefit_two']['title'];
				$benefitthreetitle = $discipline_benefits['benefit_three']['title'];
				$benefitfourtitle = $discipline_benefits['benefit_four']['title'];
				$havebenefits = false;
				if (($benefitonetitle!='') || ($benefittwotitle!='') || ($benefitthreetitle!='') || ($benefitfourtitle!='')) {
					$havebenefits = true;
				}
			?>
			<?php if ($havebenefits) { ?>
			<?php //if( have_rows('discipline_benefits') ){ ?>
			<div class="sector_content">
				<div class="discipline_benefits">
					<?php while( have_rows('discipline_benefits') ){ the_row(); ?>
					<div class="row">
						<div class="col-lg-6 col-md-12">
							<?php if( have_rows('benefit_one') ){ ?>
							<?php while( have_rows('benefit_one') ){ the_row(); 
								$benifitonetitle = get_sub_field('title');
								$benifitonecontent = get_sub_field('content');
							?>
							<h4><?php echo $benifitonetitle; ?></h4>
							<p><?php echo $benifitonecontent; ?></p>
							<?php } // end of the loop. ?>
							<?php } // if( get_field('benefit_one') ){ ?>
						</div>
						<div class="col-lg-6 col-md-12">
							<?php if( have_rows('benefit_two') ){ ?>
							<?php while( have_rows('benefit_two') ){ the_row(); 
								$benifittwotitle = get_sub_field('title');
								$benifittwocontent = get_sub_field('content');
							?>
							<h4><?php echo $benifittwotitle; ?></h4>
							<p><?php echo $benifittwocontent; ?></p>
							<?php } // end of the loop. ?>
							<?php } // if( get_field('benefit_two') ){ ?>
						</div>
						<div class="col-lg-6 col-md-12">
							<?php if( have_rows('benefit_three') ){ ?>
							<?php while( have_rows('benefit_three') ){ the_row(); 
								$benifitthreetitle = get_sub_field('title');
								$benifitthreecontent = get_sub_field('content');
							?>
							<h4><?php echo $benifitthreetitle; ?></h4>
							<p><?php echo $benifitthreecontent; ?></p>
							<?php } // end of the loop. ?>
							<?php } // if( get_field('benefit_three') ){ ?>
						</div>
						<div class="col-lg-6 col-md-12">
							<?php if( have_rows('benefit_four') ){ ?>
							<?php while( have_rows('benefit_four') ){ the_row(); 
								$benifitfourtitle = get_sub_field('title');
								$benifitfourcontent = get_sub_field('content');
							?>
							<h4><?php echo $benifitfourtitle; ?></h4>
							<p><?php echo $benifitfourcontent; ?></p>
							<?php } // end of the loop. ?>
							<?php } // if( get_field('benefit_four') ){ ?>
						</div>
					</div>
					<?php } // end of the loop. ?>
				</div>
			</div>
					<?php } // if( get_field('discipline_benefits') ){ ?>
		</div>
	</div>
</div>

<?php
////////////////////////////// GRID //////////////////////////////////

// get grid array
$grid_array = array();
while( have_rows('page_grid') ) { the_row();
	$images = get_sub_field("grid_images");
		while( have_rows('grid_images') ) { the_row();
        $grid_image = get_sub_field('grid_image');
        $grid_caption = get_sub_field('grid_caption');
        $grid_link = get_sub_field('grid_link');
				$grid_array[] = array('image'=>$grid_image,'caption'=>$grid_caption,'link'=>$grid_link);
		}
}
?>

<div class="container grid_project_wrap toggle_wrapper marketsector_grid">

	<div class="row project_wrap">

<?php

foreach($grid_array as $grid){
?>
<div class="col-lg-4 col-md-12 hover_arrow_story">
			<div class="story_image">
				<a class="market_sector_link" href="<?php echo $grid['link']; ?>">

					<div class="project-center-cropped" style="background-image: url(<?php echo $grid['image']; ?>);"></div>
					<div class="shimmer tumb_loading"></div>
				</a>
				<div class="row d-lg-flex">
					<div class="col-10">
						<div class="d-lg-block">
							<h2 class="shimmer"><a href="<?php echo $grid['link'];?>"><bold><?php echo strtoupper($grid['caption']); ?></bold></a></h2>								
						</div>
					</div>
					<div class="col-2 arrow_wrap">
						<a href="<?php echo $grid['link'];?>" class="market_sector_arrow_link">
    						<div id="cta_arrow">
    							<span class="arrow_right primera black"></span>
    							<span class="arrow_right segunda black"></span>
    						</div>
						</a>
					</div>
				</div>
				
			</div>
		</div>
<?php } ?>
	</div>
</div>

<br><br>
<?php

///////////////////////////// END GRID //////////////////////////////////
?>

<?php get_footer(); ?>
