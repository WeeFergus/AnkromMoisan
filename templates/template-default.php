<?php
/**
 * Template Name: Default Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<div class="container default_content_wrap">
	<div class="row">
		<div class="col-12">
			<div class="page_title_wrap">
				<h1 class="header"><?php echo $post->post_title; ?></h1>
				<h5 class="date">Last modified: <?php the_field('last_update'); ?></h5>
			</div>
			<div class="contente_wrapper">
				<?php the_field('content'); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
