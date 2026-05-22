
<!-- Grid Project -->
<?php 


		function get_id_by_slug($page_slug) {
				$page = get_page_by_path($page_slug);
				if ($page) {
						return $page->ID;
				} else {
						return null;
				}
		} 
			// https://wordpress.stackexchange.com/questions/102841/how-to-get-page-id-of-a-page-using-page-slug



	$custom_similar_projects = get_field('custom_similar_projects');
	$include_related_categories = get_field('include_related_categories');
	$exclude_related_categories = get_field('exclude_related_categories');

	$maincategories = get_the_terms( get_the_ID(), 'portfolio_category' ); // these are the categories of the main project


	$include_related_categories_array = [];
	//echo "<!-- include_related_categories:".print_r($include_related_categories,true)." -->";
	// make an array of related categories
	foreach ($include_related_categories as $related_cat){
		$include_related_categories_array[]=$related_cat;
	}

	//echo "<!-- include_related_categories_array:".print_r($include_related_categories_array,true)." -->";


	$categories = get_the_terms( $post->ID, 'portfolio_category' );
	$currentCategories  =  array();
	foreach( $categories as $category ) {
			if($category->name == 'Housing' || $category->name == 'Affordable Housing' || $category->name == 'Senior Community' || $category->name == 'Office' || $category->name == 'Healthcare' || $category->name == 'Higher Education' || $category->name == 'Hospitality' || $category->name == 'Destination'  || $category->name == 'Hotels'  || $category->name == 'Hotels and Resorts'  || $category->name == 'Renovations'  || $category->name == 'Resorts' || $category->name == 'Timeshares' || $category->name == 'Retail' || $category->name == 'Community'):
	    		array_push($currentCategories, $category->name);
	    	endif;
	}
	
// 	print_r($List);

	// default to overview image

		$thisdiscipline = "overview";
		$selectedDisciplineContent = "top_project_content";
		$selectedDisciplineHeroImages = 'top_page_slidershow';
		$selectedDisciplineHeroImagesSize = 'image';


	if(strstr($_SERVER['REQUEST_URI'], 'architecture') == true ){
		$thisdiscipline = "architecture";
		array_push($currentCategories, 'Architecture');
		$selectedDisciplineContent = 'architecture_project_content';
		$selectedDisciplineHeroImages = 'architecture_project_slideshow';
		$selectedDisciplineHeroImagesSize = 'small';
		
	} elseif(strstr($_SERVER['REQUEST_URI'], 'interiors') == true ){
		$thisdiscipline = "interiors";
		array_push($currentCategories, 'Interiors');
		$selectedDisciplineContent = 'interior_project_content';
		$selectedDisciplineHeroImages = 'interior_project_slideshow';
		$selectedDisciplineHeroImagesSize = 'small';
	} elseif(strstr($_SERVER['REQUEST_URI'], 'planning') == true ){
		$thisdiscipline = "planning";
		array_push($currentCategories, 'Planning');
		$selectedDisciplineContent = 'planning_project_content';
		$selectedDisciplineHeroImages = 'planning_project_slideshow';
		$selectedDisciplineHeroImagesSize = 'small';
	} elseif(strstr($_SERVER['REQUEST_URI'], 'brand') == true ){
		$thisdiscipline = "brand";
		array_push($currentCategories, 'Brand');
		$selectedDisciplineContent = 'brand_project_content';
		$selectedDisciplineHeroImages = 'brand_project_slideshow';
		$selectedDisciplineHeroImagesSize = 'small';
	} elseif(strstr($_SERVER['REQUEST_URI'], 'process') == true ){
		$thisdiscipline = "process";
		array_push($currentCategories, 'Process');
		$selectedDisciplineContent = 'process_project_content';
		$selectedDisciplineHeroImages = 'process_project_slideshow';
		$selectedDisciplineHeroImagesSize = 'small';
	} elseif(strstr($_SERVER['REQUEST_URI'], 'design') == true ){
		$thisdiscipline = "design";
		array_push($currentCategories, 'Design');
		$selectedDisciplineContent = 'design_project_content';
		$selectedDisciplineHeroImages = 'design_project_slideshow';
		$selectedDisciplineHeroImagesSize = 'small';
	} 
	
	
	
	$List = implode('+', $currentCategories);
  	echo "<!-- CategoriesList: ".print_r($List,true). "-->";


// Custom Similar Projects
if (!empty($custom_similar_projects)) {

	$args = array(
    'post_type' => 'portfolio_project',
    'post_status' => 'publish',
    'offset' => 0,
    'posts_per_page' => 100,
	'orderby'  => 'post__in',
    'limit' => 100,
    'post__in' => $custom_similar_projects
	); 
	$arr_posts = new WP_Query( $args ); 


if ( $arr_posts->have_posts() ) {?>
<div class="container grid_project_wrap project_toggle_wrapper">
	<div class="similar_projects_title_wrap">
		<h3>SIMILAR PROJECTS</h3>
	</div>
	<div class="row project_wrap">
		<?php while ( $arr_posts->have_posts() ) {
		        $arr_posts->the_post(); 
				$permalink = get_the_permalink();
				if ($thisdiscipline!="overview") {
					$permalink = $permalink."?".$thisdiscipline;
				}
				?>

		<div class="col-lg-6 col-md-12 hover_arrow_story individual_project">
			<div class="story_image">
				<?php if($selectedDisciplineContent){ ?>
				<?php if( have_rows($selectedDisciplineContent) ){ while( have_rows($selectedDisciplineContent) ){ the_row(); ?>
				<?php if( have_rows($selectedDisciplineHeroImages) ){ while( have_rows($selectedDisciplineHeroImages) ){ the_row(); ?> 
				<?php if( have_rows('slide_one') ){ while( have_rows('slide_one') ){ the_row(); 
				$projectslideone = get_sub_field($selectedDisciplineHeroImagesSize); ?> 	  
				<a href="<?php echo $permalink; ?>">
					<div class="project-center-cropped" style="background-image: url(<?php echo $projectslideone; ?>);"></div>
					<div class="shimmer tumb_loading"></div>
				</a>
				<?php }  } // if( get_field('slide_one') ){ ?>
				<?php }  } // if( get_field('top_page_slidershow') ){ ?>
				<?php }  } // if( get_field('slide_one') ){ ?>
				<?php } else { ?>
				<?php if( have_rows($selectedDisciplineHeroImages) ){ while( have_rows($selectedDisciplineHeroImages) ){ the_row(); ?> 
				<?php if( have_rows('slide_one') ){ while( have_rows('slide_one') ){ the_row(); 
				$projectslideone = get_sub_field($selectedDisciplineHeroImagesSize); ?> 	  
				<a href="<?php echo $permalink; ?>">
					<div class="project-center-cropped" style="background-image: url(<?php echo $projectslideone; ?>);"></div>
					<div class="shimmer tumb_loading"></div>
				</a>
				<?php }  } // if( get_field('slide_one') ){ ?>
				<?php }  } // if( get_field('top_page_slidershow') ){ ?>
				<?php } ?>
			</div>
			<div class="project_content_wrap">
				<?php if( have_rows('top_project_content') ){ ?>
				<?php while( have_rows('top_project_content') ){ the_row(); 
					$topprojecttitle = get_sub_field('project_subtitle');
					$topprojectcontent = get_sub_field('project_content');
				?>
				<div class="row d-lg-flex">
					<div class="col-md-10 col-sm-12">
						<div class="d-lg-block">
							<h3 class="shimmer"><a href="<?php echo $permalink; ?>"><?php the_title(); ?></a></h3>
							<h4><a href="<?php echo $permalink; ?>"><?php echo $topprojecttitle; ?></a></h4>
						</div>
					</div>
					<div class="col-md-2 col-sm-12 arrow_wrap">
						<a href="<?php echo $permalink; ?>">
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
	</div>

</div>
<?php } else { ?>
<!-- <div class="container">
	<div class="row">
		<div class="col-12">
			<p style="text-align: center">We don't have these types of projects at this location—yet.</p>
		</div>
	</div>
</div> -->
<?php } 





} else if (!empty($include_related_categories_array))   {
//} else if (is_array($include_related_categories))   {


	$args_included = array(
    'post_type' => 'portfolio_project',
    'post_status' => 'publish',
    'tax_query' => array(
	'relation' => 'OR',
        array (
            'taxonomy' => 'portfolio_category',
            'field' => 'ID',
            'terms' => $include_related_categories_array,
        )
    ),
    'offset' => 0,
    'orderby' => 'post_order',
	'order' => 'DESC',
    'posts_per_page' => 100,
    'post__not_in' => array(get_the_ID()),
	); 

	$arr_posts = new WP_Query( $args_included); 


if ( $arr_posts->have_posts() ) {?>
<div class="container grid_project_wrap project_toggle_wrapper">
	<div class="similar_projects_title_wrap">
		<h3>SIMILAR PROJECTS</h3>
	</div>
	<div class="row project_wrap">
		<?php while ( $arr_posts->have_posts() ) {
		        $arr_posts->the_post(); 
				$permalink = get_the_permalink();
				if ($thisdiscipline!="overview") {
					$permalink = $permalink."?".$thisdiscipline;
				}
				?>

		<div class="col-lg-6 col-md-12 hover_arrow_story individual_project">
			<div class="story_image">
				<?php if($selectedDisciplineContent){ ?>
				<?php if( have_rows($selectedDisciplineContent) ){ while( have_rows($selectedDisciplineContent) ){ the_row(); ?>
				<?php if( have_rows($selectedDisciplineHeroImages) ){ while( have_rows($selectedDisciplineHeroImages) ){ the_row(); ?> 
				<?php if( have_rows('slide_one') ){ while( have_rows('slide_one') ){ the_row(); 
				$projectslideone = get_sub_field($selectedDisciplineHeroImagesSize); ?> 	  
				<a href="<?php echo $permalink; ?>">
					<div class="project-center-cropped" style="background-image: url(<?php echo $projectslideone; ?>);"></div>
					<div class="shimmer tumb_loading"></div>
				</a>
				<?php }  } // if( get_field('slide_one') ){ ?>
				<?php }  } // if( get_field('top_page_slidershow') ){ ?>
				<?php }  } // if( get_field('slide_one') ){ ?>
				<?php } else { ?>
				<?php if( have_rows($selectedDisciplineHeroImages) ){ while( have_rows($selectedDisciplineHeroImages) ){ the_row(); ?> 
				<?php if( have_rows('slide_one') ){ while( have_rows('slide_one') ){ the_row(); 
				$projectslideone = get_sub_field($selectedDisciplineHeroImagesSize); ?> 	  
				<a href="<?php echo $permalink; ?>">
					<div class="project-center-cropped" style="background-image: url(<?php echo $projectslideone; ?>);"></div>
					<div class="shimmer tumb_loading"></div>
				</a>
				<?php }  } // if( get_field('slide_one') ){ ?>
				<?php }  } // if( get_field('top_page_slidershow') ){ ?>
				<?php } ?>
			</div>
			<div class="project_content_wrap">
				<?php if( have_rows('top_project_content') ){ ?>
				<?php while( have_rows('top_project_content') ){ the_row(); 
					$topprojecttitle = get_sub_field('project_subtitle');
					$topprojectcontent = get_sub_field('project_content');
				?>
				<div class="row d-lg-flex">
					<div class="col-md-10 col-sm-12">
						<div class="d-lg-block">
							<h3 class="shimmer"><a href="<?php echo $permalink; ?>"><?php the_title(); ?></a></h3>
							<h4><a href="<?php echo $permalink; ?>"><?php echo $topprojecttitle; ?></a></h4>
						</div>
					</div>
					<div class="col-md-2 col-sm-12 arrow_wrap">
						<a href="<?php echo $permalink; ?>">
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
	</div>

</div>

<?php 
}



} else {

	//echo "<!-- checking excluded categories... -->";

    // get excluded related projects
		$excluderelatedprojectsid =  get_id_by_slug('exclude-related-projects'); 
		if ($excluderelatedprojectsid=='') {  $excluderelatedprojectsid = 4407; } // default if no page found
		//echo "<!-- excluderelatedprojectsid:" . $excluderelatedprojectsid. " -->";


		$excludecategories_sitewide_array = [];

			// Sitewide excluded categories list
			if( have_rows('exclude_categories', $excluderelatedprojectsid) ) {

				// Loop through rows.
				while( have_rows('exclude_categories', $excluderelatedprojectsid) ) { 
					the_row();

        // Load sub field value.
					$project_category = get_sub_field('project_category');
					$exclude_project_categories = get_sub_field('exclude_project_categories');
					$excludecategories_sitewide_array[] = array('project_category'=>$project_category,'excluded_categories'=>$exclude_project_categories);

			// End loop.
			}
			//echo "<pre><!-- ".print_r($excludecategories_sitewide_array,true)."--></pre>";

		// No value.
			} else {
				echo "<!-- exclude_categories not found -->";
			}

	$exclude_related_categories_sitewide = get_field('exclude_related_categories',$excluderelatedprojectsid);


	//$exclude_related_categories = get_field('exclude_related_categories');  // this has moved  up above

		//echo "<!-- excludedcategories: <pre>" . print_r($exclude_related_categories,true) ."</pre> -->";

	$args_old = array(
    'post_type' => 'portfolio_project',
    'post_status' => 'publish',
    'portfolio_category' => $List,
    'offset' => 0,
    'orderby' => 'post_order',
	'order' => 'DESC',
    'posts_per_page' => 100,
    'post__not_in' => array(get_the_ID()),
	); 


	$args = array(
    'post_type' => 'portfolio_project',
    'post_status' => 'publish',
    'tax_query' => array(
	'relation' => 'OR',
        array (
            'taxonomy' => 'portfolio_category',
            'field' => 'slug',
            'terms' => $currentCategories,
        )
    ),
    'offset' => 0,
    'orderby' => 'post_order',
	'order' => 'DESC',
    'posts_per_page' => 100,
    'post__not_in' => array(get_the_ID()),
	); 

	$arr_posts = new WP_Query( $args ); 


if ( $arr_posts->have_posts() ) {

	//echo "<!-- similar has posts -->";
	
	//echo "<!-- count:".$arr_posts->post_count." -->";  
	?>
<div class="container grid_project_wrap project_toggle_wrapper closed">
	<div class="similar_projects_title_wrap">
		<h3>SIMILAR PROJECTS</h3>
	</div>
	<div class="row project_wrap">
		<?php while ( $arr_posts->have_posts() ) {
		
		        $arr_posts->the_post(); 
				$permalink = get_the_permalink();
					if ($thisdiscipline!="overview") {
						$permalink = $permalink."?".$thisdiscipline;
					}
		

			// check for exluded categories in the Exclude Related Projects page. If found then skip this project

			$thesecategories = get_the_terms( get_the_ID(), 'portfolio_category' ); // these are the categories of the related project

				foreach( $maincategories as $thiscategory ) { // loop through the main categories

					
						// $excludecategories_sitewide_array[] = array('project_category'=>$project_category,'excluded_categories'=>$exclude_project_categories);
					  foreach ($excludecategories_sitewide_array as $sitewideexclusion) {

							$thissitewidecategory = $sitewideexclusion['project_category']->slug; // get the slug of the sitewide category
	
							//echo "<!-- thissitewidecategory: $thissitewidecategory  -->";
							//echo "<!-- thissitewidecategory: $thissitewidecategory sitewideexclusion: <pre>".print_r($sitewideexclusion,true),"</pre> -->";

							//echo "<!-- comparing ". $thiscategory->slug . " to " . $thissitewidecategory . "-->";
							if ($thiscategory->slug ==  $thissitewidecategory) { // if the sitewide category matches this category then check for exclusions
								//echo "<!-- found a match for this category to exclude -->";
								$exclude_related_categories_sitewide_object = $sitewideexclusion['excluded_categories'];
								$exclude_related_categories_sitewide = []; // make an array of exlcuded slugs for this category
								if (is_array($exclude_related_categories_sitewide_object)){
									foreach($exclude_related_categories_sitewide_object as $exobj) {
											$exclude_related_categories_sitewide[] = $exobj->slug;
											//echo "<!-- add $exobj->slug to exclude_related_categories_sitewide  -->";
									}
								}
								//echo "<br><!-- thiscategory:".$thiscategory->name." -->";
								if (is_array($exclude_related_categories_sitewide)) {
									// loop through the categories 
									foreach( $thesecategories as $thiscategory2 ) { 
										if (in_array($thiscategory2->slug, $exclude_related_categories_sitewide)) {
										 echo "<!-- <br>Found excluded category ".$thiscategory2->slug." in sitewide exclusion list - don't show -->";
	    						   continue 4; // skip to next item if it finds an excluded category match with any of the the categories - go up 3 levels
										}
									}
								}
							}				
					}

				}
		?>

		<?php
			// check for exluded categories on this specific project. If found then skip this project
			$thesecategories = get_the_terms( get_the_ID(), 'portfolio_category' );
			if (is_array($exclude_related_categories)) {
				foreach( $thesecategories as $thiscategory ) {
					//echo "<br><!-- thiscategory:".$thiscategory->name." -->";
					if (in_array($thiscategory, $exclude_related_categories)) {
						echo "<!-- <br>Found excluded category ".$thiscategory->name." with exclusion list for ".get_the_title()." - don't show -->";
	    		continue 2; // skip to next item if it finds an excluded category match with any of the the categories
					}
				}
			}
		?>

		<div class="col-lg-6 col-md-12 hover_arrow_story individual_project">
			<div class="story_image">
				<?php if($selectedDisciplineContent){ ?>
				<?php if( have_rows($selectedDisciplineContent) ){ while( have_rows($selectedDisciplineContent) ){ the_row(); ?>
				<?php if( have_rows($selectedDisciplineHeroImages) ){ while( have_rows($selectedDisciplineHeroImages) ){ the_row(); ?> 
				<?php if( have_rows('slide_one') ){ while( have_rows('slide_one') ){ the_row(); 
				$projectslideone = get_sub_field($selectedDisciplineHeroImagesSize); ?> 	  
				<a href="<?php echo $permalink; ?>">
					<div class="project-center-cropped" style="background-image: url(<?php echo $projectslideone; ?>);"></div>
					<div class="shimmer tumb_loading"></div>
				</a>
				<?php }  } // if( get_field('slide_one') ){ ?>
				<?php }  } // if( get_field('top_page_slidershow') ){ ?>
				<?php }  } // if( get_field('slide_one') ){ ?>
				<?php } else { ?>
				<?php if( have_rows($selectedDisciplineHeroImages) ){ while( have_rows($selectedDisciplineHeroImages) ){ the_row(); ?> 
				<?php if( have_rows('slide_one') ){ while( have_rows('slide_one') ){ the_row(); 
				$projectslideone = get_sub_field($selectedDisciplineHeroImagesSize); ?> 	  
				<a href="<?php echo $permalink; ?>">
					<div class="project-center-cropped" style="background-image: url(<?php echo $projectslideone; ?>);"></div>
					<div class="shimmer tumb_loading"></div>
				</a>
				<?php }  } // if( get_field('slide_one') ){ ?>
				<?php }  } // if( get_field('top_page_slidershow') ){ ?>
				<?php } ?>
			</div>
			<div class="project_content_wrap">
				<?php if( have_rows('top_project_content') ){ ?>
				<?php while( have_rows('top_project_content') ){ the_row(); 
					$topprojecttitle = get_sub_field('project_subtitle');
					$topprojectcontent = get_sub_field('project_content');
				?>
				<div class="row d-lg-flex">
					<div class="col-md-10 col-sm-12">
						<div class="d-lg-block">
							<h3 class="shimmer"><a href="<?php echo $permalink; ?>"><?php the_title(); ?></a></h3>
							<h4><a href="<?php echo $permalink; ?>"><?php echo $topprojecttitle; ?></a></h4>
						</div>
					</div>
					<div class="col-md-2 col-sm-12 arrow_wrap">
						<a href="<?php echo $permalink; ?>">
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
	</div>
	<div class="show_more_projects">
		<div class="row col-12">
			<h3>SEE MORE PROJECTS</h3>
		</div>
	</div>
</div>
<?php } else { ?>
<!-- <div class="container">
	<div class="row">
		<div class="col-12">
			<p style="text-align: center">We don't have these types of projects at this location—yet.</p>
		</div>
	</div>
</div> -->
<?php } ?>
<?php } ?>