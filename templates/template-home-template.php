<?php
/**
 * Template Name: Home Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<div class="overlay entry-content">
	<div class="video-large d-none d-lg-block">
		<div id="video-no-blur">
			<video width="100%" height="100%" autoplay="" loop="" playsinline="" muted="" class="background_video">
				<source src="" type="video/mp4">
				Your browser does not support the video tag.
			</video>
		</div>
	</div>
	<div class="image_large_mobile">
		<div id="image_div_blur"></div>
	</div>
</div>


<div class="container square-logo">
	<div class="row">
		<div class="col-9 d-none d-lg-block"></div>
		<div class="col-xs-12 col-lg-3">
			<div class="logo_box">
				<!-- Svg Logo -->
				<?php include(plugin_dir_path( __FILE__ )."../elements/am_logo.svg"); ?>
			 	
			</div>
		</div>
	</div>
</div>

<div class="wrapper" id="page">
	<div class="down-arrows-holder">	
		<div class="container">
<!--
			<div class="d-lg-none text_block">
				<div class="row mobile_header_text">
					<div class="col-12">
						<h1 class="headline thin">Explore Beyond.</h1>
					</div>
				</div>
			</div>
-->
			<div class="down-arrows-wrapper">
				<a href="#poem" class="arrow_wrap">
					<div id="cta_arrow">
    	    			<span class="arrow_right primera white"></span>
    	    			<span class="arrow_right segunda white"></span>
    	    		</div>
				</a>
			</div>
		</div>
		<?php 	$homeOverlayImgLight = get_field('overlay_text_images_light_image');
				$homeOverlayImgDark = get_field('overlay_text_images_dark_image');
				if($homeOverlayImgLight): ?>
			<img class="home_overlay_img light" src="<?php echo $homeOverlayImgLight['url']; ?>" alt="<?php  echo $homeOverlayImgLight['title']; ?>"/>
			<?php endif; 
				if($homeOverlayImgDark): ?>
			<img class="home_overlay_img dark" src="<?php echo $homeOverlayImgDark['url']; ?>" alt="<?php  echo $homeOverlayImgDark['title']; ?>"/>
			<?php endif; ?>
	</div>
	<div class="container" id="poem">
		
	<?php while ( have_posts() ) : the_post(); 
		// check for rows (parent repeater)
		if( have_rows('home_page_top_section') ): 
		// loop through rows (parent repeater)
		while( have_rows('home_page_top_section') ): the_row(); ?>
		
		<div class="row relative-inside">
		
			<!-- Poems -->
			<div class="home-excitement col-lg-9 col-md-12 rellax d-lg-block rellax" data-rellax-speed="-3">
				<?php if(get_sub_field('poem_title')): ?>
				<h1 class="poem_title"><?php the_sub_field('poem_title'); ?></h1>
				<?php endif; ?>
				<?php if( have_rows('home_page_poem') ): 
				// loop through rows (parent repeater)
				while( have_rows('home_page_poem') ): the_row(); ?>
			
				<h1 class="poem_bold"><?php the_sub_field('poem_line'); ?></h1>
			
				<?php endwhile; // end of the loop.
				  		endif; // if( get_field('home_page_poem') ): ?>
				<?php if(get_sub_field('button')): ?>
				<a class="link_with_arrows" href="<?php the_sub_field('button'); ?>">Learn More 
					<div id="cta_arrow">
        				<span class="arrow_right primera black"></span>
        				<span class="arrow_right segunda black"></span>
        			</div>
				</a>
				<?php endif; ?>
			</div>
			<div class="col-md-3 newDisciplinesMoved d-none d-lg-block">
				<div class="our-disciplines">
					<!-- Disciplines Nav -->
					<?php $disciplinelinks = get_sub_field('home_discipline_nav');?>
					<?php wp_nav_menu( array(
							    'menu' => $disciplinelinks,
							    'items_wrap' => '<ul class="discipline_nav underline_link_wrap">%3$s</ul>',
							) );?>
					
					<!-- Sector Nav -->
					<?php $sectorlinks = get_sub_field('home_sector_nav');?>
					<?php wp_nav_menu( array(
							    'menu' => $sectorlinks,
							    'items_wrap' => '<ul class="sector_nav underline_link_wrap"><bold>%3$s</bold></ul>',
							) );?>
				</div>
			</div>  
		</div>
		<?php endwhile; // end of the loop. ?>
		<?php endif; // if( get_field('home_page_top_section') ): ?>
		
	<?php endwhile; // end of the loop. ?>
	</div>
	
	<!-- Projects -->
	<div class="four-columns-more story_starter_wrap row toggle_wrapper" >
	<?php if( have_rows('home_page_projects') ): while( have_rows('home_page_projects') ): the_row(); ?>
	        <?php $post_object = get_sub_field('project');
		          $post_featured_image = get_sub_field('project_featured_image'); ?>
	        <?php if( $post_object ): ?>
	            <?php // override $post
	            $post = $post_object;
	            setup_postdata( $post );
	            ?>
	            <?php if($post_featured_image !=='Other'): ?>
	            <?php if($post_featured_image == 'Image 1'): $featuredImage = get_field('top_page_slidershow_slide_one_image'); $photographerCredit = get_field('top_page_slidershow_slide_one_photographer_credit'); endif; ?>
	            <?php if($post_featured_image == 'Image 2'): $featuredImage = get_field('top_page_slidershow_slide_two_image'); $photographerCredit = get_field('top_page_slidershow_slide_two_photographer_credit'); endif; ?>
	            <?php if($post_featured_image == 'Image 3'): $featuredImage = get_field('top_page_slidershow_slide_three_image'); $photographerCredit = get_field('top_page_slidershow_slide_three_photographer_credit'); endif; ?>
	            <?php if($post_featured_image == 'Image 4'): $featuredImage = get_field('top_page_slidershow_slide_four_image'); $photographerCredit = get_field('top_page_slidershow_slide_four_photographer_credit'); endif; ?>
	            <?php if($post_featured_image == 'Image 5'): $featuredImage = get_field('top_page_slidershow_slide_five_image'); $photographerCredit = get_field('top_page_slidershow_slide_five_photographer_credit'); endif; ?>
	            <?php else: 
	            	$featuredImage = get_sub_field('custom_image');
					$photographerCredit = get_sub_field('custom_image_credit'); ?>
	            <?php endif; ?>
		<div class="d-xl-block col-xl-12 home_page_story hover_arrow_story">
			<div class="story_image"> 
				<a href="<?php the_permalink(); ?>">
					<div class="starter-center-cropped lazy"  style="background-image: url(<?php echo $featuredImage; ?>)">
						<?php if($photographerCredit): ?>
						<div class="photo_credit">
							<p>Ⓒ <?php echo $photographerCredit; ?></p>
						</div>
						<?php endif; ?>
						<div class="text_over_image d-lg-none d-xl-none">
							<div class="container">
								<div class="row col-12">
									<h3 class="shimmer"><?php the_title(); ?></h3>
								</div>
							</div>
						</div>
					</div>
					<div class="shimmer tumb_loading"></div>
				</a>
			</div>
			<?php if( have_rows('top_project_content') ): while( have_rows('top_project_content') ): the_row(); 
						$topprojecttitle = get_sub_field('project_subtitle');
						$topprojectcontent = get_sub_field('project_content');
						?>
			<div class="container project_content_wrap">
				<div class="row d-none d-lg-flex">
					<div class="col-md-10">
						<div class="d-none d-lg-block">
							<h3 class="shimmer bold uppercase"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</div>
					</div>
					<div class="col-md-2 arrow_wrap">
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
								<h4><a href="<?php the_permalink(); ?>"><?php echo $topprojecttitle; ?></a></h4>
								<p class="two_col"><?php echo $topprojectcontent; ?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="row d-lg-none">
					<div class="col-12">
						<h4><?php echo $topprojecttitle; ?></h4>
						<p><?php echo substr($topprojectcontent, 0, 250) . "..."; ?></p>
					</div>
					<div class="col-12 arrow_wrap">
						<a href="<?php the_permalink(); ?>">
        					<div id="cta_arrow">
        						<span class="arrow_right primera black"></span>
        						<span class="arrow_right segunda black"></span>
        					</div>
						</a>
					</div>
				</div>
			</div>
			<?php endwhile; endif; // if( get_field('top_project_content') ): ?>
		</div>
		<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
	    <?php endif; ?>
	    <?php endwhile; 
		    else:
	    ?>
		<div class="container no_projects">
			<div class="row">
				<div class="col-12">
					<p>We don't have these types of projects at this location—yet.</p>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
	

	
	<!-- Bottom Content -->
	<div class="container home_bottom_wrapper">
	<?php while ( have_posts() ) : the_post(); 
		// check for rows (parent repeater)
		if( have_rows('home_sector_bottom_section') ): 
		// loop through rows (parent repeater)
		while( have_rows('home_sector_bottom_section') ): the_row(); ?>
			<div class="row col-12">
				<h5><?php the_sub_field('section_title'); ?></h5>
			</div>
			<!-- Column Content -->
			<?php if( have_rows('bottom_column_content') ): 
			// loop through rows (parent repeater)
			while( have_rows('bottom_column_content') ): the_row(); ?>
			
			<div class="row">
				<div class="col-lg-6">
					<hr>
				<!-- Left Column -->
				<?php if( have_rows('left_column') ): 
				// loop through rows (parent repeater)
				while( have_rows('left_column') ): the_row(); ?>
				
					<div class="home-pillar">
						<h6><?php the_sub_field('column_subtitle'); ?></h4>
						<h5><?php the_sub_field('column_title'); ?></h5>
						<div class="pillar-copy"><?php the_sub_field('column_content'); ?></div>
						
					</div>
				<?php endwhile; // end of the loop.
			  	      endif; // if( get_field('left_column') ): ?>
				</div>
			  	<div class="col-lg-6">
					<hr>
			  	<!-- Right Column -->
				<?php if( have_rows('right_column') ): 
				// loop through rows (parent repeater)
				while( have_rows('right_column') ): the_row(); ?>
				
					<div class="home-pillar">
						<h6><?php the_sub_field('column_subtitle'); ?></h6>
						<h5><?php the_sub_field('column_title'); ?></h5>
						<div class="pillar-copy"><?php the_sub_field('column_content'); ?></div>
						<?php endwhile; // end of the loop.
			  	    		endif; // if( get_field('right_column') ): ?>
					</div>
			  	</div>
			</div>
			  	
			
			<?php endwhile; // end of the loop.
			  	  endif; // if( get_field('bottom_column_content') ): ?>
		
	<?php endwhile; // end of the loop. ?>
	<?php endif; // if( get_field('home_sector_bottom_section') ): ?>
	<?php endwhile; // end of the loop. ?>
	
	
	
	</div>
	<?php if(get_field('map_header')): ?>
	<div class="container home_map_header">
		<div class="row col-12">
			<h6><?php the_field('map_header'); ?></h6>
		</div>
<!-- 		<hr> -->
	</div>
	<?php endif; ?>
<!-- Home Page Map -->
	<?php if(get_field('activate_map')): ?>
	<?php include(plugin_dir_path( __FILE__ )."../template-parts/home-map.php"); ?>
	<?php endif; ?>

</div><!-- #site-content -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/rellax/1.12.1/rellax.min.js"></script>
<!--
	<script>
		const storyStarters = document.querySelectorAll('.home_page_story');
/*
		storyStarters.forEach(story => {
			story.setAttribute('data-rellax-speed', '-3');
		});
*/
		function addParallaxStory(){
// 			console.log(storyStarters.getBoundingClientRect().top);
			storyStarters.forEach(story => {
			if(story.getBoundingClientRect().top < -100 && !story.classList.contains('rellax')){
				story.classList.add('rellax');
// 				story.setAttribute('data-rellax-speed', '-3');
			}
			});
		}
		
		document.addEventListener('scroll', addParallaxStory)
		
	</script>
-->
<script>
   const seoDescriptionData=(method, url, data)=> {
   
       return fetch(url, {
               headers: {
                   'Content-Type': 'text/plain'
               },
           }
       ) .then(response=> {
               return response.json();
           }
       );
   };
   
   
   let videoFiles=[];
   
   const getData=()=> {
	   if(window.innerWidth >= 768){
       		seoDescriptionData('GET', 'https://cdn.jwplayer.com/v2/playlists/o4UV5tLQ') .then(responseData=> {
   	   		
       		        const fileId=responseData.playlist.map(videoFile=> {
       		                videoFiles.push(videoFile.sources[6].file);
       		            }
       		        );
   	   		
       		        const videoHome=document.querySelector('.background_video');
       		        videoFiles=videoFiles;
       		        let randomVideo=Math.floor(Math.random() * videoFiles.length);
       		        videoHome.src=videoFiles[randomVideo];
       		    }
   	   		
       		);
       }
   };
   window.addEventListener('load', getData);
   
   const stylesheet_directory_uri = "<?php echo get_stylesheet_directory_uri(); ?>";
   const imageIDs = ['urbanlear-2.jpg', 'momentofpause.jpg', 'raindrop.jpg', 'urbanleaf.jpg', 'staircase.jpg', 'lightwall.jpg', 'fireplace.jpg', 'fan.jpg', 'light.jpg'];
   const imageElement = document.querySelector('#image_div_blur');
   					
   function getRandomNumber(min, max) {
       let step1Image = max - min + 1;
       let step2Image = Math.random() * step1Image;
       let resultImage = Math.floor(step2Image) + min;
   
       return resultImage;
   }
   let index = getRandomNumber(0, imageIDs.length-1);
   const resultImage = 'background-image: url(' + stylesheet_directory_uri + '/assets/images/' + imageIDs[index] + ')';
   console.log(resultImage);
   function loadFullImage() {
   	if(window.innerWidth <= 768){
   		imageElement.setAttribute("style", resultImage);
   	}else{
   		imageElement.removeAttribute("style");
   	}
   }
   window.addEventListener('resize', loadFullImage);
   window.addEventListener('load', loadFullImage);
   
   
   const homePageStories = document.querySelectorAll('.story_starter_wrap .home_page_story');
//    console.log(homePageStories);
   
   function paralaxStories() {
	   let windowHeight = window.innerHeight;
/*
	   homePageStories[0].removeAttribute('data-rellax-speed');
	   homePageStories[1].setAttribute('data-rellax-speed', '2');
	    homePageStories[2].setAttribute('data-rellax-speed', '4');
*/
	   console.log(homePageStories[0].getBoundingClientRect().top);
	   console.log(windowHeight);

	   

	   homePageStories.forEach(story => {
		   if(story.getBoundingClientRect().top > 0){
	   			story.style.paddingTop = (story.getBoundingClientRect().top / 2.5) + 'px';
	   		}else{
	   			story.style.paddingTop = '0px';
	   		}
/*
		   if(story.getBoundingClientRect().top <= windowHeight && story.getBoundingClientRect().top > 0){
			   story.style.transform = 'translate(0px, ' + story.getBoundingClientRect().top + 'px)';
		   }else{
			   story.style.transform = 'translate(0px, 100%)';
		   }
*/
	   })
   }
   
   window.addEventListener('scroll', paralaxStories);
   window.addEventListener('load', paralaxStories);
   
   
   
   const paralaxDiv = document.querySelector('#poem .home-excitement');
   
   function removeParalax(){
   	if(window.innerWidth <= 992){
   		paralaxDiv.classList.remove('rellax');
   		paralaxDiv.removeAttribute('style');
   	}else{
   		paralaxDiv.classList.add('rellax');
   	}
   }
   
   window.addEventListener('load', removeParalax);
   window.addEventListener('resize', removeParalax);
</script>

<?php get_footer(); ?>
