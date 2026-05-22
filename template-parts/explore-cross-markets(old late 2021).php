<?php 
// 	$post   = get_post( 209 );
	$project_cat = get_field('project_sidebar_market');
	if($project_cat === 'Housing'):
	$post_id = 209;
	elseif($project_cat === 'Office'):
	$post_id = 466;
	elseif($project_cat === 'Senior Communities'):
	$post_id = 499;
	elseif($project_cat === 'Healthcare'):
	$post_id = 505;
	elseif($project_cat === 'Higher Education'):
	$post_id = 515;
	elseif($project_cat === 'Hospitality'):
	$post_id = 524;
	elseif($project_cat === 'Retail'):
	$post_id = 530;
	elseif($project_cat === 'Community'):
	$post_id = 538;
	else:
	$post_id = $post->ID;
	endif;	
	
	
	$expert_page = array();?>
	<p style="display: none;"><?php var_dump($expert_page); ?></p><?php
	$post   = get_post( $post_id );
	if( have_rows('expertise_explore') ): while( have_rows('expertise_explore') ): the_row();
			$post_objects = get_sub_field('select_expertise_page');
			array_push($expert_page, $post_objects->ID);
	endwhile; endif; 
	$posts_per_page = 4 - count($expert_page);
?> <p style="display: none;"><?php echo $posts_per_page; ?></p>







<div class="container explore_cross_markets">
	<div class="explore_cross_markets_title_wrap">
		<h3>EXPLORE MORE</h3>
	</div>
	<div class="row">
		
		<!-- Cross Markets -->

		<?php 
			$ex_arr_posts = new WP_Query( array(
		    'post_type' => 'page',
		    'post_status' => 'publish',
		    'post__in' => array(209, 466, 499, 505, 515, 524, 530, 538),
		    'orderby' => 'rand',
		    'post__not_in' => array(get_the_ID()),
    		'posts_per_page' => $posts_per_page,
		) ); 
		if ( $ex_arr_posts->have_posts()) : ?>
		<?php while ( $ex_arr_posts->have_posts() ) : $ex_arr_posts->the_post(); ?>
		<div class="col-lg-3 col-md-6 col-sm-12 explore_market" data-check="<?php echo $count; ?>">
			<a href="<?php the_permalink(); ?>">
				<div class="explore_cross_markets_image" style="background-image: url(<?php echo get_field('top_page_slidershow_slide_one_image'); ?>)"></div>
				<div class="row">
					<div class="col-9">
						<h3><?php the_title(); ?></h3>
						<h4><?php echo the_field('top_project_content_sector_subtitle');  ?></h4>
					</div>
					<div class="col-3 arrow_wrap">
        				<div id="cta_arrow">
        					<span class="arrow_right primera black"></span>
        					<span class="arrow_right segunda black"></span>
        				</div>
					</div>
				</div>
			</a>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
		<!-- Expertise -->
		<?php if(strstr($_SERVER['REQUEST_URI'], '/projects/') == true ): 
			wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
			$expert_posts  = new WP_Query( array(
				'post_type' => 'microsites',
			    'post_status' => 'publish',
			    'post__in' => array($expert_page[0], $expert_page[1], $expert_page[2], $expert_page[3]),
			    'posts_per_page' => 4, ) );
		if ( $expert_posts->have_posts()) : while ( $expert_posts->have_posts() ) : $expert_posts->the_post(); ?>
			<div class="col-lg-3 col-md-6 col-sm-12 explore_market">
			<?php if(get_field('show_section_above_campaign')): 
				$micorImage = get_field('top_background_image')['sizes']['large'];
				$micorSubTitle = get_field('top_section_title'); 
				if(get_field('top_section_title')){
					$micorSubTitle = get_field('top_section_title'); 
				}else{
					$micorSubTitle = get_field('top_section_sub_title'); 
				}
				$micorThemeColor = get_field('campaign_theme_color');?>
			<?php else: 
				$micorImage = get_field('campaigns_0_campaign_background_image')['sizes']['large']; 
				$micorSubTitle = get_field('campaigns_0_campaign_image_title');
				$micorThemeColor = get_field('campaign_theme_color');?>
			<?php endif; 
				
			?>
			<a href="<?php the_permalink(); ?>">
				<div class="explore_cross_markets_image expolore_cross_microsites" style="background-image: url(<?php echo $micorImage; ?>); border-color: <?php echo $micorThemeColor; ?>;"></div>
				<div class="row">
					<div class="col-9">
						<h3><?php the_title(); ?></h3>
						<h4><?php echo $micorSubTitle;  ?></h4>
					</div>
					<div class="col-3 arrow_wrap">
        				<div id="cta_arrow">
        					<span class="arrow_right primera black"></span>
        					<span class="arrow_right segunda black"></span>
        				</div>
					</div>
				</div>
			</a>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>

		<?php else: ?>
		<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		<?php if( have_rows('expertise_explore') ): while( have_rows('expertise_explore') ): the_row(); ?>
	    <?php $post_object = get_sub_field('select_expertise_page');
				if( $post_object ): 
	        	$post = $post_object;
	        	setup_postdata( $post ); ?>		
		<div class="col-lg-3 col-md-6 col-sm-12 explore_market">
			<?php if(get_field('show_section_above_campaign')): 
				$micorImage = get_field('top_background_image')['sizes']['large'];
				$micorTitle = get_field('top_section_title'); 
				$micorSubTitle = get_field('top_section_sub_title'); 
				$micorSecondaryTitle = get_field('top_secondary_title'); 
				$micorThemeColor = get_field('campaign_theme_color'); ?>
			<?php else: 
				$micorImage = get_field('campaigns_0_campaign_background_image')['sizes']['large']; 
				$micorTitle = get_field('campaigns_0_campaign_image_title');
				$micorSubTitle = get_field('campaigns_0_campaign_subtitle'); 
				$micorThemeColor = get_field('campaign_theme_color'); ?>
			<?php endif; ?>
			<a href="<?php the_permalink(); ?>">
				<div class="explore_cross_markets_image expolore_cross_microsites" style="background-image: url(<?php echo $micorImage; ?>); border-color: <?php echo $micorThemeColor; ?>;"></div>
				<div class="row">
					<div class="col-9">
						<h3><?php echo $micorTitle;  ?></h3>
						<?php if(get_field('show_section_above_campaign')): ?>
							<?php if($micorSubTitle): ?>
							<h4><?php echo $micorSubTitle; ?></h4>
							<?php else: ?>
							<h4><?php echo $micorSecondTitle; ?></h4>
							<?php endif; ?>
						<?php else: ?>
						<h4><?php echo $micorSubTitle; ?></h4>
						<?php endif; ?>
					</div>
					<div class="col-3 arrow_wrap">
        				<div id="cta_arrow">
        					<span class="arrow_right primera black"></span>
        					<span class="arrow_right segunda black"></span>
        				</div>
					</div>
				</div>
			</a>
		</div>
		<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		<?php endif; ?>
		<?php endwhile; ?>
		<?php endif; ?>
		<?php endif; ?>
	</div>
</div>
