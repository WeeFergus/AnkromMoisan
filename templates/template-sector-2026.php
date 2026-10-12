<?php
/**
 * Template Name: Sector Page 2026
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();

$blogcategoriesarray = [];

if (strstr($_SERVER['REQUEST_URI'], 'oregon') == true) {
  $locationCategory = '+Portland';
} elseif (strstr($_SERVER['REQUEST_URI'], 'washington') == true) {
  $locationCategory = '+Seattle';
} elseif (strstr($_SERVER['REQUEST_URI'], 'california') == true) {
  $locationCategory = '+San Francisco';
} else {
  $locationCategory = '';
}

// remark out blogcategories that aren't in the blog_category list - then will show all blog posts

$selectedDisciplineContent = 'architecture_project_content'; //default
$postlinksuffix = '';
if (strstr($_SERVER['REQUEST_URI'], 'architecture') == true) {
  $disciplineCategory = '+Architecture';
  $selectedDisciplineContent = 'architecture_project_content';
  $selectedDisciplineHeroImages = 'architecture_project_slideshow';
  $selectedDisciplineHeroImagesSize = 'medium';
  $sectorheroImageDiscipline = 'slide_two';
  $blogcategoriesarray[] = 'arch';
  $postlinksuffix = '?architecture';
} elseif (strstr($_SERVER['REQUEST_URI'], 'interiors') == true) {
  $disciplineCategory = '+Interiors';
  $selectedDisciplineContent = 'interior_project_content';
  $selectedDisciplineHeroImages = 'interior_project_slideshow';
  $selectedDisciplineHeroImagesSize = 'medium';
  $sectorheroImageDiscipline = 'slide_three';
  $blogcategoriesarray[] = 'interior-design';
  $postlinksuffix = '?interiors';
} elseif (strstr($_SERVER['REQUEST_URI'], 'planning') == true) {
  $disciplineCategory = '+Planning';
  $selectedDisciplineContent = 'planning_project_content';
  $selectedDisciplineHeroImages = 'planning_project_slideshow';
  $selectedDisciplineHeroImagesSize = 'medium';
  $sectorheroImageDiscipline = 'slide_four';
  $postlinksuffix = '?planning';
  //$blogcategoriesarray[]= "planning";
} elseif (strstr($_SERVER['REQUEST_URI'], 'brand') == true) {
  $disciplineCategory = '+Brand';
  $selectedDisciplineContent = 'brand_project_content';
  $selectedDisciplineHeroImages = 'brand_project_slideshow';
  $selectedDisciplineHeroImagesSize = 'medium';
  $sectorheroImageDiscipline = 'slide_five';
  $postlinksuffix = '?brand';
  //$blogcategoriesarray[]= "brand";
} else {
  $disciplineCategory = '';
  $selectedDisciplineHeroImages = 'top_page_slidershow';
  $selectedDisciplineHeroImagesSize = 'image';
  $sectorheroImageDiscipline = 'slide_one';
}

// NEW: simple key ('architecture' / 'interiors' / 'planning' / 'brand' / '' for All Disciplines)
// used below to pick which page-level discipline project picker to pull from.
$activeDisciplineKey = strtolower(ltrim($disciplineCategory, '+'));

// NEW: when a specific discipline is active, pull the flat, hand-picked list of
// projects from that discipline's page-level relationship field. These 4 fields
// live on the page itself (like the existing architecture_projects /
// interior_projects fields), not nested inside the project_types repeater --
// so each Sector page (e.g. "Affordable Housing") has its own dedicated
// Architecture / Interiors / Planning / Brand picker.
$usingGlobalDisciplinePicker = !empty($activeDisciplineKey);
$activeDisciplineProjectIds = [];
if ($usingGlobalDisciplinePicker) {
  $discipline_field_map = [
    'architecture' => 'architecture_projects',
    'interiors' => 'interior_projects',
    'planning' => 'planning_projects',
    'brand' => 'brand_projects',
  ];
  $discipline_field_name = isset($discipline_field_map[$activeDisciplineKey])
    ? $discipline_field_map[$activeDisciplineKey]
    : '';
  $discipline_field_value = $discipline_field_name
    ? get_field($discipline_field_name)
    : [];
  if (!empty($discipline_field_value)) {
    foreach ($discipline_field_value as $discipline_project) {
      $activeDisciplineProjectIds[] = is_object($discipline_project)
        ? $discipline_project->ID
        : $discipline_project;
    }
  }
}

if (strstr($_SERVER['REQUEST_URI'], 'urban-living-interiors') == true) {
  $disciplineCategory = '+Interiors';
  $sectorCategory = '+Housing';
  $blogcategoriesarray[] = 'housing';
  $blogcategoriesarray[] = 'interior-design';
} elseif (strstr($_SERVER['REQUEST_URI'], 'affordable-housing') == true) {
  $sectorCategory = '+Affordable Housing';
  $blogcategoriesarray[] = 'affordable-housing';
} elseif (strstr($_SERVER['REQUEST_URI'], 'housing') == true) {
  $sectorCategory = '+Housing';
  $blogcategoriesarray[] = 'housing';
} elseif (strstr($_SERVER['REQUEST_URI'], 'office') == true) {
  $sectorCategory = '+Office';
  $blogcategoriesarray[] = 'office';
} elseif (strstr($_SERVER['REQUEST_URI'], 'senior-communities') == true) {
  $sectorCategory = '+Senior Communities';
  $blogcategoriesarray[] = 'senior-communities';
} elseif (strstr($_SERVER['REQUEST_URI'], 'healthcare') == true) {
  $sectorCategory = '+Healthcare';
  $blogcategoriesarray[] = 'healthcare';
} elseif (strstr($_SERVER['REQUEST_URI'], 'higher-education') == true) {
  $sectorCategory = '+Higher Education';
  $blogcategoriesarray[] = 'higher-education';
} elseif (strstr($_SERVER['REQUEST_URI'], 'hospitality') == true) {
  $sectorCategory = '+Hospitality';
  $blogcategoriesarray[] = 'hospitality';
} elseif (strstr($_SERVER['REQUEST_URI'], 'retail') == true) {
  $sectorCategory = '+Retail';
  $blogcategoriesarray[] = 'retail';
} elseif (strstr($_SERVER['REQUEST_URI'], 'community') == true) {
  $sectorCategory = '+Community';
  $blogcategoriesarray[] = 'community';
} else {
  $sectorCategory = '';
}

$currentCategory = $post->post_title;
?>

<div class="hero_sector_wrapper">
  <?php if (have_rows('top_page_slidershow')):
    while (have_rows('top_page_slidershow')):
      the_row(); ?>
  <?php
  $sectorherotitle = get_sub_field('sector_title');
  $sectorherotypetitle = get_sub_field('sector_type_title');
  ?>
  <?php if (have_rows($sectorheroImageDiscipline)):
    while (have_rows($sectorheroImageDiscipline)):
      the_row(); ?>
  <?php $sectorheroImage = get_sub_field('image'); ?>
  <div class="hero_sector_image_wrap">

    <div class="hero_image <?php echo $selectedDisciplineContent; ?> <?php echo strtolower(
   str_replace(' ', '_', $currentCategory)
 ); ?>" style="background-image: url(<?php echo $sectorheroImage; ?>);">
    </div>
    <div class="shimmer tumb_loading"></div>
    <div class="container hero_title">
      <div class="row">
        <div class="col-12">
          <h1><?php
          if (
            $sectorherotitle
          ): ?><span class="sector_title"><?php echo $sectorherotitle; ?></span><?php endif;
          if ($sectorherotypetitle): ?> / <?php echo $sectorherotypetitle;endif;
          ?></h1>
        </div>
      </div>
    </div>
  </div>
  <?php
    endwhile;
  endif;
      // if( get_field($sectorheroImageDiscipline) ):
      ?>
  <?php
    endwhile;
  endif;
// if( get_field('top_page_slidershow') ):
?>
</div>


<div class="container sector_top_content">
  <div class="row">
    <?php if (true):/* was for interiors */  ?>
    <div class="col-lg-7 col-md-12 toggle_wrapper">
      <?php while (have_posts()):

        the_post();
        // check for rows (parent repeater)
        if (have_rows('top_project_content')): ?>
      <?php while (have_rows('top_project_content')):

        the_row();

        $topsectortitle = get_sub_field('sector_subtitle');
        $topsectorcontent = get_sub_field('project_content');
        ?>

      <h2><?php echo $topsectortitle; ?></h2>
      <p><?php echo $topsectorcontent; ?></p>
      <?php
      endwhile;
          // end of the loop.
          ?>
      <?php endif;

        // if( get_field('top_project_content') ):
        ?>
      <?php
      endwhile;
      // end of the loop.
      ?>
    </div>
    <div class="col-lg-1 col-md-12"></div>
    <div class="col-lg-4 col-md-12  sector_sidebar">

      <?php $sidebar_title = get_field('sidebar_title'); ?>
      <?php if (have_rows('sector_sidebar')): ?>
      <?php while (have_rows('sector_sidebar')):

        the_row();
        $sectordownloadpdf = get_sub_field('sector_pdf');

        $sidebar_title = get_sub_field('sidebar_title');

        if ($sidebar_title) { ?>
          <h5><?php echo esc_html($sidebar_title); ?></h5>
       <?php }

        $project_types = get_field('project_types');
        //echo print_r($project_types,true);

        $project_types_array = [];
        $project_types_selected_posts = []; // NEW: holds per-discipline curated project IDs, keyed by project type name

        if (have_rows('project_types')) {
          echo '<ul>';
          while (have_rows('project_types')) {
            the_row();
            $project_type = get_sub_field('project_type');
            $text_only = get_sub_field('text_only');
            $prefix = get_sub_field('prefix');
            $prefix = str_replace(' ', '&nbsp;', $prefix);
            $project_type_name = $project_type->name;
            $project_type_name_url = preg_replace(
              '/[^a-zA-Z0-9\']/',
              '-',
              $project_type_name
            );
            $project_types_array[] = $project_type_name;

            // NEW: capture manually-selected projects for "All Disciplines" only.
            // Discipline-specific curation (Architecture/Interiors/Planning/Brand) is
            // now handled by 4 page-level relationship fields, not per project type.
            $selected_projects_field = get_sub_field('selected_projects');
            $selected_ids_all = [];
            if (!empty($selected_projects_field)) {
              foreach ($selected_projects_field as $selected_project) {
                $selected_ids_all[] = is_object($selected_project)
                  ? $selected_project->ID
                  : $selected_project;
              }
            }
            $project_types_selected_posts[$project_type_name] = [
              'all' => $selected_ids_all,
            ];

            if ($text_only == 'Yes') {
              echo $prefix . $project_type_name . '<br>';
            } else {
              echo '<a href="#' .
                $project_type_name_url .
                '" class="underline_link">' .
                $prefix .
                $project_type_name .
                '</a>';
            }
          }
          echo '</ul>';
        }

        /* Restore original Post Data */
        wp_reset_postdata();
        ?>

      <?php if (have_rows('sector_facts')): ?>
      <?php while (have_rows('sector_facts')):

        the_row();
        $sectorfactone = get_sub_field('fact_one');
        $sectorfacttwo = get_sub_field('fact_two');
        $sectorfactthree = get_sub_field('fact_three');
        $sectorfactfour = get_sub_field('fact_four');
        $sectorlink1 = get_sub_field('link_1');
        $sectorlink2 = get_sub_field('link_2');
        $sectorlink3 = get_sub_field('link_3');
        $sectorlink4 = get_sub_field('link_4');
        ?>

      <?php if ($sectorfactone || $sectorfacttwo || $sectorfactthree): ?>

      <h5>FAST FACTS:</h5>
      <ul>
        <?php if (
          $sectorfactone
        ): ?><li><bold><?php echo $sectorfactone; ?></bold> PROJECTS</li><?php endif; ?>
        <?php if (
          $sectorfacttwo
        ): ?><li><bold><?php echo $sectorfacttwo; ?></bold> CITIES</li><?php endif; ?>
        <?php if (
          $sectorfactthree
        ): ?><li><bold><?php echo $sectorfactthree; ?></bold> STATES</li><?php endif; ?>
        <?php if ($sectorfactfour) { ?>
          <li class="factfour"><?php echo $sectorfactfour; ?></li>
        <?php } ?>
      </ul>
      <?php endif; ?>



      <ul class="underline_link_wrap">
      <?php if ($sectorlink1) { ?>
      <li class="link1"><?php echo $sectorlink1; ?></li>
      <?php } ?>

      <?php if ($sectorlink2) { ?>
      <li class="link2"><?php echo $sectorlink2; ?></li>
      <?php } ?>

      <?php if ($sectorlink3) { ?>
      <li class="link3"><?php echo $sectorlink3; ?></li>
      <?php } ?>

      <?php if ($sectorlink4) { ?>
      <div class="link4"><?php echo $sectorlink4; ?></li>
      <?php } ?>


      <?php
      endwhile;
        // end of the loop.
        ?>
      <?php endif;
        // if( get_field('sector_facts') ):
        ?>




<?php
        ///////////////////////// SECTOR LINKS ///////////////////////////
        ?>


      <?php if (have_rows('sector_links')) { ?>
      <?php while (have_rows('sector_links')) {

        the_row();
        $sectorlink = get_sub_field('sector_link_repeater');
        ?>
        <li class="link1"><?php echo $sectorlink; ?></li>
      <?php
      } ?>
      <?php } ?>

      </ul>
<?php
        ///////////////////////// END SECTOR LINKS ///////////////////////////
        ?>




      <?php
      endwhile;
        // end of the loop.
        ?>
      <?php endif;
      // if( get_field('sector_sidebar') ):
      ?>

     <?php
     $sector_sidebar = get_field('sector_sidebar');
     $sector_sidebar_pdf = $sector_sidebar['sector_pdf'] ?? '';

     if (!empty($sector_sidebar_pdf)) { ?>

  <a class="underline_link" href="<?php echo esc_url(
    $sector_sidebar_pdf
  ); ?>" target="_blank">
    <?php
    if (get_field('top_page_slidershow_sector_title')):
      echo get_field('top_page_slidershow_sector_title');
    endif;
    if (
      get_field('top_page_slidershow_sector_type_title')
    ): ?>/<?php echo get_field('top_page_slidershow_sector_type_title');endif;
    ?> Project List
  </a>

<?php }
     ?>



      </p>
      <?php endif; ?>
    </div>

  </div>
</div>

<div id="market_sector_map_wrap" class="col-12">
<!--
  <div class="center_map_btns_wrap">
    <p>Center Map To:</p>
    <div id="fly_portland"><img src="<?php echo get_template_directory_uri() .
      '/assets/images/SVG/map_pin.svg'; ?>"/>Housing</div>
    <div id="fly_seattle"><img src="<?php echo get_template_directory_uri() .
      '/assets/images/SVG/map_pin.svg'; ?>"/>Seattle</div>
    <div id="fly_sanfran"><img src="<?php echo get_template_directory_uri() .
      '/assets/images/SVG/map_pin.svg'; ?>"/>San Francisco</div>
  </div>
-->
  <div class="close_project_list_btn">
    <img src="<?php echo get_template_directory_uri() .
      '/assets/images/SVG/close.svg'; ?>"/>
  </div>
  <div id='map4'></div>
</div>

<?php
$portfolio_category =
  '' .
  $currentCategory .
  '' .
  $locationCategory .
  '' .
  $disciplineCategory .
  '' .
  $sectorCategory .
  '';
echo '<!-- portfolio_category: ' . $portfolio_category . '-->';
?>
</div>


<div class="container grid_project_wrap project_toggle_wrapper closed individual_project">
<?php
// NEW: when a specific discipline is active, replace the studio/project-type
// grouping entirely with a single flat section for that discipline's picker.
if ($usingGlobalDisciplinePicker) {
  $discipline_labels = [
    'architecture' => 'Architecture',
    'interiors' => 'Interiors',
    'planning' => 'Planning',
    'brand' => 'Brand',
  ];
  $project_types_array = [
    isset($discipline_labels[$activeDisciplineKey])
      ? $discipline_labels[$activeDisciplineKey]
      : ucfirst($activeDisciplineKey),
  ];
}

// LIST PROJECTS BY CATEGORY
foreach ($project_types_array as $pt) {

  $portfolio_category = $pt;
  $project_type_name_url = preg_replace('/[^a-zA-Z0-9\']/', '-', $pt);

  // NEW: if a specific discipline is active (URL has ?architecture, ?interiors, etc),
  // show only that discipline's page-level hand-picked list. If nothing has been
  // picked yet for that discipline, this intentionally shows nothing (post__in
  // => [0] matches no posts) rather than falling back to anything else.
  if ($usingGlobalDisciplinePicker) {
    $selected_ids = !empty($activeDisciplineProjectIds)
      ? $activeDisciplineProjectIds
      : [0];
    $args = [
      'post_type' => 'portfolio_project',
      'post_status' => 'publish',
      'post__in' => $selected_ids,
      'orderby' => 'post__in',
      'posts_per_page' => 200,
    ];
  } else {
    // All Disciplines: use hand-picked selection if curated, otherwise fall back
    // to the original taxonomy-based query (every post tagged with this project type).
    $selected_ids_all = isset($project_types_selected_posts[$pt]['all'])
      ? $project_types_selected_posts[$pt]['all']
      : [];
    if (!empty($selected_ids_all)) {
      $args = [
        'post_type' => 'portfolio_project',
        'post_status' => 'publish',
        'post__in' => $selected_ids_all,
        'orderby' => 'post__in',
        'posts_per_page' => 200,
      ];
    } else {
      $args = [
        'post_type' => 'portfolio_project',
        'post_status' => 'publish',
        'portfolio_category' => $portfolio_category,
        'offset' => 0,
        'posts_per_page' => 200,
      ];
    }
  }
  $arr_posts = new WP_Query($args);
  if ($arr_posts->have_posts()) { ?>

<div class="container grid_project_wrap project_toggle_wrapper closed individual_project">
<?php echo '<a name="' . $project_type_name_url . '"></a>'; ?>
<?php echo '<h1>' . $portfolio_category . '</h1>'; ?>
  <div class="row project_wrap">
    <?php while ($arr_posts->have_posts()) {
      $arr_posts->the_post(); ?>
    <div class="col-lg-6 col-md-12 hover_arrow_story individual_project">
      <?php // Hand-picked projects (from any of the selector fields) may not have ACF
      // content populated for the currently-relevant discipline group (e.g. an
      // Interiors project curated into the "All Disciplines" list, which defaults
      // to architecture_project_content). Rather than render a blank card, fall
      // back to whichever discipline content group the post actually has.


      $effectiveDisciplineContent = $selectedDisciplineContent;
      $effectiveDisciplineHeroImages = $selectedDisciplineHeroImages;
      if (
        $effectiveDisciplineContent &&
        !have_rows($effectiveDisciplineContent)
      ) {
        $fallback_groups = [
          'architecture_project_content' => 'architecture_project_slideshow',
          'interior_project_content' => 'interior_project_slideshow',
          'planning_project_content' => 'planning_project_slideshow',
          'brand_project_content' => 'brand_project_slideshow',
        ];
        foreach ($fallback_groups as $fallback_content => $fallback_images) {
          if (have_rows($fallback_content)) {
            $effectiveDisciplineContent = $fallback_content;
            $effectiveDisciplineHeroImages = $fallback_images;
            break;
          }
        }
      }
      ?>
      <div class="story_image">
        <?php if ($effectiveDisciplineContent) { ?>
        <?php if (have_rows($effectiveDisciplineContent)) {
          while (have_rows($effectiveDisciplineContent)) {
            the_row(); ?>
        <?php if (have_rows($effectiveDisciplineHeroImages)) {
          while (have_rows($effectiveDisciplineHeroImages)) {
            the_row(); ?>
        <?php if (have_rows('slide_one')) {
          while (have_rows('slide_one')) {

            the_row();
            $projectslideone = get_sub_field($selectedDisciplineHeroImagesSize);
            ?>
        <a href="<?php the_permalink(); ?>">
          <div class="project-center-cropped" style="background-image: url(<?php echo $projectslideone; ?>);"></div>
          <div class="shimmer tumb_loading"></div>
        </a>
        <?php
          }
        }
            // if( get_field('slide_one') ){
            ?>
        <?php
          }
        }
            // if( get_field('top_page_slidershow') ){
            ?>
        <?php
          }
        }
          // if( get_field('top_page_slidershow') ){
          ?>
        <?php } else { ?>
        <?php if (have_rows($selectedDisciplineHeroImages)) {
          while (have_rows($selectedDisciplineHeroImages)) {
            the_row(); ?>
        <?php if (have_rows('slide_one')) {
          while (have_rows('slide_one')) {

            the_row();
            $projectslideone = get_sub_field($selectedDisciplineHeroImagesSize);
            ?>
        <a href="<?php the_permalink(); ?>">
          <div class="project-center-cropped" style="background-image: url(<?php echo $projectslideone; ?>);"></div>
          <div class="shimmer tumb_loading"></div>
        </a>
        <?php
          }
        }
            // if( get_field('slide_one') ){
            ?>
        <?php
          }
        }
          // if( get_field('top_page_slidershow') ){
          ?>
        <?php } ?>
      </div>

      <div class="project_content_wrap">
        <?php if (have_rows('top_project_content')) { ?>
        <?php while (have_rows('top_project_content')) {

          the_row();
          $topprojecttitle = get_sub_field('project_subtitle');
          $topprojectcontent = get_sub_field('project_content');
          ?>
        <div class="row d-lg-flex">
          <div class="col-md-10 col-sm-12">
            <div class="d-lg-block">
              <h3 class="shimmer"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <h4><a href="<?php the_permalink(); ?>"><?php echo $topprojecttitle; ?></a></h4>
            </div>
          </div>
          <div class="col-md-2 col-sm-12 arrow_wrap">
            <a href="<?php the_permalink(); ?>">
                <div id="cta_arrow">
                  <span class="arrow_right primera black"></span>
                  <span class="arrow_right segunda black"></span>
                </div>
            </a>
          </div>
        </div>
        <?php
        }
          // end of the loop.
          ?>
        <?php }
      // if( get_field('top_project_content') ):
      ?>
      </div>
    </div>
 <?php
    }}
  ?>
</div>
</div>
<?php
}
?>

</div>
<div class="container grid_project_wrap project_toggle_wrapper closed individual_project">


<?php
/////////////////////////// BLOG AND NEWS COMBINED  //////////////////////////////
?>


<div class="blogandnewsheader">
  <h3><a href="/explore-beyond/">EXPLORE BEYOND AND NEWS</a></h3>
</div>
<div id="blogposts">
<?php
$totalSlots = 4;
$usedSlots = 0; // 1. MANUALLY SELECTED POSTS (ACF relationship field, allows post + inthenews)
echo '<!-- DEBUG featured_explore_posts: ' .
  print_r(get_field('featured_explore_posts'), true) .
  ' -->';
$manual_featured = get_field('featured_explore_posts', get_queried_object_id());
$manual_featured_ids = [];
if (!empty($manual_featured)) {
  foreach ($manual_featured as $mp) {
    $manual_featured_ids[] = is_object($mp) ? $mp->ID : $mp;
  }
}
foreach ($manual_featured_ids as $mid) {
  echo '<!-- DEBUG usedSlots after manual: ' . $usedSlots . ' -->';
  if ($usedSlots >= $totalSlots) {
    break;
  }
  $ptype = get_post_type($mid);
  if ($ptype === 'inthenews') {

    $newslink = get_field('news_link', $mid);
    $newsthumb = get_the_post_thumbnail_url($mid, 'medium');
    $newstitleformatted = ucwords(strtolower(get_the_title($mid)));
    ?>
    <div class="blogpost hover_arrow_story">
      <a href="<?php echo esc_url($newslink); ?>" target="_blank">
        <div class="thumb" style="background-image: url('<?php echo esc_url(
          $newsthumb
        ); ?>');"></div>
        <div class="txt">
          <div class="txt-wrap">
           <b><?php echo $newstitleformatted; ?></b><br>
          <?php echo get_the_date('F j, Y', $mid); ?>
          </div>
          <div class="arrow_wrap">
            <div id="cta_arrow">
              <span class="arrow_right primera black"></span>
              <span class="arrow_right segunda black"></span>
            </div>
          </div>
        </div>
      </a>
    </div>
    <?php
  } else {
    $blogthumb = get_the_post_thumbnail_url($mid, 'large'); ?>
    <div class="blogpost hover_arrow_story">
      <a href="<?php echo get_permalink($mid); ?>">
        <div class="thumb" style="background-image: url('<?php echo esc_url(
          $blogthumb
        ); ?>');"></div>
        <div class="txt">
          <div class="txt-wrap">
            <b><?php echo get_the_title($mid); ?></b><br>
            <?php echo get_the_date('F j, Y', $mid); ?>
          </div>
          <div class="arrow_wrap">
            <div id="cta_arrow">
              <span class="arrow_right primera black"></span>
              <span class="arrow_right segunda black"></span>
            </div>
          </div>
        </div>
      </a>
    </div>
    <?php
  }
  $usedSlots++;
} // 2. FILL REMAINING SLOTS FROM THE BLOG QUERY
$remaining = $totalSlots - $usedSlots;
if ($remaining > 0) {
  $argsall = [
    'post_type' => 'post',
    'posts_per_page' => 50,
    'post__not_in' => $manual_featured_ids,
  ];
  if (empty($blogcategoriesarray)) {
    $args = $argsall;
  } else {
    $args = [
      'post_type' => 'post',
      'posts_per_page' => 50,
      'post__not_in' => $manual_featured_ids,
      'tax_query' => [
        'relation' => 'OR',
        [
          'taxonomy' => 'blog_category',
          'field' => 'slug',
          'terms' => $blogcategoriesarray,
        ],
      ],
    ];
  }
  echo '<!-- blogcategoriesarray:' .
    print_r($blogcategoriesarray, true) .
    ' -->';
  $the_query = new WP_Query($args);
  if ($the_query->found_posts == 0) {
    $the_query = new WP_Query($argsall);
  }
  while ($the_query->have_posts() && $usedSlots < $totalSlots) {

    $the_query->the_post();
    $blogthumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
    ?>
    <div class="blogpost hover_arrow_story">
      <a href="<?php the_permalink(); ?>">
        <div class="thumb" style="background-image: url('<?php echo esc_url(
          $blogthumb
        ); ?>');"></div>

        <div class="txt">
          <div class="txt-wrap">
           <b><?php the_title(); ?></b><br>
          <?php echo get_the_date('F j, Y'); ?>
          </div>
          <div class="arrow_wrap">
            <div id="cta_arrow">
              <span class="arrow_right primera black"></span>
              <span class="arrow_right segunda black"></span>
            </div>
          </div>
        </div>
      </a>
    </div>
    <?php $usedSlots++;
  }
  wp_reset_postdata();
} // 3. FILL ANY SLOTS STILL LEFT FROM "IN THE NEWS"
$remaining = $totalSlots - $usedSlots;
if ($remaining > 0) {
  $args_inthenews = [
    'post_type' => 'inthenews',
    'post_status' => 'publish',
    'offset' => 0,
    'posts_per_page' => 100,
    'post__not_in' => $manual_featured_ids,
    'orderby' => 'date',
    'order' => 'DESC',
  ];
  echo '<!-- blogcategoriesarray: ' .
    print_r($blogcategoriesarray, true) .
    ' -->';
  $arr_posts = new WP_Query($args_inthenews);
  if ($arr_posts->have_posts()) {
    while ($arr_posts->have_posts() && $usedSlots < $totalSlots) {
      $arr_posts->the_post();
      $post_id = get_the_ID();
      $oktoshow = false;
      $cats = get_the_terms($post_id, 'portfolio_category');
      $tags = get_the_terms($post_id, 'portfolio_tag');
      if ($cats) {
        foreach ($cats as $cat) {
          $catclean = preg_replace(
            '/[^a-zA-Z0-9\']/',
            '-',
            strtolower($cat->name)
          );
          if (in_array($catclean, $blogcategoriesarray)) {
            $oktoshow = true;
            echo '<!-- cat match found for ' . get_the_title() . ' -->';
          }
        }
      }
      if ($tags) {
        foreach ($tags as $tag) {
          $tagclean = preg_replace(
            '/[^a-zA-Z0-9\']/',
            '-',
            strtolower($tag->name)
          );
          if (in_array($tagclean, $blogcategoriesarray)) {
            $oktoshow = true;
            echo '<!-- tag match found for ' . get_the_title() . ' -->';
          }
        }
      }
      if ($oktoshow) {

        $newstitleformatted = ucwords(strtolower(get_the_title()));
        $newsthumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
        $newslink = get_field('news_link');
        ?>
        <div class="blogpost hover_arrow_story">
          <a href="<?php echo esc_url($newslink); ?>" target="_blank">
            <div class="thumb" style="background-image: url('<?php echo esc_url(
              $newsthumb
            ); ?>');"></div>
            <div class="txt">
              <div class="txt-wrap">
              <b><?php the_title(); ?></b><br>
              <?php echo get_the_date('F j, Y'); ?>
              </div>
              <div class="arrow_wrap">
                <div id="cta_arrow">
                  <span class="arrow_right primera black"></span>
                  <span class="arrow_right segunda black"></span>
                </div>
              </div>
            </div>
          </a>
        </div>
        <?php $usedSlots++;
      }
    }
  }
  wp_reset_postdata();
}
?>
</div>







</div>
  <?php
/////////////////////////// END BLOG AND NEWS COMBINED //////////////////////////////
?>
</div>

<style>

  .link1 {
    margin-bottom:5px!important;
  }
  .blogandnews {
    display: inline-block;
    margin-bottom:50px;
    width:100%;
  }
  img.newsthumb {
    width: 250px;
    height: 250px;
    object-fit: cover;
  }
  img.inthenews-thumbsrc {
    width: 250px;
    height: 250px;
    object-fit: cover;
  }
  .blogandnews.separate{
    display:none;
  }

  .blogandnewsheader.separate{
    display:none;
  }

  .blogandnewsstory{
    padding:0;
    display: inline-block;
    vertical-align: top;
    width:24%;
    margin-right: 10px;
  }

  .blogandnewsstory:nth-of-type(4){
    margin-right: 0px;
  }

  .inthenews-title {
    text-transform: none;
    font-weight:700;
  }

  .inthenews-post{
    padding:0;
    display: inline-block;
    vertical-align: top;
    width:24%;
    margin-right: 10px;
  }
  .inthenews-post:nth-of-type(4){
    margin-right: 0px;
  }

  .articledate{
    font-weight:500;
  }

  .tsy-overlay{
    width: 50%;
    margin-left: 8%;
    margin-top: 0;
  }

  @media(max-width:1200px){
    .blogandnewsstory{
      width:46%;
    }
    .inthenews-post{
      width:46%;
    }
    img.newsthumb {
      width: 100%;
      height: 100%;
    }
    img.inthenews-thumbsrc {
      width: 100%;
      height: 100%;
    }
    .tsy-overlay{
      margin-top: 7%;
      width:65%;
    }
  }

  @media(max-width:767px){
    .blogandnewsstory{
      width:100%;
      margin-bottom:20px;
    }
    img.newsthumb {
      width: 100%;
      height: 100%;
    }
    .inthenews-post{
      width:100%;
      margin-bottom:20px;
    }
    img.inthenews-thumbsrc {
      width: 100%;
      height: 100%;
    }
    .tsy-overlay{
      margin-top: 14%;
      width:80%;
    }
  }

  .blogandnewsheader{
    width:100%;
    background:#000;
    padding:20px;
    text-align:center;
    margin-bottom:20px;
  }
  .blogandnewsheader h3{
    color:#fff;
  }

  .newsleft{
    width:190px;
    float:left;
    margin-top:6px;
  }
  .newsright{
    width:60px;
    float:right;
    margin-top:0px;
  }

  .articletitle{
    font-weight:700;
  }

  #cta_arrow {
    width:30px;
  }


#blogposts {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-gap: 20px;
  margin-bottom: 40px;
}

@media screen and (max-width: 1024px) {
  #blogposts {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 20px;
  }
}

.blogpost {
  display: grid;
  grid-template-columns: 1fr;
  grid-gap: 30px;
  align-items: flex-start;
  justify-content: flex-start;
}

.blogpost .thumb {
  width: 100%;
  aspect-ratio: 1 / 1;
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  margin-bottom: 10px;
}

.blogpost .txt a {
  display: block;
  font-weight:700;
}

.txt {
  display: grid;
  grid-template-columns: 1fr 40px;
}

.txt-wrap {
  grid-column: 1/2;
}

.txt .txt-wrap b {
  background-image: linear-gradient(#fff, #000);
  background-repeat: no-repeat;
  background-position: 0 100%;
  background-size: 0% 2px;
  transition: background-size 0.3s ease;
  cursor: pointer;
}

.txt .arrow-wrap {
  grid-column: 2/3;
}

.blogpost:hover.txt-wrap .txt b {
  background-size: 100% 2px;
}

.txt-wrap .txt b::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: -2px;
  width: 100%;
  height: 1px;
  background-color: #000;
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.3s ease;
}

.blogpost:hover .txt-wrap .txt b::after {
  transform: scaleX(1);
}






</style>



<?php get_footer(); ?>
