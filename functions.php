<?php
/**
 * Ankrom Moisan functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ankrom_Moisan
 */

//  SVG
function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

if (!defined('_S_VERSION')) {
  // Replace the version number of the theme on each release.
  define('_S_VERSION', '1.0.0');
}

if (!function_exists('ankrom_moisan_setup')):
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function ankrom_moisan_setup()
  {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Ankrom Moisan, use a find and replace
     * to change 'ankrom-moisan' to the name of your theme in all the template files.
     */
    load_theme_textdomain(
      'ankrom-moisan',
      get_template_directory() . '/languages'
    );

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus([
      'menu-1' => esc_html__('Primary', 'ankrom-moisan'),
    ]);

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', [
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'style',
      'script',
    ]);


    // Set up the WordPress core custom background feature.
    add_theme_support(
      'custom-background',
      apply_filters('ankrom_moisan_custom_background_args', [
        'default-color' => 'ffffff',
        'default-image' => '',
      ])
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support('custom-logo', [
      'height' => 250,
      'width' => 250,
      'flex-width' => true,
      'flex-height' => true,
    ]);
  }
endif;
add_action('after_setup_theme', 'ankrom_moisan_setup');

//Remove Gutenberg Block Library CSS from loading on the frontend
/*
function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
}
*/
//add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );
// https://smartwp.com/remove-gutenberg-css/

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ankrom_moisan_content_width()
{
  $GLOBALS['content_width'] = apply_filters('ankrom_moisan_content_width', 640);
}
add_action('after_setup_theme', 'ankrom_moisan_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ankrom_moisan_widgets_init()
{
  register_sidebar([
    'name' => esc_html__('Sidebar', 'ankrom-moisan'),
    'id' => 'sidebar-1',
    'description' => esc_html__('Add widgets here.', 'ankrom-moisan'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
  ]);
}
add_action('widgets_init', 'ankrom_moisan_widgets_init');


/**
 * Enqueue scripts and styles.
 */
function ankrom_moisan_scripts()
{
  wp_enqueue_style('ankrom-moisan-style', get_stylesheet_uri(), [], _S_VERSION);
  wp_enqueue_style(
    'bootstrap',
    get_stylesheet_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css',
    [],
    filemtime(
      get_stylesheet_directory() . '/assets/css/bootstrap/bootstrap.min.css'
    )
  );
  wp_enqueue_style('dashicons');
  wp_style_add_data('ankrom-moisan-style', 'rtl', 'replace');

  wp_enqueue_style(
    'main',
    get_template_directory_uri() . '/dist/style.css',
    null,
    null
  );

  wp_enqueue_script(
    'ankrom-moisan-navigation',
    get_template_directory_uri() . '/js/navigation.js',
    [],
    _S_VERSION,
    true
  );
  wp_enqueue_script(
    'rellax',
    'https://cdnjs.cloudflare.com/ajax/libs/rellax/1.0.0/rellax.min.js',
    ['jquery'],
    false,
    true
  );
  wp_enqueue_script(
    'twentyseventeen-skip-link-focus-fix',
    get_theme_file_uri('/js/main-script.js'),
    [],
    false,
    true
  );
  wp_enqueue_script(
    'mainJS',
    get_template_directory_uri() . '/dist/main.js',
    ['jquery'],
    '',
    true
  );

  // if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
  //wp_enqueue_script( 'comment-reply' );
  // }
}
add_action('wp_enqueue_scripts', 'ankrom_moisan_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}

add_filter('manage_posts_columns', 'revealid_add_id_column', 5);
add_action('manage_posts_custom_column', 'revealid_id_column_content', 5, 2);

function revealid_add_id_column($columns)
{
  $checkbox = array_slice($columns, 0, 1);
  $columns = array_slice($columns, 1);

  $id['revealid_id'] = 'ID';

  $columns = array_merge($checkbox, $id, $columns);
  return $columns;
}

function revealid_id_column_content($column, $id)
{
  if ('revealid_id' == $column) {
    echo $id;
  }
}

/**
 * Prevent update notification for ACF plugin
 */
function disable_plugin_updates($value)
{
  if (isset($value) && is_object($value)) {
    if (isset($value->response['advanced-custom-fields-pro/acf.php'])) {
      unset($value->response['advanced-custom-fields-pro/acf.php']);
    }
  }
  return $value;
}
add_filter('site_transient_update_plugins', 'disable_plugin_updates');

function my_acf_input_admin_footer()
{
  ?>
<style>
  td.acf-field.acf-field-text[data-name="project_id"] {
    display: flex;
    align-items: center;
}
.fetch_project_button_wrap {
    margin-left: 20px;
}
button.fetch_project_button {
    background: #000;
    color: #fff;
    padding: 7px 20px;
    border: 0;
    text-transform: uppercase;
    border-radius: 0;
    cursor: pointer;
}
.acf-field.acf-field-text[data-name="project_id"] .acf-input .acf-input-wrap input {
    border-radius: 0px !important;
}
#titlediv label#title-prompt-text {
    display: none;
}
[data-name="fetch_data"] [data-name="project_id"] {
    display: flex;
    flex-wrap: wrap;
}
[data-name="fetch_data"] [data-name="project_id"] .acf-label {
    width: 100%;
}
[data-name="select_market_sector_type"] .acf-input select option.disable {
    display: none;
}
[data-name="disable_overwrite"] {
    width: 10% !important;
}
[data-name="preview_image"],
.img_preview_block [data-type="message"]:not(.preview) {
    width: 5% !important;
}
.preview{
  width: 100% !important;
}
div.img_preview_block .preview .acf-input p.preview_image_icon{
  margin: 0;
}
div.img_preview_block .preview .acf-input p.preview_image_icon:after{
  content: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDI1LjIuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPgo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkNhcGFfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiCgkgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPHBhdGggZD0iTTUxMiwwSDB2NTEyaDY1LjRINTEydi02NS40VjY1LjRWMHogTTQ4MS44LDQ0Ni42djM1LjNINjUuNEgzMC4ydi05MC4zbDk5LjMtODQuNWMzLjYtMy4xLDguOS0zLjEsMTIuNi0wLjFsNjIuMiw1MS42CgljNiw1LDE0LjgsNC42LDIwLjMtMC45bDE0Ny43LTE0OGMyLjctMi43LDUuOC0yLjksNy40LTIuOWMxLjYsMC4xLDQuNywwLjcsNy4xLDMuNmw5NS4yLDExNy4yTDQ4MS44LDQ0Ni42eiBNNDgxLjgsMjc5LjkKCWwtNzEuOC04OC40Yy03LjEtOC44LTE3LjctMTQuMS0yOC45LTE0LjdjLTExLjMtMC42LTIyLjMsMy43LTMwLjMsMTEuN2wtMTM4LDEzOC4ybC01MS42LTQyLjhjLTE1LTEyLjQtMzYuNi0xMi4zLTUxLjQsMC4zCglMMzAuMiwzNTJWMzAuMmgzNS4zaDQxNi40djM1LjNWMjc5Ljl6IE0xNjEuMiw2M2MtNDAuMSwwLTcyLjcsMzIuNi03Mi43LDcyLjdjMCw0MC4xLDMyLjYsNzIuNyw3Mi43LDcyLjdzNzIuNy0zMi42LDcyLjctNzIuNwoJUzIwMS4zLDYzLDE2MS4yLDYzeiBNMTYxLjIsMTc4LjNjLTIzLjUsMC00Mi42LTE5LjEtNDIuNi00Mi42YzAtMjMuNSwxOS4xLTQyLjYsNDIuNi00Mi42czQyLjYsMTkuMSw0Mi42LDQyLjYKCVMxODQuNiwxNzguMywxNjEuMiwxNzguM3oiLz4KPC9zdmc+Cg==);
  width: 30px;
  display: block;
  cursor: pointer;
}
/*
.preview_image_wrap .preview_image_block{
  display: none;
}
*/

.acf-input .preview_image_wrap{
  display: none;
}
.acf-input.active .preview_image_wrap{
  display: block;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    width: 100%;
    height: 100vh;
    z-index: 10;
    background: rgb(0 0 0 / 61%);
}
.acf-input.active .preview_image_wrap .preview_image_block{
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    max-width: 1000px;
    width: 100%;
    z-index: 10;
}
.acf-input.active .preview_image_wrap .preview_image_block{
  pointer-events: none;
}
span.preview_image_close {
    position: absolute;
    right: 50px;
    top: 50px;
    color: #fff;
    font-size: 17px;
    font-weight: 400;
    border: 1px solid;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 0;
    border-radius: 100px;
    padding: 0;
    margin: 0;
    cursor: pointer;
    text-transform: uppercase;
}

</style>
<script type="text/javascript">

/*
  const previewImageIcons = document.querySelectorAll('.img_preview_block .preview .acf-input');
  previewImageIcons.forEach(preview => {
    const previewImageLink = document.createElement('p');
    previewImageLink.classList.add('preview_image_icon');
    const previewImageDiv = document.createElement('div');
    previewImageDiv.classList.add('preview_image_wrap');
    const previewImageClose = document.createElement('span');
    previewImageClose.classList.add('preview_image_close');
    previewImageClose.innerHTML = 'x';
    const previewImageNew = document.createElement('img');
    previewImageNew.classList.add('preview_image_block');
    if(preview.closest('.acf-table')){
      if(preview.closest('.acf-table').querySelector('tbody .acf-field.acf-field-text:is([data-name="image"], [data-name="medium"]) input').value){
        previewImageNew.src = preview.closest('.acf-table').querySelector('tbody .acf-field.acf-field-text:is([data-name="image"], [data-name="medium"]) input').value;
        preview.appendChild( previewImageLink );
        preview.appendChild( previewImageDiv );
        previewImageDiv.appendChild( previewImageNew );
        previewImageDiv.appendChild( previewImageClose );
      }
    }
  });

  const previewImageIconsClick = document.querySelectorAll('div.img_preview_block .preview .acf-input p');
  const previewImageClose = document.querySelectorAll('div.img_preview_block .preview .acf-input .preview_image_close');
  const previewImageOuter = document.querySelectorAll('div.img_preview_block .preview .acf-input .preview_image_wrap');

  function activatePreview(e) {
    e.target.closest('.acf-input').classList.add('active');
  }
  previewImageIconsClick.forEach(preview => {preview.addEventListener('click', activatePreview)});

  function deactivatePreview(e) {
    e.target.closest('.acf-input').classList.remove('active');
  }
  previewImageClose.forEach(hide => {hide.addEventListener('click', deactivatePreview)});
  previewImageOuter.forEach(hide => {hide.addEventListener('click', deactivatePreview)});


  const pageRichText = document.querySelector('div#postdivrich');
  (pageRichText) ? pageRichText.remove() : '';

  */

  const selectTemplate = document.querySelector('#pageparentdiv .inside select');
  const fetchProjectGroup = document.querySelector('[data-name="fetch_data"]');
  const fetchProjectInputDiv = document.querySelector('.acf-field[data-name="project_id"]');
  const fetchButtonDiv = document.createElement('div');
  fetchButtonDiv.classList.add('fetch_project_button_wrap');
  fetchButtonDiv.innerHTML = '<button type="button" class="fetch_project_button">Fetch Project</button>';

  if (fetchProjectInputDiv) {
    fetchProjectInputDiv.appendChild( fetchButtonDiv );
  }
  const fetchButton = document.querySelector('.fetch_project_button');

  const templateSelector = document.querySelector('div#pageparentdiv select#page_template');

  const username = 'website_front_end';
  const password = 'ankrom';
  const seoDescriptionData = (method, url, data) => {

        return fetch(url, {headers: {
            'Content-Type': 'text/plain',
            'Authorization': 'Basic ' + btoa(`${username}:${password}`),
        },})
        .then(response => {
            return response.json();
        });
    };

  const disciplineTemplate = document.querySelector('div#acf-group_5fbd93eacc6c7');
  const projectTemplate = document.querySelector('div#acf-group_5fbe9f5ed635d');
  const sectorTemplate = document.querySelector('div#acf-group_5fbd4212a95bd');

  const checkedBoxesInput = document.querySelectorAll('[data-name="disable_overwrite"] input[type="checkbox"]');
  const checkedBoxesOn = document.querySelectorAll('[data-name="disable_overwrite"] label .acf-switch');


  //Categories - Location (lat/long)
  let projectLocDis = document.querySelector('[data-name="project_location"] [data-name="disable_overwrite"] label .acf-switch:not(.deactive_link)');
  let projectLocLat = document.querySelector('[data-name="project_location"] .acf-field[data-name="latitude"] input:not(.deactive_link)');
  let projectLocLong = document.querySelector('[data-name="project_location"] .acf-field[data-name="longitude"] input:not(.deactive_link)');


  function disableFields(){
    setTimeout(function(){
    projectLocDis = document.querySelector('[data-name="project_location"] [data-name="disable_overwrite"] label .acf-switch:not(.deactive_link)');
    projectLocLat = document.querySelector('[data-name="project_location"] .acf-field[data-name="latitude"] input:not(.deactive_link)');
    projectLocLong = document.querySelector('[data-name="project_location"] .acf-field[data-name="longitude"] input:not(.deactive_link)');
    }, 2000);

    if(projectLocDis){
      if(projectLocDis.classList.contains('-on')){
        projectLocDis.previousSibling.previousSibling.classList.add('deactive_link');
        projectLocLat.classList.add('deactive_link');
        projectLocLong.classList.add('deactive_link');
      }else{
        projectLocLat.classList.remove('deactive_link');
        projectLocLong.classList.remove('deactive_link');
      }
    }
    checkedBoxesInput.forEach((activeImg, i) => {
      if(activeImg.checked == true || checkedBoxesOn[i].classList.contains('-on')){
        if(activeImg.closest('[data-type="group"]').querySelector('tbody .acf-field.acf-field-text:is([data-name="image"], [data-name="medium"], [data-name="photographer_credit"], [data-name="small"]) input')){
          activeImg.closest('[data-type="group"]').querySelector('tbody .acf-field.acf-field-text:is([data-name="image"], [data-name="medium"], [data-name="photographer_credit"], [data-name="small"]) input').classList.add('deactive_link');
          activeImg.closest('[data-type="group"]').querySelector('tbody .acf-field.acf-field-text[data-name="photographer_credit"] input').classList.add('deactive_link');
          activeImg.classList.add('deactive_link');
        }
        if(activeImg.closest('[data-type="group"]').querySelector('tbody .acf-field.acf-field-text[data-name="small"]')){
          activeImg.closest('[data-type="group"]').querySelector('tbody .acf-field.acf-field-text[data-name="small"] input').classList.add('deactive_link');
        }
      }else{
// 				console.log(activeImg.closest('[data-type="group"]').querySelector('tbody .acf-field.acf-field-text:is([data-name="image"], [data-name="medium"], [data-name="photographer_credit"], [data-name="small"]) input'));
        if(activeImg.closest('[data-type="group"]').querySelector('tbody .acf-field.acf-field-text:is([data-name="image"], [data-name="medium"], [data-name="photographer_credit"], [data-name="small"]) input')){
          activeImg.closest('[data-type="group"]').querySelector('tbody .acf-field.acf-field-text:is([data-name="image"], [data-name="medium"], [data-name="photographer_credit"], [data-name="small"]) input').classList.remove('deactive_link');
          activeImg.closest('[data-type="group"]').querySelector('tbody .acf-field.acf-field-text[data-name="photographer_credit"] input').classList.remove('deactive_link');
        }
      }
    });
  }

  window.addEventListener('load', disableFields);
  document.addEventListener('change', disableFields);

  const notDisabledImgUrls = document.querySelectorAll('div#acf-group_5fbe9f5ed635d tbody .acf-field.acf-field-text:is([data-name="image"], [data-name="medium"]) input:not(.deactive_link)');
  const previewImageSrc = document.querySelectorAll('div#acf-group_5fbe9f5ed635d .acf-field.acf-field-group .acf-field.acf-field-message[data-type="message"] .acf-input img');


//////////////////////////////////////// FETCH PROJECT DATA ///////////////////////////////////////////////


  function fetchProjectData(e) {

    console.log("Fetching Project Data from Open Asset");

    const allInputs = document.querySelectorAll('div#acf-group_5fbe9f5ed635d input:not(.deactive_link)');
// 		console.log(allInputs);
    const allTextarea = document.querySelectorAll('div#acf-group_5fbe9f5ed635d textarea');
    const sidebarCategory = document.querySelectorAll('div#portfolio_categorydiv ul#portfolio_categorychecklist input')
    allInputs.forEach(input => input.value = '' );
    allTextarea.forEach(textarea => textarea.value = '' );
    sidebarCategory.forEach(checkbox => checkbox.checked = false);
    //Fetch ID input
    const projectFetchIdInput = document.querySelector('.acf-field.acf-field-text[data-name="project_id"] .acf-input .acf-input-wrap input');

    //Combined Stories
    const projectCombinedStories = document.querySelectorAll('div[data-name="stories_to_combine"] ul li input');
    const projectCombinedStoriesTwo = document.querySelectorAll('div[data-name="stories_to_combine_2"] ul li input');
    projectCombinedStories.forEach(combinedOne => {
// 			console.log(combinedOne[0].value);
/*
      if(combinedOne.checked == true){
        console.log(combinedOne);
        console.log(combinedOne.closest('label').text);
      }
*/
    })
// 		console.log(projectCombinedStories);

    //Project Title input + label
    const projectTitleField = document.querySelector('div#post-body div#titlediv input#title');

    // Project Top Content (subtitle + content)
    //Slideshow
    const projectTopSlideShow = document.querySelectorAll('[data-name="top_page_slidershow"] .acf-field[data-name="image"] input:not(.deactive_link)');
    const projectTopSlideShowCredit = document.querySelectorAll('[data-name="top_page_slidershow"] .acf-field[data-name="photographer_credit"] input:not(.deactive_link)');
    const projectTopContentSubTitle = document.querySelector('[data-name="top_project_content"] [data-name="project_subtitle"] input');
    const projectTopContentText = document.querySelector('[data-name="top_project_content"] [data-name="project_content"] textarea');

    // Architecture Content (subtitle + content)
    const architectureSlideShow = document.querySelectorAll('[data-name="architecture_project_slideshow"] .acf-field[data-name="medium"] input:not(.deactive_link)');
    const architectureSlideShowSmall = document.querySelectorAll('[data-name="architecture_project_slideshow"] .acf-field[data-name="small"] input:not(.deactive_link)');
    const architectureSlideShowCredit = document.querySelectorAll('[data-name="architecture_project_slideshow"] .acf-field[data-name="photographer_credit"] input:not(.deactive_link)');
// 		console.log(architectureSlideShowCredit);
    const architectureContentSubTitle = document.querySelector('[data-name="architecture_project_content"] [data-name="project_subtitle"] input');
    const architectureContentText = document.querySelector('[data-name="architecture_project_content"] [data-name="project_content"] textarea');

    // Interior Content (subtitle + content)
    const interiorSlideShow = document.querySelectorAll('[data-name="interior_project_slideshow"] .acf-field[data-name="medium"] input:not(.deactive_link)');
    const interiorSlideShowSmall = document.querySelectorAll('[data-name="interior_project_slideshow"] .acf-field[data-name="small"] input:not(.deactive_link)');
    const interiorSlideShowCredit = document.querySelectorAll('[data-name="interior_project_slideshow"] .acf-field[data-name="photographer_credit"] input:not(.deactive_link)');
    const interiorContentSubTitle = document.querySelector('[data-name="interior_project_content"] [data-name="project_subtitle"] input');
    const interiorContentText = document.querySelector('[data-name="interior_project_content"] [data-name="project_content"] textarea');

    // Planning Content (subtitle + content)
    const planningSlideShow = document.querySelectorAll('[data-name="planning_project_slideshow"] .acf-field[data-name="medium"] input:not(.deactive_link)');
    const planningSlideShowSmall = document.querySelectorAll('[data-name="planning_project_slideshow"] .acf-field[data-name="small"] input:not(.deactive_link)');
    const planningSlideShowCredit = document.querySelectorAll('[data-name="planning_project_slideshow"] .acf-field[data-name="photographer_credit"] input:not(.deactive_link)');
    const planningContentSubTitle = document.querySelector('[data-name="planning_project_content"] [data-name="project_subtitle"] input');
    const planningContentText = document.querySelector('[data-name="planning_project_content"] [data-name="project_content"] textarea');

    // Brand Content (subtitle + content)
    const brandSlideShow = document.querySelectorAll('[data-name="brand_project_slideshow"] .acf-field[data-name="medium"] input:not(.deactive_link)');
    const brandSlideShowSmall = document.querySelectorAll('[data-name="brand_project_slideshow"] .acf-field[data-name="small"] input:not(.deactive_link)');
    const brandSlideShowCredit = document.querySelectorAll('[data-name="brand_project_slideshow"] .acf-field[data-name="photographer_credit"] input:not(.deactive_link)');
    const brandContentSubTitle = document.querySelector('[data-name="brand_project_content"] [data-name="project_subtitle"] input');
    const brandContentText = document.querySelector('[data-name="brand_project_content"] [data-name="project_content"] textarea');


    // Design Content (subtitle + content)
    const designSlideShow = document.querySelectorAll('[data-name="design_project_slideshow"] .acf-field[data-name="medium"] input:not(.deactive_link)');
    const designSlideShowSmall = document.querySelectorAll('[data-name="design_project_slideshow"] .acf-field[data-name="small"] input:not(.deactive_link)');
    const designSlideShowCredit = document.querySelectorAll('[data-name="design_project_slideshow"] .acf-field[data-name="photographer_credit"] input:not(.deactive_link)');
    const designContentSubTitle = document.querySelector('[data-name="design_project_content"] [data-name="project_subtitle"] input');
    const designContentText = document.querySelector('[data-name="design_project_content"] [data-name="project_content"] textarea');


    // Process Content (subtitle + content)
    const processSlideShow = document.querySelectorAll('[data-name="process_project_slideshow"] .acf-field[data-name="medium"] input:not(.deactive_link)');
    const processSlideShowSmall = document.querySelectorAll('[data-name="process_project_slideshow"] .acf-field[data-name="small"] input:not(.deactive_link)');
    const processSlideShowCredit = document.querySelectorAll('[data-name="process_project_slideshow"] .acf-field[data-name="photographer_credit"] input:not(.deactive_link)');
    const processContentSubTitle = document.querySelector('[data-name="process_project_content"] [data-name="project_subtitle"] input');
    const processContentText = document.querySelector('[data-name="process_project_content"] [data-name="project_content"] textarea');


    // Image Preview Btn
    const previewImageIcons = document.querySelectorAll('div#acf-group_5fbe9f5ed635d .acf-field.acf-field-message[data-type="message"] .acf-input p');

    // Disabled
    const disabledImgUrls = document.querySelectorAll('div#acf-group_5fbe9f5ed635d tbody .acf-field.acf-field-text:is([data-name="image"], [data-name="medium"]) input.deactive_link');

    // Sidebar
    const sidebarCity = document.querySelector('[data-name="project_sidebar"] [data-name="city"] input');
    const sidebarState = document.querySelector('[data-name="project_sidebar"] [data-name="state"] input');
    const sidebarCompleted = document.querySelector('[data-name="project_sidebar"] [data-name="completed"] input');
    const sidebarStatus = document.querySelector('[data-name="project_sidebar"] [data-name="project_status"] input');
    const sidebarUnits = document.querySelector('[data-name="project_sidebar"] [data-name="units"] input');
    const sidebarStories = document.querySelector('[data-name="project_sidebar"] [data-name="stories"] input');
    const sidebarSqft = document.querySelector('[data-name="project_sidebar"] [data-name="sq_ft"] input');
    const sidebarAcreage = document.querySelector('[data-name="project_sidebar"] [data-name="acreage"] input');
    const sidebarMarket = document.querySelector('[data-name="project_sidebar"] [data-name="market"] input');
    const sidebarDisciplines = document.querySelectorAll('[data-name="project_sidebar"] [data-name="disciplines"] input');
    const sidebarTypes = document.querySelectorAll('[data-name="project_sidebar"] [data-name="project_types"] input');
    const sidebarContactArch = document.querySelector('[data-name="project_sidebar"] [data-name="project_contacts"] [data-name="architecture"] input');
    const sidebarContactInter = document.querySelector('[data-name="project_sidebar"] [data-name="project_contacts"] [data-name="interiors"] input');
    const sidebarContactPlan = document.querySelector('[data-name="project_sidebar"] [data-name="project_contacts"] [data-name="planning"] input');
    const sidebarContactBrand = document.querySelector('[data-name="project_sidebar"] [data-name="project_contacts"] [data-name="brand"] input');
    const sidebarContactDesign = document.querySelector('[data-name="project_sidebar"] [data-name="project_contacts"] [data-name="design"] input');
    const sidebarContactProcess = document.querySelector('[data-name="project_sidebar"] [data-name="project_contacts"] [data-name="design"] input');
    const sidebarContactPrince = document.querySelector('[data-name="project_sidebar"] [data-name="project_contacts"] [data-name="principle"] input');

    const sidebarAwards = document.querySelector('[data-name="project_sidebar"] [data-name="awards"] textarea');
    const sidebarCertified = document.querySelector('[data-name="project_sidebar"] [data-name="certified"] textarea');

    // 	Project Rank
    const projectRank = document.querySelector('[data-name="project_sidebar"] [data-name="project_rank"] input');

    //Categories - Disciplines
    const architectureCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist input[value="2"]');
    const interiorCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist input[value="3"]');
    const planningCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist input[value="5"]');
    const brandCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist input[value="9"]');
    const designCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist input[value="142"]');
    const processCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist input[value="143"]');
    const ffeCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist input[value="192"]');
    //Categories - Location
    const oregonCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist input[value="68"]');
    const washingtonCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist input[value="69"]');
    const californaiCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist input[value="70"]');
    const nationalLocationCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist input[value="71"]');

    //Categories - Market Sectors
    const housingCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist input[value="4"]');
      const affordibleHousingCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="12"]');
      const midRiseCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="13"]');
      const highRiseCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="11"]');
      const urbanLivingCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist input[value="10"]');
    const officeCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist input[value="14"]');
      const coreShellCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="15"]');
      const corporateCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="16"]');
      const landlordCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="18"]');
      const workInteriorsCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="17"]');
    const seniorCommunityCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist input[value="19"]');
      const notForProfitCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="21"]');
      const seniorLivingCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="20"]');
    const healthcareCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist input[value="22"]');
      const acuteCareCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="24"]');
      const ambulatoryCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="26"]');
      const behavioralCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="25"]');
      const wellnessCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="23"]');
    const higherEducationCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist input[value="27"]');
      const classroomOfficeCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="28"]');
      const learningCenterCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="30"]');
      const studentLivingCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="29"]');
    const hospitalityCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist input[value="31"]');
      const destinationCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="33"]');
      const hotelsResortsCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="32"]');
      const renovationsCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="184"]');
      const hotelsCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="182"]');
      const resortsCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="183"]');
      const timesharesCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="185"]');
    const retailCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist input[value="34"]');
      const brandedCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="35"]');
      const corporateRetailCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="36"]');
    const communityCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist input[value="37"]');
      const civicCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="40"]');
      const culturalCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="39"]');
      const missionDrivenCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist  input[value="38"]');
    const onTheBoardCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist input[value="65"]');
    const masstimberCategory = document.querySelector('div#portfolio_categorydiv ul#portfolio_categorychecklist input[value="180"]');

/*
    projectLocDis = document.querySelector('[data-name="project_location"] [data-name="disable_overwrite"] label .acf-switch');
    projectLocLat = document.querySelector('[data-name="project_location"] .acf-field[data-name="latitude"] input');
    projectLocLong = document.querySelector('[data-name="project_location"] .acf-field[data-name="longitude"] input');
*/



/*
    if(projectLocLatDis.classList.contains('-on')){
      projectLocLat.classList.add('deactive_link');
      projectLocLong.classList.add('deactive_link');
    }
*/

// 		console.log(projectLocDis);
    let marketSector;
    let projectDichiplinesCategory = [];

    const getData=()=> {
        seoDescriptionData('GET', 'https://ankrommoisan.openasset.com/REST/1/Projects/?id=' + projectFetchIdInput.value + '&fields&location=all&projectKeywords=all&location=all') .then(responseData => {

        console.log("Getting OA Data...");
          console.log(responseData);

          projectTitleField.value = responseData[0].name;
          //console.log(projectTopContentText);
          //console.log(interiorContentSubTitle);

          let projectAddress = '';
          let projectZip = '';

                const fieldsId = responseData[0].fields.map(field => {
//  		                    console.log(field);
                        // Project Top Content
                        (field.id == 62) ? projectTopContentSubTitle.value = field.values : '';
              if (field.id == 5) {
                if ((field.values != '') && (field.values != null) ) {
                   projectTopContentText.value = field.values;
                }
                // use the Top Content story if it's not blank from Open Asset
              }
                        // Architecture Content
                        if (field.id == 63) {
                architectureContentSubTitle.value = field.values;
                // if there is no Top Project title then use Architecture
                if (projectTopContentSubTitle.value == '') {
                  projectTopContentSubTitle.value = field.values;
                }
              }
                        if (field.id == 4) {
                architectureContentText.value = field.values ;
                // if there is no Top Project content then use Architecture
                //if (projectTopContentText.value == '') {
                  projectTopContentText.value = field.values;
                //}
                //console.log("field id 4:" + field.values);
              }
                        // Interior Content
                        (field.id == 64 && field.values != '') ? interiorContentSubTitle.value = field.values : '';
                        (field.id == 57 && field.values != '') ? interiorContentText.value = field.values : '';
                        // Planning Content
                        (field.id == 65 && field.values != '') ? planningContentSubTitle.value = field.values : '';
                        (field.id == 58 && field.values != '') ? planningContentText.value = field.values : '';
                        // Brand Content
                        (field.id == 66 && field.values != '') ? brandContentSubTitle.value = field.values : '';
                        (field.id == 59 && field.values != '') ? brandContentText.value = field.values : '';
                        // Design Content
                        (field.id == 157 && field.values != '') ? designContentSubTitle.value = field.values : '';
                        (field.id == 158 && field.values != '') ? designContentText.value = field.values : '';
                        // Process Content
                        (field.id == 159 && field.values != '') ? processContentSubTitle.value = field.values : '';
                        (field.id == 160 && field.values != '') ? processContentText.value = field.values : '';
                        //Sidebar
                        (field.id == 48) ? sidebarCompleted.value = field.values : '';
                        (field.id == 105) ? sidebarStatus.value = field.values : '';
                  (field.id == 46) ? sidebarUnits.value = field.values : '';
                  (field.id == 45) ? sidebarStories.value = field.values : '';
                  (field.id == 33) ? sidebarSqft.value = field.values : '';
                  (field.id == 203) ? sidebarAcreage.value = field.values : '';
                  (field.id == 50) ? sidebarAwards.value = field.values : '';
                  (field.id == 51) ? sidebarCertified.value = field.values : '';

                  (field.id == 47 && !projectLocDis.classList.contains('deactive_link')) ? projectAddress = field.values.toString() : '';
                  (field.id == 49 && !projectLocDis.classList.contains('deactive_link')) ? projectZip = field.values.toString() : '';

                    });

// 		        let projectFullAddresstt = projectAddress.replace("\n", ", ");

/*
            console.log(projectAddress);
            console.log(projectZip);
*/
// 		        console.log(responseData[0].fields.id[49]);


            let projectKeyWords = responseData[0].projectKeywords.map(projectKeyWord => {
              return projectKeyWord.id;
            }).join(',');
          var oastring = 'https://ankrommoisan.openasset.com/REST/1/ProjectKeywords/?id=' + projectFetchIdInput.value + ',' + projectKeyWords + '&limit=0';
            seoDescriptionData('GET', oastring).then(keyword => {
            console.log('oastring:'+ oastring);
// 					    console.log(keyword);

              let projectDichiplines = [];
            let projectTypes = [];

            let projectAddressCity = '';
              let projectAddressState = '';

            // design and process are guesses - need to track down the real values
            // these IDs are from Open Asset - mapping to ACF fields
                  keyword.map(sidebarData => {
                    (sidebarData.name == 'Architecture' || sidebarData.name == 'Interiors' || sidebarData.name == 'Planning' || sidebarData.name == 'Brand' || sidebarData.name == 'Design' || sidebarData.name == 'Process' || sidebarData.name == 'FFE') ? projectDichiplinesCategory.push(sidebarData.name) : '';
                    (sidebarData.project_keyword_category_id == 5) ? projectDichiplines.push(sidebarData.name) : '';
                    (sidebarData.project_keyword_category_id == 11) ? projectTypes.push(sidebarData.name.substring(4, 200)) : '';
                    (sidebarData.project_keyword_category_id == 2) ? (sidebarCity.value = sidebarData.name) && (projectAddressCity = sidebarData.name) : '';
                (sidebarData.project_keyword_category_id == 6) ? (sidebarState.value = sidebarData.name) && (projectAddressState = sidebarData.name) : '';
                (sidebarData.project_keyword_category_id == 4) ? sidebarMarket.value = sidebarData.name : '';
                (sidebarData.project_keyword_category_id == 34) ? sidebarContactArch.value = sidebarData.name : '';
                (sidebarData.project_keyword_category_id == 33) ? sidebarContactInter.value = sidebarData.name : '';
                (sidebarData.project_keyword_category_id == 35) ? sidebarContactPlan.value = sidebarData.name : '';
                (sidebarData.project_keyword_category_id == 36) ? sidebarContactBrand.value = sidebarData.name : '';

                (sidebarData.project_keyword_category_id == 5 && sidebarData.id == 84) ? architectureCategory.checked = true : '';
                (sidebarData.project_keyword_category_id == 5 && sidebarData.id == 85) ? interiorCategory.checked = true : '';
                (sidebarData.project_keyword_category_id == 5 && sidebarData.id == 87) ? planningCategory.checked = true : '';
                (sidebarData.project_keyword_category_id == 5 && sidebarData.id == 897) ? brandCategory.checked = true : '';
                (sidebarData.project_keyword_category_id == 5 && sidebarData.id == 898) ? designCategory.checked = true : '';
                (sidebarData.project_keyword_category_id == 5 && sidebarData.id == 899) ? processCategory.checked = true : '';
                (sidebarData.project_keyword_category_id == 5 && sidebarData.id == 2577) ? ffeCategory.checked = true : '';

                (sidebarData.project_keyword_category_id == 6 && sidebarData.id == 169) ? oregonCategory.checked = true : '';
                (sidebarData.project_keyword_category_id == 6 && sidebarData.id == 217) ? washingtonCategory.checked = true : '';
                (sidebarData.project_keyword_category_id == 6 && sidebarData.id == 185) ? californaiCategory.checked = true : '';
                (sidebarData.project_keyword_category_id == 6 && sidebarData.id == 1980) ? nationalLocationCategory.checked = true : '';

                /* (sidebarData.project_keyword_category_id == 38) ? projectRank.value += sidebarData.name + ', ' : '';*//* not working and doesn't seem connected - DW */

                (sidebarData.project_keyword_category_id == 4 && sidebarData.id == 856) ? housingCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1967) ? affordibleHousingCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1610) ? midRiseCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1636) ? highRiseCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1633) ? urbanLivingCategory.checked = true : '';
                (sidebarData.project_keyword_category_id == 4 && sidebarData.id == 175) ? officeCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1714) ? coreShellCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1625) ? corporateCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1608) ? landlordCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1609) ? workInteriorsCategory.checked = true : '';
                (sidebarData.project_keyword_category_id == 4 && sidebarData.id == 1597) ? seniorCommunityCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1713) ? notForProfitCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1712) ? seniorLivingCategory.checked = true : '';
                (sidebarData.project_keyword_category_id == 4 && sidebarData.id == 75) ? healthcareCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1611) ? acuteCareCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1637) ? ambulatoryCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1629) ? behavioralCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1624) ? wellnessCategory.checked = true : '';
                (sidebarData.project_keyword_category_id == 4 && sidebarData.id == 857) ? higherEducationCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1635) ? classroomOfficeCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1622) ? learningCenterCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1627) ? studentLivingCategory.checked = true : '';

              (sidebarData.project_keyword_category_id == 4 && sidebarData.id == 197) ? hospitalityCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1620) ? destinationCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1801) ? hotelsResortsCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 2557) ? renovationsCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 2554) ? hotelsCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 2555) ? resortsCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 2556) ? timesharesCategory.checked = true : '';

                (sidebarData.project_keyword_category_id == 4 && sidebarData.id == 81) ? retailCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1634) ? brandedCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1711) ? corporateRetailCategory.checked = true : '';
                (sidebarData.project_keyword_category_id == 4 && sidebarData.id == 1600) ? communityCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1632) ? civicCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1626) ? culturalCategory.checked = true : '';
                  (sidebarData.project_keyword_category_id == 11 && sidebarData.id == 1614) ? missionDrivenCategory.checked = true : '';

                (sidebarData.project_keyword_category_id == 38 && sidebarData.name.includes('On the Boards')) ? onTheBoardCategory.checked = true : '';
                if (sidebarData.project_keyword_category_id == 4){
                  switch (sidebarData.name) {
                    case 'Housing':
                      marketSector = 792;
                    break;
                    case 'Affordable Housing':
                      marketSector = 800;
                    break;
                    case 'Office':
                      marketSector = 793;
                    break;
                    case 'Senior Communities':
                      marketSector = 794;
                    break;
                    case 'Healthcare':
                      marketSector = 796;
                    break;
                    case 'Higher Education':
                      marketSector = 797;
                    break;
                    case 'Hospitality':
                      marketSector = 798;
                    break;
                    case 'Retail':
                      marketSector = 799;
                    break;
                    case 'Community':
                      marketSector = 795;
                    break;
                    default:
                      marketSector = 0;
                }
              }
                  });

                  sidebarDisciplines.forEach((discipline, i) => {
// 			            	console.log(projectDichiplines[i]);
                    (projectDichiplines[i] != undefined) ? discipline.value = projectDichiplines[i] : '';
                  });
                  sidebarTypes.forEach((types, i) => {
                    (projectTypes[i] != undefined) ? types.value = projectTypes[i] : '';
                  });

            seoDescriptionData('GET', 'https://ankrommoisan.openasset.com/REST/1/Projects?id=' + marketSector + '&fields').then(sectorFields => {
              if(sectorFields[0]){
                sectorFields[0].fields.map(sectorPrinciple => {
                  (sectorPrinciple.id == 92) ? sidebarContactPrince.value = sectorPrinciple.values[0] : '';
                })
              }
            });
            let projectFullAddress = projectAddress.replace("\n", ", ") + ', ' + projectAddressCity + ', ' + projectAddressState + ', ' + projectZip;
                seoDescriptionData('GET', 'https://api.mapbox.com/geocoding/v5/mapbox.places/' + projectFullAddress +'.json?access_token=pk.eyJ1IjoiYW5rcm9tbW9pc2FuIiwiYSI6ImNrMXNkeHVxZjBmNTkzZnA0OHM0bW00Z3EifQ.jd4Bbp2LYbjaZEv696_Y3w') .then(responseDataMap=> {
            if(responseDataMap.features[0]){
              (responseDataMap.features[0].center[1]) ? projectLocLat.value = responseDataMap.features[0].center[1] : '';
              (responseDataMap.features[0].center[0]) ? projectLocLong.value = responseDataMap.features[0].center[0] : '';
            }
    /*
              console.log(responseDataMap.features[0].center[0]);
              console.log(responseDataMap.features[0].center[1]);
    */
            });

              });
//

            });


        seoDescriptionData('GET', 'https://ankrommoisan.openasset.com/REST/1/Files/?project_id=' + projectFetchIdInput.value + '&access_level=1&limit=0&rank=1,2&displayFields=id,rank,photographer_id&sizes=1,2,3,5,7,8&keywords=all') .then(imageData=> {
//  			    console.log(imageData);
          let topProjectSlider = [];
          let topProjectSliderCredit = [];

          let architectureImages = [];
          let interiorImages = [];
          let planningImages = [];
          let brandImages = [];
          let designImages = [];
          let processImages = [];

          let imagesData = [];

                  // design and process image ids are guesses - need to track down the real values


                      //	if(projectDis == 'Design'){
                      //		(image.id == 1970) ? topProjectSlider.push({id: images.keywords, linkmedium: images.sizes[4].http_root + images.sizes[4].http_relative_path, linksmall: images.sizes[3].http_root + images.sizes[3].http_relative_path, rank: images.rank, photographer: images.photographer_id }) : '';
                     // 	}
                      //	if(projectDis == 'Process){
                      //		(image.id == 1971) ? topProjectSlider.push({id: images.keywords, linkmedium: images.sizes[4].http_root + images.sizes[4].http_relative_path, linksmall: images.sizes[3].http_root + images.sizes[3].http_relative_path, rank: images.rank, photographer: images.photographer_id }) : '';
                     // 	}


////////////////// TOP PROJECTS SLIDER ////////////////////////////////////

                imageData.reverse().map(images => {

                  images.keywords.map(image => {

                       setTimeout(function(){
                      projectDichiplinesCategory.forEach(projectDis => {
                        if(projectDis == 'Architecture'){
                          (image.id == 1970) ? topProjectSlider.push({id: images.keywords, linkmedium: images.sizes[4].http_root + images.sizes[4].http_relative_path, linksmall: images.sizes[3].http_root + images.sizes[3].http_relative_path, rank: images.rank, photographer: images.photographer_id }) : '';
                        }
                        if(projectDis == 'Interiors'){
                          (image.id == 1968) ? topProjectSlider.push({id: images.keywords, linkmedium: images.sizes[4].http_root + images.sizes[4].http_relative_path, linksmall: images.sizes[3].http_root + images.sizes[3].http_relative_path, rank: images.rank, photographer: images.photographer_id }) : '';
                        }
                        if(projectDis == 'Planning'){
                          (image.id == 1967) ? topProjectSlider.push({id: images.keywords, linkmedium: images.sizes[4].http_root + images.sizes[4].http_relative_path, linksmall: images.sizes[3].http_root + images.sizes[3].http_relative_path, rank: images.rank, photographer: images.photographer_id }) : '';
                        }
                        if(projectDis == 'Brand'){
                          (image.id == 1969) ? topProjectSlider.push({id: images.keywords, linkmedium: images.sizes[4].http_root + images.sizes[4].http_relative_path, linksmall: images.sizes[3].http_root + images.sizes[3].http_relative_path, rank: images.rank, photographer: images.photographer_id }) : '';
                        }

                      })
                    }, 1000);
                    //console.log('image.id:'+image.id);
                    (image.id == 1970) ? architectureImages.push({linkmedium: images.sizes[4].http_root + images.sizes[4].http_relative_path, linksmall: images.sizes[3].http_root + images.sizes[3].http_relative_path, rank: images.rank, photographer: images.photographer_id}) : '';
                    (image.id == 1968) ? interiorImages.push({linkmedium: images.sizes[4].http_root + images.sizes[4].http_relative_path, linksmall: images.sizes[3].http_root + images.sizes[3].http_relative_path, rank: images.rank, photographer: images.photographer_id}) : '';
                    (image.id == 1967) ? planningImages.push({linkmedium: images.sizes[4].http_root + images.sizes[4].http_relative_path, linksmall: images.sizes[3].http_root + images.sizes[3].http_relative_path, rank: images.rank, photographer: images.photographer_id}) : '';
                    (image.id == 1969) ? brandImages.push({linkmedium: images.sizes[4].http_root + images.sizes[4].http_relative_path, linksmall: images.sizes[3].http_root + images.sizes[3].http_relative_path, rank: images.rank, photographer: images.photographer_id}) : '';
              (image.id == 1969) ? designImages.push({linkmedium: images.sizes[4].http_root + images.sizes[4].http_relative_path, linksmall: images.sizes[3].http_root + images.sizes[3].http_relative_path, rank: images.rank, photographer: images.photographer_id}) : '';
              (image.id == 1969) ? processImages.push({linkmedium: images.sizes[4].http_root + images.sizes[4].http_relative_path, linksmall: images.sizes[3].http_root + images.sizes[3].http_relative_path, rank: images.rank, photographer: images.photographer_id}) : '';

                  });

                });

////////////////// END TOP PROJECTS SLIDER ////////////////////////////////////

                setTimeout(function(){
                  //console.log(topProjectSlider);
                  //Top Images
// 		            	console.log(topProjectSlider);
            disabledImgUrls.forEach(disableUrl => { topProjectSlider = topProjectSlider.filter(x => x.linkmedium != disableUrl.value); });
// 						console.log(topProjectSlider);
                  topProjectSlider.sort(function(a, b) { return (b.rank - a.rank); });
                  topProjectSlider.reverse();
// 		            	console.log(topProjectSlider);
                  projectTopSlideShow.forEach((slide, i) => { /* console.log(topProjectSlider[i]); */(topProjectSlider[i]) ? slide.value = topProjectSlider[i].linkmedium : ''; });
                }, 1000);

              //Architecture Images
              if (architectureImages.length != 0){
// 				        console.log(architectureImages);
                disabledImgUrls.forEach(disableUrl => { architectureImages = architectureImages.filter(x => x.linkmedium != disableUrl.value); });
// 				        console.log(architectureImages);
                architectureImages.sort(function(a, b) { return (a.rank - b.rank); });
                  architectureSlideShow.forEach((slide, i) => { (architectureImages[i]) ? slide.value = architectureImages[i].linkmedium : ''; });
                  architectureSlideShowSmall.forEach((slide, i) => { (architectureImages[i]) ? slide.value = architectureImages[i].linksmall : ''; });
                }
                //Interior Images
                if (interiorImages.length != 0){
// 			            console.log(interiorImages);
                  disabledImgUrls.forEach(disableUrl => { interiorImages = interiorImages.filter(x => x.linkmedium != disableUrl.value); });
// 			            console.log(interiorImages);
                  interiorImages.sort(function(a, b) { return (a.rank - b.rank); });
                  interiorSlideShow.forEach((slide, i) => { (interiorImages[i]) ? slide.value = interiorImages[i].linkmedium : ''; });
                  interiorSlideShowSmall.forEach((slide, i) => { (interiorImages[i]) ? slide.value = interiorImages[i].linksmall : ''; });
                }
                //Planning Images
                if (planningImages.length != 0){
                  disabledImgUrls.forEach(disableUrl => { planningImages = planningImages.filter(x => x.linkmedium != disableUrl.value); });
                  planningImages.sort(function(a, b) { return (a.rank - b.rank); });
                  planningSlideShow.forEach((slide, i) => { (planningImages[i]) ? slide.value = planningImages[i].linkmedium : ''; });
                  planningSlideShowSmall.forEach((slide, i) => { (planningImages[i]) ? slide.value = planningImages[i].linksmall : ''; });
                }
                //Brand Images
                if (brandImages.length != 0){
                  disabledImgUrls.forEach(disableUrl => { brandImages = brandImages.filter(x => x.linkmedium != disableUrl.value); });
                  brandImages.sort(function(a, b) { return (a.rank - b.rank); });
                  brandSlideShow.forEach((slide, i) => { (brandImages[i]) ? slide.value = brandImages[i].linkmedium : ''; });
                  brandSlideShowSmall.forEach((slide, i) => { (brandImages[i]) ? slide.value = brandImages[i].linksmall : ''; });
                }
                //Design Images
                if (designImages.length != 0){
                  disabledImgUrls.forEach(disableUrl => { designImages = designImages.filter(x => x.linkmedium != disableUrl.value); });
                  designImages.sort(function(a, b) { return (a.rank - b.rank); });
                  designSlideShow.forEach((slide, i) => { (designImages[i]) ? slide.value = designImages[i].linkmedium : ''; });
                  designSlideShowSmall.forEach((slide, i) => { (designImages[i]) ? slide.value = designImages[i].linksmall : ''; });
                }
                //Process Images
                if (processImages.length != 0){
                  disabledImgUrls.forEach(disableUrl => { processImages = processImages.filter(x => x.linkmedium != disableUrl.value); });
                  processImages.sort(function(a, b) { return (a.rank - b.rank); });
                  processdSlideShow.forEach((slide, i) => { (processImages[i]) ? slide.value = processImages[i].linkmedium : ''; });
                  processSlideShowSmall.forEach((slide, i) => { (processImages[i]) ? slide.value = processImages[i].linksmall : ''; });
                }

                setTimeout(function(){
                  let photoSliderCredits = imageData.map(sliderCredits => {
                return sliderCredits.photographer_id;
              }).join(',');
// 				    	console.log(interiorImages[0].photographer);
            seoDescriptionData('GET', 'https://ankrommoisan.openasset.com/REST/1/Photographers/?id=' + photoSliderCredits + '&fields') .then(photographerName=> {
// 							console.log(photographerName);
              if(photographerName.length >= 1){
                projectTopSlideShowCredit.forEach((slide, i) => { (topProjectSlider[i]) ? slide.classList.add(topProjectSlider[i].photographer) : ''; });
                      projectTopSlideShowCredit.forEach((slide, i) => { let phName = photographerName.find(element => element.id == slide.classList.value); (phName) ? slide.value = phName.name : ''; });
                      if (architectureImages.length != 0){
                        architectureSlideShowCredit.forEach((slide, i) => { (architectureImages[i]) ? slide.classList.add(architectureImages[i].photographer) : ''; });
                        architectureSlideShowCredit.forEach((slide, i) => { let phName = photographerName.find(element => element.id == slide.classList.value); (phName) ? slide.value = phName.name : ''; }); };
                      if (interiorImages.length != 0){
                        interiorSlideShowCredit.forEach((slide, i) => { (interiorImages[i]) ? slide.classList.add(interiorImages[i].photographer) : ''; });
                        interiorSlideShowCredit.forEach((slide, i) => { let phName = photographerName.find(element => element.id == slide.classList.value); (phName) ? slide.value = phName.name : ''; }); };
                      if (planningImages.length != 0){
                        planningSlideShowCredit.forEach((slide, i) => { (planningImages[i]) ? slide.classList.add(planningImages[i].photographer) : ''; });
                        planningSlideShowCredit.forEach((slide, i) => { let phName = photographerName.find(element => element.id == slide.classList.value); (phName) ? slide.value = phName.name : ''; }); };
                      if (brandImages.length != 0){
                        brandSlideShowCredit.forEach((slide, i) => { (brandImages[i]) ? slide.classList.add(brandImages[i].photographer) : ''; });
                        brandSlideShowCredit.forEach((slide, i) => { let phName = photographerName.find(element => element.id == slide.classList.value); (phName) ? slide.value = phName.name : ''; }); };
                      if (designImages.length != 0){
                        designSlideShowCredit.forEach((slide, i) => { (designImages[i]) ? slide.classList.add(designImages[i].photographer) : ''; });
                        designSlideShowCredit.forEach((slide, i) => { let phName = photographerName.find(element => element.id == slide.classList.value); (phName) ? slide.value = phName.name : ''; }); };
                      if (processImages.length != 0){
                        processSlideShowCredit.forEach((slide, i) => { (processImages[i]) ? slide.classList.add(processImages[i].photographer) : ''; });
                        processSlideShowCredit.forEach((slide, i) => { let phName = photographerName.find(element => element.id == slide.classList.value); (phName) ? slide.value = phName.name : ''; }); };
                    }
                });

              },1000);

            });

            //console.log(Array.stringify(archProjectSlider));

    };
    getData();
    setTimeout(function(){
      previewImageSrc.forEach(previewImg => {
        if(previewImg.closest('.acf-table').querySelector('tbody .acf-field.acf-field-text:is([data-name="image"], [data-name="medium"]) input').value){
          previewImg.src = previewImg.closest('.acf-table').querySelector('tbody .acf-field.acf-field-text:is([data-name="image"], [data-name="medium"]) input').value;
        }
      });
    },1500 );
  }


  //////////////////////////////////////// END FETCH PROJECT DATA ///////////////////////////////////////////////



  //////////////////////////////////////// FETCH DISCIPLINE DATA ///////////////////////////////////////////////
  function fetchDisciplineData(e) {
    const allInputs = document.querySelectorAll('div#acf-group_5fbd93eacc6c7 input');
    const allTextarea = document.querySelectorAll('div#acf-group_5fbd93eacc6c7 textarea');
    const sidebarCategory = document.querySelectorAll('div#portfolio_categorydiv ul#portfolio_categorychecklist input');
    allInputs.forEach(input => input.value = '' );
    allTextarea.forEach(textarea => textarea.value = '' );
    sidebarCategory.forEach(checkbox => checkbox.checked = false);
    //Fetch ID input
    const projectFetchIdInput = document.querySelector('.acf-field.acf-field-text[data-name="project_id"] .acf-input .acf-input-wrap input');

    //Discipline Title input + label
    const projectTitleField = document.querySelector('div#post-body div#titlediv input#title');

    const disciplineImage = document.querySelector('[data-name="top_page_slidershow"] [data-name="slide_one"] [data-name="image"] input');
    const disciplineTitle = document.querySelector('[data-name="top_page_slidershow"] [data-name="title"] input');
    const disciplineTopContent = document.querySelector('[data-name="top_project_content"] [data-name="project_content"] textarea');

    const disciplineBenifitOneTitle = document.querySelector('[data-name="benefit_one"] [data-name="title"] input');
    const disciplineBenifitOneContent = document.querySelector('[data-name="benefit_one"] [data-name="content"] textarea');
    const disciplineBenifitTwoTitle = document.querySelector('[data-name="benefit_two"] [data-name="title"] input');
    const disciplineBenifitTwoContent = document.querySelector('[data-name="benefit_two"] [data-name="content"] textarea');
    const disciplineBenifitThreeTitle = document.querySelector('[data-name="benefit_three"] [data-name="title"] input');
    const disciplineBenifitThreeContent = document.querySelector('[data-name="benefit_three"] [data-name="content"] textarea');
    const disciplineBenifitFourTitle = document.querySelector('[data-name="benefit_four"] [data-name="title"] input');
    const disciplineBenifitFourContent = document.querySelector('[data-name="benefit_four"] [data-name="content"] textarea');

    const getData=()=> {
        seoDescriptionData('GET', 'https://ankrommoisan.openasset.com/REST/1/Projects/?id=' + projectFetchIdInput.value + '&fields') .then(responseData=> {
          console.log(responseData);

          projectTitleField.value = responseData[0].name;

          responseData[0].fields.map(field => {
            // Discipline Top Content
                (field.id == 70) ? disciplineTitle.value = field.values : '';
          (field.id == 71) ? disciplineTopContent.value = field.values : '';
                // Benifit One Content
                (field.id == 88) ? disciplineBenifitOneTitle.value = field.values : '';
                (field.id == 84) ? disciplineBenifitOneContent.value = field.values : '';
                // Benifit Two Content
                (field.id == 89) ? disciplineBenifitTwoTitle.value = field.values : '';
                (field.id == 85) ? disciplineBenifitTwoContent.value = field.values : '';
                // Benifit Three Content
                (field.id == 90) ? disciplineBenifitThreeTitle.value = field.values : '';
                (field.id == 86) ? disciplineBenifitThreeContent.value = field.values : '';
                // Benifit Four Content
                (field.id == 91) ? disciplineBenifitFourTitle.value = field.values : '';
                (field.id == 87) ? disciplineBenifitFourContent.value = field.values : '';

        });
      });
      const disciplineImages = [];
      seoDescriptionData('GET', 'https://ankrommoisan.openasset.com/REST/1/Files/?project_id=' + projectFetchIdInput.value + '&access_level=1&limit=0&rank=2&displayFields=id,rank&sizes=1,2,3,5,7,8') .then(imageData=> {
           console.log(imageData);

           imageData.map(field => {
             disciplineImages.push(field.sizes[4].http_root + field.sizes[4].http_relative_path);
// 	 			    (field.id == 1970) ? architectureImages.push({linkmedium: images.sizes[4].http_root + images.sizes[4].http_relative_path, linksmall: images.sizes[3].http_root + images.sizes[3].http_relative_path, rank: images.rank, photographer: images.photographer_id}) : '';
         });
           console.log(disciplineImages);
           const disciplineImageRandom = Math.floor(Math.random() * disciplineImages.length);
           disciplineImage.value = disciplineImages[disciplineImageRandom];
       });

    }
  getData();
  }

  //////////////////////////////////////// END FETCH DISCIPLINe DATA ///////////////////////////////////////////////




  //////////////////////////////////////// FETCH SECTOR DATA ///////////////////////////////////////////////
  function fetchSectorData(e) {
    const allInputs = document.querySelectorAll('div#acf-group_5fbd93eacc6c7 input');
    const allTextarea = document.querySelectorAll('div#acf-group_5fbd93eacc6c7 textarea');
    const sidebarCategory = document.querySelectorAll('div#portfolio_categorydiv ul#portfolio_categorychecklist input');
    allInputs.forEach(input => input.value = '' );
    allTextarea.forEach(textarea => textarea.value = '' );
    sidebarCategory.forEach(checkbox => checkbox.checked = false);
    //Fetch ID input
    const projectFetchIdInput = document.querySelector('.acf-field.acf-field-text[data-name="project_id"] .acf-input .acf-input-wrap input');
    const marketSelctorType = document.querySelector('[data-name="select_market_sector_type"] .acf-input input');

    //Sector Title input + label
    const sectorTitleField = document.querySelector('div#post-body div#titlediv input#title');

    const sectorImageMain = document.querySelector('[data-name="top_page_slidershow"] [data-name="slide_one"] [data-name="image"] input');
    const sectorImageArchitecture = document.querySelector('[data-name="top_page_slidershow"] [data-name="slide_two"] [data-name="image"] input');
    const sectorImageInteriors = document.querySelector('[data-name="top_page_slidershow"] [data-name="slide_three"] [data-name="image"] input');
    const sectorImagePlanning = document.querySelector('[data-name="top_page_slidershow"] [data-name="slide_four"] [data-name="image"] input');
    const sectorImageBrand = document.querySelector('[data-name="top_page_slidershow"] [data-name="slide_five"] [data-name="image"] input');
    const sectorImageDesign = document.querySelector('[data-name="top_page_slidershow"] [data-name="slide_five"] [data-name="image"] input');
    const sectorImageProcess = document.querySelector('[data-name="top_page_slidershow"] [data-name="slide_five"] [data-name="image"] input');

    const sectorTitle = document.querySelector('[data-name="top_page_slidershow"] [data-name="sector_title"] input');
    const sectorType = document.querySelector('[data-name="top_page_slidershow"] [data-name="sector_type_title"] input');

    const sectorSubtitle = document.querySelector('[data-name="top_project_content"] [data-name="sector_subtitle"] input');
    const sectorTopContent = document.querySelector('[data-name="top_project_content"] [data-name="project_content"] textarea');

    const sectorSidebarFactOne = document.querySelector('[data-name="sector_sidebar"] [data-name="sector_facts"] [data-name="fact_one"] input');
    const sectorSidebarFactTwo = document.querySelector('[data-name="sector_sidebar"] [data-name="sector_facts"] [data-name="fact_two"] input');
    const sectorSidebarFactThree = document.querySelector('[data-name="sector_sidebar"] [data-name="sector_facts"] [data-name="fact_three"] input');
    const sectorSidebarPDF = document.querySelector('[data-name="sector_sidebar"] [data-name="sector_pdf"] input');

    const sidebarTypes = document.querySelectorAll('[data-name="project_type"] input');

    //console.log("marketSelctorType.value: " + marketSelctorType.value);

    const getData=()=> {

        seoDescriptionData('GET', 'https://ankrommoisan.openasset.com/REST/1/Projects/?id=' + projectFetchIdInput.value + '&fields') .then(responseData=> {
          console.log("responseData: " + responseData);
          sectorTitle.value = responseData[0].name;

          if(marketSelctorType.value == 'Housing'  || marketSelctorType.value == 'Office' || marketSelctorType.value == 'Senior Communities' || marketSelctorType.value == 'Healthcare' || marketSelctorType.value == 'Higher Education' || marketSelctorType.value == 'Hospitality' || marketSelctorType.value == 'Retail' || marketSelctorType.value == 'Community'){
            sectorTitleField.value = responseData[0].name;
            responseData[0].fields.map(field => {
              // Sector Top Content
                  (field.id == 70) ? sectorSubtitle.value = field.values : '';
            (field.id == 71) ? sectorTopContent.value = field.values : '';
                  // Sidebar Facts
                  (field.id == 107) ? sectorSidebarFactOne.value = field.values : '';
                  (field.id == 108) ? sectorSidebarFactTwo.value = field.values : '';
                  (field.id == 109) ? sectorSidebarFactThree.value = field.values : '';
          });
        } else if (marketSelctorType.value == 'Affordable Housing' ){
            sectorTitleField.value = responseData[0].name;

            responseData[0].fields.map(field => {
              // Sector Top Content

                  (field.id == 70) ? sectorSubtitle.value = field.values : '';
            (field.id == 71) ? sectorTopContent.value = field.values : '';
            (field.id == 72) ? (sidebarTypes.value = field.values) : '';
                  // Sidebar Facts
                  (field.id == 107) ? sectorSidebarFactOne.value = field.values : '';
                  (field.id == 108) ? sectorSidebarFactTwo.value = field.values : '';
                  (field.id == 109) ? sectorSidebarFactThree.value = field.values : '';
          });
        } else if(marketSelctorType.value == 'High-Rise' || marketSelctorType.value == 'Workplace Interiors' || marketSelctorType.value == 'Senior Living' || marketSelctorType.value == 'Acute Care' || marketSelctorType.value == 'Student Housing' || marketSelctorType.value == 'Hotels and Resorts' || marketSelctorType.value == 'Branded Retail' || marketSelctorType.value == 'Cultural'){
            responseData[0].fields.map(field => {
              // Sector Top Content
              (field.id == 72) ? (sectorType.value = field.values) && (sectorTitleField.value = field.values) : '';
                  (field.id == 73) ? sectorSubtitle.value = field.values : '';
            (field.id == 74) ? sectorTopContent.value = field.values : '';
                  // Sidebar Facts
                  (field.id == 110) ? sectorSidebarFactOne.value = field.values : '';
                  (field.id == 111) ? sectorSidebarFactTwo.value = field.values : '';
                  (field.id == 112) ? sectorSidebarFactThree.value = field.values : '';
          });
        } else if (marketSelctorType.value == 'Mid-Rise' || marketSelctorType.value == 'Landlord' || marketSelctorType.value == 'Not for Profit' || marketSelctorType.value == 'Ambulatory Care' || marketSelctorType.value == 'Learning Centers' || marketSelctorType.value == 'Corporate Retail' || marketSelctorType.value == 'Civic' || marketSelctorType.value == 'Corporate Retail'){
            responseData[0].fields.map(field => {
              // Sector Top Content
              (field.id == 75) ? (sectorType.value = field.values) && (sectorTitleField.value = field.values) : '';
                  (field.id == 76) ? sectorSubtitle.value = field.values : '';
            (field.id == 77) ? sectorTopContent.value = field.values : '';
                  // Sidebar Facts
                  (field.id == 113) ? sectorSidebarFactOne.value = field.values : '';
                  (field.id == 114) ? sectorSidebarFactTwo.value = field.values : '';
                  (field.id == 115) ? sectorSidebarFactThree.value = field.values : '';
          });
        } else 	if(marketSelctorType.value == 'Urban Living Interiors' || marketSelctorType.value == 'Core and Shell' || marketSelctorType.value == 'Wellness' || marketSelctorType.value == 'Classroom and Office' || marketSelctorType.value == 'Mission-Driven'){
            responseData[0].fields.map(field => {
              // Sector Top Content
              (field.id == 78) ? (sectorType.value = field.values) && (sectorTitleField.value = field.values) : '';
                  (field.id == 79) ? sectorSubtitle.value = field.values : '';
            (field.id == 81) ? sectorTopContent.value = field.values : '';
                  // Sidebar Facts
                  (field.id == 116) ? sectorSidebarFactOne.value = field.values : '';
                  (field.id == 117) ? sectorSidebarFactTwo.value = field.values : '';
                  (field.id == 118) ? sectorSidebarFactThree.value = field.values : '';
          });
        } else if (marketSelctorType.value == 'Corporate' || marketSelctorType.value == 'Behavioral Health'){
            responseData[0].fields.map(field => {
              // Sector Top Content
              (field.id == 80) ? (sectorType.value = field.values) && (sectorTitleField.value = field.values) : '';
                  (field.id == 82) ? sectorSubtitle.value = field.values : '';
            (field.id == 83) ? sectorTopContent.value = field.values : '';
                  // Sidebar Facts
                  (field.id == 119) ? sectorSidebarFactOne.value = field.values : '';
                  (field.id == 120) ? sectorSidebarFactTwo.value = field.values : '';
                  (field.id == 121) ? sectorSidebarFactThree.value = field.values : '';
          });
        };


      });

      const sectorImagesMain = [];
      const sectorImagesArchitecture = [];
      const sectorImagesInteriors = [];
      const sectorImagesPlanning = [];
      const sectorImagesBrand = [];
      const sectorImagesDesign = [];
      const sectorImagesProcess = [];

      seoDescriptionData('GET', 'https://ankrommoisan.openasset.com/REST/1/Files/?project_id=' + projectFetchIdInput.value + '&limit=0&rank=1,2,3,4,5&displayFields=id,rank&sizes=1,2,3,5,7,8&keywords=all') .then(imageData=> {
           //console.log(imageData);
             imageData.map(field => {
               //console.log(field);
// 		 			    if(marketSelctorType.value == 'Housing' || marketSelctorType.value == 'Office' || marketSelctorType.value == 'Senior Communities' || marketSelctorType.value == 'Healthcare' || marketSelctorType.value == 'Higher Education' || marketSelctorType.value == 'Hospitality' || marketSelctorType.value == 'Retail' || marketSelctorType.value == 'Community'){
// 		 			    	(field.rank == 1) ? sectorImage.value = field.sizes[4].http_root + field.sizes[4].http_relative_path : '';
// Design and Process are guesses - need to track down actual values
                 (field.rank != 3 && (field.keywords[0].id == '1973' || field.keywords[0].id == '1975' || field.keywords[0].id == '1976' || field.keywords[0].id == '1977' || field.keywords[0].id == '1978' || field.keywords[0].id == '1979' || field.keywords[0].id == '1980' || field.keywords[0].id == '1981')) ? sectorImagesMain.push(field.sizes[4].http_root + field.sizes[4].http_relative_path) : '';
                 (field.keywords.length == 2) ? (field.keywords[0].id == '1985' || field.keywords[1].id == '1985') ? sectorImagesArchitecture.push(field.sizes[4].http_root + field.sizes[4].http_relative_path) : '' : (field.keywords[0].id == '1985') ? sectorImagesArchitecture.push(field.sizes[4].http_root + field.sizes[4].http_relative_path) : '';
                 (field.keywords.length == 2) ? (field.keywords[0].id == '1984' || field.keywords[1].id == '1984') ? sectorImagesInteriors.push(field.sizes[4].http_root + field.sizes[4].http_relative_path) : '' : (field.keywords[0].id == '1984') ? sectorImagesInteriors.push(field.sizes[4].http_root + field.sizes[4].http_relative_path) : '';
                 (field.keywords.length == 2) ? (field.keywords[0].id == '1982' || field.keywords[1].id == '1982') ? sectorImagesPlanning.push(field.sizes[4].http_root + field.sizes[4].http_relative_path) : '' : (field.keywords[0].id == '1982') ? sectorImagesPlanning.push(field.sizes[4].http_root + field.sizes[4].http_relative_path) : '';
                 (field.keywords.length == 2) ? (field.keywords[0].id == '1983' || field.keywords[1].id == '1983') ? sectorImagesBrand.push(field.sizes[4].http_root + field.sizes[4].http_relative_path) : '' : (field.keywords[0].id == '1983') ? sectorImagesBrand.push(field.sizes[4].http_root + field.sizes[4].http_relative_path) : '';
                 (field.keywords.length == 2) ? (field.keywords[0].id == '1983' || field.keywords[1].id == '1983') ? sectorImagesDesign.push(field.sizes[4].http_root + field.sizes[4].http_relative_path) : '' : (field.keywords[0].id == '1988') ? sectorImagesDesign.push(field.sizes[4].http_root + field.sizes[4].http_relative_path) : '';
                 (field.keywords.length == 2) ? (field.keywords[0].id == '1983' || field.keywords[1].id == '1983') ? sectorImagesProcess.push(field.sizes[4].http_root + field.sizes[4].http_relative_path) : '' : (field.keywords[0].id == '1989') ? sectorImagesProcess.push(field.sizes[4].http_root + field.sizes[4].http_relative_path) : '';
/*
                 (field.keywords[0].id == '1984' || field.keywords[1].id == '1984') ? sectorImagesInteriors.push(field.sizes[4].http_root + field.sizes[4].http_relative_path) : '';
                 (field.keywords[0].id == '1982' || field.keywords[1].id == '1982') ? sectorImagesPlanning.push(field.sizes[4].http_root + field.sizes[4].http_relative_path) : '';
                 (field.keywords[0].id == '1983' || field.keywords[1].id == '1983') ? sectorImagesBrand.push(field.sizes[4].http_root + field.sizes[4].http_relative_path) : '';
*/
// 		 			    }
               (field.rank == 3 || field.rank == 5) ? sectorSidebarPDF.value = field.sizes[0].http_root + field.sizes[0].http_relative_path : '';
           });
           console.log(sectorImagesMain);
           (sectorImagesMain.length != 0) ? sectorImageMain.value = sectorImagesMain[0] : '';
           (sectorImagesArchitecture.length != 0) ? sectorImageArchitecture.value = sectorImagesArchitecture[0] : '';
           (sectorImagesInteriors.length != 0) ? sectorImageInteriors.value = sectorImagesInteriors[0] : '';
           (sectorImagesPlanning.length != 0) ? sectorImagePlanning.value = sectorImagesPlanning[0] : '';
           (sectorImagesBrand.length != 0) ? sectorImageBrand.value = sectorImagesBrand[0] : '';
           (sectorImagesDesign.length != 0) ? sectorImageDesign.value = sectorImagesDesign[0] : '';
           (sectorImagesBrand.length != 0) ? sectorImageProcess.value = sectorImagesProcess[0] : '';
       });

    }
  getData();
  }
  //////////////////////////////////////// END FETCH SECTOR DATA ///////////////////////////////////////////////


  //////////////////////////////////////// FETCH TEAM DATA ///////////////////////////////////////////////

  function fetchTeamData(e) {

    const allInputs = document.querySelectorAll('div#acf-group_5fbd93eacc6c7 input');
    const allTextarea = document.querySelectorAll('div#acf-group_5fbd93eacc6c7 textarea');
    const teamCategories = document.querySelectorAll('div#team_category-all ul#team_categorychecklist li input');
    allInputs.forEach(input => input.value = '' );
    allTextarea.forEach(textarea => textarea.value = '' );
    teamCategories.forEach(checkbox => checkbox.checked = false);
    //Fetch ID input
    const projectFetchIdInput = document.querySelector('.acf-field.acf-field-text[data-name="project_id"] .acf-input .acf-input-wrap input');

    //Project Title input + label
    const teamTitleField = document.querySelector('div#post-body div#titlediv input#title');


    //Team
    const teamPhoto = document.querySelector('div.postbox [data-name="top_page_slidershow"] [data-name="slide_one"] [data-name="image"] input');
    const teamName = document.querySelector('div.postbox [data-name="team_member_name"] input');
    const teamStatus = document.querySelector('div.postbox [data-name="team_member_status"] input');
    const teamOffice = document.querySelector('div.postbox [data-name="team_member_office"] input');
    const teamBio = document.querySelector('div.postbox [data-name="team_member_bio"] textarea');

    // Design and Process are guesses - need to track down
    //Team Category
    const teamExecutiveCategory = document.querySelector('div#team_category-all ul#team_categorychecklist li#in-team_category-64-1 input');
    const teamArchitectureCategory = document.querySelector('div#team_category-all ul#team_categorychecklist li#in-team_category-59-1 input');
    const teamInteriorsCategory = document.querySelector('div#team_category-all ul#team_categorychecklist li#in-team_category-60-1 input');
    const teamPlanningCategory = document.querySelector('div#team_category-all ul#team_categorychecklist li#in-team_category-62-1 input');
    const teamBrandCategory = document.querySelector('div#team_category-all ul#team_categorychecklist li#in-team_category-61-1 input');
    const teamDesignCategory = document.querySelector('div#team_category-all ul#team_categorychecklist li#in-team_category-67-1 input');
    const teamProcessCategory = document.querySelector('div#team_category-all ul#team_categorychecklist li#in-team_category-68-1 input');
    const teamBusinessServicesCategory = document.querySelector('div#team_category-all ul#team_categorychecklist li#in-team_category-63-1 input');

    const teamPortlandCategory = document.querySelector('div#team_category-all ul#team_categorychecklist li#in-team_category-48-1 input');
    const teamSeattleCategory = document.querySelector('div#team_category-all ul#team_categorychecklist li#in-team_category-49-1 input');
    const teamSanFranciscoCategory = document.querySelector('div#team_category-all ul#team_categorychecklist li#in-team_category-50-1 input');

    const teamCommunityCategory = document.querySelector('div#team_category-all ul#team_categorychecklist li#in-team_category-57-1 input');
    const teamHealthcareCategory = document.querySelector('div#team_category-all ul#team_categorychecklist li#in-team_category-58-1 input');
    const teamHigherEducationCategory = document.querySelector('div#team_category-all ul#team_categorychecklist li#in-team_category-56-1 input');
    const teamHospitalityCategory = document.querySelector('div#team_category-all ul#team_categorychecklist li#in-team_category-54-1 input');
    const teamHousingCategory = document.querySelector('div#team_category-all ul#team_categorychecklist li#in-team_category-51-1 input');
    const teamOfficeCategory = document.querySelector('div#team_category-all ul#team_categorychecklist li#in-team_category-52-1 input');
    const teamRetailCategory = document.querySelector('div#team_category-all ul#team_categorychecklist li#in-team_category-55-1 input');
    const teamSeniorLivingCategory = document.querySelector('div#team_category-all ul#team_categorychecklist li#in-team_category-53-1 input');



    const getData=()=> {

        seoDescriptionData('GET', 'https://ankrommoisan.openasset.com/REST/1/Employees?id=' + projectFetchIdInput.value + '&limit=0&displayFields=0&projectKeywords=all&projects=all&files=all&groups=all').then(responseData=> {
/*
          console.log(responseData[0].alive);
          console.log(responseData[0].files[0].id);
          console.log(responseData);
*/

          const employeeSector = responseData[0].sector;

          teamName.value = responseData[0].first_name + ' ' + responseData[0].last_name;
          teamTitleField.value = teamName.value;
          teamStatus.value = responseData[0].title;
          teamOffice.value = responseData[0].office;

          (responseData[0].sector.includes('Housing')) ? teamHousingCategory.checked = true : '';
          (responseData[0].sector.includes('Office')) ? teamOfficeCategory.checked = true : '';
          (responseData[0].sector.includes('Senior Communities' || 'Senior Living')) ? teamSeniorLivingCategory.checked = true : '';
          (responseData[0].sector.includes('Healthcare')) ? teamHealthcareCategory.checked = true : '';
          (responseData[0].sector.includes('Higher Education')) ? teamHigherEducationCategory.checked = true : '';
          (responseData[0].sector.includes('Hospitality')) ? teamHospitalityCategory.checked = true : '';
          (responseData[0].sector.includes('Retail')) ? teamRetailCategory.checked = true : '';
          (responseData[0].sector.includes('Community')) ? teamCommunityCategory.checked = true : '';

          (responseData[0].office == 'Portland') ? teamPortlandCategory.checked = true : '';
          (responseData[0].office == 'Seattle') ? teamSeattleCategory.checked = true : '';
          (responseData[0].office == 'San Francisco') ? teamSanFranciscoCategory.checked = true : '';

          (responseData[0].discipline == 'Executive') ? teamExecutiveCategory.checked = true : '';
          (responseData[0].discipline == 'Architecture' || responseData[0].discipline.includes('Architecture')) ? teamArchitectureCategory.checked = true : '';
          (responseData[0].discipline == 'Interiors' || responseData[0].discipline.includes('Interiors')) ? teamInteriorsCategory.checked = true : '';
          (responseData[0].discipline == 'Planning' || responseData[0].discipline.includes('Planning')) ? teamPlanningCategory.checked = true : '';
          (responseData[0].discipline == 'Brand' || responseData[0].discipline.includes('Brand')) ? teamBrandCategory.checked = true : '';
          (responseData[0].discipline == 'Design' || responseData[0].discipline.includes('Design')) ? teamBrandCategory.checked = true : '';
          (responseData[0].discipline == 'Process' || responseData[0].discipline.includes('Process')) ? teamBrandCategory.checked = true : '';
          (responseData[0].discipline == 'Firm Services' || responseData[0].discipline.includes('Firm Services')) ? teamBusinessServicesCategory.checked = true : '';
        if(responseData[0].files[0]){
          seoDescriptionData('GET', 'https://ankrommoisan.openasset.com/REST/1/Files?id=' + responseData[0].files[0].id + '&limit=0&rank=1,2,3,5&displayFields=0&sizes=1,2,3,5,7,8').then(image=> {
            console.log(image);
            teamPhoto.value = image[0].sizes[3].http_root + image[0].sizes[3].http_relative_path;
          });
          }else{
            teamPhoto.value = window.location.origin + '/wp-content/uploads/2021/09/S_200717_N2_webview.jpg';
          }
      });


/*
      const sectorImages = [];
      seoDescriptionData('GET', 'https://ankrommoisan.openasset.com/REST/1/Files/?project_id=' + projectFetchIdInput.value + '&limit=0&rank=1,2,3,5&displayFields=id,rank&sizes=1,2,3,5,7,8') .then(imageData=> {
           console.log(imageData);
             imageData.map(field => {
// 		 			    if(marketSelctorType.value == 'Housing' || marketSelctorType.value == 'Office' || marketSelctorType.value == 'Senior Communities' || marketSelctorType.value == 'Healthcare' || marketSelctorType.value == 'Higher Education' || marketSelctorType.value == 'Hospitality' || marketSelctorType.value == 'Retail' || marketSelctorType.value == 'Community'){
// 		 			    	(field.rank == 1) ? sectorImage.value = field.sizes[4].http_root + field.sizes[4].http_relative_path : '';
                 (field.rank == 1 || field.rank == 2) ? sectorImages.push(field.sizes[4].http_root + field.sizes[4].http_relative_path) : '';
// 		 			    }
               (field.rank == 3 || field.rank == 5) ? sectorSidebarPDF.value = field.sizes[0].http_root + field.sizes[0].http_relative_path : '';
           });
           console.log(sectorImages);
           if(sectorImages.length != 0){
             const sectorImageRandom = Math.floor(Math.random() * sectorImages.length);
             sectorImage.value = sectorImages[sectorImageRandom];
             }
       });
*/

    }
  getData();
  }
  //////////////////////////////////////// END FETCH TEAM DATA ///////////////////////////////////////////////


  //////////////////////////////////////// LOAD TEMPLATE ///////////////////////////////////////////////

  function loadTemplate(){
    if(templateSelector.options[templateSelector.selectedIndex].text == 'Discipline Page'){
      fetchButton.addEventListener('click', fetchDisciplineData)
    }else if(templateSelector.options[templateSelector.selectedIndex].text == 'Projects Template' || templateSelector.options[templateSelector.selectedIndex].text == 'Projects Template 2024' || templateSelector.options[templateSelector.selectedIndex].text == 'Projects Template 2025'){
      fetchButton.addEventListener('click', fetchProjectData)
    }
    else if(templateSelector.options[templateSelector.selectedIndex].text == 'Sector Page' || templateSelector.options[templateSelector.selectedIndex].text == 'Sector Page Hospitality 2024' || templateSelector.options[templateSelector.selectedIndex].text == 'Sector Page 2025'){
      fetchButton.addEventListener('click', fetchSectorData)
    }
    else if(templateSelector.options[templateSelector.selectedIndex].text == 'Team Member'){
      fetchButton.addEventListener('click', fetchTeamData)
    }
  }
  //////////////////////////////////////// END LOAD TEMPLATE ///////////////////////////////////////////////




  window.addEventListener('load', loadTemplate);
  templateSelector.addEventListener('change', loadTemplate);



 </script>



<!--  Market Sector Projects (Select All/Remove All) -->
<style>
div#project_all_btns_wrap div {
    background: #fff;
    color: #1d2327;
    padding: 10px 30px;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 12px;
    margin: 0 5px;
    border: 1px solid #fff;
    transition: all .2s ease-in-out;
    cursor: pointer;
}
div#project_all_btns_wrap div:hover{
  background: #1d2327;
  color: #fff;
}

div#project_all_btns_wrap {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px 0;
    background: #1d2327;
    border: 1px solid #e6e7e9;
}
div#projects_selector .acf-relationship .list{
  height: 500px;
}
</style>
<script>
  const marketSectorProjectSelectorWrap = document.querySelectorAll('#projects_selector');

  if(marketSectorProjectSelectorWrap){
    marketSectorProjectSelectorWrap.forEach(marketSelctorProjects => {
      const newButtonsWrap = document.createElement('div');
      newButtonsWrap.id = "project_all_btns_wrap";
      marketSelctorProjects.appendChild(newButtonsWrap);
      const selectAllButton = document.createElement('div');
      const removeAllButton = document.createElement('div');
      selectAllButton.id = "select_all";
      removeAllButton.id = "remove_all";
      selectAllButton.innerHTML = "Select All";
      removeAllButton.innerHTML = "Remove All";
      newButtonsWrap.appendChild(selectAllButton);
      newButtonsWrap.appendChild(removeAllButton);
    })


/*
    let marketSectorUnselectedProjects = document.querySelectorAll('#projects_selector .choices ul li span');
    let marketSectorSelectedProjects = document.querySelectorAll('#projects_selector .values ul li span a');
*/

    function selectAllProjects(e){
      let marketSectorUnselectedProjects = e.target.closest('#projects_selector').querySelectorAll('.choices ul li span');
      let marketSectorSelectedProjects = e.target.closest('#projects_selector').querySelectorAll('.values ul li span a');
      marketSectorUnselectedProjects.forEach(project => {
        project.click();
      });
    }

    marketSectorProjectSelectorWrap.forEach(marketSelctorProjects => {
      let selectAll = marketSelctorProjects.querySelectorAll('#select_all');
      selectAll.forEach(selAll => {
        selAll.addEventListener('click', selectAllProjects);
      })
    });

    function removeAllProjects(e){
      let marketSectorSelectedProjects = e.target.closest('#projects_selector').querySelectorAll('.values ul li span a');
      marketSectorSelectedProjects.forEach(project => {
        project.click();
      });
    }
    marketSectorProjectSelectorWrap.forEach(marketSelctorProjects => {
      let removeAllBtn = marketSelctorProjects.querySelectorAll('#remove_all');
      removeAllBtn.forEach(removeAll => {
        removeAll.addEventListener('click', removeAllProjects);
      })
    });
  }
</script>

<?php
}
add_action('acf/input/admin_footer', 'my_acf_input_admin_footer');

function get_ajax_query($options = [])
{
  // vars
  $response = [
    'results' => $results,
    'limit' => 2000,
  ];
  return $response;
}

/**
 * Replaces query version in registered scripts or styles with file modified time
 *
 * @param $src
 *
 * @return string
 */
function add_modified_time($src)
{
  // check if src is internal src
  if (strpos($src, site_url()) === false) {
    return $src;
  }

  $clean_src = remove_query_arg('ver', $src);
  $path = wp_parse_url($src, PHP_URL_PATH);

  if ($modified_time = @filemtime(untrailingslashit(ABSPATH) . $path)) {
    $src = add_query_arg('ver', $modified_time, $clean_src);
  } else {
    $src = add_query_arg('ver', time(), $clean_src);
  }

  return $src;
}

add_filter('style_loader_src', 'add_modified_time', 99999999, 1);
add_filter('script_loader_src', 'add_modified_time', 99999999, 1);
