<?php

/* Template Name: Projects Template 2024
   Template Post Type: portfolio_project
*/
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Ankrom_Moisan
 */

while (have_rows('fetch_data')) {
  the_row();
  $project_id = get_sub_field('project_id');
  $hide_open_asset_albums = get_field('hide_open_asset_albums');
}

// GET THE PROJECT VIA PHP

include 'functions_openassets.php';

if ($project_id != '') {
  $OA_albums = getOpenAssetsAlbums($project_id);
}

get_header();

//echo "<!-- OA_albums: ".print_r($OA_albums,true)." -->";
?>
<style>
.slider_title {
    visibility: hidden;
	content:'&nbsp;';
}
.project_top_content h1.title{
	font-size:34px !important;
	margin-bottom:12px !important;
}
</style>

<?php
$currenturl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY); // which discipline is being called?
echo '<!-- current:' . $currenturl . '  query:' . $query . '  -->';
$currentstr = '';
if ($query == '') {
  //$currentstr = 'current';
}

$projecttitle = get_the_title();

//$firstdiscipline = ''; // get the first discipline with content - for the default button (no query)

// see which disciplines have content
while (have_rows('top_project_content')) {
  the_row();
  $topprojecttitle = get_sub_field('project_subtitle');
  $topprojectcontent = get_sub_field('project_content');
}
while (have_rows('architecture_project_content')) {
  the_row();
  $topprojecttitle_arch = get_sub_field('project_subtitle');
  $topprojectcontent_arch = get_sub_field('project_content');
  if ($topprojectcontent_arch != '') {
    if ($query == '') {
      $query = 'architecture';
    }
  }
}
while (have_rows('interior_project_content')) {
  the_row();
  $topprojecttitle_interiors = get_sub_field('project_subtitle');
  $topprojectcontent_interiors = get_sub_field('project_content');
  if ($topprojectcontent_interiors != '') {
    if ($query == '') {
      $query = 'interiors';
    }
  }
}
while (have_rows('planning_project_content')) {
  the_row();
  $topprojecttitle_planning = get_sub_field('project_subtitle');
  $topprojectcontent_planning = get_sub_field('project_content');
  if ($topprojectcontent_planning != '') {
    if ($query == '') {
      $query = 'planning';
    }
  }
}
while (have_rows('brand_project_content')) {
  the_row();
  $topprojecttitle_brand = get_sub_field('project_subtitle');
  $topprojectcontent_brand = get_sub_field('project_content');
  if ($topprojectcontent_brand != '') {
    if ($query == '') {
      $query = 'brand';
    }
  }
}
while (have_rows('design_project_content')) {
  the_row();
  $topprojecttitle_design = get_sub_field('project_subtitle');
  $topprojectcontent_design = get_sub_field('project_content');
  if ($topprojectcontent_design != '') {
    if ($query == '') {
      $query = 'design';
    }
  }
}
while (have_rows('process_project_content')) {
  the_row();
  $topprojecttitle_process = get_sub_field('project_subtitle');
  $topprojectcontent_process = get_sub_field('project_content');
  if ($topprojectcontent_process != '') {
    if ($query == '') {
      $query = 'process';
    }
  }
}
while (have_rows('ffe_project_content')) {
  the_row();
  $topprojecttitle_ffe = get_sub_field('project_subtitle');
  $topprojectcontent_ffe = get_sub_field('project_content');
  if ($topprojectcontent_ffe != '') {
    if ($query == '') {
      $query = 'ffe';
    }
  }
}

//echo '<!-- current2:'.$currenturl.'  query2:'.$query.'  -->';

$countdisciplines = 1; // count the disciplines. Start at 1

$overviewlink =
  '<a href="' .
  $currenturl .
  '" class="discipline-link ' .
  $currentstr .
  '">Overview</a>';
//$archlink = '<a href="'.$currenturl.'" class="discipline-link '.$currentstr.'">Architecture</a>'; // default architecture to overview. If has architecture then will be replaced below
$archlink = ''; //
$interiorslink = '';
$planninglink = '';
$brandlink = '';
$designlink = '';
$processlink = '';
$ffelink = '';

$showdiscipline = 'architecture'; // default to architecture

///////////////////////// ARCHITECTURE ////////////////////////////
while (have_rows('architecture_project_content')) {
  the_row();
  $topprojecttitle_arch = get_sub_field('project_subtitle');
  $topprojectcontent_arch = get_sub_field('project_content');
  $currentstr = '';
  // if no content yet then use this
  //	if ((strstr($_SERVER['REQUEST_URI'], 'architecture') == true ) || (($query=='') && ($firstdiscipline == 'architecture'))) {
  if ($query == 'architecture') {
    $topprojecttitle = $topprojecttitle_arch;
    $topprojectcontent = $topprojectcontent_arch;
    $currentstr = 'current';
    $showdiscipline = 'architecture';
  }
  if ($topprojecttitle_arch == '') {
    // hide architecture button if no Architecture title
    $archlink = '';
  } elseif ($topprojecttitle_arch == ' ') {
    $archlink =
      '<a href="" class="discipline-link disabledbutton">Architecture</a>';
  } else {
    $archlink =
      '<a href="' .
      $currenturl .
      '?architecture" class="discipline-link ' .
      $currentstr .
      '">Architecture</a>';
    //$showdiscipline = "architecture";
  }
  $countdisciplines++;
}

///////////////////////// INTERIORS ////////////////////////////
while (have_rows('interior_project_content')) {
  the_row();
  $topprojecttitle_interiors = get_sub_field('project_subtitle');
  $topprojectcontent_interiors = get_sub_field('project_content');
  $currentstr = '';
  // if no content yet then use this
  //if ((strstr($_SERVER['REQUEST_URI'], 'interiors') == true ) || (($query=='') && ($firstdiscipline == 'interiors'))){
  if ($query == 'interiors') {
    $topprojecttitle = $topprojecttitle_interiors;
    $topprojectcontent = $topprojectcontent_interiors;
    $currentstr = 'current';
    $showdiscipline = 'interiors';
  }
  if ($topprojecttitle_interiors != '') {
    if ($topprojecttitle_interiors == ' ') {
      $interiorslink =
        '<a href="" class="discipline-link disabledbutton">Interiors</a>';
    } else {
      $interiorslink =
        '<a href="' .
        $currenturl .
        '?interiors" class="discipline-link ' .
        $currentstr .
        '">Interiors</a>';
    }
    $countdisciplines++;
  }
}

///////////////////////// PLANNING ////////////////////////////
while (have_rows('planning_project_content')) {
  the_row();
  $topprojecttitle_planning = get_sub_field('project_subtitle');
  $topprojectcontent_planning = get_sub_field('project_content');
  $currentstr = '';
  // if no content yet then use this
  //if ((strstr($_SERVER['REQUEST_URI'], 'planning') == true ) || (($query=='') && ($firstdiscipline == 'planning'))) {
  if ($query == 'planning') {
    $topprojecttitle = $topprojecttitle_planning;
    $topprojectcontent = $topprojectcontent_planning;
    $currentstr = 'current';
    $showdiscipline = 'planning';
  }
  if ($topprojecttitle_planning != '') {
    if ($topprojecttitle_planning == ' ') {
      $planninglink =
        '<a href="" class="discipline-link disabledbutton">Planning</a>';
    } else {
      $planninglink =
        '<a href="' .
        $currenturl .
        '?planning" class="discipline-link ' .
        $currentstr .
        '">Planning</a>';
    }

    $countdisciplines++;
  }
}

//echo '<!-- current3:'.$currenturl.'  query3:'.$query.'  -->';

///////////////////////// BRAND ////////////////////////////
while (have_rows('brand_project_content')) {
  the_row();
  $topprojecttitle_brand = get_sub_field('project_subtitle');
  $topprojectcontent_brand = get_sub_field('project_content');
  $currentstr = '';
  // if no content yet then use this
  //if ((strstr($_SERVER['REQUEST_URI'], 'brand') == true )  || (($query=='') && ($firstdiscipline == 'brand'))) {
  if ($query == 'brand') {
    $topprojecttitle = $topprojecttitle_brand;
    $topprojectcontent = $topprojectcontent_brand;
    $currentstr = 'current';
    $showdiscipline = 'brand';
  }
  if ($topprojecttitle_brand != '') {
    if ($topprojecttitle_brand == ' ') {
      $brandlink =
        '<a href="" class="discipline-link disabledbutton">Brand</a>';
    } else {
      $brandlink =
        '<a href="' .
        $currenturl .
        '?brand" class="discipline-link ' .
        $currentstr .
        '">Brand</a>';
    }

    $countdisciplines++;
  }
}

///////////////////////// DESIGN ////////////////////////////
while (have_rows('design_project_content')) {
  the_row();
  $topprojecttitle_design = get_sub_field('project_subtitle');
  $topprojectcontent_design = get_sub_field('project_content');
  $currentstr = '';
  // if no content yet then use this
  //if ((strstr($_SERVER['REQUEST_URI'], 'design') == true )  || (($query=='') && ($firstdiscipline == 'design'))){
  if ($query == 'design') {
    $topprojecttitle = $topprojecttitle_design;
    $topprojectcontent = $topprojectcontent_design;
    $currentstr = 'current';
    $showdiscipline = 'design';
  }
  if ($topprojecttitle_design != '') {
    if ($topprojecttitle_design == ' ') {
      $designlink =
        '<a href="" class="discipline-link disabledbutton">Design</a>';
    } else {
      $designlink =
        '<a href="' .
        $currenturl .
        '?design" class="discipline-link ' .
        $currentstr .
        '">Design</a>';
    }

    $countdisciplines++;
  }
}

///////////////////////// PROCESS ////////////////////////////
while (have_rows('process_project_content')) {
  the_row();
  $topprojecttitle_process = get_sub_field('project_subtitle');
  $topprojectcontent_process = get_sub_field('project_content');
  $currentstr = '';
  // if no content yet then use this
  //if ((strstr($_SERVER['REQUEST_URI'], 'process') == true )  || (($query=='') && ($firstdiscipline == 'process'))){
  if ($query == 'process') {
    $topprojecttitle = $topprojecttitle_process;
    $topprojectcontent = $topprojectcontent_process;
    $currentstr = 'current';
    $showdiscipline = 'process';
  }
  if ($topprojecttitle_process != '') {
    if ($topprojecttitle_process == ' ') {
      $processlink =
        '<a href="" class="discipline-link disabledbutton">Process</a>';
    } else {
      $processlink =
        '<a href="' .
        $currenturl .
        '?process" class="discipline-link ' .
        $currentstr .
        '">Process</a>';
    }

    $countdisciplines++;
  }
}

///////////////////////// FFE ////////////////////////////
while (have_rows('ffe_project_content')) {
  the_row();
  $topprojecttitle_ffe = get_sub_field('project_subtitle');
  $topprojectcontent_ffe = get_sub_field('project_content');
  $currentstr = '';
  // if no content yet then use this
  //if ((strstr($_SERVER['REQUEST_URI'], 'ffe') == true ) || (($query=='') && ($firstdiscipline == 'ffe'))){
  if ($query == 'ffe') {
    $topprojecttitle = $topprojecttitle_ffe;
    $topprojectcontent = $topprojectcontent_ffe;
    $currentstr = 'current';
    $showdiscipline = 'ffe';
  }
  if ($topprojecttitle_ffe != '') {
    if ($topprojecttitle_ffe == ' ') {
      $ffelink = '<a href="" class="discipline-link disabledbutton">FF&E</a>';
    } else {
      $ffelink =
        '<a href="' .
        $currenturl .
        '?ffe" class="discipline-link ' .
        $currentstr .
        '">FF&E</a>';
    }

    $countdisciplines++;
  }
}
?>



<?php
$albumvariation = ' 2024';
include 'projects_overview_slider_openasset_disciplines.php';
?>
<div class="fullwidth container max-w-[1400px]">
	<div class="fullwidthcontent ">
		<h1 class="title"><?php echo $projecttitle; ?></h1>

<?php /////////////// DISCIPLINES LINKS /////////////////////

//if ($countdisciplines>1) {
if (true) { ?>
<div class="discipline-links">
<!-- <div class="similar_projects_title_wrap disciplines">
		<h3>DISCIPLINES</h3>
</div> -->
<div class="discipline-links-buttons">
<?php
//echo $overviewlink;
echo $archlink;
echo $interiorslink;
echo $planninglink;
echo $brandlink;
echo $designlink;
echo $processlink;
echo $ffelink;
?>
	</div>
</div>
<?php }
// if ($countdisciplines>1)
/////////////// END DISCIPLINES LINKS /////////////////////
?>

	</div>
</div>


<div class="project_top_content container max-w-[1400px]">
	<div class="row">

		<div class="col-md-12 col-lg-7 toggle_wrapper">

				<h2><?php echo $topprojecttitle; ?></h2>

				<div class="toggle_item_wrap open">

				<?php
/////////////////// OVERVIEW STORY ///////////////////
?>
				<div class="toggled_text three_lines">
					<p><?php echo $topprojectcontent; ?></p>
				</div>
				<span class="three_dot">...</span>
				<!-- <div class="toggle_text three_lines">
					<span class="expando_icon"></span>
                </div> -->

			</div>


			<?php
//$project_title = $post->post_title;
?>


		</div>
		<div class="col-lg-1 col-md-12"></div>
		<div class="col-lg-4 col-md-12 toggle_wrapper project_sidebar">
			<?php if (have_rows('project_sidebar')) { ?>
			<?php while (have_rows('project_sidebar')) {

     the_row();
     $projectcity = get_sub_field('city');
     $projectstate = get_sub_field('state');
     $projectcompleted = get_sub_field('completed');
     $projectstatus = get_sub_field('project_status');
     $projectunits = get_sub_field('units');
     $projectstories = get_sub_field('stories');
     $projectsqft = get_sub_field('sq_ft');
     $projectacreage = get_sub_field('acreage');
     $projectmarket = get_sub_field('market');
     ?>
			<h5><?php
   if ($projectcity) {
     echo $projectcity; ?>, <?php
   }
   if ($projectstate) {
     echo $projectstate;
   }
   ?></h5>
					<ul>
				<?php
    //remove_filter('acf_the_content', 'wpautop');
    $certified = get_sub_field('certified'); // false, false
    //add_filter('acf_the_content', 'wpautop');
    // https://support.advancedcustomfields.com/forums/topic/removing-paragraph-tags-from-wysiwyg-fields/

    if ($certified != '') { ?>
									<li><?php echo $certified; ?></li>
				<?php }
    ?>
				<?php if ($projectunits) { ?><li><?php echo $projectunits; ?></li><?php } ?>
				<?php if ($projectstories) { ?><li><?php echo $projectstories; ?> <?php if (
   $projectstories >= 2
 ) { ?>stories<?php } else { ?>story<?php } ?></li><?php } ?>
				<?php if (
      $projectsqft
    ) { ?><li><?php echo $projectsqft; ?> sq. ft.</li><?php } ?>
				<?php if ($projectacreage) { ?><li><?php echo $projectacreage; ?></li><?php } ?>
				<?php if ($projectcompleted) { ?>
					<li>Completed in <?php echo $projectcompleted; ?></li>
				<?php } ?>
				<?php if ($projectstatus) { ?>
					<li><?php echo $projectstatus; ?></li>
				<?php } ?>

				<?php
    $awards = get_sub_field('awards');
    if ($awards != '') { ?>
								<h5 class="awards">AWARD WINNER</h5>
				<?php }
    ?>
			</ul>

			<div class="toggle_item_wrap open">
				<!-- <div class="toggle_text">
					<span class="expando_icon"></span>
                </div> -->
                <div class="toggled_text">
							<?php if ($awards != '') { ?>
									<p><?php echo $awards; ?></p>
							<?php } ?>

					<?php if (have_rows('project_types')) { ?>
					<?php while (have_rows('project_types')) {

       the_row();
       $projecttypeeone = get_sub_field('type_one');
       $projecttypetwo = get_sub_field('type_two');
       $projecttypethree = get_sub_field('type_three');
       $projecttypefour = get_sub_field('type_four');
       $projecttypefive = get_sub_field('type_five');
       ?>
					<?php if ($projecttypeeone) { ?>
					<h5>PROGRAM</h5>
					<p><?php if ($projecttypeeone) {
       echo $projecttypeeone;
     } ?>
					<?php if ($projecttypetwo) { ?>, <?php echo $projecttypetwo;} ?>
					<?php if ($projecttypethree) { ?>, <?php echo $projecttypethree;} ?>
					<?php if ($projecttypefour) { ?>, <?php echo $projecttypefour;} ?>
					<?php if ($projecttypefive) { ?>, <?php echo $projecttypefive;} ?></p>
					<?php } ?>
					<?php
     }
       // end of the loop.
       ?>
					<?php }
     // if( get_field('project_types') ){
     ?>

					<?php if (have_rows('project_contacts')) { ?>
					<?php while (have_rows('project_contacts')) {

       the_row();
       $projectarchitecture = get_sub_field('architecture');
       $projectinteriors = get_sub_field('interiors');
       $projectplanning = get_sub_field('planning');
       $projectbrand = get_sub_field('brand');
       $projectprinciple = get_sub_field('principle');
       ?>
					<?php if (
       $projectarchitecture ||
       $projectinteriors ||
       $projectplanning ||
       $projectbrand ||
       $projectprinciple
     ) { ?>
					<h5>PROJECT CONTACT</h5>
					<?php if ($projectarchitecture) { ?>
					<p>Architecture: <?php echo $projectarchitecture; ?></p>
					<?php } ?>
					<?php if ($projectinteriors) { ?>
					<p>Interiors: <?php echo $projectinteriors; ?></p>
					<?php } ?>
					<?php if ($projectplanning) { ?>
					<p>Planning: <?php echo $projectplanning; ?></p>
					<?php } ?>
					<?php if ($projectbrand) { ?>
					<p>Brand: <?php echo $projectbrand; ?></p>
					<?php } ?>
					<?php if ($projectprinciple) { ?>
					<p><a class="underline_link" href="mailto:<?php echo $projectprinciple; ?>"><?php echo $projectprinciple; ?></a></p>
					<?php } ?>
					<?php } ?>
					<?php
     }
       // end of the loop.
       ?>
					<?php }
     // if( get_field('project_contacts') ){
     ?>


				</div>


			</div>
			<?php
   }
     // end of the loop.
     ?>
			<?php }
// if( get_field('project_sidebar') ){
?>

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


<div class="sectors"></div>




<!-- Explore More Projects -->
<?php
// include 'template-parts/explore-projects-grid.php';
?>


<!-- Explore Cross Markets -->
<?php
// include 'template-parts/explore-cross-markets.php';
?>



	<!-- Swiper JS -->
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/swiper/swiper-bundle.min.js"></script>
	<!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
	<script src= "<?php echo get_stylesheet_directory_uri(); ?>/js/fslightbox.js"></script>
	<?php
/// https://fslightbox.com/javascript/documentation/how-to-use#through-javascript
?>

	<!-- Initialize Swiper -->
	<script>

window.addEventListener('DOMContentLoaded', (event) => {


	var swipertop = new Swiper('.swiper-container.top_project_slider', {
    	slidesPerView: 1,
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

	.fullwidth{
		width:100%;
		text-align:center;
	}

	.fullwidthcontent{
		width:100%;
		text-align:left;
		display:inline-block;
    padding-top: 25px;
	}

	.container.swiper-container {
		max-width: 1400px;
	}

  /* .container.swiper-container a {
    width: 100%;
	}

  .container.swiper-container a {
    width: 100%;
	} */
	.container.project_top_content {
		max-width: 1400px;
		padding-top:0px;
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
	.container.slider_controls_title_wrap {
		margin: 0px 0px;
    max-width: 1400px;
	}

	.toggle_item_wrap {
	    padding-bottom: 5px;
	}

	h5.awards{
		margin-top:30px;
	}
	.project_sidebar h5 {
    font-weight: 700;
		padding-bottom: 4px;
	}


	.discipline-links{
		width: 100%;
		padding: 0px;
		text-align: left;
		display: inline-block;
		margin: 10px auto 10px;
		/* background: #f4f2f0;*/
	}

	.discipline-links-buttons {
		max-width: 1400px;
		width:100%;
		margin:auto;
		background:transparent;
	}

	.discipline-link {
		padding: 0px 0px 10px 0px;
		color:#212529 !important;
		/* color:#35332f !important;*/
		font-size:16px;
		margin-right:20px;
		display:inline-block;
		margin-top:0px;
		text-align:left;
		border:1px solid #666699;
		border-radius:10px;
		padding:10px;
	}


	a.disabledbutton {
		pointer-events: none;
		opacity:0.5;
	}

	.discipline-link:last-of-type {
		margin-right:0px;
	}

	.discipline-link:hover {
		/* border-bottom:14px solid #5e7975;*/
		background-color:#e2e2e2 !important;
		color:#212529 !important;
	}
	.discipline-link.current {
		background-color:#e2e2e2 !important;
		/* border-bottom:14px solid #5e7975;*/
		color:#212529 !important;
	}
	.discipline-link.current:hover {
		/* border-bottom:14px solid #63b1bc; */
		background-color:#e2e2e2 !important;
		color:#212529 !important;
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
		.fullwidthcontent{
			max-width: 1200px;
		}
		.container.swiper-container {
			max-width: 1200px;
		}

		.container.project_stories {
			max-width: 1200px;
		}
		.discipline-links-buttons {
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
			padding-bottom: 0px;
		}
	}




	</style>

<?php get_footer();
