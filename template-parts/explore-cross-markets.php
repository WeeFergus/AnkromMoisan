<div class="container explore_cross_markets">
	<div class="explore_cross_markets_title_wrap">
		<h3>EXPLORE MORE</h3>
	</div>
	<!-- Expertise -->
	<div class="row">
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

<script>
	const exploreMoreBlocks = document.querySelector('.explore_cross_markets .row');
	const exploreMoreTitle = document.querySelector('.explore_cross_markets .explore_cross_markets_title_wrap');
	if(exploreMoreBlocks.childNodes.length <= 1){
		exploreMoreTitle.style.display = "none";
	}
</script>
<!--
184.106.55.131
shawn@falconbridge.net
-->