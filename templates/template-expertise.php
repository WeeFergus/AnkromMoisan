<?php
/**
 * Template Name: Expertise Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();?>

<?php if( have_rows('top_page_section') ): while( have_rows('top_page_section') ): the_row(); ?>
<div class="hero_sector_wrapper expertise_banner_wrap">
	<div class="hero_sector_image_wrap">
		<?php if( have_rows('top_image') ): while( have_rows('top_image') ): the_row();  $topHeroImage = get_sub_field('image'); $topHeroImageUrl = $topHeroImage['sizes']['2048x2048']; ?>
		<div class="hero_image" style="background-image: url(<?php echo $topHeroImageUrl; ?>);"></div>
		<?php endwhile; endif; // if( get_field('top_image') ): ?>
		<div class="shimmer tumb_loading"></div>
		<div class="container hero_title">
			<div class="row">
				<div class="col-12">
					<h1 class="header"><?php echo the_sub_field('page_title'); ?></h1>
				</div>
			</div>
		</div>
		<?php if( have_rows('top_image') ): while( have_rows('top_image') ): the_row();  $topHeroImagePhotographer = get_sub_field('photographer_credit'); ?>
			<?php if($topHeroImagePhotographer): ?>
			<div class="photo_credit">
				<p>Ⓒ <?php echo $topHeroImagePhotographer; ?></p>
			</div>
			<?php endif; ?>
		<?php endwhile; endif; // if( get_field('top_image') ): ?>
	</div>
</div>

<div class="container expertise_toptext_wrap">
	<div class="row title_content_row">
		<div class="col-12">
			<?php if( have_rows('top_content') ): while( have_rows('top_content') ): the_row();?>
			<h1><?php echo the_sub_field('title'); ?></h1>
			<?php echo the_sub_field('content'); ?>
			<?php endwhile; endif; // if( get_field('top_content') ): ?>
		</div>
	</div>
	<?php if( get_field('top_page_section_column_section_columns') ): ?>
	<div class="row column_content_row">
		<?php if( have_rows('column_section') ): while( have_rows('column_section') ): the_row();?>
		<div class="col-12">
			<p><?php echo the_sub_field('text_before_columns'); ?></p>
		</div>
		<?php if( have_rows('columns') ): while( have_rows('columns') ): the_row();?>
		<div class="col-lg-4 col-md-12 column">
			<h4><?php echo the_sub_field('title'); ?></h4>
			<?php echo the_sub_field('content'); ?>
		</div>
		<?php endwhile; endif; // if( get_field('columns') ): ?>
		<?php endwhile; endif; // if( get_field('column_section') ): ?>
		<div class="col-12 grid_text">
			<h2><?php echo the_sub_field('text_before_posts_grid'); ?></h2>
		</div>
	</div>
	<?php endif; ?>
</div>
<?php endwhile; endif; // if( get_field('top_page_section') ): ?>


<!-- Grid Project -->
<?php $args = array(
    'post_type' => 'microsites',
    'post_status' => 'publish',
    'posts_per_page' => 2000,
); 
$arr_posts = new WP_Query( $args ); 
if ( $arr_posts->have_posts() ) :  ?>
<div class="container grid_project_wrap expertise_grid individual_project">
	<div class="row project_wrap">
		<?php while ( $arr_posts->have_posts() ) : $arr_posts->the_post(); ?>
		<div class="col-lg-6 col-md-12 hover_arrow_story individual_project">
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
			<div class="story_image">
				<a href="<?php the_permalink(); ?>">
					<div class="project-center-cropped" style="background-image: url(<?php echo $campaignImageUrl; ?>); border-color: <?php echo the_field('campaign_theme_color'); ?>"></div>
					<div class="shimmer tumb_loading"></div>
				</a>
			</div>
			<div class="project_content_wrap">
				<div class="row d-lg-flex">
					<div class="col-md-10 col-sm-12">
						<div class="d-lg-block">
							<?php if($sectionabovecampaign): ?>
							<h3 class="shimmer"><a href="<?php the_permalink(); ?>"><?php echo $campaignTitle; ?></a></h3>
							<h4><a href="<?php the_permalink(); ?>"><?php if($campaignSubTitleExtra): echo $campaignSubTitleExtra; else: echo $campaignSubTitle; endif; ?></a></h4>
								<?php if($campaignText): ?>
								<p class="expertise_prev_text"><?php echo substr($campaignText, 0, 100) . "..."; ?></p>
								<?php else: ?>
								<p class="expertise_prev_text"><?php echo substr($campaignTextTwo, 0, 100) . "..."; ?></p>
								<?php endif; ?>
							<?php endif; ?>
							<?php if(!$sectionabovecampaign): ?>
							<h3 class="shimmer"><a href="<?php the_permalink(); ?>"><?php echo $campaignTitle; ?></a></h3>
							<?php if($campaignSubTitle): ?>
							<h4><a href="<?php the_permalink(); ?>"><?php echo $campaignSubTitle; ?></a></h4>
							<?php else: ?>
							<h4><a href="<?php the_permalink(); ?>"><?php echo $campaignSubTitleTwo; ?></a></h4>
							<?php endif; ?>
							<p class="expertise_prev_text"><?php echo substr($campaignText, 0, 100) . "..."; ?></p>
							<?php endif; ?>
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
			</div>
			
		</div>
		<?php endwhile; ?>
	</div>
</div>
<?php endif; ?>

<!-- Explore Cross Markets -->
<?php include(plugin_dir_path( __FILE__ )."../template-parts/explore-cross-markets.php"); ?>



<?php get_footer(); ?>
