<?php
/**
 * Template Name: Expertise Template (revised 2021)
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();?>

<?php $pageTitle = get_field('top_page_section_page_title');
	$pageContent = get_field('top_page_section_top_content');
	$pageBoldText = get_field('top_page_section_top_content_bold_line');
	$background = get_field('top_page_section_background');
	$backgroundColor = get_field('top_page_section_background_color');
	$backgroundGradientColorOne = get_field('top_page_section_background_gradient_top_color');
	$backgroundGradientColorTwo = get_field('top_page_section_background_gradient_bottom_color');
	$backgroundImage = get_field('top_page_section_top_content'); ?>
<div class="hero_sector_wrapper expertise_banner_wrap new_expertise_header<?php if($background === 'color'): ?> backround_color<?php endif; ?> <?php if($background === 'Gradient'): ?> backround_gradient<?php endif; ?><?php if($background === 'Image'): ?> backround_image<?php endif; ?>">
	<div class="container expertise_toptext_wrap">
		<div class="row title_content_row">
			<div class="col-12">
				<?php 	if($pageContent): ?>
							<span class="large_text"><?php echo $pageContent; ?></span>
						<?php endif; ?>
						<?php if($pageBoldText): ?>
							<h3><?php echo $pageBoldText; ?></h3>
						<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<style>
	.expertise_banner_wrap.backround_color{
		background-color: <?php echo $backgroundColor; ?>;
	}
	.expertise_banner_wrap.backround_gradient{
		background-color: <?php echo $backgroundColor; ?>;
		background: rgb(195,190,186);
		background: linear-gradient(180deg, <?php echo $backgroundGradientColorOne; ?> 0%, <?php echo $backgroundGradientColorTwo; ?> 100%);
	}
	.expertise_banner_wrap.backround_image{
		background-image: url(<?php echo $backgroundColor['url']; ?>);
		background-position: center center;
		background-size: cover;
	}
</style>

<!-- Grid Project -->
<?php $args = array(
    'post_type' => 'microsites',
    'post_status' => 'publish',
    'posts_per_page' => -1,
); 
$arr_posts = new WP_Query( $args ); 
if ( $arr_posts->have_posts() ) :  ?>

<div class="grid_project_wrap expertise_grid individual_project">
	<div class="row project_wrap expertise_grid_new">
		<?php while ( $arr_posts->have_posts() ) : $arr_posts->the_post(); ?>
		<?php $categories = get_the_terms( $post->ID, 'category');
			  if($categories){$categoriesPrint = implode(' x ', array_map(function($c) {return strtoupper($c->name); }, $categories));} ?>
		<?php // Microsites
					$sectionabovecampaign = get_field('show_section_above_campaign'); 
					if($sectionabovecampaign): ?>
				<?php $campaignImage = get_field('top_background_image'); $campaignImageUrl = $campaignImage['sizes']['2048x2048']; 
					$campaignTitle = get_field('top_section_title'); $campaignSubTitle = get_field('top_secondary_title'); $campaignSubTitleExtra = get_field('top_section_sub_title'); $campaignText = get_field('top_secondary_title'); $campaignTextTwo = get_field('top_content');
				?> 
				<?php endif; ?>
				<?php if(!$sectionabovecampaign): ?>
				<?php $campaignImage = get_field('campaigns_0_campaign_background_image'); $campaignImageUrl = $campaignImage['sizes']['2048x2048']; 
					$campaignTitle = get_field('campaigns_0_campaign_image_title'); $campaignSubTitle = get_field('campaigns_0_campaign_title_copy'); $campaignSubTitleTwo = get_field('campaigns_0_campaign_subtitle');  $campaignText = get_field('campaigns_0_campaign_content');
				?>
				<?php endif; ?>
		<a class="col-lg-4 col-md-12 hover_arrow_story no_padding" href="<?php the_permalink(); ?>">
			<div class="individual_project expertise_new project-center-cropped" style="background-image: url(<?php echo $campaignImageUrl; ?>); border-color: <?php echo the_field('campaign_theme_color'); ?>">
				<div class="expertise_content_wrap">
					<div class="hover_color" style="background: <?php echo the_field('campaign_theme_color'); ?>"></div>
					<div class="expertise_content">
						<p class="post_category"><?php if($categories){ echo $categoriesPrint;} ?></p>
						<?php if($sectionabovecampaign): ?>
						<h3 class="post_title"><?php echo $campaignTitle; ?></h3>
						<h4 class="post_text"><?php if($campaignSubTitleExtra): echo $campaignSubTitleExtra; else: echo $campaignSubTitle; endif; ?></h4>
						<?php endif; ?>
						<?php if(!$sectionabovecampaign): ?>
						<h3 class="post_title"><?php echo $campaignTitle; ?></h3>
						<?php if($campaignSubTitle): ?>
						<h4 class="post_text"><?php echo $campaignSubTitle; ?></h4>
						<?php else: ?>
						<h4 class="post_text"><?php echo $campaignSubTitleTwo; ?></h4>
						<?php endif; ?>
						<?php endif; ?>
    					<div id="cta_arrow">
    						<span class="arrow_right primera white"></span>
    						<span class="arrow_right segunda white"></span>
    					</div>
					</div>
				</div>
			</div>
			<div class="shimmer tumb_loading"></div>
		</a>
		<?php endwhile; ?>
	</div>
</div>
<?php endif; ?>

<!-- Explore Cross Markets -->
<?php include(plugin_dir_path( __FILE__ )."../template-parts/explore-cross-markets.php"); ?>


<script>
	const postsRows = Math.ceil(document.querySelectorAll('.expertise_new').length / 3);
	
	const extraBlockNumber = (postsRows * 3) - document.querySelectorAll('.expertise_new').length + 3;
/*
	console.log(postsRows);
	console.log(extraBlockNumber);
*/
		const textToAdd = document.querySelector('.expertise_grid_new');
		for (let step = 0; step < extraBlockNumber; step++) {
		  var elem = document.createElement('div');
		  elem.classList.add('expertise_new');
		  elem.classList.add('no_padding');
		  elem.classList.add('col-md-12');
		  elem.classList.add('col-lg-4');
		  elem.style.background = 'rgba(214, 214, 214, ' + Math.random() + ')';
		  textToAdd.appendChild(elem);
		}
		console.log(Math.random());
	
	
	const expertisePost = document.querySelectorAll('.expertise_new');
	console.log(expertisePost.length)
	function dynamicHeight(){
		expertisePost.forEach(post => {
			post.style.height = post.offsetWidth + 'px';
		});
		
	}
	
	window.addEventListener('load', dynamicHeight);
	window.addEventListener('resize', dynamicHeight);
</script>
<?php get_footer(); ?>
