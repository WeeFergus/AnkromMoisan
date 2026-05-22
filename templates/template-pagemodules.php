<?php
/**
 * Template Name: Page Modules Template
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
	//echo "this id:" . $thisid;
?>




<?php  

	include dirname(__FILE__)."/../functions_openassets_album.php";
	include dirname(__FILE__)."/../functions_openassets_employees.php";

	$thisid = 0; // keep track of id of each module
	$featured_image = get_the_post_thumbnail_url(); // get_the_post_thumbnail_url($post->ID, 'full'); 
	$page_subtitle = get_field('page_subtitle');
	$page_content = get_field('page_content');
	$headertype = get_field('page_header_type');
	$headerstyle = get_field('page_header_style');
	$page_title = get_field('page_title');
	$page_title_font = get_field('page_title_font');
	$page_title_font_size = get_field('page_title_font_size');
	if ($page_title_font_size=='') {$page_title_font_size ='30px';}

	$page_feature_link1 = get_field('page_feature_link1');
	$page_feature_link1_text = get_field('page_feature_link1_text');
	$page_feature_link1_target = get_field('page_feature_link1_target');
	$page_feature_link2 = get_field('page_feature_link2');
	$page_feature_link2_text = get_field('page_feature_link2_text');
	$page_feature_link2_target = get_field('page_feature_link2_target');
	

	$page_breadcrumb = get_field('page_breadcrumb');
	$page_breadcrumbs_level = get_field('page_breadcrumbs_level');
	if (($page_breadcrumbs_level!=0) &&  ($page_breadcrumbs_level!=1) && ($page_breadcrumbs_level!=2)) {
		$page_breadcrumbs_level = 2;
	}
	// it can only be 0, 1 or 2
	if ($page_breadcrumbs_level==0) { 
	   echo '<style>
	     body .breadcrumbs{
			 display:none;
		}
		</style>';
	}	
	if ($page_breadcrumbs_level==1) { 
	   echo '<style>
	     .breadcrumbs-sector{
			 display:none;
		}
		</style>';
	}	
	if ($headerstyle!='') { 
	   echo '<style>
	     .hero_sector_wrapper .hero_image{
			'.$headerstyle.';
		}
		</style>';
	}	
?>


<?php if ($headertype == 'box') { ?>

	<div class="container module-container">

	<div class="row" id="hero">
		<div class="col-12">
			
		</div>
	</div>	
	<style>
	#hero{
		height:340px;
		width:1120px;
		background-image:url("<?php echo $featured_image;?>");
		background-size:cover;
		background-repeat:no-repeat;
		background-position:bottom center;
		margin:0 !important;
	}
	</style>
<?php } ?>


<?php if (($headertype == 'full') || ($headertype == 'fullb') || ($headertype == 'feature')) { ?>

<div class="hero_sector_wrapper">
	<?php $careerheroImage = get_field('career_hero_image'); ?>
	<div class="hero_sector_image_wrap">
		
		<div class="hero_image"></div>
		<div class="shimmer tumb_loading"></div>

<?php if (($headertype == 'full') || ($headertype == 'fullb')) { ?>

		<div class="container hero_title">
			<div class="row">
				<div class="col-12">
					<h1 class="header">
			<?php if ($page_title!='') { ?>
				<?php echo $page_title; ?>
			<?php } else { ?>
				<?php echo $post->post_title; ?>
			<?php } ?>
					</h1>
				</div>
			</div>
		</div>
<?php } elseif ($headertype == 'feature') {?>

			<div class="container project_content_wrap featuredheadertext ">
				<div class="row d-none- d-lg-flex featureheadertextinner">
					<div class="col-md-10 featuretextinnercol">
						<div class="d-none- d-lg-block">
							<h1 class="shimmer bold uppercase featured"><?php echo $page_title;?></h1>
									<h2 class="shimmer featured"><?php echo $page_subtitle;?></h2>

						</div>
					</div>

					<div>
						<br clear="all">
					</div>

					<?php if ($page_feature_link1 != '') { ?>
					<div class="featured-link hover_arrow_story">
						<div class="featured-link-section">
							<h3 class="shimmer bold uppercase"><a href="<?php echo $page_feature_link1;?>" target="<?php echo $page_feature_link1_target;?>"><?php echo $page_feature_link1_text;?></a></h3>
						</div>
						<div class="arrow_wrap featuredarrow">
						<a href="<?php echo $page_feature_link1; ?>" target="<?php echo $page_feature_link1_target;?>">
        					<div id="cta_arrow" class="featured-cta-arrow">
        						<span class="arrow_right primera white"></span>
        						<span class="arrow_right segunda white"></span>
        					</div>
						</a>
						</div>
					</div>
					<?php } ?>

					<?php if ($page_feature_link2 != '') { ?>
					<div class="featured-link hover_arrow_story">
						<div class="featured-link-section">
							<h3 class="shimmer bold uppercase"><a href="<?php echo $page_feature_link2;?>" target="<?php echo $page_feature_link2_target;?>"><?php echo $page_feature_link2_text;?></a></h3>
						</div>
						<div class="arrow_wrap featuredarrow">
						<a href="<?php echo $page_feature_link2; ?>" target="<?php echo $page_feature_link2_target;?>">
        					<div id="cta_arrow" class="featured-cta-arrow">
        						<span class="arrow_right primera white"></span>
        						<span class="arrow_right segunda white"></span>
        					</div>
						</a>
						</div>
					</div>
					<?php } ?>

			</div>
			</div>	



<?php } ?>

	</div>
	</div>
	<style>
	.hero_image{
		background-image:url("<?php echo $featured_image;?>");
	}
	</style>
	<?php if ($headertype == 'fullb') { ?>
	<style>		
		h1.header {
			padding: 30px;
			background: #FFF;
			color: #212529;
			display: inline-block;
			box-shadow: 17px 17px 17px #000;
		}
	</style>

	<?php } ?>

	<div class="container module-container">
<?php } ?>


<?php if ($headertype == 'feature') { ?>

<?php } else { ?>
	<div class="row" id="description">
		<div class="col-12">
		<?php if (substr($headertype,0,4) != 'full') { ?>
			<?php if ($page_title!='') { ?>
			<div class="page-title"><?php echo $page_title; ?></div>
			<?php } ?>
		<?php } ?>
			<?php if ($headertype != 'feature') { ?>
			<div class="module-subheader"><?php echo $page_subtitle; ?></div>
			<?php } ?>
			<div class="module-content"><?php echo $page_content; ?></div>
		</div>
	</div>	
<?php } ?>


	<?php if( have_rows('page_modules') ){


			$carouselautplay = '';  // default
			$carouselzoomvalue = 1; // default
		 
		while( have_rows('page_modules') ) { 
			the_row(); 
			$thisid++;
			$module_type = get_sub_field('module_repeater_module_type');
			//echo "Module Type: ".$module_type."<br>";
			$module_type_class = '';
			if ($module_type == 'Button') {
			  $module_type_class = 'button';
			}
			$module_format = get_sub_field('module_repeater_format');
			$title = get_sub_field('module_repeater_title');
			$pdf = get_sub_field('module_repeater_pdf');
			$pdf_shortcode = get_sub_field('module_repeater_pdf_shortcode');
			$openassetalbum = get_sub_field('module_repeater_openasset_album');
			$content = get_sub_field('module_repeater_content_top');
			$shortcontent = get_sub_field('module_repeater_short_content');
			$postid = get_sub_field('module_repeater_post');
			$postexpand = get_sub_field('module_repeater_post_expand');
			$youtube_id = get_sub_field('module_repeater_youtube_id');
			$fontfamily = get_sub_field('module_repeater_font_family');
			if ($fontfamily=='') {$fontfamily='GothamNarrow-Medium';}
			$fontsize = get_sub_field('module_repeater_font_size');
			if ($fontsize=='') {$fontsize='24px';}
			$fontcolor = get_sub_field('module_repeater_font_color');
			if ($fontcolor=='') {$fontcolor='#333';}
			$carouseltype = get_sub_field('module_repeater_carousel_type');
			if ($carouselautplay=='') { // only get this attribute if it's blank. Once it's entered then don't get it any more. Apply to all carousels
				$carouselautplay = get_sub_field('module_repeater_autoplay');
			}
			$anchorname = get_sub_field('module_repeater_anchorname');

		
			

			$carouselzoom = get_sub_field('module_repeater_carousel_zoom');
			if ($carouselzoom=='') {
				$carouselzoom = 1;
			}
			if ($carouselzoom!=1) {
				$carouselzoomvalue = $carouselzoom;
					// set the carouselzoomvalue if the value isn't 1
			}
			
			
			if ($carouseltype=='coverflow') {;
				$swiperclass="swiper-coverflow";
				$hidelightbox="yes";
			} else {
				$swiperclass="swiper-original";
				$hidelightbox="no";
			}
			$album_order = get_sub_field('module_repeater_album_order');
			$divider = get_sub_field('module_repeater_divider');
			$modulestyle = get_sub_field('module_repeater_style');
			$moduleclass = get_sub_field('module_repeater_section_class');
			


			$thisrowstyle = "";
			if ($divider == 'yes') {
				$thisrowstyle = "border-top:1px solid #aaa;";
			}

			if ($module_format == 'full') {
				/*$thisrowstyle = $thisrowstyle."width: 180%; margin-left: -27vw;". $thisrowstyle;*/
			} else {
				$thisrowstyle = $thisrowstyle."max-width:1140px;margin:auto;";
			}

			if ($modulestyle!='') {
				$thisrowstyle.=$thisrowstyle.$modulestyle;
			}

			?> 
		<div class="row modulerow <?php echo $moduleclass;?>" style="<?php echo $thisrowstyle;?>">
			<div class="col-12 <?php echo $module_format?> <?php echo $module_type_class?> ">
				<div class="content_wrapper">
				<?php if ($title!='') {
						if (($module_type!='Post') && ($module_type!='Featured Links')) {		
						echo '<div class="module-title" id="module-'.$thisid.'">'.$title.'</div>';
						}
				}
				?>
				<?php //echo $module_type ?>
				<?php ///////////////////////// PDF //////////////////////// ?>
				<?php if ($module_type=='PDF') {				
					// echo "<br>".$pdf_shortcode."<br>";
					if ($pdf_shortcode!='') {
						echo do_shortcode( $pdf_shortcode );
						echo '<div class="pdfspacer"></div>';
					}
					
				?>
				<?php if ($shortcontent!='') {?>
					<div class="shortcontent"><?php echo $shortcontent;?></div>
				<?php } ?>
				<?php 
				} ?>
				<?php ///////////////////////// END PDF //////////////////////// ?>


				<?php ///////////////////////// ALBUM //////////////////////// ?>
				<?php if ($module_type=='Open Asset Album') {				
					if ($openassetalbum!='') {
						//getOpenAssetsAlbumsByID('','','');
						echo '<div class="project_slider"><div class="container project_stories">
	<div class="row project_interior_story">';
						echo getOpenAssetAlbumSwiper($openassetalbum,$album_order,0,$swiperclass,$hidelightbox);
						//function getOpenAssetAlbumSwiper($OA_albumid,$order,$debug,$swiperclass,$hidelightbox){
						echo '</div></div></div>';
					}
				?>
				<?php if ($shortcontent!='') {?>
					<div class="shortcontent"><?php echo $shortcontent;?></div>
				<?php } ?>
				<?php 
				} ?>
				<?php ///////////////////////// END ALBUM //////////////////////// ?>


				<?php ///////////////////////// CONTENT //////////////////////// ?>
				<?php if ($module_type=='Content') {	?>		
		<div class="toggle_wrapper">
			<div class="project_story_content toggle_item_wrap">
				<div class="toggled_text three_lines">
					<p class="two_col"><?php echo $content; ?></p>
				</div>
				<span class="three_dot">...</span>
				<div class="toggle_text three_lines">
	            	<span class="expando_icon"></span>
                </div>
			</div>
		</div>
				<?php } ?>			

				<?php ///////////////////////// END CONTENT //////////////////////// ?>


			<?php ///////////////////////// FEATURED LINKS //////////////////////// ?>
				<?php if ($module_type=='Featured Links') {	?>		
				<?php 
				    $featured_section_title = $title;
				    $featured_section_subtitle = get_sub_field('module_repeater_featured_subtitle');
					$featured_section_image = get_sub_field('module_repeater_featured_image');
					$featured_section_link_1 = get_sub_field('module_repeater_featured_link_1');
					$featured_section_link_1_text = get_sub_field('module_repeater_featured_link_1_text');
					$featured_section_link_1_target = get_sub_field('module_repeater_featured_link_1_target');
					$featured_section_link_2 = get_sub_field('module_repeater_featured_link_2');
					$featured_section_link_2_text = get_sub_field('module_repeater_featured_link_2_text');
					$featured_section_link_2_target = get_sub_field('module_repeater_featured_link_2_target');
					$featured_image_style = get_sub_field('module_repeater_image_style');

				if ($module_format != 'full') {
					$thisfeaturedcontentstyle="max-width: 1140px;margin:auto;";
				}
	
				?>
				


		<div class="starter-center-cropped lazy fullwidth featuredSectionImage" title="<?php echo $featured_section_title;?>"  style="background-image: url(<?php echo $featured_section_image; ?>);<?php echo $featured_image_style;?>">
			<div class="d-xl-block col-xl-12 home_page_story ">
			</div>
		</div>

			<div class="container project_content_wrap featuredtext ">
				<div class="row d-none- d-lg-flex featuredcontent" style="<?php echo $thisfeaturedcontentstyle;?>">
					<div class="col-md-10 featuretextinnercol">
						<div class="d-none- d-lg-block">
							<h1 class="shimmer bold uppercase featured"><?php echo $title;?></h1>
							<h2 class="shimmer featured"><?php echo $featured_section_subtitle;?></h2>
						</div>
					</div>

					<div>
						<br clear="all">
					</div>

					<?php if ($featured_section_link_1 != '') { ?>
					<div class="featured-link hover_arrow_story">
						<div class="featured-link-section">
							<h3 class="shimmer bold uppercase"><a href="<?php echo $featured_section_link_1;?>" target="<?php echo $featured_section_link_1_target;?>"><?php echo $featured_section_link_1_text;?></a></h3>
						</div>
						<div class="arrow_wrap featuredarrow">
						<a href="<?php echo $featured_section_link_1; ?>" target="<?php echo $featured_section_link_1_target;?>">
        					<div id="cta_arrow" class="featured-cta-arrow">
        						<span class="arrow_right primera white"></span>
        						<span class="arrow_right segunda white"></span>
        					</div>
						</a>
						</div>
					</div>
					<?php } ?>

					<?php if ($featured_section_link_2 != '') { ?>
					<div class="featured-link hover_arrow_story">
						<div class="featured-link-section">
							<h3 class="shimmer bold uppercase"><a href="<?php echo $featured_section_link_2;?>" target="<?php echo $featured_section_link_2_target;?>"><?php echo $featured_section_link_2_text;?></a></h3>
						</div>
						<div class="arrow_wrap featuredarrow">
						<a href="<?php echo $featured_section_link_2; ?>" target="<?php echo $featured_section_link_2_target;?>">
        					<div id="cta_arrow" class="featured-cta-arrow">
        						<span class="arrow_right primera white"></span>
        						<span class="arrow_right segunda white"></span>
        					</div>
						</a>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
	
				<?php } ?>			

				<?php ///////////////////////// END  FEATURED LINKS //////////////////////// ?>


				<?php ///////////////////////// SHORT CONTENT //////////////////////// ?>
				<?php if ($module_type=='Short Content') {	?>		
					<?php echo $shortcontent; ?>
				<?php } ?>			

				<?php ///////////////////////// END SHORT CONTENT //////////////////////// ?>


				<?php ///////////////////////// AUTHOR //////////////////////// ?>
				<?php if ($module_type=='Author') {	?>	
				
					<?php 
					$author_openassetid = '';
					$getauthor_name = '';
					$author_slug = '';

					$author_name = get_sub_field('module_repeater_authorname');
					$author_title  = get_sub_field('module_repeater_authortitle');
					$author_pic  = get_sub_field('module_repeater_authorpic');
					$author_layout  = get_sub_field('module_repeater_authorlayout');
					$author_email  = get_sub_field('module_repeater_authoremail');
					$authoremailname = str_replace("@ankrommoisan.com","",$author_email);
					$author_phone  = get_sub_field('module_repeater_authorphone');
					$authorphonetrim = trim($author_phone);
					$author_linkedin  = get_sub_field('module_repeater_authorlinkedin');
					$author_instagram  = get_sub_field('module_repeater_authorinstagram');
					$author_openasset  = get_sub_field('module_repeater_authoropenasset');
					$author_teammember  = get_sub_field('module_repeater_teammember');
					$author_bio  = get_sub_field('module_repeater_authorbio','',false);
					// get_sub_field($selector, [$format_value = true], [$escape_html = false]);



					// get the OpenAsset Id for this author
					if ($author_teammember!='') {
						$author_openassetid = get_field('fetch_data_project_id', $author_teammember);
						$getauthor_name = get_field('team_member_name', $author_teammember);
						$author_slug =  ucwords( strtolower($getauthor_name));
						$author_slug =  str_replace(" ","-",$author_slug);
						//echo '<!-- author_openassetid:'.$author_openassetid.' -->';
						//echo '<!-- author_name :'.$author_name.' -->';
						//echo '<!-- author_slug :'.$author_slug.' -->';
					}


					if ($author_openassetid != '') {
						$authorobj = getOpenAssetsEmployeesByID($author_openassetid,'','');
						//echo "<!-- authorobj:".print_r($authorobj,true)."-->";
						if ($authorobj) {
							$oalinkedin = $authorobj['employees'][0]['people_pages_social_media_linked_in'];
							$oaemail = $authorobj['employees'][0]['email'];
							$oawork_phone = $authorobj['employees'][0]['work_phone'];
							$oarole = $authorobj['employees'][0]['role'];
							$oaemployee_name = $authorobj['employees'][0]['employee_name'];
							$oabio = $authorobj['employees'][0]['bio'];
							$oainstagram = $authorobj['employees'][0]['people_pages_social_media_instagram'];
							$oapic1 = $authorobj['employees'][0]['files'][0];
							$oapic1URL = $authorobj['files'][$oapic1]['webview'];

							// use Open Asset data if not supplied above
							if ($author_name=='') {$author_name = $oaemployee_name;}
							if ($author_instagram=='') {$author_instagram = $oainstagram;}
							if ($author_linkedin=='') {$author_linkedin = $oalinkedin;}
							if ($author_bio=='') {$author_bio = $oabio;}
							if ($author_title=='') {$author_title = $oarole;}
							if ($author_pic=='') {$author_pic = $oapic1URL;}
							if ($author_email=='') {$author_email = $oaemail;$authoremailname = str_replace("@ankrommoisan.com","",$author_email);}
							if ($author_phone=='') {$author_phone = $oawork_phone;$authorphonetrim = trim($author_phone);}
						}
					}

					// option to use Space in name and title to hide it - instead of using the Open Assets name and title
					if (str_contains($author_pic, 'blank.png')) {$author_pic = '';}
					if ($author_name==' ') {$author_name='';}
					if ($author_title==' ') {$author_title='';}
					if ($author_email==' ') {$author_email='';}
					if ($author_phone==' ') {$author_phone='';}
					if ($author_linkedin==' ') {$author_linkedin='';}
					if ($author_instagram==' ') {$author_instagram='';}
					if ($author_bio==' ') {$author_bio='';}

					?>
				
				<?php if ($author_layout == 'right') { ?>
					<div class="authordiv">
					<div class="authorpicdiv right">
					    <?php if ($author_slug!='') {?><a href="/team-member/<?php echo $author_slug;?>" title="<?php echo $getauthor_name;?>"><?php } ?><img class="authorpic" src="<?php echo $author_pic; ?>"><?php if ($author_slug!='') {?></a><?php } ?>
						<div class="authorname right"><?php echo $author_name; ?></div>
						<div class="authortitle right"><?php echo $author_title; ?></div>
						<?php if ($author_email!='') { ?><div class="authoremail right"><a href="?e=<?php echo $authoremailname;?>#contact" onClick="document.querySelector('.nav_button.contact').click();jQuery('#input_1_10').val('<?php echo $authoremailname;?>@ankrommoisan.com');return false;"><?php echo $author_email; ?></a></div><?php } ?>
						<?php if ($author_phone!='') { ?><div class="authorphone right"><a href="tel:<?php echo $authorphonetrim;?>" target=_blank" ><?php echo $author_phone; ?></a></div><?php } ?>
						<?php if ($author_linkedin!='') { ?><div class="authorlinkedin right"><a href="<?php echo $author_linkedin; ?>" target="_blank"><span class="dashicons dashicons-linkedin"></span></a></div><?php } ?>
						<?php if ($author_instagram!='') { ?><div class="authorinstagram right"><a href="<?php echo $author_instagram; ?>" target="_blank"><span class="dashicons dashicons-instagram"></span></a></div><?php } ?>
					</div>
					<div class="authorbio right"><?php echo $author_bio; ?></div>
					</div>
				<?php } elseif ($author_layout == 'center') { ?>
					<div class="authordiv center">
					<div class="authorpicdiv center"><?php if ($author_slug!='') {?><a href="/team-member/<?php echo $author_slug;?>" title="<?php echo $getauthor_name;?>"><?php } ?><img class="authorpic" src="<?php echo $author_pic; ?>"><?php if ($author_slug!='') {?></a><?php } ?>
						<div class="authorname center"><?php echo $author_name; ?></div>
						<div class="authortitle center"><?php echo $author_title; ?></div>
						<?php if ($author_email!='') { ?><div class="authoremail center"><a href="?e=<?php echo $authoremailname;?>#contact" onClick="document.querySelector('.nav_button.contact').click();jQuery('#input_1_10').val('<?php echo $authoremailname;?>@ankrommoisan.com');return false;"><?php echo $author_email; ?></a></div><?php } ?>
						<?php if ($author_phone!='') { ?><div class="authorphone center"><a href="tel:<?php echo $authorphonetrim;?>" target=_blank" ><?php echo $author_phone; ?></a></div><?php } ?>
						<?php if ($author_linkedin!='') { ?><div class="authorlinkedin center"><a href="<?php echo $author_linkedin; ?>" target="_blank"><span class="dashicons dashicons-linkedin"></span></a></div><?php } ?>
						<?php if ($author_instagram!='') { ?><div class="authorinstagram center"><a href="<?php echo $author_instagram; ?>" target="_blank"><span class="dashicons dashicons-instagram"></span></a></div><?php } ?>
					</div>
					<div class="authorbio center"><?php echo $author_bio; ?></div>
					</div>
				<?php } else { ?>
					<div class="authordiv">
					<div class="authorpicdiv left"><?php if ($author_slug!='') {?><a href="/team-member/<?php echo $author_slug;?>" title="<?php echo $getauthor_name;?>"><?php } ?><img class="authorpic" src="<?php echo $author_pic; ?>"><?php if ($author_slug!='') {?></a><?php } ?>
						<div class="authorname left"><?php echo $author_name; ?></div>
						<div class="authortitle left"><?php echo $author_title; ?></div>
						<?php if ($author_email!='') { ?><div class="authoremail left"><a href="?e=<?php echo $authoremailname;?>#contact" onClick="document.querySelector('.nav_button.contact').click();jQuery('#input_1_10').val('<?php echo $authoremailname;?>@ankrommoisan.com');return false;"><?php echo $author_email; ?></a></div><?php } ?>
						<?php if ($author_phone!='') { ?><div class="authorphone left"><a href="tel:<?php echo $authorphonetrim;?>" target=_blank" ><?php echo $author_phone; ?></a></div><?php } ?>
						<?php if ($author_linkedin!='') { ?><div class="authorlinkedin left"><a href="<?php echo $author_linkedin; ?>" target="_blank"><span class="dashicons dashicons-linkedin"></span></a></div><?php } ?>
						<?php if ($author_instagram!='') { ?><div class="authorinstagram left"><a href="<?php echo $author_instagram; ?>" target="_blank"><span class="dashicons dashicons-instagram"></span></a></div><?php } ?>
					</div>
					<div class="authorbio left"><?php echo $author_bio; ?></div>
					</div>
					<?php } ?>
				<?php } ?>			

				<?php ///////////////////////// END AUTHOR //////////////////////// ?>


				<?php ///////////////////////// IN THE NEWS //////////////////////// ?>
				<?php if ($module_type=='In The News') {	
							

	
					$inthenewscols = get_sub_field("module_repeater_inthenewscols");
					$inthenewspostsperpage = get_sub_field("module_repeater_inthenewspostsperpage");
					$inthenewsnumber = get_sub_field("module_repeater_inthenewsnumber");
					$inthenewsfilter = get_sub_field("module_repeater_inthenewsfilter");
					$inthenewscats = get_sub_field("module_repeater_inthenewscats");
					$inthenewstags = get_sub_field("module_repeater_inthenewstags");
					
				

					$inthenewslimit = 1000;
					if ($inthenewsnumber!='') {
						$inthenewslimit = $inthenewsnumber;
					}
					//echo "<!-- inthenewslimit: ".$inthenewslimit." -->";
						wp_reset_postdata ();



						$args_inthenews = array(
					    'post_type' => 'inthenews',
					    'post_status' => 'publish',
						 'offset' => 0,
						 'posts_per_page' => $inthenewslimit,
					     'orderby' => 'desc',
						); 

						$catslist = array();
						$tagslist = array();



						$arr_posts = new WP_Query( $args_inthenews ); 
						$count_arr_posts = $arr_posts->found_posts;
						if ( $arr_posts->have_posts() ) {
							while ( $arr_posts->have_posts() ) {
								$arr_posts->the_post(); 
								$post_id = get_the_ID();
								
								$cats = get_the_terms( $post_id, 'portfolio_category' );
								$tags = get_the_terms( $post_id, 'portfolio_tag' );

								foreach($cats as $cat) {
									if (!in_array($cat->name,$catslist)) {
										$catslist[] = $cat->name;
									}
								}

								foreach($tags as $tag) {
									if (!in_array($tag->name,$tagslist)) {
										$tagslist[] = $tag->name;
									}
								}

								//$catslist = array_merge($catslist,$cats);
								//$tagslist = array_merge($tagslist,$tags);
								//$catslist = $cats;
								//$tagslist = $tags;
							}
						}
						wp_reset_postdata ();

						sort($catslist);
						sort($tagslist);
						//$catslist = array_unique($catslist,SORT_STRING);
						//$tagslist = array_unique($tagslist,SORT_STRING);

						//echo "<!-- catslist:" . print_r($catslist,true) . "-->";
						//echo "<!-- tagslist:" . print_r($tagslist,true) . "-->";


					$postwidth = "30"; // default to 3
					if ($inthenewscols == 1) {
						$postwidth = "55";
					} elseif ($inthenewscols == 2) {
						$postwidth = "45";
					} elseif ($inthenewscols == 3) {
						$postwidth = "30";
					} elseif ($inthenewscols == 4) {
						$postwidth = "22";
					} elseif ($inthenewscols == 5) {
						$postwidth = "16";
					}
					




					?>		
				<div id="mobilesidenav" class="underline_link_wrap">
				</div>
				<div class="inthenews-section underline_link_wrap">
					<?php  
						$args_inthenews = array(
					    'post_type' => 'inthenews',
					    'post_status' => 'publish',
						 'offset' => 0,
						 'posts_per_page' => $inthenewslimit,
					     'orderby' => 'desc',
						); 



					 


						$arr_posts = new WP_Query( $args_inthenews ); 
						if ( $arr_posts->have_posts() ) {
							while ( $arr_posts->have_posts() ) {


								$arr_posts->the_post(); 
								$post_id = get_the_ID();
								$catsstr = "";
								$tagsstr = "";

								 $categories_str = '';

								$thiscats = get_the_terms( $post_id, 'portfolio_category' );
										foreach($thiscats as $thiscat){
									//$catsstr.=str_replace(".","-",$thiscat->name)." ";
									$catsstr.=preg_replace('/[^a-zA-Z0-9\']/','-',$thiscat->name)." ";
									//$catsstr.=filter_var($thiscat->name, FILTER_SANITIZE_STRING)." ";
									$categories_str.=$thiscat->name."<br>";
								}	
								$thistags = get_the_terms( $post_id, 'portfolio_tag' );
								foreach($thistags as $thistag){
									//$tagsstr.=str_replace(" ","-",$thistag->name)." ";
									$tagsstr.=preg_replace('/[^a-zA-Z0-9\']/','-',$thistag->name)." ";
									//$tagsstr.=filter_var($thistag->name, FILTER_SANITIZE_STRING)." ";

								}
								$newstitle = get_the_title();
								$newsthumb = get_the_post_thumbnail_url( get_the_ID(),'medium' );
								$newslink = get_field("news_link");
								

								?><div class="inthenews-post <?php echo $catsstr;?> <?php echo $tagsstr;?> ">
								  <div class="catsoverlay"><?php echo strtoupper($categories_str);?></div>
									<a href="<?php echo $newslink;?>" target="_blank"  class="posttitle">
										<div class="inthenews-thumb"><img src="<?php echo $newsthumb;?>" class="inthenews-thumbsrc"></div>
										<div class="inthenews-title"><h3><?php echo $newstitle;?></h3></div>
									</a>
								</div>
								<?php	

							}

						}
						wp_reset_postdata ();
				?>
				</div>
				<div id="filterpanel" class="underline_link_wrap">
				FILTER<br>
				<div class="divider"></div>
				<?php 
					if (($inthenewsfilter == "Categories") || ($inthenewsfilter == "Both")){
						echo '<div class="categoriesdiv">';
							echo '<a class="inthenewscats activebutton" id="Allcats">All</a>';
		
						if (!empty($catslist)){
							foreach($catslist as $cat){
								echo '<a class="inthenewscats" id="'.preg_replace('/[^a-zA-Z0-9\']/','-',$cat).'">'.$cat.'</a>';
							}
						}
						echo '</div>';
					}
					
					if (($inthenewsfilter == "Tags") || ($inthenewsfilter == "Both")){
						echo '<div class="tagsdiv">';
							echo '<a class="inthenewstags activebutton" id="Alltags">All Tags</a>';

						if (!empty($tagslist)){
							foreach($tagslist as $tag){
								echo '<a class="inthenewstags" id="'.preg_replace('/[^a-zA-Z0-9\']/','-',$tag).'">'.$tag.'</a>';
							}
						}
						echo '</div>';

					}


				?>
				</div> 


				<style>
					.inthenews-section{
						vertical-align: top;
						width: 76%;
						margin-left: 0px;
						margin-top: 20px;
						display: inline-block;
					}	
					#filterpanel{
						display: inline-block;
						width: 20%;
						vertical-align: top;
						margin-top: 20px;
					  margin-bottom: 20px;
						padding-left:20px;
					  font-size: 28px;
					  font-weight: 600;
					}
					.boldtag{
						font-weight:700;
					}
					.catsoverlay{
						position:absolute;
						margin-top: 20px;
						font-weight:600;
						font-size:12px;
						background-color:#33333388;
						padding:10px;
						color:#fff;
						margin-left:20px;
						width:220px;
						height:220px;
						z-index:10;
						pointer-events:none;
						line-height: 26px;
						visibility: hidden; /* start hidden until the right sizing is found. show with javascript */
						transition:.2s ease-in-out;
					}
					.inthenews-post{
						display:inline-block;
						width: <?php echo $postwidth;?>%;
						vertical-align:top;
						max-height:400px;
						margin: 0px 20px 80px 0px;
					}
					.inthenews-thumbsrc{
						background-color: #dddddd;
						margin: 0px 20px 20px 0px;
						padding:20px;
					}
					.inthenews-title{
						font-size:16px;
						font-weight:700;
						display:inline-block;
						min-height:300px;
					}
					.inthenews-thumb{
						width:100%;
					}
					.inthenews-thumbsrc{
						width:100%;
					}
					.inthenews-links{
						
					}
					.newsnav button{
						display:inline-block;
						font-size:30px;
						padding:10px 30px;
						color:#000;
					}
					.inthenewscats{
						font-size: 20px;
						font-weight: 500;
						display: block;
						padding: 0px 5px 0px 2px;
						width: 100%;
						cursor:pointer;
					}
					.inthenewstags{
						font-size: 20px;
						font-weight: 500;
						display: block;
						padding: 0px 5px 0px 2px;
						width: 100%;
						cursor:pointer;
					}
					.activebutton{
						font-weight:700;
					}
					.divider {
					    width: 100%;
					    height: 10px;
					    line-height: 10px;
					    border-top: 1px solid #333;
					    display: inline-block;
					}

					@media(max-width:767px){
						.inthenews-section{
							width:100%;
						}
						.inthenews-post{
							margin: 0px 20px 20px 0px;
						}
						#filterpanel{
							width:100%;
						}
						.inthenews-post{
							width: 100%;
						}
					}
				</style>
				<script>
				jQuery(function() {
				// filter function
					jQuery(".inthenewscats").click(function(){
						var thiscat = jQuery(this).attr("id");
						//thiscat = thiscat.split(" ").join("-");

						jQuery(".inthenewstags").removeClass("activebutton");
						jQuery(".inthenewscats").removeClass("activebutton");

						if (thiscat == 'Allcats') {
								jQuery(".inthenews-post").fadeIn();
							  jQuery("#Allcats").addClass("activebutton");

						} else {
							jQuery(".inthenews-post").hide();
							jQuery(".inthenews-post."+thiscat).fadeIn();
							jQuery(".inthenewscats#"+thiscat).addClass("activebutton");
							}
						return false;
					});
					jQuery(".inthenewstags").click(function(){
						var thistag = jQuery(this).attr("id");
						//thistag = thistag.split(" ").join("-");

							jQuery(".inthenewstags").removeClass("activebutton");
							jQuery(".inthenewscats").removeClass("activebutton");

						if (thistag == 'Alltags') {
							jQuery(".inthenews-post").fadeIn();
							jQuery("#Alltags").addClass("activebutton");

						} else {
				
							jQuery(".inthenews-post").hide();
							jQuery(".inthenews-post."+thistag).fadeIn();
							jQuery(".inthenewstags#"+thistag).addClass("activebutton");
									}
						return false;
					});
					var navposition = 0; // keep track of where the nav is
					var navhtml = '';

					// swap the desktop nav with the mobile nav based on screen width
					function swapnav(){
						var screensize= jQuery( window ).width();
						if(screensize<768){
							if (navposition==0) {
								navposition=1;
								navhtml = jQuery("#filterpanel").html();
								jQuery("#mobilesidenav").html(navhtml);
								jQuery("#filterpanel").html("");
								jQuery("#filterpanel").hide();
								jQuery("#mobilesidenav").show();
							}
						} else {
							if (navposition==1) {
								navposition=0;
								navhtml = jQuery("#mobilesidenav").html();
								jQuery("#filterpanel").html(navhtml);
								jQuery("#mobilesidenav").html("");
								jQuery("#mobilesidenav").hide();
								jQuery("#filterpanel").show();
							}
						
						}
					}
					swapnav();
					jQuery( window ).resize(function() {
						swapnav();
					});


					jQuery('a.posttitle').mouseover(function(){
						var closestoverlay = jQuery(this).closest('.inthenews-post').find('.catsoverlay');
						jQuery(closestoverlay).css('visibility','visible');
					});
					jQuery('a.posttitle').mouseout(function(){
						var closestoverlay = jQuery(this).closest('.inthenews-post').find('.catsoverlay');
						jQuery(closestoverlay).css('visibility','hidden');
					});
					
				});
				</script>
				<?php } ?>		
				<?php ///////////////////////// END IN THE NEWS //////////////////////// ?>


				<?php ///////////////////////// ANCHOR //////////////////////// ?>
				<?php if ($module_type=='Anchor') {	?>		
					<a id="<?php echo $anchorname; ?>"></a>
				<?php } ?>			

				<?php ///////////////////////// END ANCHOR //////////////////////// ?>

				<?php ///////////////////////// FONT HEADER //////////////////////// ?>
				<?php if ($module_type=='Font Header') {

				$fontfamily1 = str_replace(" ","+",$fontfamily);
	
				?>
				<style>
					@import url('https://fonts.googleapis.com/css2?family=<?php echo $fontfamily1;?>&display=swap');
					#module-<?php echo $thisid;?> {
						font-family: '<?php echo $fontfamily;?>';
						font-size: <?php echo $fontsize;?>;
						color: <?php echo $fontcolor;?>;
						}
					</style>	
				<?php if ($shortcontent!='') {?>
					<div class="shortcontent"><?php echo $shortcontent;?></div>
				<?php } ?>
				<?php } ?>			

				<?php ///////////////////////// END FONT HEADER //////////////////////// ?>



				<?php ///////////////////////// BUTTONS //////////////////////// ?>
				<?php if ($module_type=='Button') {	?>		
					<?php 
					$button_type =  get_sub_field('module_repeater_buttons_type');
					$button_style =  get_sub_field('module_repeater_buttonsstyle');
				
					$button_percent  = "22%";
					$buttons_per_row = get_sub_field('module_repeater_buttons_per_row');
					//echo $buttons_per_row . " buttons per row<br>";
					if ($buttons_per_row == '1') {
						$button_percent  = "100%";
					} elseif ($buttons_per_row == '2') {
						$button_percent  = "50%";
					} elseif ($buttons_per_row == '3') {
						$button_percent  = "33%";
					} elseif ($buttons_per_row == '4') {
						$button_percent  = "25%";
					} elseif ($buttons_per_row == '5') {
						$button_percent  = "20%";
					} elseif ($buttons_per_row == '6') {
						$button_percent  = "16%";
					}
					$thisbuttonnum = 0;
					if( have_rows('module_repeater_buttons') ){
							while( have_rows('module_repeater_buttons') ) { 
								the_row(); 
								$thisbuttonnum++;
								$buttontitle = get_sub_field('module_button_title');
								$buttontext = get_sub_field('module_button_text');
								$buttonlink = get_sub_field('module_button_link');
								$buttonlink_target = get_sub_field('module_button_link_target');
								$buttoncolor = get_sub_field('module_button_color');
								$buttonbgcolor = get_sub_field('module_button_bgcolor');
								$buttonimage = get_sub_field('module_button_image');
								$buttonpadding = '10px 10px 10px 10px';
								//$buttonpadding = '0px 30px 30px 30px';
								$buttonweight = '500';
								echo '<div class="modulebutton" style="width:'.$button_percent.';'.$button_style.'">';
								

								if ($button_type == 'simplebuttons') {
									if ($buttonlink!='') {
										echo '<a href="'.$buttonlink.'" target="'.$buttonlink_target.'">';
									}
								}
								
								if ($buttonimage!='') {
									echo '<div class="modulebuttontop"><img src="'. $buttonimage . '" class="buttonimg"></div>';
									echo '<div class="modulebuttoncaption">'.$buttontitle.'</div>';
								} elseif ($button_type == 'side') {
									echo '<div class="modulebuttontop buttonnum'.$thisbuttonnum.' side"  style="width:50%;vertical-align:top; font-weight:'.$buttonweight.';background-color:'.$buttonbgcolor.';color:'.$buttoncolor.';"><a href="">'. $buttontitle . '</a></div>';
									//////////// SIDE BUTTON FUNCTIONALITY //////////////////////////////////
									echo '<script>jQuery(".modulebuttontop.buttonnum'.$thisbuttonnum.'").on( "click", function() { jQuery(".sidebutton-content").hide();jQuery(".modulebutton-side.buttonnum'.$thisbuttonnum.' .sidebutton-content").slideToggle();jQuery(".modulebuttontop").removeClass("active");jQuery(".modulebuttontop.buttonnum'.$thisbuttonnum.'").addClass("active");return false;} );</script>';
								} else {
									echo '<div class="modulebuttontop" style="font-weight:'.$buttonweight.';background-color:'.$buttonbgcolor.';color:'.$buttoncolor.';">'. $buttontitle . '</div>';
								}

								if ($button_type == 'simplebuttons') {
									if ($buttonlink!='') {
										echo '</a>';
									}
								}
								
								
								if ($button_type == 'buttons') {
								
								echo '<div class="modulebuttonbottom">
		<div class="toggle_wrapper">
			<div class="project_story_content toggle_item_wrap">


				<div class="toggle_text three_lines">
	            	<span class="expando_icon"></span>
                </div>

				<div class="toggled_text three_lines"><div class="buttontext">
				'.$buttontext.'<li class="underline_link_wrap">';
				
				if ($buttonlink!='') {
					echo '<a href="'.$buttonlink.'" target="_blank">';				
					echo 'Learn more...';
					echo '</a>';
				}
				echo '</li></div></p>
				</div>

				<span class="three_dot"></span>

			</div>
		</div>								
								
								</div>';
								}


								if ($button_type == 'side') {
								
								echo '<div class="modulebutton-side buttonnum'.$thisbuttonnum.'"><div class="sidebutton-content">';
								echo $buttontext;

								echo '</div></div>';

								}

								if ($button_type == 'tabs') {
								
								echo '<div class="modulebuttonbottom">
		<div class="toggle_wrapper">
			<div class="project_story_content toggle_item_wrap">


				<div class="toggle_text three_lines">
	            	<span class="expando_icon"></span>
                </div>

				<div class="toggled_text three_lines tabs"><div class="buttontext">
				'.$buttontext.'<li class="underline_link_wrap">';
					if ($buttonlink!='') {
						echo '<a href="'.$buttonlink.'" target="_blank">';
						echo 'Learn more...';
						echo '</a>';
					}			
					echo '</li></div></p>
				</div>

				<!-- <span class="three_dot"></span> -->

			</div>
		</div>								
								
								</div>';
								}


						echo '</div>';


							}
					}
			    ?>

<?php 
		if ($button_type == 'tabs') {
			?>

		<div class="buttontabscontent" ></div>

<?php 	}  ?>



				<?php } ?>			

				<?php ///////////////////////// END BUTTONS //////////////////////// ?>




				<?php ///////////////////////// YOUTUBE //////////////////////// ?>
					<?php if ($module_type=='YouTube') {	?>		
						<?php if ($youtube_id!='') {	?>		
						<iframe class="youtubembed" src="https://www.youtube.com/embed/<?php echo $youtube_id;?>" title="<?php echo $title;?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
						<?php } ?>
				<?php if ($shortcontent!='') {?>
					<div class="shortcontent"><?php echo $shortcontent;?></div>
				<?php } ?>
					<?php } ?>			

				<?php ///////////////////////// END YOUTUBE //////////////////////// ?>

				<?php ///////////////////////// POST //////////////////////// ?>
				<?php if ($module_type=='Post') {	?>		
				<?php if ($postid!='') {	?>		
						
				<?php $postlink = get_permalink($postid); ?>
					<div class="post-thumb"><?php echo get_the_post_thumbnail( $postid, 'small'); ?></div>
					<div class="posttitlewrap">
						<div class="module-title-post"><?php echo $title;?></div>
					</div>					
						<?php 
							$postcontent = get_field('content',$postid);
							$postsubtitle = get_field('subtitle',$postid);
						?>

					<p class="two_col"><div class="datediv"><?php echo get_the_date( 'F j, Y', $postid );?></div>	



<div class="project_content_wrap">
  <div class="row d-lg-flex">
   <div class="col-md-10 col-sm-12">
     <div class="d-lg-block">
       
       <h4><a href="<?php echo $postlink;?>"><?php echo $postsubtitle; ?></a></h4>
     </div>
    </div>
   <div class="col-md-2 col-sm-12 arrow_wrap">
     <a href="<?php echo $postlink;?>">
      <div id="cta_arrow">
       <span class="arrow_right primera black"></span>
       <span class="arrow_right segunda black"></span>
      </div>
    </a>
  </div>
 </div>
</div>

<?php if ($postexpand=='yes') { ?>

		<div class="toggle_wrapper">
			<div class="project_story_content toggle_item_wrap">


				<div class="toggle_text three_lines">
	            	<span class="expando_icon"></span>
                </div>

				<div class="toggled_text three_lines">
				<?php echo $postcontent; ?></p>
				</div>

				<span class="three_dot">...</span>

			</div>
		</div>
<?php } ?>

<?php if ($postexpand=='no') { ?>
				<?php echo $postcontent; ?></p>
<?php } ?>

				<?php } ?>
				<?php } ?>	
				<?php ///////////////////////// END POST //////////////////////// ?>
				</div>
			</div>
		</div>
	<?php 
			
		}
	} ?>


</div>

<?php if ($page_title_font!=='') { 
	$page_title_font1 = str_replace(" ","+",$page_title_font);
	
	?>
   <style>
		@import url('https://fonts.googleapis.com/css2?family=<?php echo $page_title_font1;?>&display=swap');
		.page-title{
			font-family: '<?php echo $page_title_font;?>';
		}
		.hero_sector_wrapper .hero_title h1 {
			font-family: '<?php echo $page_title_font;?>' !important;
		}
	</style>

<?php } ?>


<style>

	.hero_sector_wrapper .hero_title  {
			max-width:1140px;
	}

	.container, .container-lg, .container-md, .container-sm, .container-xl {
		max-width:100%;
	}

	/* this helps with the combined style */
	.container.module-container {
		text-align:center;
	}
	p{
		text-align:left;
	}
	.d-lg-block {
		text-align: left;
	}

    #nav_seclet_wrapper.container{
		max-width:1140px;
    }
    #nav_output_wrapper .container{
		max-width:1140px;
    }
	#description{
		margin-top:40px;
	}

	.page-title{
		margin-top:20px;
		font-size:<?php echo $page_title_font_size; ?>;
	}
	.hero_sector_wrapper .hero_title h1 {
		font-size:<?php echo $page_title_font_size; ?> !important;
	}

	.module-container {
		margin-bottom:80px;
	}

	.module-subheader{
		font-size:22px;
		margin:30px 0px;
		max-width:1140px;
		margin: auto;
	}
	.module-title{
		font-size:20px;
		margin:0px 0px 20px;
	}

	.col-12 {
		padding-right:0;
		padding-left:0;
		text-align:left;
	}
	.col-12.full.button {
		max-width:1140px;
		margin:auto;
	}
	.postchevron{
		display:inline-block;
		margin-bottom: 25px;
		margin-left:20px;
		vertical-align: middle;
	}
	.posttitlewrap {
		display: inline-block;
		margin:0px;
		width:100%;
	}

	.shortcontent{
		margin-top:10px;
	}

	.module-title-post {
		display: inline-block;
	}
	.posttitlewrap {
		display:inline-block;
		font-size: 30px !important;
		font-family: 'GothamNarrow-Light' !important;
		color: #fff;
		text-shadow: black 2px 2px, black -2px -2px, black 2px -2px, black -2px 2px;
		text-shadow: black 1px 1px, black -1px -1px, black 1px -1px, black -1px 1px;
		text-shadow: black 2px 2px;
		margin-top: -60px;
		margin-left: 40px;
		z-index: 10;
		position: absolute;
	}

	.module-content{
		font-size:18px;
		margin:20px 0px;
		max-width:1140px;
		margin:auto;
	}


	/* add link treatment */
	.modulerow.fancylink a{
		text-decoration:none !important;
		color: #63B1BC !important;  /* #009ACE */
		display: inline-block;
		line-height: 24px;
	}

	.modulerow.fancylink a:after{
		content: ' ';
		animation: portSliderLine2 0.45s cubic-bezier(.15, .75, .5, 1) forwards;
		border-bottom: 2px solid #D7D2CB;
		-webkit-transition: -webkit-transform 0.4s cubic-bezier(0.23, 0.46, 0.4, 1);
		display: block;
		opacity: 0.8;
	}

	.modulerow.fancylink a:hover:after{
		animation: portSliderLine 0.45s cubic-bezier(.15, .75, .5, 1) forwards;
	}






	.content_wrapper {
		margin:0px 0px;		
	}
	.datediv {
		font-size: 12px;
		font-weight: 500;
		margin-top: 20px;
		text-transform: uppercase;
	}
	.subtitle {
		font-weight: 700;
		font-family: 'GothamNarrow-Book' !important;
		font-size: 28px !important;
		line-height: 1.3em !important;
		margin: 6px 0px 12px;
	}
	.post-thumb{
		/*float:left;*/
		margin:0px;
	}
	.post-thumb img{
		max-height:300px;
		width:100%;
		object-fit: cover;
	}
	.toggle_item_wrap {
	    overflow: auto;
		padding-bottom: 5px;
	}

	.toggle_wrapper .toggle_item_wrap.open .toggled_text {
		 max-height: none;
	}
	.three_lines.toggled_text {
		max-height: 30px;
		min-height: 30px;
	}
	.toggled_text.three_lines.tabs {
		margin-top:20px;
		position:absolute;
		width: 900px;
		left: 12px;

	}
	.toggled_text.three_lines.tabs .buttontext{
		background-color:#fff;
	}
	/* show all of content */
	.modulerow{
		/*border-top:1px solid #aaa;*/
		padding-top:50px;
		padding-bottom:20px;
		margin-top: 50px;
		
	}
	.toggled_text h4 {
		padding-top: 15px;
		padding-bottom: 15px;
	}
	.three_lines.toggle_text {
		margin-top: 0px;
		transition: all .7s ease-in;
	}

	.youtubembed {
		width:100%;
		height:500px;
	}
	.modulebutton{
		display:inline-block;
		padding:10px;
		margin:0px 0px 20px 0px;
		vertical-align: top;
		/*text-align: center;*/
	}
	.modulebuttontop{
		display:inline-block;
		padding:20px 20px;
		width:100%;
		background-color:#dddddd;
		/* min-height: 60px; */
	}
	.modulebuttontop a{
		font-size:22px;
		font-weight:500;
	}
	.modulebuttontop.active a{
		font-weight:bold;
	}
	/* side module buttons size */
	.modulebuttontop.side a p {
		font-size: x-large;
	}
	.modulebuttontop p { 
	/*	text-align: left; */
	}
	.modulebutton-side{
			width:50%;
			display:inline-block;
			font-size:24px;
	}
	.sidebutton-content {
		display:none;
		position: absolute;
		top: 0;
	}
	.modulebutton-side.buttonnum1 .sidebutton-content{
		/*	display:block; */ /*  Side Button Content - Default to Hide */
	}
	.modulebuttonbottom{
		display:inline-block;
		padding: 0px;
		width: 100%;
		margin-top: 20px;
	}
	.modulebuttonbottom p {
	/*	text-align: left; */
	}
	.modulebuttoncaption{
		font-weight:600;
		margin-top:10px;
	}
	.modulebuttoncaption p{
		line-height:1.3em;
	}
	.buttontext{
		display:none;
		transition:.5s ease-in-out;
	}
	img.buttonimg {
		width: 100%;
	}
	.project_story_content.toggle_item_wrap.open .buttontext {
		display:block;
	}
	.toggle_item_wrap {
		margin-top: 0px;
		padding-bottom: 15px;
	}
	.underline_link_wrap{
		font-weight:700;
	}
	.buttontabscontent{
		width:100%;
		padding:30px;
	}

	img.size-thumbnail {
		width: 120px;
		height: 120px;
		object-fit: cover;
		border-radius: 50%;
	}

		/* blog posts */
		.project_content_wrap {
			margin: 18px 0px;
		}
		.three_lines.toggle_text {
		   margin-top:10px;
		   margin-bottom:10px;
		}
		#cta_arrow {
		    margin-top: 3px;
		}

	.pdfspacer{
		height:16px;
	}




/* FEATURED STYLES */


		.container.project_content_wrap.featuredheadertext {
			position: absolute;
			bottom: 0px;
			margin: 0px;
			z-index: 900;
			background: #00000080;
			max-width:none;
			color: #fff;
			padding: 40px;
		}


		.featureheadertextinner{
			margin:auto;
			max-width:1140px;
			width:100%;
		}

		
	.featuretextinnercol {
		padding-right: 0px;
		padding-left: 0px;
		flex: auto;
		max-width: 100%;
	}

	.featuredSectionImage {
		min-height: 400px;
		background-position: center center;
		background-size: cover;
		z-index: 1;
	}



		.featured-link {
			display: inline-block;
			width: 45%;
		}

		.featured-link-section {
				display: inline-block;
				vertical-align: middle;
		}

		.featuredarrow {
			max-width: none;
			display: inline-block;
			margin-left: 20px;
			height: 26px;
		}

		#cta_arrow.featured-cta-arrow{
			width:200px;
			margin-top: 8px;
		}

		h1.shimmer.bold.uppercase {
			height: 40px;
			display: inline-block;
		}
		h2.shimmer.featured {
			height: 40px;
		}
		h3.shimmer.bold.uppercase a {
			line-height: 20px;
			margin-top: 10px;
			display: inline-block;
		}

		.featuredsection {
			margin-top:0px;
			margin-bottom:120px;
			position: relative;
		}

		.col-md-4.featured {
			flex: none;
			display: inherit;
			margin-right: 100px;
		}

		.container.project_content_wrap.featuredtext {
			z-index: 900;
			background: #00000080;
			max-width: none;
			color: #fff;
			padding: 20px 10%;
			bottom: 0px;
			position: absolute;
			margin: 0px;
		}

		.featuredcontent{
			max-width:1140px;
			margin:auto;
		}

		.featuredarrow{
			max-width: none;
		}


		@media(max-width:992px) {
			.featured-link {
				width:90%;
				margin-top: 20px;
			}
			.container.project_content_wrap.featuredtext {
					margin-top: -280px;
			}
			.featuretextinnercol {
				margin-bottom:10px;
			}
		}

		@media screen and (max-width: 992px) {
			.featuredarrow.arrow_wrap a,.featuredarrow.arrow_wrap section {
				margin-top: 0px;
				margin-bottom: 0px !important;
			}
		}


		@media(max-width:700px) {
			.col-md-4.featured {
				
			 }
		}



/* END FEATURED */



	@media(max-width:1200px) {
		.module-container {
			width: 80%;
		}
	}

	@media(max-width:992px) {
		#hero{
			width: 100%;
			height: 200px;
			background-position: left;
			object-fit:contain;
		}
		.post-thumb img{
			height:100px;
		}
		.hero_sector_wrapper .hero_title h1 {
		  padding-left: 32px;
		  font-size: 40px !important;
		}
		.arrow_wrap a, .arrow_wrap section {
		    margin-top: 0;
		  margin-bottom: 0 !important;
		}
		.posttitlewrap {
			font-size: 18px !important;
			margin-top: -64px;
			margin-left: 22px;
			width: 80%;
			line-height: 20px;
		}

		p, .p {
			line-height: 1.6em;
			white-space: normal;
		}		
		.youtubembed {
			width:100%;
			height:300px;
		}
		.modulerow {
			padding-top: 20px;
			padding-bottom: 20px;
			margin-top: 0px;
		}
		.modulebutton{
			width:90% !important;
			max-width:400px;
			margin-bottom:20px;
			height: auto !important;
		}
	}


footer .container {
    max-width: 1140px;
}

/* //////////////// COVERFLOW /////////////////// */
/* source https://swiperjs.com/demos/240-effect-coverflow/core */

    .swiper-container.swiper-coverflow {
      width: 100%;
      padding-top: 10px;
      padding-bottom: 10px;

	  padding:10px;
	  margin-left: -50px;
	  border: 50px solid #fff; /* this covers the background */
    }

	.container.project_stories .swiper-container.swiper-coverflow {
	  height: 560px;
	}
	@media(max-width:992px) {
		.swiper-container.swiper-coverflow {
			border: 0px; /* this covers the background */
			margin-left: 0px;
		}
	}

	.project_stories .swiper-container.swiper-coverflow:before {
		background:none;
	}

	.project_stories .swiper-coverflow  .slider_controls {
		bottom: 90px;
	}

    .swiper-coverflow  .swiper-slide {
      background-position: center;
      background-size: cover;
      width: auto;
      height: 360px;
    }

	.swiper-coverflow .swiper-slide.swiper-slide-visible.swiper-slide-active {
		 scale: 1.5;
		 margin-left: -60px; /* this makes the left and right sides equal */
		 margin-top:-30px;
	}
	.swiper-coverflow .swiper-slide.swiper-slide-visible.swiper-slide-active img {
		height:auto;
		transition: 0.5s ease-in-out;
		/*margin-top: 26%; *//*  this horizontally aligns instead of top align */

	}
	.swiper-coverflow  .swiper-slide img {
      display: block;
  
	  width: 400px !important;
	  height:100%;

	  opacity: 1;
	  margin-top: 24%; /*  this horizontally aligns instead of top align */
      object-fit: inherit !important;
	  object-position: inherit !important;
      box-shadow:5px 5px 7px #333;
    }
	.swiper-coverflow .swiper-slide.swiper-slide-visible.swiper-slide-active img:hover {
		transform: scale(<?php echo $carouselzoomvalue ;?>);  
		margin-top: 28%; /*  this horizontally aligns instead of top align */
	}

	.swiper-coverflow img:hover .caption {
	    bottom: 0px;
	}
	.swiper-coverflow .caption {
	    bottom: 6px;
	}

 	.swiper-coverflow .swiper-slide:before {
		background:none;
	}
	.swiper-coverflow .swiper-slide:after {
		background:none;
	}

	.swiper-coverflow .swiper-slide a {
		width: auto;
		height: 100%;
		border-right: 0px;
		border:0px;
	}

	.swiper-container.swiper-coverflow {
		background: #fff;
	}
   .swiper-container.swiper-coverflow .swiper-slide {
		background: #fff;
	}

/* //////////////// END COVERFLOW /////////////////// */

/* ///////// AUTHOR /////////////////// */
.authordiv{
  text-align:left;
}
.authordiv.center{
    text-align:center;
}
.authorname{
	font-size: 16px;
	line-height:22px;
	font-weight:700;
	margin-top:12px;
}
.authortitle, .authoremail, .authorphone{
	font-size: 16px;
    line-height:24px;
	font-weight:500;
}
.authorinstagram, .authorlinkedin{
	display:inline-block;
	margin-right:10px;
	font-size:40px;
	line-height: 30px;
}


span.dashicons.dashicons-instagram {
    color: #fff;
    background: #fd3b49;
	transition:0.2s;
}
span.dashicons.dashicons-instagram:hover {
    background: #fff;
    color: #fd3b49;
}
span.dashicons.dashicons-linkedin {
    color: #fff;
    background: #0a66c2;
	transition:0.2s;
}
span.dashicons.dashicons-linkedin:hover {
    background: #fff;
    color: #0a66c2;
}

.authorbio {
	font-weight:500;
}

.authorbio.center{
    padding: 0px 30px;
}
.authorbio p{
	font-size: 16px;
	/* line-height:22px; */
	font-weight:500;
}
.authorbio.right{
	text-align:left;
}
.authorbio.left{
     text-align:left;
}
.authorpic {
	height:140px;
	width:140px;
	border-radius:50%;
	object-fit:cover;
}
.authorpicdiv {
	display:inline-block;
}
.authorpicdiv.right{
	float:right;
	margin-left:20px;
}
.authorpicdiv.left{
	float:left;
	margin-right:20px;
}
.authorpicdiv.center{
	float:none;
	margin:auto;
}
.authorbio center{
	text-align:center;
}

/* contact wrapper */

div#contact-wrapper {
    max-width: 1140px;
}

/* combine 2 or more sections together - such as for authors */
.combined{
	width:300px;
    display: inline-block;
    padding: 20px;
    vertical-align: top;
    float: none;
	margin:auto;
}

@media(max-width:992px) {
	.authordiv{
		text-align:center;
	}
	.authorbio{
		width:100%;
		display:inline-block;
		margin-top:14px;
	}
	.authorbio.left, .authorbio.right{
		text-align:left;
	}
	.authorpicdiv, .authorpicdiv.right, .authorpicdiv.left, .authorpicdiv.center {
		text-align:center;
		float:none;
		margin:auto;
		display:inline-block;
	}
	.authorname{
		text-align:center;
		float:none;
	}
	.authortitle{
		text-align:center;
		float:none;
	}
}


</style>

	<!-- Swiper JS -->
	<script src="<?php echo get_stylesheet_directory_uri();?>/swiper/swiper-bundle.min.js"></script>
	<!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
	<!-- <script src= "<?php echo get_stylesheet_directory_uri();?>/js/fslightbox.js"></script> -->
	<?php /// https://fslightbox.com/javascript/documentation/how-to-use#through-javascript  ?>

<!-- Initialize Swiper -->
	<script>

window.addEventListener('DOMContentLoaded', (event) => {


/* only apply this to the original swiper */

	var swipe_original = new Swiper('.swiper-original', {
    	slidesPerView: 'auto',
//     	slidesPerView: 1,
    	centeredSlides: true,
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


    var swiper_coverflow = new Swiper(".swiper-coverflow", {
		effect: "coverflow",
		loop: true,
		centeredSlides: true,
		slidesPerView: "3",
		simulateTouch: true,
		coverflowEffect: {
			rotate: 0,
			stretch: 0,
			depth: 0,
			modifier: 1,
			slideShadows: false,
		},
    	navigation: {
    	    nextEl: '.swiper-button-next',
    	    prevEl: '.swiper-button-prev',
    	},
		<?php if ($carouselautplay!='') { ?>
		autoplay: {
			delay: <?php echo $carouselautplay;?>,
		},
		<?php } ?>
    });







});

	</script>

<?php $title = get_the_title();

?>
	<script>
	/* //// BREADCRUMBS ///// */
		jQuery(function() {
	<?php if ($page_breadcrumb!='') { ?>
			jQuery(".breadcrumbs-discipline").html('<a href="/<?php echo $page_breadcrumb;?>"><?php echo $page_breadcrumb;?></a>');
	<?php } ?>
	<?php if ($page_breadcrumbs_level==2) { ?>
			jQuery(".breadcrumbs-sector").html("&nbsp;|&nbsp;<?php echo $title;?>");
	<?php } ?>
		});
	</script>

<?php get_footer(); ?>
