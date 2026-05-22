<div class="container explore_cross_markets">
	
	<div class="explore_cross_markets_title_wrap">
		<h3>EXPLORE CROSS MARKETS</h3>
	</div>
	<div class="row">
		<?php 
/*
			wp_reset_postdata();
			wp_reset_postdata();
			$ex_args  = array(
		    'post_type' => 'page',
		    'post_status' => 'publish',
		    'post__in' => array(209, 466, 499, 505, 515, 524, 530, 538),
		    'orderby' => 'rand',
    		'posts_per_page' => 10,
		); 
*/
		
		$ex_arr_posts = new WP_Query( array(
		    'post_type' => 'page',
		    'post_status' => 'publish',
		    'post__in' => array(209, 466, 499, 505, 515, 524, 530, 538),
		    'orderby' => 'rand',
    		'posts_per_page' => 3,
		) ); 
		if ( $ex_arr_posts->have_posts()) : ?>
		<?php while ( $ex_arr_posts->have_posts() ) : $ex_arr_posts->the_post(); ?>
		<div class="col-3 explore_market">
			<a href="<?php the_permalink(); ?>">
				<div class="explore_cross_markets_image" style="background-image: url(<?php echo get_field('sector_hero_section_sector_hero_main'); ?>)"></div>
				<div class="row">
					<div class="col-9">
						<h3><?php the_title(); ?></h3>
						<h4><?php echo the_field('sector_top_section_sector_subtitle');  ?></h4>
					</div>
					<div class="col-md-3 arrow_wrap">
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
		<div class="col-3 explore_disciplines">
			<h5>Our Disciplines:</h5>
<!-- 			<div class="explore_cross_markets_image" style="background-image: url(<?php echo get_field('sector_hero_section_sector_hero_main'); ?>)"></div> -->
			<ul>
				<?php if(strstr($_SERVER['REQUEST_URI'], 'architecture') != true):
					$query = new WP_Query( array( 'page_id' => 234 ) ); while ( $query->have_posts() ) : $query->the_post(); ?>
				<li><a class="underline_link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; endif; ?>
				<?php if(strstr($_SERVER['REQUEST_URI'], 'interiors') == false): 
					$query = new WP_Query( array( 'page_id' => 418 ) ); while ( $query->have_posts() ) : $query->the_post(); ?>
				<li><a class="underline_link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; endif; ?>
				<?php if(strstr($_SERVER['REQUEST_URI'], 'planning') == false): 
					$query = new WP_Query( array( 'page_id' => 458 ) ); while ( $query->have_posts() ) : $query->the_post(); ?>
				<li><a class="underline_link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; endif; ?>
				<?php if(strstr($_SERVER['REQUEST_URI'], 'brand') == false): 
					$query = new WP_Query( array( 'page_id' => 461 ) ); while ( $query->have_posts() ) : $query->the_post(); ?>
				<li><a class="underline_link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; endif; ?>
			</ul>
		</div>
	</div>
</div>
