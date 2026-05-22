<?php /**
 * Footer template
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage ankrommoisan
 * @since 1.0
 * @version 1.0
 */
$baseUrl = get_option('siteurl');  ?>
		</div><!-- #content -->

</div><!-- #page -->
<footer id="colophon" class="site-footer toggle_wrapper" role="contentinfo">
	<div class="container">
		<div class="row"  id="footer-block">

			<div id="footer-column-1" class="d-none-old d-lg-block col-lg-2">
				<?php wp_nav_menu([
      'menu' => 'Footer 1',
      'menu_class' => 'underline_link_wrap',
    ]); ?>
					<hr class="d-md-block d-lg-none short_line">
			</div>
			<div id="footer-column-2" class="d-none-old d-lg-block col-lg-2">
				<div class="footer-title-header d-none-old d-lg-block">OUR OFFICES</div>


                  <!--  Query new Location CPT and output ul with post links  -->
                  <?php $args = [
                    'post_type' => 'location',
                    'posts_per_page' => -1,
                  ];
                  $location_query = new WP_Query($args);
                    if ($location_query->have_posts()) {
                      echo '<ul>';
                      while ($location_query->have_posts()) {
                        $location_query->the_post(); ?>
                        <li><a href="<?php the_permalink();?>" class="underline_link" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
                    <?php }
                    echo '</ul>';
                    wp_reset_postdata();
                  } ?>
            </div>
			<div id="footer-column-3" class="d-none-old d-lg-block col-lg-2">
				<?php wp_nav_menu([
      'menu' => 'Footer Discipline',
      'menu_class' => 'underline_link_wrap',
    ]); ?>
			</div>
			<div id="footer-column-4" class="d-none-old d-lg-block col-lg-5 footer_market_sector">
				<div class="row">
					<div class="col-md-12 col-lg-6">
						<?php wp_nav_menu([
        'menu' => 'Footer Market Sector 1',
        'menu_class' => 'underline_link_wrap',
      ]); ?>
					</div>
					<div class="col-md-12 col-lg-6">
						<?php wp_nav_menu([
        'menu' => 'Footer Market Sector 2',
        'menu_class' => 'underline_link_wrap',
      ]); ?>
					</div>
				</div>
			</div>

			<div class="col-md-12 col-lg-1 social-media-icons align_right">
				<div><a href="https://www.facebook.com/ankrommoisan" target="_blank">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/SVG/facebook-01.svg" alt="Facebook"/>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/SVG/facebook-01.svg" alt="Facebook"/>
				</a></div>
				<div><a href="https://www.instagram.com/ankrommoisan" target="_blank">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/SVG/instagram-01.svg" alt="instagram"/>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/SVG/instagram-01.svg" alt="instagram"/>
				</a></div>
				<div><a href="https://www.linkedin.com/company/ankrom-moisan-architects" target="_blank">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/SVG/linkedin-01.svg" alt="LinkedIn"/>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/SVG/linkedin-01.svg" alt="LinkedIn"/>
				</a></div>
			</div>
		</div>
	</div>

	<div id="footer_map_wrap">

		<div class="city_map_wrap" data-city="1">

			<div class="row mapbox">
				<div class="col-md-5 mapbox-copy-wrapper">
					<h3>Portland Office</h3>
					<p>Integrated with the Old Town neighborhood along the Willamette River, our Portland headquarters exude warmth, approachability, and quiet sophistication. We designed our mass timber headquarters to embody our firm’s cultural values in wood, brick, and glass, and it’s a joy to be able to work here.</p>
					<p>38 NW Davis Street, Suite 300, Portland, OR 97209
						<a class="underline_link" href="tel:5032457100">(503) 245-7100</a></p>

					<div class="office_contact">
						<h3>Dave Heater</h3>
						<p>President
							<a class="underline_link" href="#contact" onClick="document.querySelector('.nav_button.contact').click();jQuery('#input_1_10').val('daveh@ankrommoisan.com');return false;">daveh@ankrommoisan.com</a></p>
						<h3>Alissa Brandt</h3>
						<p>Vice President of Interiors
							<a class="underline_link" href="#contact" onClick="document.querySelector('.nav_button.contact').click();jQuery('#input_1_10').val('alissab@ankrommoisan.com');return false;">alissab@ankrommoisan.com</a></p>

						<h3>Leah Wheary Brown</h3>
						<p>Vice President of Interior Design Strategy
							<a class="underline_link" href="#contact" onClick="document.querySelector('.nav_button.contact').click();jQuery('#input_1_10').val('leahw@ankrommoisan.com');return false;">leahw@ankrommoisan.com</a></p>

						<h3>Murray Jenkins</h3>
						<p>Executive Vice President
							<a class="underline_link"  href="#contact" onClick="document.querySelector('.nav_button.contact').click();jQuery('#input_1_10').val('murrayj@ankrommoisan.com');return false;">murrayj@ankrommoisan.com</a></p>
					</div>
				</div>
				<div id='map' class="col-md-7"></div>
			</div>

		</div>
		<div class="city_map_wrap" data-city="2">

			<div class="row mapbox">
				<div class="col-md-5 mapbox-copy-wrapper">
					<h3>Seattle Office</h3>
					<p>In the heart of a busy, cosmopolitan downtown, our Seattle office is designed to welcome—clients, visitors, consultants, the wider design community, each other. Raw, exposed structural elements balance reclaimed wood floors, custom metal panels, and an abundance of glass to express the diversity, honesty, and inclusivity that keeps our work human-centered.</p>
					<p>1505 5th Avenue, Suite 300, Seattle, WA 98101
						<a class="underline_link" href="tel:2065761600">(206) 576-1600</a></p>
					<div class="office_contact">
						<h3>Dave Heater</h3>
						<p>President
							<a class="underline_link" href="#contact" onClick="document.querySelector('.nav_button.contact').click();jQuery('#input_1_10').val('daveh@ankrommoisan.com');return false;">daveh@ankrommoisan.com</a></p>

						<h3>Rachael Lewis</h3>
						<p>Managing Principal
							<a class="underline_link" href="#contact" onClick="document.querySelector('.nav_button.contact').click();jQuery('#input_1_10').val('rachaell@ankrommoisan.com');return false;">rachaell@ankrommoisan.com</a></p>

						<h3>David Kelley</h3>
						<p>Executive Vice President
							<a class="underline_link" href="#contact" onClick="document.querySelector('.nav_button.contact').click();jQuery('#input_1_10').val('davidk@ankrommoisan.com');return false;">davidk@ankrommoisan.com</a></p>
					</div>
				</div>
				<div id='map2' class="col-md-7"></div>
			</div>

		</div>
		<div class="city_map_wrap" data-city="3">

			<div class="row mapbox">
				<div class="col-md-5 mapbox-copy-wrapper">
					<h3>San Francisco Office</h3>

					<p>115 Sansome Street, Suite 1005, San Francisco, CA 94104
						<a class="underline_link" href="tel:4152527063">(415) 252-7063</a></p>
					<div class="office_contact">
						<h3>Dave Heater</h3>
						<p>President
							<a class="underline_link" href="#contact" onClick="document.querySelector('.nav_button.contact').click();jQuery('#input_1_10').val('daveh@ankrommoisan.com');return false;">daveh@ankrommoisan.com</a></p>

						<h3>Leah Wheary Brown</h3>
						<p>Vice President of Interior Design Strategy
							<a class="underline_link" href="#contact" onClick="document.querySelector('.nav_button.contact').click();jQuery('#input_1_10').val('leahw@ankrommoisan.com');return false;">leahw@ankrommoisan.com</a></p>

						<h3>Travis Thockmorton</h3>
						<p>Managing Principal
							<a class="underline_link" href="#contact" onClick="document.querySelector('.nav_button.contact').click();jQuery('#input_1_10').val('ltravist@ankrommoisan.com');return false;">travist@ankrommoisan.com</a></p>
					</div>
				</div>
				<div id='map3' class="col-md-7"></div>
			</div>

		</div>

	</div>

	<div class="container">
		<div class="row"  id="footer-copywrite">
			<div class="copywrite-copy col-md-10 d-none-old d-lg-block">
				<p>&#9400; <?php echo currentYear(); ?> Ankrom Moisan Architects, Inc. All Rights Reserved. Our website uses cookies to improve your browsing experience. <a class="underline_link" href="/privacy-policy/">&nbsp;Privacy Policy & Terms of Use</a>.</p>
			</div>

			<div class="d-none d-md-block col-md-2 align_right ankrom_logo">
				<img width="100%" src="<?php echo get_template_directory_uri(); ?>/assets/images/smallLogo.png"/>
			</div>
		</div>
		<div id="contact-bubble-div">
		    <a id="hidebubble" href="#" onClick="jQuery('#contact-bubble-div').fadeOut('fast');return false;" title="Close"><img id="hide-bubble-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/close_contact_bubble-transparent2.png" ></a>
			<a id="contact-bubble-link" href="#" onClick="document.querySelector('.nav_button.contact').click();return false;"><img id="contact-bubble-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/contact_bubble-transparent.png" title="Contact Us"></a>
		</div>
		<style>
			#contact-bubble-div{
				position:fixed;
				right:1px;
				bottom:1px;
				overflow:auto;
				transition:1s;
				animation: fadeIn 1s;
				z-index:10000;
			}
			#contact-bubble-link{
				overflow:auto;
				width:60px;
				height:60px;
			}
			#contact-bubble-img{
				width:60px;
				height:60px;
				opacity:0.8;
				border-radius:12px;
				transition:1s;
			}
			#contact-bubble-img:hover{
				filter: brightness(1.2);
			}
			#hidebubble{
				position:absolute;
				top:2px;
				right:2px;
				line-height:10px;
				transition:1s;
				animation: fadeIn 4s;
				z-index: 11000;
			}
			#hide-bubble-img{
				width:16px;
				height:16px;
				background:transparent;
				border-radius: 50%;
			}
			#hide-bubble-img:hover{
				filter: brightness(1.2);
			}
			.grecaptcha-badge {
				 display: none !important;
			}
			@keyframes fadeIn {
				0% { opacity: 0; }
				100% { opacity: 1; }
			}

			ul#menu-footer-1 {
					padding-inline-start: 0px;
			}
			#footer-column-2{
					padding-inline-start: 40px;
			}

			@media screen and (max-width: 992px) {
				div#footer-copywrite {
					padding: 20px 60px 20px 20px;
				}
			}
			@media(max-width:991px){
				#footer-column-2{
					padding-inline-start: 20px;
				}
				ul#menu-footer-market-sector-1 {
					padding-left: 0px;
				}
				ul#menu-footer-market-sector-2 {
					padding-left: 0px;
				}
				ul#menu-footer-discipline {
					padding-left: 0px;
				}
			}
			/* below shows the maps on mobile */
			@media (max-width: 767px) {
				.col-md-5 {
					-ms-flex: 0 0 41.666667%;
					flex: 0 0 41.666667%;
					max-width: 41.666667%;
				}
				.col-md-7 {
					-ms-flex: 0 0 58.333333%;
					flex: 0 0 58.333333%;
					max-width: 58.333333%;
				}
			}
			@media (max-width: 599px) {
				.col-md-5 {
					flex: 0 0 100%;
					max-width: 100%;
				}
				.col-md-7 {
					flex: 0 0 100%;
					max-width: 100%;
					height: 400px;
				}
			}
		</style>
	</div>


</footer><!-- #colophon -->
</div><!-- .site-content-contain -->

<?php wp_footer(); ?>

</body>
</html>
