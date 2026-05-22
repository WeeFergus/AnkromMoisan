<?php
/* Template Name: Template One  
   Template Post Type: microsites
*/ 
/*The template for displaying full width single posts. */


/* Top Section */

// get_header('microsites'); 
get_header(); 

/* Syle Page Section */
    $campaigncolor = get_field('campaign_theme_color');
    $campaigncoloriconsreverse = get_field('light_theme_icons');
	$pagebackgroundcolor = get_field('background_color');
	$pagetextcolor = get_field('text_color');
	$pageexpandocolor = get_field('light_expando_icons');

// print_r($campaigncolor);
/* Top Section */
	$sectionabovecampaign = get_field('show_section_above_campaign');
	$topsectiontitle = get_field('top_section_title');
	$topsectionsecondarytitle = get_field('top_section_sub_title');
	$topsectionimage = get_field('top_background_image');
	$topsectionpicture = $topsectionimage['sizes']['2048x2048'];
	$topsectionpicturesmaller = $topsectionimage['sizes']['2048x2048'];
	$topsectionsubtitle = get_field('top_secondary_title');
	$topsectioncontent = get_field('top_content');
	$topsectionnavline = get_field('breaking_nav_line');
	
/* Campaign */
/*
	$campaignnav = get_field('campaign_navigation_options');
	$campaignnavoptionone = $campaignnav['0']['value'];
	$campaignnavoptiontwo = $campaignnav['1']['value'];
	$campaignimagetitle = get_field('campaign_image_title');
	$campaignimagesubtitle = get_field('campaign_image_subtitle');
	$campaignimage = get_field('campaign_background_image');
	$campaignpicture = $campaignimage['sizes']['2048x2048'];
	$campaigntitle = get_field('campaign_title_copy');
	$campaignsubtitle = get_field('campaign_subtitle');
	$campaigncontent = get_field('campaign_content');
*/

// convert hex to rgba
function hex2rgb($hex) {
	$hex = str_replace("#", "", $hex);

	if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
	}
	$rgb = array($r, $g, $b);

	return $rgb; // returns an array with the rgb values
}

$Hex_color = $campaigncolor;
$RGB_color = hex2rgb($Hex_color);

$Final_Rgb_color = implode(", ", $RGB_color);


?>
<style>
	body.microsites-template {
		background-color: <?php echo $pagebackgroundcolor ?>;
	}
	body.microsites-template > *:not(#main_menu_wrap){
		color: <?php echo $pagetextcolor ?>;
	}
	.editorial_post_exp .btn-container{
		background: <?php echo $pagebackgroundcolor ?>;
	}
	span.expando_icon:after,
	span.expando_icon:before {
    	background: <?php echo $pagetextcolor ?>;
    }
    .editorial_post_exp .toggle_text {
    	background: <?php echo $pagebackgroundcolor ?> !important;
    }
    .posts_wrapper .background_img,
    .top_section_wrapper .sector_microsite_title{
	    color: <?php echo $pagetextcolor ?>;
    }
	
	div#microsite_nav,
	.microsite_nav_window,
	.share-btn, 
	.subscribe_btn,
	.subscribe_btn .mailchimp_form,
	.share-btn a {
    	background: <?php echo $campaigncolor ?>;
    }
    
    <?php if(get_field('main_nav_opacity')): ?>
    .microsite_nav_window {
    	background: rgba(<?php echo $Final_Rgb_color;  ?>, <?php echo get_field('main_nav_opacity') ?>);
    }
    <?php endif; ?>
    
    .microsite_separater {
    	border-top: 3px solid <?php echo $campaigncolor ?>;
	}
	svg path,
	svg polygon{
		fill:#000;
	}
	<?php if($campaigncoloriconsreverse): ?>
	svg path,
	svg polygon{
		fill:#fff !important;
	}	
	a.social_share img {
    filter: invert(1);
    }
	div#contact-right-block form select {
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDI0LjMuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPgo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IgoJIHZpZXdCb3g9IjAgMCA0Ljk1IDEwIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0Ljk1IDEwOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+Cgkuc3Qwe2ZpbGw6I0ZGRkZGRjt9Cjwvc3R5bGU+CjxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0xLjQxLDQuNjdsMS4wNy0xLjQ5bDEuMDYsMS40OUgxLjQxeiBNMy41NCw1LjMzTDIuNDgsNi44MkwxLjQxLDUuMzNIMy41NHoiLz4KPC9zdmc+Cg==) no-repeat 95% 50% !important;
}
	.share-btn a i {
    	color: #fff;
    }
    
    .subscribe_btn .mailchimp_form input:not([type="submit"]) {
    	border-bottom: 2px solid #fff;
    	color: #fff;
    }
	.subscribe_btn .mailchimp_form ::placeholder,
	.microsite_nav_window div#contact-right-block form ::placeholder,
	.microsite_nav_window{
		color: #fff;
	}
	.subscribe_btn .mailchimp_form input[type="submit"],
	.submit-wrapped input[type="submit"] {
    	background: #fff;
    	color: #000;
    }
    div#microsite_nav svg {
    	filter: invert(1);
	}
	.microsite_nav_window div#contact-right-block form input:not([type="submit"]), 
	.microsite_nav_window div#contact-right-block form select,
	.microsite_nav_window div#contact-right-block form textarea,
	div#contact-right-block form input:not([type="submit"]):focus, 
	div#contact-right-block form textarea:focus {
    	border-bottom: 2px solid #ffffff;
    	color: #fff;
	}
	.micro_nav_list.underline_link:after {
    	border-bottom: 2px solid #fff;
	}
	<?php endif; ?>
	<?php if(!$sectionabovecampaign): ?>
	.campaign_title:first-child{
		display: none;
	}
	<?php endif; ?>
    <?php if($sectionabovecampaign): ?>
    body.microsites-template div#icon_top_nav.sticky{
	    background-color: rgba(<?php echo $Final_Rgb_color; ?>, 70%);
    }
	.icon_title_wrap a {
    height: <?php echo get_field('page_nav_block_height') ?>px;
    }
/*
    div#icon_top_nav.sticky{
    background: rgb(0 0 0 / <?php echo get_field('sticky_nav_opacity') ?>);
    }
*/
    <?php endif; ?>
</style>


<div class="container square-logo-microsites">
	<div class="row">
		<div class="col-9 d-none d-lg-block"></div>
		<div class="col-xs-12 col-lg-3">
			<a href="<?php echo site_url(); ?>">
				<div class="logo_box">
				 	<svg id="clipboard" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20.7 20.7" style="enable-background:new 0 0 20.7 20.7;" xml:space="preserve">
    			 		<path class="animated_logo" d="M3.22,10.33l2.37-5.87c0.44-0.19,1.97-0.19,2.45,0L6.73,7.81l-0.99,2.53l-0.96,2.44C4.26,12.36,3.34,10.93,3.22,10.33z
    			 		  M13.24,8.34l1.8,4.44h2.55l-3.2-7.91L13.24,8.34z M6.04,10.34l-0.96,2.44h2.65l-1.04-2.44H6.04z M8.68,12.39l1.15-3.37L8.19,4.85
    			 		 L6.88,8.18L8.68,12.39z M14.23,4.46c-0.49-0.19-2.11-0.19-2.55,0L9.99,9.43l-1.14,3.35c0.3,0.17,2.12,0.23,2.62,0l1.61-4.85
    			 		 L14.23,4.46z M1.09,14.12l0.86,2.24H1.69l-0.22-0.58H0.46l-0.22,0.58H0l0.86-2.24H1.09z M1.39,15.55l-0.42-1.13l-0.43,1.13H1.39z
    			 		  M3.01,14.67c-0.25,0-0.4,0.14-0.49,0.3V14.7H2.29v1.66h0.23v-1.01c0-0.28,0.18-0.47,0.42-0.47c0.24,0,0.38,0.17,0.38,0.46v1.02
    			 		 h0.23v-1.08C3.56,14.9,3.35,14.67,3.01,14.67z M5.19,14.7H4.92l-0.74,0.9v-1.54H3.95v2.3h0.23V15.9l0.28-0.32l0.49,0.78h0.27
    			 		 l-0.61-0.96L5.19,14.7z M5.76,15.06V14.7H5.52v1.66h0.23v-0.79c0-0.43,0.25-0.64,0.56-0.64h0.01v-0.25
    			 		 C6.06,14.66,5.85,14.83,5.76,15.06z M7.91,15.52v0.02c0,0.48-0.31,0.86-0.74,0.86c-0.43,0-0.74-0.37-0.74-0.85v-0.02
    			 		 c0-0.48,0.31-0.85,0.74-0.85C7.6,14.67,7.91,15.03,7.91,15.52z M7.68,15.52c0-0.37-0.22-0.65-0.51-0.65c-0.29,0-0.5,0.28-0.5,0.65
    			 		 v0.02c0,0.37,0.22,0.65,0.51,0.65c0.29,0,0.51-0.28,0.51-0.65V15.52z M9.9,14.67c-0.26,0-0.41,0.14-0.51,0.3
    			 		 c-0.08-0.18-0.24-0.3-0.46-0.3c-0.24,0-0.37,0.14-0.47,0.3V14.7H8.23v1.66h0.23v-1.01c0-0.28,0.17-0.47,0.39-0.47
    			 		 c0.23,0,0.36,0.16,0.36,0.46v1.02h0.23v-1.01c0-0.3,0.18-0.47,0.39-0.47c0.23,0,0.36,0.16,0.36,0.46v1.02h0.23v-1.08
    			 		 C10.43,14.89,10.23,14.67,9.9,14.67z M12.68,15.32L12,14.13h-0.25v2.23h0.23v-1.79l0.69,1.19h0.01l0.69-1.19v1.79h0.24v-2.23h-0.25
    			 		 L12.68,15.32z M15.46,15.52v0.02c0,0.48-0.31,0.86-0.74,0.86c-0.43,0-0.74-0.37-0.74-0.85v-0.02c0-0.48,0.31-0.85,0.74-0.85
    			 		 C15.14,14.67,15.46,15.03,15.46,15.52z M15.22,15.52c0-0.37-0.22-0.65-0.51-0.65c-0.29,0-0.5,0.28-0.5,0.65v0.02
    			 		 c0,0.37,0.22,0.65,0.51,0.65c0.29,0,0.51-0.28,0.51-0.65V15.52z M15.78,14.36h0.26v-0.27h-0.26V14.36z M15.79,16.36h0.23V14.7h-0.23
    			 		 V16.36z M17.04,15.41c-0.23-0.1-0.37-0.17-0.37-0.31V15.1c0-0.13,0.11-0.23,0.29-0.23c0.15,0,0.29,0.06,0.42,0.16l0.11-0.18
    			 		 c-0.14-0.1-0.34-0.18-0.53-0.18c-0.3,0-0.52,0.18-0.52,0.45v0.01c0,0.26,0.21,0.36,0.48,0.48c0.22,0.09,0.36,0.17,0.36,0.31v0
    			 		 c0,0.16-0.13,0.26-0.31,0.26c-0.17,0-0.33-0.07-0.49-0.2l-0.12,0.17c0.18,0.15,0.4,0.23,0.6,0.23c0.3,0,0.54-0.18,0.54-0.48V15.9
    			 		 C17.51,15.65,17.32,15.53,17.04,15.41z M18.89,14.84c0.1,0.1,0.16,0.26,0.16,0.45v1.07h-0.23v-0.24c-0.1,0.16-0.26,0.28-0.51,0.28
    			 		 c-0.28,0-0.53-0.19-0.53-0.52v-0.01c0-0.34,0.25-0.53,0.61-0.53c0.18,0,0.3,0.03,0.43,0.07v-0.1c0-0.27-0.16-0.41-0.43-0.41
    			 		 c-0.17,0-0.31,0.05-0.43,0.11l-0.07-0.19c0.16-0.08,0.32-0.13,0.53-0.13C18.63,14.68,18.78,14.73,18.89,14.84z M18.83,15.57
    			 		 c-0.11-0.04-0.24-0.07-0.4-0.07c-0.27,0-0.41,0.14-0.41,0.35v0.01c0,0.21,0.16,0.34,0.36,0.34c0.26,0,0.46-0.18,0.46-0.42V15.57z
    			 		  M20.16,14.67c-0.25,0-0.4,0.14-0.49,0.3V14.7h-0.23v1.66h0.23v-1.01c0-0.28,0.18-0.47,0.42-0.47c0.24,0,0.38,0.17,0.38,0.46v1.02
    			 		 h0.23v-1.08C20.7,14.9,20.5,14.67,20.16,14.67z"/>
    			    </svg>
				</div>
			</a>
		</div>
	</div>
</div>

<?php if($sectionabovecampaign): ?>
<!-- Top Section -->
<div class="microsite top_section_wrapper" id="top">
	<div class="row"  id="<?php echo str_replace(' ', '_', $topsectiontitle); ?>">
		<div class="col-12">
			<div class="microsite-large" style="background-image: url(<?php echo $topsectionpicture; ?>);">
			</div>
			<div class="sector_microsite_title">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<h1 class="large_header light"><?php echo $topsectiontitle; ?></h1>
							<?php if ($topsectionsecondarytitle): ?>
							<h3><bold><?php echo $topsectionsecondarytitle; ?></bold></h3>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div> 
	</div>
</div>

<div class="container microsite_top_content_wrap">
	<div class="row">
		<div class="col-12 microsite_top_content">
			<?php if ($topsectionsubtitle): ?>
			<h1><?php echo $topsectionsubtitle; ?></h1>
			<?php endif; ?>
			<?php if ($topsectioncontent): ?>
			<div class="d-block microsite_top_content_text">
				<p><?php echo $topsectioncontent; ?></p>
			</div>
			<?php endif; ?>
		</div>
		
	</div>
	<div class="nav_spacer"></div>
	<div class="icon_bar_wrap" id="icon_top_nav">
		<div class="icon_bar_list container">
			<div class="sticky_overflow_scroll">
		    <?php if($sectionabovecampaign): ?>
		    	<?php if(have_rows('top_section_post')): ?>
				<?php while(have_rows('top_section_post')): the_row();
					$topsectionpoststitle = get_sub_field('top_post_title');
										
					$topsectionpostnav = get_sub_field('top_navigation_options');
					$topsectionpostnavoptionone = $topsectionpostnav['0']['value'];
					$topsectionpostnavoptiontwo = $topsectionpostnav['1']['value']; 
					$topsectionpostnavimage = get_sub_field('top_post_nav_image');
					$topsectionpostsnavpicture = $topsectionpostnavimage['sizes']['2048x2048']; ?>
			<?php if( $topsectionpostnavoptionone == "Top Page Nav" || $topsectionpostnavoptiontwo == "Top Page Nav"): ?>
			<div class="icon_title_wrap">
				<a class="not_underline" href="#<?php echo str_replace(' ', '_', $topsectionpoststitle); ?>" style="background-image: url(<?php echo $topsectionpostsnavpicture; ?>);">
					<h5><?php echo $topsectionpoststitle ?></h5>
				</a>
			</div>
			<?php endif; ?>
	        <?php endwhile; ?>
	    	<?php endif; ?>	
        			
        	<?php endif; ?>		
        	
        	<?php if(have_rows('campaigns')): ?>
			<?php while(have_rows('campaigns')): the_row();
			/* Campaign */
				$campaignnav = get_sub_field('campaign_navigation_options');
				$campaignnavoptionone = $campaignnav['0']['value'];
				$campaignnavoptiontwo = $campaignnav['1']['value'];
				
				$campaignimagetitle = get_sub_field('campaign_image_title');
				
				$campaignnavimagena = get_sub_field('campaign_top_page_nav_image');
				$campaignnavpicture = $campaignnavimagena['sizes']['large'];  ?>
				
			<?php if($campaignnavoptionone == "Top Page Nav" || $campaignnavoptiontwo == "Top Page Nav"): ?>	
        	<div class="icon_title_wrap">
				<a class="not_underline" href="#<?php echo str_replace(' ', '_', $campaignimagetitle); ?>" style="background-image: url(<?php echo $campaignnavpicture; ?>);">
					<h5><?php echo $campaignimagetitle; ?></h5>
				</a>
			</div>	
        	<?php endif; ?>
        				
        	<?php 	if(have_rows('campaign_posts')): ?>
			<?php 	while(have_rows('campaign_posts')): the_row();
	    			$campaignpoststitle = get_sub_field('campaign_post_title');
	    			$campaignpostsnavimage = get_sub_field('campain_post_top_nav_image');
					$campaignpostsnavpicture = $campaignpostsnavimage['sizes']['large'];
	    								
					$campaignpostnav = get_sub_field('campaign_navigation_options');
					$campaignpostnavoptionone = $campaignpostnav['0']['value'];
					$campaignpostnavoptiontwo = $campaignpostnav['1']['value'];
					
					?>
			<?php if($campaignpostnavoptionone == "Top Page Nav" || $campaignpostnavoptiontwo == "Top Page Nav"): ?>	
	    	<div class="icon_title_wrap">
				<a class="not_underline" href="#<?php echo str_replace(' ', '_', $campaignpoststitle); ?>" style="background-image: url(<?php echo $campaignpostsnavpicture; ?>);">
<!-- 					<img src="<?php echo $campaignpostsnavpicture; ?>" width="100%"/> -->
					<h5><?php echo $campaignpoststitle; ?></h5>
				</a>
			</div>	
			<?php endif; ?>
			
	    	<?php endwhile; ?>
	    	<?php endif; ?>
	    	
	    	<?php endwhile; ?>
	    	<?php endif; ?>		
			</div>			
	    </div>
	</div>
	<?php if($topsectionnavline): ?>
	<hr class="microsite_separater">
	<?php endif; ?>
	
	<?php if(have_rows('top_section_post')): ?>
	<?php while(have_rows('top_section_post')): the_row();
		$topsectionpoststype = get_sub_field('top_section_post_type');		
		
		$topsectionpostslink = get_sub_field('top_section_post_link');
		$topsectionpostslinkurl = $topsectionpostslink['url'];
	    $topsectionpoststitle = get_sub_field('top_post_title');
		$topsectionpostsdate = get_sub_field('top_post_date');
		$topsectionpostssubtitle = get_sub_field('top_secondary_post_title');
		$topsectionpoststext = get_sub_field('top_post_text');
		$topsectionpostsimage = get_sub_field('top_post_image');
		$topsectionpostspicture = $topsectionpostsimage['sizes']['2048x2048'];
		
		$topsectionposttextexpando = get_sub_field('top_post_text_expando');
		$topsectionpostbreakingline = get_sub_field('top_post_breaking_line');
		?>
	<?php if ($topsectionpoststype == 'PDF Post'): ?>
	<div class="posts_wrapper" id="<?php echo str_replace(' ', '_', $topsectionpoststitle); ?>">
		<div class="row post_wrapper">
			<div class="col-xs-12 col-lg-6">
				<h1 class="header light"><?php echo $topsectionpoststitle ?></h1>
				<h5 class="date_post"><?php echo $topsectionpostsdate; ?></h5>
				<h1><?php echo $topsectionpostssubtitle; ?></h1>
				<p><?php echo $topsectionpoststext; ?></p>
			</div>
			<div class="col-xs-12 col-lg-6">
				<div class="post_image">
					<img src="<?php echo $topsectionpostspicture; ?>" width="100%"/>
					<?php if($topsectionpostslinkurl): ?>
					<div class="post_dowload_wrap">
						<a class="not_underline" href="<?php echo $topsectionpostslinkurl; ?>" target="_blank">
							<span class="dowload_icon_span">
								<img id="dowload_icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/SVG/dowload_icon.svg" />
							</span>
						</a>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php if($topsectionpostbreakingline): ?>
	<hr class="microsite_separater">
	<?php endif; ?>
	<?php endif; ?>
	<?php if ($topsectionpoststype == 'Manifesto Post'): ?>
	<div class="posts_wrapper toggle_wrapper " id="<?php echo str_replace(' ', '_', $topsectionpoststitle); ?>">
		<div class="row post_wrapper align-items-start manifesto_post">
			<div class="col-12">
				<h1 class="header light"><?php echo $topsectionpoststitle ?></h1>
				<h5 class="date_post"><?php echo $topsectionpostsdate; ?></h5>
				<?php if($topsectionpostssubtitle): ?>
				<h1><?php echo $topsectionpostssubtitle; ?></h1>
				<?php endif; ?>
				<p><?php echo $topsectionpoststext; ?></p>
			</div>

			<div class="post_exp toggle_item_wrap button_wrapper_<?php echo str_replace(' ', '_', $topsectionpoststitle); ?>">
				<div class="toggle_text">
	        	    <span class="expando_icon"></span>
            	</div>
				<div class="toggled_text">
					<div class="col-12">
						<div class="two_col"><?php echo $topsectionposttextexpando ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php if($topsectionpostbreakingline): ?>
	<hr class="microsite_separater">
	<?php endif; ?>
	<?php endif; ?>
	<?php if ($topsectionpoststype == 'Editorial Post'): ?>
	<div class="posts_wrapper toggle_wrapper col-12 editorial_post" id="<?php echo str_replace(' ', '_', $topsectionpoststitle); ?>">
		<div class="row background_img" style="background-image: url(<?php echo $topsectionpostspicture; ?>);">
			<div class=" col-md-12 col-lg-6">
				<h1 class="header light"><?php echo $topsectionpoststitle ?></h1>
				<h5 class="date_post"><?php echo $topsectionpostsdate; ?></h5>
				<?php if($topsectionpostssubtitle): ?>
				<h1><?php echo $topsectionpostssubtitle; ?></h1>
				<?php endif; ?>
			</div>
		</div>
	    <div class="editorial_post_exp toggle_item_wrap">
		    <div class="toggle_text">
	            <span class="expando_icon"></span>
            </div>
			<div class="toggled_text">
				<div class="two_col"><?php echo $topsectionposttextexpando ?></div>
			</div>
	    </div>
	</div>
	<?php if($topsectionpostbreakingline): ?>
	<hr class="microsite_separater">
	<?php endif; ?>
	<?php endif; ?>
	<?php  endwhile; ?>
	<?php  endif; ?>
</div>
<?php endif; ?>

<!-- End of Top Section -->


<!-- Campaign -->
<?php if(have_rows('campaigns')): ?>
	<?php while(have_rows('campaigns')): the_row();
/* Campaign */
	$campaignnav = get_sub_field('campaign_navigation_options');
	$campaignnavoptionone = $campaignnav['0']['value'];
	$campaignnavoptiontwo = $campaignnav['1']['value'];
	$campaignimagetitle = get_sub_field('campaign_image_title');
	$campaignimagesubtitle = get_sub_field('campaign_image_subtitle');
	$campaignimage = get_sub_field('campaign_background_image');
	$campaignpicture = $campaignimage['sizes']['2048x2048'];
	$campaigntitle = get_sub_field('campaign_title_copy');
	$campaignsubtitle = get_sub_field('campaign_subtitle');
	$campaigncontent = get_sub_field('campaign_content');
	$campaignbreakingline = get_sub_field('campaign_breaking_line'); ?>
	
<div class="microsite top_section_wrapper" id="<?php echo str_replace(' ', '_', $campaignimagetitle); ?>">
	<div class="row">
		<div class="col-12">
			<div class="microsite-large" style="background-image: url(<?php echo $campaignpicture; ?>);">
			</div>
			<div class="sector_microsite_title">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<h1 class="large_header light">
								<span><?php echo $campaignimagetitle; ?></span>
							</h1>
							<h3><bold><?php echo $campaignimagesubtitle; ?></bold></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container project_top_title"> 
	<?php if($campaigntitle || $campaignsubtitle || $campaigncontent): ?>
	<div class="row campaign_top_content">
		<div class="col-12">
			<h1 class="large_header light"><?php echo $campaigntitle; ?></h1>
			<?php if($campaigntitle && $campaignsubtitle): ?>
			<h3>- or -</h3>
			<?php endif; ?>
			<h1><?php echo $campaignsubtitle; ?></h1>
			<?php if($campaigncontent): ?>
			<p class="overview"><?php echo $campaigncontent; ?></p>
			<?php endif; ?>
		</div>
		
	</div>
	<?php endif; ?>
	<?php if($campaignbreakingline): ?>
	<hr class="microsite_separater">
	<?php endif; ?>
	
	<?php if(have_rows('campaign_posts')): ?>
	<?php while(have_rows('campaign_posts')): the_row();
		$campaignpoststype = get_sub_field('campaign_post_type');
		
		$campaignpostslink = get_sub_field('campaign_post_link');
		$campaignpostslinkulr = $campaignpostslink['url'];
	    $campaignpoststitle = get_sub_field('campaign_post_title');
		$campaignpostsdate = get_sub_field('campaign_post_date');
		$campaignpostssubtitle = get_sub_field('campaign_secondary_post_title');
		$campaignpoststext = get_sub_field('campaign_post_text');
		$campaignpostsimage = get_sub_field('campaign_post_image');
		$campaignpostspicture = $campaignpostsimage['sizes']['2048x2048'];
		$campaignpostsimagetext = get_sub_field('campaign_post_bottom_image_text');
		
		$campaignposttextexpando = get_sub_field('campaign_post_text_expando');
		$campaignpostbreakingline = get_sub_field('campaign_post_breaking_line');
		?>
	<?php if ($campaignpoststype == 'PDF Post'): ?>
	<div class="posts_wrapper" id="<?php echo str_replace(' ', '_', $campaignpoststitle); ?>">
		<div class="row post_wrapper">
			<div class="col-xs-12 col-lg-6">
				<h1 class="header light"><?php echo $campaignpoststitle ?></h1>
				<h5 class="date_post"><?php echo $campaignpostsdate; ?></h5>
				<h1><?php echo $campaignpostssubtitle; ?></h1>
				<p><?php echo $campaignpoststext; ?></p>
			</div>
			<div class="col-xs-12 col-lg-6">
				<div class="post_image">
					<img src="<?php echo $campaignpostspicture; ?>" width="100%"/>
					<?php if($campaignpostslinkulr): ?>
					<div class="post_dowload_wrap">
						<a class="not_underline" href="<?php echo $campaignpostslinkulr; ?>" target="_blank">
							<span class="dowload_icon_span">
								<img id="dowload_icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/SVG/dowload_icon.svg" />
							</span>
						</a>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php if($campaignpostbreakingline): ?>
	<hr class="microsite_separater">
	<?php endif; ?>
	<?php endif; ?>
	<?php if ($campaignpoststype == 'Manifesto Post'): ?>
	<div class="posts_wrapper toggle_wrapper " id="<?php echo str_replace(' ', '_', $topsectionpoststitle); ?>">
		<div class="row post_wrapper align-items-start manifesto_post">
			<div class="col-12">
				<h1 class="header light"><?php echo $campaignpoststitle ?></h1>
				<h5 class="date_post"><?php echo $campaignpostsdate; ?></h5>
				<?php if($campaignpostssubtitle): ?>
				<h1><?php echo $campaignpostssubtitle; ?></h1>
				<?php endif; ?>
				<p><?php echo $campaignpoststext; ?></p>
			</div>

			<div class="post_exp toggle_item_wrap button_wrapper_<?php echo str_replace(' ', '_', $campaignpoststitle); ?>">
				<div class="toggle_text">
	        	    <span class="expando_icon"></span>
            	</div>
				<div class="toggled_text">
					<div class="col-12">
						<div class="two_col"><?php echo $campaignposttextexpando ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php if($campaignpostbreakingline): ?>
	<hr class="microsite_separater">
	<?php endif; ?>
	<?php endif; ?>
	<?php if ($campaignpoststype == 'Editorial Post'): ?>
	<div class="posts_wrapper toggle_wrapper col-12 editorial_post" id="<?php echo str_replace(' ', '_', $campaignpoststitle); ?>">
		<div class="row background_img" style="background-image: url(<?php echo $campaignpostspicture; ?>);">
			<div class=" col-md-12 col-lg-6">
				<h1 class="header light"><?php echo $campaignpoststitle ?></h1>
				<h5 class="date_post"><?php echo $campaignpostsdate; ?></h5>
				<?php if($campaignpostssubtitle): ?>
				<h1><?php echo $campaignpostssubtitle; ?></h1>
				<?php endif; ?>
			</div>
		</div>
	    <div class="editorial_post_exp toggle_item_wrap">
		    <div class="toggle_text">
	            <span class="expando_icon"></span>
            </div>
			<div class="toggled_text">
				<div class="two_col"><?php echo $campaignposttextexpando ?></div>
			</div>
	    </div>
	</div>
	<?php if($campaignpostbreakingline): ?>
	<hr class="microsite_separater">
	<?php endif; ?>
	<?php endif; ?>
	<?php  endwhile; ?>
    <?php  endif; ?>
</div>

<?php  endwhile; ?>
<?php  endif; ?>

<!--
<div id="microsite_nav_wrapper">
	<div id="microsite_nav">
		<div class="nav_button menu_micro">
			<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
				<defs>
					<style>.cls-1{fill:none;stroke:#000;} .st1{stroke:#FFFFFF;}</style>
				</defs>
				<line class="cls-1" x1="5.21" y1="23.5" x2="25.21" y2="23.5"/>
				<line class="cls-1" x1="5.21" y1="15" x2="25.21" y2="15"/>
				<line class="cls-1" x1="5.21" y1="6.5" x2="25.21" y2="6.5"/>
			</svg>
		</div>
	</div>
	<div class="microsite_nav_window">
		<div class="container" style="overflow-x: hidden;">
			<div class="row full_height">
               	<div class="col-md-12 ">
					<div class="row align-items-center">
               			<div class="col-md-12 col-lg-6">
	               			<?php if($sectionabovecampaign): ?>
	                		<div class="micro_nav_top_list micro_nav_list underline_link light"><a class="not_underline" href="#top"><?php echo $topsectiontitle ?></a></div>
	                		<?php else: 
		                		$rows = get_field('campaigns' ); 
								$specific_row = $rows[0]; 
								$sub_field_value = $specific_row['campaign_image_title'];
	                		?>
	                		<div class="micro_nav_top_list micro_nav_list underline_link light"><a class="not_underline" href="#<?php echo str_replace(' ', '_', $sub_field_value); ?>"><?php echo $sub_field_value ?></a></div>
	                		<?php endif; ?>
	                		
	                		<div class="micro_nav_inner_list">
		                		<?php if($sectionabovecampaign): ?>
		                		<div class="micro_nav_inner_inner_list">
		                		<?php 	if(have_rows('top_section_post')): ?>
								<?php 	while(have_rows('top_section_post')): the_row();
									$topsectionpoststitle = get_sub_field('top_post_title');

									$topsectionpostnav = get_sub_field('top_navigation_options');
									$topsectionpostnavoptionone = $topsectionpostnav['0']['value'];
									$topsectionpostnavoptiontwo = $topsectionpostnav['1']['value'];
								?>	
								<?php if($topsectionpostnavoptionone == "Slide Out Nav" || $topsectionpostnavoptiontwo == "Slide Out Nav"): ?>	                		
	                			<div class="micro_nav_top_list micro_nav_list underline_link light"><a class="not_underline" href="#<?php echo str_replace(' ', '_', $topsectionpoststitle); ?>"><?php echo $topsectionpoststitle ?></a></div>
	                			<?php endif; ?>
								<?php endwhile; ?>
	    						<?php endif; ?>
		                		</div>
        						<?php endif; ?>	
        						
        						<?php if(have_rows('campaigns')): ?>
								<?php while(have_rows('campaigns')): the_row();
								/* Campaign */
									$campaignnav = get_sub_field('campaign_navigation_options');
									$campaignnavoptionone = $campaignnav['0']['value'];
									$campaignnavoptiontwo = $campaignnav['1']['value'];
				
									$campaignimagetitle = get_sub_field('campaign_image_title');  ?>
				
								<?php if($campaignnavoptionone == "Slide Out Nav" || $campaignnavoptiontwo == "Slide Out Nav"): ?>	
        						<div class="micro_nav_top_list micro_nav_list underline_link light campaign_title"><a class="not_underline" href="#<?php echo str_replace(' ', '_', $campaignimagetitle); ?>"><?php echo $campaignimagetitle; ?></a></div>	
        						<?php endif; ?> 
        				 		<div class="micro_nav_inner_inner_list">
        						<?php 	if(have_rows('campaign_posts')): ?>
								<?php 	while(have_rows('campaign_posts')): the_row();
	    								$campaignpoststitle = get_sub_field('campaign_post_title');
	    								
										$campaignpostnav = get_sub_field('campaign_navigation_options');
										$campaignpostnavoptionone = $campaignpostnav['0']['value'];
										$campaignpostnavoptiontwo = $campaignpostnav['1']['value'];
					
										?>
								<?php if($campaignpostnavoptionone == "Slide Out Nav" || $campaignpostnavoptiontwo == "Slide Out Nav"): ?>	
	    						<div class="micro_nav_top_list micro_nav_list underline_link light"><a class="not_underline" href="#<?php echo str_replace(' ', '_', $campaignpoststitle); ?>"><?php echo $campaignpoststitle; ?></a></div>	
								<?php endif; ?>
			
	    						<?php endwhile; ?>
	    						<?php endif; ?>
        				 		</div>
	    	
	    						<?php endwhile; ?>
	    						<?php endif; ?>	
        							                			
	                		</div>
	                		<?php 	if(have_rows('slide_out_custom_links')): ?>
							<?php 	while(have_rows('slide_out_custom_links')): the_row();
	    						$customlinkurl = get_sub_field('custom_link');
								$customlinktext = get_sub_field('custom_link_text');
							?>
							<div class="micro_nav_top_list micro_nav_list underline_link light"><a class="not_underline" href="<?php echo $customlinkurl ?>"><?php echo $customlinktext ?></a></div>
							<?php endwhile; ?>
	    					<?php endif; ?>	
	                		<div class="micro_nav_top_list micro_nav_list underline_link light"><a  class="not_underline" href="<?php echo get_site_url(); ?>">Home</a></div>
                		</div>
                		<div class="col-md-none col-lg-1"></div>
	       				<div class="col-md-12 col-lg-5 d-none d-lg-flex">
		       				<div class="h1 light">Contact</div> 
							<div id="contact-right-block"><?php gravity_form( 1, false, false, false, '', true, 12 ); ?></div> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
-->


<?php
	$campaigndiscipline = get_field('select_discipline');
	$campaignsector = get_field('select_sector');
	$campaigntype = get_field('project_type');
	
	?>
	
	
	
<div class="share_subscribe_wrapper">
	<div class="share-btn micro_side_btn">
  		<span class="cta">
  			<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 				viewBox="0 0 18.752 18.752" style="enable-background:new 0 0 18.752 18.752;" xml:space="preserve">
				<path d="M18.593,14.128c-0.024-0.122-0.055-0.242-0.091-0.361c-0.036-0.117-0.077-0.233-0.126-0.354
						c-0.048-0.113-0.101-0.224-0.159-0.334c-0.058-0.108-0.121-0.215-0.191-0.32c-0.07-0.104-0.145-0.205-0.221-0.296
						c-0.079-0.098-0.163-0.189-0.249-0.275c-0.088-0.089-0.181-0.173-0.279-0.254c-0.096-0.078-0.195-0.152-0.296-0.22
						c-0.104-0.07-0.212-0.134-0.318-0.189c-0.11-0.061-0.225-0.114-0.341-0.162c-0.114-0.048-0.231-0.09-0.351-0.126
						c-0.12-0.036-0.24-0.066-0.358-0.09c-0.122-0.024-0.246-0.043-0.37-0.055c-0.247-0.025-0.496-0.025-0.745,0
						c-0.124,0.012-0.248,0.03-0.366,0.054c-0.122,0.024-0.242,0.055-0.362,0.091c-0.119,0.036-0.236,0.078-0.351,0.126
						c-0.116,0.048-0.23,0.102-0.336,0.159c-0.111,0.059-0.219,0.122-0.322,0.192c-0.102,0.067-0.201,0.142-0.299,0.222
						c-0.097,0.079-0.189,0.163-0.275,0.25c-0.088,0.088-0.172,0.18-0.247,0.272c-0.074,0.089-0.143,0.183-0.21,0.282l-4.26-2.13
						c0.015-0.044,0.033-0.087,0.047-0.132c0.036-0.118,0.066-0.238,0.092-0.363C7.631,9.994,7.648,9.872,7.66,9.749
						c0.013-0.124,0.019-0.248,0.019-0.373S7.673,9.127,7.66,9.003C7.648,8.88,7.631,8.759,7.606,8.635
						C7.582,8.513,7.552,8.393,7.516,8.274C7.502,8.23,7.484,8.186,7.469,8.143l4.259-2.13c0.066,0.097,0.135,0.192,0.206,0.277
						c0.079,0.098,0.163,0.189,0.249,0.275c0.088,0.089,0.181,0.173,0.279,0.254c0.096,0.078,0.195,0.152,0.296,0.22
						c0.104,0.07,0.212,0.134,0.318,0.189c0.11,0.061,0.225,0.114,0.341,0.162c0.114,0.048,0.231,0.09,0.351,0.126
						c0.12,0.036,0.24,0.066,0.358,0.09c0.122,0.024,0.246,0.043,0.37,0.055c0.124,0.013,0.248,0.019,0.372,0.019
						c0.125,0,0.249-0.006,0.373-0.019c0.124-0.012,0.248-0.03,0.366-0.054c0.122-0.024,0.242-0.055,0.362-0.091
						c0.119-0.036,0.236-0.078,0.351-0.126c0.116-0.048,0.23-0.102,0.336-0.159c0.111-0.059,0.219-0.122,0.322-0.192
						c0.102-0.067,0.201-0.142,0.299-0.222c0.097-0.079,0.189-0.163,0.275-0.25c0.088-0.088,0.172-0.18,0.247-0.272
						c0.08-0.096,0.154-0.196,0.227-0.304c0.068-0.103,0.132-0.209,0.19-0.319c0.058-0.108,0.11-0.219,0.16-0.338
						c0.047-0.114,0.088-0.23,0.124-0.349s0.066-0.238,0.092-0.363c0.023-0.121,0.041-0.242,0.053-0.365
						c0.013-0.124,0.019-0.248,0.019-0.373s-0.006-0.249-0.019-0.373c-0.012-0.123-0.029-0.244-0.054-0.368
						C18.568,3.02,18.538,2.9,18.502,2.781c-0.036-0.117-0.077-0.233-0.126-0.354c-0.048-0.113-0.101-0.224-0.159-0.334
						c-0.058-0.108-0.121-0.215-0.191-0.32c-0.07-0.104-0.145-0.205-0.221-0.296c-0.079-0.098-0.163-0.189-0.249-0.275
						c-0.088-0.089-0.181-0.173-0.279-0.254c-0.096-0.078-0.195-0.152-0.296-0.22c-0.104-0.07-0.212-0.134-0.318-0.189
						c-0.11-0.061-0.225-0.114-0.341-0.162c-0.114-0.048-0.231-0.09-0.351-0.126c-0.12-0.036-0.24-0.066-0.358-0.09
						c-0.122-0.024-0.246-0.043-0.37-0.055c-0.247-0.026-0.496-0.025-0.745,0c-0.124,0.012-0.248,0.03-0.366,0.054
						c-0.122,0.024-0.242,0.055-0.362,0.091c-0.119,0.036-0.236,0.078-0.351,0.126c-0.116,0.048-0.23,0.102-0.336,0.159
						c-0.111,0.059-0.219,0.122-0.322,0.192c-0.102,0.067-0.201,0.142-0.299,0.222c-0.097,0.079-0.189,0.163-0.275,0.25
						c-0.088,0.088-0.172,0.18-0.247,0.272c-0.08,0.096-0.154,0.196-0.227,0.304c-0.068,0.103-0.132,0.209-0.19,0.319
						c-0.058,0.108-0.11,0.219-0.16,0.338c-0.047,0.114-0.088,0.23-0.124,0.349s-0.066,0.238-0.092,0.363
						c-0.023,0.121-0.041,0.242-0.053,0.365c-0.013,0.124-0.02,0.248-0.02,0.373s0.007,0.249,0.02,0.373
						c0.012,0.123,0.029,0.244,0.054,0.368c0.024,0.122,0.055,0.242,0.091,0.361c0.013,0.043,0.032,0.088,0.047,0.131l-4.259,2.13
						C6.958,7.15,6.89,7.055,6.818,6.97C6.739,6.872,6.655,6.781,6.569,6.695C6.481,6.606,6.389,6.522,6.29,6.441
						c-0.096-0.078-0.195-0.152-0.296-0.22C5.89,6.151,5.782,6.087,5.676,6.032C5.565,5.971,5.451,5.917,5.335,5.87
						C5.221,5.822,5.104,5.78,4.984,5.744c-0.12-0.036-0.24-0.066-0.358-0.09C4.504,5.629,4.38,5.611,4.256,5.599
						c-0.247-0.025-0.496-0.025-0.745,0c-0.124,0.012-0.248,0.03-0.366,0.054C3.022,5.677,2.902,5.707,2.782,5.744
						C2.663,5.78,2.546,5.822,2.432,5.87c-0.116,0.048-0.23,0.102-0.336,0.159C1.984,6.087,1.877,6.151,1.773,6.221
						C1.672,6.289,1.572,6.363,1.475,6.443c-0.097,0.079-0.189,0.163-0.275,0.25c-0.088,0.088-0.172,0.18-0.247,0.272
						c-0.08,0.096-0.154,0.196-0.227,0.304c-0.068,0.103-0.132,0.209-0.19,0.319c-0.058,0.108-0.11,0.219-0.16,0.338
						C0.328,8.04,0.287,8.157,0.251,8.275S0.185,8.513,0.159,8.638C0.136,8.759,0.118,8.88,0.106,9.003
						c-0.013,0.124-0.02,0.248-0.02,0.373s0.007,0.249,0.02,0.373c0.012,0.123,0.029,0.244,0.054,0.368
						c0.024,0.122,0.055,0.242,0.091,0.361c0.036,0.117,0.077,0.233,0.126,0.354c0.048,0.113,0.101,0.224,0.159,0.334
						c0.058,0.108,0.121,0.215,0.191,0.32c0.07,0.104,0.145,0.205,0.221,0.296c0.079,0.098,0.163,0.189,0.249,0.275
						c0.088,0.089,0.181,0.173,0.279,0.254c0.096,0.078,0.195,0.152,0.296,0.22c0.104,0.07,0.212,0.134,0.318,0.189
						c0.11,0.061,0.225,0.114,0.341,0.162c0.114,0.048,0.231,0.09,0.351,0.126c0.12,0.036,0.24,0.066,0.358,0.09
						c0.122,0.024,0.246,0.043,0.37,0.055c0.124,0.013,0.248,0.019,0.372,0.019c0.125,0,0.249-0.006,0.373-0.019
						c0.124-0.012,0.248-0.03,0.366-0.054c0.122-0.024,0.242-0.055,0.362-0.091c0.119-0.036,0.236-0.078,0.351-0.126
						c0.116-0.048,0.23-0.102,0.336-0.159c0.111-0.059,0.219-0.122,0.322-0.192c0.102-0.067,0.201-0.142,0.299-0.222
						c0.097-0.079,0.189-0.163,0.275-0.25c0.088-0.088,0.172-0.18,0.247-0.272c0.074-0.089,0.143-0.183,0.21-0.282l4.26,2.13
						c-0.015,0.044-0.033,0.087-0.047,0.132c-0.036,0.118-0.066,0.238-0.092,0.363c-0.023,0.121-0.041,0.242-0.053,0.365
						c-0.013,0.124-0.02,0.248-0.02,0.373s0.007,0.249,0.02,0.373c0.012,0.123,0.029,0.244,0.054,0.368
						c0.024,0.122,0.055,0.242,0.091,0.361c0.036,0.117,0.077,0.233,0.126,0.354c0.048,0.113,0.101,0.224,0.159,0.334
						c0.058,0.108,0.121,0.215,0.191,0.32c0.07,0.104,0.145,0.205,0.221,0.296c0.079,0.098,0.163,0.189,0.249,0.275
						c0.088,0.089,0.181,0.173,0.279,0.254c0.096,0.078,0.195,0.152,0.296,0.22c0.104,0.07,0.212,0.134,0.318,0.189
						c0.11,0.061,0.225,0.114,0.341,0.162c0.114,0.048,0.231,0.09,0.351,0.126c0.12,0.036,0.24,0.066,0.358,0.09
						c0.122,0.024,0.246,0.043,0.37,0.055c0.124,0.013,0.248,0.019,0.372,0.019c0.125,0,0.249-0.006,0.373-0.019
						c0.124-0.012,0.248-0.03,0.366-0.054c0.122-0.024,0.242-0.055,0.362-0.091c0.119-0.036,0.236-0.078,0.351-0.126
						c0.116-0.048,0.23-0.102,0.336-0.159c0.111-0.059,0.219-0.122,0.322-0.192c0.102-0.067,0.201-0.142,0.299-0.222
						c0.097-0.079,0.189-0.163,0.275-0.25c0.088-0.088,0.172-0.18,0.247-0.272c0.08-0.096,0.154-0.196,0.227-0.304
						c0.068-0.103,0.132-0.209,0.19-0.319c0.058-0.108,0.11-0.219,0.16-0.338c0.047-0.114,0.088-0.23,0.124-0.349
						c0.036-0.118,0.066-0.238,0.092-0.363c0.023-0.121,0.041-0.242,0.053-0.365c0.013-0.124,0.019-0.248,0.019-0.373
						s-0.006-0.249-0.019-0.373C18.635,14.373,18.617,14.252,18.593,14.128z M12.087,3.61c0.01-0.092,0.023-0.184,0.04-0.271
						c0.019-0.091,0.041-0.18,0.067-0.268s0.058-0.175,0.091-0.256c0.036-0.086,0.075-0.169,0.118-0.25
						c0.044-0.081,0.092-0.16,0.141-0.234c0.051-0.075,0.104-0.148,0.166-0.224c0.058-0.07,0.118-0.137,0.185-0.203
						c0.064-0.065,0.132-0.126,0.199-0.182c0.072-0.059,0.146-0.113,0.224-0.165c0.075-0.051,0.153-0.097,0.238-0.143
						c0.079-0.043,0.16-0.081,0.243-0.115c0.085-0.034,0.171-0.066,0.259-0.093c0.087-0.026,0.176-0.049,0.269-0.066
						c0.089-0.019,0.18-0.031,0.271-0.041c0.091-0.009,0.182-0.013,0.272-0.013c0.092,0,0.183,0.004,0.273,0.013
						c0.091,0.01,0.182,0.022,0.274,0.042c0.089,0.017,0.178,0.039,0.265,0.065C15.77,1.234,15.855,1.266,15.94,1.3
						c0.083,0.034,0.164,0.072,0.248,0.118c0.08,0.043,0.158,0.089,0.234,0.14c0.076,0.052,0.15,0.106,0.221,0.163
						c0.069,0.058,0.137,0.118,0.203,0.186c0.064,0.064,0.125,0.131,0.187,0.206c0.059,0.07,0.111,0.144,0.16,0.216
						c0.051,0.077,0.099,0.156,0.142,0.235c0.044,0.083,0.083,0.166,0.117,0.246c0.035,0.087,0.066,0.174,0.093,0.261
						c0.026,0.089,0.049,0.178,0.066,0.266c0.018,0.09,0.031,0.182,0.041,0.273c0.009,0.091,0.013,0.182,0.013,0.273
						s-0.004,0.183-0.013,0.273c-0.01,0.092-0.023,0.184-0.04,0.271c-0.019,0.091-0.041,0.18-0.067,0.268s-0.058,0.175-0.091,0.256
						c-0.036,0.086-0.075,0.169-0.118,0.25c-0.044,0.081-0.092,0.16-0.141,0.234c-0.051,0.075-0.104,0.148-0.166,0.224
						c-0.058,0.07-0.118,0.137-0.185,0.203c-0.064,0.065-0.132,0.126-0.199,0.182c-0.072,0.059-0.146,0.113-0.224,0.165
						c-0.075,0.051-0.153,0.097-0.238,0.143c-0.079,0.043-0.16,0.081-0.243,0.115C15.855,6.5,15.77,6.533,15.682,6.559
						c-0.087,0.026-0.176,0.049-0.269,0.066c-0.089,0.019-0.18,0.031-0.271,0.041c-0.181,0.017-0.363,0.018-0.546,0
						c-0.091-0.01-0.182-0.022-0.274-0.042c-0.089-0.017-0.178-0.039-0.265-0.065C13.97,6.533,13.884,6.5,13.799,6.466
						c-0.083-0.034-0.164-0.072-0.248-0.118c-0.08-0.043-0.158-0.089-0.234-0.14c-0.076-0.052-0.15-0.106-0.221-0.163
						c-0.069-0.058-0.137-0.118-0.203-0.186c-0.064-0.064-0.125-0.131-0.187-0.206c-0.059-0.07-0.111-0.144-0.16-0.216
						c-0.051-0.077-0.099-0.156-0.142-0.235c-0.008-0.016-0.014-0.031-0.023-0.047c-0.004-0.008-0.003-0.017-0.007-0.025
						c-0.003-0.006-0.009-0.01-0.013-0.016c-0.026-0.053-0.053-0.106-0.075-0.157c-0.035-0.087-0.066-0.174-0.093-0.261
						c-0.026-0.089-0.049-0.178-0.066-0.266c-0.018-0.09-0.031-0.182-0.041-0.273c-0.009-0.091-0.014-0.182-0.014-0.273
						S12.078,3.701,12.087,3.61z M6.209,10.928c-0.051,0.075-0.104,0.148-0.166,0.224c-0.058,0.07-0.118,0.137-0.185,0.203
						c-0.064,0.065-0.132,0.126-0.199,0.182c-0.072,0.059-0.146,0.113-0.224,0.165c-0.075,0.051-0.153,0.097-0.238,0.143
						c-0.079,0.043-0.16,0.081-0.243,0.115c-0.085,0.034-0.171,0.066-0.259,0.093c-0.087,0.026-0.176,0.049-0.269,0.066
						c-0.089,0.019-0.18,0.031-0.271,0.041c-0.181,0.018-0.363,0.018-0.546,0c-0.091-0.01-0.182-0.022-0.274-0.042
						c-0.089-0.017-0.178-0.039-0.265-0.065c-0.088-0.026-0.174-0.059-0.259-0.093c-0.083-0.034-0.164-0.072-0.248-0.118
						c-0.08-0.043-0.158-0.089-0.234-0.14c-0.076-0.052-0.15-0.106-0.221-0.163c-0.069-0.058-0.137-0.118-0.203-0.186
						c-0.064-0.064-0.125-0.131-0.187-0.206c-0.059-0.07-0.111-0.144-0.16-0.216c-0.051-0.077-0.099-0.156-0.142-0.235
						c-0.044-0.083-0.083-0.166-0.117-0.246c-0.035-0.087-0.066-0.174-0.093-0.261C1.182,10.1,1.159,10.011,1.142,9.923
						C1.124,9.833,1.11,9.742,1.101,9.65C1.092,9.559,1.087,9.468,1.087,9.376s0.005-0.183,0.014-0.273
						c0.01-0.092,0.023-0.184,0.04-0.271c0.019-0.091,0.041-0.18,0.067-0.268S1.266,8.39,1.299,8.309c0.036-0.086,0.075-0.169,0.118-0.25
						c0.044-0.081,0.092-0.16,0.141-0.234c0.051-0.075,0.104-0.148,0.166-0.224c0.058-0.07,0.118-0.137,0.185-0.203
						C1.973,7.332,2.04,7.272,2.107,7.216C2.18,7.158,2.254,7.103,2.331,7.051C2.406,7,2.484,6.955,2.569,6.909
						c0.079-0.043,0.16-0.081,0.243-0.115c0.085-0.034,0.171-0.066,0.259-0.093C3.158,6.674,3.247,6.652,3.34,6.634
						C3.429,6.616,3.52,6.603,3.61,6.593c0.091-0.009,0.182-0.013,0.272-0.013c0.092,0,0.183,0.004,0.273,0.013
						c0.091,0.01,0.182,0.022,0.274,0.042C4.52,6.652,4.608,6.674,4.695,6.701c0.088,0.026,0.174,0.059,0.259,0.093
						c0.083,0.034,0.164,0.072,0.248,0.118C5.282,6.955,5.36,7,5.437,7.051c0.076,0.052,0.15,0.106,0.221,0.163
						C5.727,7.272,5.794,7.332,5.86,7.4c0.064,0.064,0.125,0.131,0.187,0.206c0.059,0.07,0.111,0.144,0.16,0.216
						c0.051,0.077,0.099,0.156,0.142,0.235C6.393,8.14,6.432,8.223,6.466,8.303C6.501,8.39,6.532,8.477,6.559,8.564
						C6.585,8.653,6.607,8.742,6.625,8.83c0.018,0.09,0.031,0.182,0.041,0.273c0.009,0.091,0.013,0.182,0.013,0.273
						S6.675,9.559,6.666,9.65c-0.01,0.092-0.023,0.184-0.04,0.271c-0.019,0.091-0.041,0.18-0.067,0.268s-0.058,0.175-0.091,0.256
						c-0.036,0.086-0.075,0.169-0.118,0.25C6.306,10.775,6.258,10.854,6.209,10.928z M17.652,15.143c-0.01,0.092-0.023,0.184-0.04,0.271
						c-0.019,0.091-0.041,0.18-0.067,0.268s-0.058,0.175-0.091,0.256c-0.036,0.086-0.075,0.169-0.118,0.25
						c-0.044,0.081-0.092,0.16-0.141,0.234c-0.051,0.075-0.104,0.148-0.166,0.224c-0.058,0.07-0.118,0.137-0.185,0.203
						c-0.064,0.065-0.132,0.126-0.199,0.182c-0.072,0.059-0.146,0.113-0.224,0.165c-0.075,0.051-0.153,0.097-0.238,0.143
						c-0.079,0.043-0.16,0.081-0.243,0.115c-0.085,0.034-0.171,0.066-0.259,0.093c-0.087,0.026-0.176,0.049-0.269,0.066
						c-0.089,0.019-0.18,0.031-0.271,0.041c-0.181,0.017-0.363,0.018-0.546,0c-0.091-0.01-0.182-0.022-0.274-0.042
						c-0.089-0.017-0.178-0.039-0.265-0.065c-0.088-0.026-0.174-0.059-0.259-0.093c-0.083-0.034-0.164-0.072-0.248-0.118
						c-0.08-0.043-0.158-0.089-0.234-0.14c-0.076-0.052-0.15-0.106-0.221-0.163c-0.069-0.058-0.137-0.118-0.203-0.186
						c-0.064-0.064-0.125-0.131-0.187-0.206c-0.059-0.07-0.111-0.144-0.16-0.216c-0.051-0.077-0.099-0.156-0.142-0.235
						c-0.044-0.083-0.083-0.166-0.117-0.246c-0.035-0.087-0.066-0.174-0.093-0.261c-0.026-0.089-0.049-0.178-0.066-0.266
						c-0.018-0.09-0.031-0.182-0.041-0.273c-0.009-0.091-0.014-0.182-0.014-0.273s0.005-0.183,0.014-0.273
						c0.01-0.092,0.023-0.184,0.04-0.271c0.019-0.091,0.041-0.18,0.067-0.268s0.058-0.175,0.091-0.256
						c0.036-0.086,0.075-0.169,0.118-0.25c0.044-0.081,0.092-0.16,0.141-0.234c0.051-0.075,0.104-0.148,0.166-0.224
						c0.058-0.07,0.118-0.137,0.185-0.203c0.064-0.065,0.132-0.126,0.199-0.182c0.072-0.059,0.146-0.113,0.224-0.165
						c0.075-0.051,0.153-0.097,0.238-0.143c0.079-0.043,0.16-0.081,0.243-0.115c0.085-0.034,0.171-0.066,0.259-0.093
						c0.087-0.026,0.176-0.049,0.269-0.066c0.089-0.019,0.18-0.031,0.271-0.041c0.091-0.009,0.182-0.013,0.272-0.013
						c0.092,0,0.183,0.004,0.273,0.013c0.091,0.01,0.182,0.022,0.274,0.042c0.089,0.017,0.178,0.039,0.265,0.065
						c0.088,0.026,0.174,0.059,0.259,0.093c0.083,0.034,0.164,0.072,0.248,0.118c0.08,0.043,0.158,0.089,0.234,0.14
						c0.076,0.052,0.15,0.106,0.221,0.163c0.069,0.058,0.137,0.118,0.203,0.186c0.064,0.064,0.125,0.131,0.187,0.206
						c0.059,0.07,0.111,0.144,0.16,0.216c0.051,0.077,0.099,0.156,0.142,0.235c0.044,0.083,0.083,0.166,0.117,0.246
						c0.035,0.087,0.066,0.174,0.093,0.261c0.026,0.089,0.049,0.178,0.066,0.266c0.018,0.09,0.031,0.182,0.041,0.273
						c0.009,0.091,0.013,0.182,0.013,0.273S17.661,15.052,17.652,15.143z"/>
			</svg>
		</span>
    	<div class="close ion-close-round">
	    	<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 				viewBox="0 0 18.752 18.752" style="enable-background:new 0 0 18.752 18.752;" xml:space="preserve">
				<path d="M10.083,9.376l8.522-8.522c0.195-0.195,0.195-0.512,0-0.707s-0.512-0.195-0.707,0L9.376,8.669L0.854,0.146
						c-0.195-0.195-0.512-0.195-0.707,0s-0.195,0.512,0,0.707l8.522,8.522l-8.522,8.522c-0.195,0.195-0.195,0.512,0,0.707
						c0.098,0.098,0.226,0.146,0.354,0.146s0.256-0.049,0.354-0.146l8.522-8.522l8.522,8.522c0.098,0.098,0.226,0.146,0.354,0.146
						s0.256-0.049,0.354-0.146c0.195-0.195,0.195-0.512,0-0.707L10.083,9.376z"/>
			</svg>
    	</div>
  		<ul class="social">
      		<li>
      			<a class="social_share share_facebook" href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),'facebook-share-dialog','width=626,height=436');return false;">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/SVG/facebook-01.svg" alt="Facebook"/>
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/SVG/facebook-01.svg" alt="Facebook"/>
				</a>
			</li>
      		<li>
      			<a class="social_share share_twitter" href="#" onclick="window.open('https://twitter.com/share?text=<?php echo $topsectiontitle; ?>&url='+encodeURIComponent(location.href),'twitter-share-dialog','width=626,height=436');return false;">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/SVG/twitter-01.svg" alt="Twitter"/>
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/SVG/twitter-01.svg" alt="Twitter"/>
				</a>
			</li>
      		<li>
      			<a class="social_share share_linkedin" href="#" onclick="window.open('https://linkedin.com/shareArticle?mini=true&url='+encodeURIComponent(location.href),'linkedin-share-dialog','width=626,height=436');return false;">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/SVG/linkedin-01.svg" alt="LinkedIn"/>
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/SVG/linkedin-01.svg" alt="LinkedIn"/>
				</a>
			</li>
			<li>
      			<a class="social_share share_pinterest"  href="#" onclick="window.open('https://www.pinterest.com/pin/create/button/','pinterest-share-dialog','width=626,height=436');return false;">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/SVG/pinterest-01.svg" alt="Pinterest"/>
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/SVG/pinterest-01.svg" alt="Pinterest"/>
				</a>
			</li>
    	</ul>
  	</div>
  	<div class="subscribe_btn micro_side_btn">
  		<span class="cta">
  			<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 				viewBox="0 0 18.752 18.752" style="enable-background:new 0 0 18.752 18.752;" xml:space="preserve">
				<g>
					<path d="M2.932,2.392C2.031,2.044,1.834,1.847,1.834,1.476V1.468c0-0.349,0.295-0.613,0.773-0.613c0.425,0,0.826,0.204,1.19,0.5
						l0.5-0.674C3.811,0.256,3.243,0.059,2.629,0.059c-0.985,0-1.682,0.613-1.682,1.485v0.015c0,0.848,0.523,1.219,1.53,1.599
						c0.841,0.31,1.015,0.53,1.015,0.863v0.007c0,0.394-0.326,0.674-0.834,0.674c-0.56,0-0.999-0.273-1.393-0.629l-0.53,0.66
						c0.575,0.53,1.234,0.765,1.916,0.765c0.993,0,1.72-0.599,1.72-1.53V3.952C4.371,3.18,3.917,2.771,2.932,2.392z"/>
					<path d="M9.238,5.513c1.197,0,1.977-0.712,1.977-2.136V0.128h-0.872v3.302c0,0.841-0.424,1.273-1.09,1.273
						c-0.682,0-1.099-0.447-1.099-1.303V0.128H7.276v3.28C7.276,4.793,8.056,5.513,9.238,5.513z"/>
					<path d="M17.933,3.983V3.952c0-0.711-0.424-1.06-1.008-1.265c0.402-0.197,0.78-0.538,0.78-1.189V1.476
						c0-0.364-0.12-0.659-0.355-0.894c-0.296-0.295-0.781-0.454-1.356-0.454H14.1V5.43h1.947C17.176,5.43,17.933,4.914,17.933,3.983z
						 M14.964,0.915h0.97c0.568,0,0.894,0.258,0.894,0.705v0.015c0,0.492-0.371,0.75-0.947,0.75h-0.916V0.915z M14.964,3.127h1.068
						c0.667,0,1.022,0.288,1.022,0.75v0.015c0,0.485-0.378,0.749-0.984,0.749h-1.106V3.127z"/>
					<path d="M2.932,9.024C2.031,8.675,1.834,8.478,1.834,8.107V8.1c0-0.349,0.295-0.613,0.773-0.613c0.425,0,0.826,0.204,1.19,0.5
						l0.5-0.674C3.811,6.888,3.243,6.691,2.629,6.691c-0.985,0-1.682,0.613-1.682,1.485V8.19c0,0.848,0.523,1.219,1.53,1.599
						c0.841,0.31,1.015,0.53,1.015,0.863v0.007c0,0.394-0.326,0.674-0.834,0.674c-0.56,0-0.999-0.273-1.393-0.629l-0.53,0.66
						c0.575,0.53,1.234,0.765,1.916,0.765c0.993,0,1.72-0.599,1.72-1.53v-0.016C4.371,9.811,3.917,9.402,2.932,9.024z"/>
					<path d="M9.662,11.319c-0.834,0-1.462-0.75-1.462-1.901V9.388c0-1.129,0.628-1.886,1.462-1.886c0.477,0,0.825,0.228,1.136,0.515
						l0.53-0.674c-0.431-0.394-0.924-0.659-1.666-0.659c-1.371,0-2.371,1.098-2.371,2.704V9.44c0,1.621,0.97,2.697,2.326,2.697
						c0.735,0,1.272-0.273,1.735-0.75l-0.515-0.621C10.503,11.084,10.17,11.319,9.662,11.319z"/>
					<path d="M14.972,10.191h0.848c0.015,0,0.038,0,0.053-0.007l1.129,1.878h1.015l-1.25-2.053c0.644-0.227,1.099-0.735,1.099-1.552
						V8.425c0-0.485-0.159-0.886-0.439-1.167c-0.318-0.318-0.81-0.5-1.416-0.5h-1.917v5.302h0.879V10.191z M14.972,7.562h0.962
						c0.659,0,1.045,0.31,1.045,0.909v0.016c0,0.552-0.379,0.916-1.061,0.916h-0.946V7.562z"/>
					<polygon points="3.061,14.185 4.271,14.185 4.271,13.391 3.061,13.391 2.182,13.391 0.93,13.391 0.93,14.185 2.182,14.185 
						2.182,17.897 0.93,17.897 0.93,18.693 2.182,18.693 3.061,18.693 4.309,18.693 4.309,17.897 3.061,17.897 	"/>
					<path d="M10.294,15.951c0.402-0.197,0.78-0.538,0.78-1.189v-0.023c0-0.364-0.12-0.659-0.355-0.894
						c-0.296-0.295-0.781-0.454-1.356-0.454H7.469v5.302h1.947c1.129,0,1.886-0.515,1.886-1.447v-0.031
						C11.302,16.504,10.878,16.155,10.294,15.951z M8.333,14.178h0.97c0.568,0,0.894,0.258,0.894,0.705v0.015
						c0,0.492-0.371,0.75-0.947,0.75H8.333V14.178z M10.423,17.155c0,0.485-0.378,0.749-0.984,0.749H8.333V16.39H9.4
						c0.667,0,1.022,0.288,1.022,0.75V17.155z"/>
					<polygon points="15.176,16.421 17.365,16.421 17.365,15.625 15.176,15.625 15.176,14.185 17.646,14.185 17.646,13.391 
						14.305,13.391 14.305,18.693 17.684,18.693 17.684,17.897 15.176,17.897 	"/>
				</g>
			</svg>
		</span>
    	<div class="close ion-close-round">
	    	<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 				viewBox="0 0 18.752 18.752" style="enable-background:new 0 0 18.752 18.752;" xml:space="preserve">
				<style type="text/css">
					.st0{fill:none;stroke:#000000;stroke-linecap:round;stroke-linejoin:round;}
				</style>
				<path d="M10.083,9.376l8.522-8.522c0.195-0.195,0.195-0.512,0-0.707s-0.512-0.195-0.707,0L9.376,8.669L0.854,0.146
						c-0.195-0.195-0.512-0.195-0.707,0s-0.195,0.512,0,0.707l8.522,8.522l-8.522,8.522c-0.195,0.195-0.195,0.512,0,0.707
						c0.098,0.098,0.226,0.146,0.354,0.146s0.256-0.049,0.354-0.146l8.522-8.522l8.522,8.522c0.098,0.098,0.226,0.146,0.354,0.146
						s0.256-0.049,0.354-0.146c0.195-0.195,0.195-0.512,0-0.707L10.083,9.376z"/>
			</svg>
    	</div>
  		<div class="mailchimp_form">
      		<!-- Begin Mailchimp Signup Form -->
			<div id="mc_embed_signup">
				<form action="https://ankrommoisan.us20.list-manage.com/subscribe/post?u=54205948a84065affce749c87&amp;id=3599308eb9" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    				<div id="mc_embed_signup_scroll">
		    			<div class="row">
	    					<div class="mc-field-group col-6">
								<input type="text" value="" name="FNAME" placeholder="First Name" class="" id="mce-FNAME">
							</div>
							<div class="mc-field-group col-6">
								<input type="text" value="" name="LNAME" placeholder="Last Name" class="" id="mce-LNAME">
							</div>
		    			</div>
	    				<div class="row">
		    				<div class="mc-field-group col-6">
								<input type="email" value="" name="EMAIL" placeholder="Email" class="required email" id="mce-EMAIL">
							</div>
							<div class="mc-field-group col-6">
								<input type="text" value="" name="COMPNAME"  placeholder="Company" class="" id="mce-COMPNAME">
							</div>
	    				</div>
	    				<div class="mc-field-group input-group hidden_block">
							<ul>
								<li><input type="checkbox" value="1" name="group[6358][1]" id="mce-group[6358]-6358-0" <?php if(in_array( 'Architecture', get_field('mailchimp_groups'))): ?>checked<?php endif; ?>><label for="mce-group[6358]-6358-0">Architecture</label></li>
								<li><input type="checkbox" value="2" name="group[6358][2]" id="mce-group[6358]-6358-1" <?php if(in_array( 'Brand', get_field('mailchimp_groups'))): ?>checked<?php endif; ?>><label for="mce-group[6358]-6358-1">Brand</label></li>
								<li><input type="checkbox" value="4" name="group[6358][4]" id="mce-group[6358]-6358-2" <?php if(in_array( 'Interiors', get_field('mailchimp_groups'))): ?>checked<?php endif; ?>><label for="mce-group[6358]-6358-2">Interiors</label></li>
								<li><input type="checkbox" value="8" name="group[6358][8]" id="mce-group[6358]-6358-3" <?php if(in_array( 'Planning', get_field('mailchimp_groups'))): ?>checked<?php endif; ?>><label for="mce-group[6358]-6358-3">Planning</label></li>
								<li><input type="checkbox" value="16" name="group[6358][16]" id="mce-group[6358]-6358-4" <?php if(in_array( 'Community', get_field('mailchimp_groups'))): ?>checked<?php endif; ?>><label for="mce-group[6358]-6358-4">Community</label></li>
								<li><input type="checkbox" value="32" name="group[6358][32]" id="mce-group[6358]-6358-5" <?php if(in_array( 'Healthcare', get_field('mailchimp_groups'))): ?>checked<?php endif; ?>><label for="mce-group[6358]-6358-5">Healthcare</label></li>
								<li><input type="checkbox" value="64" name="group[6358][64]" id="mce-group[6358]-6358-6" <?php if(in_array( 'Higher Education', get_field('mailchimp_groups'))): ?>checked<?php endif; ?>><label for="mce-group[6358]-6358-6">Higher Education</label></li>
								<li><input type="checkbox" value="128" name="group[6358][128]" id="mce-group[6358]-6358-7" <?php if(in_array( 'Hospitality', get_field('mailchimp_groups'))): ?>checked<?php endif; ?>><label for="mce-group[6358]-6358-7">Hospitality</label></li>
								<li><input type="checkbox" value="256" name="group[6358][256]" id="mce-group[6358]-6358-8" <?php if(in_array( 'Housing', get_field('mailchimp_groups'))): ?>checked<?php endif; ?>><label for="mce-group[6358]-6358-8">Housing</label></li>
								<li><input type="checkbox" value="512" name="group[6358][512]" id="mce-group[6358]-6358-9" <?php if(in_array( 'Office', get_field('mailchimp_groups'))): ?>checked<?php endif; ?>><label for="mce-group[6358]-6358-9">Office</label></li>
								<li><input type="checkbox" value="1024" name="group[6358][1024]" id="mce-group[6358]-6358-10" <?php if(in_array( 'Retail', get_field('mailchimp_groups'))): ?>checked<?php endif; ?>><label for="mce-group[6358]-6358-10">Retail</label></li>
								<li><input type="checkbox" value="2048" name="group[6358][2048]" id="mce-group[6358]-6358-11" <?php if(in_array( 'Senior Communities', get_field('mailchimp_groups'))): ?>checked<?php endif; ?>><label for="mce-group[6358]-6358-11">Senior Communities</label></li>
								<li><input type="checkbox" value="4096" name="group[6358][4096]" id="mce-group[6358]-6358-12" <?php if(in_array( 'Urban Living Interiors', get_field('mailchimp_groups'))): ?>checked<?php endif; ?>><label for="mce-group[6358]-6358-12">Urban Living Interiors</label></li>
								<li><input type="checkbox" value="8192" name="group[6358][8192]" id="mce-group[6358]-6358-13" <?php if(in_array( 'Workplace Interiors', get_field('mailchimp_groups'))): ?>checked<?php endif; ?>><label for="mce-group[6358]-6358-13">Workplace Interiors</label></li>
							</ul>
						</div>
						<div id="mce-responses" class="clear">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    					<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_54205948a84065affce749c87_3599308eb9" tabindex="-1" value=""></div>
    					<div class="row">
    						<div class="clear col-12"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    					</div>
    				</div>
				</form>
			</div>
			<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='COMPNAME';ftypes[5]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
			<!--End mc_embed_signup-->
    	</div>
  	</div>
</div>


<script>
		
		
const mainWebsiteNav = document.querySelector('#main_menu_wrap');
/*
console.log(mainWebsiteNav);
mainWebsiteNav.remove();
*/
	
/*
const micorsiteSlideNavLinks = document.querySelectorAll('.micro_nav_top_list.micro_nav_list a');



const navButton = document.querySelector('.nav_button.menu_micro');

function micorSiteNav(e) {
	if(!e.key){
		navButton.closest('#microsite_nav_wrapper').classList.toggle("open_micro_nav");
		mainHtml.classList.toggle('locked');
		navButton.classList.toggle("open");
	}
	if(e.key == 'Escape'){
		mainHtml.classList.remove('locked');
	    navButton.classList.remove("open");
	    navButton.closest('#microsite_nav_wrapper').classList.remove("open_micro_nav");
	}else{
		
	}
}
*/

/*
navButton.addEventListener("click", micorSiteNav);
document.addEventListener("keydown", micorSiteNav);
*/

/*
micorsiteSlideNavLinks.forEach(microNavLink => { 
	microNavLink.addEventListener("click", e => (mainHtml.classList.remove('locked')) & (navButton.classList.remove("open")) & (navButton.closest('#microsite_nav_wrapper').classList.remove("open_micro_nav")));
});
	
*/
	
/*
jQuery(document).ready(function(){
	<?php if($campaigndiscipline): ?>
	jQuery('.breadcrumbs-discipline').html('<?php echo $campaigndiscipline; ?>');
	<?php endif; ?>
	<?php if($campaignsector): ?>
	jQuery('.breadcrumbs-sector').html('<?php if($campaigndiscipline): ?>&nbsp;|&nbsp;<?php endif; echo $campaignsector; ?> ');
	<?php endif; ?>
	<?php if($campaigntype && $campaignsector): ?>
	jQuery('.breadcrumbs-sector-type').html('<?php if($campaignsector): ?>&nbsp;/&nbsp;<?php endif; echo $campaigntype; ?>');
	<?php endif; ?>
	<?php if($sectionabovecampaign): ?>
	jQuery('.breadcrumbs-location').html('<?php if($campaignsector):  ?>&nbsp;|&nbsp;<?php endif; echo $topsectiontitle; ?>');
	<?php else: ?>
	jQuery('.breadcrumbs-location').html('<?php if($campaignsector):  ?>&nbsp;|&nbsp;<?php endif; echo $campaignimagetitle; ?>');
	<?php endif; ?>	
});
*/
		
		
const shareBtn = document.querySelector('.share_subscribe_wrapper .share-btn'); 
const subscribeBtn = document.querySelector('.share_subscribe_wrapper .subscribe_btn'); 
const closeSubShareBtn = document.querySelectorAll('.share_subscribe_wrapper .close'); 
        
function openShareSub(e) {
	(e.currentTarget == shareBtn) ? (subscribeBtn.classList.remove('clicked')) & (e.currentTarget.classList.toggle('clicked')) : '';
	(e.currentTarget == subscribeBtn) ? (shareBtn.classList.remove('clicked')) & (e.currentTarget.classList.toggle('clicked')) : '';
}
function closeShareSub(e) {
	subscribeBtn.classList.remove('clicked');
	shareBtn.classList.remove('clicked')
}
shareBtn.addEventListener('click', openShareSub);
subscribeBtn.addEventListener('click', openShareSub);
window.addEventListener('scroll', closeShareSub);
		
		
<?php if($sectionabovecampaign): ?>

const topNav = document.querySelector('#icon_top_nav');
const navHeight = document.querySelector('#icon_top_nav').offsetHeight;
const hieghtThreshold = topNav.offsetTop;
const navSpacer = document.querySelector('.nav_spacer');

function stickyNavMicro() {
    var scrollTop = window.scrollY;
    
    (scrollTop >= (hieghtThreshold + 300)) ? topNav.classList.add('sticky') : topNav.classList.remove('sticky');
    
    if(scrollTop >= (hieghtThreshold + 300)){
	    navSpacer.style.height = navHeight + 'px';
	}else{
		navSpacer.style.height = 0;
	}
}
window.addEventListener('scroll', stickyNavMicro);





// Sticky nav grab and swipe if too long
const slider = document.querySelector('.sticky_overflow_scroll');
let isDown = false;
let startX;
let scrollLeft;

slider.addEventListener('mousedown', (e) => {
	isDown = true;
	slider.classList.add('active');
	startX = e.pageX - slider.offsetLeft;
	scrollLeft = slider.scrollLeft;
});
slider.addEventListener('mouseleave', () => {
	isDown = false;
	slider.classList.remove('active');
});
slider.addEventListener('mouseup', () => {
	isDown = false;
	slider.classList.remove('active');
});
slider.addEventListener('mousemove', (e) => {
	if(!isDown) return;
	e.preventDefault();
	const x = e.pageX - slider.offsetLeft;
	const walk = (x - startX) * 3; //scroll-fast
	slider.scrollLeft = scrollLeft - walk;
});

<?php endif; ?>
	
	</script>

<?php
get_footer();
