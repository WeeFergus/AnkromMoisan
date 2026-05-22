<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ankrom_Moisan
 */

 $page_image = '';
 $page_descriptioin = '';

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/swiper/swiper-bundle.min.css">
	<!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"> -->
	
	<?php wp_head(); ?>
	<!-- Home Page Description -->
	<?php if( have_rows('home_sector_bottom_section') ): while( have_rows('home_sector_bottom_section') ): the_row(); ?>
	<?php if( have_rows('bottom_column_content') ): while( have_rows('bottom_column_content') ): the_row(); ?>
	<?php if( have_rows('right_column') ): while( have_rows('right_column') ): the_row(); $homepage_description = str_replace('<p>', '', get_sub_field('column_content')); ?>
	<?php if($homepage_description): ?>
		<?php $page_descriptioin = str_replace('</p>', '', $homepage_description); ?>
	<?php endif; ?>
	<?php endwhile; endif; ?>
	<?php endwhile; endif; ?>
	<?php endwhile; endif; ?>
	<!-- Discipline Description -->
	<?php if(get_field('discipline_top_content')): ?>
		<?php $page_descriptioin = get_field('discipline_top_content'); ?>
	<?php endif; ?>
	<!-- Discipline Image -->
	<?php if( have_rows('discipline_hero_section') ): while( have_rows('discipline_hero_section') ): the_row(); $discipline_image = get_sub_field('hero_image'); ?>
	<?php if($discipline_image): ?>
		<?php $page_image = 'https:' . $discipline_image; ?>
	<?php endif; ?>
	<?php endwhile; endif; ?>
	<!-- Market Sector Description -->
	<?php if( have_rows('sector_top_section') ): while( have_rows('sector_top_section') ): the_row(); $marketsector_description = get_sub_field('sector_text'); ?>
	<?php if($marketsector_description): ?>
		<?php $page_descriptioin = $marketsector_description; ?>
	<?php endif; ?>
	<?php endwhile; endif; ?>
	<!-- Market Sector Image -->
	<?php if( have_rows('sector_hero_section') ): while( have_rows('sector_hero_ection') ): the_row(); $marketsector_image = get_sub_field('sector_hero_main'); ?>
	<?php if($marketsector_image): ?>
		<?php $page_image = 'https:' . $smarketsector_image; ?>
	<?php endif; ?>
	<?php endwhile; endif; ?>
	<!-- On The Boards Description -->
	<?php if(get_field('page_content')): ?>
		<?php // $page_descriptioin = get_field('page_content'); ?>
	<?php endif; ?>
	<!-- Projects Description -->
	<?php if( have_rows('top_project_content') ): while( have_rows('top_project_content') ): the_row(); $project_description = get_sub_field('project_content'); ?>
	<?php if($project_description): ?>
		<?php $page_descriptioin = $project_description; ?>
	<?php endif; ?>
	<?php endwhile; endif; ?>
	<!-- Projects Image -->
	<?php if( have_rows('top_page_slidershow') ): while( have_rows('top_page_slidershow') ): the_row(); ?>
	<?php if( have_rows('slide_one') ): while( have_rows('slide_one') ): the_row(); $project_image = get_sub_field('image'); ?>
	<?php if($project_image): ?>
		<?php $page_image = 'https:' . $project_image; ?>
	<?php endif; ?>
	<?php endwhile; endif; ?>
	<?php endwhile; endif; ?>
	
	<!-- Microsites Description + Image-->
	<?php if(strstr($_SERVER['REQUEST_URI'], 'thought-leadership') == true ): ?>
	<?php $top_micor_content = get_field('show_section_above_campaign');
		if($top_micor_content): 
		$topsection_image = get_field('top_background_image');
		$page_image = $topsection_image['sizes']['large']; ?>
		<?php $page_descriptioin = get_field('top_content'); ?>
	<?php else: ?>
		<?php $campaign_image = get_field('campaigns_0_campaign_background_image');
	        $page_image = $campaign_image['sizes']['large'];
			$page_descriptioin = get_field('campaigns_0_campaign_content');?>
	<?php endif; ?>
	<?php endif; ?>
	
	<?php if($page_image == ''): ?>
		<?php $page_image = get_template_directory_uri() . '/assets/images/AnkromMoisan.jpg'; ?>
	<?php  endif; ?>
	<?php if($page_descriptioin != ''): ?>
	<meta name="description" content="<?php echo substr($page_descriptioin, 0, 150); ?>">
	<?php else: ?>
	<meta name="description" content="<?php the_title(); ?>">
	<?php endif; ?>
  	<meta name="keywords" content="<?php the_title(); ?>">
  	<meta name="author" content="Ankrom Moisan">
  	<meta property="og:title" content="<?php the_title(); ?>">
  	<?php if($page_descriptioin != ''): ?>
	<meta property="og:description" content="<?php echo substr($page_descriptioin, 0, 150); ?>">
	<?php else: ?>
	<meta property="og:description" content="<?php the_title(); ?>">
	<?php endif; ?>
	<meta property="og:image" content="<?php echo $page_image; ?>">
	<meta property="og:url" content="<?php echo get_permalink(get_the_ID()); ?>">
	<meta name="twitter:title" content="<?php the_title(); ?>">
	<?php if($page_descriptioin != ''): ?>
	<meta name="twitter:description" content="<?php echo substr($page_descriptioin, 0, 150); ?>">
	<?php else: ?>
	<meta name="twitter:description" content="<?php the_title(); ?>">
	<?php endif; ?>
	<meta name="twitter:image" content="<?php echo $page_image; ?>">
	<meta name="twitter:card" content="summary_large_image">
	
	

<script id="mapbox_script_footer" src='https://api.mapbox.com/mapbox-gl-js/v1.10.1/mapbox-gl.js'></script>
<link id="mapbox_style_footer" href='https://api.mapbox.com/mapbox-gl-js/v1.10.1/mapbox-gl.css' rel='stylesheet' />
</head>


<body <?php body_class(); ?>>
	<!-- Current Year -->
	<?php function currentYear(){ return date('Y'); } ?>
	


<?php wp_body_open(); ?>

<?php include 'template-parts/main-menu.php'; ?>
	<div class="breadcrumbs">
		<div class="breadcrumbs-category"></div>
		<div class="breadcrumbs-discipline"></div>
		<div class="breadcrumbs-sector"></div>
		<div class="breadcrumbs-location"></div>
		<div class="breadcrumbs-project"></div>
	</div>
	<script>
		const checkSplitUrl = window.location.pathname.split('/');
		
		const pageBody = document.querySelector('body');
		const breadcrumbWrap = document.querySelector('.breadcrumbs');
		
		const breadcrumbCategory = document.querySelector('.breadcrumbs-category');
		const breadcrumbDisc = document.querySelector('.breadcrumbs-discipline');
		const breadcrumbSector = document.querySelector('.breadcrumbs-sector');
		const breadcrumbLocation = document.querySelector('.breadcrumbs-location');
		const breadcrumbProjectName = document.querySelector('.breadcrumbs-project'); 
		
		if(!pageBody.classList.contains('error404')){
		<?php if(strstr($_SERVER['REQUEST_URI'], '/our-team') == true || strstr($_SERVER['REQUEST_URI'], '/our-team') == true || strstr($_SERVER['REQUEST_URI'], '/team') == true ): ?>
		breadcrumbCategory.innerHTML = '<a href="/our-team/">People</a>&nbsp;';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], '/team-member') == true ): ?>
		breadcrumbCategory.innerHTML = '<a href="/our-team/">People</a>&nbsp;';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], '/expertise') == true ): ?>
		breadcrumbCategory.innerHTML = '<a href="expertise/">Expertise</a>&nbsp;';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'explore-beyond') == true ): ?>
		breadcrumbDisc.innerHTML = '<a href="/explore-beyond">Explore&nbsp;Beyond</a>';		
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'culture') == true ): ?>
		breadcrumbDisc.innerHTML = '<a href="/culture/">Culture</a>';	
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'careers') == true ): ?>
		breadcrumbDisc.innerHTML = '<a href="/careers">Careers</a>';	
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'news') == true ): ?>
		breadcrumbDisc.innerHTML = '<a href="/news">AM in the News</a>';	
		<?php else: ?>
		breadcrumbCategory.innerHTML = '<a href="/top-projects/">Projects</a>&nbsp;';
		<?php endif; ?>
			
		<?php if(strstr($_SERVER['REQUEST_URI'], 'architecture-leadership') == true ): ?>
		breadcrumbDisc.innerHTML = '|&nbsp;<a href="/our-team/architecture-leadership/">Architecture&nbsp;Leadership</a>';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'on-the-boards') == true ): ?>
		breadcrumbDisc.innerHTML = '|&nbsp;<a href="/on-the-boards/">On The Boards</a>&nbsp;';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'architecture') == true ): ?>
		breadcrumbDisc.innerHTML = '|&nbsp;<a href="/architecture/">Architecture</a>&nbsp;';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'interiors-leadership') == true ): ?>
		breadcrumbDisc.innerHTML = '|&nbsp;<a href="/our-team/interiors-leadership/">Interiors&nbsp;Leadership</a>';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'interiors') == true ): ?>
		breadcrumbDisc.innerHTML = '|&nbsp;<a href="/interiors/">Interiors</a>&nbsp;';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'planning') == true ): ?>
		breadcrumbDisc.innerHTML = '|&nbsp;<a href="/planning/">Planning</a>&nbsp;';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'brand') == true ): ?>
		breadcrumbDisc.innerHTML = '|&nbsp;<a href="/brand/">Brand</a>&nbsp;';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'business-services') == true ): ?>
		breadcrumbDisc.innerHTML = '|&nbsp;Business Services&nbsp;';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'leadership') == true ): ?>
		breadcrumbDisc.innerHTML = '|&nbsp;<a href="/our-team/leadership/">Firm&nbsp;Leadership</a>';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'explore-beyond') == true ): ?>
		// nothing here
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'culture') == true ): ?>
		// nothing here

		<?php elseif( is_singular('location') ): ?>
			breadcrumbCategory.innerHTML = 'Location&nbsp;';
			breadcrumbDisc.classList.add('inactive');
			breadcrumbSector.classList.add('inactive');
			breadcrumbLocation.innerHTML = '|&nbsp;<?php the_title(); ?>';
 

		<?php else: ?>
		//breadcrumbDisc.innerHTML = '|&nbsp;<a href="/top-projects/">All Disciplines</a>&nbsp;';
		<?php endif; ?> 
		
		<?php if(strstr($_SERVER['REQUEST_URI'], '/housing') == true || strstr($_SERVER['REQUEST_URI'], '/affordable-housing') == true || strstr($_SERVER['REQUEST_URI'], '/urban-living-interiors') == true || strstr($_SERVER['REQUEST_URI'], '/office') == true || strstr($_SERVER['REQUEST_URI'], '/senior-communities') == true || strstr($_SERVER['REQUEST_URI'], '/spiritual') == true || strstr($_SERVER['REQUEST_URI'], '/healthcare') == true || strstr($_SERVER['REQUEST_URI'], '/higher-education') == true || strstr($_SERVER['REQUEST_URI'], '/hospitality') == true || strstr($_SERVER['REQUEST_URI'], '/retail') == true || strstr($_SERVER['REQUEST_URI'], '/community') == true): ?>
			<?php if(get_field('sector_title')):   // was sector_hero_section_sector_title
			
			
				$sector_title = get_field('sector_title');		  //was sector_hero_section_sector_title
				$sector_type_title = get_field('sector_type_title'); //  was sector_hero_section_sector_type_title
		
				?>
				if (checkSplitUrl.length <= 3) {
					breadcrumbSector.innerHTML = '|&nbsp;<a href="/<?php echo strtolower(str_replace(" ","-",$sector_title)); ?>/"><?php echo ucwords(strtolower($sector_title)); ?></a>&nbsp;';
				}else{
					breadcrumbSector.innerHTML = '|&nbsp;<a href="/<?php echo strtolower($sector_title); ?>/"><?php echo ucwords(strtolower(str_replace(" ","-",$sector_title))); ?></a>' + '  ' + '<a href="/<?php echo strtolower(str_replace(" ","-",$sector_type_title)); ?><?php echo ucwords(strtolower($sector_type_title)); ?></a>&nbsp;';
				}
			<?php else: ?>
				<?php if(strstr($_SERVER['REQUEST_URI'], '/housing') == true):  ?>
					breadcrumbSector.innerHTML = '|&nbsp;<a href="/housing/">Housing</a>&nbsp;';
				<?php elseif(strstr($_SERVER['REQUEST_URI'], '/affordable-housing') == true):  ?>
					breadcrumbSector.innerHTML = '|&nbsp;<a href="/affordable-housing/">Affordable&nbsp;Housing</a>&nbsp;';				
				<?php elseif(strstr($_SERVER['REQUEST_URI'], '/our-team') == true):  ?>
					breadcrumbSector.innerHTML = '|&nbsp;<a href="/our-team/leadership/">Firm&nbsp;Leadership</a>&nbsp;';				
				<?php elseif(strstr($_SERVER['REQUEST_URI'], '/office') == true):  ?>
					breadcrumbSector.innerHTML = '|&nbsp;<a href="/office/">Office</a>&nbsp;';
				<?php elseif(strstr($_SERVER['REQUEST_URI'], '/urban-living-interiors') == true):  ?>
					breadcrumbSector.innerHTML = '|&nbsp;<a href="/housing/">Housing</a>&nbsp;';
				<?php elseif(strstr($_SERVER['REQUEST_URI'], '/senior-communities') == true):  ?>
					breadcrumbSector.innerHTML = '|&nbsp;<a href="/senior-communities/">Senior Communities</a>&nbsp;';
				<?php elseif(strstr($_SERVER['REQUEST_URI'], '/spiritual') == true):  ?>
					breadcrumbSector.innerHTML = '|&nbsp;<a href="/spiritual/">Spiritual</a>&nbsp;';
				<?php elseif(strstr($_SERVER['REQUEST_URI'], '/healthcare') == true): ?>
					breadcrumbSector.innerHTML = '|&nbsp;<a href="/healthcare/">Healthcare</a>&nbsp;';
				<?php elseif(( strstr($_SERVER['REQUEST_URI'], '/higher-education') == true) || (strstr($_SERVER['REQUEST_URI'], '/higher-education') == true)  || (strstr($_SERVER['REQUEST_URI'], '/higher education') == true)  )        :  ?>
					breadcrumbSector.innerHTML = '|&nbsp;<a href="/higher-education/">Higher Education</a>&nbsp;';
				<?php elseif(strstr($_SERVER['REQUEST_URI'], '/hospitality') == true):  ?>
					breadcrumbSector.innerHTML = '|&nbsp;<a href="/hospitality/">Hospitality</a>&nbsp;';
				<?php elseif(strstr($_SERVER['REQUEST_URI'], '/retail') == true):  ?>
					breadcrumbSector.innerHTML = '|&nbsp;<a href="/retail/">Retail</a>&nbsp;';
				<?php elseif(strstr($_SERVER['REQUEST_URI'], '/community') == true): ?>
					breadcrumbSector.innerHTML = '|&nbsp;<a href="/community/">Community</a>&nbsp;';
				<?php elseif(strstr($_SERVER['REQUEST_URI'], '/culture') == true): ?>
					breadcrumbSector.innerHTML = '';
				<?php else: ?>
					breadcrumbSector.innerHTML = '|&nbsp;All Studios&nbsp;';
				<?php endif; ?>
			<?php endif; ?>
		<?php elseif(strstr($_SERVER['REQUEST_URI'], '/culture') == true): ?>
					breadcrumbSector.innerHTML = '';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'explore-beyond') == true ): ?>
				//  nothing here
		<?php else: ?>
			<?php if ((strstr($_SERVER['REQUEST_URI'], '/architecture') == true) && (strstr($_SERVER['REQUEST_URI'], 'on-the-boards') == true )){ ?>
				breadcrumbSector.innerHTML = '|&nbsp;<a href="/architecture">Architecture</a>';
			<?php } elseif ((strstr($_SERVER['REQUEST_URI'], '/interiors') == true) && (strstr($_SERVER['REQUEST_URI'], 'on-the-boards') == true )){ ?>
				breadcrumbSector.innerHTML = '|&nbsp;<a href="/interiors">Interiors</a>';
			<?php } elseif(strstr($_SERVER['REQUEST_URI'], '/our-team') != true) { ?>
				breadcrumbSector.innerHTML = '|&nbsp;All Studios&nbsp;';
			<?php } ?>
		<?php endif; ?>
		
		<?php //if(strstr($_SERVER['REQUEST_URI'], 'oregon') == true ): ?>
		// breadcrumbLocation.innerHTML = '|&nbsp;Oregon&nbsp;';
		<?php //elseif(strstr($_SERVER['REQUEST_URI'], 'washington') == true ): ?>
		// breadcrumbLocation.innerHTML = '|&nbsp;Washington&nbsp;';
		<?php //elseif(strstr($_SERVER['REQUEST_URI'], 'california') == true ): ?>
		// breadcrumbLocation.innerHTML = '|&nbsp;SENIOR COMMUNITIES';
		<?php //else: ?>
		// breadcrumbLocation.innerHTML = '|&nbsp;All Locations&nbsp;';
		<?php //endif; ?>
		
		
/*
		<?php if(strstr($_SERVER['REQUEST_URI'], 'projects') == true ): ?>
			<?php if( have_rows('project_sidebar') ): while( have_rows('project_sidebar') ): the_row(); 
				$projectstate = get_sub_field('state'); 
				$projectmarket = get_sub_field('market'); ?>
				
			<?php endwhile; endif; ?>
		<?php else: ?>
		breadcrumbProjectName.innerHTML = '';
		<?php endif; ?>
		
		<?php if(strstr($_SERVER['REQUEST_URI'], 'projects') == true || strstr($_SERVER['REQUEST_URI'], 'team-member') == true ): ?>
		breadcrumbProjectName.innerHTML = '&nbsp;<?php the_title(); ?>';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'people') == true ): ?>
		breadcrumbLocation.innerHTML = '&nbsp;Team';
		<?php else: ?>
		breadcrumbProjectName.innerHTML = '';
		<?php endif; ?>
*/
		
		<?php if(strstr($_SERVER['REQUEST_URI'], '/expertise') == true || strstr($_SERVER['REQUEST_URI'], '/our-top-projects') == true || strstr($_SERVER['REQUEST_URI'], '/our-team') == true ): ?>
		if (checkSplitUrl.length <= 3) {
			breadcrumbDisc.classList.add('inactive');
			breadcrumbSector.classList.add('inactive');
			breadcrumbLocation.classList.add('inactive');
		}
		<?php elseif(strstr($_SERVER['REQUEST_URI'], '/team') == true): ?>
			breadcrumbDisc.innerHTML = '|&nbsp;<?php the_title(); ?>';
			breadcrumbSector.classList.add('inactive');
			breadcrumbLocation.classList.add('inactive');
		<?php elseif(strstr($_SERVER['REQUEST_URI'], '/projects') == true): ?>
			breadcrumbProjectName.innerHTML = '|&nbsp;<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>';
			//breadcrumbDisc.classList.add('inactive'); // show the discipline
			<?php if (get_field('project_sidebar_state')) {
				$thisstate =  get_field('project_sidebar_state');
			?>
				// hide location breadcrumb 
				//breadcrumbLocation.innerHTML = '|&nbsp;<a href="/top-projects/?<?php echo strtolower($thisstate); ?>"><?php echo $thisstate; ?></a>&nbsp;';
			<?php } else { ?>
				breadcrumbLocation.classList.add('inactive');
			<?php } ?>
			<?php if(get_field('project_sidebar_market')): 
				$sidebarmarket = get_field('project_sidebar_market');
			?>
				breadcrumbSector.innerHTML = '|&nbsp;<a href="/<?php echo strtolower(str_replace(" ","-",$sidebarmarket)); ?>/"><?php echo ucwords(strtolower($sidebarmarket)); ?></a>&nbsp;';
			<?php else: ?>
				breadcrumbSector.classList.add('inactive');
			<?php endif; ?>			
		<?php endif; ?>
		
		<?php if(strstr($_SERVER['REQUEST_URI'], '/thought-leadership') == true): ?>
		breadcrumbLocation.classList.add('inactive')
		breadcrumbCategory.innerHTML = '<a href="/expertise/">Expertise</a>&nbsp;';
		<?php if(get_field('select_discipline')): ?>
		breadcrumbDisc.innerHTML = '|&nbsp;<?php echo the_field('select_discipline'); ?>&nbsp;';
		<?php else: ?>
		breadcrumbDisc.classList.add('inactive');
		<?php endif; ?>
		<?php if(get_field('select_sector') && get_field('project_type')): 
			$sector = get_field('select_sector');
		
		?>
		breadcrumbSector.innerHTML = '|&nbsp;<a href="/<?php echo strtolower(str_replace(" ","-",$sector)); ?>/"><?php echo $sector; ?></a>' + '  ' + '<?php echo the_field('project_type'); ?>&nbsp;';
		<?php elseif(!get_field('project_type')): ?>
		breadcrumbSector.innerHTML = '|&nbsp;<a href="/<?php echo strtolower(str_replace(" ","-",$sector)); ?>/"><?php  echo $sector; ?></a>&nbsp;';
		<?php else: ?>
		breadcrumbSector.classList.add('inactive');
		<?php endif; ?>
		<?php if(get_field('show_section_above_campaign')): ?>
		breadcrumbProjectName.innerHTML = '|&nbsp;<?php echo the_field('top_section_title'); ?>&nbsp;';
		<?php else: ?>
		breadcrumbProjectName.innerHTML = '/&nbsp;<?php echo the_field('campaigns_0_campaign_image_title'); ?>&nbsp;'
		<?php endif; ?>
		<?php endif; ?>
		}else{
			breadcrumbCategory.innerHTML = 'Page Not Found';
		}
			
		
/*
		<?php if(strstr($_SERVER['REQUEST_URI'], 'affordable-housing') == true || strstr($_SERVER['REQUEST_URI'], 'mid-rise') == true || strstr($_SERVER['REQUEST_URI'], 'high-rise') == true || strstr($_SERVER['REQUEST_URI'], 'urban-living-interiors') == true || strstr($_SERVER['REQUEST_URI'], 'corporate') == true || strstr($_SERVER['REQUEST_URI'], 'core-and-shell') == true || strstr($_SERVER['REQUEST_URI'], 'landlord') == true || strstr($_SERVER['REQUEST_URI'], 'workplace-interiors') == true || strstr($_SERVER['REQUEST_URI'], 'not-for-profit') == true || strstr($_SERVER['REQUEST_URI'], 'senior-living') == true || strstr($_SERVER['REQUEST_URI'], 'behavioral-health') == true || strstr($_SERVER['REQUEST_URI'], 'wellness') == true || strstr($_SERVER['REQUEST_URI'], 'ambulatory-care') == true || strstr($_SERVER['REQUEST_URI'], 'acute-care') == true || strstr($_SERVER['REQUEST_URI'], 'classroom-and-office') == true || strstr($_SERVER['REQUEST_URI'], 'learning-centers') == true || strstr($_SERVER['REQUEST_URI'], 'student-housing') == true || strstr($_SERVER['REQUEST_URI'], 'destination') == true || strstr($_SERVER['REQUEST_URI'], 'hotels-and-resorts') == true || strstr($_SERVER['REQUEST_URI'], 'corporate-retail') == true || strstr($_SERVER['REQUEST_URI'], 'branded-retail') == true || strstr($_SERVER['REQUEST_URI'], 'mission-driven') == true || strstr($_SERVER['REQUEST_URI'], 'civic') == true || strstr($_SERVER['REQUEST_URI'], 'cultural') == true): ?>
		breadcrumbSecType.innerHTML = '&nbsp;<?php the_title(); ?>';
		<?php else: ?>
		breadcrumbSecType.innerHTML = '';
		<?php endif; ?>
*/
		
		
		function hideBreadcrumbs(){
			if(window.pageYOffset >= 100){
				breadcrumbWrap.classList.add('hidden');
			}else{
				breadcrumbWrap.classList.remove('hidden');
			}
		}
		
		window.addEventListener('scroll', hideBreadcrumbs);
	</script>