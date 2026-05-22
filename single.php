<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Ankrom_Moisan
 */

//////////////////////////////// GET THE FILTER //////////////////////////////
$filterslug  = '';

if(isset($_GET['filter'])){
	$filterslug = sanitize_text_field($_GET['filter']);
}
//$filtername = sanitize_text_field($_GET['filtername']);

$modnum = 15; // group by 15s

get_header();

$thistemplatefile =  get_page_template_slug();

$explorebeyondhome = false;

include get_stylesheet_directory()."/explore-beyond-style.php";

?>

<?php 
// customize hero position of blog
$hero_pos = get_field("hero_pos");
$hero_pos_tablet = get_field("hero_pos_tablet");
$hero_pos_mobile = get_field("hero_pos_mobile");


if ($hero_pos=='') {$hero_pos = strtolower($hero_pos);}
if ($hero_pos_tablet=='') {$hero_pos_tablet = strtolower($hero_pos_tablet);}
if ($hero_pos_mobile=='') {$hero_pos_mobile = strtolower($hero_pos_mobile);}
?>

	<script>
	var articlesingle = true;  
	var filternameobject = new Object(); // this keeps track of filternames for each filter slug
	var filterbgimgobject = new Object(); // this keeps track of bg images for each filter slug
	var filtercolorbgobject = new Object(); // this keeps track of background colors for each filter slug
	var filtercolorfgobject = new Object(); // this keeps track of foreground colors for each filter slug
	var filterslug = '<?php echo $filterslug;?>';
	</script>


<?php 
// customize hero position of blog

// hack to change top to margin-top if top is the first element - fixes positioning
if (substr($hero_pos,0,3)=='top'){
		$hero_pos = str_replace("top:","margin-top:",$hero_pos);
}
if ($hero_pos!='') {
		echo '<style>@media(min-width:1401px) {#herohome .post-thumbnail.customstyle img {' . $hero_pos . '}}</style>';
}

// hack to change top to margin-top if top is the first element - fixes positioning
if (substr($hero_pos_tablet,0,3)=='top'){
		$hero_pos_tablet = str_replace("top:","margin-top:",$hero_pos_tablet);
}
if ($hero_pos_tablet!='') {
    echo PHP_EOL;
		echo '<style>@media(max-width:1400px) {#herohome .post-thumbnail.customstyle img {' . $hero_pos_tablet . '}}</style>';
}
// hack to change top to margin-top if top is the first element - fixes positioning
if (substr($hero_pos_mobile,0,3)=='top'){
		$hero_pos_mobile = str_replace("top:","margin-top:",$hero_pos_mobile);
}
if ($hero_pos_mobile!='') {
    echo PHP_EOL;
		echo '<style>@media(max-width:700px) {#herohome .post-thumbnail.customstyle img {' . $hero_pos_mobile . '}}</style>';
}

// adjust vertical position of title if its long
$posttitle  = html_entity_decode( get_the_title(), ENT_XML1, 'UTF-8' );
$posttitlelength = mb_strlen( $posttitle, 'utf-8' );
// https://wordpress.stackexchange.com/questions/145730/how-to-count-the-length-of-a-post-title
    echo PHP_EOL;
		//echo '/* posttitlelength: '.$posttitlelength.' */';
if ($posttitlelength > 25) {
    echo PHP_EOL;
		echo '<style>h1.entry-title {font-size: 40px !important;margin-top: -70px;}</style>';
		echo PHP_EOL;
		echo '<style>@media(max-width:700px) {h1.entry-title {margin-top: -104px;font-size: 22px !important; line-height:26px !important;}}</style>';
}
?>

<?php

if ($thistemplatefile == 'template-explorebeyond-single.php') {
	$explorebeyondhome = true;
	?>
	<script>
	   articlesingle = false;
	</script>
<?php 
} else { 
					// get the categories for this post so they can be added to breadcrumbs
					// https://developer.wordpress.org/reference/functions/wp_get_post_categories/
					$blog_categories = get_the_terms( get_the_ID(), 'blog_category' );
					$cats = array();
					$catsstr = '';
					$i = 0;
					if (!empty($blog_categories)) {
						foreach($blog_categories as $cat){
							$cats[] = $cat->slug;
							if ($i == 0) {
								$catsstr.='&nbsp;|&nbsp;<a href="/explore-beyond/'.$cat->slug.'">'.ucwords(strtolower($cat->name)).'</a>';
							} else {
								$catsstr.='&nbsp;+&nbsp;<a href="/explore-beyond/'.$cat->slug.'">'.ucwords(strtolower($cat->name)).'</a>';
							}
							$i++;
						}
					}
				?>
				<script>
					jQuery(function() {
						var articlesingle = true;
						<?php if ($catsstr!='') { ?>
							jQuery(".breadcrumbs-sector").html('<?php echo $catsstr;?>');
						<?php }	?>
					});

				</script>
				<?php 	include dirname(__FILE__)."/functions_openassets_employees.php"; ?>
<?php	} ?>



	<main id="primary" class="site-main">
	<div id="herohome">
		<?php
		while ( have_posts() ) :
			the_post();
			$thumbsrc =  get_the_post_thumbnail_url( get_the_ID(),'full' );
			$photo_credit = trim(get_field("photo_credit"));
			if ($photo_credit!='') {
				$photo_credit = "&copy; ".$photo_credit;
			}
		?>
		<!--<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>-->
			<?php //ankrom_moisan_post_thumbnail(); ?>

			<div class="post-thumbnail customstyle" id="heroimage">
				<?php //the_post_thumbnail(); ?>
				<img  id="heroimageimg" src="<?php echo $thumbsrc;?>"> <!-- width="1500" height="1125" -->

			</div>
			<div class="photo_credit3">
					<p><?php echo $photo_credit;?></p>
			</div>
			<style>
				.photo_credit3{
				    width: 100%;
				    height: 100px;
				    background: linear-gradient(0deg, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0) 100%);
				    transition: all .3s ease-in-out;
					margin-top: -100px;
					position: absolute;
					z-index: 10;
				}			

				.photo_credit3 p {
				    font-size: 9px;
				    line-height: 1.3em;
				    color: #fff;
				    font-family: 'GothamNarrow-Medium' !important;
				    text-transform: uppercase;
					position: absolute;
					bottom: 10px;
					right: 120px;
				}
				@media(max-width:700px){
					.photo_credit3 p {
						bottom: 4px;
						right: 10%;
					}
				}

			</style>


				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<!-- </article> -->
		<?php 
		endwhile; // End of the loop.
		?>
</div>

<div id="blogcontent">




		<?php
		if (!$explorebeyondhome) {
		while ( have_posts() ) :
			the_post();

///////////////////////  CONTENT /////////////////////
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php

		$post_date = get_the_date( 'F j, Y' ); 
		//echo '<div id="datediv">' . $post_date . '</div>';
		echo '<div id="articlecontent"><div id="datediv">' . $post_date . '</div><div id="subtitle">' . get_field("subtitle") . '</div>' . get_field("content");

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

		echo '<div class="authorsdiv">';
		 		
		while( have_rows('authors') ) { the_row();

			$author_openassetid = '';
			$getauthor_name = '';
			$author_slug = '';

	        $openassetid = get_sub_field('open_asset_id');
			$author_teammember  = get_sub_field('author_teammember');
	        $author_name = get_sub_field('author_name');
	        $author_title = get_sub_field('author_title');
	        $author_pic = get_sub_field('author_pic');
			echo '<!-- author_pic:'.$author_pic.' -->';
	        $author_email = get_sub_field('author_email');
	        $author_phone = get_sub_field('author_phone');
	        $author_instagram = get_sub_field('author_instagram');
	        $author_linkedin = get_sub_field('author_linkedin');
			$author_bio  = get_sub_field('author_bio','',false);
			//get_field($selector, [$post_id = false], [$format_value = true], [$escape_html = false]);


			// get the OpenAsset Id for this author
			if ($author_teammember!='') {
				$author_openassetid = get_field('fetch_data_project_id', $author_teammember);
				$getauthor_name = get_field('team_member_name', $author_teammember);
				$author_slug =  ucwords( strtolower($getauthor_name));
				$author_slug =  str_replace(" ","-",$author_slug);
				echo '<!-- author_openassetid:'.$author_openassetid.' -->';
				echo '<!-- author_name :'.$author_name.' -->';
				echo '<!-- author_slug :'.$author_slug.' -->';
			}


			// GET Open Assets Info if ID given
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
					if ($author_pic=='') {$author_pic = $oapic1URL;}
					if ($author_name=='') {$author_name = $oaemployee_name;}
					if ($author_title=='') {$author_title = $oarole;}
					if ($author_instagram=='') {$author_instagram = $oainstagram;}
					if ($author_linkedin=='') {$author_linkedin = $oalinkedin;}
					if ($author_bio=='') {$author_bio = $oabio;}
					if ($author_email=='') {$author_email = $oaemail;$authoremailname = str_replace("@ankrommoisan.com","",$author_email);}
					if ($author_phone=='') {$author_phone = $oawork_phone;$authorphonetrim = trim($authorphone);}
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

			echo '<div class="author-div">';
			if ($author_slug!='') { echo '<a href="/team-member/'.$author_slug.'" title="'.$getauthor_name.'" >'; }
			if ($author_pic!='') {
				echo '<img class="author-pic-img" src="'.$author_pic.'">';
			}
			if ($author_slug!='') { echo '</a>';  }

			if ($author_name!='') { 
				echo '<div class="author-name">'.$author_name.'</div>';
			}
			if ($author_title!='') { 
				echo '<div class="author-title">'.$author_title.'</div>';
			}
			if ($author_email!='') { 
				echo '<div class="authoremail center">';
				echo '<a href="?e='.$authoremailname.'#contact" onClick="document.querySelector(\'.nav_button.contact\').click();jQuery(\'#input_1_10\').val(\''.$authoremailname.'@ankrommoisan.com\');return false;">';
				echo $author_email.'</a></div>';
			}
			if ($author_phone!='') { 
				echo '<div class="authorphone center"><a href="tel:'.$author_phonetrim.' target=_blank" >'.$author_phone.'</a></div>'; 
			}
			if ($author_linkedin!='') { 
				echo '<div class="authorlinkedin center"><a href="'.$author_linkedin.'" target="_blank"><span class="dashicons dashicons-linkedin"></span></a></div>'; 
			} 
			if ($author_instagram!='') { 
				echo '<div class="authorinstagram center"><a href="'.$author_instagram.'" target="_blank"><span class="dashicons dashicons-instagram"></span></a></div>'; 
			}
			if ($author_bio!='')  { 
				echo '<div class="authorbio center">'.$author_bio.'</div>'; 
			}
			echo '</div>';
		}	
		
		echo '</div>';

		$author_width = get_field("author_width"); 

		$byline = get_field("byline"); 
		if ($byline!='') {
			echo '<div class="byline">'.$byline.'</div>';
		}

		$author_widthvalue = '200px';
		if ($author_width!='') {
			$author_widthvalue = $author_width;
		}
		
		echo '<style>
			.authorsdiv{
				width:100%;
				text-align:left;
			}
			.author-div{
				width:'.$author_widthvalue.';
				text-align:center;
				display:inline-block;
				margin:5px;
			}
			@media(max-width:1000px){
				.authorsdiv{
				  text-align:center;
				}
			}
			@media(max-width:600px){
				.author-div{
				 width:100%;
				}
			}
			.author-name {
				font-weight:700;
			}
			.author-title {
				
			}
			.author-pic{
				
			}
			.author-pic-img{
				border-radius:50%;
				height:140px !important;
				width:140px !important;
				object-fit: cover;
			}
			.byline{
				margin-top:20px;	
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
			.authorbio{
			    padding: 0px 30px;
				font-weight:500;
			}
			.authorbio p{
				font-size: 16px;
				/* line-height:22px; */
				font-weight:500;
			}
		</style>';

		echo '</div>';


		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //ankrom_moisan_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article>
<?php 
////////////////////// END CONTENT ///////////////////////


/*
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'ankrom-moisan' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'ankrom-moisan' ) . '</span> <span class="nav-title">%title</span>',
				)
			);
*/

		endwhile; // End of the loop.

		} // end if !explorebeyondhome

		?>
<?php //////////////////////////////////////  THUMBS SECTION /////////////////////////// ?>

<div id="mobilesidenav" class="underline_link_wrap"></div>

<?php ////////////////////// MOBILE SEARCH //////////////////// ?>

<div id="mobilesearchpanel" style="display:none;">
			<div class="divider"></div>
					<div class="paneltitle">SEARCH</div>
			<!-- <p><input id="searchbox" placeholder="" type="text"><button id="searchbutton" style="display:none;"><span class="dashicons dashicons-search"></span></button></p> -->
			<div><p><?php echo do_shortcode('[wd_asp elements="search,results" ratio="100%,100%" id=3]'); ?></p></div>
			<div class="divider"></div>


</div>

<div id="showfiltering" ></div>
		<?php
					// Define our WP Query Parameters
					$the_query = new WP_Query( 'posts_per_page=140' ); 
					//get the posts count
					$querycount = $the_query->post_count ;
					// Start our WP Query
					$i =-1;
					$modi = 0;
					while ($the_query -> have_posts()) : $the_query -> the_post();

						// Get the taxonomy's terms


						$thisid = get_the_ID(); // get the id of the post



					$i++;
					$modi = floor($i / $modnum); // modnum items at a time
					
					// These are the Posts. Display the Post Title with Hyperlink
					?>
					<div class="articlediv mod<?php echo $modi;?> 
					<?php

					$categories_str = '';

					
$terms = get_the_terms( $thisid, 'blog_category' );
					
$terms2 = get_terms(
    array(
        'taxonomy'   => 'blog_category',
        'hide_empty' => true,
    )
);
// Check if any term exists
if ( ! empty( $terms ) && is_array( $terms ) ) {
    // add categories for each post
    foreach ( $terms as $term ) { 
        echo $term->slug." "; 
				$categories_str.=$term->name."<br>";
    }
}

$content = get_field("content");
 
$shortexcerpt = substr($content, 0, 150);
$shortexcerptstr = substr($shortexcerpt, 0, strrpos($shortexcerpt, ' '));
$shortexcerptstr = strip_tags($shortexcerptstr)."...";

$shortexcerptmobile = substr($content, 0, 75);
$shortexcerptmobilestr = substr($shortexcerptmobile, 0, strrpos($shortexcerptmobile, ' '));
$shortexcerptmobilestr = strip_tags($shortexcerptmobilestr)."...";

$thisthumbsrc =  get_the_post_thumbnail_url( $thisid,'medium' );
/* use custom thumb? */
$customthumb = get_field("custom_thumb");  
$customthumbsrc = '';
if ($customthumb['sizes']['medium']) {
 $customthumbsrc = $customthumb['sizes']['medium'];
}
if ($customthumbsrc!='') {
	$thisthumbsrc=$customthumbsrc;
} 

$thisthumbid = $thisid;

$thumbpos = get_field("thumb_pos");
$thumbpostablet = get_field("thumb_pos_tablet");
$thumbposmobile = get_field("thumb_pos_mobile");
$thisthumbstyle = ''; // custom style for thumbs - if entered
if (($thumbpos != '') || ($thumbpostablet != '')  || ($thumbposmobile != '')) {
		$thisthumbstyle =  PHP_EOL.'<style>';
		$thisthumbstyle.= '#thumb-' .$thisthumbid.' {'.$thumbpos.'}';
		$thisthumbstyle.= '@media(max-width:1400px) {#thumb-' .$thisthumbid.' {'.$thumbpostablet.'}}';
		$thisthumbstyle.= '@media(max-width:700px) {#thumb-' .$thisthumbid.' {'.$thumbposmobile.'}}';
		$thisthumbstyle.= '</style>'.PHP_EOL;
}




					?>">  
					<div class="catsoverlay"><?php echo strtoupper($categories_str);?></div>
					<a href="<?php the_permalink() ?>" class="posttitle">	
					<div class="post-thumbnail" id="thumb-<?php echo $thisthumbid;?>" style="background-image:url('<?php echo $thisthumbsrc;?>');<?php /* echo $thisthumb; */?>">
					</div>
					<?php echo $thisthumbstyle;?>
					<?php // ankrom_moisan_post_thumbnail(); ?>
					<div class="articledate"><?php echo get_the_date( 'F j, Y' ) ?></div>
					<div class="articletitle"><?php echo get_the_title(); ?></div>        					
					</a>
					<div class="articleexcerpt"><?php echo $shortexcerptstr; ?></div>
					<div class="articleexcerptmobile"><?php echo $shortexcerptmobilestr; ?></div>
					</div><!-- end articlediv -->
					<?php
					// Repeat the process and reset once it hits the limit
					endwhile;
					wp_reset_postdata();
					?>		
				 <div id="seemoreposts"><a href="" id="seemore">SEE MORE POSTS</a></div>
				 <div id="seemoreposts-cat"><a href="" id="seemore-cat">SEE MORE POSTS</a></div>

</div><!-- end leftsidediv -->



<?php 
$explorebeyondslug = 'explore-beyond';
$explorebeyondimg =  get_the_post_thumbnail_url(  get_page_by_path($explorebeyondslug),'large' );
?>



<script>

var blogmod = 0;
var catmod = 1; // set this back to 0 to limit posts for filters other than all
var modnum = <?php echo $modnum; ?>;
var currentfilter = ''; // keep track of current filter
var thisfontweight = '';

/////////////// OLD WAY - HARDCODED  //////////////////
var explorebeyondheroimg = 'https://dev-ama2020.pantheonsite.io/wp-content/uploads/2021/04/161211_N22_medium.jpg';
var explorebeyondtitle = 'Explore Beyond';

//////////// DYNAMICALLY GET HERO IMAGE FROM EXPLORE BEYOND PAGE FEATURED IMAGE  /////////////////

var explorebeyondheroimg = '<?php echo $explorebeyondimg; ?>';

	function clearfilters(){
					// unbold the filters bold the ALL and show all
			
				jQuery(".articlediv").hide();
				jQuery(".articlediv.mod0").show();
				blogmod = 0;
				catmod = 1; // set this back to 0 to limit posts for filters other than all
				jQuery(".filtersection a").css("font-weight","500");
			  jQuery(".filtersection.a").find(".close-ex").css("display","none");
				jQuery(".close-ex").css("display","none");
				jQuery(".filtersection.all a").css("font-weight","700");
				jQuery("#seemoreposts").show();
				jQuery("#showfiltering").hide();
				jQuery("#showfiltering").html("");
				console.log('currentfilter:'+currentfilter);

	}

	
	var titlestrheight = 0;
	var newmargintop = 0;
	var newmargintopstr = newmargintop + "px";


		// adjust the title position based on height
	function titleadjust(){
		var screensize= jQuery( window ).width();
		if(screensize<700){
				// adjust title for mobile based on height of title
				titlestrheight = jQuery("h1.entry-title").height();
				newmargintop = -86; // default
				newmargintopstr = newmargintop + "px";
				console.log("titlestrheight:"+titlestrheight);
				if (titlestrheight < 60){
					 newmargintop = -64;
					 newmargintopstr = newmargintop + "px";
				}
				if (titlestrheight < 30){
					 newmargintop = -44;
					 newmargintopstr = newmargintop + "px";
				}
				jQuery("h1.entry-title").css("margin-top",newmargintopstr);

		} else {
				titlestrheight = jQuery("h1.entry-title").height();
				newmargintop = -90; // default
				newmargintopstr = newmargintop + "px";
				console.log("titlestrheight:"+titlestrheight);
				if (titlestrheight < 90){
					 newmargintop = -80;
					 newmargintopstr = newmargintop + "px";
				}
				if (titlestrheight < 60){
					 newmargintop = -70;
					 newmargintopstr = newmargintop + "px";
				}
				jQuery("h1.entry-title").css("margin-top",newmargintopstr);
		}
		jQuery("h1.entry-title").fadeIn(300);
	}

	titleadjust(); // show the title

	function filterblog(filterslug,filtername){

				// set the header to Explore Beyond
				jQuery("#heroimageimg").attr("src",explorebeyondheroimg);
				jQuery("#heroimage").removeClass("customstyle"); // don't use the custom hero position
				jQuery("h1.entry-title").html(explorebeyondtitle);
				jQuery("article").hide();
				jQuery(".nav-links").hide();
				//jQuery(".breadcrumbs-sector").html('');

				var bgcolordefault = "#fff";
				var fgcolordefault = "#212529";

				jQuery("#primary").css("background",bgcolordefault);
				jQuery("#primary").css("color",fgcolordefault);


				var baseURL = window.location.origin + '/explore-beyond/';
				var nextState = { additionalInformation: 'Updated the URL with JS' };

				//////////////////    EXPLORE BEYOND SECTIONS ///////////////
				if (filterslug!='all') {

				 var breadcrumbs = '&nbsp;| <a href="/explore-beyond/'+ filterslug + '">' + filternameobject[filterslug] + '</a>';
				 jQuery(".breadcrumbs-sector").html(breadcrumbs);

				 // add category to title
				 var cattitle = explorebeyondtitle + ": " + filternameobject[filterslug];
				 jQuery("h1.entry-title").html(cattitle);

					///////// CUSTOM SECTION BACKGROUND IMAGE  ////////////////////
					var catbgimage = filterbgimgobject[filterslug];
					//console.log('catbgimage:' + catbgimage);
					if (catbgimage!='') {
				 				jQuery("#heroimageimg").attr("src", catbgimage);
					}

					var colorbg = filtercolorbgobject[filterslug];
					if (colorbg!='') {
				 				jQuery("#primary").css("background",colorbg);
					}

					var colorfg = filtercolorfgobject[filterslug];
					if (colorfg!='') {
				 				jQuery("#primary").css("color",colorfg);
					}


				 // change url
				 var nextURL = baseURL + '' + filterslug;
				 var nextTitle = 'Explore Beyond | ' + filternameobject[filterslug] + ' – Ankrom Moisan';
				 window.history.pushState(nextState, nextTitle, nextURL);

				} else {

					jQuery(".breadcrumbs-sector").html("");
					var nextURL = baseURL;
					var nextTitle = 'Explore Beyond – Ankrom Moisan';
					window.history.pushState(nextState, nextTitle, nextURL);

				}

			if (filterslug == 'all') {
				currentfilter = '';
				jQuery("#seemoreposts").show();
				jQuery("#seemoreposts-cat").hide();

				//jQuery("#searchbox").val(''); // clear the search

			} else {
			// filter the posts from the filters
			//console.log('filterslug: ' + filterslug);

			if (filtername=='See More') {
				// expanding existing filters - so do nothing
				jQuery("#searchbox").val(''); // clear the search
			} else {
				jQuery("#searchbox").val(''); // clear the search
         catmod = 1; // reset the cat mod  - set this to 0 to limit the posts shown for non-all filters
			// get the font weight of this filter
				thisfontweight = jQuery(".filtersection." + filterslug + " a").css("font-weight");

				if (thisfontweight == '500') {

				// add this filter
				
					
					currentfilter = currentfilter + '.' + filterslug;

          // limit to 2 filters
			    // if this is the 3rd filter then remove the first one
					var countfilters = currentfilter.length - currentfilter.replaceAll('.', '').length;
					console.log("countfilters:"+countfilters);
					// change this to 1, could be changed back to 2 in the future
					if (countfilters>1) { // remove the first one
						var seconddot = currentfilter.indexOf(".",2);
						if (seconddot > 1) {
							var removefilter = currentfilter.substring(1,seconddot); // get the filter to remove
							var newcurrentfilter = currentfilter.substring(seconddot); // start at the second dot
							//console.log("removefilter:"+removefilter);
							//console.log("seconddot:"+seconddot);
							//console.log("newcurrentfilter"+newcurrentfilter);

							currentfilter = newcurrentfilter; // update the filter list
							// unbold the removed filter

							//console.log("jquery test 1: .filtersection." + removefilter + " a");
							//console.log("jquery test 2: #close-ex-" + removefilter );

							jQuery(".filtersection." + removefilter + " a").css("font-weight","500");
							jQuery("#close-ex-" + removefilter ).css("display","none");
						}
					}
					

					//console.log('currentfilter:'+currentfilter);


					jQuery(".filtersection." + filterslug + " a").css("font-weight","700");
					//jQuery(".filtersection." + filterslug + " a").css("background-color","#dddddd");
			    jQuery(".filtersection." + filterslug + " a").find(".close-ex").css("display","inline-block");



				} else {


					// remove this filter
					currentfilter = currentfilter.replace('.'+filterslug,'');

			
					// unbold this filter
					jQuery(".filtersection." + filterslug + " a").css("font-weight","500");	
					//jQuery(".filtersection." + filterslug + " a").css("background-color","transparent");
					jQuery(".filtersection." + filterslug + " a").find(".close-ex").css("display","none");


					countfilters = currentfilter.length - currentfilter.replaceAll('.', '').length;
					//console.log("countfilters:"+countfilters);


				}

			 }

			}
			
	    if (currentfilter == '') {
					clearfilters();

			} else {

				jQuery(".articlediv").hide();
				//jQuery(".articlediv").css("display","none");

				var countfilterresults = jQuery(".articlediv" + currentfilter).length;

				//console.log('catmod:'+catmod);
				if (countfilterresults > modnum){
				// if there are more items than the mod-number then only show the mod number and show the See More button
					if (catmod == 0) {
						jQuery(".articlediv" + currentfilter).slice(0,modnum).show();
						jQuery(".articlediv" + currentfilter).slice(0,modnum).css("display","inline-block");
						jQuery("#seemoreposts-cat").show();
						jQuery("#seemoreposts").hide();
					} else {
						jQuery(".articlediv" + currentfilter).show();
						jQuery(".articlediv" + currentfilter).css("display","inline-block");
						jQuery("#seemoreposts-cat").hide();
						jQuery("#seemoreposts").hide();
					} 
				} else {
						jQuery(".articlediv" + currentfilter).show();
						jQuery(".articlediv" + currentfilter).css("display","inline-block");
						jQuery("#seemoreposts-cat").hide();
						jQuery("#seemoreposts").hide();
				}

				/* bold the category */
				jQuery(".filtersection.all a").css("font-weight","500");
				jQuery(".filtersection.all a").css("background-color","transparent");
				jQuery(".filtersection.all a").find(".close-ex").css("display","none");


				var countresult = jQuery(".articlediv" + currentfilter).length;
				var tempfilter = currentfilter.substring(1);
				var searchtermstr = ' for ' + tempfilter.replaceAll(".", " + ");
				if (countresult == 0) {
					jQuery("#showfiltering").show();
					jQuery("#showfiltering").html("No matches for" + searchtermstr);

				} else {
					if (currentfilter == '') {
						jQuery("#showfiltering").hide();
						jQuery("#showfiltering").html("");
					} else {
						if (countfilters>2) { /* this was 1 before removing the 2nd filter option */
							jQuery("#showfiltering").show();
							var showstr = countresult + " match";
							if (countresult > 1) {
								showstr = showstr + "es";
							}
							showstr = showstr + searchtermstr;
							jQuery("#showfiltering").html(showstr);
						} 
					}
				}
				if (countfilters<2) {
					jQuery("#showfiltering").hide();
					jQuery("#showfiltering").html("");
				}
			}

			titleadjust();
			// not needed because of the above bolding
			//jQuery("#showfiltering").html("Filter by "+filtername);
		 
		 //jQuery("#searchbox").attr('placeholder','search here'); // clear the search

			return false;
	}

jQuery(function() {

	  originalheroimg = jQuery("#heroimageimg").attr("src");
		originalheortitle = jQuery(".entry-title").html();

		//console.log("originalheroimg:" + originalheroimg);
		//console.log("originalheortitle:" + originalheortitle);

		jQuery("#seemoreposts").click(function(){
				blogmod++;
				// show all

				jQuery(".articlediv.mod"+blogmod).css("display","inline-block");

				var nextgroup = blogmod + 1;

				// hide see more posts if no more posts to show
				if (jQuery(".articlediv.mod"+nextgroup).length == 0) {
						jQuery("#seemoreposts").hide();
				}


				return false;
		 
		});

		// see more for categories

		jQuery("#seemoreposts-cat").click(function(){
        catmod = 1; // this means to show the rest of the posts for this category
				//console.log('currentfilter:'+currentfilter);
				filterblog(currentfilter,'See More');
				jQuery("#seemoreposts").hide();
				jQuery("#seemoreposts-cat").hide();
				return false;
		 
		});

				// bold ALL to start
				jQuery(".filtersection a").css("font-weight","500");
				if (!articlesingle) { // if not a single article then bold the all
					jQuery(".filtersection.all a").css("font-weight","700");
				}



	var navposition = 0; // keep track of where the nav is
	var navhtml = '';


// swap the desktop nav with the mobile nav based on screen width
	function swapnav(){
		var screensize= jQuery( window ).width();
		if(screensize<700){
			if (navposition==0) {
				navposition=1;
				navhtml = jQuery("#filterpanel").html();
				jQuery("#mobilesidenav").html(navhtml);
				jQuery("#filterpanel").html("");
				jQuery("#filterpanel").hide();
				jQuery("#mobilesidenav").show();
				jQuery("#mobilesearchpanel").show();
				jQuery("#searchpanel").hide();

			}
		} else {
			if (navposition==1) {
				navposition=0;
				navhtml = jQuery("#mobilesidenav").html();
				jQuery("#filterpanel").html(navhtml);
				jQuery("#mobilesidenav").html("");
				jQuery("#mobilesidenav").hide();
				jQuery("#filterpanel").show();
				jQuery("#mobilesearchpanel").hide();
				jQuery("#searchpanel").show();
			}
		
		}
	}



swapnav();
titleadjust();


// https://stackoverflow.com/questions/8746882/jquery-contains-selector-uppercase-and-lower-case-issue
jQuery.expr[':'].icontains = function(a, i, m) {
  return jQuery(a).text().toUpperCase()
      .indexOf(m[3].toUpperCase()) >= 0;
};

function gosearch(searchterm='') {

	// clear the filters
	
	  clearfilters();

		//filterblog('all','Search');

		//var searchterm = jQuery("#searchbox").val().toLowerCase(); 
var searchlength = searchterm.length;
// only search if search length is 2 or more
 //if (searchlength>1) {
	 var searchresults = jQuery(".articlediv:icontains('"+searchterm+"')");
	 //console.log('searchresults: '+jQuery(".articlediv").slice(0,1).html());


		searchtermstr = 'for ' + searchterm;


	 var searchcount = searchresults.length;
	 jQuery(".articlediv").hide();
	 jQuery(searchresults).css("display","inline-block");
	 //console.log("searchcount: " + searchcount + " searchterm: "+ searchterm + " results:" + searchresults);

		if (searchcount == 0) {
						jQuery("#showfiltering").text("No results found " + searchtermstr);
		} else if (searchcount == 1) {
					jQuery("#showfiltering").text(searchcount + " result found " + searchtermstr);
		} else {
					jQuery("#showfiltering").text(searchcount + " results found " + searchtermstr);
		}
		
		if (searchterm == "" ) {
				jQuery("#showfiltering").hide();
		} else {
				jQuery("#showfiltering").show();
		}

	//}
}



jQuery("input.orig").keyup(function() {
	var searchterm = jQuery("input.orig").val().toLowerCase(); 
	console.log("searchterm: " + searchterm);
	 gosearch(searchterm); 
});

jQuery("input.autocomplete").keyup(function() {
	var searchterm = jQuery("input.autocomplete").val().toLowerCase(); 
	console.log("searchterm: " + searchterm);
	 gosearch(searchterm); 
});


//console.log('articlesingle' + articlesingle);
if (articlesingle == true) {
						// keep articledivs hidden
						jQuery(".articlediv").hide();
						jQuery(".articlediv.mod0").hide();
						//console.log('hiding articldediv mod0');

						//jQuery("#heroimage").addClass("customstyle");

}

jQuery( window ).resize(function() {
  swapnav();
});


//console.log('filterslug: <?php echo $filterslug;?>');

<?php if ($explorebeyondhome) { 
		if (($filterslug!='') && ($filterslug!='all')) {
			echo "filterblog('".$filterslug."','');";
		} else {
			echo "filterblog('all','All');";
		}
 } else { ?>
						jQuery(".articlediv").hide();
<?php } ?>


jQuery('#hero .post-thumbnail img').css('display','inline-block'); // show the hero img after the right size is found
jQuery('#blogcontent .post-thumbnail').css('display','inline-block'); // show the thumbs after the right size is found
jQuery('a.posttitle').mouseover(function(){
	var closestoverlay = jQuery(this).closest('.articlediv').find('.catsoverlay');
	//var test2 = jQuery(this).closest('.catsoverlay').css('visibility');
	//console.log('a posttitle mouseover test1'+ test1);
	//console.log('test1 visibility'+ test1.css('visibility'));
	//console.log('test2'+ test1.css('visibility'));
	jQuery(closestoverlay).css('visibility','visible');
});
jQuery('a.posttitle').mouseout(function(){
	var closestoverlay = jQuery(this).closest('.articlediv').find('.catsoverlay');
	jQuery(closestoverlay).css('visibility','hidden');
});

jQuery("#photo_credit3").html("<p><?php echo $photo_credit;?></p>");

});

</script>

<?php ////////////////////// FILTER //////////////////// ?>

<div id="rightside">
			<div id="filterpanel" class="underline_link_wrap">
				FILTER <br>
		
			 <div class="divider"></div>
		   <!-- <p class="filterinstructions">Click one or more categories to filter posts.<br>Click again to unfilter.</p> -->

			<div class="filtersection all"><a href="" onclick="return filterblog('all','ALL')" class="blogcategory">ALL &nbsp; (<?php echo $querycount;?>)</a></div>
				<?php

					$blog_categories = get_terms([
					'taxonomy' => 'blog_category',
					'hide_empty' => false,
					'orderby' => 'title',
					'order' => 'ASC'
					]);
					foreach ($blog_categories as $term){   

						

					  echo '<div class="filtersection '.$term->slug.'"><a href="" onclick="return filterblog(\''.$term->slug.'\',\''.$term->name.'\')" class="blogcategory">' .$term->name . '&nbsp; ('. $term->count. ')'.'<div id="close-ex-'.$term->slug.'" class="close-ex">&nbsp;x</div></a></div>';
						echo '<script>';
						echo 'filternameobject["'.$term->slug.'"]="'.ucwords(strtolower($term->name)).'";
						';

						$bgimage = "";
						$bgimagefield = get_field( 'blog_category_image', $term );
						if ($bgimagefield!='') {
							$bgimage = $bgimagefield;
						}

						$colorbg = "";
						$colorbgfield = get_field( 'background_color', $term );
						if ($colorbgfield!='') {
							$colorbg = $colorbgfield;
						}

						$colorfg = "";
						$colorfgfield = get_field( 'foreground_color', $term );
						if ($colorfgfield!='') {
							$colorfg = $colorfgfield;
						}

						echo  'filterbgimgobject["'.$term->slug.'"]="'.$bgimage.'";
						';
						echo  'filtercolorbgobject["'.$term->slug.'"]="'.$colorbg.'";
						';
						echo  'filtercolorfgobject["'.$term->slug.'"]="'.$colorfg.'";
						';
						echo '</script>';

					}

				?>

				<script>
				// write the breadcrumbs if there's a filter
						// if (filterslug!='') {
						//		var breadcrumbs = '&nbsp;| <a href="/explore-beyond/'+ filterslug + '">' + filternameobject[filterslug] + '</a>';
						//		jQuery(".breadcrumbs-sector").html(breadcrumbs);
						// }
				</script>


<?php ////////////////////// SEARCH //////////////////// ?>

<div id="searchpanel">
			<div class="divider"></div>
					<div class="paneltitle">SEARCH</div>
			<!-- <p><input id="searchbox" placeholder="" type="text"><button id="searchbutton" style="display:none;"><span class="dashicons dashicons-search"></span></button></p> -->
			<p><?php echo do_shortcode('[wd_asp elements="search,results" ratio="100%,100%" id=3]'); ?></p>
			<div class="divider"></div>


</div>

<?php ////////////////////// TRENDING //////////////////// ?>

			</div>
			<div id="trendingpanel" class="">
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
					  
					<a href="<?php the_permalink() ?>"" class="trendingarticletitle arrow_wrap trendingposts"><?php the_title(); ?>

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
		</div>

	</main><!-- #main -->



<?php


//get_sidebar();
get_footer();
