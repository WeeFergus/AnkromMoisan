<?php
	
/* Template Name: Projects Template 
   Template Post Type: portfolio_project
*/ 
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Ankrom_Moisan
 */


while ( have_rows('fetch_data') ) { the_row();
   $project_id = get_sub_field('project_id');
	 $hide_open_asset_albums = get_field('hide_open_asset_albums');
}

// GET THE PROJECT VIA PHP

include "functions_openassets.php";


if ($project_id!='') {
$OA_albums = getOpenAssetsAlbums($project_id);
}

get_header(); 

?>

<?php

include "projects_overview_slider_openasset.php";

?>

<div class="project_slider">
<div class="container project_top_content">
	<div class="row">

		<div class="col-md-12 col-lg-7 toggle_wrapper">

			<?php if( have_rows('top_project_content') ){ ?>
			<?php while( have_rows('top_project_content') ){ the_row(); 
				$topprojecttitle = get_sub_field('project_subtitle');
				$topprojectcontent = get_sub_field('project_content'); ?>

				<h1 class="posttitle"><?php echo $post->post_title; ?></h1>
				<h2><?php echo $topprojecttitle; ?></h2>

				<div class="project_top_content toggle_item_wrap open">

				<?php /////////////////// OVERVIEW STORY /////////////////// ?>
				<div class="toggled_text three_lines">
					<p><?php echo $topprojectcontent; ?></p>
				</div>
				<span class="three_dot">...</span>
				<!-- <div class="toggle_text three_lines">
					<span class="expando_icon"></span>
                </div> -->
	

				<?php } ?>
			</div>
			<?php $project_title = $post->post_title; ?>
			<?php } // end of the loop. ?>


		</div>
		<div class="col-lg-1 col-md-12"></div>
		<div class="col-lg-4 col-md-12 toggle_wrapper project_sidebar">
			<?php if( have_rows('project_sidebar') ){ ?>
			<?php while( have_rows('project_sidebar') ){ the_row(); 
				$projectcity= get_sub_field('city');
				$projectstate = get_sub_field('state');
				$projectcompleted = get_sub_field('completed');
				$projectstatus = get_sub_field('project_status');
				$projectunits = get_sub_field('units');
				$projectstories = get_sub_field('stories');
				$projectsqft = get_sub_field('sq_ft');				
				$projectacreage = get_sub_field('acreage');
				$projectmarket = get_sub_field('market');
			?>
			<h5><?php if($projectcity){?><?php echo $projectcity; ?>, <?php }?><?php if($projectstate){?><?php echo $projectstate; ?><?php }?></h5>
					<ul>
				<?php 
							//remove_filter('acf_the_content', 'wpautop');
							$certified = get_sub_field('certified'); // false, false
							//add_filter('acf_the_content', 'wpautop');
							// https://support.advancedcustomfields.com/forums/topic/removing-paragraph-tags-from-wysiwyg-fields/

 					if ($certified!='') { ?>
									<li><?php echo $certified?></li>		
				<?php } ?>
				<?php if($projectunits){?><li><?php echo $projectunits; ?></li><?php }?>
				<?php if($projectstories){?><li><?php echo $projectstories; ?> <?php if($projectstories >= 2){?>stories<?php } else{ ?>story<?php }?></li><?php }?>
				<?php if($projectsqft){?><li><?php echo $projectsqft; ?> sq. ft.</li><?php }?>
				<?php if($projectacreage){?><li><?php echo $projectacreage; ?></li><?php }?>
				<?php if($projectcompleted){?>
					<li>Completed in <?php echo $projectcompleted; ?></li>
				<?php }?>
				<?php if($projectstatus){?>
					<li><?php echo $projectstatus; ?></li>
				<?php }?>

				<?php 
						$awards = get_sub_field('awards');
						if ($awards!='') { ?>
								<h5 class="awards">AWARD WINNER</h5>
				<?php } ?>
			</ul>

			<div class="toggle_item_wrap open">
				<!-- <div class="toggle_text">
					<span class="expando_icon"></span>
                </div> -->
                <div class="toggled_text">
							<?php 
							if ($awards!='') { ?>
									<p><?php echo $awards;?></p>
							<?php } ?>
					
					<?php if( have_rows('project_types') ){ ?>
					<?php while( have_rows('project_types') ){ the_row(); 
						$projecttypeeone = get_sub_field('type_one');
						$projecttypetwo = get_sub_field('type_two');
						$projecttypethree = get_sub_field('type_three');
						$projecttypefour = get_sub_field('type_four');
						$projecttypefive = get_sub_field('type_five');
					?>
					<?php if($projecttypeeone){ ?>
					<h5>PROGRAM</h5>
					<p><?php if($projecttypeeone){?><?php echo $projecttypeeone; ?><?php }?>
					<?php if($projecttypetwo){?>, <?php echo $projecttypetwo; ?><?php }?>
					<?php if($projecttypethree){?>, <?php echo $projecttypethree; ?><?php }?>
					<?php if($projecttypefour){?>, <?php echo $projecttypefour; ?><?php }?>
					<?php if($projecttypefive){?>, <?php echo $projecttypefive; ?><?php }?></p>
					<?php } ?>
					<?php } // end of the loop. ?>
					<?php } // if( get_field('project_types') ){ ?>
					
					<?php if( have_rows('project_contacts') ){ ?>
					<?php while( have_rows('project_contacts') ){ the_row(); 
						$projectarchitecture = get_sub_field('architecture');
						$projectinteriors = get_sub_field('interiors');
						$projectplanning = get_sub_field('planning');
						$projectbrand = get_sub_field('brand');
						$projectprinciple = get_sub_field('principle');
					?>
					<?php if($projectarchitecture || $projectinteriors || $projectplanning || $projectbrand || $projectprinciple){ ?>
					<h5>PROJECT CONTACT</h5>
					<?php if($projectarchitecture){?>
					<p>Architecture: <?php echo $projectarchitecture; ?></p>
					<?php }?>
					<?php if($projectinteriors){?>
					<p>Interiors: <?php echo $projectinteriors; ?></p>
					<?php }?>
					<?php if($projectplanning){?>
					<p>Planning: <?php echo $projectplanning; ?></p>
					<?php }?>
					<?php if($projectbrand){?>
					<p>Brand: <?php echo $projectbrand; ?></p>
					<?php }?>
					<?php if($projectprinciple){?>
					<p><a class="underline_link" href="mailto:<?php echo $projectprinciple; ?>"><?php echo $projectprinciple; ?></a></p>
					<?php }?>
					<?php } ?>
					<?php } // end of the loop. ?>
					<?php } // if( get_field('project_contacts') ){ ?>


				</div>


			</div>
			<?php } // end of the loop. ?>
			<?php } // if( get_field('project_sidebar') ){ ?>

		</div>

	</div>

</div>


</div>





<?php echo "<!-- no-discipline-openasset -->"; ?>

<div class="container project_stories">


<?php ////////////////// PUT DISCIPLINE STORIES FIRST ///////////////////////// ?>


<?php  ///////////////////////////////////// INTERIORS STORY //////////////////////////////////////// ?>
	<?php if(strstr($_SERVER['REQUEST_URI'], 'interiors') == true ){ ?>
	<div class="row project_interior_story">
		<?php if( have_rows('interior_project_content') ): ?>
		<?php while( have_rows('interior_project_content') ): the_row(); 
			$projectstorytitle = get_sub_field('project_subtitle');
			$projectstorycontent = get_sub_field('project_content');
		?>
		<?php if($projectstorytitle):?>
		<div class="col-12 toggle_wrapper">
			<hr>
			<h5><a href="<?php the_permalink(); ?>/?interiors">Interior Story</a></h5>
			<h2><?php echo $projectstorytitle; ?></h2>


			<!-- Swiper -->
			<?php if( have_rows('interior_project_slideshow') ): ?>
				<?php while( have_rows('interior_project_slideshow') ): the_row(); ?>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					
							<?php 
							$albumhtml = getOpenAssetSwiper($OA_albums,$project_id,'interiors ranked','medium',1);
							if (($albumhtml!='') && (!$hide_open_asset_albums)) {
								echo $albumhtml;
							} else {
								include 'template-parts/project-story-slides/project-story-slides.php';
							}
							?>

				</div>
				<div class="slider_controls">
					<!-- Add Pagination -->
					<div class="swiper-pagination"></div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
				<div class="shimmer tumb_loading"></div>
			</div>
			<?php endwhile; // end of the loop. ?>
			<?php endif; // if( get_field('interior_project_slideshow') ): ?>
			<div class="project_story_content toggle_item_wrap">
				<div class="toggled_text three_lines">
					<p class="two_col"><?php echo $projectstorycontent; ?></p>
				</div>
				<span class="three_dot">...</span>
				<div class="toggle_text three_lines">
	            	<span class="expando_icon"></span>
                </div>
			</div>
		</div>
		<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
		<?php endif; // if( get_field('interior_project_content') ): ?>
	</div>
	<?php } ?>
	<?php  ///////////////////////////////////// END INTERIORS STORY //////////////////////////////////////// ?>








	<?php  ///////////////////////////////////// PLANNING STORY //////////////////////////////////////// ?>
	<?php if(strstr($_SERVER['REQUEST_URI'], 'planning') == true ){ ?>
	<div class="row project_planning_story">
		<?php if( have_rows('planning_project_content') ): ?>
		<?php while( have_rows('planning_project_content') ): the_row(); 
			$projectstorytitle = get_sub_field('project_subtitle');
			$projectstorycontent = get_sub_field('project_content');
		?>
		<?php if($projectstorytitle):?>
		<div class="col-12 toggle_wrapper">
			<hr>
			<h5><a href="<?php the_permalink(); ?>/?planning">Planning Story</a></h5>
			<h2><?php echo $projectstorytitle; ?></h2>

			<!-- Swiper -->
			<?php if( have_rows('planning_project_slideshow') ): ?>
			<?php while( have_rows('planning_project_slideshow') ): the_row(); ?>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					
							<?php 
							$albumhtml = getOpenAssetSwiper($OA_albums,$project_id,'planning ranked','medium',1);
							if (($albumhtml!='') && (!$hide_open_asset_albums)) {
								echo $albumhtml;
							} else {
								include 'template-parts/project-story-slides/project-story-slides.php';
							}
							?>

				</div>
				<div class="slider_controls">
					<!-- Add Pagination -->
					<div class="swiper-pagination"></div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
				<div class="shimmer tumb_loading"></div>
			</div>
			<?php endwhile; // end of the loop. ?>
			<?php endif; // if( get_field('planning_project_slideshow') ): ?>
			<div class="project_story_content toggle_item_wrap">
				<div class="toggled_text three_lines">
					<p class="two_col"><?php echo $projectstorycontent; ?></p>
				</div>
				<span class="three_dot">...</span>
				<div class="toggle_text three_lines">
	            	<span class="expando_icon"></span>
                </div>
			</div>
		</div>
		<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
		<?php endif; // if( get_field('planning_project_content') ): ?>
	</div>
	<?php } ?>

	<?php  ///////////////////////////////////// END PLANNING STORY //////////////////////////////////////// ?>






	<?php  ///////////////////////////////////// BRAND STORY //////////////////////////////////////// ?>
	<?php if(strstr($_SERVER['REQUEST_URI'], 'brand') == true ){ ?>
	<div class="row project_brand_story">
		<?php if( have_rows('brand_project_content') ): ?>
		<?php while( have_rows('brand_project_content') ): the_row(); 
			$projectstorytitle = get_sub_field('project_subtitle');
			$projectstorycontent = get_sub_field('project_content');
		?>
		<?php if($projectstorytitle):?>
		<div class="col-12 toggle_wrapper">
			<hr>
			<h5><a href="<?php the_permalink(); ?>/?brand">Brand Story</a></h5>
			<h2><?php echo $projectstorytitle; ?></h2>



				<?php //////////////////////  ALBUM BRAND ////////////// ?>
				<div id="album-brand" class="albumsdiv"></div>


			<!-- Swiper -->
			<?php if( have_rows('brand_project_slideshow') ): ?>
				<?php while( have_rows('brand_project_slideshow') ): the_row(); ?>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					
							<?php 
							$albumhtml = getOpenAssetSwiper($OA_albums,$project_id,'brand ranked','medium',1);
							if (($albumhtml!='') && (!$hide_open_asset_albums)) {
								echo $albumhtml;
							} else {
								include 'template-parts/project-story-slides/project-story-slides.php';
							}
							?>

				</div>
				<div class="slider_controls">
					<!-- Add Pagination -->
					<div class="swiper-pagination"></div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
				<div class="shimmer tumb_loading"></div>
			</div>
			<?php endwhile; // end of the loop. ?>
			<?php endif; // if( get_field('brand_project_slideshow') ): ?>
			<div class="project_story_content toggle_item_wrap">
				<div class="toggled_text three_lines">
					<p class="two_col"><?php echo $projectstorycontent; ?></p>
				</div>
				<span class="three_dot">...</span>
				<div class="toggle_text three_lines">
	            	<span class="expando_icon"></span>
                </div>
			</div>
		</div>
		<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
		<?php endif; // if( get_field('brand_project_content') ): ?>
	</div>
	<?php } ?>


	<?php  ///////////////////////////////////// END BRAND STORY //////////////////////////////////////// ?>

	<?php  ///////////////////////////////////// DESIGN STORY //////////////////////////////////////// ?>
	<?php if(strstr($_SERVER['REQUEST_URI'], 'design') == true ){ ?>
	<div class="row project_design_story">
		<?php if( have_rows('design_project_content') ): ?>
		<?php while( have_rows('design_project_content') ): the_row(); 
			$projectstorytitle = get_sub_field('project_subtitle');
			$projectstorycontent = get_sub_field('project_content');
		?>
		<?php if($projectstorytitle):?>
		<div class="col-12 toggle_wrapper">
			<hr>
			<h5><a href="<?php the_permalink(); ?>/?design">Design Story</a></h5>
			<h2><?php echo $projectstorytitle; ?></h2>



				<?php //////////////////////  ALBUM DESIGN ////////////// ?>
				<div id="album-design" class="albumsdiv"></div>


			<!-- Swiper -->
			<?php if( have_rows('design_project_slideshow') ): ?>
				<?php while( have_rows('design_project_slideshow') ): the_row(); ?>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					
							<?php 
							$albumhtml = getOpenAssetSwiper($OA_albums,$project_id,'design ranked','medium',1);
							if (($albumhtml!='') && (!$hide_open_asset_albums)) {
								echo $albumhtml;
							} else {
								include 'template-parts/project-story-slides/project-story-slides.php';
							}
							?>

				</div>
				<div class="slider_controls">
					<!-- Add Pagination -->
					<div class="swiper-pagination"></div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
				<div class="shimmer tumb_loading"></div>
			</div>
			<?php endwhile; // end of the loop. ?>
			<?php endif; // if( get_field('design_project_slideshow') ): ?>
			<div class="project_story_content toggle_item_wrap">
				<div class="toggled_text three_lines">
					<p class="two_col"><?php echo $projectstorycontent; ?></p>
				</div>
				<span class="three_dot">...</span>
				<div class="toggle_text three_lines">
	            	<span class="expando_icon"></span>
                </div>
			</div>
		</div>
		<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
		<?php endif; // if( get_field('design_project_content') ): ?>
	</div>
	<?php } ?>


	<?php  ///////////////////////////////////// END DESIGN STORY //////////////////////////////////////// ?>

	<?php  ///////////////////////////////////// PROCESS STORY //////////////////////////////////////// ?>
	<?php if(strstr($_SERVER['REQUEST_URI'], 'process') == true ){ ?>
	<div class="row project_process_story">
		<?php if( have_rows('process_project_content') ): ?>
		<?php while( have_rows('process_project_content') ): the_row(); 
			$projectstorytitle = get_sub_field('project_subtitle');
			$projectstorycontent = get_sub_field('project_content');
		?>
		<?php if($projectstorytitle):?>
		<div class="col-12 toggle_wrapper">
			<hr>
			<h5><a href="<?php the_permalink(); ?>/?process">Process Story</a></h5>
			<h2><?php echo $projectstorytitle; ?></h2>



				<?php //////////////////////  ALBUM PROCESS ////////////// ?>
				<div id="album-process" class="albumsdiv"></div>


			<!-- Swiper -->
			<?php if( have_rows('process_project_slideshow') ): ?>
				<?php while( have_rows('process_project_slideshow') ): the_row(); ?>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					
							<?php 
							$albumhtml = getOpenAssetSwiper($OA_albums,$project_id,'process ranked','medium',1);
							if (($albumhtml!='') && (!$hide_open_asset_albums)) {
								echo $albumhtml;
							} else {
								include 'template-parts/project-story-slides/project-story-slides.php';
							}
							?>

				</div>
				<div class="slider_controls">
					<!-- Add Pagination -->
					<div class="swiper-pagination"></div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
				<div class="shimmer tumb_loading"></div>
			</div>
			<?php endwhile; // end of the loop. ?>
			<?php endif; // if( get_field('process_project_slideshow') ): ?>
			<div class="project_story_content toggle_item_wrap">
				<div class="toggled_text three_lines">
					<p class="two_col"><?php echo $projectstorycontent; ?></p>
				</div>
				<span class="three_dot">...</span>
				<div class="toggle_text three_lines">
	            	<span class="expando_icon"></span>
                </div>
			</div>
		</div>
		<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
		<?php endif; // if( get_field('process_project_content') ): ?>
	</div>
	<?php } ?>


	<?php  ///////////////////////////////////// END PROCESS STORY //////////////////////////////////////// ?>


<?php ////////////////// END PUT DISCIPLINE STORIES FIRST ///////////////////////// ?>




	<?php  ///////////////////////////////////// ARCHITECTURE STORY //////////////////////////////////////// ?>
	<?php //////// architecture is first - so goes here whether discipline or not //////////// ?>
	<div class="row project_interior_story">
		<?php if( have_rows('architecture_project_content') ): ?>
		<?php while( have_rows('architecture_project_content') ): the_row(); 
			$projectstorytitle = get_sub_field('project_subtitle');
			$projectstorycontent = get_sub_field('project_content');
			$project_category = "Architecture";
			$story_text = "Story";
			///////////  CHECK FOR ALTERNATIVE CATEGORY AND STORY //////////////////
			$alternative_project_category = get_sub_field('alternative_project_category');
			if ($alternative_project_category) {
				$project_category = $alternative_project_category;
						// change the breadcrumb to the alternative category
						echo '<script>
							jQuery(function() {
								jQuery(".breadcrumbs-discipline>a").html("'.$project_category.'");
							});
						</script>';
			}
			$alternative_story_text = get_sub_field('alternative_story_text');
			if ($alternative_story_text) {
				$story_text = $alternative_story_text;
			}
		?>
		<?php if($projectstorytitle):?>
		<div class="col-12 toggle_wrapper">
			<hr>
			<h5><a href="<?php the_permalink(); ?>/?architecture"><?php echo $project_category;?> <?php echo $story_text;?></a></h5>
			<h2><?php echo $projectstorytitle; ?></h2>


			<!-- Swiper -->
			<?php if( have_rows('architecture_project_slideshow') ): ?>
				<?php while( have_rows('architecture_project_slideshow') ): the_row(); ?>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					
							<?php 
							$albumhtml = getOpenAssetSwiper($OA_albums,$project_id,'architecture ranked','medium',1);
							if (($albumhtml!='') && (!$hide_open_asset_albums)) {
								echo $albumhtml;
							} else {
								include 'template-parts/project-story-slides/project-story-slides.php';
							}
							?>

				</div>
				<div class="slider_controls">
					<!-- Add Pagination -->
					<div class="swiper-pagination"></div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
				<div class="shimmer tumb_loading"></div>
			</div>
			<?php endwhile; // end of the loop. ?>
			<?php endif; // if( get_field('interior_project_slideshow') ): ?>
			<div class="project_story_content toggle_item_wrap">
				<div class="toggled_text three_lines">
					<p class="two_col"><?php echo $projectstorycontent; ?></p>
				</div>
				<span class="three_dot">...</span>
				<div class="toggle_text three_lines">
	            	<span class="expando_icon"></span>
                </div>
			</div>
		</div>
		<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
		<?php endif; // if( get_field('interior_project_content') ): ?>
	</div>

	<?php  ///////////////////////////////////// END ARCHITECTURE STORY //////////////////////////////////////// ?>







	<?php  ///////////////////////////////////// INTERIORS STORY //////////////////////////////////////// ?>
	<?php if(strstr($_SERVER['REQUEST_URI'], 'interiors') == false ){ ?>
	<div class="row project_interior_story">
		<?php if( have_rows('interior_project_content') ): ?>
		<?php while( have_rows('interior_project_content') ): the_row(); 
			$projectstorytitle = get_sub_field('project_subtitle');
			$projectstorycontent = get_sub_field('project_content');
		?>
		<?php if($projectstorytitle):?>
		<div class="col-12 toggle_wrapper">
			<hr>
			<h5><a href="<?php the_permalink(); ?>/?interiors">Interior Story</a></h5>
			<h2><?php echo $projectstorytitle; ?></h2>


			<!-- Swiper -->
			<?php if( have_rows('interior_project_slideshow') ): ?>
				<?php while( have_rows('interior_project_slideshow') ): the_row(); ?>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					
							<?php 
							$albumhtml = getOpenAssetSwiper($OA_albums,$project_id,'interiors ranked','medium',1);
							if (($albumhtml!='') && (!$hide_open_asset_albums)) {
								echo $albumhtml;
							} else {
								include 'template-parts/project-story-slides/project-story-slides.php';
							}
							?>

				</div>
				<div class="slider_controls">
					<!-- Add Pagination -->
					<div class="swiper-pagination"></div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
				<div class="shimmer tumb_loading"></div>
			</div>
			<?php endwhile; // end of the loop. ?>
			<?php endif; // if( get_field('interior_project_slideshow') ): ?>
			<div class="project_story_content toggle_item_wrap">
				<div class="toggled_text three_lines">
					<p class="two_col"><?php echo $projectstorycontent; ?></p>
				</div>
				<span class="three_dot">...</span>
				<div class="toggle_text three_lines">
	            	<span class="expando_icon"></span>
                </div>
			</div>
		</div>
		<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
		<?php endif; // if( get_field('interior_project_content') ): ?>
	</div>
	<?php } ?>
	<?php  ///////////////////////////////////// END INTERIORS STORY //////////////////////////////////////// ?>








	<?php  ///////////////////////////////////// PLANNING STORY //////////////////////////////////////// ?>
	<?php if(strstr($_SERVER['REQUEST_URI'], 'planning') == false ){ ?>
	<div class="row project_planning_story">
		<?php if( have_rows('planning_project_content') ): ?>
		<?php while( have_rows('planning_project_content') ): the_row(); 
			$projectstorytitle = get_sub_field('project_subtitle');
			$projectstorycontent = get_sub_field('project_content');
		?>
		<?php if($projectstorytitle):?>
		<div class="col-12 toggle_wrapper">
			<hr>
			<h5><a href="<?php the_permalink(); ?>/?planning">Planning Story</a></h5>
			<h2><?php echo $projectstorytitle; ?></h2>

			<!-- Swiper -->
			<?php if( have_rows('planning_project_slideshow') ): ?>
			<?php while( have_rows('planning_project_slideshow') ): the_row(); ?>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					
							<?php 
							$albumhtml = getOpenAssetSwiper($OA_albums,$project_id,'planning ranked','medium',1);
							if (($albumhtml!='') && (!$hide_open_asset_albums)) {
								echo $albumhtml;
							} else {
								include 'template-parts/project-story-slides/project-story-slides.php';
							}
							?>

				</div>
				<div class="slider_controls">
					<!-- Add Pagination -->
					<div class="swiper-pagination"></div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
				<div class="shimmer tumb_loading"></div>
			</div>
			<?php endwhile; // end of the loop. ?>
			<?php endif; // if( get_field('planning_project_slideshow') ): ?>
			<div class="project_story_content toggle_item_wrap">
				<div class="toggled_text three_lines">
					<p class="two_col"><?php echo $projectstorycontent; ?></p>
				</div>
				<span class="three_dot">...</span>
				<div class="toggle_text three_lines">
	            	<span class="expando_icon"></span>
                </div>
			</div>
		</div>
		<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
		<?php endif; // if( get_field('planning_project_content') ): ?>
	</div>
	<?php } ?>

	<?php  ///////////////////////////////////// END PLANNING STORY //////////////////////////////////////// ?>






	<?php  ///////////////////////////////////// BRAND STORY //////////////////////////////////////// ?>
	<?php if(strstr($_SERVER['REQUEST_URI'], 'brand') == false ){ ?>
	<div class="row project_brand_story">
		<?php if( have_rows('brand_project_content') ): ?>
		<?php while( have_rows('brand_project_content') ): the_row(); 
			$projectstorytitle = get_sub_field('project_subtitle');
			$projectstorycontent = get_sub_field('project_content');
		?>
		<?php if($projectstorytitle):?>
		<div class="col-12 toggle_wrapper">
			<hr>
			<h5><a href="<?php the_permalink(); ?>/?brand">Brand Story</a></h5>
			<h2><?php echo $projectstorytitle; ?></h2>



				<?php //////////////////////  ALBUM BRAND ////////////// ?>
				<div id="album-brand" class="albumsdiv"></div>


			<!-- Swiper -->
			<?php if( have_rows('brand_project_slideshow') ): ?>
				<?php while( have_rows('brand_project_slideshow') ): the_row(); ?>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					
							<?php 
							$albumhtml = getOpenAssetSwiper($OA_albums,$project_id,'brand ranked','medium',1);
							if (($albumhtml!='') && (!$hide_open_asset_albums)) {
								echo $albumhtml;
							} else {
								include 'template-parts/project-story-slides/project-story-slides.php';
							}
							?>

				</div>
				<div class="slider_controls">
					<!-- Add Pagination -->
					<div class="swiper-pagination"></div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
				<div class="shimmer tumb_loading"></div>
			</div>
			<?php endwhile; // end of the loop. ?>
			<?php endif; // if( get_field('brand_project_slideshow') ): ?>
			<div class="project_story_content toggle_item_wrap">
				<div class="toggled_text three_lines">
					<p class="two_col"><?php echo $projectstorycontent; ?></p>
				</div>
				<span class="three_dot">...</span>
				<div class="toggle_text three_lines">
	            	<span class="expando_icon"></span>
                </div>
			</div>
		</div>
		<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
		<?php endif; // if( get_field('brand_project_content') ): ?>
	</div>
	<?php } ?>


	<?php  ///////////////////////////////////// END BRAND STORY //////////////////////////////////////// ?>




	<?php  ///////////////////////////////////// DESIGN STORY //////////////////////////////////////// ?>
	<?php if(strstr($_SERVER['REQUEST_URI'], 'design') == false ){ ?>
	<div class="row project_design_story">
		<?php if( have_rows('design_project_content') ): ?>
		<?php while( have_rows('design_project_content') ): the_row(); 
			$projectstorytitle = get_sub_field('project_subtitle');
			$projectstorycontent = get_sub_field('project_content');
		?>
		<?php if($projectstorytitle):?>
		<div class="col-12 toggle_wrapper">
			<hr>
			<h5><a href="<?php the_permalink(); ?>/?design">Design Story</a></h5>
			<h2><?php echo $projectstorytitle; ?></h2>



				<?php //////////////////////  ALBUM DESIGN ////////////// ?>
				<div id="album-design" class="albumsdiv"></div>


			<!-- Swiper -->
			<?php if( have_rows('design_project_slideshow') ): ?>
				<?php while( have_rows('design_project_slideshow') ): the_row(); ?>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					
							<?php 
							$albumhtml = getOpenAssetSwiper($OA_albums,$project_id,'design ranked','medium',1);
							if (($albumhtml!='') && (!$hide_open_asset_albums)) {
								echo $albumhtml;
							} else {
								include 'template-parts/project-story-slides/project-story-slides.php';
							}
							?>

				</div>
				<div class="slider_controls">
					<!-- Add Pagination -->
					<div class="swiper-pagination"></div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
				<div class="shimmer tumb_loading"></div>
			</div>
			<?php endwhile; // end of the loop. ?>
			<?php endif; // if( get_field('design_project_slideshow') ): ?>
			<div class="project_story_content toggle_item_wrap">
				<div class="toggled_text three_lines">
					<p class="two_col"><?php echo $projectstorycontent; ?></p>
				</div>
				<span class="three_dot">...</span>
				<div class="toggle_text three_lines">
	            	<span class="expando_icon"></span>
                </div>
			</div>
		</div>
		<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
		<?php endif; // if( get_field('design_project_content') ): ?>
	</div>
	<?php } ?>


	<?php  ///////////////////////////////////// END DESIGN STORY //////////////////////////////////////// ?>


	<?php  ///////////////////////////////////// PROCESS STORY //////////////////////////////////////// ?>
	<?php if(strstr($_SERVER['REQUEST_URI'], 'process') == false ){ ?>
	<div class="row project_process_story">
		<?php if( have_rows('process_project_content') ): ?>
		<?php while( have_rows('process_project_content') ): the_row(); 
			$projectstorytitle = get_sub_field('project_subtitle');
			$projectstorycontent = get_sub_field('project_content');
		?>
		<?php if($projectstorytitle):?>
		<div class="col-12 toggle_wrapper">
			<hr>
			<h5><a href="<?php the_permalink(); ?>/?process">Process Story</a></h5>
			<h2><?php echo $projectstorytitle; ?></h2>



				<?php //////////////////////  ALBUM PROCESS ////////////// ?>
				<div id="album-process" class="albumsdiv"></div>


			<!-- Swiper -->
			<?php if( have_rows('process_project_slideshow') ): ?>
				<?php while( have_rows('process_project_slideshow') ): the_row(); ?>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					
							<?php 
							$albumhtml = getOpenAssetSwiper($OA_albums,$project_id,'process ranked','medium',1);
							if (($albumhtml!='') && (!$hide_open_asset_albums)) {
								echo $albumhtml;
							} else {
								include 'template-parts/project-story-slides/project-story-slides.php';
							}
							?>

				</div>
				<div class="slider_controls">
					<!-- Add Pagination -->
					<div class="swiper-pagination"></div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
				<div class="shimmer tumb_loading"></div>
			</div>
			<?php endwhile; // end of the loop. ?>
			<?php endif; // if( get_field('process_project_slideshow') ): ?>
			<div class="project_story_content toggle_item_wrap">
				<div class="toggled_text three_lines">
					<p class="two_col"><?php echo $projectstorycontent; ?></p>
				</div>
				<span class="three_dot">...</span>
				<div class="toggle_text three_lines">
	            	<span class="expando_icon"></span>
                </div>
			</div>
		</div>
		<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
		<?php endif; // if( get_field('process_project_content') ): ?>
	</div>
	<?php } ?>


	<?php  ///////////////////////////////////// END PROCESS STORY //////////////////////////////////////// ?>






	<div class="row">
		<div class="col-12">
			<hr>
		</div>
	</div>


<div class="backbuttondiv">
	<div class="backbutton arrow_wrap flip" >
	    	<div id="cta_arrow">
        		<span class="arrow_right primera black flip"></span>
        		<span class="arrow_right segunda black flip"></span>
        	</div>
			<div class="flipback">Back</div>		
	</div>
</div>

</div>
</div>



	
<!-- Explore More Projects -->
<?php // include 'template-parts/explore-projects-grid.php';?>


<!-- Explore Cross Markets -->
<?php // include 'template-parts/explore-cross-markets.php';?>



	<!-- Swiper JS -->
	<script src="<?php echo get_stylesheet_directory_uri();?>/swiper/swiper-bundle.min.js"></script>
	<!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
	<script src= "<?php echo get_stylesheet_directory_uri();?>/js/fslightbox.js"></script>
	<?php /// https://fslightbox.com/javascript/documentation/how-to-use#through-javascript  ?>

	<!-- Initialize Swiper -->
	<script>

window.addEventListener('DOMContentLoaded', (event) => {


	var swipertop = new Swiper('.swiper-container.top_project_slider', {
    	slidesPerView: 1,
//     	slidesPerView: 1,
    	centeredSlides: false,
    	loop: false,
    	spaceBetween: 0,
    	draggable: true,
    	simulateTouch: true,
/*
    	breakpoints: {
    		'640': {
    		 slidesPerView: 1,
    		 centeredSlides: true,
    		}
    	},
*/
    	pagination: {
    	    el: '.swiper-pagination',
    	    type: 'fraction',
    	},
    	navigation: {
    	    nextEl: '.swiper-button-next',
    	    prevEl: '.swiper-button-prev',
    	},
    });

/* project_stories */

	var swiper = new Swiper('.project_stories .swiper-container', {
    	slidesPerView: 1,
//     	slidesPerView: 1,
    	centeredSlides: false,
    	loop: false,
    	spaceBetween: 0,
    	draggable: true,
    	simulateTouch: true,
/*
    	breakpoints: {
    		'640': {
    		 slidesPerView: 1,
    		 centeredSlides: true,
    		}
    	},
*/
    	pagination: {
    	    el: '.swiper-pagination',
    	    type: 'fraction',
    	},
    	navigation: {
    	    nextEl: '.swiper-button-next',
    	    prevEl: '.swiper-button-prev',
    	},
    });


});

	jQuery(function() {
		if (history.length > 1) {
			jQuery(".backbuttondiv").css("visibility","visible");
			jQuery(".backbutton").on( "click", function() {
				history.back();
			});
		}
	});
		

	</script>
	<style>

	h1.posttitle{
		font-size:34px !important;
		margin-bottom:12px !important;
	}

	.container.swiper-container {
		max-width: 1400px;
	}
	.container.project_top_content {
		max-width: 1400px;
	}

	.container.project_stories {
		max-width: 1400px;
	}

	.container.grid_project_wrap {
		max-width: 1400px;
	}

	.project_sidebar .toggle_item_wrap {
		margin-top:0px;
	}

	/*.project_top_content .container.slider_controls_title_wrap {*/
	.container.slider_controls_title_wrap 
		margin: 0px 0px;
	}

	.toggle_item_wrap {
	    padding-bottom: 5px;
	}


	h5.awards{
		margin-top:30px;
	}
	.project_sidebar h5 {
    font-weight: 700;
		margin-top: 10px;
		padding-bottom: 4px;
	}


	.backbuttondiv {
		margin-bottom:20px;
		display: inline-block;
		visibility:hidden;
	}
	.backbutton {
		cursor:pointer;
	}
	.backbutton.arrow_wrap.flip{
		transform: rotate(180deg);
	}

	.backbutton #cta_arrow {
		position:relative;
	}

	.flipback{
		transform: rotate(180deg);
		margin-left:20px;
		position: relative;
		right: 60px;
		bottom: 32px;
		font-weight:500;
	}



	@media (max-width: 1400px) {
		.container.project_top_content {
		max-width: 1200px;
		}

		.container.swiper-container {
			max-width: 1200px;
		}

		.container.project_stories {
			max-width: 1200px;
		}

		.container.grid_project_wrap {
			max-width: 1200px;
		}
	}

	@media screen and (max-width: 992px) {
		.container.swiper-container.swiper-horizontal {
			padding-right:0px;
			padding-left:0px;
		}
		.project_stories .swiper-slide img {
			height: 300px;
		}
		.container.slider_controls_title_wrap {
		    bottom: 0px;
			left: -10px;
		}
		.project_stories .slider_controls {
			bottom: 50px;
		}
		.container.project_top_content {
			padding-top: 25px;
			padding-bottom: 0px;
		}
	}



	</style>

<?php
get_footer();
