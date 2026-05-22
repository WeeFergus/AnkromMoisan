<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Ankrom_Moisan
 */

get_header();

global $wp_query;
$foundposts = $wp_query->found_posts;
$resultscount =  $wp_query->post_count;
$postsperpage = get_option( 'posts_per_page' );
$paged = get_query_var( 'paged' ); 
if ($paged == 0) {$paged = 1;}
$pages = ceil($foundposts / $postsperpage);
$results_es = "s";
if ($foundposts == 1) {$results_es = "";}


$searchscope = "Site";
if ($_GET['p_asid']=='3') {
	$searchscope = "Explore Beyond";
}

// https://wordpress.stackexchange.com/questions/108865/display-search-result-count
// https://codex.wordpress.org/Pagination#
// https://wordpress.stackexchange.com/questions/80419/how-can-i-retrieve-default-post-per-page-value-from-settings-reading-and-tota

$post_type_ident = array();
foreach($posts as $post){
	array_push($post_type_ident,  $post->post_type);
}
// var_dump($post_type_ident);
echo '<!-- post_type_ident: '.print_r($post_type_ident,true).'-->';
?>
<style>

.search_project_wrap {
    width: 100%;
	margin-bottom: 80px;
}

.search_wrapper {
     margin-top: 80px;
}

.search_project_wrap .search_single_project:nth-child(1) {
    border-top: 0;
}

.search_type_header{
	margin-top:0px;
	margin-bottom: 0px;
}

.header_wrap {
    padding-top: 50px !important;
    padding-bottom: 0px !important;
}

.search_people_wrap .person-container {
    margin-bottom: 50px;
}

.navigation{
	width:100%;
	margin-top:20px;
	margin-bottom:30px;
	display: inline-block;
}

.nav-previous{
	display:inline-block;
	float:left;
	font-weight:700;
}
.nav-next{
	display:inline-block;
	float:right;
	font-weight:700;
}

.team_search_wrapper {
    margin-top: 28px;
}


</style>
<div class="container search_wrapper">
<h1><bold><?php echo $searchscope;?> Search</bold></h1>
				   <?php 

		echo do_shortcode('[wd_asp elements="search,results" ratio="100%,100%" id=1]'); 

		$searchquery = get_search_query();

// if there is no search query then show search
	if ($searchquery=='') {
		// don't show results if no query

				} elseif ( have_posts() ) { ?>

	<div class="row header_wrap">
		<div class="col-12">
			<h1><bold>
			<?php /* translators: %s: search query. */
				printf( esc_html__( 'Showing ' . $resultscount . ' of ' .$foundposts . ' result' . $results_es .' for: %s', 'ankrom-moisan' ), '<span><i>' . $searchquery . '</i></span><br>Page ' . $paged. ' of '.$pages  ); 
			?>
			</bold></h1>
			<div class="navigation">
				<div class="nav-previous alignleft"><?php previous_posts_link( '< Previous' ); ?></div>
				<div class="nav-next alignright"><?php next_posts_link( 'Next >' ); ?></div>
			</div>
		</div>

	</div>

	<div class="row">

		<?php while ( have_posts() ) { the_post(); ?>
			<?php echo '<!-- thepost: ' . print_r($post,true) . ' -->'; ?>
		<?php } ?>


		<? ////////////////////////////////// PEOPLE /////////////////////////////////// ?>
		<?php if(in_array('team_project', $post_type_ident)){ ?>
		<div class="col-12 search_type_header team people">
			<h2><bold>PEOPLE</bold></h2>
		</div>
		<div class="team_search_wrapper">
			<div class="col-12 search_people_wrap">
				<div class="row">
				<?php while ( have_posts() ) {the_post(); ?>
				<?php if($post->post_type == 'team_project'){ ?>
					<div class="col-sm-12 col-md-4 col-lg-3 person-container">
						<?php if( have_rows('top_page_slidershow') ){ while( have_rows('top_page_slidershow') ){ the_row();?>
						<?php if( have_rows('slide_one') ){ while( have_rows('slide_one') ){ the_row(); $projectslideimage = get_sub_field('image'); $projectslidecredit = get_sub_field('photographer_credit');?>
						<div class="center-cropped-employee">
							<?php if($projectslideimage){?>
							<a href="<?php the_permalink(); ?>">
								<img class="employee-image" src="<?php echo $projectslideimage; ?>">
							</a>
							<?php } ?>
							<div class="shimmer tumb_img"></div>
						</div>
						<?php } } ?>
						<?php } } ?>				
						<h3><a href="<?php the_permalink(); ?>"><?php echo the_field('team_member_name'); ?></a></h3>
					</div>
				<?php } ?>
				<?php } ?>
				</div>
			</div>
		</div>
		<?php } ?>
		<? ////////////////////////////////// END  PEOPLE /////////////////////////////////// ?>


		<? ////////////////////////////////// PROJECTS /////////////////////////////////// ?>
		<?php if (in_array('portfolio_project', $post_type_ident)){ ?>
		<div class="col-12 search_type_header projects">
			<h2><bold>PROJECTS</bold></h2>
		</div>
		<div class="search_project_wrap">
			<?php while ( have_posts() ) {the_post(); ?>
			<?php if($post->post_type == 'portfolio_project'){ ?>
			<div class="col-12 search_single_project">
				<div class="row">
					<div class="col-md-4 col-sm-12">
					<?php if ($post->asp_data->image!='') { ?>
						<a href="<?php the_permalink(); ?>">
							<img src="<?php echo $post->asp_data->image;?>">
						</a>
					<?php } ?>
					</div>
					<div class="col-md-8 col-sm-12">
						<h2><bold><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></bold></h2>
						<?php if( have_rows('top_project_content') ){ while( have_rows('top_project_content') ){ the_row(); 
								$topprojectcontent = get_sub_field('project_content'); ?>
								<p><?php echo substr(strip_tags($topprojectcontent), 0, 200) . "..."; ?></p>
						<?php } } ?>
					</div>
				</div>	
			</div>
			<?php } ?>
			<?php } ?>
		</div>
		<?php } ?>
		<? ////////////////////////////////// END PROJECTS /////////////////////////////////// ?>


		<? ////////////////////////////////// POSTS /////////////////////////////////// ?>
		<?php if (in_array('post', $post_type_ident)){ ?>
		<?php if ( have_posts() ) { ?>
		<div class="col-12 search_type_header posts">
			<h2><bold>POSTS</bold></h2>
		</div>
		<div class="search_project_wrap">
			<?php while ( have_posts() ) {the_post(); ?>
			<?php echo '<!-- posttype: '.$post->post_type.' -->'; ?>
			<?php if ($post->post_type == 'post') { ?>
			<div class="col-12 search_single_project">
				<div class="row">
					<div class="col-md-4 col-sm-12">
					<?php if ($post->asp_data->image!='') { ?>
						<a href="<?php the_permalink(); ?>">
							<img src="<?php echo $post->asp_data->image;?>">
						</a>
					<?php } ?>
					</div>
					<div class="col-md-8 col-sm-12">
						<h2><bold><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></bold></h2>
						<?php $topprojectcontent = get_field('content'); ?>
						<p><?php echo substr(strip_tags($topprojectcontent), 0, 200) . "..."; ?></p>
					</div>					
				</div>	
			</div>
			<?php } ?>
			<?php } ?>
		</div>
		<?php } ?>
		<?php } ?>
		<? ////////////////////////////////// END POSTS /////////////////////////////////// ?>


		<? ////////////////////////////////// PAGES /////////////////////////////////// ?>

		<?php if (in_array('page', $post_type_ident)) { ?>
		<div class="col-12 search_type_header pages">
			<h2><bold>PAGES</bold></h2>
		</div>
		<div class="search_project_wrap">
			<?php while ( have_posts() ) { the_post(); ?>
			<?php if($post->post_type == 'page'){ ?>
			<div class="col-12 search_single_project">
				<div class="row">
					<div class="col-md-4 col-sm-12">
						<?php if ($post->asp_data->image!='') { ?>
						<a href="<?php the_permalink(); ?>">
							<img src="<?php echo $post->asp_data->image;?>">
						</a>
						<?php } ?>
					</div>
					<div class="col-md-8 col-sm-12">
						<h2><bold><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></bold></h2>
						<?php 
								$showcontent = ''; 
								$page_subtitle = strip_tags(get_field('page_subtitle'));
								$page_content =  get_field('page_content');
								$page_content = preg_replace('/(<(script|style)\b[^>]*>).*?(<\/\2>)/is', "$1$3", $page_content); // remove style content  
								$page_content = trim(strip_tags($page_content));
								//https://stackoverflow.com/questions/20082476/remove-everything-within-script-and-style-tags
								if ($page_subtitle!='') {
									$showcontent = $page_subtitle;
								} elseif ($page_content!='') {
									$showcontent = $page_content;
								} elseif( have_rows('page_modules') ) { 
										while( have_rows('page_modules') ){ 
											the_row(); 
											$moduletitle =  strip_tags(get_sub_field('module_repeater_title')); 
											$modulecontent =  trim(strip_tags(get_sub_field('module_repeater_short_content'))); 
											if ($moduletitle!='') {
												$showcontent = $moduletitle;
												break;
											} elseif (($modulecontent!='') && ($modulecontent!='<p></p>') && ($modulecontent!='<p> </p>') ) {
												$showcontent = $modulecontent;
												break;
											}
										}	
								} elseif( have_rows('top_project_content') ){ 
									while( have_rows('top_project_content') ){ 
										the_row(); 
										$topprojectcontent = strip_tags(get_sub_field('project_content'));
											if ($topprojectcontent!='') {
												$showcontent = $topprojectcontent;
												break;
											} 
									}
								}
								if ($showcontent != ''){
										?><p><?php echo substr(strip_tags($showcontent), 0, 200) . "..."; ?></p><?php
								} 
					    ?>
					</div>
				</div>
			</div>
			<?php } ?>
			<?php } ?>
		</div>
		<?php } ?>
		<? ////////////////////////////////// END PAGES /////////////////////////////////// ?>



		<?php } else { ?>

<!-- 		get_template_part( 'template-parts/content', 'none' ); -->
			<div class="row header_wrap">
				<div class="col-12">
					<h1><bold>
					<?php printf( esc_html__( 'No results for: %s', 'ankrom-moisan' ), '<span><i>' . get_search_query() . '</i></span>' ); ?>
					</bold></h1>
				</div>
			</div>
			
		<?php } ?> 

		<?php while ( have_posts() ) {
				the_post(); ?>
				<?php if ( 'post' === get_post_type() ) { ?>
				<div class="entry-meta"><h1></h1>
					<?php
					//ankrom_moisan_posted_on();
					//ankrom_moisan_posted_by();
				?>
			</div>
		<?php } 

		} 

		//the_posts_navigation();

		//posts_nav_link();
	?>

</div>


<div class="col-12">
	<div class="navigation">
		<div class="nav-previous alignleft"><?php previous_posts_link( '< Previous' ); ?></div>
		<div class="nav-next alignright"><?php next_posts_link( 'Next >' ); ?></div>
	</div>
</div>

<script>
	const searchResultBlock = document.querySelectorAll('.search_single_project, .search_people_wrap');
	
	searchResultBlock.forEach(project => {
		if(project.children[0].children[0].children.length === 0){
			//project.remove();
		}
		
	});
	
</script>

<?php
get_footer();
