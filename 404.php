<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Ankrom_Moisan
 */

get_header();
?>
<div class="container page_404">
	<div class="row">
		<div class="col-12"> 		
			<section class="error-404 not-found">
		
				<div class="page-content">
					<h1 class="header_404">Page Not Found</h1>
					<p>It looks like nothing was found at this location.</p>
					<div class="btns_block">
							<a class="button" href="<?php echo get_home_url(); ?>">Home Page</a>
							<a class="button search open_nav" href="#">Search Website</a>
					</div>
					<script>
						const searchBtn = document.querySelector('a.button.search.open_nav');
						const searchNav = document.querySelector('.menu_buttons_wrap .nav_button.search');
						
						function openSearch(e) {
							e.preventDefault();
							if(!searchNav.classList.contains('open')){
								searchNav.click();
							}
							
						}
						
						searchBtn.addEventListener('click', openSearch);
						
					</script>
		
<!--
						<?php
						get_search_form();
		
						the_widget( 'WP_Widget_Recent_Posts' );
						?>
		
						<div class="widget widget_categories">
							<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'ankrom-moisan' ); ?></h2>
							<ul>
								<?php
								wp_list_categories(
									array(
										'orderby'    => 'count',
										'order'      => 'DESC',
										'show_count' => 1,
										'title_li'   => '',
										'number'     => 10,
									)
								);
								?>
							</ul>
						</div>
		
						<?php
						$ankrom_moisan_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'ankrom-moisan' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$ankrom_moisan_archive_content" );
		
						the_widget( 'WP_Widget_Tag_Cloud' );
						?>
-->
		
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div>
	</div>
</div>

<?php
get_footer();
