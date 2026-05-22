<?php
/**
 * Template Name: Sector Page
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();

$blogcategoriesarray = array();

if(strstr($_SERVER['REQUEST_URI'], 'oregon') == true){ 
		$locationCategory = '+Portland';
	} elseif(strstr($_SERVER['REQUEST_URI'], 'washington') == true){
		$locationCategory = '+Seattle';	
	} elseif(strstr($_SERVER['REQUEST_URI'], 'california') == true){ 
		$locationCategory = '+San Francisco';
	} else {
		$locationCategory = '';
	} 

	// remark out blogcategories that aren't in the blog_category list - then will show all blog posts
	$selectedDisciplineContent = '';

	$postlinksuffix = "";
	if(strstr($_SERVER['REQUEST_URI'], 'architecture') == true){ 
		$disciplineCategory = '+Architecture';
		$selectedDisciplineContent = 'architecture_project_content';
		$selectedDisciplineHeroImages = 'architecture_project_slideshow';
		$selectedDisciplineHeroImagesSize = 'medium';
		$sectorheroImageDiscipline = 'slide_two';
		$blogcategoriesarray[]= "arch";
		$postlinksuffix = "?architecture";
	} elseif(strstr($_SERVER['REQUEST_URI'], 'interiors') == true){ 
		$disciplineCategory = '+Interiors';
		$selectedDisciplineContent = 'interior_project_content';
		$selectedDisciplineHeroImages = 'interior_project_slideshow';
		$selectedDisciplineHeroImagesSize = 'medium';
		$sectorheroImageDiscipline = 'slide_three';
		$blogcategoriesarray[]= "interior-design";
		$postlinksuffix = "?interiors";
	} elseif(strstr($_SERVER['REQUEST_URI'], 'planning') == true){ 
		$disciplineCategory = '+Planning';
		$selectedDisciplineContent = 'planning_project_content';
		$selectedDisciplineHeroImages = 'planning_project_slideshow';
		$selectedDisciplineHeroImagesSize = 'medium';
		$sectorheroImageDiscipline = 'slide_four';
		$postlinksuffix = "?planning";
		//$blogcategoriesarray[]= "planning";
	} elseif(strstr($_SERVER['REQUEST_URI'], 'brand') == true){
		$disciplineCategory = '+Brand';
		$selectedDisciplineContent = 'brand_project_content';
		$selectedDisciplineHeroImages = 'brand_project_slideshow';
		$selectedDisciplineHeroImagesSize = 'medium';
		$sectorheroImageDiscipline = 'slide_five';
		$postlinksuffix = "?brand";
		//$blogcategoriesarray[]= "brand";
	} else {
		$disciplineCategory = '';
		$selectedDisciplineHeroImages = 'top_page_slidershow';
		$selectedDisciplineHeroImagesSize = 'image';
		$sectorheroImageDiscipline = 'slide_one';
	}
	
	if(strstr($_SERVER['REQUEST_URI'], 'affordable-housing') == true){ 
		$sectorCategory = '+Affordable Housing';
		$blogcategoriesarray[]= "affordable-housing";
	} elseif(strstr($_SERVER['REQUEST_URI'], 'housing') == true){ 
		$sectorCategory = '+Housing';
		$blogcategoriesarray[]= "housing";
	} elseif(strstr($_SERVER['REQUEST_URI'], 'office') == true){ 
		$sectorCategory = '+Office';
		$blogcategoriesarray[]= "office";
	} elseif(strstr($_SERVER['REQUEST_URI'], 'senior-communities') == true){ 
		$sectorCategory = '+Senior Communities';
		$blogcategoriesarray[]= "senior-communities";
	} elseif(strstr($_SERVER['REQUEST_URI'], 'healthcare') == true){
		$sectorCategory = '+Healthcare';
		$blogcategoriesarray[]= "healthcare";
	} elseif(strstr($_SERVER['REQUEST_URI'], 'higher-education') == true){ 
		$sectorCategory = '+Higher Education';
		$blogcategoriesarray[]= "higher-education";
	} elseif(strstr($_SERVER['REQUEST_URI'], 'hospitality') == true){ 
		$sectorCategory = '+Hospitality';
		$blogcategoriesarray[]= "hospitality";

	} elseif(strstr($_SERVER['REQUEST_URI'], 'retail') == true){ 
		$sectorCategory = '+Retail';
	  $blogcategoriesarray[]= "retail";

	} elseif(strstr($_SERVER['REQUEST_URI'], 'community') == true){
		$sectorCategory = '+Community';
		$blogcategoriesarray[]= "community";
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









			<!-- MAP -->
			<?php if(get_field('allow_map')){ ?>
			<p id="market_sector_map_trigger" class="underline_link">
				<?php if( have_rows('top_page_slidershow') ){ while( have_rows('top_page_slidershow') ){ the_row(); 
					$sectorherotitle = get_sub_field('sector_title');
					$sectorherotypetitle = get_sub_field('sector_type_title');
				?>
				<img src="<?php echo get_template_directory_uri() . '/assets/images/SVG/map.svg'; ?>"/>
				<?php if($sectorherotitle){?><?php echo $sectorherotitle; ?><?php } ?><?php if($sectorherotypetitle){?>/<?php echo $sectorherotypetitle; ?><?php } ?> Projects
				<?php }  } // if( get_field('top_page_slidershow') ){ ?>
			</p>	
			<?php } else { ?>
			<?php 
				$sector_sidebar_sector_pdf = get_field('sector_sidebar_sector_pdf');
				// only show link if it's populated
				if ($sector_sidebar_sector_pdf!='') { ?>
		
				<a class="underline_link" href="<?php echo $sector_sidebar_sector_pdf; ?>" target="_blank">
					<?php if(get_field('top_page_slidershow_sector_title')){?><?php echo get_field('top_page_slidershow_sector_title'); ?><?php } ?><?php if(get_field('top_page_slidershow_sector_type_title')){?>/<?php echo get_field('top_page_slidershow_sector_type_title'); ?><?php } ?> Project List
				</a>
			
				<?php } ?>
			<?php } ?>		
		</div>
	</div>
</div>
<!--
<div id="market_sector_map_wrap" class="col-12">

	<div class="center_map_btns_wrap">
		<p>Center Map To{</p>
		<div id="fly_portland"><img src="<?php echo get_template_directory_uri() . '/assets/images/SVG/map_pin.svg'; ?>"/>Housing</div>
		<div id="fly_seattle"><img src="<?php echo get_template_directory_uri() . '/assets/images/SVG/map_pin.svg'; ?>"/>Seattle</div>
		<div id="fly_sanfran"><img src="<?php echo get_template_directory_uri() . '/assets/images/SVG/map_pin.svg'; ?>"/>San Francisco</div>
	</div>

	<div class="close_project_list_btn">
		<img src="<?php echo get_template_directory_uri() . '/assets/images/SVG/close.svg'; ?>"/>
	</div>
	<div id='map4'></div>

</div>
	-->

<?php

	if(strstr($_SERVER['REQUEST_URI'], 'architecture') == true){ 
	  	$featured_posts = array(get_field('architecture_projects'));
	} elseif(strstr($_SERVER['REQUEST_URI'], 'interiors') == true){ 
		$featured_posts = array(get_field('interior_projects'));
	} else { 
		$featured_posts = array(get_field('interior_projects'), get_field('architecture_projects'));
	}
	$postWithDiscipline = array(); 

	echo "<!-- featuredposts: <pre>" .print_r($featured_posts,true) . "</pre> -->";

	echo "<!-- disciplineCategory:" .$disciplineCategory ."-->";

	if(count($featured_posts) == 1 && $featured_posts[0] !== NULL){
  		foreach( $featured_posts[0] as $featured_post ){
  	    	$postCategories = get_the_terms( $featured_post->ID, 'portfolio_category' );
  	    	foreach( $postCategories as $postCategory ) { 
  		      	if($disciplineCategory !== ''){
								echo "<!-- postCategory->name:".$postCategory->name." -->";
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
								echo "<!-- postCategory->name2:".$postCategory->name." -->";
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
			$postLink=$postLink.$postlinksuffix;
			//echo "<!-- postlinksuffix: ".$postlinksuffix. "-->";
			//echo "<!-- postLink: ".$postLink. "-->";
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

	<?php /////////////////////////// BLOG AND NEWS ////////////////////////////// ?>


				<div class="blogandnewsheader separate">
					<h3><a href="/explore-beyond/">EXPLORE BEYOND</a></h3>
				</div>

	<div class="blogandnews separate">
				<?php
					// Define our WP Query Parameters

			if (empty($blogcategoriesarray)) {

				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 4
					);

			} else {

				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 4,
					'tax_query' => array(
					'relation' => 'OR',
						array(
							'taxonomy' => 'blog_category',
							'field' => 'slug',
							'terms' => $blogcategoriesarray
						),
					),
				);
			}

				echo "<!-- blogcategoriesarray:".print_r($blogcategoriesarray,true)." -->";

				$the_query = new WP_Query($args ); ?>
					  
					<?php
						while ($the_query -> have_posts()) { $the_query -> the_post();
					?>
					<div class="hover_arrow_story blogandnewsstory">
						<a href="<?php the_permalink() ?>" class="articletitle"><img class="newsthumb" src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'large'); ?>">
						<div class="newsleft">
						<a href="<?php the_permalink() ?>" class="articletitle"><?php the_title(); ?></a>
						<div class="articledate"><?php echo get_the_date( 'F j, Y' ) ?></div>
						</div>
						<div class="newsright">
							<a href="<?php the_permalink() ?>" class="articletitle arrow_wrap">
        					<div id="cta_arrow">
        						<span class="arrow_right primera black"></span>
        						<span class="arrow_right segunda black"></span>
        					</div>
							</a>
						</div>
					</div>
					<?php
}
					wp_reset_postdata();
					?>

	</div>




				<div class="blogandnewsheader separate">
					<h3><a href="/news/">IN THE NEWS</a></h3>
				</div>

	<div class="blogandnews separate">
		<?php
						wp_reset_postdata ();

						$args_inthenews = array(
					    'post_type' => 'inthenews',
					    'post_status' => 'publish',
						 'offset' => 0,
						 'posts_per_page' => 100,
					     'orderby' => 'desc',
						); 
		
						$countnews = 0;

						echo "<!-- blogcategoriesarray: ". print_r($blogcategoriesarray,true)." -->";

						$arr_posts = new WP_Query( $args_inthenews ); 
						if ( $arr_posts->have_posts() ) {
							while ( $arr_posts->have_posts() ) {
								$arr_posts->the_post(); 
								$post_id = get_the_ID();

								$oktoshow = false;
								$cats = get_the_terms( $post_id, 'portfolio_category' );
								$tags = get_the_terms( $post_id, 'portfolio_tag' );

								// see if in category 
								foreach($cats as $cat) {
									$catclean = preg_replace('/[^a-zA-Z0-9\']/','-',strtolower($cat->name));
									echo "<!-- comparing cat  ".$catclean."  --->";
									if (in_array($catclean,$blogcategoriesarray)) {
										$oktoshow = true;
										$countnews++;
										echo "<!-- cat match found for ". get_the_title()." -->";
									}
								}

								foreach($tags as $tag) {
									$tagclean = preg_replace('/[^a-zA-Z0-9\']/','-',strtolower($tag->name));
									echo "<!-- comparing tag ".$tagclean."  --->";
									if (in_array($tagclean,$blogcategoriesarray)) {
										$oktoshow = true;
										$countnews++;
										echo "<!-- tag match found for ". get_the_title()." -->";

									}
								}


								if (($oktoshow) && ($countnews<4)) {

								
								$newstitle = get_the_title();
								$newstitleformatted = ucwords(strtolower($newstitle));
								$newsthumb = get_the_post_thumbnail_url( get_the_ID(),'medium' );
								$newslink = get_field("news_link");

								
								?><div class="hover_arrow_story inthenews-post">
									<a href="<?php echo $newslink;?>" target="_blank">
										<div class="inthenews-thumb"><img src="<?php echo $newsthumb;?>" class="inthenews-thumbsrc"></div>
										<div class="newsleft">
											<div class="inthenews-title"><h3><?php echo $newstitleformatted;?></h3>
											<div class="articledate"><?php echo get_the_date( 'F j, Y' ) ?></div>
										</div>
									</div>
									<div class="newsright">
									<a href="<?php echo $newslink; ?>" class="articletitle arrow_wrap">
        					<div id="cta_arrow">
        						<span class="arrow_right primera black"></span>
        						<span class="arrow_right segunda black"></span>
        					</div>
							</a>
						</div>
									</a>
								</div>
								<?php	

								}

							}
						}
						wp_reset_postdata ();
			?>



</div>
	<?php /////////////////////////// END BLOG AND NEWS ////////////////////////////// ?>





<?php /////////////////////////// BLOG AND NEWS COMBINED  ////////////////////////////// ?>


				<div class="blogandnewsheader">
					<h3><a href="/explore-beyond/">EXPLORE BEYOND AND NEWS</a></h3>
				</div>

	<div class="blogandnews">
				<?php
					// Define our WP Query Parameters


			$argsall = array(
					'post_type' => 'post',
					'posts_per_page' => 50
					);

			if (empty($blogcategoriesarray)) {

				$args = $argsall;

			} else {

				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 50,
					'tax_query' => array(
					'relation' => 'OR',
						array(
							'taxonomy' => 'blog_category',
							'field' => 'slug',
							'terms' => $blogcategoriesarray
						),
					),
				);
			}

				echo "<!-- blogcategoriesarray:".print_r($blogcategoriesarray,true)." -->";

				$the_query = new WP_Query($args ); 
				
				// if no articles found in this category then use general articles
				if ($the_query->found_posts == 0){
					$the_query = new WP_Query($argsall ); 
				}
				?>
					  
					<?php
						$countexplore = 0;
						while ($the_query -> have_posts()) { $the_query -> the_post();

						$countexplore++;
						if ($countexplore<3) {
					?>
					<div class="hover_arrow_story blogandnewsstory">
						<a href="<?php the_permalink() ?>" class="articletitle"><img class="newsthumb" src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'large'); ?>">
						<div class="newsleft">
						<div class="articletitle"><?php the_title(); ?></div>
						<div class="articledate"><?php echo get_the_date( 'F j, Y' ) ?></div>
						</div>
						<div class="newsright">
							<a href="<?php the_permalink() ?>" class="articletitle arrow_wrap">
        					<div id="cta_arrow">
        						<span class="arrow_right primera black"></span>
        						<span class="arrow_right segunda black"></span>
        					</div>
							</a>
						</div>
					</div>
					<?php
					 }			
					}
					wp_reset_postdata();
					?>

	<!-- </div> -->




				<!-- <div class="blogandnewsheader">
					<h3><a href="/news/">IN THE NEWS</a></h3>
				</div> -->

	<!-- <div class="blogandnews"> -->
		<?php
						wp_reset_postdata ();

						$args_inthenews = array(
					    'post_type' => 'inthenews',
					    'post_status' => 'publish',
						 'offset' => 0,
						 'posts_per_page' => 100,
					     'orderby' => 'desc',
						); 
		
						$countnews = 0;

						echo "<!-- blogcategoriesarray: ". print_r($blogcategoriesarray,true)." -->";

						$arr_posts = new WP_Query( $args_inthenews ); 
						if ( $arr_posts->have_posts() ) {
							while ( $arr_posts->have_posts() ) {
								$arr_posts->the_post(); 
								$post_id = get_the_ID();

								$oktoshow = false;
								$cats = get_the_terms( $post_id, 'portfolio_category' );
								$tags = get_the_terms( $post_id, 'portfolio_tag' );

								// see if in category 
								foreach($cats as $cat) {
									$catclean = preg_replace('/[^a-zA-Z0-9\']/','-',strtolower($cat->name));
									echo "<!-- comparing cat  ".$catclean."  --->";
									if (in_array($catclean,$blogcategoriesarray)) {
										$oktoshow = true;
										//$countnews++;
										echo "<!-- cat match found for ". get_the_title()." -->";
									}
								}

								foreach($tags as $tag) {
									$tagclean = preg_replace('/[^a-zA-Z0-9\']/','-',strtolower($tag->name));
									echo "<!-- comparing tag ".$tagclean."  --->";
									if (in_array($tagclean,$blogcategoriesarray)) {
										$oktoshow = true;
										//$countnews++;
										echo "<!-- tag match found for ". get_the_title()." -->";

									}
								}

								if ($oktoshow) {$countnews++;} /* count the number of items to show  */

								if (($oktoshow) && ($countnews<3)) {

								
								$newstitle = get_the_title();
								$newstitleformatted = ucwords(strtolower($newstitle));
								$newsthumb = get_the_post_thumbnail_url( get_the_ID(),'medium' );
								$newslink = get_field("news_link");

								
								?><div class="hover_arrow_story inthenews-post">
									<a href="<?php echo $newslink;?>" target="_blank">
										<div class="inthenews-thumb"><img src="<?php echo $newsthumb;?>" class="inthenews-thumbsrc"></div>
										<div class="newsleft">
											<div class="inthenews-title"><?php echo $newstitleformatted;?>
												<div class="articledate"><?php echo get_the_date( 'F j, Y' ) ?></div>
											</div>
										</div>
									<div class="newsright">
									<a href="<?php echo $newslink; ?>" class="articletitle arrow_wrap">
        					<div id="cta_arrow">
        						<span class="arrow_right primera black"></span>
        						<span class="arrow_right segunda black"></span>
        					</div>
							</a>
						</div>
									</a>
								</div>
								<?php	

								}

							}
						}
						wp_reset_postdata ();
			?>



</div>
	<?php /////////////////////////// END BLOG AND NEWS COMBINED ////////////////////////////// ?>







</div>
<?php } ?>


<style>
	.blogandnews {
		display: inline-block;
		margin-bottom:50px;
		width:100%;
	}
	img.newsthumb {
		width: 250px;
		height: 250px;
		object-fit: cover;
	}
	img.inthenews-thumbsrc {
		width: 250px;
		height: 250px;
		object-fit: cover;
	}
	.blogandnews.separate{
		display:none;
	}

	.blogandnewsheader.separate{
		display:none;
	}

	.blogandnewsstory{
		padding:0;
		display: inline-block;
		vertical-align: top;
		width:24%;
		margin-right: 10px;
	}

	.blogandnewsstory:nth-of-type(4){
		margin-right: 0px;
	}

	.inthenews-title {
    text-transform: none;
		font-weight:700;
	}

	.inthenews-post{
		padding:0;
		display: inline-block;
		vertical-align: top;
		width:24%;
		margin-right: 10px;
	}
	.inthenews-post:nth-of-type(4){
		margin-right: 0px;
	}

	.articledate{
		font-weight:500;
	}

	@media(max-width:1200px){
		.blogandnewsstory{
			width:46%;
		}
		.inthenews-post{
			width:46%;
		}
		img.newsthumb {
			width: 100%;
			height: 100%;
		}
		img.inthenews-thumbsrc {
			width: 100%;
			height: 100%;
		}
	}

	@media(max-width:767px){
		.blogandnewsstory{
			width:100%;
			margin-bottom:20px;
		}
		img.newsthumb {
			width: 100%;
			height: 100%;
		}
		.inthenews-post{
			width:100%;
			margin-bottom:20px;
		}
		img.inthenews-thumbsrc {
			width: 100%;
			height: 100%;
		}
	}

	.blogandnewsheader{
		width:100%;
		background:#000;
		padding:20px;
		text-align:center;
		margin-bottom:20px;
	}
	.blogandnewsheader h3{
		color:#fff;
	}

	.newsleft{
		width:190px;
		float:left;
		margin-top:6px;
	}
	.newsright{
		width:60px;
		float:right;
		margin-top:0px;
	}

	.articletitle{
		font-weight:700;
	}

	#cta_arrow {
		width:30px;
	}
</style>


<?php get_footer(); ?>


