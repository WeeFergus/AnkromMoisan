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

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
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
	<?php if( have_rows('sector_hero_section') ): while( have_rows('sector_hero_section') ): the_row(); $marketsector_image = get_sub_field('sector_hero_main'); ?>
	<?php if($marketsector_image): ?>
		<?php $page_image = 'https:' . $marketsector_image; ?>
	<?php endif; ?>
	<?php endwhile; endif; ?>
	<!-- On The Boards Description -->
	<?php if(get_field('page_content')): ?>
		<?php $page_descriptioin = get_field('page_content'); ?>
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
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-37075439-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	
	  gtag('config', 'UA-37075439-1');
	</script>
	
	<!-- Hotjar Tracking Code for www.levelfoods.com -->
	<script>
	    (function(h,o,t,j,a,r){
	        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
	        h._hjSettings={hjid:1335879,hjsv:6};
	        a=o.getElementsByTagName('head')[0];
	        r=o.createElement('script');r.async=1;
	        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
	        a.appendChild(r);
	    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
	</script>
	
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-KN9NCHL');</script>
	<!-- End Google Tag Manager -->
	
	

</head>

<body <?php body_class(); ?>>
	<!-- Current Year -->
	<?php function currentYear(){ return date('Y'); } ?>
	
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KN9NCHL"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

<?php wp_body_open(); ?>
<?php include 'template-parts/main-menu.php';?>
	<div class="breadcrumbs">
		<div class="breadcrumbs-discipline"></div><span class="br_devider_one">&nbsp;|</span>
		<div class="breadcrumbs-sector"></div><span class="br_devider_two">&nbsp;/</span>
		<div class="breadcrumbs-sector-type"></div><span class="br_devider_three">&nbsp;|</span>
		<div class="breadcrumbs-location"></div><span class="br_devider_four">&nbsp;/</span>
		<div class="breadcrumbs-project"></div>
	</div>
	<script>
		const breadcrumbWrap = document.querySelector('.breadcrumbs');
		
		const breadcrumbDisc = document.querySelector('.breadcrumbs-discipline');
		const breadcrumbSector = document.querySelector('.breadcrumbs-sector');
		const breadcrumbSecType = document.querySelector('.breadcrumbs-sector-type');
		const breadcrumbLocation = document.querySelector('.breadcrumbs-location');
		const breadcrumbProjectName = document.querySelector('.breadcrumbs-project'); 
		
		const breadcrumbDevOne = document.querySelector('.br_devider_one'); 
		const breadcrumbDevTwo = document.querySelector('.br_devider_two'); 
		const breadcrumbDevThree = document.querySelector('.br_devider_three'); 
		const breadcrumbDevFour = document.querySelector('.br_devider_four'); 
				
		<?php if(strstr($_SERVER['REQUEST_URI'], 'architecture') == true ): ?>
		breadcrumbDisc.innerHTML = '&nbsp;Architecture';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'interiors') == true ): ?>
		breadcrumbDisc.innerHTML = '&nbsp;Interiors';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'planning') == true ): ?>
		breadcrumbDisc.innerHTML = '&nbsp;Planning';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'brand') == true ): ?>
		breadcrumbDisc.innerHTML = '&nbsp;Brand';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'business-services') == true ): ?>
		breadcrumbDisc.innerHTML = '&nbsp;Business Services';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'on-the-board') == true ): ?>
		breadcrumbDisc.innerHTML = '&nbsp;On The Boards';
		<?php else: ?>
		breadcrumbDisc.innerHTML = '';
		<?php endif; ?> 
		
		<?php if(strstr($_SERVER['REQUEST_URI'], 'housing') == true ): ?>
		breadcrumbSector.innerHTML = '&nbsp;HOUSING';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'office') == true ): ?>
		breadcrumbSector.innerHTML = '&nbsp;OFFICE';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'senior-communities') == true ): ?>
		breadcrumbSector.innerHTML = '&nbsp;SENIOR COMMUNITIES';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'healthcare') == true ): ?>
		breadcrumbSector.innerHTML = '&nbsp;HEALTHCARE';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'higher-education') == true ): ?>
		breadcrumbSector.innerHTML = '&nbsp;HIGHER EDUCATION';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'hospitality') == true ): ?>
		breadcrumbSector.innerHTML = '&nbsp;HOSPITALITY';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'retail') == true ): ?>
		breadcrumbSector.innerHTML = '&nbsp;RETAIL';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'community') == true ): ?>
		breadcrumbSector.innerHTML = '&nbsp;COMMUNITY';
		<?php else: ?>
		breadcrumbSector.innerHTML = '';
		<?php endif; ?>
		
		<?php if(strstr($_SERVER['REQUEST_URI'], 'oregon') == true): ?>
		breadcrumbLocation.innerHTML = '&nbsp;Oregon';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'washington') == true ): ?>
		breadcrumbLocation.innerHTML = '&nbsp;Washington';
		<?php elseif(strstr($_SERVER['REQUEST_URI'], 'california') == true ): ?>
		breadcrumbLocation.innerHTML = '&nbsp;SENIOR COMMUNITIES';
		<?php else: ?>
		breadcrumbLocation.innerHTML = '';
		<?php endif; ?>
		
		
		<?php if(strstr($_SERVER['REQUEST_URI'], 'projects') == true ): ?>
			<?php if( have_rows('project_sidebar') ): while( have_rows('project_sidebar') ): the_row(); 
				$projectstate = get_sub_field('state'); 
				$projectmarket = get_sub_field('market'); ?>
				<?php if($projectstate): ?>
				breadcrumbLocation.innerHTML = '&nbsp;<?php echo $projectstate; ?>';
				<?php endif; ?>
				<?php if($projectmarket): ?>
				breadcrumbSector.innerHTML = '&nbsp;<?php echo $projectmarket; ?>';
				<?php endif; ?>
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
		
		<?php if(strstr($_SERVER['REQUEST_URI'], 'affordable-housing') == true || strstr($_SERVER['REQUEST_URI'], 'mid-rise') == true || strstr($_SERVER['REQUEST_URI'], 'high-rise') == true || strstr($_SERVER['REQUEST_URI'], 'urban-living-interiors') == true || strstr($_SERVER['REQUEST_URI'], 'corporate') == true || strstr($_SERVER['REQUEST_URI'], 'core-and-shell') == true || strstr($_SERVER['REQUEST_URI'], 'landlord') == true || strstr($_SERVER['REQUEST_URI'], 'workplace-interiors') == true || strstr($_SERVER['REQUEST_URI'], 'not-for-profit') == true || strstr($_SERVER['REQUEST_URI'], 'senior-living') == true || strstr($_SERVER['REQUEST_URI'], 'behavioral-health') == true || strstr($_SERVER['REQUEST_URI'], 'wellness') == true || strstr($_SERVER['REQUEST_URI'], 'ambulatory-care') == true || strstr($_SERVER['REQUEST_URI'], 'acute-care') == true || strstr($_SERVER['REQUEST_URI'], 'classroom-and-office') == true || strstr($_SERVER['REQUEST_URI'], 'learning-centers') == true || strstr($_SERVER['REQUEST_URI'], 'student-housing') == true || strstr($_SERVER['REQUEST_URI'], 'destination') == true || strstr($_SERVER['REQUEST_URI'], 'hotels-and-resorts') == true || strstr($_SERVER['REQUEST_URI'], 'corporate-retail') == true || strstr($_SERVER['REQUEST_URI'], 'branded-retail') == true || strstr($_SERVER['REQUEST_URI'], 'mission-driven') == true || strstr($_SERVER['REQUEST_URI'], 'civic') == true || strstr($_SERVER['REQUEST_URI'], 'cultural') == true): ?>
		breadcrumbSecType.innerHTML = '&nbsp;<?php the_title(); ?>';
		<?php else: ?>
		breadcrumbSecType.innerHTML = '';
		<?php endif; ?>
		
		(breadcrumbDisc.innerHTML == '') ? breadcrumbDevOne.classList.add('inactive') : '';
		(breadcrumbSector.innerHTML == '') ? (breadcrumbDevOne.classList.add('inactive')) & (breadcrumbDevTwo.classList.add('inactive'))  & (breadcrumbDevThree.classList.add('inactive')) : '';
		(breadcrumbSecType.innerHTML == '') ? breadcrumbDevTwo.classList.add('inactive') : '';
		(breadcrumbLocation.innerHTML == '') ? (breadcrumbDevThree.classList.add('inactive')) & (breadcrumbDevFour.classList.add('inactive')) : '';
		(breadcrumbProjectName.innerHTML == '') ? breadcrumbDevFour.classList.add('inactive') : '';
		
		function hideBreadcrumbs(){
			if(window.pageYOffset >= 100){
				breadcrumbWrap.classList.add('hidden');
			}else{
				breadcrumbWrap.classList.remove('hidden');
			}
		}
		
		window.addEventListener('scroll', hideBreadcrumbs);
	</script>