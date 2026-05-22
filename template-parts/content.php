<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ankrom_Moisan
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div id="hero">
	<?php ankrom_moisan_post_thumbnail(); 

   the_title( '<h1 class="entry-title">', '</h1>' ); ?>
</div>
	<div class="entry-content">
		<?php

		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ankrom-moisan' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		//$content = apply_filters( 'the_content', get_the_content() );
		//echo $content;
		//echo get_the_content();


		$post_date = get_the_date( 'F j, Y' ); 
		//echo '<div id="datediv">' . $post_date . '</div>';
		echo '<div id="blogcontent"><div id="datediv">' . $post_date . '</div><div id="subtitle">' . get_field("subtitle") . '</div>' . get_field("content") . '</div>';


		?>
		<div id="rightside">
			<div id="filterpanel" class="underline_link_wrap">
				FILTER 
			 <div class="divider"></div>
			 <?php

					$the_query = new WP_Query( 'posts_per_page=140' ); 
					//get the posts count
					$querycount = $the_query->post_count ;
			 ?>
			<div class="filtersection all"><a href="/explore-beyond?filterslug=all&filtername=ALL" class="blogcategory">ALL &nbsp; (<?php echo $querycount;?>)</a></div>
				<?php

					// get the categories for this post so they can be bolded
					// https://developer.wordpress.org/reference/functions/wp_get_post_categories/
					$blog_categories = get_the_terms( get_the_ID(), 'blog_category' );
					$cats = array();
					$catsstr = '';
					$i = 0;
					foreach($blog_categories as $cat){
							$cats[] = $cat->slug;
							if ($i == 0) {
								$catsstr.='&nbsp;|&nbsp;<a href="/explore-beyond?filterslug='.$cat->slug.'&filtername='.$cat->name.'">'.strtoupper($cat->name).'</a>';
							} else {
								$catsstr.='&nbsp;+&nbsp;<a href="/explore-beyond?filterslug='.$cat->slug.'&filtername='.$cat->name.'">'.strtoupper($cat->name).'</a>';
							}
							$i++;
					}
					echo "<!--catsstr: ".$catsstr."-->";
					$blog_categories = get_terms([
					'taxonomy' => 'blog_category',
					'hide_empty' => false,
					'orderby' => 'name',
					]);
					foreach ($blog_categories as $term){   
						$class= '';
						if (in_array($term->slug,$cats)){
							$class = 'bold';
						}
					  echo '<div class="filtersection"><a href="/explore-beyond?filterslug='.$term->slug.'&filtername='.$term->name.'" class="blogcategory"><span class="'.$class.'">' .$term->name . '</span>&nbsp;<span class="normal">('. $term->count. ')</span></a></div>';
					}

				?>
				<script>
					<?php if ($catsstr!='') { ?>
						jQuery(function() {
							jQuery(".breadcrumbs-sector").html('<?php echo $catsstr;?>');
						});
					<?php }	?>
				</script>
				<style>
						.bold{
							font-weight:700;
						}
						.normal{
							font-weight:500 !important;
							display:inline-block;
						}
				</style>

			</div>


<?php ////////////////////// SEARCH //////////////////// ?>

			<div id="searchpanel">
			<div class="divider"></div>
					<div class="paneltitle">SEARCH</div>
			<!-- <p><input id="searchbox" placeholder="" type="text"><button id="searchbutton" style="display:none;"><span class="dashicons dashicons-search"></span></button></p> -->
			<p><?php echo do_shortcode('[wd_asp elements="search,results" ratio="100%,100%" id=2]'); ?></p>
			<div class="divider"></div>




			<div id="trendingpanel">
				TRENDING
				<div class="divider"></div>
		
					  
					<?php
					// Define our WP Query Parameters
					$the_query = new WP_Query( 'posts_per_page=5' ); ?>
					  
					<?php
					// Start our WP Query
					while ($the_query -> have_posts()) : $the_query -> the_post();
					// Display the Post Title with Hyperlink
					?>
					  
					<a href="<?php the_permalink() ?>" class="articletitle arrow_wrap"><?php the_title(); ?>

        					<div id="cta_arrow">
        						<span class="arrow_right primera black"></span>
        						<span class="arrow_right segunda black"></span>
        					</div>
						</a>
					<div class="articledate"><?php echo get_the_date( 'F j, Y' ) ?></div>
					
					<div class="divider"></div>  					  
					<?php
					// Repeat the process and reset once it hits the limit
					endwhile;
					wp_reset_postdata();
					?>


			</div>			
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php ankrom_moisan_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->


<?php

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'ankrom-moisan' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'ankrom-moisan' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

?>
