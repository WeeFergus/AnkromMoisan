<?php
/**
 * Template Name: Home Page
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();

// get page top array
$home_images_array = array();
while( have_rows('home_page_top_section') ) { the_row();
	$home_images = get_sub_field("home_images");
		while( have_rows('home_images') ) { the_row();
        $home_image = get_sub_field('home_image');
        $home_image_caption = get_sub_field('home_image_caption');
        $home_image_link = get_sub_field('home_image_link');
				$home_images_array[] = array('image'=>$home_image,'caption'=>$home_image_caption,'link'=>$home_image_link);
		}
}


?>

<div class="overlay entry-content">
	<div class="video-large d-none d-lg-block">
		<div id="video-no-blur"> 
			<div class="homecaption"></div>
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
	<div class="down-arrows-holder container">
		<div class="d-lg-none text_block">
			<div class="row mobile_header_text">
				<div class="col-12">
					<h1 class="headline thin">Explore</h1>
				</div>
			</div>
		</div>
		<div class="down-arrows-wrapper">
			<a href="#poem" class="arrow_wrap">
				<div id="cta_arrow">
        			<span class="arrow_right primera white"></span>
        			<span class="arrow_right segunda white"></span>
        		</div>
			</a>
		</div>
	</div>
	
	<div class="container" id="poem">
		
	<?php while ( have_posts() ) { the_post(); 
		// check for rows (parent repeater)
		if( have_rows('home_page_top_section') ){ 
		// loop through rows (parent repeater)
		while( have_rows('home_page_top_section') ){ the_row(); ?>
		
		<div class="row relative-inside">
		
			<!-- Poems -->
			<div class="home-excitement col-lg-9 col-md-12 rellax d-lg-block rellax" data-rellax-speed="-3">
			<?php if( have_rows('home_page_poem') ){ 
			// loop through rows (parent repeater)
			while( have_rows('home_page_poem') ){ the_row(); ?>
			
				<h1><?php the_sub_field('poem_line'); ?></h1>
			
			<?php } // end of the loop.
				  } // if( get_field('home_page_poem') ): ?>
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


		<?php } // end of the loop. ?>
		<?php } // if( get_field('home_page_top_section') ): ?>
		
	<?php } // end of the loop. ?>
	</div>

</div>



<?php
////////////////////////////// GRID //////////////////////////////////

// get grid array
$home_grid_array = array();
while( have_rows('home_page_grid') ) { the_row();
	$home_images = get_sub_field("home_grid_images");
		while( have_rows('home_grid_images') ) { the_row();
        $home_grid_image = get_sub_field('home_grid_image');
        $home_grid_caption = get_sub_field('home_grid_caption');
        $home_grid_link = get_sub_field('home_grid_link');
				$home_grid_array[] = array('image'=>$home_grid_image,'caption'=>$home_grid_caption,'link'=>$home_grid_link);
		}
}
?>

<div class="container grid_project_wrap toggle_wrapper marketsector_grid">

	<div class="row col-12 studios-title">
				<h6>STUDIOS</h6>
	</div>
	
	<div class="row project_wrap">

<?php

foreach($home_grid_array as $grid){
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


<?php

///////////////////////////// END GRID //////////////////////////////////

?>

<style>
.studios-title{
	margin-bottom: 35px;
}
.arrow_wrap a {
    margin-top: -5px;
}
.homecaption {
    position: absolute;
    bottom: 20px;
    left: 20px;
    font-size: 16px;
    color: #fff;
		font-style: italic;
    text-shadow: 1px 1px 0px #000;
    /* background: #ffffff88;*/
    padding: 10px;
		z-index:1000;
		display:inline-block;
		cursor:pointer;
}
.homecaptiontext{
    display:inline-block;
}
.hometoparrow{
	display:inline-block;
	height:20px;
	margin-left:14px;
}

.nav_button .nav_btn_text span {
    text-shadow: 1px 1px 1px #000;
}

.arrow_wrap-hover{
    animation-name: bounceAlpha;
    animation-duration:1.4s;
    animation-iteration-count:infinite;
    animation-timing-function:linear;
}
.arrow_wrap-hover-primera{
    animation-name: bounceAlpha;
    animation-duration:1.4s;
    animation-delay:0.2s;
    animation-iteration-count:infinite;
    animation-timing-function:linear;
}

.underline_link_hover:after {
	animation: portSliderLine 0.45s cubic-bezier(.15, .75, .5, 1) forwards;
}
.project-center-cropped.effect1 {
	transition:1s ease-in-out;
}
/* potential hover affect */
.project-center-cropped.effect1:hover {
    transform: scale(1.1);
}

@media screen and (max-width: 992px) {
    .arrow_wrap a {
        margin-top: -10px;
    }
}
</style>
	









<!-- Featured Section -->
<?php while ( have_posts() ) { the_post(); ?>
<div class="container">
	<div id="featuredsection" class="four-columns-more story_starter_wrap row toggle_wrapper" >

	<?php if( have_rows('featured_section') ){ while( have_rows('featured_section') ){ 
		the_row(); ?>

		<?php 
		
		$featured_section_title = get_sub_field('featured_section_title');
		$featured_section_title_sanitized = str_replace('"',"'",$featured_section_title);
		$featured_section_subtitle = get_sub_field('featured_section_subtitle');
		$featured_section_image = get_sub_field('featured_section_image');		
		$featured_section_image_photographer = get_sub_field('featured_section_image_photographer');
		$featured_section_link_1 = get_sub_field('featured_section_link_1');
		$featured_section_link_1_target = get_sub_field('featured_section_link_1_target');
		$featured_section_link_1_text = get_sub_field('featured_section_link_1_text');	
	  $featured_section_link_1_text = str_replace(" ","&nbsp;",$featured_section_link_1_text);
		$featured_section_link_2 = get_sub_field('featured_section_link_2');
		$featured_section_link_2_target = get_sub_field('featured_section_link_2_target');
		$featured_section_link_2_text = get_sub_field('featured_section_link_2_text');
	  $featured_section_link_2_text = str_replace(" ","&nbsp;",$featured_section_link_2_text);
		$featured_image_pos = get_sub_field("featured_image_pos");
		$featured_image_pos_tablet = get_sub_field("featured_image_pos_tablet");
		$featured_image_pos_mobile = get_sub_field("featured_image_pos_mobile");

		?>
		<div class="starter-center-cropped lazy fullwidth" id="featuredimage" title="<?php echo $featured_section_title_sanitized;?>"  style="background-image: url(<?php echo $featured_section_image; ?>)">
		 <div class="d-xl-block col-xl-12 home_page_story ">
			<!-- <div class="story_image"> 
						<?php if($featured_section_image_photographer) { ?>
						<div class="photo_credit">
							<p>Ⓒ <?php echo $featured_photographerCredit; ?></p>
						</div>
						<?php } ?>
			</div> -->
		 </div>
		</div>

			<div class="container project_content_wrap featuredtext ">
				<div class="row d-none- d-lg-flex featuretextsection">
					<div class="col-md-10">
						<div class="d-none- d-lg-block">
							<h1 class="shimmer bold uppercase featured"><?php echo $featured_section_title;?></h1>
									<h2 class="shimmer featured"><?php echo $featured_section_subtitle;?></h2>

						</div>
					</div>

					<div>
						<br clear="all">
					</div>


					<div class="featured-link hover_arrow_story">
						<div class="featured-link-section">
							<h3 class="shimmer bold uppercase"><a href="<?php echo $featured_section_link_1;?>" target="<?php echo $featured_section_link_1_target;?>"><?php echo $featured_section_link_1_text;?></a></h3>
						</div>
						<div class="arrow_wrap featuredarrow">
						<a href="<?php echo $featured_section_link_1; ?>" target="<?php echo $featured_section_link_1_target;?>">
        					<div id="cta_arrow" class="featured-cta-arrow">
        						<span class="arrow_right primera white"></span>
        						<span class="arrow_right segunda white"></span>
        					</div>
						</a>
						</div>
					</div>


					<div class="featured-link hover_arrow_story">
						<div class="featured-link-section">
							<h3 class="shimmer bold uppercase"><a href="<?php echo $featured_section_link_2;?>" target="<?php echo $featured_section_link_2_target;?>"><?php echo $featured_section_link_2_text;?></a></h3>
						</div>
						<div class="arrow_wrap featuredarrow">
						<a href="<?php echo $featured_section_link_2; ?>" target="<?php echo $featured_section_link_2_target;?>">
        					<div id="cta_arrow" class="featured-cta-arrow">
        						<span class="arrow_right primera white"></span>
        						<span class="arrow_right segunda white"></span>
        					</div>
						</a>
						</div>
					</div>


			</div>
			</div>		
	 </div>

	<?php } ?>
	<?php } ?>

	</div> 

</div>

	<style>
		.fullwidth{
			width:100% !important;
		}

		.featured-link {
			display: inline-block;
			width: 45%;
			padding-right: 15px;
			padding-left: 15px;
		}

		.featured-link-section {
				display: inline-block;
				vertical-align: middle;
		}



		.featuredarrow {
			max-width: none;
			display: inline-block;
			margin-left: 20px;
			height: 20px;
		}

		#cta_arrow.featured-cta-arrow{
			width:200px;
		}

		h1.shimmer.bold.uppercase {
			height: 40px;
			display: inline-block;
		}
		h2.shimmer.featured {
			height: 40px;
		}
		h3.shimmer.bold.uppercase a {
			line-height: 20px;
			margin-top: 10px;
			display: inline-block;
		}

		#featuredsection {
			margin-top:80px;
			margin-bottom:120px;
			position: relative;
		}



		.featuretextsection{
			max-width:1140px;
			margin:auto;
			text-align:left;
		}

		@media(max-width:1199px){
			.featuretextsection{
				max-width: 960px;
			}
		}

		@media (max-width: 999px) {
			.featuretextsection{
				max-width: 720px;
			}
		}

		.col-md-4.featured {
			flex: none;
			display: inherit;
			margin-right: 100px;
		}

		.container.project_content_wrap.featuredtext {
			margin-top: -170px;
			z-index: 10;
			background: #00000080;
			max-width: none;
			color: #fff;
			/* padding: 0px 15%; */
		}
		.featuredarrow{
			max-width: none;
		}


		<?php
				
		if ($featured_image_pos!='') {
				echo '#featuredimage {' . $featured_image_pos . '}';
		}
		
		if ($featured_image_pos_tablet!='') {
		    echo PHP_EOL;
				echo '@media(max-width:992px) {#featuredimage {' . $featured_image_pos_tablet . '}}';
		}
		
		if ($featured_image_pos_mobile!='') {
		    echo PHP_EOL;
				echo '@media(max-width:700px) {#featuredimage {' . $featured_image_pos_mobile . '}}';
		}

		?>

		@media(max-width:992px) {
			.featured-link {
				width:90%;
				margin-top: 20px;
			}
			.container.project_content_wrap.featuredtext {
					margin-top: -280px;
			}
			h2.shimmer.featured {
				line-height: 20px !important;
			}
		}

		@media screen and (max-width: 992px) {
			.featuredarrow.arrow_wrap a,.featuredarrow.arrow_wrap section {
				margin-top: 0px;
				margin-bottom: 0px !important;
			}
		}


		@media(max-width:700px) {
			.col-md-4.featured {
				
			 }
		}

	</style>
<?php } ?>
<!-- End Featured Section -->




	
	
	<!-- Bottom Content -->
	<div class="container home_bottom_wrapper">
	<?php while ( have_posts() ) { the_post(); 
		// check for rows (parent repeater)
		if( have_rows('home_sector_bottom_section') ){ 
		// loop through rows (parent repeater)
		while( have_rows('home_sector_bottom_section') ){ the_row(); ?>
			<div class="row col-12">
				<h5><?php the_sub_field('section_title'); ?></h5>
			</div>
			<!-- Column Content -->
			<?php if( have_rows('bottom_column_content') ){ 
			// loop through rows (parent repeater)
			while( have_rows('bottom_column_content') ){ the_row(); ?>
			
			<div class="row">
				<div class="col-lg-6">
					<hr>
				<!-- Left Column -->
				<?php if( have_rows('left_column') ){ 
				// loop through rows (parent repeater)
				while( have_rows('left_column') ){ the_row(); ?>
				
					<div class="home-pillar">
						<h6><?php the_sub_field('column_subtitle'); ?></h4>
						<h5><?php the_sub_field('column_title'); ?></h5>
						<div class="pillar-copy"><?php the_sub_field('column_content'); ?></div>
						<div class="toggle_wrapper">
            				<div class="toggle_item_wrap open">
                				<!-- <div class="toggle_text">
									<span class="expando_icon"></span>
								</div> -->
                				<div class="toggled_text">
									<div class="row toggle_title">
										<h5 class="col-12"><?php the_sub_field('expando_title'); ?></h5>
									</div>
						
									<!-- Left Column Facts Repeater -->
									<?php if( have_rows('about_facts') ){ 
									// loop through rows (parent repeater)
									while( have_rows('about_facts') ){ the_row(); ?>
									<div class="row align-items-center">
										<h6 class="col-4 ultra text-right"><?php the_sub_field('number'); ?></h6>
										<h5 class="col-8"><?php the_sub_field('text'); ?></h5>
									</div>
									<?php } // end of the loop.
			  	      	 			 } // if( get_field('about_facts') ): ?>
								</div>
            				</div>
						</div>
					</div>
				<?php } // end of the loop.
			  	      } // if( get_field('left_column') ): ?>
				</div>
			  	<div class="col-lg-6">
					<hr>
			  	<!-- Right Column -->
				<?php if( have_rows('right_column') ){ 
				// loop through rows (parent repeater)
				while( have_rows('right_column') ){ the_row(); ?>
				
					<div class="home-pillar">
						<h6><?php the_sub_field('column_subtitle'); ?></h6>
						<h5><?php the_sub_field('column_title'); ?></h5>
						<div class="pillar-copy"><?php the_sub_field('column_content'); ?></div>
						<div class="toggle_wrapper">
            				<div class="toggle_item_wrap open">
                				<!-- <div class="toggle_text">
									<span class="expando_icon"></span>
								</div> -->
                				<div class="toggled_text">
									<div class="row toggle_title">
										<h5 class="col-12"><?php the_sub_field('expando_title'); ?></h5>
									</div>
				
									<!-- Left Column Facts Repeater -->
									<?php if( have_rows('about_facts') ){ 
									// loop through rows (parent repeater)
									while( have_rows('about_facts') ){ the_row(); ?>
									<div class="row align-items-center">
										<h6 class="col-4 ultra text-right"><?php the_sub_field('number'); ?></h6>
										<h5 class="col-8"><?php the_sub_field('text'); ?></h1>
									</div>
									<?php } // end of the loop.
			  	    				  	  } // if( get_field('about_facts') ): ?>
								</div>
							</div>
							<?php } // end of the loop.
			  	    		} // if( get_field('left_column') ): ?>
						</div>
					</div>
			  	</div>
			</div>
			  	
			
			<?php } // end of the loop.
			  	  } // if( get_field('bottom_column_content') ): ?>
		
	<?php } // end of the loop. ?>
	<?php } // if( get_field('home_sector_bottom_section') ): ?>
	<?php } // end of the loop. ?>
	</div>


</div><!-- #site-content -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/rellax/1.12.1/rellax.min.js"></script>
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


<?php ////////////// Top Images and Sliders ///////////////////////  ?>
<script>
jQuery(function() {

	const ee = getURLParameter('ee'); 
	const eee = getURLParameter('eee'); 
	const eeee = getURLParameter('eeee'); 
	var eeenum = 50;
	var eeeenum = 3;
	var incrementcount = 1;
	var incrementlimit = 50;
	var animation_str = "2s";
	var transition_str = "2s";

	//console.log("a incrementcount: "+incrementcount + " incrementlimit: " + incrementlimit);

	var images_array = <?php echo json_encode($home_images_array); ?>;

	var array_length = images_array.length;
	var screenwidth = jQuery(window).width();

	var random_key = Math.floor(Math.random() *  array_length);
	//if (ee == '3') {
	//	var use_key = 0; // start at 0 with ee 3
	//} else {
	var use_key = random_key;
	//}
	var use_image = images_array[use_key]['image'];
	var use_caption = images_array[use_key]['caption'];
	var use_link = images_array[use_key]['link'];


	var captionarrows = '<div class="arrow_wrap hometoparrow"><a href="" class="market_sector_arrow_link"><div id="cta_arrow"><span class="arrow_right primera white hometoparrow1"></span><span class="arrow_right segunda white hometoparrow2"></span></div></a></div>';

	if (use_link != '') { 
			use_caption = '<div class="homecaptiontext">' + use_caption + "</div>";
			//use_caption = '<div class="homecaptiontext">' + use_caption + "</div>" + captionarrows;
	} else {
			use_caption = '<div class="homecaptiontext">' + use_caption + "</div>";
	}

	jQuery(".homecaption").html(use_caption);

// figure out when the mouse is over the link and proceed accordingly
	function checklink()  {
		if (use_link != '') { 
			//console.log("use_link:" + use_link);
		jQuery("div#page").on( "mousemove", function(event) {
			var mouseX = event.pageX;
			var mouseY = event.pageY;
			var divOffset = jQuery(".homecaption").position();
			var divTop = divOffset.top;
			var divLeft = divOffset.left;
			var divBottom = divTop + 30;
			var divRight = divLeft + 400;
			//console.log(mouseX + ' ' + mouseY);
			//console.log(divLeft + ' ' + divRight);
			//console.log(divTop + ' ' + divBottom);
			if (use_link != '') { 
			 if ((mouseX >= divLeft) && (mouseX <= divRight) && (mouseY >= divTop) && (mouseY <= divBottom)) {
				jQuery("div#page").css("cursor","pointer");
				jQuery(".hometoparrow1").addClass("arrow_wrap-hover-primera");
				jQuery(".hometoparrow2").addClass("arrow_wrap-hover");		
				jQuery(".homecaptiontext").addClass("underline_link");		
				jQuery(".homecaptiontext").addClass("underline_link_hover");		
			
				jQuery("div#page").on( "click", function() {
						window.location.replace(use_link);		
				});
			  }	else {
				jQuery("div#page").css("cursor","default");		
				//jQuery(".hometoparrow1").removeClass("arrow_wrap-hover-primera");
				//jQuery(".hometoparrow2").removeClass("arrow_wrap-hover");		
				jQuery(".homecaptiontext").removeClass("underline_link");		
				jQuery(".homecaptiontext").removeClass("underline_link_hover");	
				//jQuery("div#page").on( "click", function() { return false;	});
				}
			}
		});
		} else {
			//console.log("use_link is empty" );
			jQuery("div#page").css("cursor","default");		
			//jQuery(".hometoparrow1").removeClass("arrow_wrap-hover-primera");
			//jQuery(".hometoparrow2").removeClass("arrow_wrap-hover");		
			jQuery(".homecaptiontext").removeClass("underline_link");		
			jQuery(".homecaptiontext").removeClass("underline_link_hover");		
			jQuery("div#page").on( "mousemove", function(event) { return false});
			//jQuery("div#page").on( "click", function() { return false;	});
		}
	}

	jQuery("#video-no-blur").css("background-image","url('" + use_image + "')");
	
	checklink();



function getURLParameter(name) {
  const urlParams = new URLSearchParams(window.location.search);
  const paramValue = urlParams.get(name);
  return paramValue ? decodeURIComponent(paramValue).replace(/[^a-zA-Z0-9]/g, '') : null;
}

// preload images
function preloadImage(url) {
  const img = new Image();
  img.src = url;
}


// Example usage:
//preloadImage("path/to/your/image.jpg");


if (ee == '1') {
	// mousemove slider

	// preload slides
	jQuery.each(images_array, function(index, val) {
		preloadImage(val["image"]);
		console.log(val["image"] + " preloaded");
	});


	var eeenum = 60;
	var incrementcount = 1;
	var incrementlimit = 60;
	if (eee != '') { // custom incrementlimit
		if (Math.trunc(eee) != 0) {
			eeenum = Math.trunc(eee); // eee is the number of times of mousemove before the next slide. Default to 60
			incrementlimit = eeenum;
		}
	}
	//console.log("b incrementcount: "+incrementcount + " incrementlimit: " + incrementlimit);

	eeeenum = 2;
	if (eeee != '') { // custom transition speed
		if ( Math.trunc(eeee)!='') {
			eeeenum = Math.trunc(eeee); // eeee is the seconds for each transition. Default to 2
		}
	}
	
//console.log("images_array length "+thisimg);

	animation_str = "" + eeeenum.toString() +"s";
	transition_str = "" + eeeenum.toString() +"s";
	//console.log("transition_str:" + transition_str);
	jQuery("#video-no-blur").css("animation",animation_str);
	jQuery("#video-no-blur").css("transition",transition_str);
	//jQuery(".homecaption ").css("animation",animation_str);
	jQuery(".homecaption ").css("transition",transition_str);

	// mousemove to increment image, caption and link
		jQuery("div#page").on( "mousemove", function() {
			incrementcount++;
			//console.log("c incrementcount: "+incrementcount + " incrementlimit: " + incrementlimit);
				if (incrementcount > incrementlimit) { 
					incrementcount = 1;
					//console.log("reached limit incrementcount: "+incrementcount);
					use_key++;
					if (use_key >= array_length) { use_key = 0; }
					console.log("use_key ee1: " + use_key);
					use_image = images_array[use_key]['image'];
					use_caption = images_array[use_key]['caption'];
					use_link = images_array[use_key]['link'];
					use_caption = '<div class="homecaptiontext">' + use_caption + "</div>";
					jQuery("#video-no-blur").css("background-image","url('" + use_image + "')");
					jQuery(".homecaption").html(use_caption);

					jQuery("div#page").css("cursor","default");		
					jQuery(".hometoparrow1").removeClass("arrow_wrap-hover-primera");
					jQuery(".hometoparrow2").removeClass("arrow_wrap-hover");		
					jQuery(".homecaptiontext").removeClass("underline_link");		
					jQuery(".homecaptiontext").removeClass("underline_link_hover");		
					jQuery("div#page").on( "mousemove", function(event) { return false});
					//jQuery("div#page").on( "click", function() { return false;	});

					checklink();
				}
		});

		// bonus effect
		jQuery(".project-center-cropped").addClass("effect1");
}


if (ee == '2') {
	// timed fade-in slider

	// https://ankrommoisan.com/?ee=3&eee=12000&eeee=30

// preload slides
jQuery.each(images_array, function(index, val) {
	preloadImage(val["image"]);
  console.log(val["image"] + " preloaded");
});


	var eeeenum = 5;  // transition in seconds
	var animation_str = "" + eeeenum.toString() +"s";
	var transition_str = "" + eeeenum.toString() +"s";
	//console.log("transition_str:" + transition_str);
	jQuery("#video-no-blur").css("animation",animation_str);
	jQuery("#video-no-blur").css("transition",transition_str);
	//jQuery(".homecaption ").css("animation",animation_str);
	jQuery(".homecaption ").css("transition",transition_str);

	var timernum = 10000; // milliseconds between slides

	// mousemove to increment image, caption and link
		function nextslide() {
					use_key++;
					if (use_key >= array_length) { use_key = 0; }
					
					use_image = images_array[use_key]['image'];
					use_caption = images_array[use_key]['caption'];
					use_link = images_array[use_key]['link'];
					if (use_link != '') { 
						//use_caption = use_caption + captionarrows;
					}
					jQuery("#video-no-blur").css("background-image","url('" + use_image + "')");
					jQuery(".homecaption").html(use_caption);
					checklink();
		}

		setInterval(nextslide, timernum ); 

		// bonus effect
		jQuery(".project-center-cropped").addClass("effect1");
}





if (ee == '3') {
	// timed fade-in slider combined with mousemove slider

	// preload slides
	jQuery.each(images_array, function(index, val) {
		preloadImage(val["image"]);
		console.log(val["image"] + " preloaded");
	});


	var eeenum = 60;
	var incrementcount = 1;
	var incrementlimit = 60;
	if (eee != '') { // custom incrementlimit
		if (Math.trunc(eee) != 0) {
			eeenum = Math.trunc(eee); // eee is the number of times of mousemove before the next slide. Default to 60
			incrementlimit = eeenum;
		}
	}
	//console.log("b incrementcount: "+incrementcount + " incrementlimit: " + incrementlimit);

	eeeenum = 2;
	if (eeee != '') { // custom transition speed
		if ( Math.trunc(eeee)!='') {
			eeeenum = Math.trunc(eeee); // eeee is the seconds for each transition. Default to 2
		}
	}
	
//console.log("images_array length "+thisimg);

	animation_str = "" + eeeenum.toString() +"s";
	transition_str = "" + eeeenum.toString() +"s";
	//console.log("transition_str:" + transition_str);
	jQuery("#video-no-blur").css("animation",animation_str);
	jQuery("#video-no-blur").css("transition",transition_str);
	//jQuery(".homecaption ").css("animation",animation_str);
	jQuery(".homecaption ").css("transition",transition_str);

	// mousemove to increment image, caption and link
		jQuery("div#page").on( "mousemove", function() {
			incrementcount++;
			//console.log("c incrementcount: "+incrementcount + " incrementlimit: " + incrementlimit);
				if (incrementcount > incrementlimit) { 
					incrementcount = 1;
					//console.log("reached limit incrementcount: "+incrementcount);
					use_key++;
					if (use_key >= array_length) { use_key = 0; }
					console.log("use_key ee1: " + use_key);
					use_image = images_array[use_key]['image'];
					use_caption = images_array[use_key]['caption'];
					use_link = images_array[use_key]['link'];
					use_caption = '<div class="homecaptiontext">' + use_caption + "</div>";
					jQuery("#video-no-blur").css("background-image","url('" + use_image + "')");
					jQuery(".homecaption").html(use_caption);

					jQuery("div#page").css("cursor","default");		
					jQuery(".hometoparrow1").removeClass("arrow_wrap-hover-primera");
					jQuery(".hometoparrow2").removeClass("arrow_wrap-hover");		
					jQuery(".homecaptiontext").removeClass("underline_link");		
					jQuery(".homecaptiontext").removeClass("underline_link_hover");		
					jQuery("div#page").on( "mousemove", function(event) { return false});
					//jQuery("div#page").on( "click", function() { return false;	});

					checklink();
				}
		});

	eeeenum = 5;  // transition in seconds
	animation_str = "" + eeeenum.toString() +"s";
	transition_str = "" + eeeenum.toString() +"s";
	//console.log("transition_str:" + transition_str);
	jQuery("#video-no-blur").css("animation",animation_str);
	jQuery("#video-no-blur").css("transition",transition_str);
	//jQuery(".homecaption ").css("animation",animation_str);
	jQuery(".homecaption ").css("transition",transition_str);

	var timernum = 10000; // milliseconds between slides

	// mousemove to increment image, caption and link
		function nextslide() {
					use_key++;
					if (use_key >= array_length) { use_key = 0; }
					
					use_image = images_array[use_key]['image'];
					use_caption = images_array[use_key]['caption'];
					use_link = images_array[use_key]['link'];
					if (use_link != '') { 
						//use_caption = use_caption + captionarrows;
					}
					jQuery("#video-no-blur").css("background-image","url('" + use_image + "')");
					jQuery(".homecaption").html(use_caption);
					checklink();
		}

		setInterval(nextslide, timernum ); 

		// bonus effect
		jQuery(".project-center-cropped").addClass("effect1");
}






if (ee == '5') {
	// horizontal mousemove slider

	var screensection =  Math.floor(screenwidth / array_length); // divide the screen width by number of images
	// mousemove to increment image, caption and link

				eeeenum = 1;
				if (eeee != '') { // custom transition speed
						eeeenum = Math.floor(eeee) / 10;
				}

				if (eee == "fade") {
						if (eeeenum!=0) {
							var animation_str = "" + eeeenum.toString() +"s";
							var transition_str = "" + eeeenum.toString() +"s";
						}
						//console.log("transition_str:" + transition_str);
						jQuery("#video-no-blur").css("animation",animation_str);
						jQuery("#video-no-blur").css("transition",transition_str);
						//jQuery(".homecaption ").css("animation",animation_str);
						jQuery(".homecaption ").css("transition",transition_str);
				}

		jQuery("div#page").on( "mousemove", function(event) {
				var mouseX = event.pageX;
				//console.log('use_key:' + use_key);
				//console.log('mouseX:' + mouseX);

				var thissection =  Math.floor(mouseX /screensection);
				//console.log('thissection:' + thissection);

				if (thissection != use_key) { // if the mouse has moved to a new section then change the image
						use_key = thissection;		
						use_image = images_array[use_key]['image'];
						use_caption = images_array[use_key]['caption'];
						use_link = images_array[use_key]['link'];
						if (use_link != '') { 
							//use_caption = use_caption + captionarrows;
						}
						if (use_link == '') {
							jQuery("div#page").css("cursor","default");
						} else {
							jQuery("div#page").css("cursor","pointer");
						}
						jQuery("#video-no-blur").css("background-image","url('" + use_image + "')");
						jQuery(".homecaption").html(use_caption);
						jQuery("div#page").on( "click", function() {
							if (use_link!='') {
								window.location.replace(use_link);
							}
						});
					} 
						

		});
}




if (ee == 4) {
		jQuery(".project-center-cropped").addClass("effect1");
		//jQuery(".project-center-cropped").css("transition","1s ease-in-out");
}



});
</script>


<?php get_footer(); ?>
