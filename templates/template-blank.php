<?php
/**
 * Template Name: Blank Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<?php
	$thisid = get_the_ID();
?>
<div class="container culture-container">
	<div class="row">
		<div class="col-12">
			<div class="content_wrapper">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
