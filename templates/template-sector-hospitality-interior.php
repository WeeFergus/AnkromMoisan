<?php
/**
 * Template Name: Sector Page (Hospitality Interior)
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
	<?php if( have_rows('top_page_slidershow') ): while( have_rows('top_page_slidershow') ): the_row(); ?>
	<?php $sectorherotitle = get_sub_field('sector_title'); $sectorherotypetitle = get_sub_field('sector_type_title'); ?>
	<?php if( have_rows($sectorheroImageDiscipline) ): while( have_rows($sectorheroImageDiscipline) ): the_row(); ?>
	<?php   $sectorheroImage = get_sub_field('image'); ?>
	<div class="hero_sector_image_wrap">
		
		<div class="hero_image <?php echo $selectedDisciplineContent; ?> <?php echo strtolower(str_replace(' ', '_', $currentCategory)); ?>" style="background-image: url(<?php echo $sectorheroImage; ?>);"></div>
		<div class="shimmer tumb_loading"></div>
		<div class="container hero_title">
			<div class="row">
				<div class="col-12">
					<h1><?php if($sectorherotitle):?><span class="sector_title"><?php echo $sectorherotitle; ?></span><?php endif; ?><?php if($sectorherotypetitle):?> / <?php echo $sectorherotypetitle; ?><?php endif; ?></h1>
				</div>
			</div>
		</div>
	</div>
	<?php endwhile; endif; // if( get_field($sectorheroImageDiscipline) ): ?>
	<?php endwhile; endif; // if( get_field('top_page_slidershow') ): ?>
</div>


<div class="container sector_top_content">
	<div class="row">
		<?php if(strstr($_SERVER['REQUEST_URI'], 'interiors') == false): ?>
		<div class="col-lg-7 col-md-12 toggle_wrapper">
			<?php while ( have_posts() ) : the_post(); 
			// check for rows (parent repeater)
			if( have_rows('top_project_content') ): ?>
			<?php while( have_rows('top_project_content') ): the_row(); 
				$topsectortitle = get_sub_field('sector_subtitle');
				$topsectorcontent = get_sub_field('project_content');
			?>
			<h2><?php echo $topsectortitle; ?></h2>
			<p><?php echo $topsectorcontent; ?></p>
			<?php endwhile; // end of the loop. ?>
			<?php endif; // if( get_field('top_project_content') ): ?>
			<?php endwhile; // end of the loop. ?>
		</div>
		<div class="col-lg-1 col-md-12"></div>
		<div class="col-lg-4 col-md-12 toggle_wrapper sector_sidebar">
			<?php if( have_rows('sector_sidebar') ): ?>
			<?php while( have_rows('sector_sidebar') ): the_row(); 
				$sectordownloadpdf = get_sub_field('sector_pdf');
			?>
			<h5>PROJECT TYPES:</h5>
			<?php		
				$page_cats = array();
				if(have_posts()) : while(have_posts()) : the_post();
				    $cats = wp_get_post_categories($post->ID);
				    if($cats) : foreach($cats as $cat) : $category = get_category($cat);
				    array_push($page_cats, $category->name);
				    endforeach;endif;
				endwhile;endif;
				
				$comma_separated_cat = implode(", ", $page_cats);
				if($post->post_parent === 0){
					$parent_page_id = $post->ID;
					if(strstr($_SERVER['REQUEST_URI'], 'architecture') == true): 
						$page_cat = 'Architecture';
					elseif(strstr($_SERVER['REQUEST_URI'], 'interiors') == true): 
						$page_cat = 'Interiors';
					elseif(strstr($_SERVER['REQUEST_URI'], 'planning') == true): 
						$page_cat = 'Planning';
					elseif(strstr($_SERVER['REQUEST_URI'], 'brand') == true): 
						$page_cat = 'Brand';
					else:
						$page_cat = '"' . $comma_separated_cat . '"';
					endif;
				}else{
					$parent_page_id = $post->post_parent;
					if(strpos($comma_separated_cat, 'Interiors') !== false ){
						$page_cat = 'Interiors';
					}else{
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
				        if( $parent_page_id === 209 || $parent_page_id === 466 ){
					        echo '<li class="underline_link_wrap"><a class="" href="' .  get_the_permalink()  . '" class="underline_link">' . get_the_title() . '</a></li>';
				        }else{
					        echo '<li class="underline_link_wrap">' . get_the_title() . '</li>';
				        }
				        
				    }
				    echo '</ul>';
				} else {
				    // no posts found
				}
				/* Restore original Post Data */
				wp_reset_postdata();  ?>
			<?php if( have_rows('sector_facts') ): ?>
			<?php while( have_rows('sector_facts') ): the_row(); 
				$sectorfactone = get_sub_field('fact_one');
				$sectorfacttwo = get_sub_field('fact_two');
				$sectorfactthree = get_sub_field('fact_three');
				$sectorfactfour = get_sub_field('fact_four');
				$sectorlink1 = get_sub_field('link_1');
				$sectorlink2 = get_sub_field('link_2');
				$sectorlink3 = get_sub_field('link_3');
				$sectorlink4 = get_sub_field('link_4');
			?>
			<?php if($sectorfactone || $sectorfacttwo || $sectorfactthree):?>
			<h5>FAST FACTS:</h5>
			<ul>
				<?php if($sectorfactone):?><li><bold><?php echo $sectorfactone; ?></bold> PROJECTS</li><?php endif;?>
				<?php if($sectorfacttwo):?><li><bold><?php echo $sectorfacttwo; ?></bold> CITIES</li><?php endif;?>
				<?php if($sectorfactthree):?><li><bold><?php echo $sectorfactthree; ?></bold> STATES</li><?php endif;?>
				<?php if ($sectorfactfour) { ?>
					<li class="factfour"><?php echo $sectorfactfour; ?></li>
				<?php } ?>
			</ul>
			<?php endif; ?>



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
			<div class="link4"><?php echo $sectorlink4; ?></li>
			<?php } ?>
		

			<?php endwhile; // end of the loop. ?>
			<?php endif; // if( get_field('sector_facts') ): ?>




<?php ///////////////////////// SECTOR LINKS /////////////////////////// ?>


			<?php if( have_rows('sector_links') ){ ?>
			<?php while( have_rows('sector_links') ){ the_row(); 
				$sectorlink = get_sub_field('sector_link_repeater'); ?>
				<li class="link1"><?php echo $sectorlink; ?></li>
			<?php } ?>
			<?php } ?>

			</ul>
<?php ///////////////////////// END SECTOR LINKS /////////////////////////// ?>




			<?php endwhile; // end of the loop. ?>
			<?php endif; // if( get_field('sector_sidebar') ): ?>
			<!-- MAP -->
			<?php if(get_field('allow_map')): ?>
			<p id="market_sector_map_trigger" class="underline_link">
				<?php if( have_rows('top_page_slidershow') ): while( have_rows('top_page_slidershow') ): the_row(); 
					$sectorherotitle = get_sub_field('sector_title');
					$sectorherotypetitle = get_sub_field('sector_type_title');
				?>
				<img src="<?php echo get_template_directory_uri() . '/assets/images/SVG/map.svg'; ?>"/>
				<?php if($sectorherotitle):?><?php echo $sectorherotitle; ?><?php endif; ?><?php if($sectorherotypetitle):?>/<?php echo $sectorherotypetitle; ?><?php endif; ?> Projects
				<?php endwhile;  endif; // if( get_field('top_page_slidershow') ): ?>
			
			<?php else: ?>
			
	

			<?php 
				$sector_sidebar_sector_pdf = get_field('sector_sidebar_sector_pdf');
				// only show link if it's populated
				if ($sector_sidebar_sector_pdf!='') { ?>
			
				<a class="underline_link" href="<?php echo $sector_sidebar_sector_pdf; ?>" target="_blank">
					<?php if(get_field('top_page_slidershow_sector_title')):?><?php echo get_field('top_page_slidershow_sector_title'); ?><?php endif; ?><?php if(get_field('top_page_slidershow_sector_type_title')):?>/<?php echo get_field('top_page_slidershow_sector_type_title'); ?><?php endif; ?> Project List
				</a>
			
				<?php } ?>
		
		<!-- <a class="underline_link" href="<?php echo get_field('sector_sidebar_sector_pdf'); ?>" target="_blank">
					<?php if(get_field('top_page_slidershow_sector_title')):?><?php echo get_field('top_page_slidershow_sector_title'); ?><?php endif; ?><?php if(get_field('top_page_slidershow_sector_type_title')):?>/<?php echo get_field('top_page_slidershow_sector_type_title'); ?><?php endif; ?> Project List
				</a> -->



			</p>
			<?php endif; ?>		
		</div>
		<?php endif; ?>
		<?php if(strstr($_SERVER['REQUEST_URI'], 'interiors') == true): ?>
		<div class="container project_content_wrap">
			<div class="row col-12 d-lg-flex">
				<div class="col-md-10 col-sm-12">
					<div class="d-lg-block">
						<h3 class="shimmer"><a href="https://www.welcometothesociety.com/" target="_blank">Visit Website</a></h3>
						<h4><a href="https://www.welcometothesociety.com/" target="_blank">The Society</a></h4>
					</div>
				</div>
				<div class="col-md-2 col-sm-12 arrow_wrap">
					<a href="https://www.welcometothesociety.com/" target="_blank">
    					<div id="cta_arrow">
    						<span class="arrow_right primera black"></span>
    						<span class="arrow_right segunda black"></span>
    					</div>
					</a>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>

<div id="market_sector_map_wrap" class="col-12">
<!--
	<div class="center_map_btns_wrap">
		<p>Center Map To:</p>
		<div id="fly_portland"><img src="<?php echo get_template_directory_uri() . '/assets/images/SVG/map_pin.svg'; ?>"/>Housing</div>
		<div id="fly_seattle"><img src="<?php echo get_template_directory_uri() . '/assets/images/SVG/map_pin.svg'; ?>"/>Seattle</div>
		<div id="fly_sanfran"><img src="<?php echo get_template_directory_uri() . '/assets/images/SVG/map_pin.svg'; ?>"/>San Francisco</div>
	</div>
-->
	<div class="close_project_list_btn">
		<img src="<?php echo get_template_directory_uri() . '/assets/images/SVG/close.svg'; ?>"/>
	</div>
	<div id='map4'></div>
</div>


	
<!-- Grid Project -->
<?php $args = array(
    'post_type' => 'portfolio_project',
    'post_status' => 'publish',
    'portfolio_category' => '' . $currentCategory . '' . $locationCategory . '' . $disciplineCategory . '' . $sectorCategory . '',
    'offset' => 0,
    'posts_per_page' => 200,
); 
$arr_posts = new WP_Query( $args ); 
if ( $arr_posts->have_posts() ) :?>
<div class="container grid_project_wrap project_toggle_wrapper closed individual_project">
	<div class="row project_wrap">
		<?php while ( $arr_posts->have_posts() ) :
		        $arr_posts->the_post(); ?>
		<div class="col-lg-6 col-md-12 hover_arrow_story individual_project">
			<div class="story_image">
				<?php if($selectedDisciplineContent): ?>
				<?php if( have_rows($selectedDisciplineContent) ): while( have_rows($selectedDisciplineContent) ): the_row(); ?>
				<?php if( have_rows($selectedDisciplineHeroImages) ): while( have_rows($selectedDisciplineHeroImages) ): the_row(); ?> 
				<?php if( have_rows('slide_one') ): while( have_rows('slide_one') ): the_row(); 
				$projectslideone = get_sub_field($selectedDisciplineHeroImagesSize); ?> 
				<a href="<?php the_permalink(); ?>">
					<div class="project-center-cropped" style="background-image: url(<?php echo $projectslideone; ?>);"></div>
					<div class="shimmer tumb_loading"></div>
				</a>
				<?php endwhile; endif; // if( get_field('slide_one') ): ?>
				<?php endwhile; endif; // if( get_field('top_page_slidershow') ): ?>
				<?php endwhile; endif; // if( get_field('top_page_slidershow') ): ?>
				<?php else: ?>
				<?php if( have_rows($selectedDisciplineHeroImages) ): while( have_rows($selectedDisciplineHeroImages) ): the_row(); ?> 
				<?php if( have_rows('slide_one') ): while( have_rows('slide_one') ): the_row(); 
				$projectslideone = get_sub_field($selectedDisciplineHeroImagesSize); ?> 
				<a href="<?php the_permalink(); ?>">
					<div class="project-center-cropped" style="background-image: url(<?php echo $projectslideone; ?>);"></div>
					<div class="shimmer tumb_loading"></div>
				</a>
				<?php endwhile; endif; // if( get_field('slide_one') ): ?>
				<?php endwhile; endif; // if( get_field('top_page_slidershow') ): ?>
				<?php endif; ?>
			</div>
			<div class="project_content_wrap">
				<?php if( have_rows('top_project_content') ): ?>
				<?php while( have_rows('top_project_content') ): the_row(); 
					$topprojecttitle = get_sub_field('project_subtitle');
					$topprojectcontent = get_sub_field('project_content');
				?>
				<div class="row d-lg-flex">
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
				</div>
				<?php endwhile; // end of the loop. ?>
				<?php endif; // if( get_field('top_project_content') ): ?>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
	<div class="show_more_projects">
		<div class="row col-12">
			<h3>SEE MORE PROJECTS</h3>
		</div>
	</div>
</div>
<?php endif; ?>

<!-- Explore Cross Markets -->
<?php include(plugin_dir_path( __FILE__ )."../template-parts/explore-cross-markets.php"); ?>



<?php get_footer(); ?>


<!-- Grid Project -->
<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php $projectmap = array(
    'post_type' => 'portfolio_project',
    'post_status' => 'publish',
    'portfolio_category' => '' . $currentCategory . '' . $locationCategory . '' . $disciplineCategory . '' . $sectorCategory . '',
    'posts_per_page' => -1,
); 
$mapmarks = new WP_Query( $projectmap ); 

// count row number 
$counter = 1;
if(get_option( 'ccp_upload' )["name"] !== 'none'){
	$old_projects_url = get_option( 'ccp_upload' )["url"]; 
	$f_pointer=fopen($old_projects_url,"r"); // file pointer
}
?>


<script>
// 	setTimeout(function(){}, 1000);
	const marketSectorMap = document.querySelector('#market_sector_map_trigger');
	const marketSectorMapWrap = document.querySelector('#market_sector_map_wrap');
	
	const marketSectorMapCloseBtn = document.querySelector('.close_project_list_btn');
	
	let marketSectorMapLatitude;
	let marketSectorMapLongitude;
	
	(marketSectorMap) ? marketSectorMapLatitude = marketSectorMap.dataset.latitude : '';
	(marketSectorMap) ? marketSectorMapLongitude = marketSectorMap.dataset.longitude : '';
	
	function loadMapBoxSector(container, center){
		
		mapboxgl.accessToken = 'pk.eyJ1IjoiYW5rcm9tbW9pc2FuIiwiYSI6ImNrMXNkeHVxZjBmNTkzZnA0OHM0bW00Z3EifQ.jd4Bbp2LYbjaZEv696_Y3w';
		
		
		const size = 200;

    	// This implements `StyleImageInterface`
    	// to draw a pulsing dot icon on the map.
    	const pulsingDot = {
    	    width: size,
    	    height: size,
    	    data: new Uint8Array(size * size * 4),
		
    	    // When the layer is added to the map,
    	    // get the rendering context for the map canvas.
    	    onAdd: function () {
    	        const canvas = document.createElement('canvas');
    	        canvas.width = this.width;
    	        canvas.height = this.height;
    	        this.context = canvas.getContext('2d');
    	    },
		
    	    // Call once before every frame where the icon will be used.
    	    render: function () {
    	        const duration = 1000;
    	        const t = (performance.now() % duration) / duration;
		
    	        const radius = (size / 2) * 0.15;
    	        const outerRadius = (size / 2) * 0.6 * t + radius;
    	        const context = this.context;
		
    	        // Draw the outer circle.
    	        context.clearRect(0, 0, this.width, this.height);
    	        context.beginPath();
    	        context.rect(
    	            this.width / 2 - outerRadius /2 +10,
    	            this.height / 2 - outerRadius /2 +10,
    	            outerRadius-20,
    	            outerRadius-20
    	        );
    	        context.fillStyle = `rgba(61, 57, 53, ${1 - t})`;
    	        context.fill();
		
    	        // Draw the inner circle.
    	        context.beginPath();
    	        context.rect(
    	            this.width / 2 - radius + 5,
    	            this.height / 2 - radius+ 5,
    	            20,
    	            20
    	        );
    	        context.fillStyle = 'rgba(61, 57, 53, 1)';
    	        context.strokeStyle = 'white';
    	        context.lineWidth = 2;
    	        context.fill();
    	        context.stroke();
		
    	        // Update this image's data with data from the canvas.
    	        this.data = context.getImageData(
    	            0,
    	            0,
    	            this.width,
    	            this.height
    	        ).data;
		
    	        // Continuously repaint the map, resulting
    	        // in the smooth animation of the dot.
    	        map.triggerRepaint();
		
    	        // Return `true` to let the map know that the image was updated.
    	        return true;
    	    }
    	};
		
		var allLocations = {
			'type': 'FeatureCollection',
			'features': [
				
				<?php if ( $mapmarks->have_posts() ) :?>
				<?php while ( $mapmarks->have_posts() ) : $mapmarks->the_post(); ?>
				<?php if(get_field('project_location_longitude')): ?>
				<?php $categories = get_the_terms( $post->ID, 'portfolio_category');?>
				<?php if($post->post_title === 'Ankrom Moisan Portland Office' || $post->post_title === 'Ankrom Moisan Seattle Office' || $post->post_title === 'Ankrom Moisan San Francisco Office'): ?>
				{
				'type': 'Feature',
				'category': '<?php foreach( $categories as $category ) { echo $category->name . ', ';} ?>',
				'properties': {
					'link': '<?php the_permalink(); ?>',
					'title': "<?php the_title(); ?>",
					'type': 'office'
				},
					'geometry': {
						'type': 'Point',
						'coordinates': [<?php echo get_field('project_location_longitude'); ?>, <?php echo get_field('project_location_latitude'); ?>]
					}
				},
				<?php else: ?>
				{
				'type': 'Feature',
				'category': '<?php foreach( $categories as $category ) { echo $category->name . ', ';} ?>',
				'properties': {
					'link': '<?php the_permalink(); ?>',
					'title': "<?php the_title(); ?>",
					'type': 'project'
				},
					'geometry': {
						'type': 'Point',
						'coordinates': [<?php echo get_field('project_location_longitude'); ?>, <?php echo get_field('project_location_latitude'); ?>]
					}
				},
				<?php endif; ?>
				<?php endif; ?>
				<?php endwhile; ?>
				<?php endif; ?>
				
				<?php  if(get_option( 'ccp_upload' )["name"] !== 'none'):
					while(! feof($f_pointer)){
					$ar=fgetcsv($f_pointer);
					if($counter !=1) { 
						$onee = strval(strtolower($currentCategory));
						$twoo = strval(strtolower($ar[4]));

						if(strpos($twoo, $onee) !== false || strtolower($currentCategory) == strtolower($ar[3])){
					?>
				{
				'type': 'Feature',
				'properties': {
					'link': '<?php if($ar[6] !== ''): ?><?php echo $ar[6]; ?><?php else: ?>nolink<?php endif; ?>',
					'title': "<?php echo $ar[2]; ?>",
					'type': 'project'
				},
					'geometry': {
						'type': 'Point',
						'coordinates': [<?php echo $ar[1]; ?>, <?php echo $ar[0]; ?>]
					}
				},
				<?php }} $counter++; } endif;?>
				

				{
				'type': 'Feature',
				'properties': {
					'title': 'Ankrom Moisan San Francisco Office',
					'type': 'office'
				},
					'geometry': {
						'type': 'Point',
						'coordinates': [-122.4077743, 37.7795572]
					}
				}
			]
		};

		
		
		var map = new mapboxgl.Map({
			container: container,
			style: 'mapbox://styles/ankrommoisan/ckig1w3wd56ah19rpxwcbljlf',
			center: [-110.9480895, 42.7290121],
			zoom: 4
		});	
		
				
		
		

     map.on('load', () => {
        map.addImage('pulsing-dot', pulsingDot, { pixelRatio: 2 });
        
			map.loadImage(
    			location.origin + '/wp-content/themes/ankrom-moisan/img/active.png',
    			(error, image) => {
    	    	if (error) throw error;
		
    	    		// Add the image to the map style.
    	    		map.addImage('active', image);
    			}
    		);
    		map.loadImage(
    			location.origin + '/wp-content/themes/ankrom-moisan/img/inactive_project.png',
    			(error, image) => {
    	    	if (error) throw error;
		
    	    		// Add the image to the map style.
    	    		map.addImage('unactive', image);
    			}
    		);
	    
// 	    filter: ['==', "icon", 'Housing'],
        // Add a new source from our GeoJSON data and
        // set the 'cluster' option to true. GL-JS will
        // add the point_count property to your source data.
        map.addSource('allLocations', {
            type: 'geojson',
            // Point to GeoJSON data. This example visualizes all M1.0+ earthquakes
            // from 12/22/15 to 1/21/16 as logged by USGS' Earthquake hazards program.
            data: allLocations,
            cluster: true,
            clusterMaxZoom: 12, // Max zoom to cluster points on
            clusterRadius: 50 // Radius of each cluster when clustering points (defaults to 50)
        });
        
        
        



			map.addLayer({
				id: 'clusters',
				type: 'circle',
				source: 'allLocations',
				filter: ['has', 'point_count'],
				paint: {
					// Use step expressions (https://docs.mapbox.com/mapbox-gl-js/style-spec/#expressions-step)
					// with three steps to implement three types of circles:
					//   * Blue, 20px circles when point count is less than 100
					//   * Yellow, 30px circles when point count is between 100 and 750
					//   * Pink, 40px circles when point count is greater than or equal to 750
					'circle-color': [
					'step',
						['get', 'point_count'],
						'#61b0bc',
						10,
						'#61b0bc',
						25,
						'#61b0bc',
						40,
						'#61b0bc',
						55,
						'#61b0bc',
						70,
						'#61b0bc',
						85,
						'#61b0bc',
						100,
						'#61b0bc',
						150,
						'#61b0bc',
						200,
						'#61b0bc',
						300,
						'#61b0bc'
					],
					'circle-stroke-color': 'white',
    				'circle-stroke-width': 1,
    				'circle-opacity': 0.8,
					'circle-radius': {
   						property: "point_count",
   						stops: [
   							[0, 10],
   							[5, 13],
   							[10, 16],
   							[15, 19],
   							[20, 22],
   							[25, 25],
   							[30, 28],
   							[35, 31],
   							[40, 34],
   							[45, 37],
   							[50, 40],
   							[55, 43],
   							[60, 46],
   							[65, 49],
   							[70, 52],
   							[75, 55],
   							[80, 58],
   							[90, 61],
   							[100, 64],
   							[110, 67],
   							[120, 70],
   							[130, 73],
   							[140, 76],
   							[150, 79],
   							[170, 82],
   							[190, 85],
   							[210, 88],
   							[250, 91],
   							[300, 94],
   							[350, 97],
   							[400, 105]
   						]
   					}
				}
			});
		
    	    map.addLayer({
    	        id: 'cluster-count',
    	        type: 'symbol',
    	        source: 'allLocations',
    	        filter: ['has', 'point_count'],
    	        layout: {
    	            'text-field': '{point_count_abbreviated}',
    	            'text-font': ['DIN Offc Pro Medium', 'Arial Unicode MS Bold'],
    	            'text-size': 12
    	        },
    	        paint: {
    	            'text-color': '#fff'
    	        }
    	    });
    	    
    	    map.addLayer({
    	        id: 'unclustered-point',
    	        type: 'symbol',
    	        source: 'allLocations',
    	        filter: ["all", ['!has', 'point_count'], ['!=', 'link', 'nolink'], ['==', 'type', 'project']],
    	        layout: {
					'icon-image': 'pulsing-dot',
					'icon-size': 1.2,
					'icon-rotate': 45
				}
    	        
    	    });
    	    map.addLayer({
    	        id: 'unclustered-point-no-link',
    	        type: 'symbol',
    	        source: 'allLocations',
    	        filter: ["all", ['!has', 'point_count'], ['==', 'link', 'nolink'], ['==', 'type', 'project']],
    	        layout: {
					'icon-image': 'unactive',
					'icon-size': 0.12,
					'icon-rotate': 45
				}
    	        
    	    });
    	     map.addLayer({
    	        id: 'unclustered-point-office',
    	        type: 'symbol',
    	        source: 'allLocations',
    	        filter: ["all", ['!has', 'point_count'], ['==', 'type', 'office']],
    	        layout: {
					'icon-image': 'active',
					'icon-size': 0.22,
					'icon-rotate': 0
				}
    	        
    	    });
        
        
        

        // inspect a cluster on click
        map.on('click', 'clusters', function (e) {
            var features = map.queryRenderedFeatures(e.point, {
                layers: ['clusters']
            });
            var clusterId = features[0].properties.cluster_id;
            map.getSource('allLocations').getClusterExpansionZoom(
                clusterId,
                function (err, zoom) {
                    if (err) return;

                    map.easeTo({
                        center: features[0].geometry.coordinates,
                        zoom: zoom
                    });
                }
            );
        });

        // When a click event occurs on a feature in
        // the unclustered-point layer, open a popup at
        // the location of the feature, with
        // description HTML from its properties.
        map.on('click', 'unclustered-point', function (e, marker) {
	        if(e.features[0].properties.link !== 'nolink'){
            	location.href = e.features[0].properties.link;
            }
        });
        
        
        // Create a popup, but don't add it to the map yet.
		var popup = new mapboxgl.Popup({
			closeButton: false,
			closeOnClick: false
		});
        map.on('mouseenter', 'unclustered-point', function (e) {
	        var coordinates = e.features[0].geometry.coordinates.slice();
            var mag = e.features[0].properties.mag;
            map.getCanvas().style.cursor = 'pointer';
            
            popup.setLngLat(coordinates).setHTML(e.features[0].properties.title).addTo(map);

        });
        map.on('mouseenter', 'unclustered-point-no-link', function (e) {
	        var coordinates = e.features[0].geometry.coordinates.slice();
            var mag = e.features[0].properties.mag;
            
            popup.setLngLat(coordinates).setHTML(e.features[0].properties.title).addTo(map);

        });
        map.on('mouseenter', 'unclustered-point-office', function (e) {
	        var coordinates = e.features[0].geometry.coordinates.slice();
            var mag = e.features[0].properties.mag;
            
            popup.setLngLat(coordinates).setHTML(e.features[0].properties.title).addTo(map);

        });
        map.on('mouseleave', 'unclustered-point', function (e) {
	        popup.remove();
	        map.getCanvas().style.cursor = '';
        });
        map.on('mouseleave', 'unclustered-point-no-link', function (e) {
	        popup.remove();
	        map.getCanvas().style.cursor = '';
        });
        map.on('mouseleave', 'unclustered-point-office', function (e) {
	        popup.remove();
	        map.getCanvas().style.cursor = '';
        });

        map.on('mouseenter', 'clusters', function () {
            map.getCanvas().style.cursor = 'pointer';
        });
        map.on('mouseleave', 'clusters', function () {
            map.getCanvas().style.cursor = '';
        });
    });
    
    setTimeout(function() { 
		// Geographic coordinates of the LineString
		const coordinates = [];
		allLocations.features.forEach(locations => {
			coordinates.push(locations.geometry.coordinates);
		})
// 		console.log(coordinates);
		 
		// Create a 'LngLatBounds' with both corners at the first coordinate.
		const bounds = new mapboxgl.LngLatBounds(
		coordinates[0],
		coordinates[0]
		);
		 
		// Extend the 'LngLatBounds' to include every coordinate in the bounds result.
		for (const coord of coordinates) {
			bounds.extend(coord);
		}
		 
		map.fitBounds(bounds, {
			padding: 30
		});
	}, 1000);
    
		
	}

	function activateSectorMap() {
		marketSectorMapWrap.classList.toggle('active');
		(marketSectorMapWrap.classList.contains('active')) ? window.scrollTo(0, marketSectorMapWrap.offsetTop - 100) : '';
	}
	if(marketSectorMap){
		marketSectorMap.addEventListener('click', loadMapBoxSector('map4', [-122.670798,45.524443]));
		marketSectorMap.addEventListener('click', activateSectorMap);
		marketSectorMapCloseBtn.addEventListener('click', activateSectorMap);
	}
</script>	

