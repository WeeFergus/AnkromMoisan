<?php
/**
 * Template Name: Explore Beyond
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$filterslug = sanitize_text_field($_GET['filterslug']);
$filtername = sanitize_text_field($_GET['filtername']);

$modnum = 8; // group by 8s

get_header();
?>


	<main id="primary" class="site-main">
	<div id="herohome">
		<?php
		while ( have_posts() ) :
			the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php ankrom_moisan_post_thumbnail(); ?>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</article>
		<?php 
		endwhile; // End of the loop.
		?>
</div>
<div id="mobilenav" class="underline_link_wrap"></div>
<div id="blogcontent">
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



					$i++;
					$modi = floor($i / $modnum); // modnum items at a time
					
					// Display the Post Title with Hyperlink
					?>
					<div class="articlediv  mod<?php echo $modi;?> 
					<?php

					$categories_str = '';

$terms = get_the_terms( get_the_ID(), 'blog_category' );
					
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

$excerpt = get_field("content");
 
$shortexcerpt = substr($excerpt, 0, 150);
$shortexcerptstr = substr($shortexcerpt, 0, strrpos($shortexcerpt, ' '));
$shortexcerptstr = strip_tags($shortexcerptstr)."...";

$shortexcerptmobile = substr($excerpt, 0, 75);
$shortexcerptmobilestr = substr($shortexcerptmobile, 0, strrpos($shortexcerptmobile, ' '));
$shortexcerptmobilestr = strip_tags($shortexcerptmobilestr)."...";


					?>">  
					<div class="catsoverlay"><?php echo strtoupper($categories_str);?></div>
					<a href="<?php the_permalink() ?>" class="posttitle">	
					<?php ankrom_moisan_post_thumbnail(); ?>
					<div class="articledate"><?php echo get_the_date( 'F j, Y' ) ?></div>
					<a href="<?php the_permalink() ?>" class="posttitle">		
					<?php the_title(); ?>        					
							    <!-- <div id="cta_arrow">
        						<span class="arrow_right primera black"></span>
        						<span class="arrow_right segunda black"></span>
        					</div> -->
					</a>
					<div class="articleexcerpt"><?php echo $shortexcerptstr; ?></div>
					<div class="articleexcerptmobile"><?php echo $shortexcerptmobilestr; ?></div>
					</div>
					<?php
					// Repeat the process and reset once it hits the limit
					endwhile;
					wp_reset_postdata();
					?>		
				 <div id="seemoreposts"><a href="" id="seemore">SEE MORE POSTS</a></div>
				 <div id="seemoreposts-cat"><a href="" id="seemore-cat">SEE MORE POSTS</a></div>
</div>
<script>

var blogmod = 0;
var catmod = 0;
var modnum = <?php echo $modnum; ?>;
var currentfilter = ''; // keep track of current filter
var thisfontweight = '';

	function filterblog(filterslug,filtername){

			if (filterslug == 'all') {
				currentfilter = '';

				
			} else {
			// filter the posts from the filters
			//console.log('filterslug: ' + filterslug);

			if (filtername=='See More') {
				// expanding existing filters - so do nothing


			} else {
         catmod = 0; // reset the cat mod
			// get the font weight of this filter
				thisfontweight = jQuery(".filtersection." + filterslug + " a").css("font-weight");

				if (thisfontweight == '500') {

				// add this filter
				
					
					currentfilter = currentfilter + '.' + filterslug;

          // limit to 2 filters
			    // if this is the 3rd filter then remove the first one
					var countfilters = currentfilter.length - currentfilter.replaceAll('.', '').length;
					console.log("countfilters:"+countfilters);
					if (countfilters>2) { // remove the first one
						var seconddot = currentfilter.indexOf(".",2);
						if (seconddot > 1) {
							var removefilter = currentfilter.substring(1,seconddot); // get the filter to remove
							var newcurrentfilter = currentfilter.substring(seconddot); // start at the second dot
							console.log("removefilter:"+removefilter);
							console.log("seconddot:"+seconddot);
							console.log("newcurrentfilter"+newcurrentfilter);
							currentfilter = newcurrentfilter; // update the filter list
							// unbold the removed filter

							console.log("jquery test 1: .filtersection." + removefilter + " a");
							console.log("jquery test 2: #close-ex-" + removefilter );

							jQuery(".filtersection." + removefilter + " a").css("font-weight","500");
							jQuery("#close-ex-" + removefilter ).css("display","none");
						}
					}
					

					console.log('currentfilter:'+currentfilter);
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
				}

			 }

			}
			
	    if (currentfilter == '') {
				// unbold the filters bold the ALL and show all
			
				jQuery(".articlediv").hide();
				jQuery(".articlediv.mod0").show();
				blogmod = 0;
				catmod = 0;
				jQuery(".filtersection a").css("font-weight","500");
				//jQuery(".filtersection a").css("background-color","transparent");
			  jQuery(".filtersection.a").find(".close-ex").css("display","none");
				jQuery(".close-ex").css("display","none");


				jQuery(".filtersection.all a").css("font-weight","700");
				//jQuery(".filtersection a").css("font-weight","500");
				//jQuery(".filtersection a").css("background-color","transparent");
				//jQuery(".filtersection.a").css("font-weight","700");
				jQuery("#seemoreposts").show();
				jQuery("#showfiltering").hide();
				jQuery("#showfiltering").html("");
				console.log('currentfilter:'+currentfilter);

			} else {

				jQuery(".articlediv").hide();
				//jQuery(".articlediv").css("display","none");

				var countfilter = jQuery(".articlediv" + currentfilter).length;

				console.log('catmod:'+catmod);
				if (countfilter > modnum){
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
				if (countresult == 0) {
					jQuery("#showfiltering").show();
					jQuery("#showfiltering").html("No results found");

				} else {
					if (currentfilter == '') {
						jQuery("#showfiltering").hide();
						jQuery("#showfiltering").html("");
					} else {
						jQuery("#showfiltering").hide();
						jQuery("#showfiltering").html("");

						if (countfilters>1) {
						jQuery("#showfiltering").show();
						var showstr = countresult + " match";
						if (countresult > 1) {
							showstr = showstr + "es";
						}
						jQuery("#showfiltering").html(showstr);
						}
					}
				}

			}
			// not needed because of the above bolding
			//jQuery("#showfiltering").html("Filter by "+filtername);
		

			return false;
	}

jQuery(function() {

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
				console.log('currentfilter:'+currentfilter);
				filterblog(currentfilter,'See More');
				jQuery("#seemoreposts").hide();
				jQuery("#seemoreposts-cat").hide();
				return false;
		 
		});

				// bold ALL to start
				jQuery(".filtersection a").css("font-weight","500");
				jQuery(".filtersection.all a").css("font-weight","700");
<?php 
	// if a filterslug and filtername is sent then apply the filter
		if (($filterslug!='') && ($filterslug!='all') && ($filtername!='')) {
			echo "filterblog('".$filterslug."','".$filtername."')";
		}
?>

	var navposition = 0; // keep track of where the nav is
	var navhtml = '';

// swap the desktop nav with the mobile nav based on screen width
	function swapnav(){
		var screensize= jQuery( window ).width();
		if(screensize<700){
			if (navposition==0) {
				navposition=1;
				navhtml = jQuery("#filterpanel").html();
				jQuery("#mobilenav").html(navhtml);
				jQuery("#filterpanel").html("");
				jQuery("#filterpanel").hide();
				jQuery("#mobilenav").show();

			}
		} else {
			if (navposition==1) {
				navposition=0;
				navhtml = jQuery("#mobilenav").html();
				jQuery("#filterpanel").html(navhtml);
				jQuery("#mobilenav").html("");
				jQuery("#mobilenav").hide();
				jQuery("#filterpanel").show();
			}
		
		}
	}

swapnav();

jQuery( window ).resize(function() {
  swapnav();
});

// https://stackoverflow.com/questions/9720294/jquery-how-to-detect-window-width-on-the-fly
		
});

</script>

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
					'orderby' => 'name',
					]);
					foreach ($blog_categories as $term){   
					  echo '<div class="filtersection '.$term->slug.'"><a href="" onclick="return filterblog(\''.$term->slug.'\',\''.$term->name.'\')" class="blogcategory">' .$term->name . '&nbsp; ('. $term->count. ')'.'<div id="close-ex-'.$term->slug.'" class="close-ex">&nbsp;x</div></a></div>';
					}

				?>


			</div>



			<?php ////////////////////// SEARCH //////////////////// ?>

			<div id="searchpanel">
			<div class="divider"></div>
					<div class="paneltitle">SEARCH</div>
			<!-- <p><input id="searchbox" placeholder="" type="text"><button id="searchbutton" style="display:none;"><span class="dashicons dashicons-search"></span></button></p> -->
			<p><?php echo do_shortcode('[wd_asp elements="search,results" ratio="100%,100%" id=3]'); ?></p>
			<div class="divider"></div>


			<div id="trendingpanel" class="underline_link_wrap">
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
		</div>

	</main><!-- #main -->



<?php
include get_stylesheet_directory()."/explore-beyond-style.php";

//get_sidebar();
get_footer();

