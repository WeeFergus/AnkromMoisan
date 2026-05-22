<?php
/**
 * Template Name: Team Page
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header(); ?>

<?php 

	

	if(strstr($_SERVER['REQUEST_URI'], 'oregon') == true): 
		$officeText = 'Portland based';
		$officePhone = '(503) 245-7100';
	elseif(strstr($_SERVER['REQUEST_URI'], 'washington') == true):
		$officeText = 'Seattle based';
		$officePhone = '(206) 576-1600';
	elseif(strstr($_SERVER['REQUEST_URI'], 'california') == true):
		$officeText = 'San Francisco based';
		$officePhone = '(415) 252-7063';
	else:
		$officeText = '';
		$officePhone = '(503) 245-7100';
	endif;
	
	if(strstr($_SERVER['REQUEST_URI'], 'executive') == true):
		$disciplineText = 'Firm Leadership';
	elseif(strstr($_SERVER['REQUEST_URI'], 'architecture-leadership') == true):
		$disciplineText = 'Architecture Leadership';
	elseif(strstr($_SERVER['REQUEST_URI'], 'interiors-leadership') == true):
		$disciplineText = 'Interiors Leadership';
	elseif(strstr($_SERVER['REQUEST_URI'], 'architecture') == true): 
		$disciplineText = 'Architecture';
	elseif(strstr($_SERVER['REQUEST_URI'], 'interiors') == true):
		$disciplineText = 'Interiors';
	elseif(strstr($_SERVER['REQUEST_URI'], 'planning') == true):
		$disciplineText = 'Planning';
	elseif(strstr($_SERVER['REQUEST_URI'], 'brand') == true):
		$disciplineText = 'Brand';
	elseif(strstr($_SERVER['REQUEST_URI'], 'business-services') == true):
		$disciplineText = 'Business Services';
	elseif(strstr($_SERVER['REQUEST_URI'], 'operational-excellence') == true):
		$disciplineText = 'Operational Excellence';
	elseif(strstr($_SERVER['REQUEST_URI'], 'our-team/leadership') == true): 
		$disciplineText = 'Firm Leadership';
	elseif(strstr($_SERVER['REQUEST_URI'], 'our-team') == true): 
		$disciplineText = '';
	else:
		$disciplineText = '';
	endif;
?>


<div class="container no_slider_top_text_wrap">
	<div class="row">
		<div class="col-12 our-team-top">

<?php /*  Our Team Sub menu idea
			<div id="team-mobile">
			< ? php wp_nav_menu( array(
				'menu' => 72,
				'items_wrap' => '<ul class="team_nav">%3$s</ul>',
			) );? >
			</div>
*/ ?>

			<h1><bold>Meet our <?php echo $officeText; ?> <?php echo $disciplineText; ?> Team.</bold></h1>
			
			<?php if(strstr($_SERVER['REQUEST_URI'], 'housing') == true || strstr($_SERVER['REQUEST_URI'], 'office') == true || strstr($_SERVER['REQUEST_URI'], 'senior-communities') == true || strstr($_SERVER['REQUEST_URI'], 'healthcare') == true || strstr($_SERVER['REQUEST_URI'], 'higher-education') == true  || strstr($_SERVER['REQUEST_URI'], 'hospitality') == true  || strstr($_SERVER['REQUEST_URI'], 'retail') == true  || strstr($_SERVER['REQUEST_URI'], 'community') == true ): ?>
				<?php  
				 $term = get_field('team_category_select'); 
					//var_dump($term);
				?>
			    <h5><bold><?php echo $post->post_title; ?></bold></h5>
			<?php endif; ?>
			<p>If you'd like to talk to us, call <?php echo $officePhone; ?></p>
		</div>
	</div>
</div>

	
<!-- Grid Project -->
<?php 
	if(strstr($_SERVER['REQUEST_URI'], 'oregon') == true): 
		$locationCategory = '+Portland';
	elseif(strstr($_SERVER['REQUEST_URI'], 'washington') == true):
		$locationCategory = '+Seattle';	
	elseif(strstr($_SERVER['REQUEST_URI'], 'california') == true): 
		$locationCategory = '+San Francisco';
	else:
		$locationCategory = '';
	endif; 
	 
	if(strstr($_SERVER['REQUEST_URI'], 'architecture') == true): 
		$disciplineCategory = '+Architecture';
	elseif(strstr($_SERVER['REQUEST_URI'], 'interiors') == true): 
		$disciplineCategory = '+Interiors';
	elseif(strstr($_SERVER['REQUEST_URI'], 'planning') == true): 
		$disciplineCategory = '+Planning';
	elseif(strstr($_SERVER['REQUEST_URI'], 'brand') == true):
		$disciplineCategory = '+Brand';
	else:
		$disciplineCategory = '';
	endif;
	
	if(strstr($_SERVER['REQUEST_URI'], 'housing') == true): 
		$sectorCategory = '+Housing';
	elseif(strstr($_SERVER['REQUEST_URI'], 'office') == true): 
		$sectorCategory = '+Office';
	elseif(strstr($_SERVER['REQUEST_URI'], 'senior-communities') == true): 
		$sectorCategory = '+Senior Communities';
	elseif(strstr($_SERVER['REQUEST_URI'], 'healthcare') == true):
		$sectorCategory = '+Healthcare';
	elseif(strstr($_SERVER['REQUEST_URI'], 'higher-education') == true): 
		$sectorCategory = '+Higher Education';
	elseif(strstr($_SERVER['REQUEST_URI'], 'hospitality') == true): 
		$sectorCategory = '+Hospitality';
	elseif(strstr($_SERVER['REQUEST_URI'], 'retail') == true): 
		$sectorCategory = '+Retail';
	elseif(strstr($_SERVER['REQUEST_URI'], 'community') == true):
		$sectorCategory = '+Community';
	else:
		$sectorCategory = '';
	endif;
	
	$currentCategory = $post->post_title;
	
	$pagediscipline = get_field('team_discipline_select'); 

	/*				
	if(get_field('team_category_select')){
		$args = array(
    	'post_type' => 'team_project',
    	'post_status' => 'publish',
    	'team_category' => '' . $currentCategory . '' . $locationCategory . '' . $disciplineCategory . '' . $sectorCategory . '',
    	'offset' => 0,
    	'orderby' => 'title',
    	'order'   => 'ASC',
    	'posts_per_page' => 250,
    	); 
    }else{
		$args = array(
    	'post_type' => 'team_project',
    	'post_status' => 'publish',
    	'offset' => 0,
    	'orderby' => 'title',
    	'order'   => 'ASC',
    	'posts_per_page' => 250,
    	); 
    }
*/

// if there is a team_discipline_select then look for a discipline LIKE that - DW
//echo "<!-- pagediscipline: ".$pagediscipline." -->";
	if ($pagediscipline != ''){


			if ($pagediscipline == 'Firm Services') {
		
		// Operational Excellence should appear on Firm Services query
			$args = array( 
			  'offset' => 0,
    		'orderby' => 'title',
    		'order'   => 'ASC',
    		'posts_per_page' => 250,
			  'post_type' => 'team_project',
    		'post_status' => 'publish',
				'meta_query' => array(
					'relation' => 'OR',
					'query1' => array(
					'key'     => 'team_member_discipline',
					'value'   => "Operational Excellence",
					'compare' => 'LIKE',
					),
					'query2' =>  array(
					'key'     => 'team_member_discipline',
					'value'   => "Firm Services",
					'compare' => 'LIKE',
					),
					) 
			);

				$args1 = array(
    		'post_type' => 'team_project',
    		'post_status' => 'publish',
				'meta_key'     => 'team_member_discipline',
				'meta_value'   => "Operational Excellence",
				'meta_compare' => 'LIKE',
    		'offset' => 0,
    		'orderby' => 'title',
    		'order'   => 'ASC',
    		'posts_per_page' => 250,
    		); 

 
 //echo "<!-- pagediscipline: Firm Services or Operational Excellence -->";

			} else {
				$args = array(
    		'post_type' => 'team_project',
    		'post_status' => 'publish',
				'meta_key'     => 'team_member_discipline',
				'meta_value'   => $pagediscipline,
				'meta_compare' => 'LIKE',
    		'offset' => 0,
    		'orderby' => 'title',
    		'order'   => 'ASC',
    		'posts_per_page' => 250,
    		); 

			}

    } else {
		$args = array(
    	'post_type' => 'team_project',
    	'post_status' => 'publish',
    	'offset' => 0,
    	'orderby' => 'title',
    	'order'   => 'ASC',
    	'posts_per_page' => 250,
    	); 
    }

//echo "<!-- args:".print_r($args,true)."-->";

$arr_posts = new WP_Query( $args ); 

//echo "<!-- lastquery:".$arr_posts->request."-->";

?>



<div class="container team_member_grid">
	<div class="row">
		<?php if ( $arr_posts->have_posts() ) : while ( $arr_posts->have_posts() ) : $arr_posts->the_post(); ?>


<?php

// same logic as on wp-content\plugins\custom-content-team-master\admin\class-updates.php
						$discipline = get_field('team_member_discipline');
						$title =  get_field('team_member_title');
						$accreditation =  get_field('team_member_accreditation');
						$role =  get_field('team_member_role');  
						//$role = ''; // $role =  get_field('team_member_role');   // remove role - 2023-04-13

						// Leadership use role instead of title  - 2024-10-17 DW
						if (strpos(strtolower($discipline),"leadership")!==false) {
							$title = $role;
						}

						$showonsite = $title; // keep track of what will show on the site for preview. Actual logic will go on template


						if ((stripos($discipline, 'Architecture') !== FALSE) || (stripos($discipline, 'Interiors') !== FALSE) || (stripos($discipline, 'Planning') !== FALSE)) {
									// do nothing
						} else if ((stripos($discipline, 'Brand') !== FALSE) || (stripos($discipline, 'Firm Services') !== FALSE)  || (stripos($discipline, 'Operational Excellence') !== FALSE)) {
									// check for close matches between role and title
									$brstr = "<br>";
									if ($showonsite=='') {$brstr = ""; }
									//if (($role!='') && (stripos($role, $title) === FALSE)    ) { $showonsite.=$brstr.$role;}
						}


						$brstr = "<br>";
						if ($showonsite=='') {$brstr = ""; }
						if ($accreditation!='') { $showonsite.=$brstr.$accreditation;}

						$team_member_name = get_field('team_member_name');
						$name_div = str_replace(" ","_",$team_member_name);
						$name_div = str_replace("(","",$name_div);
						$name_div = str_replace(")","",$name_div);
						$name_div = str_replace("'","",$name_div);
						$name_div = strtolower($name_div);

						$memberslug =  ucwords( strtolower($team_member_name));
						$memberslug =  str_replace(" ","-",$memberslug);
						$memberslug =  str_replace("'","",$memberslug);

?>

<?php $thisheadshot = get_field('top_page_slidershow_slide_one_image'); ?>

		<div class="col-sm-12 col-md-4 col-lg-3 person-container">
			<div class="center-cropped-employee">
				<?php if ($thisheadshot) { ?>
				<!-- <img id="<?php echo $name_div;?>" class="employee-image" src="<?php echo $thisheadshot; ?>" data-headshot="<?php echo $thisheadshot; ?>"> -->
				<a href="/team-member/<?php echo $memberslug;?>"><img id="<?php echo $name_div;?>" class="employee-image" src="<?php echo $thisheadshot; ?>" data-headshot="<?php echo $thisheadshot; ?>"></a> 
				<?php } ?>
				<!-- <div class="shimmer tumb_img"></div> -->
				<!-- <h3><?php echo $team_member_name; ?></h3> -->
				<a href="/team-member/<?php echo $memberslug;?>"><h3><?php echo $team_member_name; ?></h3></a>
				<p class="people_status"><?php echo $showonsite;?></p>
			</div>

			<!-- <?php if(get_field('team_member_office')): ?>
			<p class="small_text"><?php echo the_field('team_member_office'); ?> Office</p>
			<?php endif; ?> -->
		</div>
		<?php endwhile; endif; ?>
	</div>



<div id="selfies">
<?php

	// get the selfies album
	$album_id = 5645; // selfies album
	include get_template_directory() . "/functions_openassets_album.php";
	$OA_album = getOpenAssetsAlbumsByID($album_id,'',false);
	$files = $OA_album['files'];

	foreach ($files as $file) {
		//echo "<br<br>a:" . $file['webview'];
		$thisfilename = $file['original_filename'];
		$thisname	= str_replace("_SQ_Selfie.jpg","", $thisfilename);
		$thisname	= str_replace("_SQ_Selfie.jpeg","", $thisname);
		$thisname	= str_replace("_SQ_Selfie.png","", $thisname);
		$thisname	= str_replace("_Selfie.png","", $thisname);
		$thisname	= str_replace("_SQ_Selfie 2.jpg","", $thisname);
		$thisname	= str_replace("'","", $thisname);
		$thisname = strtolower($thisname);

		// new method - use the caption
		$caption = $file['caption'];
		$caption_formatted = strtolower($caption);
		$thisname = str_replace(" ","_",$caption_formatted);
		$thisname = str_replace("(","",$thisname);
		$thisname = str_replace(")","",$thisname);
		$thisname = str_replace("'","",$thisname);


		echo '<div class="albumpicdiv"><img  id="selfie-'.$thisname.'" src="' .$file['webview']. '" class="albumpicimg" ></div>';
	}

?>
<style>
.employee-image{
	transition:all 0.5s ease;
}

.center-cropped-employee{
		background-size:contain;
		background-position:center;
		transition:all 0.5s ease;
}

.albumpicdiv {
	display: inline-block;
	margin:10px;
}

.albumpicimg{
		width:200px;
		height:auto;
}

#selfies{
	display:none;
}

</style>
<script>
jQuery(function() {
  jQuery(".employee-image").mouseover(function() {
    var thisid = jQuery( this ).attr("id");
		var selfieid = "#selfie-" + thisid;
		var selfiesrc = jQuery(selfieid).attr("src");
		
		if (selfiesrc) {
			jQuery( this ).attr("src",selfiesrc);

			//jQuery( this ).parent().css("background-image","url(" + selfiesrc + ")");
			//jQuery(this).css("opacity",0);
		}

		//console.log("thisid:" + thisid);
		//console.log("selfieid:" + selfieid);
		//console.log("selfiesrc:" + selfiesrc);

    //jQuery("").attr("src",
  })

	 jQuery(".employee-image").mouseout(function() {
    var originalsrc = jQuery( this).data("headshot");
		
		if (originalsrc) {
			jQuery( this ).attr("src",originalsrc);

			//jQuery(this).css("opacity",1);

		}

  })
});

</script>

</div>
</div>

<?php get_footer(); ?>
