<?php
/**
 * Template Name: Top Projects Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */


get_header();

if(strstr($_SERVER['REQUEST_URI'], 'oregon') == true){ 
		$locationCategory = '+Portland';
	} elseif(strstr($_SERVER['REQUEST_URI'], 'washington') == true){
		$locationCategory = '+Seattle';	
	} elseif(strstr($_SERVER['REQUEST_URI'], 'california') == true){ 
		$locationCategory = '+San Francisco';
	} else {
		$locationCategory = '';
	} 
	 
	if(strstr($_SERVER['REQUEST_URI'], 'architecture') == true){ 
		$disciplineCategory = '+Architecture';
		$selectedDisciplineContent = 'architecture_project_content';
		$selectedDisciplineHeroImages = 'architecture_project_slideshow';
		$selectedDisciplineHeroImagesSize = 'medium';
		$sectorheroImageDiscipline = 'slide_two';
	} elseif(strstr($_SERVER['REQUEST_URI'], 'interiors') == true){ 
		$disciplineCategory = '+Interiors';
		$selectedDisciplineContent = 'interior_project_content';
		$selectedDisciplineHeroImages = 'interior_project_slideshow';
		$selectedDisciplineHeroImagesSize = 'medium';
		$sectorheroImageDiscipline = 'slide_three';
	} elseif(strstr($_SERVER['REQUEST_URI'], 'planning') == true){ 
		$disciplineCategory = '+Planning';
		$selectedDisciplineContent = 'planning_project_content';
		$selectedDisciplineHeroImages = 'planning_project_slideshow';
		$selectedDisciplineHeroImagesSize = 'medium';
		$sectorheroImageDiscipline = 'slide_four';
	} elseif(strstr($_SERVER['REQUEST_URI'], 'brand') == true){
		$disciplineCategory = '+Brand';
		$selectedDisciplineContent = 'brand_project_content';
		$selectedDisciplineHeroImages = 'brand_project_slideshow';
		$selectedDisciplineHeroImagesSize = 'medium';
		$sectorheroImageDiscipline = 'slide_five';
	} else {
		$disciplineCategory = '';
		$selectedDisciplineHeroImages = 'top_page_slidershow';
		$selectedDisciplineHeroImagesSize = 'image';
		$sectorheroImageDiscipline = 'slide_one';
	}
	
	if(strstr($_SERVER['REQUEST_URI'], 'housing') == true){ 
		$sectorCategory = '+Housing';
	} elseif(strstr($_SERVER['REQUEST_URI'], 'office') == true){ 
		$sectorCategory = '+Office';
	} elseif(strstr($_SERVER['REQUEST_URI'], 'senior-communities') == true){ 
		$sectorCategory = '+Senior Communities';
	} elseif(strstr($_SERVER['REQUEST_URI'], 'healthcare') == true){
		$sectorCategory = '+Healthcare';
	} elseif(strstr($_SERVER['REQUEST_URI'], 'higher-education') == true){ 
		$sectorCategory = '+Higher Education';
	} elseif(strstr($_SERVER['REQUEST_URI'], 'hospitality') == true){ 
		$sectorCategory = '+Hospitality';
	} elseif(strstr($_SERVER['REQUEST_URI'], 'retail') == true){ 
		$sectorCategory = '+Retail';
	} elseif(strstr($_SERVER['REQUEST_URI'], 'community') == true){
		$sectorCategory = '+Community';
	} else {
		$sectorCategory = '';
	}
	
	$currentCategory = $post->post_title;
?>

<div class="hero_sector_wrapper">
	<?php if( have_rows('top_page_slidershow') ){ while( have_rows('top_page_slidershow') ){ the_row(); ?>
	<?php $sectorherotitle = get_sub_field('sector_title'); $sectorherotypetitle = get_sub_field('sector_type_title'); ?>
	<?php if( have_rows($sectorheroImageDiscipline) ){ while( have_rows($sectorheroImageDiscipline) ){ the_row(); ?>
	<?php   $sectorheroImage = get_sub_field('image'); ?>
	<div class="hero_sector_image_wrap">
		
		<div class="hero_image <?php echo $selectedDisciplineContent; ?> <?php echo strtolower(str_replace(' ', '_', $currentCategory)); ?>" style="background-image: url(<?php echo $sectorheroImage; ?>);"></div>
		<div class="shimmer tumb_loading"></div>
		<div class="container hero_title">
			<div class="row">
				<div class="col-12">
					<h1><?php if($sectorherotitle){?><span class="sector_title"><?php echo $sectorherotitle; ?></span><?php } ?><?php if($sectorherotypetitle){?> / <?php echo $sectorherotypetitle; ?><?php } ?></h1>
				</div>
			</div>
		</div>
	</div>
	<?php } } // if( get_field($sectorheroImageDiscipline) ){ ?>
	<?php } } // if( get_field('top_page_slidershow') ){ ?>
</div>


<div class="container sector_top_content">
	<div class="row">
		<div class="col-lg-7 col-md-12 toggle_wrapper">
			<?php while ( have_posts() ) { the_post(); 
			// check for rows (parent repeater)
			if( have_rows('top_project_content') ){ ?>
			<?php while( have_rows('top_project_content') ){ the_row(); 
				$topsectortitle = get_sub_field('sector_subtitle');
				$topsectorcontent = get_sub_field('project_content');
			?>
			<h2><?php echo $topsectortitle; ?></h2>
			<p><?php echo $topsectorcontent; ?></p>
			<?php } // end of the loop. ?>
			<?php } // if( get_field('top_project_content') ){ ?>
			<?php } // end of the loop. ?>
		</div>
		<div class="col-lg-1 col-md-12"></div>
		<div class="col-lg-4 col-md-12 toggle_wrapper sector_sidebar">
			<?php if( have_rows('sector_sidebar') ){ ?>
			<?php while( have_rows('sector_sidebar') ){ the_row(); 
				$sectordownloadpdf = get_sub_field('sector_pdf');
			?>


			<?php //////////////////// PROJECT TYPES //////////////// ?>
			<h5>PROJECT TYPES:</h5>

			<?php
			// NEW METHOD - USE PROJECT TYPES FROM ACF
				if( have_rows('project_types') ) {
					echo '<ul>';
					while ( have_rows('project_types') ) { 
						the_row();
						$projectobject = get_sub_field('project_type');
						$projecttitle = $projectobject->post_title; //post title
						$projectURL = get_permalink($projectobject->ID); //URL
						$textonly = get_sub_field('text_only');
						if ($textonly == 'Yes') {
							echo '<li class="underline_link_wrap">' . $projecttitle . '</li>';
						} else {
							echo '<li class="underline_link_wrap"><a href="'.$projectURL.'">' . $projecttitle . '</a></li>';
						}
					}
					echo '</ul>';
				} else {
   

				$page_cats = array();
				if(have_posts()) { while(have_posts()) { the_post();
				    $cats = wp_get_post_categories($post->ID);
				    if($cats) { foreach($cats as $cat) { $category = get_category($cat);
				    array_push($page_cats, $category->name);
				    }}
				}}
				
				$comma_separated_cat = implode(", ", $page_cats);
				if($post->post_parent === 0){
					$parent_page_id = $post->ID;
					if(strstr($_SERVER['REQUEST_URI'], 'architecture') == true){ 
						$page_cat = 'Architecture';
					} elseif(strstr($_SERVER['REQUEST_URI'], 'interiors') == true){ 
						$page_cat = 'Interiors';
					} elseif(strstr($_SERVER['REQUEST_URI'], 'planning') == true){ 
						$page_cat = 'Planning';
					} elseif(strstr($_SERVER['REQUEST_URI'], 'brand') == true){ 
						$page_cat = 'Brand';
					} else {
						$page_cat = '"' . $comma_separated_cat . '"';
					}
				} else {
					$parent_page_id = $post->post_parent;
					if(strpos($comma_separated_cat, 'Interiors') !== false ){
						$page_cat = 'Interiors';
					} else {
						$page_cat = 'Architecture';
					}
				}
				
				$args = array(
				'order'          => 'DESC',
				'category_name'  => $page_cat,
				'post_parent'    => $parent_page_id,
				'post_type'      => 'page'
				);
				
				$the_query = new WP_Query( $args );
				 
				// The Loop
				if ( $the_query->have_posts() ) {
				    echo '<ul>';
				    while ( $the_query->have_posts() ) {
				        $the_query->the_post();
				        if( $parent_page_id === 209 || ($parent_page_id === 466 && strstr($_SERVER['REQUEST_URI'], 'interiors') == true) ){
					        echo '<li class="underline_link_wrap"><a class="" href="' .  get_the_permalink()  . '" class="underline_link">' . get_the_title() . '</a></li>';
				        } else {
					        echo '<li class="underline_link_wrap">' . get_the_title() . '</li>';
				        }
				        
				    }
				    echo '</ul>';
				} else {
				    // no posts found
				}

				}
			?>

			<?php //////////////////// END PROJECT TYPES //////////////// ?>

			<?php

				/* Restore original Post Data */
				wp_reset_postdata();  ?>
			<?php if( have_rows('sector_facts') ){ ?>
			<?php while( have_rows('sector_facts') ){ the_row(); 
				$sectorfactone = get_sub_field('fact_one');
				$sectorfacttwo = get_sub_field('fact_two');
				$sectorfactthree = get_sub_field('fact_three');
				$sectorfactfour = get_sub_field('fact_four');
				$sectorlink1 = get_sub_field('link_1');
				$sectorlink2 = get_sub_field('link_2');
				$sectorlink3 = get_sub_field('link_3');
				$sectorlink4 = get_sub_field('link_4');
			?>
			<?php if($sectorfactone || $sectorfacttwo || $sectorfactthree){?>
			<h5>FAST FACTS:</h5>
			<ul>
				<?php if($sectorfactone){?><li><bold><?php echo $sectorfactone; ?></bold> PROJECTS</li><?php }?>
				<?php if($sectorfacttwo){?><li><bold><?php echo $sectorfacttwo; ?></bold> CITIES</li><?php }?>
				<?php if($sectorfactthree){?><li><bold><?php echo $sectorfactthree; ?></bold> STATES</li><?php }?>
				<?php if ($sectorfactfour) { ?>
					<li class="factfour"><?php echo $sectorfactfour; ?></li>
				<?php } ?>
			</ul>
			<?php } ?>
			
			<ul class="underline_link_wrap">
			<?php if ($sectorlink1) { ?>
			<li class="link1"><?php echo $sectorlink1; ?></li>
			<?php } ?>

			<?php if ($sectorlink2) { ?>
			<li class="link2"><?php echo $sectorlink2; ?></li>
			<?php } ?>

			<?php if ($sectorlink3) { ?>
			<li class="link3"><?php echo $sectorlink3; ?></li>
			<?php } ?>

			<?php if ($sectorlink4) { ?>
			<li class="link4"><?php echo $sectorlink4; ?></li>
			<?php } ?>


			<?php } // end of the loop. ?>
			<?php } // if( get_field('sector_facts') ){ ?>



<?php ///////////////////////// SECTOR LINKS /////////////////////////// ?>


			<?php if( have_rows('sector_links') ){ ?>
			<?php while( have_rows('sector_links') ){ the_row(); 
				$sectorlink = get_sub_field('sector_link_repeater'); ?>
				<li class="link1"><?php echo $sectorlink; ?></li>
			<?php } ?>
			<?php } ?>

			</ul>
<?php ///////////////////////// END SECTOR LINKS /////////////////////////// ?>


			<?php } // end of the loop. ?>
			<?php } // if( get_field('sector_sidebar') ){ ?>








	
		</div>
	</div>
</div>

<div id="market_sector_map_wrap" class="col-12">

	<div class="close_project_list_btn">
		<img src="<?php echo get_template_directory_uri() . '/assets/images/SVG/close.svg'; ?>"/>
	</div>
	<div id='map4'></div>
</div>

<?php

	if(strstr($_SERVER['REQUEST_URI'], 'architecture') == true){ 
	  	$featured_posts = array(get_field('architecture_projects'));
	} elseif(strstr($_SERVER['REQUEST_URI'], 'interiors') == true){ 
		$featured_posts = array(get_field('interior_projects'));
	} else { 
		$featured_posts = array(get_field('interior_projects'), get_field('architecture_projects'));
	}
	$postWithDiscipline = array(); 

	if(count($featured_posts) == 1 && $featured_posts[0] !== NULL){
  		foreach( $featured_posts[0] as $featured_post ){
  	    	$postCategories = get_the_terms( $featured_post->ID, 'portfolio_category' );
  	    	foreach( $postCategories as $postCategory ) { 
  		      	if($disciplineCategory !== ''){
  		  		    if(str_replace('+', '', $disciplineCategory) == $postCategory->name){
  		  		    	array_push($postWithDiscipline, $featured_post);
  		  		    }
  		  		} else {
  			  		array_push($postWithDiscipline, $featured_post);
  		  		}
  		  	};
  		}
  	}
  	if(count($featured_posts) == 2 && $featured_posts[1] !== NULL){
  		foreach( $featured_posts[1] as $featured_post ){
  	    	$postCategories = get_the_terms( $featured_post->ID, 'portfolio_category' );
  	    	foreach( $postCategories as $postCategory ) { 
  		      	if($disciplineCategory !== ''){
  		  		    if(str_replace('+', '', $disciplineCategory) == $postCategory->name){
  		  		    	array_push($postWithDiscipline, $featured_post);
  		  		    }
  		  		} else {
  					array_push($postWithDiscipline, $featured_post);
  		  		}
  		  	};
  		}  	
	}
	$filetered_projects =  array_map("unserialize", array_unique(array_map("serialize", $postWithDiscipline)));
	$projects_with_disc = array();
	if(count($filetered_projects) > 0){
		foreach( $filetered_projects as $project ){
			array_push($projects_with_disc, $project);
		}
	}
?>
	
<!-- Grid Project -->
<?php if(count($projects_with_disc) > 0){ ?>
<div class="container grid_project_wrap project_toggle_wrapper closed individual_project">
	<div class="row project_wrap">
	<?php foreach( $projects_with_disc as $post_discipline ){ 
		//if($post_discipline->ID != $projects_with_disc[0]->ID && $post_discipline->ID != $projects_with_disc[1]->ID){ 
		if (true) {
			?>
	<?php 	$postLink = get_permalink( $post_discipline->ID );
      		$postTitle = get_the_title( $post_discipline->ID );?>
		<div class="col-lg-6 col-md-12 hover_arrow_story individual_project">
			<div class="story_image">
				<?php if($selectedDisciplineContent){ ?>
				<?php if( have_rows($selectedDisciplineContent, $post_discipline->ID ) ){ while( have_rows($selectedDisciplineContent, $post_discipline->ID ) ){ the_row(); ?>
				<?php if( have_rows($selectedDisciplineHeroImages, $post_discipline->ID ) ){ while( have_rows($selectedDisciplineHeroImages, $post_discipline->ID ) ){ the_row(); ?> 
				<?php if( have_rows('slide_one', $post_discipline->ID ) ){ while( have_rows('slide_one', $post_discipline->ID ) ){ the_row(); 
				$projectslideone = get_sub_field($selectedDisciplineHeroImagesSize, $post_discipline->ID ); ?> 
				<a href="<?php echo $postLink; ?>">
					<div class="project-center-cropped" style="background-image: url(<?php echo $projectslideone; ?>);"></div>
					<div class="shimmer tumb_loading"></div>
				</a>
				<?php } } // if( get_field('slide_one') ){ ?>
				<?php } } // if( get_field('top_page_slidershow') ){ ?>
				<?php } } // if( get_field('top_page_slidershow') ){ ?>
				<?php } else { ?>
				<?php if( have_rows($selectedDisciplineHeroImages, $post_discipline->ID ) ){ while( have_rows($selectedDisciplineHeroImages, $post_discipline->ID ) ){ the_row(); ?> 
				<?php if( have_rows('slide_one', $post_discipline->ID ) ){ while( have_rows('slide_one', $post_discipline->ID ) ){ the_row(); 
				$projectslideone = get_sub_field($selectedDisciplineHeroImagesSize, $post_discipline->ID ); ?> 
				<a href="<?php echo $postLink; ?>">
					<div class="project-center-cropped" style="background-image: url(<?php echo $projectslideone; ?>);"></div>
					<div class="shimmer tumb_loading"></div>
				</a>
				<?php } } // if( get_field('slide_one') ){ ?>
				<?php } } // if( get_field('top_page_slidershow') ){ ?>
				<?php } ?>
			</div>
			<div class="project_content_wrap">
				<?php if( have_rows('top_project_content', $post_discipline->ID ) ){ ?>
				<?php while( have_rows('top_project_content', $post_discipline->ID ) ){ the_row(); 
					$topprojecttitle = get_sub_field('project_subtitle', $post_discipline->ID );
					$topprojectcontent = get_sub_field('project_content', $post_discipline->ID );
				?>
				<div class="row d-lg-flex">
					<div class="col-md-10 col-sm-12">
						<div class="d-lg-block">
							<h3 class="shimmer"><a href="<?php echo $postLink; ?>"><?php echo $postTitle; ?></a></h3>
							<h4><a href="<?php echo $postLink; ?>"><?php echo $topprojecttitle; ?></a></h4>
						</div>
					</div>
					<div class="col-md-2 col-sm-12 arrow_wrap">
						<a href="<?php echo $postLink; ?>">
    						<div id="cta_arrow">
    							<span class="arrow_right primera black"></span>
    							<span class="arrow_right segunda black"></span>
    						</div>
						</a>
					</div>
				</div>
				<?php } // end of the loop. ?>
				<?php } // if( get_field('top_project_content') ){ ?>
			</div>
		</div>
		<?php } ?>
		<?php } ?>
	</div>

</div>
<?php } ?>





<?php get_footer(); ?>
